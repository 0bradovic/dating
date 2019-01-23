<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PaidPhoto extends Model
{
    //

    protected $fillable = [ 
        'client_id', 'employee_photo_id', 'transaction_id',
    ];


    public function employeePhoto(){

        return $this->belongsTo(EmployeePhoto::class);

    }

    public function client(){

        return $this->belongsTo(Client::class);

    }

    public function transaction(){

        return $this->belongsTo(Transaction::class);

    }
    
    //CRUD: Create
    public static function createPaidPhoto(integer $client_id, integer $employee_photo_id, integer $transaction_id){

        $request->validate([
            'client_id' => 'required|integer',
            'employee_photo_id' => 'required|integer',
            'transaction_id' => 'required|integer'
        ]);

        $PaidPhoto = PaidPhoto::create([
            'client_id' => $client_id,
            'employee_photo_id' => $employee_photo_id,
            'transaction_id' => $transaction_id
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectPaidPhoto(Request $request){

        $PaidPhoto = PaidPhoto::findOrFail($request->id);

        return $PaidPhoto;
        
    }

    //CRUD: Update
    public static function updatePaidPhoto(Request $request){
        
        $PaidPhoto = PaidPhoto::findOrFail($request->id);

        //implement here if something to be updated

        $PaidPhoto->save();

        return redirect()->back();
        
    }

    //CRUD: Delete
    public static function deletePaidPhoto(Request $request){

        $PaidPhoto = PaidPhoto::findOrFail($request->id);

        $PaidPhoto-delete();

        return redirect()->back();
        
    }
}
