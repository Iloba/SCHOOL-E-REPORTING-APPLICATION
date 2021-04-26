@extends('layouts.email')
@section('content')
@foreach ($student as $stud)
   <div style="font-family: 'nunito sans', sans-serif;">
        <img width="20%"  src="{{$message->embed('./img/e-logo.png')}}" alt="E-Report">
        <div style="background: rgb(50, 124, 0); color: #fff; padding: 10px;">
            <h3 style="">E-report is here to help you track your kids academic performance</h3>
        </div>
        <h3>Good day {{$stud->Guardian_name}}, </h3>
        <h4>Please Find Below, The School Report of your Ward  <b style="color: rgb(104, 5, 104);">{{$stud->name}} (<small>{{$stud->class}}</small>)</b> <br> in {{$stud->school}} 
        <br></h4>
        <div class="row">
            <div class="col-md-6">
                <img width="20%" src="{{$message->embed('./storage/students_passports/'.$stud->passport_photograph)}}" alt="{{$stud->name}}">
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div style="background: rgb(250, 189, 75); color: rgb(0, 0, 0); padding: 10px;">
                        <p>Report</p>
                        <p><b>{{$stud->report}}</b> </p>
                    </div>
                </div>
            </div>

        </div>
   </div>

@endforeach  
@endsection



