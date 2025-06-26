@extends('layouts.app')

@section('main')
    <div class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1><i class="fas fa-graduation-cap me-2"></i>Detail Konsentrasi</h1>
                    <div class="btn-group">
                        <a href="{{ route('concentrations.edit', $concentration) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        <a href="{{ route('concentrations.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Kembali
                        </a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Informasi Konsentrasi</h5>
                                <table class="table table-borderless">
                                    <tr>
                                        <td><strong>ID:</strong></td>
                                        <td>{{ $concentration->id }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Kode:</strong></td>
                                        <td>{{ $concentration->code }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nama:</strong></td>
                                        <td>{{ $concentration->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nama Singkat:</strong></td>
                                        <td>{{ $concentration->short_name ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Kuota:</strong></td>
                                        <td>{{ $concentration->quota ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nilai Minimal:</strong></td>
                                        <td>{{ $concentration->min_grade ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status:</strong></td>
                                        <td>
                                            @if ($concentration->is_active)
                                                <span class="badge bg-success">Aktif</span>
                                            @else
                                                <span class="badge bg-secondary">Tidak Aktif</span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-6">
                                <h5 class="card-title">Program Studi</h5>
                                <table class="table table-borderless">
                                    <tr>
                                        <td><strong>Nama:</strong></td>
                                        <td>{{ $concentration->studyProgram->name ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Jenjang:</strong></td>
                                        <td>{{ $concentration->studyProgram->level ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Akreditasi:</strong></td>
                                        <td>{{ $concentration->studyProgram->accreditation ?? '-' }}</td>
                                    </tr>
                                </table>

                                <h5 class="card-title mt-4">Informasi Waktu</h5>
                                <table class="table table-borderless">
                                    <tr>
                                        <td><strong>Dibuat:</strong></td>
                                        <td>{{ $concentration->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Diupdate:</strong></td>
                                        <td>{{ $concentration->updated_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        @if ($concentration->description)
                            <div class="mt-4">
                                <h5 class="card-title">Deskripsi</h5>
                                <p>{{ $concentration->description }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mt-3">
                    <div class="btn-group" role="group">
                        <a href="{{ route('concentrations.edit', $concentration) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        <form action="{{ route('concentrations.destroy', $concentration) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus konsentrasi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash me-1"></i>Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
