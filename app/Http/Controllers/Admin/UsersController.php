<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\Users2;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckSession');
        $this->middleware('CheckMenuUsers');


        // $this->middleware('CheckMenuAccess');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_data = DB::table('users2')
            ->select('*')
            ->whereNotIn('id', [1])
            ->orderBy('id', 'desc')
            ->paginate(5);
        return view('admin_panel.users_show', compact('user_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        //
        // $edit_data = '';
        if (!empty($id)) {
            $edit_data = Users2::find($id);
            // dd($edit_data);
        }
        $role_data = DB::table('roles')
            ->select('id', 'name')
            ->get();

        return view('admin_panel.users_add', compact('edit_data', 'role_data'));
    }
    public function user_action(Request $request)
    {
        // dd($request->all());
        if (!empty($request->TXTID)) {
            $user = Users2::find($request->TXTID);
            $user->username = !empty($request->username) ? $request->username : '';
            $user->email = !empty($request->email) ? $request->email : '';
            // $user->password = crypt($request->password, 'root');
            $user->post = !empty($request->post) ? '1' : '0';
            $user->category = !empty($request->category) ? '1' : "0";
            $user->tag = !empty($request->tag) ? '1' : "0";
            $user->users = !empty($request->users) ? '1' : "0";
            $user->role = !empty($request->role) ? $request->role : '';
            // $user->status = '1';
            $user->added_by = $request->session()->get('UID');
            $user->updated_at = date('Y-m-d H:i:s');
            // $user-> = null;
            $result = $user->update();
            if ($result) {
                return redirect('admin/users')
                    ->with('success', 'record updated successfully!');
            } else {
                return redirect('admin/users')
                    ->with('error', 'Failed to update record!');
            }
        } else {
            $user['username'] = !empty($request->username) ? $request->username : '';
            $user['email'] = !empty($request->email) ? $request->email : '';
            $user['password'] = crypt($request->password, 'root');
            $user['post'] = !empty($request->post) ? '1' : '0';
            $user['category'] = !empty($request->category) ? '1' : "0";
            $user['tag'] = !empty($request->tag) ? '1' : "0";
            $user['users'] = !empty($request->users) ? '1' : "0";
            $user['role'] = !empty($request->role) ? $request->role : '';
            $user['status'] = '1';
            $user['added_by'] = $request->session()->get('UID');
            $user['created_at'] = date('Y-m-d H:i:s');
            $user['updated_at'] = null;
            $result = Users2::create($user);
            if ($result) {
                return redirect('admin/users')
                    ->with('success', 'Added successfully!');
            } else {
                return redirect('admin/users')
                    ->with('error', 'Failed to add user!');
            }
        }
    }
    public function change_status($id = null, $status_value = null)
    {
        // die('sa');
        $cat1 = Users2::find($id);
        $cat1->status = $status_value;
        $result = $cat1->update();

        if ($result) {
            return redirect('admin/users')
                ->with('success', 'status changed successfully!');
        } else {
            return redirect('admin/users')
                ->with('error', 'Failed to change status!');
        }
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
        // die("a");
        $cat1 = Users2::find($id);
        $result = $cat1->delete();

        if ($result) {
            return redirect('admin/users')
                ->with('success', 'record deleted successfully!');
        } else {
            return redirect('admin/users')
                ->with('error', 'Failed to delete record!');
        }
    }
}