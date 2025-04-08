@extends('layouts.employee') {{-- or your appropriate layout --}}
@section('title', 'Add Client')

@section('content')
<style>
    .form-wrapper {
        max-width: 650px;
        width: 100%;
        background: #ffffff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        margin: 0 auto;
    }

    .form-wrapper h2 {
        margin-bottom: 25px;
        color: #007bff;
        font-size: 28px;
        font-weight: 700;
        text-align: center;
        border-bottom: 2px solid #007bff;
        padding-bottom: 10px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: 600;
        color: #333;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="tel"],
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        background: #f9f9f9;
        transition: border-color 0.3s ease;
    }

    input:focus,
    textarea:focus {
        border-color: #007bff;
        outline: none;
        background: #fff;
    }

    .submit-btn {
        background: #007bff;
        color: white;
        padding: 14px 25px;
        border: none;
        border-radius: 8px;
        font-size: 18px;
        font-weight: bold;
        width: 100%;
        transition: background 0.3s ease-in-out;
    }

    .submit-btn:hover {
        background: #0056b3;
    }
</style>

<div class="form-wrapper">
    <h2>Add New Client</h2>
    <form action="{{ route('mainemployee.clients.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required placeholder="Enter client name">
        </div>

        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required placeholder="Enter client email">
        </div>

        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required placeholder="Enter client phone">
        </div>

        <div class="form-group">
            <label for="address">Client Address:</label>
            <textarea id="address" name="address" rows="3" required placeholder="Enter client address"></textarea>
        </div>

        <div class="form-group">
            <label for="company_name">Company Name:</label>
            <input type="text" id="company_name" name="company_name" required placeholder="Enter company name">
        </div>

        <div class="form-group">
            <label for="password">Client Password:</label>
            <input type="password" id="password" name="password" required placeholder="Set a password">
        </div>

        <button type="submit" class="submit-btn">Add Client</button>
    </form>
</div>
@endsection
