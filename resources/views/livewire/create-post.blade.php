<div class="max-w-2xl mx-auto p-4 bg-white rounded-lg shadow-md">
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
            <select wire:model="category_id" id="category_id"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input wire:model="title" type="text" id="title"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            @error('title')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
            <input wire:model="slug" type="text" id="slug"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            @error('slug')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="short_description" class="block text-sm font-medium text-gray-700">Short Description</label>
            <textarea wire:model="short_description" id="short_description" rows="3"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
            @error('short_description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea wire:model="description" id="description" rows="6"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="images" class="block text-sm font-medium text-gray-700">Images</label>
            <livewire:dropzone
                wire:model="images"
                :rules="['image', 'mimes:png,jpeg,jpg,webp', 'max:10420']"
                :multiple="true"
                :key="'dropzone-images'" />
            @error('images.*') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="files" class="block text-sm font-medium text-gray-700">Files</label>
            <livewire:dropzone
                wire:model="files"
                :rules="['mimes:pdf,doc,docx', 'max:10240']"
                :multiple="true"
                :key="'dropzone-files'" />
            @error('files.*') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Create Post</button>
        </div>
    </form>
</div>
