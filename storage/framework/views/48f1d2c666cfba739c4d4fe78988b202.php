
<?php $__env->startSection('title', 'Kelas'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h4 mb-0">Data Kelas</h1>
            <div class="text-secondary">Kelola data kelas.</div>
        </div>
        <a href="<?php echo e(route('classes.create')); ?>" class="btn btn-primary">Tambah Kelas</a>
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
                            <th>Nama Kelas</th>
                            <th>Tahun Ajaran</th>
                            <th style="width:160px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($classes->firstItem() + $i); ?></td>
                                <td class="fw-semibold"><?php echo e($c->name); ?></td>
                                <td><?php echo e($c->year); ?></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="<?php echo e(route('classes.edit', $c)); ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <form action="<?php echo e(route('classes.destroy', $c)); ?>" method="POST"
                                              onsubmit="return confirm('Hapus data kelas ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="text-center text-secondary py-4">
                                    Belum ada data kelas.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <?php echo e($classes->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH Z:\Kuliah\Semester 5\Sistem Informasi Manajemen\sim-sekolah\sim-sekolah\resources\views/classes/index.blade.php ENDPATH**/ ?>