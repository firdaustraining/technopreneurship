<?php

namespace App\Http\Livewire\Frontend\Search;

use App\Product;
use App\Facades\Cart;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    /**
     * public variable
     */
    public $search;
    public $perPage  = 12;

    /**
     * mount or construct function
     */
    public function mount(Request $request)
    {
        $this->search = $request->get('q');

        if($this->search == "") {

            return redirect()->route('root');

        }
    }

		 /**
     * add To Cart
     */
    public function addToCart(int $productId)
    {
        Cart::add(Product::where('id', $productId)->first());
        $this->emit('addToCart');
        //alert message
        $this->emit('alert', ['type' => 'success', 'message' => 'Product added to cart.']);
    }

     /**
     * load more function
     */
    public function loadMore()
    {
        $this->perPage = $this->perPage + 4;
    }

    public function render()
    {
        $products = Product::where('title', 'like', '%' .$this->search. '%')->latest()->paginate($this->perPage);

        return view('livewire.frontend.search.index', [
            'products' => $products
        ]);
    }
}
