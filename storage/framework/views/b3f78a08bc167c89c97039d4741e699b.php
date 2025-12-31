
<?php $__env->startSection('title', 'Mata Pelajaran'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h4 mb-0">Mata Pelajaran</h1>
            <div class="text-secondary">Kelola data mata pelajaran.</div>
        </div>
        <a href="<?php echo e(route('subjects.create')); ?>" class="btn btn-primary">Tambah Mapel</a>
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
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Bobot / JP</th>
                            <th style="width:160px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($subjects->firstItem() + $i); ?></td>
                                <td class="fw-semibold"><?php echo e($s->code); ?></td>
                                <td><?php echo e($s->name); ?></td>
                                <td><?php echo e($s->credit); ?></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="<?php echo e(route('subjects.edit', $s)); ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <form action="<?php echo e(route('subjects.destroy', $s)); ?>" method="POST"
                                              onsubmit="return confirm('Hapus mata pelajaran ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center text-secondary py-4">
                                    Belum ada mata pelajaran.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <?php echo e($subjects->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH Z:\Kuliah\Semester 5\Sistem Informasi Manajemen\sim-sekolah\sim-sekolah\resources\views/subjects/index.blade.php ENDPATH**/ ?>