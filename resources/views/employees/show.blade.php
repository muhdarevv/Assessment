<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ $employee->name }}</div>

        <div class="card-body">
          <div class="form-group">
            <strong>First Name:</strong>
            {{ $employee->first_name }}
          </div>
          <div class="form-group">
            <strong>Last Name:</strong>
            {{ $employee->last_name }}
          </div>
          <div class="form-group">
            <strong>Email:</strong>
            {{ $employee->email }}
          </div>
          <div class="form-group">
            <strong>Company:</strong>
            {{ $employee->company->name }}
          </div>
          <div class="form-group">
            <a href="{{ route('employees.index') }}" class="btn btn-primary">Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
