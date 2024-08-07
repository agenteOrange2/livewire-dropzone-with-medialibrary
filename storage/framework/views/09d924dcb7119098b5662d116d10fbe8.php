<div class="max-w-2xl mx-auto p-4 bg-white rounded-lg shadow-md">
    <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
            <select wire:model="category_id" id="category_id"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option value="">Select a category</option>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </select>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input wire:model="title" type="text" id="title"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div class="mb-4">
            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
            <input wire:model="slug" type="text" id="slug"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div class="mb-4">
            <label for="short_description" class="block text-sm font-medium text-gray-700">Short Description</label>
            <textarea wire:model="short_description" id="short_description" rows="3"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['short_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea wire:model="description" id="description" rows="6"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div class="mb-4">
            <label for="images" class="block text-sm font-medium text-gray-700">Images</label>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dropzone', ['wire:model' => 'images','rules' => ['image', 'mimes:png,jpeg,jpg,webp', 'max:10420'],'multiple' => true]);

$__html = app('livewire')->mount($__name, $__params, 'dropzone-images', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['images.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div class="mb-4">
            <label for="files" class="block text-sm font-medium text-gray-700">Files</label>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dropzone', ['wire:model' => 'files','rules' => ['mimes:pdf,doc,docx', 'max:10240'],'multiple' => true]);

$__html = app('livewire')->mount($__name, $__params, 'dropzone-files', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['files.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Create Post</button>
        </div>
    </form>
</div>
<?php /**PATH E:\xampp\htdocs\laravel\dropzonetest\resources\views/livewire/create-post.blade.php ENDPATH**/ ?>