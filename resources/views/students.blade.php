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
                        <a class="btn btn-primary mb-5" href="{{route('home')}}"><i class="icofont-arrow-left"></i></a>
                      
                     
                       <div>
                          <ol>
                            @if (count($students) > 0)
                             <h3 class="mb-3">Registered Students</h3>
                                @foreach ($students as $student)
                                <div style="display: flex;" class="p-2  justify-content-between">
                                <div> 
                                    <li> <a href="{{route('students_profile', $student->id)}}">
                                        @if (strlen($student->name) >= 5)

                                            {{substr($student->name, 0, 5). ' ...'}} 

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
                                    <a onclick="event.preventDefault();
                                    if(confirm('This Action is Dangerous are you sure you want to continue??')){
                                        document.getElementById('form-delete-{{$student->id}}').submit();
                                    }
                                    
                                    
                                    
                                    " class="btn btn-danger" href="{{route('delete', $student->id)}}"><i class="icofont-trash"></i></a>
                                    <form style="display:none;" id="{{'form-delete-'.$student->id}}" method="POST" action="{{route('delete', $student->id)}}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                                </div>
                            @endforeach

                            @else
                                <p>You have not registered any student Yet</p>

                            @endif
                            <div class="mt-2">
                                {{$students->links()}}
                            </div>
                          </ol>
                           
                       </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection