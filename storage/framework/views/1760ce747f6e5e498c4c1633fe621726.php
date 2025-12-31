
<?php $__env->startSection('title', 'Nilai'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h4 mb-0">Nilai</h1>
            <div class="text-secondary">Kelola nilai siswa per mata pelajaran.</div>
        </div>
        <a href="<?php echo e(route('grades.create')); ?>" class="btn btn-primary">Tambah Nilai</a>
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
                            <th>Siswa</th>
                            <th>Mapel</th>
                            <th>Tahun</th>
                            <th>Sem</th>
                            <th>Tugas</th>
                            <th>UTS</th>
                            <th>UAS</th>
                            <th>Nilai Akhir</th>
                            <th style="width:160px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($grades->firstItem() + $i); ?></td>
                                <td class="fw-semibold"><?php echo e($g->student->name); ?></td>
                                <td><?php echo e($g->subject->name); ?></td>
                                <td><?php echo e($g->year); ?></td>
                                <td><?php echo e($g->semester); ?></td>
                                <td><?php echo e($g->task_score); ?></td>
                                <td><?php echo e($g->mid_score); ?></td>
                                <td><?php echo e($g->final_score); ?></td>
                                <td class="fw-semibold"><?php echo e($g->final_grade); ?></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="<?php echo e(route('grades.edit', $g)); ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <form action="<?php echo e(route('grades.destroy', $g)); ?>" method="POST"
                                              onsubmit="return confirm('Hapus data nilai ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="10" class="text-center text-secondary py-4">
                                    Belum ada data nilai.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <?php echo e($grades->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH Z:\Kuliah\Semester 5\Sistem Informasi Manajemen\sim-sekolah\resources\views/grades/index.blade.php ENDPATH**/ ?>