
<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('Property Details')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <div class="max-w-4xl mx-auto mt-8">
        <div class="mb-4">
            
            <div class="flex justify-end mt-5">
                <a class="px-2 py-1 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600" href="<?php echo e(route('properties.index')); ?>">Back</a>
            </div>
        </div>
    
        <div class="flex flex-col mt-5">
            <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-1000/10">
                <h3 class="text-2xl font-semibold">Property: <?php echo e($property->name); ?></h3>

                <div class="flex flex-row gap-10 bordered">
                    <div>
                        <p class="text-base text-gray-700 mt-5">
                            <strong> Type: </strong> <?php echo e($property->propertyType->name); ?>

                        </p>
                    </div>
                    <div>
                        <p class="text-base text-gray-700 mt-5">
                            <strong>No. of Bedreooms:</strong> <?php echo e($property->bedrooms); ?>

                        </p>
                    </div>
                    <div>
                        <p class="text-base text-gray-700 mt-5">
                            <strong>No. of Bathrooms:</strong> <?php echo e($property->bathrooms); ?>

                        </p>
                    </div>
                    <div>
                        <p class="text-base text-gray-700 mt-5">
                            <strong>Size(sqm):</strong> <?php echo e($property->size); ?> sqm
                        </p>
                    </div>
                </div>
                <div class="flex flex-row gap-11 bordered">
                    <div>
                        <p class="text-base text-gray-700 mt-5">
                            <strong>Price:</strong> <?php echo e($property->price); ?>

                        </p>
                    </div>
                    <div>
                        <p class="text-base text-gray-700 mt-5">
                            <strong>Council Tax Band:</strong> <?php echo e($property->council_tax_band); ?>

                        </p>
                    </div>
                    <div>
                        <p class="text-base text-gray-700 mt-5">
                            <strong>Tenure:</strong> <?php echo e($property->tenure); ?>

                        </p>
                    </div>
                </div>
                
                
                
                
                
                
               
                <p class="text-base text-gray-700 mt-5"><strong>Description:</strong> <?php echo e($property->description); ?></p>
                <p class="text-base text-gray-700 mt-5"><strong>Address Line 1:</strong> <?php echo e($address->address_line_1); ?></p>
                <p class="text-base text-gray-700 mt-5"><strong>Address Line 2:</strong> <?php echo e($address->address_line_2); ?></p>
                <p class="text-base text-gray-700 mt-5"><strong>City:</strong> <?php echo e($address->city); ?></p>
                <p class="text-base text-gray-700 mt-5"><strong>County:</strong> <?php echo e($address->county); ?></p>
                <p class="text-base text-gray-700 mt-5"><strong>Postcode:</strong> <?php echo e($address->postcode); ?></p>
                <p class="text-base text-gray-700 mt-5"><strong>Latitude:</strong> <?php echo e($address->latitude); ?></p>
                <p class="text-base text-gray-700 mt-5"><strong>Longitude: </strong><?php echo e($address->longitude); ?></p>
            </div>
        </div>

        <div  class="flex flex-col mt-5">
            <div class="mb-3">
                <div class="flex justify-start mt-5">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        <?php echo e(__('Gallery')); ?>

                    </h2>
                </div>
            </div>
            
            <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-1000/10">
                <div class="flex gap-4">
                    <?php $__currentLoopData = $property->getMedia('media'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img src="<?php echo e($image->getUrl()); ?>" alt="<?php echo e($image->getUrl()); ?>"
                        class="w-20 h-20 shadow">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH /Users/mel/Projects/mini-crm/resources/views/properties/show.blade.php ENDPATH**/ ?>