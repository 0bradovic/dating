<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Client;

class ClientPersonality extends Model
{
    //
    
    protected $fillable = [
        'client_id', 'loving', 'confident', 'successful', 'faithful', 'flirty', 'compassionate', 'extroverted', 'caring', 'patient', 'adventurous', 'healthy_lifestyle'
    ];

    public function client(){

        return $this->belongsTo(Client::class);

    }

    //CRUD: Create
    public static function createClientPersonality(Request $request){

        $request->validate([
            'client_id' => 'required|integer',
            'loving'  => 'required|integer',
            'confident'  => 'required|integer',
            'successful'  => 'required|integer',
            'faithful'  => 'required|integer',
            'flirty'  => 'required|integer',
            'compassionate'  => 'required|integer',
            'extroverted'  => 'required|integer',
            'caring'  => 'required|integer',
            'patient'  => 'required|integer',
            'adventurous'  => 'required|integer',
            'healthy_lifestyle'  => 'required|integer',
        ]);

        $ClientPersonality = ClientPersonality::create([
            'client_id' => $request->client_id,
            'loving' => $request->loving,
            'confident' => $request->confident,
            'successful' => $request->successful,
            'faithful' => $request->faithful,
            'flirty' => $request->flirty,
            'compassionate' => $request->compassionate,
            'extroverted' => $request->extroverted,
            'caring' => $request->caring,
            'patient' => $request->patient,
            'adventurous' => $request->adventurous,
            'healthy_lifestyle' => $request->healthy_lifestyle
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectClientPersonality(Request $request){

        $ClientPersonality = ClientPersonality::findOrFail($request->id);

        return $ClientPersonality;

    }

    //CRUD: Update
    public static function updateClientPersonality(Request $request){

        $ClientPersonality = ClientPersonality::findOrFail($request->id);

        $ClientPersonality->client_id = $request->client_id;
        $ClientPersonality->loving = $request->loving;
        $ClientPersonality->confident = $request->confident;
        $ClientPersonality->successful = $request->successful;
        $ClientPersonality->faithful = $request->faithful;
        $ClientPersonality->flirty = $request->flirty;
        $ClientPersonality->compassionate = $request->compassionate;
        $ClientPersonality->extroverted = $request->extroverted;
        $ClientPersonality->caring = $request->caring;
        $ClientPersonality->patient = $request->patient;
        $ClientPersonality->adventurous = $request->adventurous;
        $ClientPersonality->healthy_lifestyle = $request->healthy_lifestyle;

        $ClientPersonality->save();

        return redirect()->back();

    }

    //CRUD: Delete
    public static function deleteClientPersonality(Request $request){

        $ClientPersonality = ClientPersonality::findOrFail($request->id);

        $ClientPersonality->delete();

        return redirect()->back();

    }

}
