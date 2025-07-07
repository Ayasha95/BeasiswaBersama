@extends('frontend.layouts.main')

@section('content')
<!-- ======= Frequently Asked Questions Section ======= -->
<section id="faq" class="faq section-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-title text-left">
      <h2>F.A.Q</h2>
      <h3>Pertanyaan Umum tentang <span>Beasiswa Bersama</span></h3>
      <p>Temukan jawaban atas pertanyaan yang sering diajukan mengenai pendaftaran, persyaratan, dan proses seleksi Beasiswa Bersama.</p>
    </div>
    <ul class="faq-list">
      <li>
        <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">
          Apa itu Beasiswa Bersama? 
          <i class="bi bi-chevron-down icon-show"></i>
          <i class="bi bi-chevron-up icon-close"></i>
        </div>
        <div id="faq1" class="collapse" data-bs-parent=".faq-list">
          <p>Beasiswa Bersama adalah program bantuan pendidikan yang diberikan kepada mahasiswa berprestasi yang berasal dari keluarga kurang mampu secara ekonomi. 
            Tujuan utama program ini adalah untuk memastikan bahwa keterbatasan finansial tidak menjadi penghalang bagi peserta didik yang memiliki potensi akademik tinggi untuk melanjutkan pendidikan mereka. 
            Beasiswa ini umumnya mencakup pembiayaan biaya sekolah atau kuliah, uang saku, perlengkapan belajar, hingga pelatihan pengembangan diri. 
            Disebut “bersama” karena program ini biasanya diselenggarakan melalui kerja sama antara lembaga pendidikan, pemerintah, organisasi sosial, dan sektor swasta yang memiliki kepedulian terhadap akses pendidikan yang merata dan berkeadilan. 
            Selain mempertimbangkan prestasi akademik, Beasiswa Bersama juga sering memasukkan kriteria seperti kepemimpinan, semangat belajar, dan kontribusi sosial dalam proses seleksinya.</p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">
          Bagaimana cara mendaftar Beasiswa Bersama?
          <i class="bi bi-chevron-down icon-show"></i>
          <i class="bi bi-chevron-up icon-close"></i>
        </div>
        <div id="faq2" class="collapse" data-bs-parent=".faq-list">
          <p>Untuk mendaftar Beasiswa Bersama, calon peserta perlu mengakses situs resmi program tersebut dan menuju ke menu “Pendaftaran” yang tersedia di halaman utama. 
            Setelah itu, pelamar diminta untuk mengisi formulir pendaftaran secara lengkap, yang mencakup data pribadi, riwayat pendidikan, serta motivasi mengikuti program beasiswa. 
            Selain itu, peserta juga harus mengunggah dokumen-dokumen pendukung seperti fotokopi identitas diri, ijazah atau rapor terakhir, surat rekomendasi, dan dokumen lain yang disyaratkan oleh penyelenggara. 
            Pastikan semua informasi yang diisi akurat dan dokumen yang diunggah sesuai format yang ditentukan agar proses seleksi berjalan lancar. 
            Setelah formulir dikirim, pelamar akan menerima notifikasi atau email konfirmasi sebagai bukti bahwa pendaftaran telah berhasil dilakukan.</p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">
          Apa saja dokumen yang diperlukan untuk pendaftaran?
          <i class="bi bi-chevron-down icon-show"></i>
          <i class="bi bi-chevron-up icon-close"></i>
        </div>
        <div id="faq3" class="collapse" data-bs-parent=".faq-list">
          <p>Untuk mendaftar Beasiswa Bersama, pelamar diwajibkan menyiapkan sejumlah dokumen penting yang mendukung kelayakan dan kredibilitas mereka sebagai calon penerima. 
            Dokumen utama yang harus disiapkan antara lain adalah kartu identitas resmi seperti KTP atau kartu pelajar yang masih berlaku, yang berfungsi untuk verifikasi data diri. 
            Selain itu, pelamar perlu menyertakan surat rekomendasi dari pihak yang relevan, seperti guru, dosen, atau atasan, yang dapat memberikan penilaian objektif terhadap karakter dan potensi akademik atau profesional pelamar. 
            Esai motivasi juga menjadi bagian penting, karena melalui tulisan ini, pelamar dapat menjelaskan alasan mereka mendaftar, tujuan pendidikan yang ingin dicapai, serta kontribusi yang ingin diberikan setelah menerima beasiswa. 
            Tak kalah penting, pelamar harus melampirkan bukti akademik seperti ijazah terakhir, transkrip nilai, atau rapor yang menunjukkan prestasi akademik mereka.</p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">
          Kapan batas waktu pendaftaran?
          <i class="bi bi-chevron-down icon-show"></i>
          <i class="bi bi-chevron-up icon-close"></i>
        </div>
        <div id="faq4" class="collapse" data-bs-parent=".faq-list">
          <p>Batas akhir pengumpulan formulir dan dokumen kelengkapan untuk pendaftaran Beasiswa Bersama adalah hingga 10 September 2025. 
            Setelah tanggal tersebut, sistem pendaftaran akan ditutup secara otomatis, sehingga pelamar tidak dapat lagi mengirimkan berkas atau melakukan pembaruan data apa pun. 
            Oleh karena itu, sangat disarankan agar seluruh persyaratan disiapkan jauh-jauh hari dan proses pendaftaran diselesaikan sebelum tanggal tersebut untuk menghindari kendala teknis maupun keterlambatan yang bisa menggugurkan peluang.</p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">
          Siapa yang dapat mengajukan Beasiswa Bersama?
          <i class="bi bi-chevron-down icon-show"></i>
          <i class="bi bi-chevron-up icon-close"></i>
        </div>
        <div id="faq5" class="collapse" data-bs-parent=".faq-list">
          <p>Beasiswa Bersama dapat diajukan oleh mahasiswa yang memiliki prestasi akademik yang baik namun keterbatasan finansial dalam melanjutkan pendidikan. 
            Program ini ditujukan untuk individu yang menunjukkan komitmen tinggi terhadap pendidikan dan memiliki semangat untuk berkembang, tetapi berasal dari keluarga dengan penghasilan terbatas. 
            Selain itu, pelamar harus memenuhi persyaratan akademik yang telah ditentukan, seperti nilai rapor atau IPK minimum, serta tidak sedang menerima beasiswa lain pada saat pendaftaran.</p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">
          Bagaimana cara menghubungi tim dukungan?
          <i class="bi bi-chevron-down icon-show"></i>
          <i class="bi bi-chevron-up icon-close"></i>
        </div>
        <div id="faq6" class="collapse" data-bs-parent=".faq-list">
          <p>Anda bisa menghubungi tim dukungan melalui email resmi atau media sosial yang tercantum di website.</p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" href="#faq7" class="collapsed question">
          Apakah mahasiswa dari semua jurusan bisa mendaftar Beasiswa Bersama?
          <i class="bi bi-chevron-down icon-show"></i>
          <i class="bi bi-chevron-up icon-close"></i>
        </div>
        <div id="faq7" class="collapse" data-bs-parent=".faq-list">
          <p>Ya, Beasiswa Bersama terbuka untuk mahasiswa dari berbagai jurusan, selama mereka memenuhi persyaratan yang sudah ditetapkan. 
            Program ini tidak membatasi bidang studi tertentu, karena tujuannya adalah memberikan kesempatan pendidikan yang merata bagi mahasiswa berprestasi dari latar belakang akademik yang beragam.</p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" href="#faq8" class="collapsed question">
          Apakah mahasiswa semester awal bisa mendaftar?
          <i class="bi bi-chevron-down icon-show"></i>
          <i class="bi bi-chevron-up icon-close"></i>
        </div>
        <div id="faq8" class="collapse" data-bs-parent=".faq-list">
          <p>Mahasiswa semester awal diperbolehkan mendaftar selama mereka memiliki dokumen pendukung 
            seperti transkrip nilai sementara dan surat keterangan aktif kuliah. 
            Namun, beberapa program beasiswa mungkin memberikan prioritas kepada mahasiswa di semester pertengahan atau akhir yang telah menunjukkan konsistensi akademik.</p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" href="#faq9" class="collapsed question">
          Apakah kegiatan organisasi di kampus memengaruhi peluang diterima?
          <i class="bi bi-chevron-down icon-show"></i>
          <i class="bi bi-chevron-up icon-close"></i>
        </div>
        <div id="faq9" class="collapse" data-bs-parent=".faq-list">
          <p>Keterlibatan dalam organisasi kampus dapat menjadi nilai tambah dalam proses seleksi. 
            Meskipun bukan syarat utama, pengalaman organisasi sering kali memperkuat esai motivasi dan menunjukkan potensi kontribusi pelamar di luar akademik.</p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" href="#faq10" class="collapsed question">
          Apakah mahasiswa dari perguruan tinggi swasta bisa mendaftar?
          <i class="bi bi-chevron-down icon-show"></i>
          <i class="bi bi-chevron-up icon-close"></i>
        </div>
        <div id="faq10" class="collapse" data-bs-parent=".faq-list">
          <p>Beasiswa Bersama tidak membedakan antara mahasiswa dari perguruan tinggi negeri maupun swasta. 
            Selama institusi pendidikan tersebut terakreditasi dan pelamar memenuhi syarat lainnya, 
            pelamar memiliki kesempatan yang sama untuk mengikuti seleksi.</p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" href="#faq11" class="collapsed question">
          Apakah mahasiswa dari perguruan tinggi swasta bisa mendaftar?
          <i class="bi bi-chevron-down icon-show"></i>
          <i class="bi bi-chevron-up icon-close"></i>
        </div>
        <div id="faq11" class="collapse" data-bs-parent=".faq-list">
          <p>Beasiswa Bersama tidak membedakan antara mahasiswa dari perguruan tinggi negeri maupun swasta. 
            Selama institusi pendidikan tersebut terakreditasi dan pelamar memenuhi syarat lainnya, 
            pelamar memiliki kesempatan yang sama untuk mengikuti seleksi.</p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" href="#faq12" class="collapsed question">
          Apakah mahasiswa dari program diploma juga bisa mendaftar Beasiswa Bersama?
          <i class="bi bi-chevron-down icon-show"></i>
          <i class="bi bi-chevron-up icon-close"></i>
        </div>
        <div id="faq12" class="collapse" data-bs-parent=".faq-list">
          <p>Mahasiswa dari program diploma diperbolehkan mendaftar Beasiswa Bersama selama mereka memenuhi persyaratan umum yang ditetapkan, 
            seperti status aktif sebagai mahasiswa, prestasi akademik yang memadai, dan kondisi finansial yang sesuai. 
            Program ini tidak membatasi jenjang pendidikan tertentu, sehingga mahasiswa D3 maupun D4 memiliki kesempatan yang sama untuk mengikuti seleksi.</p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" href="#faq13" class="collapsed question">
          Apakah mahasiswa dari program diploma juga bisa mendaftar Beasiswa Bersama?
          <i class="bi bi-chevron-down icon-show"></i>
          <i class="bi bi-chevron-up icon-close"></i>
        </div>
        <div id="faq13" class="collapse" data-bs-parent=".faq-list">
          <p>Mahasiswa dari program diploma diperbolehkan mendaftar Beasiswa Bersama selama mereka memenuhi persyaratan umum yang ditetapkan, 
            seperti status aktif sebagai mahasiswa, prestasi akademik yang memadai, dan kondisi finansial yang sesuai. 
            Program ini tidak membatasi jenjang pendidikan tertentu, sehingga mahasiswa D3 maupun D4 memiliki kesempatan yang sama untuk mengikuti seleksi.</p>
        </div>
      </li>

      <li>
        <div data-bs-toggle="collapse" href="#faq14" class="collapsed question">
          Apakah mahasiswa kelas karyawan bisa mendaftar?
          <i class="bi bi-chevron-down icon-show"></i>
          <i class="bi bi-chevron-up icon-close"></i>
        </div>
        <div id="faq14" class="collapse" data-bs-parent=".faq-list">
          <p>Mahasiswa kelas karyawan dapat mendaftar Beasiswa Bersama selama mereka memenuhi syarat akademik dan administratif. 
            Namun, mereka perlu menjelaskan dalam esai motivasi bagaimana mereka membagi waktu antara pekerjaan dan studi, 
            serta bagaimana beasiswa ini akan membantu mereka menyelesaikan pendidikan dengan lebih baik.</p>
        </div>
      </li>
    </ul>
  </div>
</section>
@endsection