<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Admin;
use App\Models\Agent;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index()
    {
       $users = User::with(['roles', 'userable'])->paginate(10); 
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        $people = People::create([
            'fullname' => $request->fullname,
        ]);

        $role = Role::findOrFail($request->role_id);

        if ($role->name === 'admin') {
            $model = Admin::create([
                'people_id' => $people->id
            ]);
        } elseif ($role->name === 'agent') {
            $model = Agent::create([
                'people_id' => $people->id
            ]);
        } else {
            abort(400);
        }

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'userable_id' => $model->id,
            'userable_type' => get_class($model),
        ]);

        $user->roles()->attach($role->id);

        return redirect()->route('users.index')
            ->with('success', 'User berhasil dibuat');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->userable->people->update([
            'fullname' => $request->fullname
        ]);

        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $user->roles()->sync([$request->role_id]);

        return redirect()->route('users.index')
            ->with('success', 'User berhasil diupdate');
    }

    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User berhasil dihapus');
    }
}