@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Client</h2>

    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" value="{{ $client->name }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="{{ $client->email }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Phone:</label>
            <input type="text" name="phone" value="{{ $client->phone }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Company:</label>
            <input type="text" name="company_name" value="{{ $client->company_name }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Update Client</button>
    </form>
</div>
@endsection
