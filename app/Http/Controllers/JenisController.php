<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        // Data beasiswa sederhana
        $scholarships = [
            [
                'id' => 1,
                'name' => 'Beasiswa Prestasi Akademik',
                'type' => 'prestasi',
                'description' => 'Beasiswa untuk mahasiswa dengan IPK tinggi dan prestasi akademik yang baik.',
                'requirements' => ['IPK minimal 3.5', 'Surat rekomendasi', 'Transkrip nilai'],
                'deadline' => '2025-08-15',
                'quota' => 25,
                'amount' => 'Rp 5.000.000',
                'status' => 'dibuka',
                'color' => 'blue'
            ],
            [
                'id' => 2,
                'name' => 'Beasiswa Inovasi Digital',
                'type' => 'inovasi',
                'description' => 'Program beasiswa untuk mahasiswa yang memiliki karya inovatif di bidang teknologi digital.',
                'requirements' => ['Portofolio project', 'Proposal inovasi', 'Demo aplikasi'],
                'deadline' => '2025-07-20',
                'quota' => 15,
                'amount' => 'Rp 7.500.000',
                'status' => 'ditutup',
                'color' => 'red'
            ],
            [
                'id' => 3,
                'name' => 'Beasiswa Talent Seni',
                'type' => 'seni',
                'description' => 'Beasiswa khusus untuk mahasiswa berbakat di bidang seni musik, tari, teater, dan rupa.',
                'requirements' => ['Portfolio karya seni', 'Video performance', 'Surat rekomendasi'],
                'deadline' => '2025-07-10',
                'quota' => 20,
                'amount' => 'Rp 4.000.000',
                'status' => 'dibuka',
                'color' => 'green'
            ],
            [
                'id' => 4,
                'name' => 'Beasiswa Global Prestasi',
                'type' => 'global',
                'description' => 'Program beasiswa untuk mahasiswa Indonesia yang ingin melanjutkan studi S2 ke luar negeri.',
                'requirements' => ['TOEFL/IELTS', 'Letter of Acceptance', 'Study plan'],
                'deadline' => '2025-08-15',
                'quota' => 5,
                'amount' => 'Full tuition + living allowance',
                'status' => 'segera_dibuka',
                'color' => 'yellow'
            ],
            [
                'id' => 5,
                'name' => 'Beasiswa Sains Jepang',
                'type' => 'internasional',
                'description' => 'Program beasiswa untuk studi teknik dan sains di universitas terkemuka Jepang.',
                'requirements' => ['Kemampuan bahasa Jepang', 'Background STEM', 'Research proposal'],
                'deadline' => '2025-08-20',
                'quota' => 7,
                'amount' => '¥150,000/bulan',
                'status' => 'segera_dibuka',
                'color' => 'purple'
            ],
            [
                'id' => 6,
                'name' => 'Beasiswa Mandiri',
                'type' => 'ekonomi',
                'description' => 'Beasiswa untuk mahasiswa berprestasi dengan keterbatasan ekonomi.',
                'requirements' => ['Surat keterangan tidak mampu', 'IPK minimal 3.0', 'Essay motivasi'],
                'deadline' => '2025-04-21',
                'quota' => 40,
                'amount' => 'Rp 3.000.000',
                'status' => 'ditutup',
                'color' => 'gray'
            ],
            [
                'id' => 7,
                'name' => 'Beasiswa Cendekia',
                'type' => 'penelitian',
                'description' => 'Beasiswa untuk mahasiswa yang menunjukkan semangat dan potensi akademik tinggi dalam penelitian.',
                'requirements' => ['Proposal penelitian', 'Publikasi ilmiah', 'Rekomendasi dosen'],
                'deadline' => '2025-07-05',
                'quota' => 50,
                'amount' => 'Rp 6.000.000',
                'status' => 'dibuka',
                'color' => 'indigo'
            ]
        ];

        return view('pages.jenis', compact('scholarships'));
    }

    public function show($id)
    {
        // Detail beasiswa berdasarkan ID
        // Implementasi untuk halaman detail beasiswa
        return view('pages.detail-beasiswa', compact('id'));
    }

    public function apply($id)
    {
        // Proses pendaftaran beasiswa
        // Implementasi untuk proses pendaftaran
        return redirect()->route('beasiswa.jenis')->with('success', 'Pendaftaran berhasil disubmit!');
    }
}