@extends('layout.appm')

@section('content')
    <div class="p-2 mb-4 bg-light rounded-3">
        <div class="container-fluid">
            <h1 class="display-5 fw-bold">ADD MY CLASS</h1>
        </div>
    </div>

    <div class="row g-0">
        <div class="col-">
            <div class="card">
                <div class="card-header">CLASS DETAIL</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('class.myclass.adding') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="classs" class="col-md-2 col-form-label text-md-end">Class</label>

                            <div class="col">
                                <select name="classs" class="form-control form-select" required>
                                    <option value="" disabled selected>Select class</option>
                                    @foreach ($classses as $classs)
                                        <option value="{{ $classs->id }}">{{ $classs->name }}</option>
                                    @endforeach
                                </select>

                                @error('classs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="subject" class="col-md-2 col-form-label text-md-end">Subject</label>

                            <div class="col">
                                <select name="subject" class="form-control form-select">
                                    <option value="" disabled selected>Select subject</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>

                                @error('subject')
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
                                <a href="{{ route('class.myclass') }}" class="btn btn-secondary ms-4">
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
