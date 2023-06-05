@extends('layout.appm')

@section('content')
    <div class="p-2 mb-4 bg-light rounded-3">
        <div class="container-fluid">
            <h1 class="display-5 fw-bold">UPLOAD ASSESSMENT</h1>
        </div>
    </div>

        <div class="row g-0">
            <div class="col-">
                <div class="card">
                    <div class="card-header">ASSESSMENT DETAIL</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="desc" class="col-md-2 col-form-label text-md-end">Assessment Description</label>

                                <div class="col">
                                    <input id="desc" type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" value="{{ old('desc') }}" required autocomplete="desc" autofocus>

                                    @error('desc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="sclass" class="col-md-2 col-form-label text-md-end">Class</label>

                                <div class="col">
                                    <select class="form-control form-select">
                                        <option value="" disabled selected>Select class</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>

                                    @error('sclass')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="duedate" class="col-md-2 col-form-label text-md-end">Date Due</label>

                                <div class="col">
                                    <input id="duedate" type="date" class="form-control @error('duedate') is-invalid @enderror" name="duedate" value="{{ old('duedate') }}" required autocomplete="duedate">

                                    @error('duedate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="fullgrade" class="col-md-2 col-form-label text-md-end">Full Grade</label>

                                <div class="col">
                                    <input id="fullgrade" type="text" class="form-control @error('fullgrade') is-invalid @enderror" name="fullgrade" value="{{ old('fullgrade') }}" required autocomplete="fullgrade">

                                    @error('fullgrade')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="weightage" class="col-md-2 col-form-label text-md-end">Weightage</label>

                                <div class="col">
                                    <input id="weightage" type="text" class="form-control @error('weightage') is-invalid @enderror" name="weightage" value="{{ old('weightage') }}" required autocomplete="weightage">

                                    @error('weightage')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="upfile" class="col-md-2 col-form-label text-md-end">Choose File</label>

                                <div class="col">
                                    <input id="upfile" type="file" class="form-control @error('upfile') is-invalid @enderror" name="upfile" value="{{ old('upfile') }}" required autocomplete="upfile">

                                    @error('upfile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                    <a href="{{ route('assessment.view') }}" class="btn btn-secondary ms-4">
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
