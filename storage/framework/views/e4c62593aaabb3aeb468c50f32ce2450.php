<?php if(!empty($icon) && str($icon)->contains('heroicon')): ?>
    <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => $icon] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($size)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal606b6d7eddc2e418f11096356be15e19)): ?>
<?php $attributes = $__attributesOriginal606b6d7eddc2e418f11096356be15e19; ?>
<?php unset($__attributesOriginal606b6d7eddc2e418f11096356be15e19); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal606b6d7eddc2e418f11096356be15e19)): ?>
<?php $component = $__componentOriginal606b6d7eddc2e418f11096356be15e19; ?>
<?php unset($__componentOriginal606b6d7eddc2e418f11096356be15e19); ?>
<?php endif; ?>
<?php elseif(!empty($icon)): ?>
    <?php
        $getIcon = \TomatoPHP\FilamentIcons\Models\Icon::where('name', $icon)->first();
        $template = $getIcon ?  str($getIcon->template)->replace('{ ICON }', $getIcon->name)->toString() : null;
    ?>

    <?php if($getIcon): ?>
        <div class="<?php echo e($style ?: $getIcon->template_class); ?>">
            <?php echo $template; ?>

        </div>
    <?php else: ?>
        <div class="<?php echo e($style); ?>">
            <?php echo $template; ?>

        </div>
    <?php endif; ?>

<?php endif; ?>
<?php /**PATH /root/SI-IMUT/vendor/tomatophp/filament-icons/resources/views/components/icon.blade.php ENDPATH**/ ?>