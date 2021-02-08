@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Name: {{$userData->name}}</p>
                    <p>Email: {{$userData->email}}</p>
                    
                    <a href="{{route('AllProducts')}}" class="btn btn-info">Go back to Website</a>
                        
                    @if($userData->isAdmin())
                        <a href="{{route('adminDisplayProducts')}}" class="btn btn-info">Admin Dashboard</a>
                    @else

                    @endif
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
