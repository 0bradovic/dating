<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use App\Transaction;
use Intervention\Image\ImageManagerStatic as Image;
use App\Interest;
use App\ClientInterest;
use App\TransactionType;
use App\ClientPersonality;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Hash;
use App\Employee;



class Client extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $guard = 'client';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'first_name', 'last_name', 'nickname', 'looking_for', 'date_of_birth', 'language', 'country', 'city', 'height', 'weight', 'hair_color', 'eye_color', 'gender', 'smoking', 'drinking', 'relationship', 'children', 'education', 'heading', 'about', 'occupation', 'nationality', 'credit', 'credit_card_number', 'phone_number', 'address', 'client_type_id' 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function preferredLocale()
    {
        return $this->locale;
    }

    
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return ['client_id'=>$this->id];
    }
    public function clientPhotos(){

        return $this->hasMany('App\ClientPhoto');

    }

    public function clientPreferance()
    {
        return $this->hasOne(ClientPreferance::class);
    }

    public function interests()
    {
        return $this->belongsToMany(Interest::class, 'client_interests', 'client_id', 'interest_id');
    }

    
    public function clientInterests(){

        return $this->hasMany(ClientInterest::class);

    }

    public function clientType(){

        return $this->belongsTo('App\ClientType');

    }

    public function clientNotification()
    {
        return $this->hasOne(ClientNotification::class);
    }

    public function session(){

        return $this->hasMany(Session::class);
    }

    public function clientFavourite(){

        return $this->hasMany(ClientFavourite::class);

    }

    public function scheduled(){

        return $this->hasMany(Scheduled::class);
    }

    public function transaction(){

        return $this->hasMany(Transaction::class);
    }

    public function discussion(){

        return $this->hasMany('App\Discussion');

    }

    public function paidPhoto(){

        return $this->hasMany(PaidPhoto::class);

    }

    public function gift(){

        return $this->hasMany(Gift::class);

    }

    public function employeePayment(){

        return $this->hasMany('App\EmployeePayment');

    }

    public function clientProfilePhotos(){

        return $this->hasMany(ClientProfilePhoto::class);

    }

    public function clientCoverPhotos(){

        return $this->hasMany(ClientCoverPhoto::class);

    }

    public function watchedStory(){

        return $this->hasMany(WatchedStory::class);

    }
    
    public function clientPersonality(){

        return $this->hasOne(ClientPersonality::class);

    }
    
    public function clientMatch(){

        return $this->hasOne(ClientMatch::class);

    }


    //Check how much credit does Client with requested id has
    public static function checkCreditAmount(integer $client_id){

        $Credit = Client::where('id', '=', $client_id)
                          ->select('credit')
                          ->get();
        
        return $Credit;

    }

    //Remove credit from Client with requested id by how much transaction with requested type requests
    public static function removeCredit(Request $request){

        $Client = Client::findOrFail($request->client_id);

        $TransactionType_Credit = TransactionType::where('id', '=', $request->transaction_type_id)
                                          ->select('credit_amount')
                                          ->get();

        $Client->credit -= $TransactionType_Credit;

        $Client->save();

        $Transaction = Transaction::createTransaction($request);

        //Add EmployeePayment later (credit or value)!

        return $Transaction->id;

    }

    //Get percentage of profile filled amount for specific Client Id
    public static function getProfilePercentage(integer $client_id){

        $percentCompleted = 0;

        $counter = 0;

        $percentPerColumn = 100/(Client::count()-3);

        $client = Client::findOrFail($client_id)->toArray();

        foreach($client as $key=>$value){

            if(!empty($value)){
                $counter++;
            } 

        }
        
        $percentCompleted = $counter*$percentPerColumn;

        return $percentCompleted;
        
    }

    //CRUD: Create
    public static function createClient(Request $request){

        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required'
        ]);

        $Client = Client::create([
            'first_name' => $request->first_name, 
            'last_name' => $request->last_name, 
            'username' => $request->username,
            'email' => $request->email,
            'gender' => $request->gender,
            'looking_for' => $request->looking_for,
            'password' => bcrypt($request->password),
            'nickname' => $request->nickname,
            'date_of_birth' => $request->date_of_birth,
            'language' => $request->language,
            'country' => $request->country,
            'city' => $request->city,
            'height' => $request->height,
            'weight' => $request->weight,
            'hair_color' => $request->hair_color,
            'eye_color' => $request->eye_color,
            'smoking' => $request->smoking,
            'drinking' => $request->drinking,
            'relationship' => $request->relationship,
            'children' => $request->children,
            'education' => $request->education,
            'heading' => $request->heading,
            'about' => $request->about,
            'occupation' => $request->occupation,
            'nationality' => $request->nationality,
            'credit' => $request->credit,
            'credit_card_number' => $request->credit_card_number,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'client_type_id' => $request->client_type_id
        ]);


        return redirect()->back();

    }

    //CRUD: Select
    public static function selectClient(Request $request){

        $Client = Client::findOrFail($request->id);

        return $Client;
        
    }

    //CRUD: Update
    public static function updateClient(Request $request){

        //return $request->all();

        $Client = Client::findOrFail($request->id);

        $Client->update($request->all());

        $Client->save();

        $clientPreferance = ClientPreferance::where('client_id', $request->id)->first();

        if($clientPreferance==null)
        {
            $clientPreferance = ClientPreferance::create([
                'client_id' => $request->id
            ]);
        }

        $clientPreferance->update($request->all());

        $clientPreferance->save();
        if($request->clientInterests)
        {
            foreach($request->clientInterests as $ci)
            {
                $x = ClientInterest::where('interest_id', $ci)->first();
                if($x==null)
                {
                    $newClientInterest = ClientInterest::create([
                    'client_id' => $request->id,
                    'interest_id' => $ci
                    ]);
                }
            }
        }

        
         
        if($request->profile_photo!=null || $request->profile_photo!="")
        {
            $clientProfilePhoto = ClientProfilePhoto::where('client_id', $request->id)->first();
        
            if($clientProfilePhoto)
            {
                $clientProfilePhoto->delete();
            }

            $file  = $request->profile_photo;
            $png_url = $Client->username.time() . ".png";
            $url = public_path().'\\images\\client\\' .$Client->username.'\\'. $png_url;
            $path='\\images\\client\\' .$Client->username.'\\'. $png_url;
            Image::make(file_get_contents($file))->save($url);
            $clientPPhoto = ClientPhoto::create([
                'client_id' => $request->id,
                'url' => $path, 
                'private' => 0
                ]);

            $clientProfilePhoto = ClientProfilePhoto::create([
                'client_id' => $request->id,
                'client_photo_id' => $clientPPhoto->id
            ]);

        }

        if($request->cover_photo!=null || $request->cover_photo!="")
        {
            $clientCoverPhoto = ClientCoverPhoto::where('client_id', $request->id)->first();
            
            if($clientCoverPhoto)
            {
                $clientCoverPhoto->delete();
            }
            
            $file  = $request->cover_photo;
            $png_url = $Client->username.time() . ".png";
            $url = public_path().'\\images\\client\\'.$Client->username.'\\'. $png_url;
            $path='\\images\\client\\' .$Client->username.'\\'. $png_url;
            Image::make(file_get_contents($file))->save($url);
            $clientCPhoto = ClientPhoto::create([
                'client_id' => $request->id,
                'url' => $path, 
                'private' => 0
                ]);

            $clientCoverPhoto = ClientCoverPhoto::create([
                'client_id' => $request->id,
                'client_photo_id' => $clientCPhoto->id
            ]);
        }
        
        return $Client;
        
    }

    //CRUD: Delete
    public static function deleteClient(Request $request){
        
        $Client = Client::findOrFail($request->id);

        $Client->delete();

        return redirect()->back();
        
    }

    //CRUD: update Client Settings
    public static function updateClientSettings(Request $request)
    {
        $clientPayload = JWTAuth::getPayload(JWTAuth::getToken());

        $client = Client::find($clientPayload['client_id']);

        $clientNotification = ClientNotification::where('client_id', $client->id)->first();

        
        if($clientNotification==null)
        {
            $newCC = ClientNotification::create([
                'client_id' => $client->id,
                'my_contacts' => $request->my_contacts,
                'chat_requests' => $request->chat_requests,
                'repeat' => $request->repeat
            ]);
            
        }
        else
        {
            $clientNotification->update($request->all());
        }

        $old_password = $request->oldPassword;
        if (Hash::check($old_password, $client->password)) 
        {
            $client->password = bcrypt($request->password);
            $client->save();
        }
        else
        {
            return json_encode('Wrong original password!');
        }

        if($request->phoneNumber)
        {
            $client->phone_number = $request->phoneNumber;
            $client->save();
        }

        if($request->email)
        {
            $client->email = $request->email;
            $client->save();
        }

        return json_encode('Success!');
    }

    //CRUD: Get Client Settings
    public static function getClientSettings(Request $request)
    {
        $clientPayload = JWTAuth::getPayload(JWTAuth::getToken());

        $client = Client::find($clientPayload['client_id']);

        $clientNotification = ClientNotification::where('client_id', $client->id)->first();

        if($clientNotification==null)
        {
            $clientNotification = new ClientNotification();
            $clientNotification->client_id = $client->id;
            $clientNotification->my_contacts = null;
            $clientNotification->chat_requests = null;
            $clientNotification->repeat = null;

        }
        
        $clientNotification->email = $client->email;

        $clientNotification->phoneNumber = $client->phone_number;

        return json_encode($clientNotification);
        
    }

    public static function searchEmployee(Request $request)
    {
        $returnEmployees = Employee::when($request->username, function($query) use ($request){
            return $query->where('nickname', 'LIKE', '%'.$request->username.'%');
        })
        ->when($request->ageFrom, function ($query) use ($request) {
            return $query->where('date_of_birth', '<=' ,Carbon::now()->subYears($request->ageFrom));
        })
        ->when($request->ageTo, function ($query) use ($request) {
            return $query->where('date_of_birth', '>=', Carbon::now()->subYears($request->ageTo));
        })->with('employeeProfilePhoto')->get();

        return $returnEmployees;
    }

    public static function getSixteenEmployees(Request $request)
    {
        return Employee::with('employeeProfilePhoto')->limit(16)->get();
    }

}
