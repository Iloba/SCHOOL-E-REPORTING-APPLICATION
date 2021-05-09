@extends('layouts.email')
@section('content')
@foreach ($student as $stud)
   <div style="font-family: 'nunito sans', sans-serif; background: rgb(243, 243, 243);">
        <img style="width: 100%;" src="{{$message->embed('./img/email-head.jpg')}}" alt="E-Report">
        <div style="padding: 10px;">
            <h3>Good day {{$stud->Guardian_name}}, </h3>
        </div>
        <h4 style="padding: 10px;">Please Find Below, The School Report of your Ward  <b style="color: rgb(104, 5, 104);">{{$stud->name}} (<small>{{$stud->class}}</small>)</b> <br> in {{$stud->school}} 
        <br></h4>
        <div class="row">
            <div class="col-md-6">
                <img style="padding: 10px;" width="20%" src="{{$message->embed('./storage/students_passports/'.$stud->passport_photograph)}}" alt="{{$stud->name}}">
                <object  type="application/pdf" data="{{$message->embed('./storage/report-files/'.$stud->report_file)}}" src="" width="500" height="375" 
                    alt : <a href="{{$message->embed('./storage/report-files/'.$stud->report_file)}}">test.pdf</a>
               > </object>
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



