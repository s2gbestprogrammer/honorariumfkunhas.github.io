<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.admin.profile.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $validateData = $request->validate([
            'name' => 'required|min:5|min:255',
            'password' => 'required|min:5'
        ]);
        User::where('id', auth()->user()->id)->update($validateData);

        return back()->with('success', 'berhasil mengupdate profile');
    }
}
