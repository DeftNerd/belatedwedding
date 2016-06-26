<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Wish;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class WishesController extends Controller
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
        $wishes = Wish::paginate(15);

        return view('wishes.index', compact('wishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('wishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        Wish::create($request->all());

        Session::flash('flash_message', 'Wish added!');

        return redirect('wishes');
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
        $wish = Wish::findOrFail($id);

        return view('wishes.show', compact('wish'));
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
        $wish = Wish::findOrFail($id);

        return view('wishes.edit', compact('wish'));
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
        
        $wish = Wish::findOrFail($id);
        $wish->update($request->all());

        Session::flash('flash_message', 'Wish updated!');

        return redirect('wishes');
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
        Wish::destroy($id);

        Session::flash('flash_message', 'Wish deleted!');

        return redirect('wishes');
    }
}
