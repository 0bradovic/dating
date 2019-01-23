<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EmployeeProfilePhoto extends Model
{
    //

    protected $fillable = [
        'employee_id', 'employee_photo_id','url'
    ];

    public function employee(){

        return $this->belongsTo(Employee::class);

    }

    public function employeePhoto(){

        return $this->belongsTo(EmployeePhoto::class);

    }

    //CRUD: Create
    public static function createEmployeeProfilePhoto(Request $request){

        $request->validate([
            'employee_id' => 'required|integer',
            'employee_photo_id' => 'required|integer'
        ]);

        $EmployeeProfilePhoto = EmployeeProfilePhoto::create([
            'employee_id' => $request->employee_id,
            'employee_photo_id' => $request->employee_photo_id,
            'url' => $request->url,
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectEmployeeProfilePhoto(Request $request){

        $EmployeeProfilePhoto = EmployeeProfilePhoto::findOrFail($request->id);

        return $EmployeeProfilePhoto;
        
    }

    //CRUD: Update
    public static function updateEmployeeProfilePhoto(Request $request){

        $EmployeeProfilePhoto = EmployeeProfilePhoto::findOrFail($request->id);

        $EmployeeProfilePhoto->employee_photo_id = $request->employee_photo_id;

        $EmployeeProfilePhoto->url = $request->url;

        $EmployeeProfilePhoto->save();

        return redirect()->back();

    }

    //CRUD: Delete
    public static function deleteEmployeeProfilePhoto(Request $request){

        $EmployeeProfilePhoto = EmployeeProfilePhoto::findOrFail($request->id);

        $EmployeeProfilePhoto->delete();

        return redirect()->back();

    }

}
