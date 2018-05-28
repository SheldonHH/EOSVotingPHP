<?php

namespace eosvoting\Http\Controllers;

use eosvoting\eosvoting;
use Illuminate\Http\Request;
use eosvoting\Http\Requests\eosvotingRequest;

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
    // public function store(Request $request)
    public function store(eosvotingRequest $request)
    {
        // return $request->all();
        $eosv = new eosvoting;
        $eosv->producer_name = $request->producer_name;
        $eosv->organization_name = $request->organization_name;
        $eosv->location = $request->location;
        $eosv->domain = $request->domain;
        $eosv->http_port = $request->http_port;
        $eosv->p2p_port = $request->p2p_port;
        $eosv->public_key = $request->public_key;
        $eosv->website = $request->website;
        $eosv->save();
        return $eosv;
    }

    public function getBPData(){
        return eosvoting::orderBy('producer_name', 'DESC')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \eosvoting\eosvoting  $eosvoting
     * @return \Illuminate\Http\Response
     */
    public function show(eosvoting $eosvoting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \eosvoting\eosvoting  $eosvoting
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
     * @param  \eosvoting\eosvoting  $eosvoting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, eosvoting $eosvoting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \eosvoting\eosvoting  $eosvoting
     * @return \Illuminate\Http\Response
     */
    public function destroy(eosvoting $eosvoting)
    {
        //
    }
}
