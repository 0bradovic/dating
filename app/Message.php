<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Message extends Model
{
    
    protected $fillable = [
        'discussion_id', 'text', 'private', 'employee_deleted', 'client_deleted', 'transaction_id'
    ];

    public function discussion(){

        return $this->belongsTo('App\Discussion');

    }

    public function transaction(){

        return $this->belongsTo('App\Transaction');

    }

    //Set privacy of the chosen Message to public
    public static function setPublic(integer $id){

        $Message = Message::findOrFail($id);

        $Message->private = false;

        $Message->save();

    }

    //Set privacy of the chosen Message to private
    public static function setPrivate(integer $id){

        $Message = Message::findOrFail($id);

        $Message->private = true;

        $Message->save();

    }

    //Set readed flag to true for chosen Message for [Client]
    public static function setReadedClient(integer $id){

        $Message = Message::findOrFail($id);

        $Message->client_readed = true;

        $Message->save();

    }

    //Set readed flag to true for chosen Message for [Employee]
    public static function setReadedEmployee(integer $id){

        $Message = Message::findOrFail($id);

        $Message->employee_readed = true;

        $Message->save();

    }

    //CRUD: Create [Client]
    public static function createMessageClient(Request $request){
        
        $request->validate([
            'text' => 'required|string'
        ]);

        if(Discussion::discussionExist($request->client_id, $request->employee_id)==null)
        {
            
            $discussion = Discussion::createDiscussion($request);

            $message = Message::create([
                'discussion_id' => $discussion->id,
                'text' => $request->text,
                'employee_deleted' => false,
                'client_deleted' => false,
                'employee_readed' => false,
                'client_readed' => true,
                'private' => false,
                'transaction_id' => null
            ]);

        }
        else{

            $message = Message::create([
                'discussion_id' => Discussion::discussionExist($request->client_id, $request->employee_id)->id,
                'text' => $request->text,
                'employee_deleted' => false,
                'client_deleted' => false,
                'employee_readed' => false,
                'client_readed' => true,
                'private' => false,
                'transaction_id' => null
            ]);

        }

    }

    //CRUD: Create [Employee]
    public static function createMessageEmployee(Request $request){

        $request->validate([
            'text' => 'required|string'
        ]);

        if(Discussion::discussionExist($request->client_id, $request->employee_id)==null)
        {
            
            $discussion = Discussion::createDiscussion($request);

            $message = Message::create([
                'discussion_id' => $discussion->id,
                'text' => $request->text,
                'employee_deleted' => false,
                'client_deleted' => false,
                'employee_readed' => true,
                'client_readed' => false,
                'private' => true,
                'transaction_id' => null
            ]);

        }
        else{

            $message = Message::create([
                'discussion_id' => Discussion::discussionExist($request->client_id, $request->employee_id)->id,
                'text' => $request->text,
                'employee_deleted' => false,
                'client_deleted' => false,
                'employee_readed' => true,
                'client_readed' => false,
                'private' => true,
                'transaction_id' => null
            ]);

        }

    }

    //CRUD: Select
    public static function selectMessage(Request $request){

        $Message = Message::findOrFail($request->id);

        return $Message;

    }

    //CRUD: Update
    public static function updateMessage(Request $request){

        $Message = Message::findOrFail($request->id);

        $Message->private = $request->private;

        $Message->transaction_id = $request->transaction_id;

        $Message->save();

        return redirect()->back();

    }

    //CRUD: Delete [Client]
    public static function deleteMessageClient(Request $request){

        $Message = Message::findOrFail($request->id);
        
        $Message->client_deleted = $request->client_deleted;

        $Message->save();

        return redirect()->back();
        
    }

    //CRUD: Delete [Employee]
    public static function deleteMessageEmployee(Request $request){
        
        $Message = Message::findOrFail($request->id);
        
        $Message->employee_deleted = $request->employee_deleted;

        $Message->save();

        return redirect()->back();

    }

}
