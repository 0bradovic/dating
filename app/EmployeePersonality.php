<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;
use Illuminate\Http\Request;

class EmployeePersonality extends Model
{
    //

    protected $fillable = [
        'employee_id', 'loving', 'confident', 'successful', 'faithful', 'flirty', 'compassionate', 'extroverted', 'caring', 'patient', 'adventurous', 'healthy_lifestyle'
    ];

    public function employee(){

        return $this->belongsTo(Employee::class);

    }

    //CRUD: Create
    public static function createEmployeePersonality(Request $request){

        $request->validate([
            'employee_id' => 'required|integer',
            'loving'  => 'required|integer',
            'confident'  => 'required|integer',
            'successful'  => 'required|integer',
            'faithful'  => 'required|integer',
            'flirty'  => 'required|integer',
            'compassionate'  => 'required|integer',
            'extroverted'  => 'required|integer',
            'caring'  => 'required|integer',
            'patient'  => 'required|integer',
            'adventurous'  => 'required|integer',
            'healthy_lifestyle'  => 'required|integer',
        ]);

        $EmployeePersonality = EmployeePersonality::create([
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
            'healthy_lifestyle' => $request->healthy_lifestyle
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectEmployeePersonality(Request $request){

        $EmployeePersonality = EmployeePersonality::findOrFail($request->id);

        return $EmployeePersonality;

    }

    //CRUD: Update
    public static function updateEmployeePersonality(Request $request){

        $EmployeePersonality = EmployeePersonality::findOrFail($request->id);

        $EmployeePersonality->employee_id = $request->employee_id;
        $EmployeePersonality->loving = $request->loving;
        $EmployeePersonality->confident = $request->confident;
        $EmployeePersonality->successful = $request->successful;
        $EmployeePersonality->faithful = $request->faithful;
        $EmployeePersonality->flirty = $request->flirty;
        $EmployeePersonality->compassionate = $request->compassionate;
        $EmployeePersonality->extroverted = $request->extroverted;
        $EmployeePersonality->caring = $request->caring;
        $EmployeePersonality->patient = $request->patient;
        $EmployeePersonality->adventurous = $request->adventurous;
        $EmployeePersonality->healthy_lifestyle = $request->healthy_lifestyle;

        $EmployeePersonality->save();

        return redirect()->back();

    }

    //CRUD: Delete
    public static function deleteEmployeePersonality(Request $request){

        $EmployeePersonality = EmployeePersonality::findOrFail($request->id);

        $EmployeePersonality->delete();

        return redirect()->back();

    }

}
