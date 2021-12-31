<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
    ];

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

    public function PaymentConfirmation()
    {
        return $this->hasMany(PaymentConfirmation::class);
    }

}
