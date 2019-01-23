<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;
use Illuminate\Http\Request;
use App\Interest;

class EmployeeInterest extends Model
{
    //

    protected $fillable = [
        'employee_id', 'interest_id'
    ];

    
    public function employee(){

        return $this->belongsTo(Employee::class);

    }

    public function interest(){

        return $this->belongsTo(Interest::class);

    }

    //Return array of Employee IDs by filtered by interests
    public static function getEmployeeByInterests(Request $request){

        $employeeToReturn = [];

        foreach($request->employeeInterest as $Interest)
        {

            $Interest_Id = Interest::where('name', '=', $Interest)
                                   ->select('id')
                                   ->get();

            foreach($Interest_Id as $key=>$value){
                foreach($value as $name=>$id){
                    $Interest_Id = $id;
                }
            }

            foreach(EmployeeInterest::all() as $EI)
            {
                if($EI->interest_id == $Interest_id)
                {
                    $employeeToReturn[]=$EI->employee_id;
                }
            }
        }

        $employeeToReturnUNIQUE = [];
        $employeeToReturnUNIQUE = array_unique($employeeToReturn);
        $employeeToReturnUNIQUE_FINAL = [];
        foreach($employeeToReturnUNIQUE as $key=>$value)
        {
            $employeeToReturnUNIQUE_FINAL [] = $value;
        }
        return $employeeToReturnUNIQUE_FINAL;

    }

    //CRUD: Create
    public static function createEmployeeInterest(Request $request){

        $request->validate([
            'employee_id' => 'required|integer',
            'interest_id' => 'required|integer'
        ]);

        $EmployeeInterest = EmployeeInterest::create([
            'employee_id' => $request->employee_id,
            'interest_id' => $request->interest_id
        ]);

        return redirect()->back();

    }

    //CRUD: Select
    public static function selectEmployeeInterest(Request $request){

        $EmployeeInterest = EmployeeInterest::findOrFail($request->id);
        
        return $EmployeeInterest;

    }

    //CRUD: Update
    public static function updateEmployeeInterest(Request $request){

        $EmployeeInterest = EmployeeInterest::findOrFail($request->id);
        
        //implement here if something to be updated

        $EmployeeInterest->save();

        return redirect()->back();

    }

    //CRUD: Delete
    public static function deleteEmployeeInterest(Request $request){

        $EmployeeInterest = EmployeeInterest::findOrFail($request->id);

        $EmployeeInterest->delete();

        return redirect()->back();

    }



}
