<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class DosenImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            "name" => "gila",
            "golongan" => "None",
            "rekening" => "12312",
            "bank" => "Jenius",
            "role" => "dosen"
        ]);
    }
}
