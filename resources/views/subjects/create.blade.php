@extends('layouts.app')
@section('title', 'Tambah Mapel')

@section('content')
<div class="container" style="max-width: 720px;">
    <div class="mb-3">
        <h1 class="h4 mb-0">Tambah Mata Pelajaran</h1>
        <div class="text-secondary">Masukkan data mapel baru.</div>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <form action="{{ route('subjects.store') }}" method="POST" class="row g-3">
                @csrf

                <div class="col-md-4">
                    <label class="form-label">Kode</label>
                    <input name="code" value="{{ old('code') }}"
                           class="form-control @error('code') is-invalid @enderror" required>
                    @error('code') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-8">
                    <label class="form-label">Nama Mata Pelajaran</label>
                    <input name="name" value="{{ old('name') }}"
                           class="form-control @error('name') is-invalid @enderror" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Bobot / JP</label>
                    <input type="number" name="credit" value="{{ old('credit', 0) }}"
                           class="form-control @error('credit') is-invalid @enderror">
                    @error('credit') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12 d-flex gap-2">
                    <a href="{{ route('subjects.index') }}" class="btn btn-light border">Batal</a>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
