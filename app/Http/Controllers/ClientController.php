<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Auth;
use App\Client;
use App\Discussion;
use App\Message;
use App\ClientPhoto;
use App\PaidPhoto;
use App\Scheduled;
use App\ClientProfilePhoto;
use App\ClientFavourite;
use App\Hair;
use App\ClientMatch;
use App\Interest;
use App\EmployeeInterest;
use App\ClientPersonality;
use App\ClientEmployeePersonalityMatch;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\ImageManagerStatic as Image;

class ClientController extends Controller
{
    public function index()
    {
        dd('CLIENT!');

        $client_id = Auth::id();

        $start = microtime(true);
        
        $employees = Employee::all();

        $e=Employee::find(1)->toArray();  

        $duration = (microtime(true)-$start);

        \Log::info('No cache: '.$duration. '.ms');

        $start2 = microtime(true);

        $clients = Cache::remember('clients', 10, function(){
            
            return Client::all();
        
        });

        $duration2 = (microtime(true)-$start2);

        \Log::info('With cache: '.$duration2. '.ms');
        


        $client = Client::findOrFail($client_id);

        return view('client',compact('employees','client'));
    }

    public function searchEmployee(Request $request)
    {
        return Client::searchEmployee($request);
    }

    #region Message CRUD
    public function createMessage(Request $request){

        $CurrentCredit = Client::checkCreditAmount($request->client_id);

        $MessageCredit = TransactionType::where('id', '=', $request->transaction_type_id)
                                        ->select('credit_amount')
                                        ->get();
                                       
        if($CurrentCredit < $MessageCredit){

            $error = "Not enough credit to send a message. BUY NOW!";
            
            return $error;

        }
        else{

            $Transaction_id = Client::removeCredit($request);

            Message::createMessageClient($request);

        }

    }

    public function selectMessage(Request $request){

        $CurrentCredit = Client::checkCreditAmount($request->client_id);

        $MessageCredit = TransactionType::where('id', '=', $request->transaction_type_id)
                                        ->select('credit_amount')
                                        ->get();

        $MessagePrivate = Message::where('id', '=', $request->message_id)
                          ->select('private')
                          ->get();

        if($MessagePrivate == true)
        {
            if($CurrentCredit < $MessageCredit){

                $error = "Not enough credit to see the message. BUY NOW!";
                
                return $error;

            }
            else{

                $Transaction_id = Client::removeCredit($request);

                Message::setPublic($request->message_id);

                Message::selectMessage($request);

                Message::setReadedClient($request->message_id);

            }
        }
        else{

            Message::selectMessage($request);

            Message::setReadedClient($request->message_id);

        }

    }

    public function updateMessage(Request $request){

        Message::updateMessage($request);

    }

    public function deleteMessage(Request $request){

        Message::deleteMessageClient($request);

    }
    #endregion

    #region Client Photo CRUD
    public function createClientPhoto(Request $request){
       
        $this->validate(request(),[
            'photo' => 'required',
            'client_id' => 'required'
        ]);
       
        if(!empty($request->private)){
            $private = 1;
        }else{
            $private = 0;
        }
        
        $file  = $request->photo;
        $client = Client::find($request->client_id);

        $png_url = $client->username.time() . ".png";
        $url = public_path().'\\images\\client\\' . $png_url;
        $path='\\images\\client\\' . $png_url;
        Image::make(file_get_contents($file))->save($url);
        ClientPhoto::create(['client_id' => $request->client_id,'url' => $path, 'private' => $private]);
        $response = array(
            'status' => 'success',
        );
        return "success";
        
        return Response::json( $response  );

        return redirect()->back();

    }

    public function selectClientPhotoAll(Request $request){

        return ClientPhoto::selectClientPhotoAll($request);

    }

    public function selectClientPhoto(Request $request){

        ClientPhoto::selectClientPhoto($request);

    }

    public function updateClientPhoto(Request $request){

        ClientPhoto::updateClientPhoto($request);

    }

    public function deleteClientPhoto(Request $request){

        return ClientPhoto::deleteClientPhoto($request);

    }
    #endregion

    #region Client Favourite CRUD
    public function createClientFavourite(Request $request){

        ClientFavourite::createClientFavourite($request);

    }

    public function selectClientFavourite(Request $request){

        ClientFavourite::selectClientFavourite($request);

    }

    public function updateClientFavourite(Request $request){

        ClientFavourite::updateClientFavourite($request);

    }

    public function deleteClientFavourite(Request $request){

        ClientFavourite::deleteClientFavourite($request);

    }
    #endregion

    #region Client Profile Photo CRUD
    public function createClientProfilePhoto(Request $request){

        ClientProfilePhoto::createClientProfilePhoto($request);

    }

    public function selectClientProfilePhoto(Request $request){

        ClientProfilePhoto::selectClientProfilePhoto($request);

    }

