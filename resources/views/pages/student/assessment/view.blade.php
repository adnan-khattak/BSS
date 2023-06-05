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
        <a href="{{ route('student.assessment.view') }}" class="btn btn-secondary">Back</a>
    </div>
</div>

<div class="cotainer">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Assessment Name</th>
                <th>Attachment</th>
                <th>Subject</th>
                <th>Teacher Name</th>
                <th>Submission</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assessments as $assessment)
            <tr>
                <td>{{ $assessment->desc }}</td>
                <td>
                    <a href="{{ asset($assessment->assignment_file_path) }}" target="_blank" class="link-dark">
                        View
                    </a>
                </td>
                <td>{{ $assessment->subject_name }}</td>
                <td>{{ $assessment->teacher_name }}</td>
                <td>
                    <a href="{{ route('student.assessment.detail', ['subject' => request()->route('subject'), 'assessment'=> $assessment->id]) }}"
                        class="link-dark">
                        View
                    </a>
                </td>
                <td>
                    @foreach ($subs as $sub)
                    @if ($assessment->id == $sub->assessment_id)
                    @if ($sub->grade == null)
                    Pending
                    @else
                    {{ $sub->grade }}
                    @endif
                    @else
                    No submission
                    @endif
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
