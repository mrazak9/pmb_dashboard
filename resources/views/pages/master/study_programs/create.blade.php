@extends('layouts.app')

@section('main')
    <div class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Tambah Program Studi</h1>
                    <a href="{{ route('study-programs.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i>Kembali
                    </a>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('study-programs.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="code" class="form-label">Kode <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror"
                                    id="code" name="code" value="{{ old('code') }}" required maxlength="20">
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Kode harus unik dan maksimal 20 karakter.</div>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <label for="level" class="form-label">Jenjang <span class="text-danger">*</span></label>
                                <select class="form-control @error('level') is-invalid @enderror" id="level"
                                    name="level" required>
                                    <option value="">Pilih Jenjang</option>
                                    <option value="D1" {{ old('level') == 'D1' ? 'selected' : '' }}>D1</option>
                                    <option value="D3" {{ old('level') == 'D3' ? 'selected' : '' }}>D3</option>
                                    <option value="S1" {{ old('level') == 'S1' ? 'selected' : '' }}>S1</option>
                                </select>
                                @error('level')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="mb-3">
                                <label for="accreditation" class="form-label">Akreditasi</label>
                                <input type="text" class="form-control @error('accreditation') is-invalid @enderror"
                                    id="accreditation" name="accreditation" value="{{ old('accreditation') }}"
                                    maxlength="10">
                                @error('accreditation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Contoh: A, B, C, Baik Sekali, dll.</div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="4">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                        value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Aktif
                                    </label>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i>Simpan
                                </button>
                                <a href="{{ route('study-programs.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times me-1"></i>Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
