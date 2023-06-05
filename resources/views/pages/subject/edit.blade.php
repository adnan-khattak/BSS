@extends('layout.appm')

@section('content')
<div class="p-2 mb-4  rounded-3 text-white" style="background-color: #0a6ea0">
    <div class="container-fluid">
        <h1 class="display-5 fw-bold">EDIT SUBJECT</h1>
    </div>
</div>

<div class="row g-0">
    <div class="col-">
        <div class="card">
            <div class="card-header">SUBJECT DETAIL</div>

            <div class="card-body">
                <form method="POST" action="{{ route('subject.edit.post', $subject->id) }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-2 col-form-label text-md-end">Subject Name</label>

                        <div class="col">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $subject->name }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                            <a href="{{ route('subject.list') }}" class="btn btn-secondary ms-4">
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
