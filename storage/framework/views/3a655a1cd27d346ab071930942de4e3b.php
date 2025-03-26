
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4">
    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e(($this->folderAction($item))(['record' => $item])); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /root/SI-IMUT/resources/views/vendor/filament-media-manager/pages/folders.blade.php ENDPATH**/ ?>