@extends('layouts.app')
@section('title', 'Kelas')

@section('content')
<div class="container">
    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h4 mb-0">Data Kelas</h1>
            <div class="text-secondary">Kelola data kelas.</div>
        </div>
        <a href="{{ route('classes.create') }}" class="btn btn-primary">Tambah Kelas</a>
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
                            <th>Nama Kelas</th>
                            <th>Tahun Ajaran</th>
                            <th style="width:160px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($classes as $i => $c)
                            <tr>
                                <td>{{ $classes->firstItem() + $i }}</td>
                                <td class="fw-semibold">{{ $c->name }}</td>
                                <td>{{ $c->year }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('classes.edit', $c) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <form action="{{ route('classes.destroy', $c) }}" method="POST"
                                              onsubmit="return confirm('Hapus data kelas ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-secondary py-4">
                                    Belum ada data kelas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $classes->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
