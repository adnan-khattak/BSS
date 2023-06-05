@extends('layout.appm')

@section('content')
<div class="p-2 mb-4  rounded-3 text-white" style="background-color: #0a6ea0">
    <div class="container-fluid">
        <h1 class="display-5 fw-bold">ADD MY SUBJECT</h1>
    </div>
</div>

@include('inc.alert')

<div class="row g-0">
    <div class="col-">
        <div class="card">
            <div class="card-header">SUBJECT DETAIL</div>

            <div class="card-body">
                <form method="POST" action="{{ route('subject.mysubject.adding') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="subject" class="col-md-2 col-form-label text-md-end">Subject</label>

                        <div class="col">
                            <select name="subject" class="form-control form-select" required>
                                <option value="" disabled selected>Select subject</option>
                                @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name}}</option>
                                @endforeach
                            </select>

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
                            <select name="sclass" class="form-control form-select" required>
                                <option value="" disabled selected>Select class</option>
                                @foreach ($classses as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>

                            @error('sclass')
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
                            <a href="{{ route('subject.mysubject') }}" class="btn btn-secondary ms-4">
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
