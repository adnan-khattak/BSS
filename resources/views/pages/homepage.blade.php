@extends('layout.appm')

@section('content')
<div class="p-2 mb-4 rounded-3 text-white" style="background-color: #0a6ea0">
    <div class="container-fluid">
        <h1 class="display-5 fw-bold">HOMEPAGE</h1>
    </div>
</div>

@include('inc.alert')

<div class="p-2 mb-4  rounded-3 text-light" style="background-color: #0e99b8">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold text-center">WELCOME TO Brains Science School</h1>
        <p class="col-md-auto fs-4 text-dark fst-italic" style="text-align: justify;">The objectives of this new system
            are
            to improve the submission of
            assignment. Besides, to provide a suitable platform for students and facilitate students to
            submit assignments. Moreover, to make it easier for teachers to store assignment submission data that has
            been submitted by students. Furthemore, to facilitate teachers to assign assignments to students in various
            formats such as Pdf, Microsoft Word and others. Next, to facilitate teachers and student to use only one
            system medium and do not need to use other applications. Lastly, to train and introduce students to how to
            use technology easily and correctly.</p>
    </div>
</div>
@endsection
