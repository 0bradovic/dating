<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ClientProfilePhoto extends Model
{
    //

    protected $fillable = [
        'client_id', 'client_photo_id'
    ];

    public function client(){

        return $this->belongsTo(Client::class);

    }

    public function clientPhoto(){

        return $this->belongsTo(ClientPhoto::class);
        
    }

    //CRUD: Create
    public static function createClientProfilePhoto(Request $request){

        $request->validate([
            'client_id' => 'required|integer',
            'client_photo_id' => 'required|integer'
        ]);

        $ClientProfilePhoto = ClientProfilePhoto::create([
            'client_id' => $request->client_id,
            'client_photo_id' => $request->client_photo_id
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectClientProfilePhoto(Request $request){

        $ClientProfilePhoto = ClientProfilePhoto::where('client_id', $request->client_id)->first();

        if($ClientProfilePhoto==null) return json_encode("No profile pic!");

        $clientPhoto = ClientPhoto::find($ClientProfilePhoto->client_photo_id);

        return $clientPhoto;

    }

    //CRUD: Update
    public static function updateClientProfilePhoto(Request $request){

        $ClientProfilePhoto = ClientProfilePhoto::findOrFail($request->id);

        $ClientProfilePhoto->client_photo_id = $request->client_photo_id;

        $ClientProfilePhoto->save();

        return redirect()->back();
        
    }

    //CRUD: Delete
    public static function deleteClientProfilePhoto(Request $request){

        $ClientProfilePhoto = ClientProfilePhoto::findOrFail($request->id);

        $ClientProfilePhoto->delete();

        return redirect()->back();
        
    }


}
