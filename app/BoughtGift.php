<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoughtGift extends Model
{
    
    protected $fillable = [
        'gift_id', 'client_id', 'employee_id', 'transaction_id',
    ];

    public function client(){

        return $this->belongsTo(Client::class);

    }

    public function employee(){

        return $this->belongsTo(Employee::class);

    }

    public function transaction(){

        return $this->belongsTo(Transaction::class);

    }

    public function gift(){

        return $this->belongsTo(Gift::class);

    }

}
