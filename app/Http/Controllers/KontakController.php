<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function kirim(Request $request)
{
    // Validasi
    $request->validate([
        'nama' => 'required|string',
        'email' => 'required|email',
        'pesan' => 'required',
    ]);

    // Proses kirim, misal: simpan ke database atau kirim email
    // Contact::create($request->all());

    // Redirect atau kirim alert sukses
    return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
}
}
