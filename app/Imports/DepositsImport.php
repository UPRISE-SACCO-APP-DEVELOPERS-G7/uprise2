<?php

namespace App\Imports;

use App\Models\Deposits;
use Maatwebsite\Excel\Concerns\ToModel;

class DepositsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Deposits([
            'amount' => $row[0],
            'member_id' => $row[1],
        ]);
    }
}