@extends('layouts.app')

@section('main')
    <div class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Edit Konsentrasi</h1>
                    <a href="{{ route('concentrations.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i>Kembali
                    </a>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('concentrations.update', $concentration) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="study_program_id" class="form-label">Program Studi <span class="text-danger">*</span></label>
                                <select name="study_program_id" id="study_program_id" class="form-select @error('study_program_id') is-invalid @enderror" required>
                                    <option value="">Pilih Program Studi</option>
                                    @foreach ($studyPrograms as $program)
                                        <option value="{{ $program->id }}" {{ old('study_program_id', $concentration->study_program_id) == $program->id ? 'selected' : '' }}>
                                            {{ $program->name }} ({{ $program->level }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('study_program_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="code" class="form-label">Kode <span class="text-danger">*</span></label>
                                <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror"
                                       value="{{ old('code', $concentration->code) }}" required maxlength="20">
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                       value="{{ old('name', $concentration->name) }}" required maxlength="50">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="short_name" class="form-label">Nama Singkat</label>
                                <input type="text" name="short_name" id="short_name" class="form-control @error('short_name') is-invalid @enderror"
                                       value="{{ old('short_name', $concentration->short_name) }}">
                                @error('short_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="quota" class="form-label">Kuota</label>
                                <input type="number" name="quota" id="quota" class="form-control @error('quota') is-invalid @enderror"
                                       value="{{ old('quota', $concentration->quota) }}">
                                @error('quota')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="min_grade" class="form-label">Nilai Minimal</label>
                                <input type="number" step="0.01" name="min_grade" id="min_grade"
                                       class="form-control @error('min_grade') is-invalid @enderror"
                                       value="{{ old('min_grade', $concentration->min_grade) }}">
                                @error('min_grade')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea name="description" id="description" rows="4"
                                          class="form-control @error('description') is-invalid @enderror">{{ old('description', $concentration->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                           value="1" {{ old('is_active', $concentration->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Aktif
                                    </label>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i>Update
                                </button>
                                <a href="{{ route('concentrations.index') }}" class="btn btn-secondary">
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
