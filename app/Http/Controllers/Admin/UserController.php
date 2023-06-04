<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\{
    CreateRequest,UpdateRequest
};

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.order.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('name')->get();
        return view('admin.order.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        if ($request->has('verify')){
            $verified = now();
        } else {
            $verified = null;
        }
        
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'email_verified_at' => $verified,
        ]);
        $user->assignRole($request->input('role'));

        if ($request->hasFile('image')) {
            $user->addMediaFromRequest('image')->toMediaCollection('profile_image');
        }
        
        if ($user) {
            return to_route('admin.users.index')->with('success','User has been successfully Added');
        } 
        return to_route('admin.users.index')->with('error','Something went wrong!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::orderBy('name')->get();
        return view('admin.order.users.edit',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        if ($request->input('user_selected_role') != $request->input('role')) {
            $user->syncRoles($request->input('role'));
        } 

        if ($request->hasFile('image')) {
            $image = $user->getFirstMedia('profile_image');
            if (!empty($image)) {
                $image->delete();
            }
            $user->addMediaFromRequest('image')->toMediaCollection('profile_image');
        }

        if ($user) {
            return to_route('admin.users.index')->with('success','User has been successfully Updated.');
        } 
        return to_route('admin.users.index')->with('error','Something went wrong!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('admin.users.index')->with('error','User deleted successfully.');
    }
}
