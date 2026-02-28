<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Role;
use App\Models\People;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        $field = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$field => $request->login, 'password' => $request->password])) {
            $request->session()->regenerate();

            return $this->redirectByRole(Auth::user());
        }

        return back()->withErrors(['login' => 'Login gagal, username/email atau password salah']);
    }

    // Redirect user berdasarkan role
    private function redirectByRole(User $user)
    {
        if ($user->roles()->where('name', 'admin')->exists()) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->roles()->where('name', 'agent')->exists()) {
            return redirect()->route('agent.dashboard');
        }

        if ($user->roles()->where('name', 'jemaah')->exists()) {
            return redirect()->route('jemaah.dashboard');
        }

        // default jika role lain
        return redirect('/dashboard');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // Tampilkan halaman register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
        ]);

        DB::beginTransaction();

        try {
            // Simpan ke people
            $people = People::create([
                'fullname' => $request->name
            ]);

            // Simpan ke users
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'userable_id' => $people->id,
                'userable_type' => People::class
            ]);

            // Assign role default = user
            $role = Role::where('name', 'user')->first();
            if ($role) {
                $user->roles()->attach($role->id);
            }

            DB::commit();

            return redirect('/login')->with('success', 'Register berhasil, silakan login');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Register gagal: ' . $e->getMessage()]);
        }
    }
}