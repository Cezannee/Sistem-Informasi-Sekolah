@extends('layouts.app')
@section('title', 'Siswa')

@section('content')
<div class="container">
    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h4 mb-0">Data Siswa</h1>
            <div class="text-secondary">Kelola data siswa.</div>
        </div>
        <a href="{{ route('students.create') }}" class="btn btn-primary">
            Tambah Siswa
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width:70px">#</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>JK</th>
                            <th>Tgl Lahir</th>
                            <th style="width:160px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $i => $s)
                            <tr>
                                <td>{{ $students->firstItem() + $i }}</td>
                                <td class="fw-semibold">{{ $s->nis }}</td>
                                <td>{{ $s->name }}</td>
                                <td>{{ $s->gender }}</td>
                                <td>{{ $s->birth_date ? \Carbon\Carbon::parse($s->birth_date)->format('d/m/Y') : '-' }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('students.edit', $s) }}" class="btn btn-sm btn-outline-secondary">Edit</a>

                                        <form action="{{ route('students.destroy', $s) }}" method="POST"
                                              onsubmit="return confirm('Hapus data siswa ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-secondary py-4">
                                    Belum ada data siswa.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $students->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
