<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'actions' => [],
    'details' => [],
    'title',
    'rawTitle',
    'group',
    'isLast',
    'url',
    'hasSearchItemTree'=>true,
    'hasExpandedUrlTarget'
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
    'actions' => [],
    'details' => [],
    'title',
    'rawTitle',
    'group',
    'isLast',
    'url',
    'hasSearchItemTree'=>true,
    'hasExpandedUrlTarget'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<li
    <?php echo e($attributes->class([
        'fi-global-search-result scroll-mt-9 mr-3 my-1 dark:bg-white/5 bg-gray-50 py-2 px-3 duration-300 transition-colors rounded-lg hover:bg-gray-100 dark:hover:bg-white/10 flex justify-between items-center',
    ])); ?> role="option">
    <a 
        <?php echo e(\Filament\Support\generate_href_html($url)); ?>


        x-on:click.stop="$store.globalSearchModalStore.hideModal()"

        x-on:keydown.enter.stop=" $store.globalSearchModalStore.hideModal();addToSearchHistory(<?php echo \Illuminate\Support\Js::from($rawTitle)->toHtml() ?>,<?php echo \Illuminate\Support\Js::from($group)->toHtml() ?>,<?php echo \Illuminate\Support\Js::from($url)->toHtml() ?>)"

        x-on:focus="$el.closest('li').classList.add('focus')"

        x-on:blur="$el.closest('li').classList.remove('focus')"

        x-on:click="addToSearchHistory(<?php echo \Illuminate\Support\Js::from($rawTitle)->toHtml() ?>,<?php echo \Illuminate\Support\Js::from($group)->toHtml() ?>,<?php echo \Illuminate\Support\Js::from($url)->toHtml() ?>)"

        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'fi-global-search-result-link block outline-none',
            'w-full' => $hasExpandedUrlTarget,
            'pe-4 ps-4 pt-4' => $actions,
            'p-3' => !$actions,
        ]); ?>"
        >

        <h4 
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'text-sm text-start font-medium text-gray-950 dark:text-white',
            'flex items-center gap-2' => $hasSearchItemTree,
        ]); ?>">
            <?php if($hasSearchItemTree): ?>
                <?php if (! ($isLast)): ?>
                    <?php if (isset($component)) { $__componentOriginal4f9ed6be41547f1a254dfb39a6894271 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4f9ed6be41547f1a254dfb39a6894271 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global-search-modal::components.icon.item-tree','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global-search-modal::icon.item-tree'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4f9ed6be41547f1a254dfb39a6894271)): ?>
<?php $attributes = $__attributesOriginal4f9ed6be41547f1a254dfb39a6894271; ?>
<?php unset($__attributesOriginal4f9ed6be41547f1a254dfb39a6894271); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4f9ed6be41547f1a254dfb39a6894271)): ?>
<?php $component = $__componentOriginal4f9ed6be41547f1a254dfb39a6894271; ?>
<?php unset($__componentOriginal4f9ed6be41547f1a254dfb39a6894271); ?>
<?php endif; ?>
                <?php else: ?>
                    <?php if (isset($component)) { $__componentOriginal813a5fb29e211b1bdc1d7296be376e32 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal813a5fb29e211b1bdc1d7296be376e32 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'global-search-modal::components.icon.item-end-tree','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global-search-modal::icon.item-end-tree'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal813a5fb29e211b1bdc1d7296be376e32)): ?>
<?php $attributes = $__attributesOriginal813a5fb29e211b1bdc1d7296be376e32; ?>
<?php unset($__attributesOriginal813a5fb29e211b1bdc1d7296be376e32); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal813a5fb29e211b1bdc1d7296be376e32)): ?>
<?php $component = $__componentOriginal813a5fb29e211b1bdc1d7296be376e32; ?>
<?php unset($__componentOriginal813a5fb29e211b1bdc1d7296be376e32); ?>
<?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
            <span>
                <?php echo e(str($title)->sanitizeHtml()->toHtmlString()); ?>

            </span>
        </h4>

        <?php if($details): ?>
        <dl class="mt-1 ml-1 global-search-modal-details">
            <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div 
                    class="text-sm text-gray-500 dark:text-gray-400 
                        flex items-center justify-start"
                    >
                    <?php if($isAssoc ??= \Illuminate\Support\Arr::isAssoc($details)): ?>
                        <dt 
                            class="inline font-medium" 
                            style="margin-right: 3px; paddings-right:1px;"
                        ><?php echo e($label); ?>:
                    </dt>
                    <?php endif; ?>

                    <dd class="inline"><?php echo e($value); ?></dd>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </dl>
    <?php endif; ?>
    </a>
    <?php if($actions): ?>
        <?php if (isset($component)) { $__componentOriginal06869628e057700d7c7d1210beefbe23 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal06869628e057700d7c7d1210beefbe23 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-panels::components.global-search.actions','data' => ['actions' => $actions]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament-panels::global-search.actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['actions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($actions)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal06869628e057700d7c7d1210beefbe23)): ?>
<?php $attributes = $__attributesOriginal06869628e057700d7c7d1210beefbe23; ?>
<?php unset($__attributesOriginal06869628e057700d7c7d1210beefbe23); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal06869628e057700d7c7d1210beefbe23)): ?>
<?php $component = $__componentOriginal06869628e057700d7c7d1210beefbe23; ?>
<?php unset($__componentOriginal06869628e057700d7c7d1210beefbe23); ?>
<?php endif; ?>
    <?php endif; ?>
</li>
<?php /**PATH /root/SI-IMUT/vendor/charrafimed/global-search-modal/resources/views/components/search/result-item.blade.php ENDPATH**/ ?>