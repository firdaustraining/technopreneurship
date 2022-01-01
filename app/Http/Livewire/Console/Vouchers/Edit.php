<?php

namespace App\Http\Livewire\Console\Vouchers;

use App\Voucher;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    /**
    * public variable
    */
    public $voucherId;
    public $title;
    public $voucher;
    public $nominal_voucher;
    public $total_minimal_shopping;
    public $content;
    public $image;

    /**
    * mount or cosntructor function
    */
    public function mount($id)
    {
        $voucher = Voucher::find($id);

        if($voucher) {
            $this->voucherId                = $voucher->id;
            $this->title                    = $voucher->title;
            $this->voucher                  = $voucher->voucher;
            $this->nominal_voucher          = $voucher->nominal_voucher;
            $this->total_minimal_shopping   = $voucher->total_minimal_shopping;
            $this->content                  = $voucher->content;
        }
    }

    /**
     * update function
     */
    public function update()
    {
        $this->validate([
            'title'             => 'required',
            'voucher'           => 'required',
            'nominal_voucher'   => 'required',
            'total_minimal_shopping' => 'required',
            'content'                => 'required'
        ]);

        $voucher = Voucher::find($this->voucherId);

        if($voucher) {

            if($this->image == null) {

                $voucher->update([
                    'title'                     => $this->title,
                    'voucher'                   => $this->voucher,
                    'nominal_voucher'           => $this->nominal_voucher,
                    'total_minimal_shopping'    => $this->total_minimal_shopping,
                    'content'                   => $this->content
                ]);

            } else {

                $this->image->store('public/vouchers');

                $voucher->update([
                    'title'                     => $this->title,
                    'voucher'                   => $this->voucher,
                    'nominal_voucher'           => $this->nominal_voucher,
                    'total_minimal_shopping'    => $this->total_minimal_shopping,
                    'content'                   => $this->content,
                    'image'                     => $this->image->hashName()
                ]);

            }

            session()->flash('success', 'Data updated successfully');
            return redirect()->route('console.vouchers.index');
        }
    }

    public function render()
    {
        return view('livewire.console.vouchers.edit');
    }
}
