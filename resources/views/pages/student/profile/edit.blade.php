@extends('layout.appm')

@section('content')
<div class="p-2 mb-4 text-white rounded-3" style="background-color: #0a6ea0">
    <div class="container-fluid">
        <h1 class="display-5 fw-bold">UPDATE PROFILE</h1>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col">
        <div class="card">
            <div class="card-header">{{ __('Student Details') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('student.profile.editing') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $student->name }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address')
                            }}</label>

                        <div class="col">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $student->email }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="ic_num" class="col-md-4 col-form-label text-md-end">{{ __('Identification Number')
                            }}</label>

                        <div class="col">
                            <input id="ic_num" type="text" class="form-control @error('ic_num') is-invalid @enderror"
                                name="ic_num" value="{{ $student->ic }}" required autocomplete="ic_num" autofocus>

                            @error('ic_num')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                        <div class="col">
                            <textarea id="address" class="form-control @error('address') is-invalid @enderror"
                                name="address" required autocomplete="address"
                                autofocus>{{ $student->address }}</textarea>

                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                        <div class="col">
                            <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror"
                                name="phone" value="{{ $student->phone }}" required autocomplete="phone" autofocus>

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="classs" class="col-md-4 col-form-label text-md-end">Class</label>

                        <div class="col">
                            <select name="classs" class="form-control form-select" required>
                                @foreach ($classses as $classs)
                                <option value="{{ $classs->id }}" {{ $classs->id == $student->classs_id ? 'selected' :
                                    '' }} >{{ $classs->name }}</option>
                                @endforeach
                            </select>

                            @error('classs')
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
                            <a href="{{ route('student.profile') }}" class="btn btn-secondary ms-4">
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
