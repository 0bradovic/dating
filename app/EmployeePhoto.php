<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\PaidPhoto;

class EmployeePhoto extends Model
{
    //

    protected $fillable = [ 
        'employee_id', 'url', 'private',
    ];

    public function employee(){

        return $this->belongsTo('App\Employee');

    }

    public function paidPhoto(){

        return $this->hasMany(PaidPhoto::class);

    }

    public function employeeProfilePhoto(){

        return $this->hasOne(EmployeeProfilePhoto::class);

    }

    //CRUD: Create -> EmployeeController@createEmployeePhoto
    

    //CRUD: Select
    public static function selectEmployeePhoto(Request $request){

        $EmployeePhoto = EmployeePhoto::findOrFail($request->id);

        return $EmployeePhoto;

    }

     //CRUD: All
     public static function selectEmployeePhotoAll(Request $request){

        $EmployeePhotos = EmployeePhoto::where('employee_id', $request->employee_id)->get();

        return $EmployeePhotos;

    }

    //CRUD: Update
    public static function updateEmployeePhoto(Request $request){

        $EmployeePhoto = EmployeePhoto::findOrFail($request->id);

        $EmployeePhoto->private = $request->private;

        $EmployeePhoto->save();

        return redirect()->back();

    }

    //CRUD: Delete
    public static function deleteEmployeePhoto(Request $request){

        $EmployeePhoto = EmployeePhoto::findOrFail($request->id);

        $EmployeePhoto->delete();

        return redirect()->back();

    }

}
