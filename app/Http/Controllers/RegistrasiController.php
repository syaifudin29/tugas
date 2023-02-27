<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegistrasiController extends Controller
{
    public function index(){
        
        $data = ['user' =>  User::get()];
        return view('welcome', $data);
    }

    public function prosesRegistrasi(Request $request){
        $data = $request->validate([
            'nama' => ['required'],
            'jenis_kelamin' => ['required'],
            'hobi' => ['required'],
            'email' => ['required', 'unique:users,email', 'email:rfc,dns' ],
            'telp' => ['required', 'numeric'],
            'username' => ['required', 'unique:users', 'max:10'],
            'password' => ['required','min:7'],
        ]);
        $data['hobi'] = implode(', ', $request->hobi);

        User::create($data);
        session()->flash('notif', 'Tambah');
        return redirect()->to('/');
    }

    public function hapusRegistrasi($id){
        User::find($id)->delete();
        session()->flash('notif', 'Hapus');
        return redirect()->to('/');
    }
}