<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Imports\DosenImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportDataDosenController extends Controller
{
    //

    public function importdatadosen(Request $request)
    {

        Excel::import(new DosenImport(), $request->file('file'));

        return back()->with('success', 'berhasil mengimport data dosen');

    }

    public function exportdatadosen()
    {
        return Excel::download(new UserExport, 'datadosen.xlsx');
    }
}
