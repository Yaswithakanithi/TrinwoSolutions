<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class EmployeeAuthController extends Controller
{
    public function index()
{
    $employee = Auth::guard('employee')->user();
    return view('mainemployee.dashboard', ['employee' => $employee]);

}

    public function showLoginForm()
    {
        return view('employee.auth.login');
    }

    
   
    public function login(Request $request)
{
    $credentials = $request->validate([
        'employee_id' => 'required', // Fix: Validate employee_id instead of email
        'password' => 'required',
    ]);

    if (Auth::guard('employee')->attempt(['employee_id' => $credentials['employee_id'], 'password' => $credentials['password']])) {
        $request->session()->regenerate();
        return redirect()->route('mainemployee.dashboard'); // Ensure this route exists
    }

    return back()->withErrors([
        'employee_id' => 'The provided credentials do not match our records.',
    ]);
}

    
    public function logout()
    {
        Auth::guard('employee')->logout();
        return redirect()->route('employee.login');
    }
}
