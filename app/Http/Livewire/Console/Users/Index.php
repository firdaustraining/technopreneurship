<?php

namespace App\Http\Livewire\Console\Users;

use App\User;
use Livewire\Component;
use Livewire\WithPagination;

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
    public function destroy($userId)
    {
        $user = User::find($userId);

        if($user) {
            $user->delete();
        }

        session()->flash('success', 'Data deleted successfully.');
        return redirect()->route('console.users.index');
    }

    public function render()
    {
        if($this->search != "") {

            $users = User::where('name', 'like', '%' .$this->search. '%')->latest()->paginate(10);

        } else {

            $users = User::latest()->paginate(10);

        }

        return view('livewire.console.users.index', [
            'users' => $users
        ]);
    }
}
