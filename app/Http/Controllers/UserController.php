<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    

    public function index(User $user)
    {
        return view('dashboard.admin.users.index', [
            'users' => User::all(),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view('dashboard.admin.users.create', [
            'users' => User::all(),
            'divisions' => Division::all()
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
        //

        $validateData = $request->validate([
            'name' => 'required|max:255|min:3',
            'username' => 'required|min:3|unique:users',
            'golongan' => 'required',
            'division_id' => 'required',
            'rekening' => 'required',
            'bank' => 'required',
            'password' => 'required|min:5|max:255',
            'role' => 'required',
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return redirect('/dashboard/admin/users')->with('success', "new user has been created");
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.admin.users.edit', [
            'user' => $user,
            'divisions' => Division::all()
        ]);
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


        $validateData = $request->validate([
            'name' => 'required|max:255|min:3',
            'username' => 'required|min:3',
            'golongan' => 'required',
            'division_id' => 'required',
            'rekening' => 'required',
            'bank' => 'required',
            'role' => 'required',
        ]);

        User::where('id', $user->id)->update($validateData);


        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('/dashboard/admin/users')->with('success', "new user has been deleted");
    }
}
