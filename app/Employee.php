<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Employee extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $guard = 'employee';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'first_name', 'last_name', 'nickname', 'looking_for', 'date_of_birth', 'language', 'country', 'city', 'height', 'weight', 'body_type', 'hair_color', 'eye_color', 'gender', 'smoking', 'drinking', 'relationship', 'children', 'education', 'nationality', 'occupation', 'heading', 'about', 'credit_card_number', 'employee_type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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
        return [];
    }
    
    public function employeePhotos(){

        return $this->hasMany(EmployeePhoto::class);

    }

    public function session(){

        return $this->hasMany(Session::class);
    }

    public function employeeFavourite(){

        return $this->hasMany(EmployeeFavourite::class);

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

    public function gift(){

        return $this->hasMany(Gift::class);

    }

    public function employeePayment(){

        return $this->hasMany('App\EmployeePayment');

    }

    public function employeeType(){

        return $this->belongsTo('App\EmployeeType');

    }

    public function employeeProfilePhoto(){

        return $this->hasOne(EmployeeProfilePhoto::class);

    }

    public function story(){

        return $this->hasMany(Story::class);

    }

    public function employeeInterests(){

        return $this->hasMany(EmployeeInterest::class);

    }

    //CRUD: Create
    public static function createEmployee(Request $request){

        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'looking_for' => 'required|string',
            'date_of_birth' => 'required|date',
            'language' => 'required|string',
            'country' => 'required|sring',
            'city' => 'required|string',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'hair_color' => 'required|string',
            'eye_color' => 'required|string',
            'gender' => 'required|string',
            'smoking' => 'required|string',
            'drinking' => 'required|string',
            'relationship' => 'required|string',
            'children' => 'required|string',
            'education' => 'required|string',
            'nationality' => 'required|string',
            'occupation' => 'required|string',
            'heading' => 'required|string',
            'about' => 'required|string',
            'credit_card_number' => 'required|string',
            'employee_type_id' => 'required|integer'
        ]);

        $Employee = Employee::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'nickname' => $request->nickname,
            'looking_for' => $request->looking_for,
            'date_of_birth' => $request->date_of_birth,
            'language' => $request->language,
            'country' => $request->country,
            'city' => $request->city,
            'height' => $request->height,
            'weight' => $request->weight,
            'hair_color' => $request->hair_color,
            'eye_color' => $request->eye_color,
            'gender' => $request->gender,
            'smoking' => $request->smoking,
            'drinking' => $request->drinking,
            'relationship' => $request->relationship,
            'children' => $request->children,
            'education' => $request->education,
            'nationality' => $request->nationality,
            'occupation' => $request->occupation,
            'heading' => $request->heading,
            'about' => $request->about,
            'credit_card_number' => $request->credit_card_number,
            'employee_type_id' => $request->employee_type_id
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectEmployee(Request $request){

        $Employee = Employee::findOrFail($request->id);

        return $Employee;

    }

    //CRUD: Update
    public static function updateEmployee(Request $request){

        $Employee = Employee::findOrFail($request->id);

        $Employee->username = $request->username;
        $Employee->email = $request->email;
        $Employee->password = bcrypt($request->password);
        $Employee->first_name = $request->first_name;
        $Employee->last_name = $request->last_name;
        $Employee->nickname = $request->nickname;
        $Employee->looking_for = $request->looking_for;
        $Employee->date_of_birth = $request->date_of_birth;
        $Employee->language = $request->language;
        $Employee->country = $request->country;
        $Employee->city = $request->city;
        $Employee->height = $request->height;
        $Employee->weight = $request->weight;
        $Employee->hair_color = $request->hair_color;
        $Employee->eye_color = $request->eye_color;
        $Employee->body_type = $request->body_type;
        $Employee->gender = $request->gender;
        $Employee->smoking = $request->smoking;
        $Employee->drinking = $request->drinking;
        $Employee->relationship = $request->relationship;
        $Employee->children = $request->children;
        $Employee->education = $request->education;
        $Employee->nationality = $request->nationality;
        $Employee->occupation = $request->occupation;
        $Employee->heading = $request->heading;
        $Employee->about = $request->about;
        $Employee->credit_card_number = $request->credit_card_number;
        $Employee->employee_type_id = $request->employee_type_id;

        $Employee->save();

        return redirect()->back();

    }

    //CRUD: Delete
    public static function deleteEmployee(Request $request){

        $Employee = Employee::findOrFail($request->id);

        $Employee->delete();

        return redirect()->back();

    }

}
