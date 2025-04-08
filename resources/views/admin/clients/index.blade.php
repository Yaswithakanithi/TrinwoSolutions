
@extends('layouts.app')
@section('title', 'Clients List')

@section('content')
    <style>
        .client-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .client-table th, .client-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .client-table thead {
            background-color: #007BFF;
            color: white;
        }

        .client-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .client-table tbody tr:hover {
            background-color: #eef5ff;
        }

        .action-links a, .action-links form {
            display: inline-block;
            margin-right: 10px;
        }

        .action-links form {
            margin: 0;
        }

        .btn-link {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-link:hover {
            text-decoration: underline;
        }

        .btn-delete {
            color: red;
            border: none;
            background: none;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-delete:hover {
            text-decoration: underline;
        }

        .alert-success {
            color: green;
            font-weight: 600;
            margin-bottom: 15px;
        }
    </style>

    <h2 style="margin-bottom: 20px;">Clients List</h2>
    <div class="text-end mb-3">
        <a href="{{ route('clients.create') }}" class="btn btn-primary">
            <i class="fas fa-user-plus"></i> Add Clients
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <table class="client-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Company Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->company_name }}</td>

                    <td class="action-links">
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn-link">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this client?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">No clients found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
