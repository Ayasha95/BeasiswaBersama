<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/user/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:50', 'unique:users'],
            'no_telepon' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'level' => ['in:User,Admin'], // jika ingin user bisa pilih level
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'nama_lengkap' => $data['nama_lengkap'],
            'nik' => $data['nik'],
            'no_telepon' => $data['no_telepon'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'level' => $data['level'] ?? 'User', // default User
        ]);
    }
}
