@extends('layout.appm')

@section('content')
<div class="p-2 mb-4 rounded-3 text-white" style="background-color: #0a6ea0">
    <div class="container-fluid">
        <h1 class="display-5 fw-bold">ADD GRADE</h1>
    </div>
</div>

<div class="row g-0">
    <div class="col-">
        <div class="card">
            <div class="card-header">SUBMISSION DETAIL</div>

            <div class="card-body">
                <form method="POST"
                    action="{{ route('assessment.grading', ['subject'=>request()->route('subject'), 'class'=>request()->route('class'), 'assessment'=>request()->route('assessment'), 'submission'=>request()->route('submission')]) }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="grade" class="col-md-2 col-form-label text-md-end">Grade</label>

                        <div class="col">
                            <input id="grade" type="text" class="form-control @error('grade') is-invalid @enderror"
                                name="grade" value="{{ old('grade') }}" required autofocus>

                            @error('grade')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add') }}
                            </button>
                            <a href="{{ route('assessment.submission', ['subject' => request()->route('subject'), 'class' =>request()->route('class'), 'assessment'=>request()->route('assessment')]) }}"
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
