@extends('layout.appm')

@section('content')
<div class="p-2 mb-4  rounded-3 text-white" style="background-color: #0a6ea0">
    <div class="container-fluid">
        <h1 class="display-5 fw-bold">MY SUBJECT LIST</h1>
    </div>
</div>

@include('inc.alert')

<div class="row">
    <div class="col d-flex justify-content-end">
        <a href="{{ route('subject.list') }}" class="btn btn-secondary mx-2">View All Subjects</a>
        <a href="{{ route('subject.mysubject.add') }}" class="btn btn-primary">Add My Subject</a>
    </div>
</div>

<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Subject Name</th>
                <th>Subject Class</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
            <tr>
                <td>{{ $subject->name }}</td>
                <td><a href="{{ route('subject.mysubject.detail', $subject->id) }}" class="link-dark">View</a></td>
                <td>{{ date('Y', strtotime($subject->created_at)) }}</td>
                {{-- <td><a class="link-dark" href="{{ route('subject.mysubject.delete', $subject->id) }}"
                        onclick="return confirm('Are sure to delete data?')">Delete</a></td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
