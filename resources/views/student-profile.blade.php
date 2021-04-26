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
                        <a class="btn btn-primary mb-5" href="{{route('students_list')}}"><i class="icofont-arrow-left"></i></a>
                       <h3 class="mb-2">Student Profile</h3>
                       @foreach ($student_data as $data)
                        <div class="container">   
                            <div class="row">
                            <div class="col-md-4">
                                <img class="img-fluid" style="height: 200px;" src="{{asset('/storage/students_passports/'.$data->passport_photograph)}}" alt="Profile Photo">
                            </div>
                            <div class="col-md-8 p-1">
                                <h5><b>Name:</b> {{$data->name}}</h5>
                                <h5><b>School:</b> {{$data->school}}</h5>
                                <h5><b>Age:</b> {{$data->age}}</h5>
                                <h5><b>Gender:</b> {{$data->gender}}</h5>
                                <h5><b>Class:</b> {{$data->class}}</h5>
                                <h5><b>Guardian Email:</b> {{$data->Guardian_email}}</h5>

                                <p class="mt-5"><i>Last Updated: {{$data->updated_at->diffForHumans()}}</i></p>
                            </div>
                        </div>
                       @endforeach
                       </div>
                    </div>
                </div>
                <div class="p-3">
                    <i class="text-success"><b>Kindly Type report Below and Send to Parent</b></i>
                </div>
                <div class="p-3">
                    <form action="{{route('report', $data->id)}}" method="POST">
                        @csrf
                        <label for=""><b>Student Report</b></label>
                        <textarea name="report" class="form-control" placeholder="Enter Student Report" required id="" cols="30" rows="10"></textarea> <br>
                        <input type="submit" class="btn btn-success" value="Send Report to Parent">
                    </form>
                </div>
            </div>
            
        </div>
        
    </div>
    
</div>
@endsection