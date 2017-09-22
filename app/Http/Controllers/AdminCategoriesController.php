<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\categoriesCreatRequest;
use App\photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();


        return view('admin.categories.index', compact('categories'));
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
     * @return array
     */
    public function store(categoriesCreatRequest $request)
    {
        //
        $input = $request->all();

        $user = Auth::user();

        $name =  $request->name;

       // return $request->all();

        if($file =$request->file('photo_id')){  // to check if the file is uploaded

            $name = '/images/categories/'.time().$name.$file->getClientOriginalName();  // here you can Rename as you wish

            $file->move('images/categories',$name); // move the File to the Desired destination
            // ypu may wanna Consider Different Locations for Diffrent types such as userpics/posts ,, etc and Also to make sure its
            // a file not a different file , and resize it into desired size
            // and Delete the Previous one if exists.

            $photo = Photo::create(['path'=>$name]);  // to Create the Photo

            $input['photo_id']=$photo->id; // Update the Input Data of photo Id to be taken from the one we created in Photo table

        }


       Category::create($input);

               return redirect('/admin/categories');
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
        $category = Category::findOrFail($id);
        return view('admin.categories.edit',compact('category'));
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
        $input = $request->all();
        $name =  $request->name;
        $category = Category::findOrFail($id);

       if ($file =$request->file('photo_id')){

           unlink(public_path().$category->photo->path);  // to Delete the Post Image when Deleting

           $name = '/images/categories/'.time().$name.$file->getClientOriginalName();
           $file->move('images/categories',$name);
           $photo = Photo::create(['path'=>$name]);
           $input['photo_id']=$photo->id;
       }

        $category->update($input);
        return redirect('admin/categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        unlink(public_path().$category->photo->path);  // to Delete the Post Image when Deleting

        $category->delete();

        //   Session::flash('deleted_post','The Post has been Deleted');

        return redirect('/admin/categories');
    }
}
