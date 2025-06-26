@extends('layouts.app')

@section('main')
    <div class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1></i>Detail Program Studi</h1>
                    <div class="btn-group">
                        <a href="{{ route('study-programs.edit', $studyProgram) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        <a href="{{ route('study-programs.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Kembali
                        </a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Informasi Dasar</h5>
                                <table class="table table-borderless">
                                    <tr>
                                        <td><strong>ID:</strong></td>
                                        <td>{{ $studyProgram->id }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Kode:</strong></td>
                                        <td>{{ $studyProgram->code }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nama:</strong></td>
                                        <td>{{ $studyProgram->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Jenjang:</strong></td>
                                        <td><code>{{ $studyProgram->level }}</code></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Akreditasi:</strong></td>
                                        <td><code>{{ $studyProgram->accreditation }}</code></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status:</strong></td>
                                        <td>
                                            @if ($studyProgram->is_active)
                                                <span class="badge bg-success">Aktif</span>
                                            @else
                                                <span class="badge bg-secondary">Tidak Aktif</span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title">Informasi Waktu</h5>
                                <table class="table table-borderless">
                                    <tr>
                                        <td><strong>Dibuat:</strong></td>
                                        <td>{{ $studyProgram->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Diupdate:</strong></td>
                                        <td>{{ $studyProgram->updated_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="btn-group" role="group">
                        <a href="{{ route('study-programs.edit', $studyProgram) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        <form action="{{ route('study-programs.destroy', $studyProgram) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus studi program ini?')">
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
