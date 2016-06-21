<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Gift;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class GiftsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $gifts = Gift::paginate(15);

        return view('gifts.index', compact('gifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('gifts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['thanked_at' => 'nullable', ]);

        Gift::create($request->all());

        Session::flash('flash_message', 'Gift added!');

        return redirect('gifts');
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
        $gift = Gift::findOrFail($id);

        return view('gifts.show', compact('gift'));
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
        $gift = Gift::findOrFail($id);

        return view('gifts.edit', compact('gift'));
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
        $this->validate($request, ['thanked_at' => 'nullable', ]);

        $gift = Gift::findOrFail($id);
        $gift->update($request->all());

        Session::flash('flash_message', 'Gift updated!');

        return redirect('gifts');
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
        Gift::destroy($id);

        Session::flash('flash_message', 'Gift deleted!');

        return redirect('gifts');
    }
}
