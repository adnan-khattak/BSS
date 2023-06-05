@extends('layout.appm')

@section('content')
<div class="p-2 mb-4 rounded-3 text-white" style="background-color: #0a6ea0">
    <div class="container-fluid">
        <h1 class="display-5 fw-bold">VIEW ASSESSMENT</h1>
    </div>
</div>

<div class="cotainer">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Teacher Name</th>
                <th>Assessments</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
            <tr>
                <td>{{ $subject->name }}</td>
                <td>{{ $subject->teacher_name }}</td>
                <td><a href="{{ route('student.assessment.view.subject', ['subject' => $subject->subject_id]) }}"
                        class="link-dark">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
