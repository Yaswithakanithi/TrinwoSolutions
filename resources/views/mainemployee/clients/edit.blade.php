@extends('layouts.employee')
@section('title', 'Edit Client')

@section('content')
    <h2>Edit Client</h2>

    <form action="{{ route('mainemployee.clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name" value="{{ $client->name }}" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $client->email }}" required><br><br>

        <label>Phone:</label>
        <input type="text" name="phone" value="{{ $client->phone }}" required><br><br>

        <label>Company Name:</label>
        <input type="text" name="company_name" value="{{ $client->company_name }}" required><br><br>

        <button type="submit">Update</button>
    </form>
@endsection
