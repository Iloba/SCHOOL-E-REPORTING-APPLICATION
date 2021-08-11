@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header"><a href="{{route('home')}}">{{ __('Dashboard') }}</a> | {{ __('Welcome Admin, You are logged in!') }}</div>

                <div class="card-body">     
                        @include('layouts.message')
                    
                    <div class="p-4">
                        <a class="btn btn-primary mb-5" href="{{route('students_list')}}"><i class="icofont-arrow-left"></i></a>
                       <h3 class="mb-2">Student Profile</h3>
                        <div class="container">   
                            <div class="row">
                            <div class="col-md-4 mb-4">
                                <img style=" border: 5px solid #6cb2eb;" class="img-fluid mr-2" style="height: 200px;" src="{{asset('/uploads/students_passports/'.$student_data->passport_photograph)}}" alt="Profile Photo">
                            </div>
                            <div class="col-md-8 p-1">
                                <h5><b>Name:</b> {{$student_data->name}}</h5>
                                <h5><b>School:</b> {{$student_data->school}}</h5>
                                <h5><b>Age:</b> {{$student_data->age}}</h5>
                                <h5><b>Gender:</b> {{$student_data->gender}}</h5>
                                <h5><b>Class:</b> {{$student_data->class}}</h5>
                                <h5><b>Guardian Email:</b> {{$student_data->Guardian_email}}</h5>
                                <p class="mt-5"><i>Last Updated: {{$student_data->updated_at->diffForHumans()}}</i></p>
                            </div>
                        </div>
                    
                       </div>
                    </div>
                </div>
                <div class="p-3">
                    <i class="text-success"><b>Kindly Type report Below and Send to Parent</b></i>
                </div>
                <div class="p-3">
                    <form action="{{route('report', $student_data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="student-report"><b>Student Report</b></label>
                        <textarea name="report" class="form-control" placeholder="Enter Student Report" required id="" cols="30" rows="5"></textarea> <br>
                        <label for="student-report-file"><b>Attach Student Report File</b></label>
                        <input type="file" name="report_file" class="form-control"> <br>
                        <input type="submit" class="btn btn-success" value="Send Report to Parent">
                    </form>
                </div>
            </div>
            
        </div>
        
    </div>
    
</div>
@endsection