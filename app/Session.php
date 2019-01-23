<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Session extends Model
{
    //

    protected $fillable = [
        'client_id', 'employee_id', 'date_time_started', 'date_time_ended', 'date_time_duration', 'credit_spent'
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
    public static function createSession(Request $request){

        $request->validate([
            'client_id' => 'required|integer',
            'employee_id' => 'required|integer',
            'date_time_started' => 'required|date',
            'date_time_ended' => 'required|date',
            'date_time_duration' => 'required|date',
            'credit_spent' => 'required|numeric'
        ]);

        $Session = $Session::create([
            'client_id' => $request->client_id,
            'employee_id' => $request->employee_id,
            'date_time_started' => $request->date_time_started,
            'date_time_ended' => $request->date_time_ended,
            'date_time_duration' => $request->date_time_duration,
            'credit_spent' => $request->credit_spent
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectSession(Request $request){

        $Session = Session::findOrFail($request->id);

        return $Session;

    }

    //CRUD: Update
    public static function updateSession(Request $request){

        $Session = Session::findOrFail($request->id);

        $Session->date_time_started = $request->date_time_started;

        $Session->date_time_ended = $request->date_time_ended;

        $Session->date_time_duration = $request->date_time_duration;

        $Session->credit_spent = $request->credit_spent;

        $Session->save();

        return redirect()->back();

    }

    //CRUD: Delete
    public static function deleteSession(Reuqest $request){

        $Session = Session::findOrFail($request->id);

        $Session->delete();

        return redirect()->back();

    }

}
