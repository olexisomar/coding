<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsCreateRequest;
use App\Http\Requests\PostsEditRequest;
use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cat = Category::pluck('name','id')->all();

        return view('admin.posts.create', compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        //
        $input = $request->all();
        $users = Auth::user();

//        $users->posts

        if ($file = $request->file('photo_id')){

            $name = time(). $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['path'=> $name]);

            $input['photo_id'] = $photo->id;
        }
        $users->post()->create($input);
        Session::flash('created_post','The post '. strtoupper($request->title)  .' has been created');
        return redirect('admin/posts');
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
        $post = Post::findOrFail($id);
        $cat = Category::pluck('name','id')->all();
        return view('admin.posts.edit', compact('post', 'cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsEditRequest $request, $id)
    {
        //
        $posts = Post::findOrFail($id);

            $input = $request->all();

        if ($path = $request->file('photo_id')){


            $name = time() . $path->getClientOriginalName();

            $path->move('images', $name);

            $photo = Photo::create(['path'=>$name]);

            $input['photo_id'] = $photo->id;


        }

        $posts->update($input);
        Session::flash('updated_post','The post '. strtoupper($posts->title)  .' has been updated');
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
        //
        $posts = Post::findOrFail($id);
        unlink(public_path() . $posts->photo->path);
        $posts->delete();
        Session::flash('deleted_post','The post '. strtoupper($posts->title)  .' has been deleted');
        return redirect('/admin/posts');
    }
}
