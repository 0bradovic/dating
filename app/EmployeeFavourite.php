<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EmployeeFavourite extends Model
{
    
    protected $fillable = [
        'client_id', 'employee_id',
    ];

    public function client(){

        return $this->belongsTo('App\Client');

    }

    public function employee(){

        return $this->belongsTo('App\Employee');

    }

    //CRUD: Create
    public static function createEmployeeFavourite(Request $request){

        $request->validate([
            'employee_id' => 'required|integer',
            'client_id' => 'required|integer'
        ]);

        $EmployeeFavourite = EmployeeFavourite::Create([
            'employee_id' => $request->employee_id,
            'client_id' => $request->client_id
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectEmployeeFavourite(Request $request){

        $EmployeeFavourite = EmployeeFavourite::findOrFail($request->id);

        return $EmployeeFavourite;

    }

    //CRUD: Update
    public static function updateEmployeeFavourite(Request $request){

        $EmployeeFavourite = EmployeeFavourite::findOrFail($request->id);

        //implement here if something to be updated

        $EmployeeFavourite->save();

        return redirect()->back();

    }

    //CRUD: Delete
    public static function deleteEmployeeFavourite(Request $request){

        $EmployeeFavourite = EmployeeFavourite::findOrFail($request->id);

        $EmployeeFavourite->delete();

        return redirect()->back();

    }

}
