<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Client;
use App\TransactionType;
use App\EmployeeType;
use App\ClientType;
use App\Interest;

class AdminController extends Controller
{
    
    public function index()
    {
        dd('ADMIN!');
        return view('admin');
    }

    #region Employee CRUD
    public function createEmployee(Request $request){

        Employee::createEmployee($request);

    }

    public function selectEmployee(Request $request){

        Employee::selectEmployee($request);
        
    }

    public function deleteEmployee(Request $request){

        Employee::deleteEmployee($request);
        
    }

    public function updateEmployee(Request $request){

        Employee::updateEmployee($request);
        
    }
    #endregion

    #region Client CRUD
    public function createClient(Request $request){

        Client::createClient($request);

    }

    public function selectClient(Request $request){

        Client::selectClient($request);
        
    }

    public function deleteClient(Request $request){

        Client::deleteClient($request);
        
    }

    public function updateClient(Request $request){

        Client::updateClient($request);
        
    }
    #endregion

    #region Transaction Type CRUD
    public function createTransactionType(Request $request){

        TransactionType::createTransactionType($request);

    }

    public function selectTransactionType(Request $request){

        TransactionType::selectTransactionType($request);
        
    }

    public function updateTransactionType(Request $request){

        TransactionType::updateTransactionType($request);
        
    }

    public function deleteTransactionType(Request $request){

        TransactionType::deleteTransactionType($request);
        
    }
    #endregion

    #region Employee Type CRUD
    public function createEmployeeType(Request $request){

        EmployeeType::createEmployeeType($request);

    }

    public function selectEmployeeType(Request $request){

        EmployeeType::selectEmployeeType($request);
        
    }

    public function updateEmployeeType(Request $request){

        EmployeeType::updateEmployeeType($request);
        
    }

    public function deleteEmployeeType(Request $request){

        EmployeeType::deleteEmployeeType($request);
        
    }
    #endregion

    #region Client Type CRUD
    public function createClientType(Request $request){

        ClientType::createClientType($request);

    }

    public function selectClientType(Request $request){

        ClientType::selectClientType($request);
        
    }

    public function updateClientType(Request $request){

        ClientType::updateClientType($request);
        
    }

    public function deleteClientType(Request $request){

        ClientType::deleteClientType($request);
        
    }
    #endregion

    #region Interest CRUD
    public function createInterest(Request $request){

        Interest::createInterest($request);
        
    }
    
    public function selectInterest(Request $request){

        Interest::selectInterest($request);
        
    }

    public function updateInterest(Request $request){

        Interest::updateInterest($request);
        
    }

    public function deleteInterest(Request $request){

        Interest::deleteInterest($request);
        
    }
    #endregion

}
