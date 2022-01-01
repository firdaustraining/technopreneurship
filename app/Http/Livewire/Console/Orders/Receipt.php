<?php

namespace App\Http\Livewire\Console\Orders;

use App\Invoice;
use Livewire\Component;

class Receipt extends Component
{
     /**
     * public variable
     */
    public $receipt;
    public $invoiceId;

    /**
     * mount or construct function
     */
    public function mount($id)
    {
        $invoice = Invoice::find($id);
        $this->invoiceId = $invoice->id;
    }

    /**
     * update function
     */
    public function update()
    {
      $invoice = Invoice::find($this->invoiceId);

      if($invoice) {

        $invoice->update([
            'no_resi' => $this->receipt
        ]);

        session()->flash('success', 'Receipt update successfully !');
        return redirect()->route('console.orders.index');
      }
    }

    public function render()
    {
        return view('livewire.console.orders.receipt');
    }
}
