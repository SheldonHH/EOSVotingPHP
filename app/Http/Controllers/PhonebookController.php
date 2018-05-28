<?php

namespace eosvoting\Http\Controllers;

use eosvoting\Http\Requests\PhonebookRequest;
use eosvoting\Phonebook;
use Illuminate\Http\Request;

class PhonebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('phonebook');
    }


    public function getData(){
        return Phonebook::orderBy('name', 'ASC')->get();
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
    public function store(PhonebookRequest $request)
    {
        $pb = new Phonebook;
        $pb->name=$request->name;
        $pb->phone=$request->phone;
        $pb->email=$request->email;
        $pb->save();
        return $pb;
    }

    /**
     * Display the specified resource.
     *
     * @param  \eosvoting\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function show(Phonebook $phonebook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \eosvoting\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Phonebook $phonebook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \eosvoting\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function update(PhonebookRequest $request, Phonebook $phonebook)
    {
        $pb = Phonebook::find($request->id);
        $pb->name=$request->name;
        $pb->phone=$request->phone;
        $pb->email=$request->email;
        $pb->save();
//        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \eosvoting\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phonebook $phonebook)
    {
        Phonebook::where('id', $phonebook->id) -> delete();
    }
}
