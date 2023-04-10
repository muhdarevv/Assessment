
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
            <div class="d-flex justify-content-between mb-3">
                <h2>Companies</h2>
                <a href="{{ route('companies.create') }}" class="btn btn-primary">Add Company</a>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Logo</th>
                        <th>Website</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>
                                @if ($company->logo)
                                <img src="/logos/{{ $company->logo }}" alt="{{ $company->name }}" width="100">

                                @endif
                            </td>
                            <td>{{ $company->website }}</td>
                            <td>
                                <a href="{{ route('companies.show', $company->id) }}" class="btn btn-primary btn-sm">View</a>
                                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $companies->appends(request()->input())->links('pagination::bootstrap-4') }}

        </div>
    </div>
</div>
@endsection
