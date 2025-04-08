@extends('layouts.employee')

@section('content')
    <div class="profile-container">
        <h2>Welcome, {{ $employee->name }}!</h2>
        <p><strong>Employee ID:</strong> {{ $employee->employee_id }}</p>
        <p><strong>Email:</strong> {{ $employee->email }}</p>
        <p><strong>Department:</strong> {{ $employee->department ?? 'Not Assigned' }}</p>
        <p><strong>Joined On:</strong> {{ $employee->created_at->format('d M, Y') }}</p>
    </div>
@endsection
