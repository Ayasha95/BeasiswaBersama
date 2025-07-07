<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create(['title' => 'faq', 'content' => 'Ini halaman FAQ']);
        Page::create(['title' => 'kontak-kami', 'content' => 'Hubungi kami di sini']);
    }
}
