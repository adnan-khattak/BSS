@extends('layout.appm')

@section('content')
<div class="p-2 mb-4 rounded-3 text-white" style="background-color: #0a6ea0">
    <div class="container-fluid">
        <h1 class="display-5 fw-bold">UPDATE PROFILE</h1>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col">
        <div class="card">
            <div class="card-header">{{ __('Teacher Details') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('user.update', $teacher->id) }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $teacher->name }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-2 col-form-label text-md-end">{{ __('E-Mail Address')
                            }}</label>

                        <div class="col">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $teacher->email }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="ic" class="col-md-2 col-form-label text-md-end">{{ __('Identification Number')
                            }}</label>

                        <div class="col">
                            <input id="ic" type="text" class="form-control @error('ic') is-invalid @enderror" name="ic"
                                value="{{ $teacher->ic }}" required autocomplete="ic" autofocus>

                            @error('ic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="address" class="col-md-2 col-form-label text-md-end">{{ __('Address') }}</label>

                        <div class="col">
                            <textarea id="address" class="form-control @error('address') is-invalid @enderror"
                                name="address" value="{{ old('address') }}" required autocomplete="address"
                                autofocus>{{ $teacher->address }}</textarea>

                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="phone" class="col-md-2 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                        <div class="col">
                            <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror"
                                name="phone" value="{{ $teacher->phone }}" required autocomplete="phone" autofocus>

                            @error('phone')
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
                            <a href="{{ route('user.profile') }}" class="btn btn-secondary ms-4">
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
