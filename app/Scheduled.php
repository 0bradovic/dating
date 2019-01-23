<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Scheduled extends Model
{
    //

    protected $fillable = [
        'client_id', 'employee_id', 'date_time'
    ];

    public function Employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

    //CRUD: Create
    public static function createScheduled(Request $request){

        $request->validate([
            'client_id' => 'required|integer',
            'employee_id' => 'required|integer',
            'date_time' => 'required|date'
        ]);

        $Scheduled = Scheduled::create([
            'client_id' => $request->client_id,
            'employee_id' => $request->employee_id,
            'date_time' => $request->date_time
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectScheduled(Request $request){

        $Scheduled = Scheduled::findOrFail($request->id);

        return $Scheduled;
        
    }

    //CRUD: Update
    public static function updateScheduled(Request $request){

        $Scheduled = Scheduled::findOrFail($request->id);

        $Scheduled->date_time = $request->date_time;

        $Scheduled->save();

        return redirect()->back();
        
    }

    //CRUD: Delete
    public static function deleteScheduled(Request $request){

        $Scheduled = Scheduled::findOrFail($request->id);

        $Scheduled->delete();

        return redirect()->back();
        
    }
    
}
