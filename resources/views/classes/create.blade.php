@extends('layouts.app')
@section('title', 'Tambah Kelas')

@section('content')
<div class="container" style="max-width: 600px;">
    <div class="mb-3">
        <h1 class="h4 mb-0">Tambah Kelas</h1>
        <div class="text-secondary">Masukkan data kelas baru.</div>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <form action="{{ route('classes.store') }}" method="POST" class="row g-3">
                @csrf

                <div class="col-12">
                    <label class="form-label">Nama Kelas</label>
                    <input name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Tahun Ajaran</label>
                    <input name="year" value="{{ old('year') }}" class="form-control @error('year') is-invalid @enderror" placeholder="2024/2025" required>
                    @error('year') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12 d-flex gap-2">
                    <a href="{{ route('classes.index') }}" class="btn btn-light border">Batal</a>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
