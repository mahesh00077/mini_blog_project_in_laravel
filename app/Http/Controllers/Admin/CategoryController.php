<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckSession');
        $this->middleware('CheckMenuCategory');
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
            $editCategoryDetails = Category::find($id);
        }
        $categoryDetails = DB::table('categories')->paginate(5);

        return view('admin_panel.master.category', compact('editCategoryDetails', 'categoryDetails'));
        // return view('admin_panel.master.category');
    }
    public function create()
    {
        //
        echo 'hi';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_update(Request $request)
    {
        if (empty($request->TXTID)) {
            $Category = new Category();
            $Category->name = $request->category_name;
            $Category->slug = $request->slug;
            $Category->added_by = $request->session()->get('UID');
            // print_r($Category);
            // die;
            $data = $Category->save();
            // print_r($data);
            if ($data) {
                return redirect('admin/category')
                    ->with('success', 'Added  successfully!');
            } else {
                return redirect('admin/category')
                    ->with('success', 'Failed to add category!');
            }
        } else {
            $Category = new Category();
            $Category = Category::find($request->TXTID);
            $Category->name = $request->category_name;
            $Category->slug = $request->slug;
            $Category->updated_by = $request->session()->get('UID');
            // print_r($Category);
            // die;
            $data = $Category->update();
            // print_r($data);
            if ($data) {
                return redirect('admin/category')
                    ->with('success', 'category updated successfully!');
            } else {
                return redirect('admin/category')
                    ->with('success', 'Failed to update category!');
            }
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
        dd($request->all());
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
        $cat = Category::find($id);
        // $cat->status=$status;
        $result = $cat->delete();

        if ($result) {
            return redirect('admin/category')
                ->with('success', 'record deleted successfully!');
        } else {
            return redirect('admin/category')
                ->with('error', 'Failed to delete record!');
        }
    }
}