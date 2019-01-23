<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;
use App\WatchedStory;
use Illuminate\Http\Request;

class Story extends Model
{
    //

    protected $fillable = [
        'employee_id', 'url', 'limited', 'max_access_time'
    ];

    public function employee(){

        return $this->belongsTo('App\Employee');

    }

    public function watchedStory(){

        return $this->hasMany(WatchedStory::class);

    }

    //CRUD: Create -> EmployeeController@createStory


    //CRUD: Select
    public static function selectStory(Request $request){

        $Story = Story::findOrFail($request->id);

        return $Story;

    }

    //CRUD: Update
    public static function updateStory(Request $request){

        $Story = Story::findOrFail($request->id);

        $Story->limited = $request->limited;

        $Story->max_access_time = $request->max_access_time;

        $Story->save();

        return redirect()->back();
        
    }

    //CRUD: Delete
    public static function deleteStory(Request $request){

        $Story = Story::findOrFail($request->id);

        $Story->delete();

        return redirect()->back();
        
    }


}
