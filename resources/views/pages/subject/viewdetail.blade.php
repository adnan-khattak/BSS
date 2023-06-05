@extends('layout.appm')

@section('content')
<div class="p-2 mb-4 rounded-3 text-white" style="background-color: #0a6ea0">
    <div class="container-fluid">
        <h1 class="display-5 fw-bold">DETAILS CLASS</h1>
    </div>
</div>

@include('inc.alert')

<div class="row">
    <div class="col d-flex justify-content-start mb-3">
        <a href="{{ route('subject.mysubject') }}" class="btn btn-secondary">Back</a>
    </div>
</div>

<div class="cotainer">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Class Name</th>
                <th>Assessment</th>
                <th>View Student</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classses as $class)
            <tr>
                <td>{{ $class->name }}</td>
                <td><a href="{{ route('assessment.view', [ 'subject' => request()->route('id'), 'class' => $class->id]) }}"
                        class="link-dark">View</a></td>
                <td><a href="{{ route('class.detail', $class->id) }}" class="link-dark">View</a></td>
                <td><a class="link-dark"
                        href="{{ route('subject.mysubject.class.delete', [ 'subject' => request()->route('id'), 'id' => $class->id]) }}"
                        onclick="return confirm('Are sure to delete data?')">Remove</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
