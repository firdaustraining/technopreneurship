<?php

namespace App\Http\Livewire\Console\Categories;

use App\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;

    public $search;

    /**
     * search
     */
    protected $updatesQueryString = ['search'];

    /**
    * destroy function
    */
    public function destroy($categoryId)
    {
        $category = Category::find($categoryId);

        if($category) {
            Storage::disk('public')->delete('categories/'.$category->image);
            $category->delete();
        }

        session()->flash('success', 'Data deleted successfully.');
        return redirect()->route('console.categories.index');
    }

    public function render()
    {
        if($this->search != "") {

            $categories = Category::where('name', 'like', '%' .$this->search. '%')->latest()->paginate(10);

        } else {

            $categories = Category::latest()->paginate(10);

        }

        return view('livewire.console.categories.index', [
            'categories' => $categories
        ]);
    }
}
