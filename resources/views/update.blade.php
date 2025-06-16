@extends('base')
@section('title', 'Update Page')

<div class="container h-100 pt-5">
    <div class="row justify-content-sm-center h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
            <div class="card shadow-lg mb-5">
                <div class="card-body p-6">
                    @foreach($students as $std)
                    <form method="post" action="{{ route('std.studentUpdate') }}">
                        @csrf
                        <div class="mb-3 d-none">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" class="form-control" id="id" name="id" value="{{ $std->id }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $std->name }}" placeholder="Enter name">
                        </div>

                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="text" class="form-control" id="age" name="age" value="{{ $std->age }}" placeholder="Enter age">
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <input type="text" class="form-control" id="gender" name="gender" value="{{ $std->gender }}" placeholder="Enter gender">
                        </div>

                        <div class="col mt-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                    @endforeach
                    <hr>

                    <div class="text-center">
                        <a class="small" href="{{ route('std.myView') }}">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>