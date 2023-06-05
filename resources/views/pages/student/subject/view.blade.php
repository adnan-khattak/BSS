@extends('layout.appm')

@section('content')
<div class="p-2 mb-4 text-white rounded-3" style="background-color: #0a6ea0">
    <div class="container-fluid">
        <h1 class="display-5 fw-bold">SUBJECT LIST</h1>
    </div>
</div>

{{-- <div class="row">
    <div class="col d-flex justify-content-end">
        <a href="{{ route('student.subject.add') }}" class="btn btn-primary">Add Subject</a>
    </div>
</div> --}}

<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Subject Name</th>
                <th>Teacher Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
            <tr>
                <td>{{ $subject->name }}</td>
                <td>{{ $subject->teacher_name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
