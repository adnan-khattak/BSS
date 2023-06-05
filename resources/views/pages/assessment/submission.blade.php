@extends('layout.appm')

@section('content')
<div class="p-2 mb-4 rounded-3 text-white" style="background-color: #0a6ea0">
    <div class="container-fluid">
        <h1 class="display-5 fw-bold">ASSESSMENT SUBMISSION</h1>
    </div>
</div>

@include('inc.alert')

<div class="row">
    <div class="col d-flex justify-content-start">
        <a href="{{ route('assessment.view', ['subject' => request()->route('subject'), 'class' =>request()->route('class')]) }}"
            class="btn btn-secondary">Back</a>
    </div>
</div>

<div class="cotainer">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Submission Date</th>
                <th>Submission</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subs as $sub)
            <tr>
                <td>{{ $sub->name }}</td>
                <td>{{ $sub->created_at }}</td>
                <td><a href="{{ asset($sub->submission_file) }}" target="_blank" class="link-dark">View</a></td>
                <td>
                    @if ($sub->grade == null)
                    <a href="{{ route('assessment.addgrade', ['subject'=>request()->route('subject'), 'class'=>request()->route('class'), 'assessment'=>request()->route('assessment'), 'submission'=>$sub->id]) }}"
                        class="btn btn-warning">
                        Add Grade
                    </a>
                    @else
                    {{ $sub->grade }}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
