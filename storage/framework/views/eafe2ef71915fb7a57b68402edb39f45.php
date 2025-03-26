<?php
    $currentFolder = \Juniyasyos\FilamentMediaManager\Models\Folder::find($this->folder_id);
    if (filament('filament-media-manager')->allowSubFolders) {
        $folders = \Juniyasyos\FilamentMediaManager\Models\Folder::query()
            ->where('model_type', \Juniyasyos\FilamentMediaManager\Models\Folder::class)
            ->where('model_id', $this->folder_id)
            ->get();
    } else {
        $folders = [];
    }

?>

<?php if(isset($records) || count($folders) > 0): ?>
    Herllo
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4">
        <?php if(isset($records)): ?>
            <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($item instanceof \Juniyasyos\FilamentMediaManager\Models\Folder): ?>
                    <?php echo e($this->folderAction($item)(['record' => $item])); ?>

                <?php else: ?>
                    <?php if (isset($component)) { $__componentOriginal0942a211c37469064369f887ae8d1cef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0942a211c37469064369f887ae8d1cef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.modal.index','data' => ['width' => '3xl','slideOver' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['width' => '3xl','slide-over' => true]); ?>
                         <?php $__env->slot('trigger', null, ['class' => 'w-full h-full']); ?> 
                            <div
                                class="flex flex-col justify-start gap-4 border dark:border-gray-700 rounded-lg shadow-sm p-2 w-full h-full">
                                <div class="flex flex-col items-center justify-center  p-4 h-full">
                                    <?php if(str($item->mime_type)->contains('image')): ?>
                                        <img src="<?php echo e($item->getUrl()); ?>" />
                                    <?php elseif(str($item->mime_type)->contains('video')): ?>
                                        <video src="<?php echo e($item->getUrl()); ?>"></video>
                                    <?php elseif(str($item->mime_type)->contains('audio')): ?>
                                        <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => 'heroicon-o-musical-note'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-32 h-32']); ?>
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
                                        <?php
                                            $hasPreview = false;
                                            $loadTypes = \Juniyasyos\FilamentMediaManager\Facade\FilamentMediaManager::getTypes();
                                            $type = null;
                                            foreach ($loadTypes as $getType) {
                                                if (str($item->file_name)->contains($getType->exstantion)) {
                                                    $hasPreview = $getType->preview;
                                                    $type = $getType;
                                                }
                                            }
                                        ?>
                                        <?php if($hasPreview && $type): ?>
                                            <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => $type->icon] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-32 h-32']); ?>
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
                                            <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => 'heroicon-o-document'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-32 h-32']); ?>
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
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <div class="flex flex-col justify-between border-t dark:border-gray-700 p-4">
                                        <div>
                                            <h1 class="font-bold break-words">
                                                <?php echo e($item->hasCustomProperty('title') ? (!empty($item->getCustomProperty('title')) ? $item->getCustomProperty('title') : $item->name) : $item->name); ?>

                                            </h1>
                                        </div>

                                        <?php if($item->hasCustomProperty('description') && !empty($item->getCustomProperty('description'))): ?>
                                            <div>
                                                <div>
                                                    <h1 class="font-bold">Description</h1>
                                                </div>
                                                <div class="flex justify-start">
                                                    <p class="text-sm">
                                                        <?php echo e($item->getCustomProperty('description')); ?>

                                                    </p>
                                                </div>
                                            </div>
                                        <?php endif; ?>



                                        <div class="flex justify-start">
                                            <p class="text-gray-600 dark:text-gray-300 text-sm truncate ...">
                                                <?php echo e($item->created_at->diffForHumans()); ?>

                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                         <?php $__env->endSlot(); ?>

                         <?php $__env->slot('heading', null, []); ?> 
                            <?php echo e($item->uuid); ?>

                         <?php $__env->endSlot(); ?>

                         <?php $__env->slot('description', null, []); ?> 
                            <?php echo e($item->file_name); ?>

                         <?php $__env->endSlot(); ?>

                        <div>
                            <div class="flex flex-col justify-start w-full h-full">

                                <?php if(str($item->mime_type)->contains('image')): ?>
                                    <a href="<?php echo e($item->getUrl()); ?>" target="_blank"
                                        class="flex flex-col items-center justify-center  p-4 h-full border dark:border-gray-700 rounded-lg">
                                        <img src="<?php echo e($item->getUrl()); ?>" />
                                    </a>
                                <?php elseif(str($item->mime_type)->contains('video')): ?>
                                    <a href="<?php echo e($item->getUrl()); ?>" target="_blank"
                                        class="flex flex-col items-center justify-center  p-4 h-full border dark:border-gray-700 rounded-lg">
                                        <video class="w-full h-full" controls>
                                            <source src="<?php echo e($item->getUrl()); ?>" type="<?php echo e($item->mime_type); ?>">
                                        </video>
                                    </a>
                                <?php elseif(str($item->mime_type)->contains('audio')): ?>
                                    <a href="<?php echo e($item->getUrl()); ?>" target="_blank"
                                        class="flex flex-col items-center justify-center  p-4 h-full border dark:border-gray-700 rounded-lg">
                                        <video class="w-full h-full" controls>
                                            <source src="<?php echo e($item->getUrl()); ?>" type="<?php echo e($item->mime_type); ?>">
                                        </video>
                                    </a>
                                <?php else: ?>
                                    <?php
                                        $hasPreview = false;
                                        $loadTypes = \Juniyasyos\FilamentMediaManager\Facade\FilamentMediaManager::getTypes();
                                        foreach ($loadTypes as $type) {
                                            if (str($item->file_name)->contains($type->exstantion)) {
                                                $hasPreview = $type->preview;
                                            }
                                        }
                                    ?>
                                    <?php if($hasPreview): ?>
                                        <?php echo $__env->make($hasPreview, ['media' => $item], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    <?php else: ?>
                                        <a href="<?php echo e($item->getUrl()); ?>" target="_blank"
                                            class="flex flex-col items-center justify-center  p-4 h-full border dark:border-gray-700 rounded-lg">
                                            <?php if($type): ?>
                                                <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => $type->icon] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-32 h-32']); ?>
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
                                                <?php if (isset($component)) { $__componentOriginal606b6d7eddc2e418f11096356be15e19 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal606b6d7eddc2e418f11096356be15e19 = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Icon::resolve(['name' => 'heroicon-o-document'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-32 h-32']); ?>
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
                                            <?php endif; ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <div class="flex flex-col gap-4 my-4">
                                    <?php if($item->model): ?>
                                        <div>
                                            <div>
                                                <h1 class="font-bold">
                                                    <?php echo e(trans('filament-media-manager::messages.media.meta.model')); ?>

                                                </h1>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="text-sm">
                                                    <?php echo e(str($item->model_type)->afterLast('\\')->title()); ?>[ID:<?php echo e($item->model?->id); ?>]
                                                </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div>
                                        <div>
                                            <h1 class="font-bold">
                                                <?php echo e(trans('filament-media-manager::messages.media.meta.file-name')); ?>

                                            </h1>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="text-sm">
                                                <?php echo e($item->file_name); ?>

                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <h1 class="font-bold">
                                                <?php echo e(trans('filament-media-manager::messages.media.meta.type')); ?></h1>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="text-sm">
                                                <?php echo e($item->mime_type); ?>

                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <h1 class="font-bold">
                                                <?php echo e(trans('filament-media-manager::messages.media.meta.size')); ?></h1>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="text-sm">
                                                <?php echo e($item->humanReadableSize); ?>

                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <h1 class="font-bold">
                                                <?php echo e(trans('filament-media-manager::messages.media.meta.disk')); ?></h1>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="text-sm">
                                                <?php echo e($item->disk); ?>

                                            </p>
                                        </div>
                                    </div>
                                    <?php if($item->custom_properties): ?>
                                        <?php $__currentLoopData = $item->custom_properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($value): ?>
                                                <div>
                                                    <div>
                                                        <h1 class="font-bold"><?php echo e(str($key)->title()); ?></h1>
                                                    </div>
                                                    <div class="flex justify-start">
                                                        <p class="text-sm">
                                                            <?php echo e($value); ?>

                                                        </p>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <?php if(filament('filament-media-manager')->allowUserAccess && !empty($currentFolder->user_id)): ?>
                            <?php if($currentFolder->user_id === auth()->user()->id && $currentFolder->user_type === get_class(auth()->user())): ?>
                                 <?php $__env->slot('footer', null, []); ?> 
                                    <?php echo e(($this->deleteMedia)(['record' => $item])); ?>

                                 <?php $__env->endSlot(); ?>
                            <?php endif; ?>
                        <?php else: ?>
                             <?php $__env->slot('footer', null, []); ?> 
                                <?php echo e(($this->deleteMedia)(['record' => $item])); ?>

                             <?php $__env->endSlot(); ?>
                        <?php endif; ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0942a211c37469064369f887ae8d1cef)): ?>
<?php $attributes = $__attributesOriginal0942a211c37469064369f887ae8d1cef; ?>
<?php unset($__attributesOriginal0942a211c37469064369f887ae8d1cef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0942a211c37469064369f887ae8d1cef)): ?>
<?php $component = $__componentOriginal0942a211c37469064369f887ae8d1cef; ?>
<?php unset($__componentOriginal0942a211c37469064369f887ae8d1cef); ?>
<?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php if(filament('filament-media-manager')->allowSubFolders): ?>
            <?php $__currentLoopData = $folders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $folder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($this->folderAction($folder)(['record' => $folder])); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
