@extends('layout.appm')

@section('content')
<div class="p-2 mb-4 text-white rounded-3" style="background-color: #0a6ea0">
    <div class="container-fluid">
        <h1 class="display-5 fw-bold">PROFILE</h1>
    </div>
</div>

@include('inc.alert')

<div class="row pb-3">
    <div class="col d-flex justify-content-end">
        <a href="{{ route('student.profile.edit') }}" class="btn btn-primary">Edit Profile</a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col">
        <div class="card">
            <div class="card-header">{{ __('Student Details') }}</div>

            <div class="card-body">
                <div class="row mb-3">
                    <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col">
                        <input type="text" class="form-control" name="name" value="{{ $student->name }}" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-2 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                    <div class="col">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ $student->email }}" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="ic_num" class="col-md-2 col-form-label text-md-end">{{ __('Identification Number')
                        }}</label>

                    <div class="col">
                        <input id="ic_num" type="text" class="form-control @error('ic_num') is-invalid @enderror"
                            name="ic_num" value="{{ $student->ic }}" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="address" class="col-md-2 col-form-label text-md-end">{{ __('Address') }}</label>

                    <div class="col">
                        <textarea id="address" class="form-control @error('address') is-invalid @enderror"
                            name="address" disabled>{{ $student->address }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="class" class="col-md-2 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                    <div class="col">
                        <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror"
                            name="phone" value="{{ $student->phone }}" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="class" class="col-md-2 col-form-label text-md-end">{{ __('Class') }}</label>

                    <div class="col">
                        <input id="class" type="tel" class="form-control @error('class') is-invalid @enderror"
                            name="class" value="{{ $student->classs_name }}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
