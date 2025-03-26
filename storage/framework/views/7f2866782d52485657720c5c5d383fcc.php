<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'groupTitle',
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
    'groupTitle',
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
    $hasSearchItemTree = $this->getConfigs()->hasSearchItemTree();
    $isMustHighlightQueryMatches = $this->getConfigs()->isMustHighlightQueryMatches();
    $hasExpandedUrlTarget = $this->getConfigs()->hasExpandedUrlTarget()

?>
<li
    <?php echo e($attributes->class(['fi-global-search-modal-result-group'])); ?>

>
    <div
        class="top-0 z-10"
    >
        <h3
            class="px-4 relative flex flex-1 flex-col justify-center overflow-x-hidden text-ellipsis whitespace-nowrap py-2 text-[0.9em] text-start font-semibold capitalize text-gray-950  dark:text-white"
        >
            <?php echo e($groupTitle); ?>

        </h3>
    </div>

    <ul 
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'list-result'
        ]); ?>" 
    >
        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
            <?php if (isset($component)) { $__componentOriginal15142b371cde19c5750b544512817370 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal15142b371cde19c5750b544512817370 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global-search-modal::components.search.result-item','data' => ['actions' => $result->actions,'details' => $result->details,'title' => $isMustHighlightQueryMatches ? $result->highlightedTitle : $result->title,'rawTitle' => $result->title,'group' => $groupTitle,'url' => $result->url,'isLast' => $loop->last,'hasSearchItemTree' => $hasSearchItemTree,'hasExpandedUrlTarget' => $hasExpandedUrlTarget]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global-search-modal::search.result-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['actions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($result->actions),'details' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($result->details),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isMustHighlightQueryMatches ? $result->highlightedTitle : $result->title),'rawTitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($result->title),'group' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($groupTitle),'url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($result->url),'isLast' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($loop->last),'hasSearchItemTree' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($hasSearchItemTree),'hasExpandedUrlTarget' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($hasExpandedUrlTarget)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal15142b371cde19c5750b544512817370)): ?>
<?php $attributes = $__attributesOriginal15142b371cde19c5750b544512817370; ?>
<?php unset($__attributesOriginal15142b371cde19c5750b544512817370); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15142b371cde19c5750b544512817370)): ?>
<?php $component = $__componentOriginal15142b371cde19c5750b544512817370; ?>
<?php unset($__componentOriginal15142b371cde19c5750b544512817370); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</li>
<?php /**PATH /root/SI-IMUT/vendor/charrafimed/global-search-modal/resources/views/components/search/grouped-results.blade.php ENDPATH**/ ?>