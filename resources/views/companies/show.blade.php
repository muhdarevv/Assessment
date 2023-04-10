<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Company Details
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $company->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $company->email }}</td>
                                </tr>

                                <tr>
                                    <td>Website </td>
                                    <td>{{ $company->website }}</td>
                                </tr>
                                <tr>
                                    <td>Logo</td>
                                    <td>
                                        @if($company->logo)
                                        <img src="/logos/{{ $company->logo }}" alt="{{ $company->name }}" width="100">
                                        @else
                                            No Logo
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('companies.index') }}" class="btn btn-secondary">Back</a>
                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
