<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }


    public function create()
    {
        return view('admin.clients.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients',
            'phone' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'company_name' => $request->company_name,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('clients.index')->with('success', 'Client added successfully!');
    }

  
    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'phone' => 'required',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $data = $request->only(['name', 'email', 'phone', 'address', 'company_name']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $client->update($data);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully!');
    }

  
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully!');
    }


    public function employeeIndex()
    {
        $clients = Client::all();
        return view('mainemployee.clients.index', compact('clients'));
    }

    public function employeeCreate()
    {
        return view('mainemployee.clients.create');
    }


public function employeeStore(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:clients,email',
        'phone' => 'nullable|string|max:20',
        'company_name' => 'nullable|string|max:255',
        'password' => 'required|string|min:6',
    ]);
    $client = new Client();
    $client->name = $request->name;
    $client->email = $request->email;
    $client->phone = $request->phone;
    $client->company_name = $request->company_name;
    $client->password = Hash::make($request->password);
    
    
    $client->employee_id = auth()->id(); 
    $client->added_by_employee_id = auth()->id();
    
    $client->save();
    

    return redirect()->route('mainemployee.clients.index')->with('success', 'Client added successfully!');
}

    public function employeeEdit(Client $client)
    {
        return view('mainemployee.clients.edit', compact('client'));
    }

    public function employeeUpdate(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'phone' => 'required',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $data = $request->only(['name', 'email', 'phone', 'address', 'company_name']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $client->update($data);

        return redirect()->route('mainemployee.clients.index')->with('success', 'Client updated successfully!');
    }

    
    public function employeeDestroy(Client $client)
    {
        $client->delete();
        return redirect()->route('mainemployee.clients.index')->with('success', 'Client deleted successfully!');
    }
}
