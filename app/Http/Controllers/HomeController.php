<?php

namespace App\Http\Controllers;

use App\Wish;
use App\Invitation;
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

        if (!empty($code)) {
            $invitation = Invitation::with('guests', 'guests.meal')->where('code', $code)->first();
            $invitation->visited_at = Carbon::now();
            $invitation->save();
            return view('welcome', [
                'wishes' => $wishes, 
                'invitation' => $invitation
            ]);
        } else {
            return view('welcome', [
                'wishes' => $wishes
            ]);            
        }
    }
}
