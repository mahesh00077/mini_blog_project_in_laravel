<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
// use Barryvdh\DomPDF\Facade\PDF;
use PDF;

class PdfController extends Controller
{
    //
    public function pdfview(Request $request)
    {
        // dd($request->all());
        // $items = DB::table("excel")->paginate(5);
        $items = DB::table("excel")->get();
        /* var_dump($items[0]->name);
        die; */
        view()->share('items', $items);


        /* if ($request->has('download')) {
            $pdf = PDF::loadView('admin_panel.pdfview');
            return $pdf->download('pdfview.pdf');
        } */
        if ($request->has('download')) {
            $pdf = PDF::loadView('admin_panel.pdfview1');
            // $pdf = PDF::loadHTML('<h1>Test</h1>');
            return $pdf->download('invoice.pdf');
        }


        return view('admin_panel.pdfview');
    }
}