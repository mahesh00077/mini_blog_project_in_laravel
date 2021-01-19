<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\ExcelIE;
use DataTables;

class AjaxController extends Controller
{
    /* public function index(Request $request)
    {
        $data = ExcelIE::paginate(5);
        return view('admin_panel.ajax_page', compact('data'));
    } */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = ExcelIE::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    // $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
                    $btn = '<button type="button" data-id="' . $row->id . '" class="btn btn-primary btn-sm edit editProduct" data-toggle="modal" data-target="#modal-default" data-original-title="Edit"
                   >edit</button>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin_panel.ajax_page', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ExcelIE::updateOrCreate(
            ['id' => $request->product_id],
            ['name' => $request->name, 'age' => $request->age, 'city' => $request->city, 'salary' => $request->salary]
        );

        return response()->json(['success' => 'Product saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = ExcelIE::find($id);
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* echo ($id);
        die; */
        ExcelIE::find($id)->delete();

        return response()->json(['success' => 'Product deleted successfully.']);
    }
}