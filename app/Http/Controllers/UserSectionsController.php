<?php

namespace App\Http\Controllers;

use App\section;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $user = Auth::user();
        $sections= $user->section;
        $status = Status::pluck('name','id')->all();

        return view('user.sections.index',compact('sections','status'));

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
        $input =  $request ->all(); // assign the Request to a variable

        $user = Auth::user();  // to get the logged in user
        $user->section()->create($input);
        return redirect('/user/sections');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section =Section::findOrFail($id);
        $status = Status::pluck('name','id')->all();

        return view('user.sections.edit',compact('section','status'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input =$request->all();
        Auth::user()->section()->whereId($id)->first()->update($input)  ;
        return redirect('/user/sections');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $input = Section::findOrFail($id);
        $input->delete();
        return redirect('/user/sections');
    }
}
