<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Session;
class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data

        $this->validate($request,array(
            'title'=>'required|max:100|min:5',
            'slug'=>'required|alpha_dash|min:5|max:100|unique:posts,slug',
            'body'=>'required'
            ));

        //store into database

        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->save();

        //redirect to somewhere  
        Session::flash('success', 'The blog post was successfully save!');

        return redirect()->route('posts.show',$post->id); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the databse and save as a var 
        $post = Post::find($id);
        //return the view and pass in the var we previously created 
        return view('posts.edit')->withPost($post);
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
        $post = Post::find($id);

        if($request->input('slug') == $post->slug){
        $this->validate($request, array(
            'title'=>'required|min:5|max:200',
            'body'=>'required|min:10'));

       }else{

         $this->validate($request, array(
            'title'=>'required|min:5|max:200',
            'slug'=>'required|alpha_dash|min:5:max:100|unique:posts,slug',
            'body'=>'required|min:10'));
       }

        $post =Post::find($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->save();
        
        //set flash data with success message
        Session::flash('success','This post was successfully Updated');

        //redirect with flash data to post .show
         return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find the data from database 

        $post = Post::find($id);

        //delete the current data 

        $post->delete();

        //set flash data with delete message 

        Session::flash('success','the Post was successfully Removed');

        //redirect with flash data to posts.index
        
        return redirect()->route('posts.index');
    }
}
