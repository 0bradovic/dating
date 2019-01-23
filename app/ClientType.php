<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ClientType extends Model
{
    
    protected $fillable = [
        'name',
    ];

    public function client(){

        return $this->hasMany('App\Client');

    }

    //CRUD: Create
    public static function createClientType(Request $request){

        $request->validate([
            'name' => 'required|string'
        ]);

        $ClientType = ClientType::create([
           'name' => $request->name 
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectClientType(Request $request){

        $ClientType = ClientType::findOrFail($request->id);

        return $ClientType;

    }

    //CRUD: Update
    public static function updateClientType(Request $request){

        $ClientType = ClientType::findOrFail($request->id);

        $ClientType->name = $request->name;

        $ClientType->save();

        return redirect()->back();

    }

    //CRUD: Delete
    public static function deleteClientType(Request $request){

        $ClientType = ClientType::findOrFail($request->id);

        $ClientType->delete();

        return redirect()->back();

    }

}
