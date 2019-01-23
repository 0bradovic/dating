<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Story;
use App\Client;
use Illuminate\Http\Request;

class WatchedStory extends Model
{
    //

    protected $fillable = [
        'client_id', 'story_id', 'accessed_times'
    ];

    public function client(){

        return $this->belongsTo(Client::class);

    }

    public function story(){

        return $this->belongsTo(Story::class);

    }

    //Function for when Client rewatches the Story
    public static function reWatchedStory(integer $rewatched_story_id){

        $WatchedStory = WatchedStory::findOrFail($request->watched_story_id);

        $WatchedStory->accessed_times++;

        $WatchedStory->save();

    }

    //CRUD: Create
    public static function createWatchedStory(Request $request){

        $request->validate([
            'client_id' => 'required|integer',
            'story_id' => 'required|integer'
        ]);

        $WatchedStory = WatchedStory::create([
            'client_id' => $request->client_id,
            'story_id' => $request->story_id,
            'accessed_times' => 1
        ]);

        return $WatchedStory;

    }

    //CRUD: Select
    public static function selectWatchedStory(Request $request){

        $WatchedStory = WatchedStory::findOrFail($request->id);

        return $WatchedStory;

    }

    //CRUD: Update
    public static function updateWatchedStory(Request $request){

        $WatchedStory = WatchedStory::findOrFail($request->id);

        //implement here if something to be updated

        $WatchedStory->save();

        return redirect()->back();

    }

    //CRUD: Delete
    public static function deleteWatchedStory(Request $request){

        $WatchedStory = WatchedStory::findOrFail($request->id);

        $WatchedStory->delete();

        return redirect()->back();

    }


}
