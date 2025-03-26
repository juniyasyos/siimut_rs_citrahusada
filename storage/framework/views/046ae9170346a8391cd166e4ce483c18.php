<?php if (isset($component)) { $__componentOriginal166a02a7c5ef5a9331faf66fa665c256 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal166a02a7c5ef5a9331faf66fa665c256 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-panels::components.page.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament-panels::page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php
        $settings = \Juniyasyos\FilamentSettingsHub\Facades\FilamentSettingsHub::load()
            ->sortBy('order')
            ->groupBy('group');
        $tenant = \Filament\Facades\Filament::getTenant();
    ?>

    <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $settingGroup => $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="fi-page">
            <section class="grid grid-cols-12 gap-4 shadow-sm">
                <!-- System Info (4 kolom di desktop, 12 di mobile) -->
                <div class="col-span-12 md:col-span-4 flex flex-col">
                    <h3
                        class="fi-header-heading text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                        Sistem Indikator Mutu
                    </h3>
                    <p class="text-sm text-gray-700 dark:text-gray-400"><?php echo e(setting('site_name')); ?></p>
                    <a href="https://github.com/juniyasyos"
                        class="fi-link text-primary-600 dark:text-primary-400 text-sm">Version 1.0.0</a>
                </div>

                <!-- Kartu Informasi -->
                <div class="col-span-12 grid sm:grid-cols-3 gap-4 text-sm">
                    <!-- OS Server -->
                    <div class="fi-section flex p-4 bg-white dark:fi-section-content rounded-lg shadow-sm">
                        <div class="flex flex-col">
                            <span class="font-semibold text-gray-900 dark:text-white">Server OS</span>
                            <span class="text-gray-600 dark:text-gray-400"><?php echo e(php_uname('s')); ?>

                                <?php echo e(php_uname('r')); ?></span>
                        </div>
                    </div>

                    <!-- Versi PHP -->
                    <div class="fi-section flex p-4 bg-white dark:fi-section-content rounded-lg shadow-sm">
                        <div class="flex flex-col">
                            <span class="font-semibold text-gray-900 dark:text-white">PHP Version</span>
                            <span class="text-gray-600 dark:text-gray-400"><?php echo e(PHP_VERSION); ?></span>
                        </div>
                    </div>

                    <!-- Informasi Pengembang -->
                    <div class="fi-section flex p-4 bg-white dark:fi-section-content rounded-lg shadow-sm">
                        <div class="flex flex-col">
                            <span class="font-semibold text-gray-900 dark:text-white">Pengembang</span>
                            <span class="text-gray-600 dark:text-gray-400">4 Daun Serangkai</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section: Anak langsung dari .fi-page agar mendapatkan gap-y-6 -->
            <div class="pt-6">
                <h1 class="filament-header-heading p-2"></h1>
                <section>
                    <?php $__currentLoopData = $setting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $canAccess = true;
                            $routeUrl = $item->route
                                ? ($tenant
                                    ? route($item->route, $tenant)
                                    : route($item->route))
                                : null;
                            $pageUrl = $item->page ? app($item->page)::getUrl() : null;

                            if ($item->route && filament('filament-settings-hub')->isShieldAllowed()) {
                                $page =
                                    optional(
                                        \Illuminate\Support\Facades\Route::getRoutes()->getRoutesByName()[$item->route],
                                    )->action['controller'] ?? null;
                                $page = $page ? str($page)->afterLast('\\') : null;
                                $canAccess = $page
                                    ? \Filament\Facades\Filament::auth()
                                        ->user()
                                        ->can('page_' . $page)
                                    : false;
                            } elseif ($item->page && filament('filament-settings-hub')->isShieldAllowed()) {
                                $canAccess = \Filament\Facades\Filament::auth()
                                    ->user()
                                    ->can('page_' . str($item->page)->afterLast('\\'));
                            }
                        ?>

                        <?php if($canAccess && ($routeUrl || $pageUrl)): ?>
                            <!-- Masing-masing item menggunakan .fi-section dan ditata dengan flex serta padding -->
                            <a href="<?php echo e($routeUrl ?? $pageUrl); ?>"
                                class="group fi-section flex items-center p-4 mb-2 rounded-lg bg-white dark:fi-section-content
                                   hover:bg-gray-100 dark:hover:bg-gray-700
                                   border border-gray-200 dark:border-gray-600
                                   transition duration-200 ease-in-out">

                                <!-- Ikon -->
                                <div class="p-2">
                                    <?php if(isset($item->icon)): ?>
                                        <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => ''.e($item->icon).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'fi-icon-btn w-10 h-10 text-gray-800 dark:text-gray-200
                                               group-hover:text-gray-900 dark:group-hover:text-gray-100','style' => 'color: '.e($item->color ?? 'inherit').'']); ?>
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
                                    <?php else: ?>
                                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-cog'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'fi-icon-btn w-10 h-10 text-gray-800 dark:text-gray-200
                                               group-hover:text-gray-900 dark:group-hover:text-gray-100']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                    <?php endif; ?>
                                </div>

                                <!-- Teks -->
                                <div class="flex-1">
                                    <h1 class="font-bold text-lg text-gray-900 dark:text-white">
                                        <?php echo e(str($item->label)->contains(['.', '::']) ? trans($item->label) : $item->label); ?>

                                    </h1>
                                    <p class="text-sm text-gray-700 dark:text-gray-400">
                                        <?php echo e(str($item->description)->contains(['.', '::']) ? trans($item->description) : $item->description); ?>

                                    </p>
                                </div>

                                <!-- Ikon di pojok kanan tengah -->
                                <div class="ml-auto flex items-center">
                                    <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => 'heroicon-s-chevron-right'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'fi-icon-btn w-5 h-5 text-gray-800 dark:text-gray-200
                                           group-hover:text-gray-900 dark:group-hover:text-gray-100','style' => 'color: '.e($item->color ?? 'inherit').'']); ?>
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
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </section>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal166a02a7c5ef5a9331faf66fa665c256)): ?>
<?php $attributes = $__attributesOriginal166a02a7c5ef5a9331faf66fa665c256; ?>
<?php unset($__attributesOriginal166a02a7c5ef5a9331faf66fa665c256); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal166a02a7c5ef5a9331faf66fa665c256)): ?>
<?php $component = $__componentOriginal166a02a7c5ef5a9331faf66fa665c256; ?>
<?php unset($__componentOriginal166a02a7c5ef5a9331faf66fa665c256); ?>
<?php endif; ?>
<?php /**PATH /root/SI-IMUT/resources/views/vendor/filament-settings-hub/index.blade.php ENDPATH**/ ?>