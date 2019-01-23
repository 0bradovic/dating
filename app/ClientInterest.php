<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;
use Illuminate\Http\Request;
use App\Interest;

class ClientInterest extends Model
{
    //
    
    protected $fillable = [
        'client_id', 'interest_id'
    ];
    

    public function client(){

        return $this->belongsTo(Client::class);

    }

    public function interest(){

        return $this->belongsTo(Interest::class);

    }

    
    //Return array of Client IDs by filtered by interests
    public static function getClientByInterests(Request $request){

        $clientToReturn = [];

        foreach($request->clientInterest as $Interest)
        {

            $Interest_Id = Interest::where('name', '=', $Interest)
                                   ->select('id')
                                   ->get();

            foreach($Interest_Id as $key=>$value){
                foreach($value as $name=>$id){
                    $Interest_Id = $id;
                }
            }

            foreach(ClientInterest::all() as $CI)
            {
                if($CI->interest_id == $Interest_id)
                {
                    $clientToReturn[]=$EI->client_id;
                }
            }
        }

        $clientToReturnUNIQUE = [];
        $clientToReturnUNIQUE = array_unique($clientToReturn);
        $clientToReturnUNIQUE_FINAL = [];
        foreach($clientToReturnUNIQUE as $key=>$value)
        {
            $clientToReturnUNIQUE_FINAL [] = $value;
        }
        return $clientToReturnUNIQUE_FINAL;

    }

    //CRUD: Create
    public static function createClientInterest(Request $request){

        $request->validate([
            'client_id' => 'required|integer',
            'interest_id' => 'required|integer'
        ]);

        $ClientInterest = ClientInterest::create([
            'client_id' => $request->client_id,
            'interest_id' => $request->interest_id
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectClientInterest(Request $request){

        $ClientInterest = ClientInterest::findOrFail($request->id);
        
        return $ClientInterest;

    }

    //CRUD: Update
    public static function updateClientInterest(Request $request){

        $ClientInterest = ClientInterest::findOrFail($request->id);
        
        //implement here if something to be updated

        $ClientInterest->save();

        return redirect()->back();

    }

    //CRUD: Delete
    public static function deleteClientInterest(Request $request){

        $ClientInterest = ClientInterest::findOrFail($request->id);

        $ClientInterest->delete();

        return redirect()->back();

    }



}
