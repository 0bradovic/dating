<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Gift extends Model
{
    //

    protected $fillable = [
        'price', 'name', 'url', 'description'
    ];


    public function boughtGifts()
    {
        return $this->hasMany(BoughtGift::class);
    }


    //CRUD: Create
    public static function createGift(Request $request){

        $request->validate([
            'url' => 'required|string',
            'name' => 'required|string',
            'price' => 'required|numeric',
        ]);


        $Gift = Gift::create([
            'url' => $request->url,
            'name' => $request->name,
            'price' => $request->price
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectGift(Request $request){

        $Gift = Gift::findOrFail($request->id);

        return $Gift;
        
    }

    //CRUD: Update
    public static function updateGift(Request $request){

        $Gift = Gift::findOrFail($request->id);

        $Gift->update($request->all());

        $Gift->save();

        return redirect()->back();

        
    }

    //CRUD: Delete
    public static function deleteGift(Request $request){

        $Gift = Gift::findOrFail($request->id);

        $Gift->delete();

        return redirect()->back();

    }


}