<?php else: ?>
    <div class="fi-ta-empty-state px-6 py-12">
        <div class="fi-ta-empty-state-content mx-auto grid max-w-lg justify-items-center text-center">
            <div class="fi-ta-empty-state-icon-ctn mb-4 rounded-full bg-gray-100 p-3 dark:bg-gray-500/20">
                <?php if (isset($component)) { $__componentOriginalbfc641e0710ce04e5fe02876ffc6f950 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.icon','data' => ['icon' => 'heroicon-o-x-mark','class' => 'fi-ta-empty-state-icon h-6 w-6 text-gray-500 dark:text-gray-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'heroicon-o-x-mark','class' => 'fi-ta-empty-state-icon h-6 w-6 text-gray-500 dark:text-gray-400']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950)): ?>
<?php $attributes = $__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950; ?>
<?php unset($__attributesOriginalbfc641e0710ce04e5fe02876ffc6f950); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbfc641e0710ce04e5fe02876ffc6f950)): ?>
<?php $component = $__componentOriginalbfc641e0710ce04e5fe02876ffc6f950; ?>
<?php unset($__componentOriginalbfc641e0710ce04e5fe02876ffc6f950); ?>
<?php endif; ?>
            </div>

            <?php if (isset($component)) { $__componentOriginal130fd53052f7fb96516142d5e36c3545 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal130fd53052f7fb96516142d5e36c3545 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tables::components.empty-state.heading','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament-tables::empty-state.heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php echo e(trans('filament-media-manager::messages.empty.title')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal130fd53052f7fb96516142d5e36c3545)): ?>
<?php $attributes = $__attributesOriginal130fd53052f7fb96516142d5e36c3545; ?>
<?php unset($__attributesOriginal130fd53052f7fb96516142d5e36c3545); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal130fd53052f7fb96516142d5e36c3545)): ?>
<?php $component = $__componentOriginal130fd53052f7fb96516142d5e36c3545; ?>
<?php unset($__componentOriginal130fd53052f7fb96516142d5e36c3545); ?>
<?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /root/SI-IMUT/resources/views/vendor/filament-media-manager/pages/media.blade.php ENDPATH**/ ?>