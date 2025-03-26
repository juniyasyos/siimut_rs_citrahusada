<div>
    <div class="py-4">
        <h1 class="filament-header-heading text-2xl font-bold tracking-tight">
            <?php echo e(__('translation-manager::translations.quick-translate')); ?>

        </h1>
    </div>

    <?php echo e($this->selectForm); ?>


    <?php if($this->selectedLocale): ?>
        <?php if($this->record): ?>
            <div class="bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 rounded-lg mt-6">
                <div class="mb-4">
                    <h1 class="font-bold text-lg text-gray-600 dark:text-gray-200">
                        <?php echo e($this->record->group); ?>.<?php echo e($this->record->key); ?>

                    </h1>
                    <p class="text-sm text-gray-400  dark:text-gray-300">
                        <?php echo e(__('translation-manager::translations.quick-translate-translation-number', ['total' => $this->totalLanguageLines])); ?>

                    </p>
                </div>

                <div class="mt-4 mb-4 text-gray-600 dark:text-gray-200">
                    <?php echo $__env->make('translation-manager::preview-translation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>

                <div class="mt-4 mb-4"><?php echo e($this->enterForm); ?></div>

                <div class="mt-4 flex gap-4 items-center">
                    <?php if (isset($component)) { $__componentOriginal6330f08526bbb3ce2a0da37da512a11f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.button.index','data' => ['wire:click' => 'saveAndContinue']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'saveAndContinue']); ?><?php echo e(__('translation-manager::translations.quick-translate-save-and-continue')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6330f08526bbb3ce2a0da37da512a11f)): ?>
<?php $attributes = $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f; ?>
<?php unset($__attributesOriginal6330f08526bbb3ce2a0da37da512a11f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6330f08526bbb3ce2a0da37da512a11f)): ?>
<?php $component = $__componentOriginal6330f08526bbb3ce2a0da37da512a11f; ?>
<?php unset($__componentOriginal6330f08526bbb3ce2a0da37da512a11f); ?>
<?php endif; ?>

                    <a class="text-gray-600 dark:text-gray-200 hover:text-gray-400 dark:hover:text-gray-600 cursor-pointer inline-block" wire:click="skip">
                        <?php echo e(__('translation-manager::translations.quick-translate-skip')); ?>

                    </a>
                </div>

            </div>
        <?php else: ?>
            <p class="mt-4 text-gray-800 dark:text-gray-200"><?php echo e(__('translation-manager::translations.quick-translate-nothing')); ?></p>
        <?php endif; ?>
    <?php endif; ?>
</div>
<?php /**PATH /root/SI-IMUT/vendor/kenepa/translation-manager/resources/views/quick-translate.blade.php ENDPATH**/ ?>