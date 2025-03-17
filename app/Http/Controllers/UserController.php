<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use App\Models\Role;
use Spatie\Permission\Models\Role;



use function PHPUnit\Framework\returnSelf;

class UserController extends Controller
{
    public function __construct()
    {
        // examples:
        $this->middleware(['permission:role-list|role-create|role-edit|role-delete'], ["only" => ["index", "show"]]);
        $this->middleware(['permission:role-create'], ["only" => ["create", "store"]]);
        $this->middleware(['permission:role-edit'], ["only" => ["edit", "update"]]);
        $this->middleware(['permission:role-delete'], ["only" => ["destroy"]]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required"
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        $user->syncRoles($request->roles);

        return redirect()->route('users.index')->with("success", "New User Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $roles = Role::all();
        $user = User::find($id);
        return view('users.show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::all();
        $user = User::find($id);
        return view('users.edit', compact('user', 'roles'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required"
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->syncRoles($request->roles);

        return redirect()->route('users.index')->with("success", "User Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->with("success", "User Deleted Done");
    }

    public function justapi()
    {
        return ["message" => "just Api"];
    }
}
