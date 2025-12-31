@extends('layouts.app')
@section('title', 'Guru')

@section('content')
<div class="container">
    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h4 mb-0">Data Guru</h1>
            <div class="text-secondary">Kelola data guru.</div>
        </div>
        <a href="{{ route('teachers.create') }}" class="btn btn-primary">Tambah Guru</a>
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
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>HP</th>
                            <th style="width:160px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($teachers as $i => $t)
                            <tr>
                                <td>{{ $teachers->firstItem() + $i }}</td>
                                <td class="fw-semibold">{{ $t->nip }}</td>
                                <td>{{ $t->name }}</td>
                                <td>{{ $t->email ?? '-' }}</td>
                                <td>{{ $t->phone ?? '-' }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('teachers.edit', $t) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <form action="{{ route('teachers.destroy', $t) }}" method="POST"
                                              onsubmit="return confirm('Hapus data guru ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-secondary py-4">Belum ada data guru.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $teachers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
