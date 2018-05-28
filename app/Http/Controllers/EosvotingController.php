<?php

namespace App\Http\Controllers;

use App\eosvoting;
use Illuminate\Http\Request;

class EosvotingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('eosvoting');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\eosvoting  $eosvoting
     * @return \Illuminate\Http\Response
     */
    public function show(eosvoting $eosvoting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\eosvoting  $eosvoting
     * @return \Illuminate\Http\Response
     */
    public function edit(eosvoting $eosvoting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\eosvoting  $eosvoting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, eosvoting $eosvoting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\eosvoting  $eosvoting
     * @return \Illuminate\Http\Response
     */
    public function destroy(eosvoting $eosvoting)
    {
        //
    }
}
