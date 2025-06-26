@extends('layouts.app')

@section('main')
    <div class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1></i>Konsentrasi</h1>
                    <a href="{{ route('concentrations.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i>Tambah Konsentrasi
                    </a>
                </div>

                <div class="card">
                    <div class="card-body">
                        @if ($concentrations->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped align-middle">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Singkatan</th>
                                            <th>Nilai Minimal</th>
                                            <th>Kuota</th>
                                            <th>Program Studi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($concentrations as $concentration)
                                            <tr>
                                                <td>{{ $concentration->id }}</td>
                                                <td><code>{{ $concentration->code }}</code></td>
                                                <td>{{ $concentration->name }}</td>
                                                <td>{{ $concentration->short_name ?? '-' }}</td>
                                                <td>{{ $concentration->min_grade ?? '-' }}</td>
                                                <td>{{ $concentration->quota ?? '-' }}</td>
                                                <td>{{ $concentration->studyProgram->name ?? '-' }}</td>
                                                <td>
                                                    @if ($concentration->is_active)
                                                        <span class="badge bg-success">Aktif</span>
                                                    @else
                                                        <span class="badge bg-secondary">Tidak Aktif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('concentrations.show', $concentration) }}"
                                                            class="btn btn-info btn-sm">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('concentrations.edit', $concentration) }}"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('concentrations.destroy', $concentration) }}"
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
                                {{ $concentrations->links() }}
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Belum ada data konsentrasi.</p>
                                <a href="{{ route('concentrations.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-1"></i>Tambah Konsentrasi Pertama
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
