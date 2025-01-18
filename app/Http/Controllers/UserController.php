<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserNoAdminRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        // dd($request);
        $user = User::create($request->validated());

        return redirect()->route('admin.users.index', compact('user'));
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // dd($request);
        $user->update($request->validated());

        return redirect()->route('admin.users.index', compact('user'));
    }

    public function editNoAdmin(User $user)
    {
        $user = auth()->user();

        return view('users.edit', compact('user'));
    }

    public function updateNoAdmin(UpdateUserNoAdminRequest $request, User $user)
    {
        // dd($request);
        $user->update($request->validated());

        return redirect()->route('dashboard', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index', compact('user'));
    }
}
