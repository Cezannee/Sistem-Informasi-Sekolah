
<?php $__env->startSection('title', 'Siswa'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h4 mb-0">Data Siswa</h1>
            <div class="text-secondary">Kelola data siswa.</div>
        </div>
        <a href="<?php echo e(route('students.create')); ?>" class="btn btn-primary">
            Tambah Siswa
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width:70px">#</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>JK</th>
                            <th>Tgl Lahir</th>
                            <th style="width:160px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($students->firstItem() + $i); ?></td>
                                <td class="fw-semibold"><?php echo e($s->nis); ?></td>
                                <td><?php echo e($s->name); ?></td>
                                <td><?php echo e($s->gender); ?></td>
                                <td><?php echo e($s->birth_date ? \Carbon\Carbon::parse($s->birth_date)->format('d/m/Y') : '-'); ?></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="<?php echo e(route('students.edit', $s)); ?>" class="btn btn-sm btn-outline-secondary">Edit</a>

                                        <form action="<?php echo e(route('students.destroy', $s)); ?>" method="POST"
                                              onsubmit="return confirm('Hapus data siswa ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="text-center text-secondary py-4">
                                    Belum ada data siswa.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <?php echo e($students->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH Z:\Kuliah\Semester 5\Sistem Informasi Manajemen\sim-sekolah\resources\views/students/index.blade.php ENDPATH**/ ?>