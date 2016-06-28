<?php

namespace App\Http\Controllers;

use App\Wish;
use App\Meal;
use App\Invitation;
use App\Guest;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($code = NULL)
    {

        $wishes = Wish::all();
        $meals = Meal::lists('name', 'id');

        if (!empty($code)) {
            $invitation = Invitation::with('guests', 'guests.meal')->where('code', $code)->first();
            $invitation->visited_at = Carbon::now();
            $invitation->save();
            return view('welcome', [
                'wishes' => $wishes, 
                'meals' => $meals,
                'invitation' => $invitation
            ]);
        } else {
            return view('welcome', [
                'wishes' => $wishes,
                'meals' => $meals
            ]);            
        }
    }

    public function update($code, Request $request) {
        dd($request->all());
        $invitation = Invitation::where('code', $code)->first();
        $invitation->rsvp_at = Carbon::now();
        $invitation->save();

        foreach($request->guest as $key => $value) {
            $guest = Guest::findOrFail($key);
            $guest->name = $value->name;
            $guest->email = $value->email;
            $guest->meal_id = $value->meal_id;
            if ($invitation->is_attending == TRUE) {
                $guest->is_attending = TRUE;
            }
            $guest->save();
        }

        foreach($request->new as $key => $value) {
            $guest = new Guest;
            $guest->name = $value->name;
            $guest->email = $value->email;
            $guest->meal_id = $value->meal_id;
            if ($invitation->is_attending == TRUE) {
                $guest->is_attending = TRUE;
            }
            $guest->save();
        }

        if (!empty($request->wish)) {
            $wish = Wish::firstOrNew(['invitation_id' => $invitation->id]);
            Wish::
        }
        
    }
}
