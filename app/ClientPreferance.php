<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientPreferance extends Model
{
    //
    protected $fillable = [
        'client_id', 'hair', 'minYear', 'maxYear'
    ];

    protected $casts = [
        'hair' => 'array'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
