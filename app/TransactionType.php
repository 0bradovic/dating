<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TransactionType extends Model
{
    //
    protected $fillable = [
        'name', 'credit_amount'
    ];

    public function transaction(){

        return $this->hasMany('App\Transaction');
    }

    //CRUD: Create
    public static function createTransactionType(Request $request){

        $request->validate([
            'name' => 'required|string',
            'credit_amount' => 'required|numeric'
        ]);

        $TransactionType = TransactionType::create([
            'name' => $request->name,
            'credit_amount' => $request->credit_amount
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectTransactionType(Request $request){

        $TransactionType = TransactionType::findOrFail($request->id);

        return $TransactionType;
        
    }

    //CRUD: Update
    public static function updateTransactionType(Request $request){

        $TransactionType = TransactionType::findOrFail($request->id);

        $TransactionType->name = $request->name;

        $TransactionType->credit_amount = $request->credit_amount;

        $TransactionType->save();

        return redirect()->back();
        
    }

    //CRUD: Delete
    public static function deleteTransactionType(Request $request){

        $TransactionType = TransactionType::findOrFail($request->id);

        $TransactionType->delete();

        return redirect()->back();
        
    }



}
