<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ClassAkun extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function profil()
    {
        return view('profil');
    }

    public function sop()
    {
        return view('sop');
    }

    public function biodata()
    {
        $users = User::all();
        return view('akun/biodata',compact(['users']));
    }


    public function edit_biodata(Request $request, $id)
    {

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'usia' => 'required',
            'status' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $akuns = User::find($id);
        $akuns->update($data);
        return back()->with('berhasil', 'Biodata berhasil di update');


    }


    public function upass()
    {
        return view('akun.upass');
    }

    public function login()
    {
        return view('akun.login');
    }


    public function verifikasi(Request $request)
    {

        $sleksi = $request->validate([
            'password' => ['password',],
        ]);
        
         if ($sleksi){
            return redirect('passb')->with('berhasil', 'Berhasil melakukan verifikasi');
        }else{
            return redirect('upass')->with('gagal', 'Gagal melakukan verifikasi');
        }

    }

    public function passb()
    {
        return view('akun.passb');                
    }

    public function update_pass(Request $request, $id)
    {
        $data = $request->validate([
            'password' => 'required',
        ]);

        $data['password'] = Hash::make($data['password']);

        $akuns = User::find($id);
        $akuns->update($data);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login')->with('berhasil', 'Berhasil ubah password, Silakan ulangi login dengan paassword baru');     
    }

    public function dashboard()
    {
        return view('akun/dashboard');
    }

    public function action_login(Request $request)
    {
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required',],
        ]);
        
         if (Auth::attempt($credentials)){
            return redirect()->intended('dashboard')->with('berhasil', 'Berhasil Login');
        }

        
        return back()->with('loginError', 'Gagal login, Password salah');
    }


    public function akun()
    {   
        $akuns = User::all();
        return view('akun/akun', compact((['akuns'])));
    }

    public function eakun()
    {
        return view('akun/entri-akun');
    }

    public function action_akun(Request $request)
    {
        $data = $request->validate([
            'no_ktp' => 'required',
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'status_akses' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'usia' => 'required',
            'status' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect('akun')->with('berhasil', 'Data akun berhasil ditambah');
    }

    public function edit($id)
    {
        $akuns = User::find($id);
        return view('akun/edit-akun',compact(['akuns']));
    }

    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'status_akses' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'usia' => 'required',
            'status' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $akuns = User::find($id);
        $akuns->update($data);
        return redirect('akun')->with('berhasil', 'Data akun berhasil update');
    }

    public function delete(Request $request, $id)
    {
        $akuns = User::find($id);
        $akuns->delete($request->all());
        return redirect('akun')->with('berhasil', 'Data akun berhasil hapus');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('berhasil', 'Berhasil keluar dari halaman akun');
    }

}
