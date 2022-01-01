<?php

namespace App\Http\Livewire\Console\Products;

use App\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    /**
     * public variable
     */
    public $search;

    /**
     * search
     */
    protected $updatesQueryString = ['search'];

    /**
    * destroy function
    */
    public function destroy($productId)
    {
        $product = Product::find($productId);

        if($product) {
            Storage::disk('public')->delete('products/'.$product->image);
            $product->delete();
        }

        session()->flash('success', 'Data deleted successfully.');
        return redirect()->route('console.products.index');
    }

    public function render()
    {
        if($this->search != "") {

            $products = Product::where('title', 'like', '%' .$this->search. '%')->latest()->paginate(10);

        } else {

            $products = Product::latest()->paginate(10);

        }

        return view('livewire.console.products.index', [
            'products' => $products
        ]);
    }
}
