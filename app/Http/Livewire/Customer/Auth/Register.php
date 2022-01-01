<?php

namespace App\Http\Livewire\Customer\Auth;

use App\Customer;
use Livewire\Component;

class Register extends Component
{
    /**
     * public variable
     */
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    /**
     * register function
     */
    public function register()
    {
        $this->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:customers',
            'password'  => 'required|confirmed'
        ]);

        $customer = Customer::create([
            'name'      => $this->name,
            'email'     => $this->email,
            'password'  => bcrypt($this->password)
        ]);

        session()->flash('success', 'Register Successfully');
        return redirect()->route('customer.auth.login');
    }

    public function render()
    {
        return view('livewire.customer.auth.register');
    }
}
