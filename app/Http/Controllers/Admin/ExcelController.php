<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use App\Imports\ExcelImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Model\admin\ExcelIE;

class ExcelController extends Controller
{
    //
    public function __construct()
    {
        // die("as");
    }
    public function index()
    {
        $data = DB::table('excel')
            ->select('*')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin_panel.excel_show', compact('data'));
    }
    /* public function importExportView()
    {
        return view('import');
    } */

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        // die('a');
        $products = ExcelIE::get()->toArray();
        return \Excel::create('expertphp_demo', function ($excel) use ($products) {
            $excel->sheet('sheet name', function ($sheet) use ($products) {
                $sheet->fromArray($products);
            });
        })->download('csv');
        // return Excel::download(new ExcelExport, 'users.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import(Request $request)
    {
        // Excel::import(new ExcelImport, request()->file('file'));
        if ($request->hasFile('file')) {
            $path = $request->file('file')->getRealPath();
            $data = \Excel::load($path)->get();
            // dd($data);
            if ($data->count()) {
                foreach ($data as $key => $value) {
                    // dd($value->name);
                    $arr[] = ['name' => $value->name, 'age' => $value->age, 'city' => $value->city, 'salary' => $value->salary, 'created_at' => date('Y-m-d H:i:s', strtotime($value->created_at))];
                }
                if (!empty($arr)) {
                    \DB::table('excel')->insert($arr);
                    dd('Insert Record successfully.');
                }
            }
        }
        dd('Request data does not have any files to import.');

        return back();
    }
}