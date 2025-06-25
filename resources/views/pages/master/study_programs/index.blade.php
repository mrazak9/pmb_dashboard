@extends('layouts.app')

@section('main')
    <div class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1></i>Program Studi</h1>
                    <a href="{{ route('study-programs.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i>Tambah Program Studi
                    </a>
                </div>

                <div class="card">
                    <div class="card-body">
                        @if ($studyPrograms->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Jenjang</th>
                                            <th>Akreditasi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($studyPrograms as $program)
                                            <tr>
                                                <td>{{ $program->id }}</td>
                                                <td><code>{{ $program->code }}</code></td>
                                                <td>{{ $program->name }}</td>
                                                <td><span class="badge bg-info">{{ $program->level }}</span></td>
                                                <td>
                                                    @if ($program->accreditation)
                                                        <span class="badge bg-success">{{ $program->accreditation }}</span>
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($program->is_active)
                                                        <span class="badge bg-success">Aktif</span>
                                                    @else
                                                        <span class="badge bg-secondary">Tidak Aktif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('study-programs.show', $program) }}"
                                                            class="btn btn-info btn-sm">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('study-programs.edit', $program) }}"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('study-programs.destroy', $program) }}"
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

                            {{-- <div class="d-flex justify-content-center">
                                {{ $studyPrograms->links() }}
                            </div> --}}
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Belum ada data program studi.</p>
                                <a href="{{ route('study-programs.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-1"></i>Tambah Program Studi Pertama
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
