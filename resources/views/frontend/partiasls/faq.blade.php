<!-- ======= Frequently Asked Questions Section ======= -->
<section id="faq" class="faq section-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-title text-left">
      <h2>F.A.Q</h2>
      <h3>Pertanyaan Umum tentang <span>Beasiswa Bersama</span></h3>
      <p>Temukan jawaban atas pertanyaan yang sering diajukan mengenai pendaftaran, persyaratan, dan proses seleksi Beasiswa Bersama.</p>
    </div>

    <ul class="faq-list">
      @foreach([
        ['Apa itu Beasiswa Bersama?', 'Beasiswa Bersama adalah program yang memberikan dukungan finansial kepada siswa berprestasi yang membutuhkan bantuan pendidikan.'],
        ['Bagaimana cara mendaftar Beasiswa Bersama?', 'Pendaftaran dilakukan melalui website resmi. Klik menu "Pendaftaran", isi formulir, dan unggah dokumen yang diperlukan.'],
        ['Apa saja dokumen yang diperlukan untuk pendaftaran?', 'Kartu identitas, surat rekomendasi, esai motivasi, dan bukti akademik.'],
        ['Kapan batas waktu pendaftaran?', 'Diumumkan melalui website resmi. Pastikan untuk selalu memeriksa tanggal terbaru.'],
        ['Siapa yang dapat mengajukan Beasiswa Bersama?', 'Siswa berprestasi dengan kondisi finansial kurang mampu dan memenuhi persyaratan akademik.'],
        ['Bagaimana cara menghubungi tim dukungan?', 'Hubungi melalui email resmi atau media sosial yang tercantum di website.']
      ] as $index => [$question, $answer])
        <li>
          <div data-bs-toggle="collapse" class="collapsed question" href="#faq{{ $index + 1 }}">
            {{ $question }}
            <i class="bi bi-chevron-down icon-show"></i>
            <i class="bi bi-chevron-up icon-close"></i>
          </div>
          <div id="faq{{ $index + 1 }}" class="collapse" data-bs-parent=".faq-list">
            <p>{{ $answer }}</p>
          </div>
        </li>
      @endforeach
    </ul>
  </div>
</section>
<!-- End FAQ -->
