@extends('layout.appm')

@section('content')
<div class="p-2 mb-4 rounded-3 text-white" style="background-color: #0a6ea0">
    <div class="container-fluid">
        <h1 class="display-5 fw-bold">ADD ASSESSMENT</h1>
    </div>
</div>

<div class="row g-0">
    <div class="col-">
        <div class="card">
            <div class="card-header">ASSESSMENT DETAIL</div>

            <div class="card-body">
                <form method="POST" enctype="multipart/form-data"
                    action="{{ route('assessment.class.adding', ['subject' => request()->route('subject'), 'class' =>request()->route('class')]) }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="subject" class="col-md-2 col-form-label text-md-end">Subject</label>

                        <div class="col">
                            <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror"
                                name="subject" value="{{ $subject->name }}" disabled>
                            <input id="subject_id" name="subject_id" type="hidden" value="{{ $subject->id }}">

                            @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="sclass" class="col-md-2 col-form-label text-md-end">Class</label>

                        <div class="col">
                            <input id="sclass" type="text" class="form-control @error('sclass') is-invalid @enderror"
                                name="sclass" value="{{ $class->name }}" disabled>
                            <input id="sclass_id" name="sclass_id" type="hidden" value="{{ $class->id }}">

                            @error('sclass')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-2 col-form-label text-md-end">Name</label>

                        <div class="col">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="due" class="col-md-2 col-form-label text-md-end">Date Due</label>

                        <div class="col">
                            <input id="due" type="date" class="form-control @error('due') is-invalid @enderror"
                                name="due" value="{{ old('due') }}" required autocomplete="due" autofocus>

                            @error('due')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="grade" class="col-md-2 col-form-label text-md-end">Full grade</label>

                        <div class="col">
                            <input id="grade" type="text" class="form-control @error('grade') is-invalid @enderror"
                                name="grade" value="{{ old('grade') }}" required autocomplete="grade" autofocus>

                            @error('grade')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="weightage" class="col-md-2 col-form-label text-md-end">Weightage</label>

                        <div class="col">
                            <input id="weightage" type="text"
                                class="form-control @error('weightage') is-invalid @enderror" name="weightage"
                                value="{{ old('weightage') }}" required autocomplete="weightage" autofocus>

                            @error('weightage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="file" class="col-md-2 col-form-label text-md-end">Upload</label>

                        <div class="col">
                            <input id="file" type="file" class="form-control @error('file') is-invalid @enderror"
                                name="file"
                                accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip"
                                required>

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
                                {{ __('Add') }}
                            </button>
                            <a href="{{ route('assessment.view', ['subject' => request()->route('subject'), 'class' =>request()->route('class')]) }}"
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
