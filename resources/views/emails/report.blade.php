@foreach ($student as $stud)
<img  src="{{$message->embed('./img/e-logo.png')}}" alt="E-Report">
<h2>Good day {{$stud->Guardian_name}}</h2>
<h3 style="color: orange;">E-report is here to help you track your kids academic performance</h3>
<h4>Please Find Below, The School Report of your Ward <b>{{$stud->name}}</b> in class <b>{{$stud->class}}</b></h4>
<img src="{{$message->embed('./storage/students_passports/'.$stud->passport_photograph)}}" alt="{{$stud->name}}">
<p>
    <p><b>Report</b>: {{$stud->report}}</p>
</p>  

@endforeach



