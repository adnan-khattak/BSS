@extends('layout.appm')

@section('content')
<div class="p-2 mb-4 rounded-3 text-white" style="background-color: #0a6ea0">
    <div class="container-fluid">
        <h1 class="display-5 fw-bold">DETAILS CLASS</h1>
    </div>
</div>

<div class="row">
    <div class="col d-flex justify-content-start mb-3">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    </div>
</div>

<div class="cotainer">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>IC</th>
                <th>Address</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $class)
            <tr>
                <td>{{ $class->name }}</td>
                <td>{{ $class->ic }}</td>
                <td>{{ $class->address }}</td>
                <td>{{ $class->phone }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
