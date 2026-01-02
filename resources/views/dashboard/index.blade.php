@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container py-3">

    {{-- Header --}}
    <div class="dash-hero mb-4">
        <div class="dash-hero__content">
            <div>
                <div class="dash-kicker">SDN FUFUFAFA</div>
                <h1 class="dash-title mb-1">Dashboard</h1>
                <p class="dash-subtitle mb-0">
                    Ringkasan data sekolah dan akses cepat ke modul utama.
                </p>
            </div>

            <div class="dash-hero__right">
                <div class="dash-chip" id="greetingChip">Selamat datang</div>
                <div class="dash-date" id="todayText">Hari ini</div>
            </div>
        </div>
    </div>

    {{-- KPI --}}
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-6 col-xl-3">
            <a href="{{ route('students.index') }}" class="dash-card dash-card--click">
                <div class="dash-card__top">
                    <div class="dash-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                    <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5"/>
                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z"/>
                    </svg></div>
                    <div class="dash-card__meta">
                        <div class="dash-label">Siswa</div>
                        <div class="dash-value js-count" data-count="{{ $stats['students'] ?? 0 }}">0</div>
                    </div>
                </div>
                <div class="dash-card__bottom">
                    <span>Lihat data siswa</span>
                    <span class="dash-arrow">→</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <a href="{{ route('teachers.index') }}" class="dash-card dash-card--click">
                <div class="dash-card__top">
                    <div class="dash-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                        </svg></div>
                    <div class="dash-card__meta">
                        <div class="dash-label">Guru</div>
                        <div class="dash-value js-count" data-count="{{ $stats['teachers'] ?? 0 }}">0</div>
                    </div>
                </div>
                <div class="dash-card__bottom">
                    <span>Lihat data guru</span>
                    <span class="dash-arrow">→</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <a href="{{ route('classes.index') }}" class="dash-card dash-card--click">
                <div class="dash-card__top">
                    <div class="dash-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-houses-fill" viewBox="0 0 16 16">
                    <path d="M7.207 1a1 1 0 0 0-1.414 0L.146 6.646a.5.5 0 0 0 .708.708L1 7.207V12.5A1.5 1.5 0 0 0 2.5 14h.55a2.5 2.5 0 0 1-.05-.5V9.415a1.5 1.5 0 0 1-.56-2.475l5.353-5.354z"/>
                    <path d="M8.793 2a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708z"/>
                    </svg></div>
                    <div class="dash-card__meta">
                        <div class="dash-label">Kelas</div>
                        <div class="dash-value js-count" data-count="{{ $stats['classes'] ?? 0 }}">0</div>
                    </div>
                </div>
                <div class="dash-card__bottom">
                    <span>Kelola kelas</span>
                    <span class="dash-arrow">→</span>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <a href="{{ route('subjects.index') }}" class="dash-card dash-card--click">
                <div class="dash-card__top">
                    <div class="dash-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                    <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                    </svg></div>
                    <div class="dash-card__meta">
                        <div class="dash-label">Mata Pelajaran</div>
                        <div class="dash-value js-count" data-count="{{ $stats['subjects'] ?? 0 }}">0</div>
                    </div>
                </div>
                <div class="dash-card__bottom">
                    <span>Kelola mapel</span>
                    <span class="dash-arrow">→</span>
                </div>
            </a>
        </div>
    </div>

    {{-- Quick actions + Info --}}
    <div class="row g-3">
        <div class="col-12 col-lg-8">
            <div class="dash-panel">
                <div class="dash-panel__head">
                    <h2 class="dash-h2 mb-0">Aksi Cepat</h2>
                    <div class="dash-muted">Tambah data tanpa banyak klik</div>
                </div>

                <div class="row g-2">
                    <div class="col-12 col-md-6">
                        <a class="dash-action" href="{{ route('students.create') }}">
                            <div class="dash-action__icon">+</div>
                            <div class="dash-action__text">
                                <div class="dash-action__title">Tambah Siswa</div>
                                <div class="dash-action__sub">Input data siswa baru</div>
                            </div>
                            <div class="dash-arrow">→</div>
                        </a>
                    </div>

                    <div class="col-12 col-md-6">
                        <a class="dash-action" href="{{ route('teachers.create') }}">
                            <div class="dash-action__icon">+</div>
                            <div class="dash-action__text">
                                <div class="dash-action__title">Tambah Guru</div>
                                <div class="dash-action__sub">Input data guru baru</div>
                            </div>
                            <div class="dash-arrow">→</div>
                        </a>
                    </div>

                    <div class="col-12 col-md-6">
                        <a class="dash-action" href="{{ route('classes.create') }}">
                            <div class="dash-action__icon">+</div>
                            <div class="dash-action__text">
                                <div class="dash-action__title">Tambah Kelas</div>
                                <div class="dash-action__sub">Buat kelas baru</div>
                            </div>
                            <div class="dash-arrow">→</div>
                        </a>
                    </div>

                    <div class="col-12 col-md-6">
                        <a class="dash-action" href="{{ route('grades.create') }}">
                            <div class="dash-action__icon">+</div>
                            <div class="dash-action__text">
                                <div class="dash-action__title">Input Nilai</div>
                                <div class="dash-action__sub">Catat nilai siswa</div>
                            </div>
                            <div class="dash-arrow">→</div>
                        </a>
                    </div>
                </div>

                <div class="dash-tip mt-3" id="dashTip">
                    <div class="dash-tip__left">
                        <div class="dash-tip__badge">Tips</div>
                        <div>
                            Gunakan fitur <b>Search</b> dan <b>Filter</b> di halaman list untuk mempercepat pencarian data.
                        </div>
                    </div>
                    <button class="btn btn-sm btn-outline-secondary" type="button" id="dismissTipBtn">
                        Tutup
                    </button>
                </div>

            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="dash-panel">
                <div class="dash-panel__head">
                    <h2 class="dash-h2 mb-0">Ringkasan Nilai</h2>
                    <div class="dash-muted">Cepat akses modul nilai</div>
                </div>

                <div class="dash-mini">
                    <div class="dash-mini__row">
                        <div class="dash-mini__label">Total Data Nilai</div>
                        <div class="dash-mini__value js-count" data-count="{{ $stats['grades'] ?? 0 }}">0</div>
                    </div>
                    <a href="{{ route('grades.index') }}" class="btn btn-dark w-100 mt-2">
                        Lihat Nilai
                    </a>
                </div>

                <hr class="my-3">

                <div class="dash-muted">
                    Pastikan setiap siswa memiliki kelas dan mapel sebelum input nilai agar data konsisten.
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
