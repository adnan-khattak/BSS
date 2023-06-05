@extends('layout.appm')

@section('content')
<div class="p-2 mb-4 rounded-3 text-white" style="background-color: #0a6ea0">
    <div class="container-fluid">
        <h1 class="display-5 fw-bold">VIEW ASSESSMENT</h1>
    </div>
</div>

@include('inc.alert')

<div class="row">
    <div class="col d-flex justify-content-start">
        <a href="{{ route('subject.mysubject.detail', ['id' => request()->route('subject')]) }}"
            class="btn btn-secondary">Back</a>
    </div>
    <div class="col d-flex justify-content-end">
        <a href="{{ route('assessment.class.add', ['subject' => request()->route('subject'), 'class' =>request()->route('class')]) }}"
            class="btn btn-primary">Add New Assessment</a>
    </div>
</div>

<div class="cotainer">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Assessment Name</th>
                <th>Due</th>
                <th>Attachment</th>
                <th>Submission</th>
                {{-- <th></th>
                <th></th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($assessments as $assessment)
            <tr>
                <td>{{ $assessment->desc }}</td>
                <td>{{ date('d M Y', strtotime($assessment->date_due)) }}</td>
                <td><a href="{{ asset($assessment->assignment_file_path) }}" target="_blank" class="link-dark">View</a>
                </td>
                <td><a href="{{ route('assessment.submission', ['subject' => request()->route('subject'), 'class' =>request()->route('class'), 'assessment'=> $assessment->id]) }}"
                        class="link-dark">View</a></td>
                {{-- <td>Edit</td>
                <td>Delete</td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
