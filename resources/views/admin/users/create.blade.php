@extends('layouts.main.app')

@section('title', 'Daftar Pengguna Baharu')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Daftar Pengguna Baharu</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Laman Utama</a>
            <span class="mx-2">/</span>
            <a href="{{ route('admin.users.index') }}" class="text-decoration-none text-dark">Pengurusan Pengguna</a>
            <span class="mx-2">/</span>
            <a href="{{ route('admin.users.create') }}" class="text-decoration-none text-success">Daftar Pengguna Baharu</a>
        </div>
    </div>
@endsection

@section('content')
    <main class="main-content">
        <div class="content-card">
            <div class="card-header">
                <h3 class="card-title">Maklumat Pengguna Baharu</h3>
                <p class="card-subtitle">Sila isi maklumat pengguna yang akan didaftarkan</p>
            </div>

            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                
                <div class="row">
                    <!-- Personal Information -->
                    <div class="col-md-6">
                        <div class="form-section">
                            <h4 class="section-title">Maklumat Peribadi</h4>
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Penuh <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Emel <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Nombor Telefon</label>
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" 
                                       id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar Profil</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                       id="image" name="image" accept="image/*">
                                <div class="form-text">Format yang diterima: JPG, JPEG, PNG, WEBP. Saiz maksimum: 2MB</div>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Work Information -->
                    <div class="col-md-6">
                        <div class="form-section">
                            <h4 class="section-title">Maklumat Kerja</h4>
                            
                            <div class="mb-3">
                                <label for="position" class="form-label">Jawatan</label>
                                <input type="text" class="form-control @error('position') is-invalid @enderror" 
                                       id="position" name="position" value="{{ old('position') }}">
                                @error('position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="grade" class="form-label">Gred</label>
                                <input type="text" class="form-control @error('grade') is-invalid @enderror" 
                                       id="grade" name="grade" value="{{ old('grade') }}">
                                @error('grade')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="section" class="form-label">Seksyen</label>
                                <input type="text" class="form-control @error('section') is-invalid @enderror" 
                                       id="section" name="section" value="{{ old('section') }}">
                                @error('section')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="department" class="form-label">Jabatan</label>
                                <input type="text" class="form-control @error('department') is-invalid @enderror" 
                                       id="department" name="department" value="{{ old('department') }}">
                                @error('department')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="office_number" class="form-label">Nombor Pejabat</label>
                                <input type="text" class="form-control @error('office_number') is-invalid @enderror" 
                                       id="office_number" name="office_number" value="{{ old('office_number') }}">
                                @error('office_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Information Notice -->
                <div class="alert alert-info mt-4">
                    <h5 class="alert-heading">📋 Maklumat Penting</h5>
                    <ul class="mb-0">
                        <li>Kata laluan akan dijana secara automatik dan dihantar melalui emel</li>
                        <li>Pengguna akan menerima notifikasi pendaftaran melalui emel</li>
                        <li>Status pengguna akan ditetapkan sebagai "Baharu" secara lalai</li>
                        <li>Pengguna perlu diluluskan sebelum boleh mengakses sistem</li>
                    </ul>
                </div>

                <!-- Action Buttons -->
                <div class="form-actions mt-4">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <div>
                            <button type="reset" class="btn btn-outline-secondary me-2">
                                <i class="fas fa-undo"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Daftar Pengguna
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

    @push('css')
    <style>
        .form-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .section-title {
            color: #495057;
            font-size: 1.1rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #dee2e6;
        }
        
        .form-actions {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border-top: 1px solid #dee2e6;
        }
        
        .alert-info {
            border-left: 4px solid #17a2b8;
        }
    </style>
    @endpush

    @push('js')
    <script>
        // Form validation
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        // Image preview
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // You can add image preview functionality here
                    console.log('Image selected:', file.name);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    @endpush
@endsection 