    public function updateClientProfilePhoto(Request $request){

        ClientProfilePhoto::updateClientProfilePhoto($request);
        
    }

    public function deleteClientProfilePhoto(Request $request){

        ClientProfilePhoto::deleteClientProfilePhoto($request);
        
    }
    #endregion

    public function getHairs(Request $request)
    {
        return Hair::all();
    }

    #region Paid Photo CRUD
    public function createPaidPhoto(Request $request){

        PaidPhoto::createPaidPhoto($request);

    }

    public function selectPaidPhoto(Request $request){

        PaidPhoto::selectPaidPhoto($request);
        
    }

    public function updatePaidPhoto(Request $request){

        PaidPhoto::updatePaidPhoto($request);
        
    }

    public function deletePaidPhoto(Request $request){

        PaidPhoto::deletePaidPhoto($request);
        
    }
    #endregion

    #region Scheduled CRUD
    public function createScheduled(Request $request){

        Scheduled::createScheduled($request);

    }

    public function selectScheduled(Request $request){

        Scheduled::selectScheduled($request);
        
    }

    public function updateScheduled(Request $request){

        Scheduled::updateScheduled($request);
        
    }

    public function deleteScheduled(Request $request){

        Scheduled::deleteScheduled($request);
        
    }
    #endregion

    #region Transaction and Credit functionality CRUD
    public function checkCreditAmount(Request $request){

        Client::checkCreditAmount($request);

    }

    public function removeCredit(Request $request){

        Client::removeCredit($request);

    }
    #endregion

    #region Employee [Get] CRUD
    public function selectEmployee(integer $employee_id){

        $Employee = Employee::findOrFail($employee_id);

        return $Employee;

    }

    public function selectEmployeePhoto(Request $request){

        //employee_photo_id should be from $request->id

        $CurrentCredit = Client::checkCreditAmount($request->client_id);

        $PhotoCredit = TransactionType::where('id', '=', $request->transaction_type_id)
                                        ->select('credit_amount')
                                        ->get();

        $PhotoPrivate = EmployeePhoto::where('id', '=', $request->id)
                          ->select('private')
                          ->get();

        $PaidPhoto = PaidPhoto::where('client_id', '=', $request->client_id)
                              ->where('employee_photo_id', '=', $request->id)
                              ->get();

        if($PhotoPrivate == true && count($PaidPhoto)==0)
        {
            if($CurrentCredit < $PhotoCredit){

                $error = "Not enough credit to see the photo. BUY NOW!";
                
                return $error;

            }
            else{

                $transaction_id = Client::removeCredit($request);

                PaidPhoto::createPaidPhoto($request->client_id, $request->id, $transaction_id);

                EmployeePhoto::selectEmployeePhoto($request);

            }
        }
        else{

            EmployeePhoto::selectEmployeePhoto($request);

        }

    }
    #endregion

    public function getAllInterestsFromDb(Request $request)
    {
        return Interest::all();
    }

    #region Story/WatchedStory CRUD
    public function watchStory(Request $request){

        //story_id get as $request->id

        $WatchedStory = WatchedStory::where('client_id', '=', $request->client_id)
                                    ->where('story_id', '=', $request->id)
                                    ->get();

        $Story = Story::selectStory($request);

        if($Story->limited==false)
        {
            Story::selectStory($request);
        }
        else if($WatchedStory==null)
        {
            WatchedStory::createWatchedStory($request);

            Story::selectStory($request);
        }
        else if($WatchedStory!=null)
        {
            if($WatchedStory->accessed_times<$Story->max_access_time)
            {
                WatchedStory::reWatchedStory($WatchedStory->id);

                Story::selectStory($request);
            }
            else
            {
                $error = "You already viewed this story maximum amount of times!";
                return $error;
            }
        }

    }
    #endregion

    #region Client  CRUD
    public function createClient(Request $request){

        Client::createClient($request);
        
    }

    public function selectClien(Request $request){

        Client::selectClient($request);
        
    }

    public function updateClient(Request $request){

        return Client::updateClient($request);
        
    }

    public function deleteClient(Request $request){

        Client::deleteClient($request);
        
    }
    #endregion

    // Settings
    public function updateClientSettings(Request $request)
    {
        //dd($request->all());
        
        $this->validate($request, [
            'my_contacts' => 'boolean',
            'chat_requests' => 'boolean',
            'repeat' => 'boolean',
            'password' => 'required|confirmed',
            'phoneNumber' => 'numeric',
            'email' => 'email'
        ]);

        //dd('proso validaciju');

        return Client::updateClientSettings($request);
    }

    public function getClientSettings(Request $request)
    {
        return Client::getClientSettings($request);
    }

    #region Client Notification CRUD
    public function createClientNotification(Request $request){

        ClientNotification::createClientNotification($request);
        
    }

