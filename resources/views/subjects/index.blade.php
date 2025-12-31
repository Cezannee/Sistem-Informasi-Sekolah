@extends('layouts.app')
@section('title', 'Mata Pelajaran')

@section('content')
<div class="container">
    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h4 mb-0">Mata Pelajaran</h1>
            <div class="text-secondary">Kelola data mata pelajaran.</div>
        </div>
        <a href="{{ route('subjects.create') }}" class="btn btn-primary">Tambah Mapel</a>
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
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Bobot / JP</th>
                            <th style="width:160px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($subjects as $i => $s)
                            <tr>
                                <td>{{ $subjects->firstItem() + $i }}</td>
                                <td class="fw-semibold">{{ $s->code }}</td>
                                <td>{{ $s->name }}</td>
                                <td>{{ $s->credit }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('subjects.edit', $s) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <form action="{{ route('subjects.destroy', $s) }}" method="POST"
                                              onsubmit="return confirm('Hapus mata pelajaran ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-secondary py-4">
                                    Belum ada mata pelajaran.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $subjects->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
