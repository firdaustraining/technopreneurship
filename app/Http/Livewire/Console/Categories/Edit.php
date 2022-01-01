<?php

namespace App\Http\Livewire\Console\Categories;

use App\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    /**
    * public variable
    */
    public $categoryId;
    public $name;
    public $image;

    /**
    * mount or cosntructor function
    */
    public function mount($id)
    {
        $category = Category::find($id);

        if($category) {
            $this->categoryId   = $category->id;
            $this->name         = $category->name;
        }
    }

    /**
     * update function
     */
    public function update()
    {
        $this->validate([
            'name'     => 'required'
        ]);

        $category = Category::find($this->categoryId);

        if($category) {

            if($this->image == null) {

                $category->update([
                    'name' => $this->name,
                    'slug' => Str::slug($this->name, '-'),
                ]);

            } else {

                $this->image->store('public/categories');

                $category->update([
                    'name' => $this->name,
                    'slug' => Str::slug($this->name, '-'),
                    'image'=> $this->image->hashName()
                ]);

            }

            session()->flash('success', 'Data updated successfully');
            return redirect()->route('console.categories.index');
        }
    }


    public function render()
    {
        return view('livewire.console.categories.edit');
    }
}
