@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} | {{ __('Welcome Admin, You are logged in!') }}</div>

                <div class="card-body">     
                        @include('layouts.message')
                    
                    <div class="p-4">
                        <h3>Update Profile Picture</h3>
                        <div>
                            <form action="/upload" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="passport" > 
                                <input type="submit" value="Upload" class="btn btn-info">
                            </form>
                        </div>

                        
                        <div class="mt-3 p-4">
                            <h3 class="mt-5">Add New Student</h3>
                            <form action="{{route('register_student')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for=""><b>Student Name</b></label> 
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">              
                                      <span class="input-group-text" id="basic-addon1"><i class="icofont-ui-user"></i></span>
                                    </div>  
                                    <input type="text" name="student_name" class="form-control" placeholder="student Name" value="{{old('student_name')}}" aria-label="Student Name" aria-describedby="basic-addon1">
                                </div>

                                <label for=""><b>Student Passport Photograph</b></label> 
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1"><i class="icofont-picture"></i></span>
                                    </div>
                                    <input type="file" name="student_passport" class="form-control" placeholder="student Name" value="{{old('student_passport')}}" aria-label="Student Name" aria-describedby="basic-addon1">
                                </div>

                                <label for=""><b>Student Age</b></label> 
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1"><i class="icofont-calendar"></i></span>
                                    </div>
                                    <input type="number" name="student_age" class="form-control" placeholder="student Age" value="{{old('student_age')}}" aria-label="Student Age" aria-describedby="basic-addon1">
                                </div>

                                <label for=""><b>Student Class</b></label> 
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1"><i class="icofont-book"></i></span>
                                    </div>
                                    <input type="text" name="student_class" class="form-control" placeholder="student Class" value="{{old('student_class')}}" aria-label="Student Name" aria-describedby="basic-addon1">
                                </div>

                                <label for=""><b>Student Guardian's Email</b></label> 
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1"><i class="icofont-email"></i></span>
                                    </div>
                                    <input type="Email" name="guardian_email" class="form-control" placeholder="Guardian Email" value="{{old('guardian_email')}}" aria-label="Student Name" aria-describedby="basic-addon1">
                                </div>

                                <input type="submit" class="btn btn-success mt-4" value="Register Student">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
