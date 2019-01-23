<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Transaction extends Model
{
    
    protected $fillable = [
        'employee_id', 'client_id', 'transaction_type_id'
    ];

    public function employee(){

        return $this->belongsTo('App\Employee');

    }

    public function client(){

        return $this->belongsTo('App\Client');

    }

    public function transactionType(){

        return $this->belongsTo('App\TransactionType');
    }

    public function message(){

        return $this->hasMany('App\Message');

    }

    public function paidPhoto(){

        return $this->hasMany(PaidPhoto::class);

    }

    public function gift(){

        return $this->hasMany(Gift::class);

    }

    //CRUD: Create
    public static function createTransaction(Request $request){

        $request->validate([
            'employee_id' => 'required|integer',
            'client_id' => 'required|integer',
            'transaction_type_id' => 'required|integer'
        ]);

        $Transaction = Transaction::create([
            'employee_id' => $request->employee_id,
            'client_id' => $request->client_id,
            'transaction_type_id' => $request->transaction_type_id
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectTransaction(Request $request){

        $Transaction = Transaction::findOrFail($request->id);

        return $Transaction;

    }

    //CRUD: Update
    public static function updateTransaction(Request $request){

        $Transaction = Transaction::findOrFail($request->id);

        //implement here if something to be updated

        $Transaction->save();

        return redirect()->back();

    }

    //CRUD: Delete
    public static function deleteTransaction(Request $request){

        $Transaction = Transaction::findOrFail($request->id);

        $Transaction->delete();

        return redirect()->back();

    }


}
