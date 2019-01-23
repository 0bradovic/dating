<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ClientCoverPhoto extends Model
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
    public static function createClientCoverPhoto(Request $request){

        $request->validate([
            'client_id' => 'required|integer',
            'client_photo_id' => 'required|integer'
        ]);

        $ClientCoverPhoto = ClientCoverPhoto::create([
            'client_id' => $request->client_id,
            'client_photo_id' => $request->client_photo_id
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectClientCoverPhoto(Request $request){

        $ClientCoverPhoto = ClientCoverPhoto::where('client_id', $request->client_id)->first();

        if($ClientCoverPhoto==null) return json_encode("No cover pic!");

        $clientPhoto = ClientPhoto::find($ClientCoverPhoto->client_photo_id);

        return $clientPhoto;

    }

    //CRUD: Update
    public static function updateClientCoverPhoto(Request $request){

        $ClientCoverPhoto = ClientCoverPhoto::findOrFail($request->id);

        $ClientCoverPhoto->client_photo_id = $request->client_photo_id;

        $ClientCoverPhoto->save();

        return redirect()->back();
        
    }

    //CRUD: Delete
    public static function deleteClientCoverPhoto(Request $request){

        $ClientCoverPhoto = ClientCoverPhoto::findOrFail($request->id);

        $ClientCoverPhoto->delete();

        return redirect()->back();
        
    }
}
