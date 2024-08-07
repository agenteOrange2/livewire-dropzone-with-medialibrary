<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Http\UploadedFile;

class CreatePost extends Component
{
    use WithFileUploads;

    #[Validate('required|exists:categories,id')]
    public $category_id;

    #[Validate('required|string|max:255')]
    public $title;

    #[Validate('required|string|max:255|unique:posts,slug')]
    public $slug;

    #[Validate('required|string|max:255')]
    public $short_description;

    #[Validate('required|string')]
    public $description;

    #[Validate(['array', 'required'])]
    public array $images = [];

    #[Validate(['array', 'nullable'])]
    public array $files = [];

    public function save()
    {
        $this->validate();

        $post = Post::create([
            'category_id' => $this->category_id,
            'title' => $this->title,
            'slug' => $this->slug,
            'short_description' => $this->short_description,
            'description' => $this->description,
        ]);

        foreach ($this->images as $image) {
            if ($image instanceof UploadedFile) {
                $post->addMedia($image->getRealPath())
                    ->toMediaCollection('images', 'public');
            }else {
                //dd($image); // Depuración adicional
            }
        }

        foreach ($this->images as $image) {
            if (is_array($image)) {
                $path = $image['path'];
                $post->addMedia($path)
                    ->toMediaCollection('images', 'public');
            } else {
                //dd($image); // Depuración adicional
            }
        }

        foreach ($this->files as $file) {
            if (is_array($file)) {
                $path = $file['path'];
                $post->addMedia($path)
                    ->toMediaCollection('files');
            } else {
                //dd($file); // Depuración adicional
            }
        }

        
        session()->flash('message', 'Post created successfully.');

        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.create-post', [
            'categories' => Category::all()
        ]);
    }
}