<?php

namespace App\Http\Livewire\Console\Sliders;

use App\Slider;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithPagination;
    use WithFileUploads;

    /**
     * public variable
     */
    public $image;
    public $link;

    /**
     * store function
     */
    public function store()
    {
        $this->validate([
            'image'    => 'required|image',
            'link'     => 'required',
        ]);

        $this->image->store('public/sliders');

        $slider = Slider::create([
            'link' => $this->link,
            'image'=> $this->image->hashName()
        ]);

        if($slider) {
            session()->flash('success', 'Data saved successfully');
        } else {
            session()->flash('error', 'Data failed to save');
        }

        return redirect()->route('console.sliders.index');
    }

    /**
    * destroy function
    */
    public function destroy($sliderId)
    {
        $slider = Slider::find($sliderId);

        if($slider) {
            Storage::disk('public')->delete('sliders/'.$slider->image);
            $slider->delete();
        }

        session()->flash('success', 'Data deleted successfully.');
        return redirect()->route('console.sliders.index');
    }

    public function render()
    {
        return view('livewire.console.sliders.index', [
            'sliders' => Slider::latest()->paginate(2)
        ]);
    }
}
