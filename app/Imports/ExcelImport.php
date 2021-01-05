<?php

namespace App\Imports;

use App\Model\admin\ExcelIE;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ExcelIE([
            //
            'name'     => $row[0],
            'age'    => $row[1],
            'city'    => $row[2],
            'salary'    => $row[3],
            'created_at'    => $row[4],
            // 'password' => \Hash::make('123456'),
        ]);
    }
}