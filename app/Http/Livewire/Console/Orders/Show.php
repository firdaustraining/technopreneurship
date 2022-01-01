<?php

namespace App\Http\Livewire\Console\Orders;

use App\Invoice;
use Livewire\Component;

class Show extends Component
{
     /**
     * public variable
     */
    public $invoice;
    protected $API_KEY = '90f0c40f7c26ad91cb7cbdb64f05be74';


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
