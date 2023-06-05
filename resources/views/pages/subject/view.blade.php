@extends('layout.appm')

@section('content')
<div class="p-2 mb-4 rounded-3 text-white" style="background-color: #0a6ea0">
    <div class="container-fluid">
        <h1 class="display-5 fw-bold">SUBJECT LIST</h1>
    </div>
</div>

@include('inc.alert')

<div class="row">
    <div class="col d-flex justify-content-start">
        <a href="{{ route('subject.mysubject') }}" class="btn btn-secondary">Back</a>
    </div>
    <div class="col d-flex justify-content-end">
        <a href="{{ route('subject.add') }}" class="btn btn-primary">Add Subject</a>
    </div>
</div>

<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Subject Name</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
            <tr>
                <td>{{ $subject->name }}</td>
                <td><a href="{{ route('subject.edit', $subject->id) }}" class="link-dark">Edit</a></td>
                <td><a class="link-dark" href="{{ route('subject.delete', $subject->id) }}"
                        onclick="return confirm('Are sure to delete data?')">Delete</a></td>
                {{-- <td><a data-bs-toggle="modal" data-bs-target="#deleteModal" class="link-dark" href="#">Delete</a>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
