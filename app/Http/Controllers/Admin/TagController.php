<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\admin\Tag;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckSession');
        $this->middleware('CheckMenuTag');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        //
        if (!empty($id)) {
            $editTagDetails = Tag::find($id);
        }
        $tagDetails = DB::table('tags')->paginate(5);

        return view('admin_panel.master.tag', compact('editTagDetails', 'tagDetails'));
        // return view('admin_panel.master.tag_show');
    }
    public function add_update(Request $request)
    {
        if (empty($request->TXTID)) {
            $tag = new Tag();
            $tag->name = $request->tag_name;
            $tag->slug = $request->slug;
            $tag->added_by = $request->session()->get('UID');
            // print_r($Category);
            // die;
            $data = $tag->save();
            // print_r($data);
            if ($data) {
                return redirect('admin/tag')
                    ->with('success', 'Added  successfully!');
            } else {
                return redirect('admin/tag')
                    ->with('success', 'Failed to add category!');
            }
        } else {
            $tag = new Tag();
            $tag = Tag::find($request->TXTID);
            $tag->name = $request->tag_name;
            $tag->slug = $request->slug;
            $tag->updated_by = $request->session()->get('UID');
            // print_r($tag);
            // die;
            $data = $tag->update();
            // print_r($data);
            if ($data) {
                return redirect('admin/tag')
                    ->with('success', 'tag updated successfully!');
            } else {
                return redirect('admin/tag')
                    ->with('success', 'Failed to update tag!');
            }
        }
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
        $cat = Tag::find($id);
        // $cat->status=$status;
        $result = $cat->delete();

        if ($result) {
            return redirect('admin/tag')
                ->with('success', 'record deleted successfully!');
        } else {
            return redirect('admin/tag')
                ->with('error', 'Failed to delete record!');
        }
        //
    }
}