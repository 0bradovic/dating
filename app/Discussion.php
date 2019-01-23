<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Discussion extends Model
{
    
    protected $fillable = [
        'client_id', 'employee_id'
    ];

    public function client(){

        return $this->belongsTo('App\Client');

    }

    public function employee(){

        return $this->belongsTo('App\Employee');

    }

    public function message(){

        return $this->hasMany('App\Message');

    }

    public static function discussionExist($client_id, $employee_id){

        $discussion = Discussion::where('client_id', '=', $client_id)
                                ->where('employee_id', '=', $employee_id)
                                ->select('id')
                                ->first();
        
        if($discussion!=null)
        {
            return $discussion;
        }
        else {
            return null;
        }

    }

    //CRUD: Create
    public static function createDiscussion(Request $request){

        $request->validate([
            'client_id' => 'required|integer',
            'employee_id' => 'required|integer'
        ]);

        $discussion = Discussion::create([
            'client_id' => $request->client_id,
            'employee_id' => $request->employee_id,
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectDiscussion(Request $request){

        $Discussion = Discussion::findOrFail($request->id);

        return $Discussion;

    }

    //CRUD: Update
    public static function updateDiscussion(Request $request){

        $Discussion = Discussion::findOrFail($request->id);

        //implement here if something to be updated

        $Discussion->save();

        return redirect()->back();

    }

    //CRUD: Delete
    public static function deleteDiscussion(Request $request){

        $Discussion = Discussion::findOrFail($request->id);

        $Discussion->delete();

        return redirect()->back();

    }




}
