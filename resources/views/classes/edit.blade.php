@extends('layouts.app')
@section('title', 'Edit Kelas')

@section('content')
<div class="container" style="max-width: 600px;">
    <div class="mb-3">
        <h1 class="h4 mb-0">Edit Kelas</h1>
        <div class="text-secondary">Perbarui data kelas.</div>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <form action="{{ route('classes.update', $classRoom) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-12">
                    <label class="form-label">Nama Kelas</label>
                    <input name="name" value="{{ old('name', $classRoom->name) }}" class="form-control @error('name') is-invalid @enderror" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Tahun Ajaran</label>
                    <input name="year" value="{{ old('year', $classRoom->year) }}" class="form-control @error('year') is-invalid @enderror" required>
                    @error('year') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12 d-flex gap-2">
                    <a href="{{ route('classes.index') }}" class="btn btn-light border">Kembali</a>
                    <button class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
