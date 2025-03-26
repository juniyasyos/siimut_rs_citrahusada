<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'results',
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'results',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $NotFoundView=$this->getConfigs()->getNotFoundView();
?>

<div
    x-on:keydown.up.prevent="$focus.wrap().previous()"
    x-on:keydown.down.prevent="$focus.wrap().next()"
    x-on:focus-first-element.window="($el.querySelector('.fi-global-search-result-link')?.focus())"
    <?php echo e($attributes->class([
            'fi-global-search-modal-results-ctn flex-1 z-10 w-full mt-1 overflow-y-auto h-full bg-white shadow-lg transition dark:bg-transparent ',
            '[transform:translateZ(0)]',
        ])); ?>

>
    <?php if($results->getCategories()->isEmpty()): ?>
        <?php if (! (filled($NotFoundView))): ?>
            <?php if (isset($component)) { $__componentOriginalfb04517130287f1480c68ff08c8b6018 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfb04517130287f1480c68ff08c8b6018 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global-search-modal::components.search.no-results','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global-search-modal::search.no-results'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfb04517130287f1480c68ff08c8b6018)): ?>
<?php $attributes = $__attributesOriginalfb04517130287f1480c68ff08c8b6018; ?>
<?php unset($__attributesOriginalfb04517130287f1480c68ff08c8b6018); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfb04517130287f1480c68ff08c8b6018)): ?>
<?php $component = $__componentOriginalfb04517130287f1480c68ff08c8b6018; ?>
<?php unset($__componentOriginalfb04517130287f1480c68ff08c8b6018); ?>
<?php endif; ?>
        <?php else: ?>
            <?php echo $NotFoundView->render(); ?>

        <?php endif; ?>
    <?php else: ?>
        <ul 
        >
            <?php $__currentLoopData = $results->getCategories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupTitle => $groupedResults): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginalb15558c3f6bbaf48a24aa71e9d76ac83 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb15558c3f6bbaf48a24aa71e9d76ac83 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global-search-modal::components.search.grouped-results','data' => ['groupTitle' => $groupTitle,'results' => $groupedResults]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global-search-modal::search.grouped-results'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['groupTitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($groupTitle),'results' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($groupedResults)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb15558c3f6bbaf48a24aa71e9d76ac83)): ?>
<?php $attributes = $__attributesOriginalb15558c3f6bbaf48a24aa71e9d76ac83; ?>
<?php unset($__attributesOriginalb15558c3f6bbaf48a24aa71e9d76ac83); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb15558c3f6bbaf48a24aa71e9d76ac83)): ?>
<?php $component = $__componentOriginalb15558c3f6bbaf48a24aa71e9d76ac83; ?>
<?php unset($__componentOriginalb15558c3f6bbaf48a24aa71e9d76ac83); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
</div>
<?php /**PATH /root/SI-IMUT/vendor/charrafimed/global-search-modal/resources/views/components/search/results.blade.php ENDPATH**/ ?>