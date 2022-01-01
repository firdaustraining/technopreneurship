<?php

namespace App\Http\Livewire\Console\Vouchers;

use App\Voucher;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    /**
     * public variable
     */
    public $title;
    public $voucher;
    public $nominal_voucher;
    public $total_minimal_shopping;
    public $content;
    public $image;

    /**
     * store function
     */
    public function store()
    {
        $this->validate([
            'image'             => 'required|image',
            'title'             => 'required',
            'voucher'           => 'required',
            'nominal_voucher'   => 'required',
            'total_minimal_shopping' => 'required',
            'content'                => 'required'
        ]);

        $this->image->store('public/vouchers');

        $voucher = Voucher::create([
            'title'                     => $this->title,
            'voucher'                   => $this->voucher,
            'nominal_voucher'           => $this->nominal_voucher,
            'total_minimal_shopping'    => $this->total_minimal_shopping,
            'content'                   => $this->content,
            'image'                     => $this->image->hashName()
        ]);

        if($voucher) {
            session()->flash('success', 'Data saved successfully');
        } else {
            session()->flash('error', 'Data failed to save');
        }

        return redirect()->route('console.vouchers.index');
    }

    public function render()
    {
        return view('livewire.console.vouchers.create');
    }
}
