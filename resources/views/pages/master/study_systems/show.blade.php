@extends('layouts.app')

@section('main')
    <div class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1></i>Detail Sistem Studi</h1>
                    <div class="btn-group">
                        <a href="{{ route('study-systems.edit', $studySystem) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        <a href="{{ route('study-systems.index') }}" class="btn btn-secondary">
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
                                        <td>{{ $studySystem->id }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nama:</strong></td>
                                        <td>{{ $studySystem->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Kode:</strong></td>
                                        <td><code>{{ $studySystem->code }}</code></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status:</strong></td>
                                        <td>
                                            @if ($studySystem->is_active)
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
                                        <td>{{ $studySystem->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Diupdate:</strong></td>
                                        <td>{{ $studySystem->updated_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        @if ($studySystem->description)
                            <div class="mt-4">
                                <h5 class="card-title">Deskripsi</h5>
                                <p class="card-text">{{ $studySystem->description }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mt-3">
                    <div class="btn-group" role="group">
                        <a href="{{ route('study-systems.edit', $studySystem) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        <form action="{{ route('study-systems.destroy', $studySystem) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus sistem studi ini?')">
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
