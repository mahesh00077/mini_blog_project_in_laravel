<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug = null)
    {
        // die($slug);
        //
        $sinlge_post_data = DB::table('posts')
            ->select('posts.id', 'posts.title', 'posts.status', 'posts.subtitle', 'posts.slug', 'posts.body', 'posts.created_at', 'images.id as img_id', 'images.image_path', 'categories.name as cat_name', 'category_posts.id as cp_id', 'roles.name as role_name')
            ->leftjoin('images', 'posts.id', '=', 'images.post_id')
            ->leftjoin('category_posts', 'posts.id', '=', 'category_posts.post_id')
            ->leftjoin('categories', 'category_posts.category_id', '=', 'categories.id')
            ->leftjoin('users2', 'users2.id', '=', 'posts.posted_by')
            ->leftjoin('roles', 'roles.id', '=', 'users2.role')
            ->where(['posts.slug' => $slug, 'posts.status' => '1'])
            ->get();
        // dd($sinlge_post_data);
        return view('user_panel.post', compact('sinlge_post_data'));
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
        //
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