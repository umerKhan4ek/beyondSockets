@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
        @foreach ($NonUsers as $User)
        <div class="row ">
            <div class="col-md-4">

                <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title" style="text-transform:capitalize">{{$User->id}}</h5>


                    <a href="">Chat with {{$User->name}}</a>
                        
                        
                    </div>
                </div> 
            </div>
        </div>
        @endforeach
          
    </div>
</div>
@endsection
