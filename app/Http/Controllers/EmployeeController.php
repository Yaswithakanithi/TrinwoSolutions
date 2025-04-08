<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    // 🔒 Employee's own dashboard
    public function showDashboard($id = null)
    {
        if ($id) {
            // Admin is previewing another employee
            $employee = Employee::findOrFail($id);
        } else {
            // Authenticated employee
            $employee = Auth::guard('employee')->user();
    
            if (!$employee) {
                // Redirect to employee login instead
                return redirect()->route('employee.login');
            }
        }
    
        $clientCount = $employee->clients()->count();
    
        return view('mainemployee.dashboard', compact('clientCount', 'employee'));
    }
    
    // Admin view of Employee Profile (without authentication as employee)
public function adminViewProfile($id)
{
    $employee = Employee::findOrFail($id);
    return view('mainemployee.profile', compact('employee'));
}

// Admin view of Employee Clients (without authentication as employee)
public function adminViewClients($id)
{
    $employee = Employee::findOrFail($id);
    $clients = $employee->clients; // assuming the clients() relationship exists
    return view('mainemployee.clients.index', compact('clients', 'employee'));
}

    
    // 👤 Employee profile
    public function profile()
    {
        $employee = Auth::guard('employee')->user();
        return view('mainemployee.profile', compact('employee'));
    }

    // 👨‍💼 Admin: Show all employees (Employee Table)
    public function adminIndex()
    {
        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }

    // ➕ Admin: Create employee form
    public function create()
    {
        return view('admin.employees.create');
    }

    // 💾 Admin: Store new employee
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'employee_id' => 'required|unique:employees',
            'password' => 'required|min:6',
        ]);

        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'employee_id' => $request->employee_id,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.employees.index')->with('success', 'Employee added successfully!');
    }

    // ✏️ Admin: Edit employee
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('admin.employees.edit', compact('employee'));
    }

    // 📝 Admin: Update employee
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $id,
            'position' => 'required|string|max:255',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
            'position' => $request->position,
        ]);

        return redirect()->route('admin.employees.index')->with('success', 'Employee updated successfully!');
    }

    // ❌ Admin: Delete employee
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('admin.employees.index')->with('success', 'Employee deleted successfully.');
    }

    // 👨‍💼 Employee view their assigned clients (employee-side index)
    public function index()
    {
        $employee = auth()->guard('employee')->user();
        $clients = $employee->clients; // Assumes a clients() relationship
        return view('clients.index', compact('clients'));
    }
}
