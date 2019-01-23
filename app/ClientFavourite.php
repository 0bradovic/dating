<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ClientFavourite extends Model
{
    
    protected $fillable = [
        'client_id', 'employee_id'
    ];

    public function client(){

        return $this->belongsTo('App\Client');

    }

    //CRUD: Create
    public static function createClientFavourite(Request $request){

        $request->validate([
            'client_id' => 'required|integer',
            'employee_id' => 'required|integer'
        ]);

        $ClientFavourite = ClientFavourite::create([
            'client_id' => $request->client_id,
            'employee_id' => $request->employee_id
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectClientFavourite(Request $request){

        $ClientFavourite = ClientFavourite::findOrfail($request->id);

        return $ClientFavourite;

    }

    //CRUD: Update
    public static function updateClientFavourite(Request $request){

        $ClientFavourite = ClientFavourite::findOrfail($request->id);

        //implement here if something to be updated

        $ClientFavourite->save();

        return redirect()->back();

    }

    //CRUD: Delete
    public static function deleteClientFavourite(Request $request){

        $ClientFavourite = ClientFavourite::findOrfail($request->id);

        $ClientFavourite->delete();

        return redirect()->back();

    }

}
