<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function storeLoginPenulis(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ], [
            'required' => ':attribute harus diisi.'
        ], [
            'username' => 'Username',
            'password' => 'Password'
        ]);

        try {
            $penulis = \DB::table('penulis')->where('username', $request->username)->first();

            if ($penulis) {
                if ($request->password == $penulis->password) {
                    Session::put('id', $penulis->id);
                    Session::put('username', $penulis->username);
                    return redirect('/dashboard');
                }
                else
                    return back()->withError('Password yang Anda masukkan tidak sesuai.');
            }
            else
                return back()->withError('Akun tidak ditemukan.');
        } catch (\Exception $e) {
            return back()->withError('Terjadi kesalahan');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->withError('Terjadi kesalahan pada database');
        }
    }

    public function indexAdmin()
    {
        return view('auth.login-admin');
    }

    public function storeLoginAdmin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ], [
            'required' => ':attribute harus diisi.'
        ], [
            'username' => 'Username',
            'password' => 'Password'
        ]);

        try {
            $admin = DB::table('admin')->where('username', $request->username)->first();

            if ($admin) {
                if ($request->password == $admin->password) {
                    Session::put('username', $admin->username);
                    return redirect('/dashboard');
                }
                else
                    return back()->withError('Password yang Anda masukkan tidak sesuai.');
            }
            else
                return back()->withError('Akun tidak ditemukan.');
        } catch (\Exception $e) {
            return back()->withError('Terjadi kesalahan');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->withError('Terjadi kesalahan pada database');
        }
    }

    public function registerPenulis()
    {
        return view('auth.register');
    }

    public function storeRegisterPenulis(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:penulis,username|max:50',
            'password' => 'required|max:10'
        ], [
            'required' => ':attribute harus diisi.',
            'unique' => ':attribute telah digunakan.',
            'username.max' => 'Maksimal panjang karakter 50',
            'password.max' => 'Maksimal panjang karakter 10',
        ], [
            'username' => 'Username',
            'password' => 'Password'
        ]);

        try {
            \DB::table('penulis')->insert([
                'username' => $request->username,
                'password' => $request->password,
            ]);

            return redirect('/login');
        } catch (\Exception $e) {
            return back()->withError('Terjadi kesalahan');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->withError('Terjadi kesalahan pada database');
        }
    }
}
