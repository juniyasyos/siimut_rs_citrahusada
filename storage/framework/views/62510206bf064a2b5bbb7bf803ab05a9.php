<div class="my-2 text-sm tracking-tight">
    <?php $__currentLoopData = $getState() ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span class="inline-block p-1 mr-1 font-medium text-gray-700 whitespace-normal rounded-md dark:text-gray-200 bg-gray-500/10">
            <?php echo e($key); ?>

        </span>

        <?php if(is_array($value)): ?>
            <span class="whitespace-normal divide-x divide-gray-200 divide-solid dark:divide-gray-700">
                <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nestedKey => $nestedValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="inline-block mr-1">
                        <?php echo e($nestedKey); ?>: <?php echo e(is_array($nestedValue) ? json_encode($nestedValue) : $nestedValue); ?>

                    </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </span>
        <?php else: ?>
            <span class="whitespace-normal"><?php echo e($value); ?></span>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /root/SI-IMUT/vendor/rmsramos/activitylog/resources/views/filament/tables/columns/activity-logs-properties.blade.php ENDPATH**/ ?>