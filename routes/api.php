<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use App\Models\Client;

Route::get('/dashboard/stats', function () {
    return response()->json([
        'totalEmployees' => Employee::count(),
        'totalClients' => Client::count()
    ]);
});

Route::post('/employees/add', function (Request $request) {
    Employee::create([
        'name' => $request->name,
        'email' => $request->email
    ]);
    return response()->json(['message' => 'Employee added successfully!']);
});
