<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\Role;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data=User::all();
       $roles=Role::all();
        return view("admin.user.index",[
            'data' => $data,
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new RoleUser();
        $data->user_id = $request->user_id;
        $data->role_id = $request->roles;
        $data->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uid,$rid)
    {
        $user=User::find($uid);
        $user->roles()->detach($rid);#Many to Many relation delete related data
        return back();
    }
}
