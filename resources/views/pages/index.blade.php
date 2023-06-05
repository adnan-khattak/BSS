@extends('layout.app')

@section('content')
<div class="p-2 mb-4 rounded-3 text-white" style="background-color: #0a6ea0">
    <div class="container-fluid py-5">

        <div class="clearfix">
            <img src="{{ asset('Images/school-logo.png') }}"
                class="col-md-6 float-md-end mb-3 ms-md-3 w-25 rounded-circle" alt="...">
            <h1 class="display-5 fw-bold">Brains Science School</h1>
            <p class="col-md-8 fs-4 text-dark fst-italic" style="
            color: #fbe8ce !important;
        ">
                Brains Science School Latamber This system developed will help the school to manage submission of
                assignment between teachers and students.
            </p>
        </div>
    </div>
</div>
@endsection
