<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ClientPersonality;
use App\EmployeePersonality;
use Illuminate\Http\Request;


class ClientEmployeePersonalityMatch extends Model
{
    
    protected $fillable = [
        'client_id', 'employee_id', 'loving', 'confident', 'successful', 'faithful', 'flirty', 'compassionate', 'extroverted', 'caring', 'patient', 'adventurous', 'healthy_lifestyle', 'sum'
    ];

    public function client(){

        return $this->belongsTo('App\Client');

    }

    public function employee(){

        return $this->belongsTo('App\Employee');

    }

    
    //Return array of Employee IDs by filtered by personality [CREATE]
    public static function getEmployeeByPersonalityCreate(Request $request){

        $numberOfPersonalitiesToGet = $request->personalitiesNumber; //how much to return

        $clientPersonality = ClientPersonality::find($request->client_personality_id);   //find personality entity for selected client

        $counterOfPersonality = count($clientPersonality)-4;  //number of personalities in personality table

        $employeeArrayToReturn = [];    //array to return after findings

        foreach(EmployeePersonality::all() as $employeePersonality)    //accessing every employee's personality to find personality difference for each personality for each entity
        {
            $ClientEmployeePersonalityMatch = ClientEmployeePersonalityMatch::Create([
                'employee_id' => $employeePersonality->employee_id,
                'client_id' => $request->client_id,
                'loving' => abs($clientPersonality->loving - $employeePersonality->loving),
                'confident' => abs($clientPersonality->confident - $employeePersonality->confident),
                'successful' => abs($clientPersonality->successful - $employeePersonality->successful),
                'faithful' => abs($clientPersonality->faithful - $employeePersonality->faithful),
                'flirty' => abs($clientPersonality->flirty - $employeePersonality->flirty),
                'compassionate' => abs($clientPersonality->compassionate - $employeePersonality->compassionate),
                'extroverted' => abs($clientPersonality->extroverted - $employeePersonality->extroverted),
                'caring' => abs($clientPersonality->caring - $employeePersonality->caring),
                'patient' => abs($clientPersonality->patient - $employeePersonality->patient),
                'adventurous' => abs($clientPersonality->adventurous - $employeePersonality->adventurous),
                'healthy_lifestyle' => abs($clientPersonality->healthy_lifestyle - $employeePersonality->healthy_lifestyle),
                'sum' => (
                    abs($clientPersonality->loving - $employeePersonality->loving)+
                    abs($clientPersonality->confident - $employeePersonality->confident)+
                    abs($clientPersonality->successful - $employeePersonality->successful)+
                    abs($clientPersonality->faithful - $employeePersonality->faithful)+
                    abs($clientPersonality->flirty - $employeePersonality->flirty)+
                    abs($clientPersonality->compassionate - $employeePersonality->compassionate)+
                    abs($clientPersonality->extroverted - $employeePersonality->extroverted)+
                    abs($clientPersonality->caring - $employeePersonality->caring)+
                    abs($clientPersonality->patient - $employeePersonality->patient)+
                    abs($clientPersonality->adventurous - $employeePersonality->adventurous)+
                    abs($clientPersonality->healthy_lifestyle - $employeePersonality->healthy_lifestyle)
                )
            ]);
        }
        
        $CEPMs = ClientEmployeePersonalityMatch::where('client_id', '=', $request->client_id)->select('employee_id')->orderBy('sum', 'asc')->limit($numberOfPersonalitiesToGet)->get()->toArray();
        
        $employeeIdArrayToReturn = [];

        foreach($CEPMs as $key=>$value){
            foreach($value as $name=>$id){
                $employeeIdArrayToReturn [] = $id;
            }
        }

        return $employeeIdArrayToReturn;

    }

    //Return array of Employee IDs by filtered by personality [UPDATE]
    public static function getEmployeeByPersonalityUpdate(Request $request){

        $CEPMs = ClientEmployeePersonalityMatch::where('client_id', '=', $request->client_id)->get();

        foreach($CEPMs as $CEPM)
        {
            $CEPM->delete();
        }

        return $this::getEmployeeByPersonalityCreate($request);
    }

    //Return array of Employee IDs by filtered by personality [SELECT]
    public static function getEmployeeByPersonalitySelect(Request $request){

        $numberOfPersonalitiesToGet = $request->personalitiesNumber;
        
        $CEPMs = ClientEmployeePersonalityMatch::where('client_id', '=', $request->client_id)->select('employee_id')->orderBy('sum', 'asc')->limit($numberOfPersonalitiesToGet)->get()->toArray();
        
        $employeeIdArrayToReturn = [];

        foreach($CEPMs as $key=>$value){
            foreach($value as $name=>$id){
                $employeeIdArrayToReturn [] = $id;
            }
        }

        return $employeeIdArrayToReturn;

    }
    

    //CRUD: Create
    public static function createClientEmployeePersonalityMatch(Request $request){

        $request->validate([
            'loving' => 'required|integer',
            'confident' => 'required|integer',
            'successful' => 'required|integer',
            'faithful' => 'required|integer',
            'flirty' => 'required|integer',
            'compassionate' => 'required|integer',
            'extroverted' => 'required|integer',
            'caring' => 'required|integer',
            'patient' => 'required|integer',
            'adventurous' => 'required|integer',
            'healthy_lifestyle' => 'required|integer',
            'sum' => 'required|integer'
        ]);

        $CEPM = ClientEmployeePersonalityMatch::create([
            'client_id' => $request->client_id,
            'employee_id' => $request->employee_id,
            'loving' => $request->loving,
            'confident' => $request->confident,
            'successful' => $request->successful,
            'faithful' => $request->faithful,
            'flirty' => $request->flirty,
            'compassionate' => $request->compassionate,
            'extroverted' => $request->extroverted,
            'caring' => $request->caring,
            'patient' => $request->patient,
            'adventurous' => $request->adventurous,
            'healthy_lifestyle' => $request->healthy_lifestyle,
            'sum' => $request->sum
        ]);

        return redirect()->back();


    }

    //CRUD: Select
    public static function selectClientEmployeePersonalityMatch(Request $request){

        $CEPM = ClientEmployeePersonalityMatch::findOrFail($request->id);

        return $CEPM;

    }

    //CRUD: Update
    public static function updateClientEmployeePersonalityMatch(Request $request){

        $CEPM = ClientEmployeePersonalityMatch::findOrFail($request->id);

        $CEPM->loving = $request->loving;
        $CEPM->confident = $request->confident;
        $CEPM->successful = $request->successful;
        $CEPM->faithful = $request->faithful;
        $CEPM->flirty = $request->flirty;
        $CEPM->compassionate = $request->compassionate;
        $CEPM->extroverted = $request->extroverted;
        $CEPM->caring = $request->caring;
        $CEPM->patient = $request->patient;
        $CEPM->adventurous = $request->adventurous;
        $CEPM->healthy_lifestyle = $request->healthy_lifestyle;
        $CEPM->sum = $request->sum;

        $CEPM->save();

        return redirect()->back();

    }

    //CRUD: Delete
    public static function deleteClientEmployeePersonalityMatch(Request $request){

        $CEPM = ClientEmployeePersonalityMatch::findOrFail($request->id);

        $CEPM->delete();

        return redirect()->back();

    }

}
