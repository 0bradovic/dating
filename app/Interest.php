<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\EmployeeInterest;
use App\ClientInterest;

class Interest extends Model
{
    //

    protected $fillable = [
        'name'
    ];

    public function employeeInterest()
    {
        return $this->hasMany(Employee::class);
    }

    public function clientInterest()
    {
        return $this->hasMany(Client::class);
    } 

    public function clients()
    {
        return $this->belongsToMany(Interest::class, 'client_interests', 'interest_id', 'client_id');
    }

    //CRUD: Create
    public static function createInterest(Request $request){

        $request->validate([
            'name' => 'required|string'
        ]);

        $Interest = Interest::create([
            'name' => $request->name
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectInterest(Request $request){

        $Interest = Interest::findOrFail($request->id);

        return $Interest;

    }

    //CRUD: Update
    public static function updateInterest(Request $request){

        $Interest = Interest::findOrFail($request->id);

        $Interest->name = $request->name;

        $Interest->save();

        return redirect()->back();

    }

    //CRUD: Delete
    public static function deleteInterest(Request $request){

        $Interest = Interest::findOrFail($request->id);

        $Interest->delete();

        return redirect()->back();

    }
}
