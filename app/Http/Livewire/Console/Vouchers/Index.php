<?php

namespace App\Http\Livewire\Console\Vouchers;

use App\Voucher;
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
    public function destroy($voucherId)
    {
        $voucher = Voucher::find($voucherId);

        if($voucher) {
            Storage::disk('public')->delete('vouchers/'.$voucher->image);
            $voucher->delete();
        }

        session()->flash('success', 'Data deleted successfully.');
        return redirect()->route('console.vouchers.index');
    }

    public function render()
    {
        if($this->search != "") {

            $vouchers = Voucher::where('title', 'like', '%' .$this->search. '%')->latest()->paginate(10);

        } else {

            $vouchers = Voucher::latest()->paginate(10);

        }

        return view('livewire.console.vouchers.index', [
            'vouchers' => $vouchers
        ]);
    }
}
