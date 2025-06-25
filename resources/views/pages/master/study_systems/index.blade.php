@extends('layouts.app')

@section('main')
    <div class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Sistem Studi</h1>
                    <a href="{{ route('study-systems.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i>Tambah Sistem Studi
                    </a>
                </div>

                <div class="card">
                    <div class="card-body">
                        @if ($studySystems->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Deskripsi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($studySystems as $studySystem)
                                            <tr>
                                                <td>{{ $studySystem->id }}</td>
                                                <td><code>{{ $studySystem->code }}</code></td>
                                                <td>{{ $studySystem->name }}</td>
                                                <td>{{ Str::limit($studySystem->description, 50) }}</td>
                                                <td>
                                                    @if ($studySystem->is_active)
                                                        <span class="badge bg-success">Aktif</span>
                                                    @else
                                                        <span class="badge bg-secondary">Tidak Aktif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('study-systems.show', $studySystem) }}"
                                                            class="btn btn-info btn-sm">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('study-systems.edit', $studySystem) }}"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('study-systems.destroy', $studySystem) }}"
                                                            method="POST" class="d-inline"
                                                            onsubmit="return confirm('Yakin ingin menghapus?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-center">
                                {{ $studySystems->links() }}
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Belum ada data sistem studi.</p>
                                <a href="{{ route('study-systems.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-1"></i>Tambah Sistem Studi Pertama
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
