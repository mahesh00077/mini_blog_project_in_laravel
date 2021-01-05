<?php

namespace App\Exports;

use App\Model\admin\ExcelIE;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ExcelIE::all();
    }
}