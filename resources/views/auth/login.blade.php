@extends('base')
@section('title', 'Login')

<div class="centered-div">
    <div class="container">
        <div class="col" style="width: 80vh;">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left;"><strong>Login</strong></h4>
                    </div>

                    @if(Session("success"))
                    <span class="alert alert-success">
                        {{ session('success') }}
                    </span>
                    @endif

                    @if(Session("error"))
                    <span class="alert alert-danger">
                        {{ session('error') }}
                    </span>
                    @endif

                    <div class="card-body">
                        <form method="post" action="{{ route('auth.login')}}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>

                        <a href="{{ route('auth.register') }}">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>