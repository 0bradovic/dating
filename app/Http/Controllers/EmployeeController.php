<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Discussion;
use Auth;
use App\Employee;
use App\Client;
use App\EmployeeFavourite;
use App\EmployeePhoto;
use App\EmployeeProfilePhoto;
use App\Story;
use App\EmployeeInterest;
use App\EmployeePersonality;

class EmployeeController extends Controller
{
    public function index()
    {
        dd('EMPLOYEE!');

        $employee_id = Auth::id();

        $clients = Client::all();
        $employee = Employee::findOrFail($employee_id);

        //dd(Employee::findOrFail(1)->with('employeePhoto')->get());
        
        return view('employee',compact('clients','employee'));
    }

    #region Message CRUD
    public function createMessage(Request $request){

        Message::createMessageEmployee($request);
        
    }

    public function selectMessage(Request $request){

        Message::selectMessage($request);

        Message::setReadedEmployee($request->message_id);

    }

    public function updateMessage(Request $request){

        Message::updateMessage($request);

    }

    public function deleteMessage(Request $request){

        Message::deleteMessageEmployee($request);

    }
    #endregion
    
    #region Employee Photo CRUD
    public function createEmployeePhoto(Request $request){

        $this->validate(request(),[
            'employee_id' => 'required|integer',
            'photo' => 'required',
            'private' => 'required'
        ]);

        //dd($request->all());

        $employee = Employee::find($employee_id);

        $file  = $request->file('photo');

        $url = "/images/client/".$employee->username.time().$file->getClientOriginalName();

        $file->move('images', $url);
        
        $EmployeePhoto = EmployeePhoto::create([
            'employee_id' => $request->employee_id,
            'url' => $url,
            'private' => $request->private
        ]);

        return redirect()->back();

    }

    public function selectEmployeePhotoAll(Request $request){

        return EmployeePhoto::selectEmployeePhotoAll($request);

    }

    public function selectEmployeePhoto(Request $request){

        return EmployeePhoto::selectEmployeePhoto($request);

    }

    public function updateEmployeePhoto(Request $request){

        EmployeePhoto::updateEmployeePhoto($request);

    }

    public function deleteEmployeePhoto(Request $request){

        EmployeePhoto::deleteEmployeePhoto($request);

    }
    #endregion

    #region Employee Favourite CRUD
    public function createEmployeeFavourite(Request $request){

        EmployeeFavourite::createEmployeeFavourite($request);

    }

    public function selectEmployeeFavourite(Request $request){

        return EmployeeFavourite::selectEmployeeFavourite($request);

    }

    public function updateEmployeeFavourite(Request $request){

        EmployeeFavourite::updateEmployeeFavourite($request);

    }

    public function deleteEmployeeFavourite(Request $request){

        EmployeeFavourite::deleteEmployeeFavourite($request);

    }
    #endregion

    #region Employee Profile Photo CRUD
    public function createEmployeeProfilePhoto(Request $request){

        EmployeeProfilePhoto::createEmployeeProfilePhoto($request);

    }

    public function selectEmployeeProfilePhoto(Request $request){

        return EmployeeProfilePhoto::selectEmployeeProfilePhoto($request);
        
    }

    public function updateEmployeeProfilePhoto(Request $request){

        EmployeeProfilePhoto::updateEmployeeProfilePhoto($request);
        
    }

    public function deleteEmployeeProfilePhoto(Request $request){

        EmployeeProfilePhoto::deleteEmployeeProfilePhoto($request);
        
    }
    #endregion

    #region Client [Get]
    public static function selectClient(integer $client_id){

        $Client = Client::findOrFail($client_id);

        return $Client;

    }
    #endregion

    #region Story CRUD
    public function createStory(Request $request){

        $this->validate(request(),[
            'employee_id' => 'required|integer',
            'story' => 'required'
        ]);


        $file  = $request->file('story');

        $url = "/Story/".time().$file->getClientOriginalName();

        $file->move('story', $url);
        
        $EmployeePhoto = EmployeePhoto::create([
            'employee_id' => $request->employee_id,
            'url' => $url
        ]);

        return redirect()->back();
    }

    public function selectStory(Request $request){

        return Story::selectStory($request);
        
    }

    public function updateStory(Request $request){

        Story::updateStory($request);
        
    }

    public function deleteStory(Request $request){

        Story::deleteStory($request);
        
    }
    #endregion

    #region Employee Interest CRUD
    public function createEmployeeInterest(Request $request){

        EmployeeInterest::createEmployeeInterest($request);

    }

    public function selectEmployeeInterest(Request $request){

        return EmployeeInterest::selectEmployeeInterest($request);
        
    }

    public function updateEmployeeInterest(Request $request){

        EmployeeInterest::updateEmployeeInterest($request);
        
    }

    public function deleteEmployeeInterest(Request $request){

        EmployeeInterest::deleteEmployeeInterest($request);
        
    }
    #endregion

    #region Employee Personality CRUD
    public function createEmployeePersonality(Request $request){

        EmployeePersonality::createEmployeePersonality($request);
        
    }

    public function selectEmployeePersonality(Request $request){

        return EmployeePersonality::selectEmployeePersonality($request);
        
    }

    public function updateEmployeePersonality(Request $request){

        EmployeePersonality::updateEmployeePersonality($request);
        
    }

    public function deleteEmployeePersonality(Request $request){

        EmployeePersonality::deleteEmployeePersonality($request);
        
    }
    #endregion

}
