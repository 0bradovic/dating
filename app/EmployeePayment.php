<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EmployeePayment extends Model
{
    
    protected $fillable = [
        'employee_id', 'value', 'type', 'client_id'
    ];

    public function employee(){

        return $this->belongsTo('App\Employee');

    }

    public function client(){

        return $this->belongsTo('App\Client');

    }

    //CRUD: Create
    public static function createEmployeePayment(Request $request){

        $request->validate([
            'employee_id' => 'required|integer',
            'client_id' => 'required|integer',
            'type' => 'required|string',
            'value' => 'required|numeric'
        ]);

        $EmployeePatment = EmployeePayment::create([
            'employee_id' => $request->employee_id,
            'client_id' => $request->client_id,
            'type' => $request->type,
            'value' => $request->value
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectEmployeePayment(Request $request){

        $EmployeePayment = EmployeePayment::findOrFail($request->id);

        return $EmployeePayment;
        
    }

    //CRUD: Update
    public static function updateEmployeePayment(Request $request){

        $EmployeePayment = EmployeePayment::findOrFail($request->id);

        $EmployeePayment->value = $request->value;

        $EmployeePayment->type = $request->type;

        $EmployeePayment->save();

        return redirect()-back();
        
    }

    //CRUD: Delete
    public static function deleteEmployeePayment(Request $request){

        $EmployeePayment = EmployeePayment::findOrFail($request->id);

        $EmployeePayment->delete();

        return redirect()-back();

    }

}
