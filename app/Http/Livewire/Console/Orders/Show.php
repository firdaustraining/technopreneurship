<?php

namespace App\Http\Livewire\Console\Orders;

use App\Invoice;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
class Show extends Component
{
     /**
     * public variable
     */
    public $invoice;
     protected $API_KEY = '7895f449e21707ab49bd2e40947933d8';


    /**
     * mount or construct function
     */
    public function mount($id)
    {
        $this->invoice  = Invoice::find($id);


    }



    public function render()
    {

        return view('livewire.console.orders.show');
    }
}
