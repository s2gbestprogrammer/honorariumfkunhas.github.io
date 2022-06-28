<?php

namespace App\Imports;

use App\Models\Division;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;


class DosenImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {



        $nama_lengkap = $row['username'];
        $nama_lengkap =  Str::lower($nama_lengkap); 
        $nama_lengkap = str_replace(' ', '', $nama_lengkap);

        $golongan = $row['golongan'];
        
        $golongan = str_replace('.a', '', $golongan);
        $golongan = str_replace('.b', '', $golongan);
        $golongan = str_replace('.c', '', $golongan);
        $golongan = str_replace('.d', '', $golongan);

        $numbers = rand(1 , 99);
    
        $username = $nama_lengkap . $numbers;

        return new User([
            "name" => $row['name'],
            "golongan" => $golongan ?? '-',
            "division_id" =>  $row['prodi'] ?? '-',
            "fungsional" => $row['fungsional'],
            "username" => $username,
            "password" => Hash::make("nrt796pr71"),
            "rekening" => $row['rekening'] ?? '-',
            "bank" => $row['bank'] ?? '-',
            "role" => "dosen"
        ]);



        
        // if(str_contains($nama_lengkap, ',')) {
        //     $nama_lengkap = substr($nama_lengkap, 0, strpos($nama_lengkap, ','));
        // }
    }
}
