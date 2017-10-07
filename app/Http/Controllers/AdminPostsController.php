<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\photo;
use App\Post;
use App\Section;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts =Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = Status::pluck('name','id')->all();
        //$section = Section::pluck('name','id')->all();
        $section = Auth::user()->section->pluck('name','id')->all();

        return view('admin.posts.create' ,compact('status','section'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $user = Auth::user();
        $input  = $request->all();    //to ge the Input from the Web
        $name =  $request->id;
        if ( $file = $request->file('photo_id') ){   // check if the Photo Exists

            $name = '/images/posts/'.Auth::user()->id.'/'.$request->section_id.'/'.time().$name;

            $file->move('images/posts/'.Auth::user()->id.'/'.$request->section_id,$name);

            $photo = photo::create(['path'=>$name]);

            $input['photo_id']=$photo->id;

        }


        $input['user_id']=Auth::user()->id;

        Post::create($input);

        return redirect('admin/posts');
    }



    public function edit($id)
    {
        $post = Post::findOrFail($id);  // finding the post where we are sending the ID

        $status =Status::pluck('name','id');

        $section =$post->user->section->pluck('name','id')->all();

        return view('admin.posts.edit',compact('post','section','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {

        $post = Post::findOrFail($id);
        $name =  $request->id;
        $input =$request->all();

        if($file =$request->file('photo_id')){  // to check if the file is uploaded you may wanna create method for that !

            unlink(public_path().$post->photo->path);  // to Delete the Post Image when Deleting

            $name = '/images/posts/'.Auth::user()->id.'/'.$request->section_id.'/'.time().$name;

            $file->move('images/posts/'.Auth::user()->id.'/'.$request->section_id,$name);

            $photo = photo::create(['path'=>$name]);

            $input['photo_id']=$photo->id;
        }

        $post->update($input)  ;  // new way to update in one line , check update users for old way !

        return redirect('/admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        unlink(public_path().$post->photo->path);  // to Delete the Post Image when Deleting

        $post->delete();

        //   Session::flash('deleted_post','The Post has been Deleted');

        return redirect('/admin/posts');
    }
}
