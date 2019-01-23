<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hair extends Model
{
    //
    protected $fillable = [
        'name'
    ];

    //CRUD: Create
    public static function createHair(Request $request){

        $request->validate([
            'name' => 'required|string'
        ]);

        $Hair = Hair::create([
            'name' => $request->name
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectHair(Request $request){

        $Hair = Hair::findOrFail($request->id);

        return $Hair;

    }

    //CRUD: Update
    public static function updateHair(Request $request){

        $Hair = Hair::findOrFail($request->id);

        $Hair->name = $request->name;

        $Hair->save();

        return redirect()->back();

    }

    //CRUD: Delete
    public static function deleteHair(Request $request){

        $Hair = Hair::findOrFail($request->id);

        $Hair->delete();

        return redirect()->back();

    }

}
