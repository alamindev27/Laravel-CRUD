@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Change Name') }}</div>
                <div class="card-body">
                    @if (session('namesuccess'))
                    <div class="alert alert-success">
                        {{ session('namesuccess') }}
                    </div>
                    @endif
                    <form action="{{ route('profileupdate') }}" method="post" class="form">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" placeholder="Enter name" class="form-control">
                            <span class="text-danger">
                               @error('name')
                                {{ $message }}
                               @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-success" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
<br><br>

            <div class="card">
                <div class="card-header">{{ __('Change Photo') }}</div>
                <div class="text-center mt-2">
                    <img style="width: 150px " class="card-img-top" src="{{ asset('images/profile_photo'.'/'.Auth::user()->profile_photo) }}" alt="Card image cap">
                </div>
                <div class="card-body">
                    @if (session('imgSuccess'))
                    <div class="alert alert-success">
                        {{ session('imgSuccess') }}
                    </div>
                    @endif
                    <form action="{{ route('profile.profilephoto') }}" enctype="multipart/form-data" method="post" class="form">
                        @csrf
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" name="profile_photo" class="form-control" accept=".jpg,.png,.jpeg" >
                            <span class="text-danger">
                               @error('profile_photo')
                                {{ $message }}
                               @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-success" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Change Password') }}</div>
                <div class="card-body">
                    @if (session('passwordsuccess'))
                        <div class="alert alert-success">
                            {{ session('passwordsuccess') }}
                        </div>
                    @endif
                    <form action="{{ route('passwordupdate') }}" method="post" class="form">
                        @csrf
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" name="o_pass" value="{{ old('o_pass') }}" placeholder="Enter name" class="form-control">

                            <span class="text-danger">
                               @error('o_pass')
                                {{ $message }}
                               @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="n_pass" value="{{ old('n_pass') }}" placeholder="Enter name" class="form-control">
                            <span class="text-danger">
                               @error('n_pass')
                                {{ $message }}
                               @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="c_pass" value="{{ old('c_pass') }}" placeholder="Enter name" class="form-control">
                            <span class="text-danger">
                               @error('c_pass')
                                {{ $message }}
                               @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-success" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
