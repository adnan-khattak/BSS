@extends('layout.app')

@section('content')
<div class="container" style="padding-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    SIGN UP AS:
                </div>

                <div class="card-body">
                    <div class="row justify-content-evenly">
                        <div class="col-4 d-flex justify-content-center"><a href="{{ route('teacher.signup') }}" class="btn btn-primary">TEACHER</a></div>
                        <div class="col-4 d-flex justify-content-center"><a href="{{ route('student.signup') }}" class="btn btn-primary">STUDENT</a></div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
