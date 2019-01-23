<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;
use Illuminate\Http\Request;
use App\Employee;

class ClientMatch extends Model
{
    //

    protected $fillable = [
        'client_id', 'date_of_birth', 'height', 'weight', 'body_type', 'education', 'smoking', 'drinking', 'eye_color', 'hair_color', 'nationality'
    ];

    public function client(){

        return $this->belongsTo(Client::class);

    }

    //Get Employees by Client Match specification
    public static function getEmployeeByClientMatch(Request $request){

        $numberOfMatchesToGet = $request->matchesNumber;
        
        $numberOfMatchesGotten = 0;

        $EmployeeMatchMatrix = []; //add with push
        $clientParamsToMatch=[];
        $clientMatch = ClientMatch::find(1)->first()->toArray();
        $clientParamsToMatch=ClientMatch::where('client_id', $request->client_id)->first(['date_of_birth','height','weight','body_type','education','smoking','drinking','eye_color','hair_color','nationality'])->toArray();
        
        $counterOfMatch = count($clientMatch);
        logger($clientMatch);
        logger($clientParamsToMatch);
        $employeeArrayToReturn = [];

        $allEmployees=Employee::all(['id','date_of_birth','height','weight','body_type','education','smoking','drinking','eye_color','hair_color','nationality']);
        foreach($allEmployees as $employee)
        {
            $employee = $employee->toArray();

            $counterOfMatchesPerEmployee=0;
            $countOfMatchesArray=array();
            
            $countOfMatchesArray=array_intersect_assoc($employee,$clientParamsToMatch);

            $counterOfMatchesPerEmployee=count($countOfMatchesArray);
           
            if($counterOfMatchesPerEmployee!=0)
            {
                
                $a = $employee['id'];
                $b = $counterOfMatchesPerEmployee;
                $EmployeeMatchMatrix [$a] = $b;
                
                $numberOfMatchesGotten++;
            }
        }

       arsort($EmployeeMatchMatrix, 1);

        if($numberOfMatchesToGet<=$numberOfMatchesGotten)
        {
            $i=0;
            foreach($EmployeeMatchMatrix as $key=>$value)
            {
                $employeeArrayToReturn [] = $key;
                $i++;
                if($i>=$numberOfMatchesToGet)
                {
                    break;
                }
            }
        }
        else
        {
            $i=0;
            foreach($EmployeeMatchMatrix as $key=>$value)
            {
                $employeeArrayToReturn [] = $key;
                $i++;
                if($i>=$numberOfMatchesGotten)
                {
                    break;
                }
            }
        }

        return $employeeArrayToReturn;
    }


    //CRUD: Create
    public static function createClientMatch(Request $request){

        $request->validate([
            'client_id' => 'required|integer',
            'date_of_birth' => 'required',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'body_type' => 'required|string',
            'education' => 'required|string',
            'smoking' => 'required|string',
            'drinking' => 'required|string',
            'eye_color' => 'required|string',
            'hair_color' => 'required|string',
            'nationality' => 'required|string'
        ]);

        $ClientMatch = ClientMatch::create([
            'client_id' => $request->id,
            'date_of_birth' => $request->date_of_birth,
            'height' => $request->height,
            'weight' => $request->weight,
            'body_type' => $request->body_type,
            'education' => $request->education,
            'smoking' => $request->smoking,
            'drinking' => $request->drinking,
            'eye_color' => $request->eye_color,
            'hair_color' => $request->hair_color,
            'nationality' => $request->nationality
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectClientMatch(Request $request){

        $ClientMatch = ClientMatch::findOrFail($request->id);

        return $ClientMatch;

    }

    //CRUD: Update
    public static function updateClientMatch(Request $request){

        $ClientMatch = ClientMatch::findOrFail($request->id);

        $ClientMatch->date_of_birth = $request->date_of_birth;
        $ClientMatch->height = $request->height;
        $ClientMatch->weight = $request->weight;
        $ClientMatch->body_type = $request->body_type;
        $ClientMatch->education = $request->education;
        $ClientMatch->smoking = $request->smoking;
        $ClientMatch->drinking = $request->drinking;
        $ClientMatch->eye_color = $request->eye_color;
        $ClientMatch->hair_color = $request->hair_color;
        $ClientMatch->nationality = $request->nationality;

        $ClientMatch->save();

        return redirect()->back();

    }

    //CRUD: Delete
    public static function deleteClientMatch(Request $request){

        $ClientMatch = ClientMatch::findOrFail($request->id);

        $ClientMatch->delete();

        return redirect()->back();

    }


}
