<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientNotification extends Model
{
    //
    protected $fillable = [
        'client_id', 'my_contacts', 'chat_requests', 'repeat'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

     //CRUD: Create
     public static function createClientNotification(Request $request){

        $this->validate($request, [
            'my_contacts' => 'boolean',
            'chat_requests' => 'boolean',
            'repeat' => 'boolean'
        ]);

        $ClientNotification = ClientNotification::create([
            'client_id' => $request->client_id,
            'my_contacts' => $request->my_contacts,
            'chat_requests' => $request->chat_requests,
            'repeat' => $request->repeat
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectClientNotification(Request $request){

        $ClientNotification = ClientNotification::findOrFail($request->id);

        return $ClientNotification;

    }

    //CRUD: Update
    public static function updateClientNotification(Request $request){

        $ClientNotification = ClientNotification::findOrFail($request->id);

        $ClientNotification->update($request->all());

        $ClientNotification->save();

        return redirect()->back();

    }

    //CRUD: Delete
    public static function deleteClientNotification(Request $request){

        $ClientNotification = ClientNotification::findOrFail($request->id);

        $ClientNotification->delete();

        return redirect()->back();

    }
}
