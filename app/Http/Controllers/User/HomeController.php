<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sendmail;
use Symfony\Component\HttpFoundation\Session\Session;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post_data = DB::table('posts')
            ->select('posts.id', 'posts.title', 'posts.status', 'posts.subtitle', 'posts.slug', 'posts.body', 'posts.created_at', 'images.id as img_id', 'images.image_path', 'categories.name as cat_name', 'category_posts.id as cp_id', 'roles.name as role_name')
            ->leftjoin('images', 'posts.id', '=', 'images.post_id')
            ->leftjoin('category_posts', 'posts.id', '=', 'category_posts.post_id')
            ->leftjoin('categories', 'category_posts.category_id', '=', 'categories.id')
            ->leftjoin('users2', 'users2.id', '=', 'posts.posted_by')
            ->leftjoin('roles', 'roles.id', '=', 'users2.role')
            ->orderBy('posts.id', 'desc')
            ->where('posts.status', '=', '1')
            ->paginate(5);
        // dd($post_data);
        return view('user_panel.blog', compact('post_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        //
        return view('user_panel.about');
    }
    public function contact()
    {
        //
        return view('user_panel.contact');
    }
    public function contact_action(Request $request)
    {
        // $result = DB::insert('insert into contact_us (name,email,phone,msg,created_at) values (?, ?,?,?,?)', [$request->name, $request->email, $request->phone, $request->msg, date('Y-m-d H:i:s')]);
        Mail::to($request->email)->send(new Sendmail($request->subject, $request->msg));

        // check for failures
        if (Mail::failures()) {
            // return response showing failed emails
            return redirect()->back()->with('error', 'Failed to sent mail,Please try again late..');
        }
        // otherwise everything is okay ...
        $result = DB::insert('insert into contact_us (name,email,phone,subject,msg,created_at) values (?, ?,?,?,?,?)', [$request->name, $request->email, $request->phone, $request->subject, $request->msg, date('Y-m-d H:i:s')]);
        if ($result) {
            return redirect()->back()->with('success', 'successfully sent your message,thank you for contact us..');
        } else {
            return redirect()->back()->with('error', 'Failed to sent mail,Please try again late..');
        }

        // return redirect()->back();
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