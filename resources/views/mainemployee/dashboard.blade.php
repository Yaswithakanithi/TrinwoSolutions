@extends('layouts.employee')

@section('title', 'Employee Dashboard')

@section('content')
<style>
    .dashboard-container {
        padding: 30px;
        background: #f4f8fb;
    }

    .dashboard-header {
        margin-bottom: 30px;
    }

    .dashboard-header h2 {
        font-size: 30px;
        font-weight: bold;
        color: #007bff;
    }

    .stats-cards {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 30px;
    }

    .card-box {
        flex: 1;
        min-width: 250px;
        background: #fff;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        text-align: center;
        transition: 0.3s ease;
    }

    .card-box:hover {
        transform: translateY(-5px);
    }

    .card-title {
        font-size: 18px;
        font-weight: 600;
        color: #555;
        margin-bottom: 10px;
    }

    .card-value {
        font-size: 32px;
        font-weight: bold;
        color: #007bff;
    }

    .quick-actions {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .action-btn {
        background: #007bff;
        color: #fff;
        padding: 12px 20px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        transition: background 0.3s ease;
        text-decoration: none;
        text-align: center;
    }

    .action-btn:hover {
        background: #0056b3;
    }
</style>

<div class="dashboard-container">
    <div class="dashboard-header">
    <h2>Welcome, {{ $employee->name }}</h2>
<p>You’re logged in as Employee ID: <strong>{{ $employee->employee_id }}</strong></p>

    </div>

    <div class="card-box">
    <div class="card-title">Clients Added This Month</div>
    <div class="card-value">{{ $monthlyClients ?? 0 }}</div>
</div>

<div class="card-box">
    <div class="card-title">Total Active Clients</div>
    <div class="card-value">{{ $activeClients ?? 0 }}</div>
</div>

@endsection
