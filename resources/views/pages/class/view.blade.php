@extends('layout.appm')

@section('content')
<div class="p-2 mb-4 rounded-3 text-white" style="background-color: #0a6ea0">
    <div class="container-fluid">
        <h1 class="display-5 fw-bold">CLASS LIST</h1>
    </div>
</div>

@include('inc.alert')

<div class="row">
    <div class="col d-flex justify-content-end">
        <a href="{{ route('class.add') }}" class="btn btn-primary">Add Class</a>
    </div>
</div>

<div class="cotainer">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Class Name</th>
                <th>Students</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $class)
            <tr>
                <td>{{ $class->name }}</td>
                <td><a href="{{ route('class.detail', $class->id) }}" class="link-dark">View</a></td>
                <td><a href="{{ route('class.edit', $class->id) }}" class="link-dark">Edit</a></td>
                <td><a class="link-dark" href="{{ route('class.delete', $class->id) }}"
                        onclick="return confirm('Are sure to delete data?')">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
