@extends('layouts.app')
@section('title', 'Nilai')

@section('content')
<div class="container">
    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h4 mb-0">Nilai</h1>
            <div class="text-secondary">Kelola nilai siswa per mata pelajaran.</div>
        </div>
        <a href="{{ route('grades.create') }}" class="btn btn-primary">Tambah Nilai</a>
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
                            <th>Siswa</th>
                            <th>Mapel</th>
                            <th>Tahun</th>
                            <th>Sem</th>
                            <th>Tugas</th>
                            <th>UTS</th>
                            <th>UAS</th>
                            <th>Nilai Akhir</th>
                            <th style="width:160px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($grades as $i => $g)
                            <tr>
                                <td>{{ $grades->firstItem() + $i }}</td>
                                <td class="fw-semibold">{{ $g->student->name }}</td>
                                <td>{{ $g->subject->name }}</td>
                                <td>{{ $g->year }}</td>
                                <td>{{ $g->semester }}</td>
                                <td>{{ $g->task_score }}</td>
                                <td>{{ $g->mid_score }}</td>
                                <td>{{ $g->final_score }}</td>
                                <td class="fw-semibold">{{ $g->final_grade }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('grades.edit', $g) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <form action="{{ route('grades.destroy', $g) }}" method="POST"
                                              onsubmit="return confirm('Hapus data nilai ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center text-secondary py-4">
                                    Belum ada data nilai.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $grades->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
