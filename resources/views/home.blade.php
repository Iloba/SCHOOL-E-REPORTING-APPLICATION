@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @include('layouts.message')
                    {{ __('You are logged in!') }}
                    <div>
                        <h3>Update Profile Picture</h3>
                        <div>
                            <form action="/upload" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="passport" > 
                                <input type="submit" value="Upload" class="btn btn-info">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
