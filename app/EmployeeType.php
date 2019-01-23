<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EmployeeType extends Model
{
    
    protected $fillable = [
        'name'
    ];

    public function employee(){

        return $this->hasMany('App\Employee');

    }

    //CRUD: Create
    public static function createEmployeeType(Request $request){

        $request->validate([
            'name' => 'required|string'
        ]);

        $EmployeeType = EmployeeType::create([
            'name' => $request->name
        ]);

        return redirect()->back();

    }


    //CRUD: Select
    public static function selectEmployeeType(Request $request){

        $EmployeeType = EmployeeType::findOrFail($request->id);

        return $EmployeeType;

    }


    //CRUD: Update
    public static function updateEmployeeType(Request $request){

        $EmployeeType = EmployeeType::findOrFail($request->id);

        $EmployeeType->name = $request->name;

        $EmployeeType->save();

        return redirect()->back();

    }


    //CRUD: Delete
    public static function deleteEmployeeType(Request $request){

        $EmployeeType = EmployeeType::findOrFail($request->id);

        $EmployeeType->delete();

        return redirect()->back();

        
    }

}
