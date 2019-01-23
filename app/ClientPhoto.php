<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ClientPhoto extends Model
{
    
    protected $fillable = [ 
        'client_id', 'url', 'private'
    ];

    public function client(){

        return $this->belongsTo('App\Client');

    }

    public function clientProfilePhoto(){

        return $this->hasOne(ClientProfilePhoto::class);

    }

    //CRUD: Create -> ClientController@createClientPhoto

    //CRUD: All
    public static function selectClientPhotoAll(Request $request){

        //return $request->client_id;

        $ClientPhotos = ClientPhoto::where('client_id', $request->client_id)->get();

        return $ClientPhotos;

    }


    //CRUD: Select
    public static function selectClientPhoto(Request $request){

        $ClientPhoto = ClientPhoto::findOrFail($request->id);

        return $ClientPhoto;

    }

    //CRUD: Update
    public static function updateClientPhoto(Request $request){

        $ClientPhoto = ClientPhoto::findOrFail($request->id);

        $ClientPhoto->private = $request->private;

        $ClientPhoto->save();

        return redirect()->back();

    }

    //CRUD: Delete
    public static function deleteClientPhoto(Request $request){

        //return $request;

        $ClientPhoto = ClientPhoto::findOrFail($request->id);

        $ClientPhoto->delete();

        //return redirect()->back();
        return "Success";

    }

}
