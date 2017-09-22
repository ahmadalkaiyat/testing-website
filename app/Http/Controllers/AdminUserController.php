<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Http\Requests\CreateUsersRequests;
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
        $roles = Role::pluck('name','id')->all();
        $status = Status::pluck('name','id')->all();
        $category = Category::pluck('name','id')->all();
        $country = Country::pluck('name','id')->all();

        return view('admin.users.create' , compact('roles','status','category','country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUsersRequests $request)
    {
        $input  = $request->all();    //to ge the Input from the Web
        $name =  $request->id;
        if ( $file = $request->file('photo_id') ){   // check if the Photo Exists

            $name = '/images/users/'.time().$name;

            $file->move('images/users',$name);

            $photo = photo::create(['path'=>$name]);

            $input['photo_id']=$photo->id;

        }

        $input['password'] = bcrypt($request->password); // to decrypt the PAssword
         User::create($input);

         return redirect('admin/users');
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
        $name =  $request->id;

        if (trim($request->password )== ''){
            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password']=bcrypt($request->password);
        }

        //  $input = $request->all();

        if ($file = $request->file('photo_id')){

            unlink(public_path().$user->photo->path);  // to Delete the Post Image when Deleting

            $name = '/images/users/'.time().$name;
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
        $user = User::findOrFail($id);

        unlink(public_path().$user->photo->path);  // to Delete the Post Image when Deleting

        $user->delete();

        //   Session::flash('deleted_post','The Post has been Deleted');

        return redirect('/admin/users');
    }
}
