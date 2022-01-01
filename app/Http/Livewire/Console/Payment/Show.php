<?php

namespace App\Http\Livewire\Console\Payment;

use App\PaymentConfirmation;
use Livewire\Component;

class Show extends Component
{
    public $payment;

    public function mount($id)
    {
        $this->payment = PaymentConfirmation::find($id);
    }

    public function render()
    {
        return view('livewire.console.payment.show');
    }
}
