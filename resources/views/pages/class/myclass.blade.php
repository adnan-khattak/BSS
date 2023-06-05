@extends('layout.appm')

@section('content')
    <div class="p-2 mb-4 bg-light rounded-3">
        <div class="container-fluid">
            <h1 class="display-5 fw-bold">MY CLASS LIST</h1>
        </div>
    </div>

    <div class="row">
        <div class="col d-flex justify-content-end">
            <a href="{{ route('class.myclass.add') }}" class="btn btn-primary">Add Class</a>
        </div>
    </div>

    <div class="cotainer">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Class Name</th>
                    <th>Subject</th>
                    <th>Students</th>
                    {{-- <th>Year</th> --}}
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                    <tr>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->name }}</td>
                        <td><a href="{{ route('class.detail', $subject->id) }}" class="link-dark">View</a></td>
                        {{-- <td>{{ date('Y', strtotime($subject->pivot->created_at)) }}</td> --}}
                        <td><a class="link-dark" href="{{ route('class.myclass.delete', $subject->id) }}" onclick="return confirm('Are sure to delete data?')">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
