@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Edit Employee</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Employee Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $employee->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{ $employee->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" name="position" class="form-control" value="{{ $employee->position }}" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Update Employee</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center mt-3">
                <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary">Back to Employees</a>
            </div>
        </div>
    </div>
</div>
@endsection


