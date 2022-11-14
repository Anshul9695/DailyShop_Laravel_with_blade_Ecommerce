<?php

namespace App\Http\Controllers;

use App\Models\blog_post;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin/create_blog_post');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    //   print_r($request->all());
    //   die;
        $request->validate([
            'post_title' => 'required',
            'post_description' => 'required'
        ]);
        $blog_post = new blog_post();
        $blog_post->post_title = $request->post('post_title');
        $blog_post->post_description = $request->post('post_description');
        $blog_post->status = '1';
        $blog_post->save();
        $request->session()->flash('message', 'Post Created successfully');
        return redirect()->back();
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
     * @param  \App\Models\blog_post  $blog_post
     * @return \Illuminate\Http\Response
     */
    public function show(blog_post $blog_post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog_post  $blog_post
     * @return \Illuminate\Http\Response
     */
    public function edit(blog_post $blog_post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog_post  $blog_post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blog_post $blog_post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog_post  $blog_post
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog_post $blog_post)
    {
        //
    }
}
