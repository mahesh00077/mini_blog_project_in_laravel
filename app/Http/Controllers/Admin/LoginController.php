<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\Users2;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* public function __construct(Request $request)
    {
        if ($request->session()->has('my_name')) {
            echo $request->session()->get('my_name');
        } else {
            echo 'No data in the session';
        }
        // $this->middleware('guest')->except('logout');
    } */
    public function index(Request $request)
    {
        //
        empty($request->session()->has('UID')) ? '' : redirect(route('admin/dashboard'));

        return view('admin_panel/login');
    }
    public function loginAction(Request $request)
    {
        $username = $request->username ? $request->username : '';
        $password = $request->password ? crypt($request->password, 'root') : '';
        // die;
        $users = DB::table('users2')
            ->select('id', 'username', 'email', 'role', 'status', 'post', 'category', 'tag', 'users')
            ->where('password', $password)
            ->where('username', $username)
            ->where('status', '<>', 0)
            ->get();

        // dd($users->uesrname);
        $data = collect($users)->map(function ($x) {
            return (array) $x;
        })->toArray();
        // print_r($data[0]['username']);
        // die;
        if (!empty($data)) {
            if ($data[0]['status'] == '0') {
                return redirect('admin-login')
                    ->with('error', 'user is inactive!');
            } else {
                $request->session()->put('UID', $data[0]['id']);
                $request->session()->put('USERNAME', $data[0]['username']);
                $request->session()->put('UEMAIL-ID', $data[0]['email']);
                $request->session()->put('UROLE', $data[0]['role']);
                $request->session()->put('USTATUS', $data[0]['status']);
                $request->session()->put('POST', $data[0]['post']);
                $request->session()->put('CAT', $data[0]['category']);
                $request->session()->put('TAG', $data[0]['tag']);
                $request->session()->put('USERS', $data[0]['users']);
                return redirect('admin/dashboard')
                    ->with('success', 'logged in successful!');
            }
        } else {
            return redirect('admin-login')
                ->with('error', 'Invalid Username or password!');
        }
    }
    public function logoutUser(Request $request)
    {
        $request->session()->forget('UID');
        $request->session()->forget('USERNAME');
        $request->session()->forget('UEMAIL-ID');
        $request->session()->forget('UROLE');
        $request->session()->forget('USTATUS');
        $request->session()->forget('POST');
        $request->session()->forget('CAT');
        $request->session()->forget('TAG');
        $request->session()->forget('USERS');

        return redirect('admin-login')
            ->with('success', 'logged out successful!');
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