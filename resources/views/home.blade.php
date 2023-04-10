<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>


@extends('layouts.app')

@section('content')
@php
    use Illuminate\Support\Facades\URL;
@endphp
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-secondary float-right">Log Out</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ URL::to('/companies') }}" class="btn btn-primary mr-2">Companies</a>
                <a href="{{ URL::to('/employees') }}" class="btn btn-primary">Employees</a>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
