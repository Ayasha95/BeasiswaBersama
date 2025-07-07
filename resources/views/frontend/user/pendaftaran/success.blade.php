@extends('frontend.layouts.main')

@section('title', 'Pendaftaran Berhasil')

@section('content')
<section class="inner-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg mt-5">
                    <div class="card-header bg-gradient-primary text-white text-center py-4">
                        <h3 class="mb-0">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            Pendaftaran Berhasil!
                        </h3>
                    </div>
                    <div class="card-body text-center p-5">
                        <div class="mb-4">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 5rem;"></i>
                        </div>
                        
                        <h4 class="text-success mb-3">Selamat! Pendaftaran Anda Berhasil</h4>
                        
                        <p class="text-muted mb-4">
                            Pendaftaran beasiswa Anda telah berhasil disimpan dan sedang dalam proses review. 
                            Tim kami akan segera memeriksa dokumen yang Anda upload.
                        </p>
                        
                        <div class="alert alert-info text-start">
                            <h6 class="alert-heading">
                                <i class="bi bi-info-circle me-2"></i>
                                Informasi Penting:
                            </h6>
                            <ul class="mb-0">
                                <li>Status pendaftaran Anda saat ini: <strong class="text-warning">Pending</strong></li>
                                <li>Anda akan mendapat notifikasi via email ketika status berubah</li>
                                <li>Pastikan email yang Anda daftarkan aktif dan dapat diakses</li>
                                <li>Proses review biasanya memakan waktu 3-7 hari kerja</li>
                            </ul>
                        </div>
                        
                        <div class="mt-4">
                            <a href="{{ route('user.status') }}" class="btn btn-primary btn-lg me-3">
                                <i class="bi bi-list-check me-2"></i>
                                Lihat Status Pendaftaran
                            </a>
                            <a href="{{ route('user.dashboard') }}" class="btn btn-outline-secondary btn-lg">
                                <i class="bi bi-house me-2"></i>
                                Kembali ke Dashboard
                            </a>
                        </div>
                        @if(isset($data))
                            <a href="{{ route('frontend.pendaftaran.cendekia.show', $data->id) }}" class="btn btn-success btn-lg mt-3">
                                <i class="bi bi-eye me-2"></i> Lihat Detail Pendaftaran
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .card {
        border: none;
        border-radius: 15px;
    }
    
    .card-header {
        border-radius: 15px 15px 0 0 !important;
        border: none;
    }
    
    .text-success {
        color: #28a745 !important;
    }
    
    .alert-info {
        background-color: #f8f9fa;
        border-color: #dee2e6;
        color: #495057;
    }
    
    .btn {
        border-radius: 25px;
        padding: 12px 30px;
    }
    
    .btn-lg {
        padding: 15px 35px;
        font-size: 1.1rem;
    }
    
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
    }
</style>
@endpush 