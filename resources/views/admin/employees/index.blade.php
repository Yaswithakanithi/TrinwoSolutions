@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Employees</h2>
    
   
    <div class="text-end mb-3">
        <a href="{{ route('employees.create') }}" class="btn btn-primary">
            <i class="fas fa-user-plus"></i> Add Employee
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>S no</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Employee ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $key => $employee)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->employee_id }}</td>
                        <td>
                     
                            <a href="{{ route('employees.dashboard', $employee->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i> View Dashboard
                            </a>

                        
                            <a href="{{ route('admin.employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                       
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
