<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\photo;
use App\Role;
use App\Status;
use App\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
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
        //
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id');
        $status = Status::pluck('name','id');
        $country = Country::pluck('name','id');
        $category = Category::pluck('name','id');


        return view ('admin.users.edit',compact('user','roles','status','country','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $name =  $request->name;

        if (trim($request->password )== ''){
            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password']=bcrypt($request->password);
        }

        //  $input = $request->all();

        if ($file = $request->file('photo_id')){

            $name = '/images/users/'.time().$name.$file->getClientOriginalName();
            $file->move('images/users',$name);

            $photo =Photo::create(['path'=>$name]);

            $input['photo_id']=$photo->id;
        }

        $user->update($input);

      return redirect('/admin/users');
     //   return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
