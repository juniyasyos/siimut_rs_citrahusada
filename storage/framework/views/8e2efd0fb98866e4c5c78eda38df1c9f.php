<div x-data>
    <template x-ref="template">
        <?php $__currentLoopData = $getRecord()->text; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $translation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="block"><span class="font-bold"><?php echo e($key); ?></span> - <?php echo e($translation); ?> </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </template>

    <button x-tooltip="{
        content: () => $refs.template.innerHTML,
        allowHTML: true,
        appendTo: $root,
    }">
        <?php echo e($this->getTranslationPreview($getRecord(), 50)); ?>

    </button>
</div>
<?php /**PATH /root/SI-IMUT/vendor/kenepa/translation-manager/resources/views/preview-column.blade.php ENDPATH**/ ?>