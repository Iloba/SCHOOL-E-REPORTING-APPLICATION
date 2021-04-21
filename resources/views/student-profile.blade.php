@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{route('home')}}">{{ __('Dashboard') }}</a> | {{ __('Welcome Admin, You are logged in!') }}</div>

                <div class="card-body">     
                        @include('layouts.message')
                    
                    <div class="p-4">
                       <h3>Student Profile</h3>
                       @foreach ($student_data as $data)
                        <div class="container">   
                            <div class="row">
                            <div class="col-md-4">
                                <img class="img-fluid" style="height: 200px;" src="{{asset('/storage/students_passports/'.$data->passport_photograph)}}" alt="Profile Photo">
                            </div>
                            <div class="col-md-8">
                                <h4><b>Name:</b> {{$data->name}}</h4>
                                <h4><b>Age:</b> {{$data->age}}</h4>
                                <h4><b>Class:</b> {{$data->class}}</h4>
                                <h4><b>Guardian Email:</b> {{$data->Guardian_email}}</h4>

                            </div>
                        </div>
                       @endforeach
                      
                       
                       </div>
                      
                    </div>
                    <a class="btn btn-primary" href="{{route('students_list')}}">Return</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection