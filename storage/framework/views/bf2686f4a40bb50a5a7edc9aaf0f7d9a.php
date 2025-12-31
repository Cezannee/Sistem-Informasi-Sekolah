<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand fw-semibold" href="<?php echo e(route('dashboard')); ?>">SDN FUFUFAFA</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNav" aria-controls="topNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="topNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Siswa
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo e(route('students.index')); ?>">Lihat Siswa</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('students.create')); ?>">Tambah Siswa</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Guru
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo e(route('teachers.index')); ?>">Lihat Guru</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('teachers.create')); ?>">Tambah Guru</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kelas
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo e(route('classes.index')); ?>">Lihat Kelas</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('classes.create')); ?>">Tambah Kelas</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mapel
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo e(route('subjects.index')); ?>">Lihat Mapel</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('subjects.create')); ?>">Tambah Mapel</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Nilai
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo e(route('grades.index')); ?>">Lihat Nilai</a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('grades.create')); ?>">Tambah Nilai</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
<?php /**PATH Z:\Kuliah\Semester 5\Sistem Informasi Manajemen\sim-sekolah\sim-sekolah\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>