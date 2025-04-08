<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Client;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        $totalEmployees = Employee::count();
        $totalClients = Client::count();

        return view('admin.dashboard', compact('totalEmployees', 'totalClients'));
    }
    public function viewEmployeeDashboard($id)
{
    $employee = Employee::findOrFail($id);
    return view('employees.dashboard', compact('employee'));
}

}
