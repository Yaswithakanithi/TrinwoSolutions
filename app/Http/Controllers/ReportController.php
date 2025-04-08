<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Client;

class ReportController extends Controller
{
    public function index()
    {
        $totalEmployees = Employee::count();
        $totalClients = Client::count();

        return view('admin.reports.index', compact('totalEmployees', 'totalClients'));
    }
}
