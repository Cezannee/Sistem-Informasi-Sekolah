@extends('layouts.app')
@section('title', 'Tambah Siswa')

@section('content')
<div class="container" style="max-width: 820px;">
    <div class="mb-3">
        <h1 class="h4 mb-0">Tambah Siswa</h1>
        <div class="text-secondary">Masukkan data siswa baru.</div>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <form action="{{ route('students.store') }}" method="POST" class="row g-3">
                @csrf

                <div class="col-md-4">
                    <label class="form-label">NIS</label>
                    <input name="nis" value="{{ old('nis') }}" class="form-control @error('nis') is-invalid @enderror" required>
                    @error('nis') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-8">
                    <label class="form-label">Nama</label>
                    <input name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="gender" class="form-select @error('gender') is-invalid @enderror" required>
                        <option value="">- Pilih -</option>
                        <option value="L" @selected(old('gender')==='L')>Laki-laki</option>
                        <option value="P" @selected(old('gender')==='P')>Perempuan</option>
                    </select>
                    @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="birth_date" value="{{ old('birth_date') }}"
                           class="form-control @error('birth_date') is-invalid @enderror">
                    @error('birth_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">No. HP</label>
                    <input name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Alamat</label>
                    <textarea name="address" rows="3" class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12 d-flex gap-2">
                    <a href="{{ route('students.index') }}" class="btn btn-light border">Batal</a>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
