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
                       <h3 class="pb-3">Here is the Lists of All Registered Students</h3>
                       <div>
                          <ol>
                            @foreach ($students as $student)
                              <div style="display: flex;" class="p-2  justify-content-between">
                               <div> 
                                   <li> <a href="{{route('students_profile', $student->id)}}">
                                        @if (strlen($student->name) > 10)

                                           {{substr($student->name, 0, 6). ' ...'}} 

                                        @else

                                        {{$student->name}}

                                        @endif
                                         

                                        </a> 
                                </li>
                                </div>
                                <div>
                                    <a class="btn btn-info" href="{{route('edit', $student->id)}}"><i class="icofont-edit"></i></a>
                                </div>
                                <div>
                                    <a class="btn btn-danger" href=""><i class="icofont-trash"></i></a>
                                </div>
                              </div>
                            @endforeach
                            <div class="mt-2">
                                {{$students->links()}}
                            </div>
                          </ol>
                           
                       </div>
                       <a class="btn btn-primary" href="{{route('home')}}">Return</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection