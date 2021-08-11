@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
            <div class="card">
                <div class="card-header"><a href="{{route('home')}}">{{ __('Dashboard') }}</a> | {{ __('Welcome Admin, You are logged in!') }}</div>
                
                <div class="card-body"> 
                    <a class="btn btn-primary mb-5" href="{{route('home')}}"><i class="icofont-arrow-left"></i></a>    
                        @include('layouts.message')
                    @foreach ($students_data as $student)
                    <div class="p-4">
                        <div class="mt-3 p-4">
                            <h3 class="mt-5">Edit Student | {{$student->name}}</h3>
                            <form action="{{route('update', $student->id)}}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <label for=""><b>Student Name</b></label> 
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">              
                                      <span class="input-group-text" id="basic-addon1"><i class="icofont-ui-user"></i></span>
                                    </div>  
                                    <input type="text" name="student_name" class="form-control" placeholder="student Name" value="{{$student->name}}" aria-label="Student Name" aria-describedby="basic-addon1">
                                </div>

                                <label for=""><b>Student Passport Photograph</b></label> 
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1"><i class="icofont-picture"></i></span>
                                    </div>
                                    <input type="file" name="student_passport" class="form-control" placeholder="student Name" value="{{$student->passport_photograph}}" aria-label="Student Name" aria-describedby="basic-addon1">
                                </div>

                                <label for=""><b>Student Age</b></label> 
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1"><i class="icofont-calendar"></i></span>
                                    </div>
                                    <input type="number" name="student_age" class="form-control" placeholder="student Age" value="{{$student->age}}" aria-label="Student Age" aria-describedby="basic-addon1">
                                </div>

                                <label for=""><b>Student Class</b></label> 
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1"><i class="icofont-book"></i></span>
                                    </div>
                                    <input type="text" name="student_class" class="form-control" placeholder="student Class" value="{{$student->class}}" aria-label="Student Name" aria-describedby="basic-addon1">
                                </div>

                                <label for=""><b>Student Guardian's Email</b></label> 
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1"><i class="icofont-email"></i></span>
                                    </div>
                                    <input type="Email" name="guardian_email" class="form-control" placeholder="Guardian Email" value="{{$student->Guardian_email}}" aria-label="Student Name" aria-describedby="basic-addon1">
                                </div>

                                <input type="submit" class="btn btn-success mt-4" value="Update Student Record">
                            </form>
                        </div>

                    </div>
                    @endforeach
          
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
