<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Honor;
use App\Models\User;
use Illuminate\Http\Request;

class HonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.honor.index', [
            'honors' => Honor::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.honor.create', [
            'users' => User::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $golongan = $request->golongan;

        if($golongan == "I" || $golongan == "II")
        {
            $potongan = 0;
        } else if($golongan == "III")
        {
            $potongan = 5;
        } else if($golongan == "IV")
        {
            $potongan = 15;
        } else {
            $potongan = 0;
        }



        $validatedData =  $request->validate([
            'user_id' => 'required',
            'jumlah_honor' => 'required',
            'category_id' => 'required',
        ]);

        $hasil_potongan = ($potongan/100)*$request->jumlah_honor;

        $validatedData['potongan'] = $hasil_potongan;

        $validatedData['jumlah_diterima'] = $request->jumlah_honor - $hasil_potongan;



    Honor::create($validatedData);

    return redirect('dashboard/admin/honor')->with('success', 'berhasil menambah honor ');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $honor)
    {
        return view('dashboard.admin.honor.show-user', [
            'users' => $honor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $honor)
    {
        return view('dashboard.admin.honor.show', [
            "users" => $honor,
            'keterangan' => Category::all()
        ]);
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
        Honor::destroy($id);

        return back();
    }
}
