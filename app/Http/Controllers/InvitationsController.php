<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Guest;
use App\Invitation;
use App\Wish;
use Mail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class InvitationsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $invitations = Invitation::with('guests')->paginate(15);

        return view('invitations.index', compact('invitations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('invitations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'primary' => 'required|string',
          'guests_allowed' => 'numeric|between:1,8',
        ]);

        $invitation = new Invitation;
        $invitation->user_id = Auth::user()->id;
        $invitation->code = substr(md5(microtime()),rand(0,26),4);
	$invitation->is_attending = 0;
        $invitation->is_sent = 0;
        $invitation->guests_allowed = $request->guests_allowed + 1;
        $invitation->save();

        $guest = new Guest;
        $guest->name = $request->primary;
        $guest->invitation_id = $invitation->id;
        $guest->save();

        Session::flash('flash_message', 'Invitation added!');

        return redirect('/invitations/' . $invitation->id . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $invitation = Invitation::findOrFail($id);

        return view('invitations.show', compact('invitation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $invitation = Invitation::with('guests')->findOrFail($id);

        return view('invitations.edit', compact('invitation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
          'user_id' => 'numeric|exists:users,id',
          'invitation_method' => 'string',
          'guests_allowed' => 'required|numeric|between:0,8',
          'code' => 'required|string|between:4,8',
          'visited_at' => 'date',
          'rsvp_at' => 'date',
          'guest.*.name' => 'string',
          'guest.*.email' => 'email',
          'new.*.name' => 'string',
        ]);

        $invitation = Invitation::findOrFail($id);
        $invitation->user_id = $request->user_id;
        if (!empty($request->invitation_method)) {
          $invitation->invitation_method = $request->invitation_method;
        }
        $invitation->code = $request->code;
        if (!empty($request->visited_at)) {
          $invitation->visited_at = $request->visited_at;
        }
        if (!empty($request->rsvp_at)) {
          $invitation->rsvp_at = $request->rsvp_at;
        }

        if ($request->guests_allowed >= $invitation->guests()->count()) {
          $invitation->guests_allowed = $request->guests_allowed;
        } else {
          $invitation->guests_allowed = $invitation->guests()->count();
        }

        $invitation->save();

        foreach ($request->guest as $id => $update) {
          $guest = Guest::findOrFail($id);
          $guest->name = $update['name'];
          $guest->email = $update['email'];
          if (isset($update['meal_id']) && !empty($update['meal_id'])) {
            $guest->meal_id = $update['meal_id'];
          }
          $guest->save();
        }

        if (isset($request->new)) {
          foreach ($request->new as $new) {
            if (!empty($new['name'])) {
              $guest = new Guest;
              $guest->invitation_id = $invitation->id;
              $guest->name = $new['name'];
              $guest->email = $new['email'];
              $guest->save();
            }
          }
        }
        
        Session::flash('flash_message', 'Invitation updated!');

        return redirect('invitations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Invitation::destroy($id);
	Guest::where('invitation_id', $id)->delete();
	Wish::where('invitation_id', $id)->delete();

        Session::flash('flash_message', 'Invitation deleted!');

        return redirect('invitations');
    }

    public function send($id)
    {
        $invitation = Invitation::with('guests', 'guests.meal')->findOrFail($id);
        if ($invitation->is_sent == FALSE) {
            foreach ($invitation->guests as $guest) {
                if (!empty($guest->email)) {
                    Mail::send('emails.invitation', ['guest' => $guest, 'invitation' => $invitation], function ($m) use ($guest) {
                        $m->from('rsvp@belatedwedding.com', 'Adam and Bethany');
                        $m->to($guest->email, $guest->name);
                        $m->subject('You\'ve been invited to Adam & Bethany\'s Wedding!');
                    });
                }
            }
            $invitation->is_sent = TRUE;
            $invitation->save();
        }
        return redirect('invitations');
    }
}