    public function selectClientNotification(Request $request){

        ClientNotification::selectClientNotification($request);
        
    }

    public function updateClientNotification(Request $request){

        return ClientNotification::updateClientNotification($request);
        
    }

    public function deleteClientNotification(Request $request){

        ClientNotification::deleteClientNotification($request);
        
    }
    #endregion

    #region Client Match CRUD
    public function createClientMatch(Request $request){

        ClientMatch::createClientMatch($request);
        
    }

    public function selectClientMatch(Request $request){

        ClientMatch::selectClientMatch($request);
        
    }

    public function updateClientMatch(Request $request){

        ClientMatch::updateClientMatch($request);
        
    }

    public function deleteClientMatch(Request $request){

        ClientMatch::deleteClientMatch($request);
        
    }
    #endregion

    #region Employee search by Interests CRUD
    public function getEmployeeByInterests(Request $request){

        EmployeeInterest::getEmployeeByInterests($request);

    }

    public function getEmployeeByClientMatch(Request $request){

        ClientMatch::getEmployeeByClientMatch($request);

    }
    
    public function getEmployeeByPersonalityCreate(Request $request){

        ClientEmployeePersonalityMatch::getEmployeeByPersonalityCreate($request);

    }

    public function getEmployeeByPersonalityUpdate(Request $request){

        ClientEmployeePersonalityMatch::getEmployeeByPersonalityUpdate($request);

    }

    public function getEmployeeByPersonalitySelect(Request $request){

        ClientEmployeePersonalityMatch::getEmployeeByPersonalitySelect($request);

    }
    
    public function getEmployeeByMultipleFilters(Request $request){

        $employeesToReturnALL = []; //Employee IDs

        $employees = []; //Employee entities

        $Int_filter = $request->int_filter;
        $CM_filter = $request->cm_filter;
        $Per_filter = $request->per_filter;

        $flagHowMuchFiltersApplyed = 0;

        if($Int_filter==true) //If Interest filter is ON
        {
            $flagHowMuchFiltersApplyed++;
            $employeesByClientMatch = [];
            $employeesByClientMatch = ClientMatch::getEmployeeByClientMatch($request);
            array_push($employeesToReturnALL, $employeesByClientMatch);

        }
        if($CM_filter==true)  //If ClientMatch filter is ON
        {
            $flagHowMuchFiltersApplyed++;
            $employeesByInterests = [];
            $employeesByInterests = EmployeeInterest::getEmployeeByInterests($request);
            array_push($employeesToReturnALL, $employeesByInterests);
        }
        if($Per_filter==true) //If Personality filter is ON
        {
            $flagHowMuchFiltersApplyed++;
            $employeesByPersonalities = [];
            $employeesByPersonalities = ClientEmployeePersonalityMatch::getEmployeeByPersonalitySelect($request);
            array_push($employeesToReturnALL, $employeesByPersonalities);
        }

        $final = [];
        $finalX = [];
        foreach($employeesToReturnALL as $key=>$value){
            foreach($value as $name=>$id){
                $final [] = $id;
            }
        }


        if($flagHowMuchFiltersApplyed==3)
        {
            
            $prom = array_count_values($final);
            $i=0;
            foreach($prom as $key=>$value)
            {
                if($value == 3)
                {

                    $finalX[] = $key ;

                }

                $i++;

                if($i>=count($final))
                {
                    break;
                }
            }

        }
        if($flagHowMuchFiltersApplyed==2)
        {
            $prom = array_count_values($final);
            $i=0;
            foreach($prom as $key=>$value)
            {
                if($value == 2)
                {

                    $finalX[] = $key ;

                }

                $i++;

                if($i>=count($final))
                {
                    break;
                }
            }
        }
        if($flagHowMuchFiltersApplyed==1)
        {
            $prom = array_count_values($final);
            $i=0;
            foreach($prom as $key=>$value)
            {
                if($value == 1)
                {

                    $finalX[] = $key ;

                }

                $i++;

                if($i>=count($final))
                {
                    break;
                }
            }
        }


        foreach($finalX as $f)
        {
            $currentEmployee = Employee::findOrFail($f);
            $employees[] = $currentEmployee;
        }

        return $employees;
    }
    #endregion

    #region Client Personality CRUD
    public function createClientPersonality(Request $request){

        ClientPersonality::createClientPersonality($request);

    }

    public function selectClientPersonality(Request $request){

        ClientPersonality::selectClientPersonality($request);
        
    }

    public function updateClientPersonality(Request $request){

        ClientPersonality::updateClientPersonality($request);
        
    }

    public function deleteClientPersonality(Request $request){

        ClientPersonality::deleteClientPersonality($request);
        
    }
    #endregion

    public function getSixteenEmployees(Request $request)
    {
        return Client::getSixteenEmployees($request);
    }

}
