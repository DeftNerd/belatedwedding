<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Guest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class GuestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $guests = Guest::paginate(15);

        return view('guests.index', compact('guests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('guests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['invitation_id' => 'unsigned', 'phone' => 'nullable', 'email' => 'nullable', 'is_attending_ceremony' => 'nullable', 'is_attending_reception' => 'nullable', 'meal_id' => 'unsigned', 'comment' => 'nullable', ]);

        Guest::create($request->all());

        Session::flash('flash_message', 'Guest added!');

        return redirect('guests');
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
        $guest = Guest::findOrFail($id);

        return view('guests.show', compact('guest'));
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
        $guest = Guest::findOrFail($id);

        return view('guests.edit', compact('guest'));
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
        $this->validate($request, ['invitation_id' => 'unsigned', 'phone' => 'nullable', 'email' => 'nullable', 'is_attending_ceremony' => 'nullable', 'is_attending_reception' => 'nullable', 'meal_id' => 'unsigned', 'comment' => 'nullable', ]);

        $guest = Guest::findOrFail($id);
        $guest->update($request->all());

        Session::flash('flash_message', 'Guest updated!');

        return redirect('guests');
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
        Guest::destroy($id);

        Session::flash('flash_message', 'Guest deleted!');

        return redirect('guests');
    }
}
