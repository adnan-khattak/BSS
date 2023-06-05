@extends('layout.appm')

@section('content')
<div class="p-2 mb-4 rounded-3 text-white" style="background-color: #0a6ea0">
    <div class="container-fluid">
        <h1 class="display-5 fw-bold">ASSESSMENT</h1>
    </div>
</div>

<div class="row g-0">
    <div class="col-">
        <div class="card">
            <div class="card-header">SUBMISSION</div>

            <div class="card-body">
                <form method="POST"
                    action="{{ route('student.assessment.detail.post', ['subject' => request()->route('subject'), 'assessment'=> request()->route('assessment')]) }}"
                    enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="assessment_id" value="{{ request()->route('assessment') }}">
                    <div class="row mb-3">
                        <label for="file" class="col-md-2 col-form-label text-md-end">Choose File</label>

                        <div class="col">
                            <input id="file" type="file" class="form-control @error('file') is-invalid @enderror"
                                name="file" value="{{ old('file') }}" required autocomplete="file">

                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Submit') }}
                            </button>
                            <a href="{{ route('student.assessment.view.subject', ['subject' => request()->route('subject')]) }}"
                                class="btn btn-secondary ms-4">
                                Back
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
