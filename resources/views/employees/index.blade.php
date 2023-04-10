<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

@extends('layouts.app')

@section('content')
<a href="{{ url('/home') }}" class="btn btn-secondary">Back</a>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Employees</h2>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Add Employee</a>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Company</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <th scope="row">{{ $employee->id }}</th>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->company->name }}</td>
                            <td>
                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-primary btn-sm">View</a>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-success btn-sm">Edit</a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $employees->appends(request()->input())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>