@extends('layouts.app')
@section('title', 'Tambah Nilai')

@section('content')
<div class="container" style="max-width: 920px;">
    <div class="mb-3">
        <h1 class="h4 mb-0">Tambah Nilai</h1>
        <div class="text-secondary">Pilih siswa & mapel, lalu input nilai.</div>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <form action="{{ route('grades.store') }}" method="POST" class="row g-3">
                @csrf

                <div class="col-md-6">
                    <label class="form-label">Siswa</label>
                    <select name="student_id" class="form-select @error('student_id') is-invalid @enderror" required>
                        <option value="">- Pilih Siswa -</option>
                        @foreach($students as $s)
                            <option value="{{ $s->id }}" @selected(old('student_id')==$s->id)>
                                {{ $s->nis }} - {{ $s->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('student_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Mata Pelajaran</label>
                    <select name="subject_id" class="form-select @error('subject_id') is-invalid @enderror" required>
                        <option value="">- Pilih Mapel -</option>
                        @foreach($subjects as $m)
                            <option value="{{ $m->id }}" @selected(old('subject_id')==$m->id)>
                                {{ $m->code }} - {{ $m->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('subject_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Tahun Ajaran</label>
                    <input name="year" value="{{ old('year', '2024/2025') }}"
                           class="form-control @error('year') is-invalid @enderror" required>
                    @error('year') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label">Semester</label>
                    <select name="semester" class="form-select @error('semester') is-invalid @enderror" required>
                        <option value="">-</option>
                        <option value="1" @selected(old('semester')=='1')>1</option>
                        <option value="2" @selected(old('semester')=='2')>2</option>
                    </select>
                    @error('semester') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label">Tugas</label>
                    <input type="number" name="task_score" value="{{ old('task_score', 0) }}"
                           class="form-control @error('task_score') is-invalid @enderror" min="0" max="100" required>
                    @error('task_score') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label">UTS</label>
                    <input type="number" name="mid_score" value="{{ old('mid_score', 0) }}"
                           class="form-control @error('mid_score') is-invalid @enderror" min="0" max="100" required>
                    @error('mid_score') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-2">
                    <label class="form-label">UAS</label>
                    <input type="number" name="final_score" value="{{ old('final_score', 0) }}"
                           class="form-control @error('final_score') is-invalid @enderror" min="0" max="100" required>
                    @error('final_score') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12 d-flex gap-2">
                    <a href="{{ route('grades.index') }}" class="btn btn-light border">Batal</a>
                    <button class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
