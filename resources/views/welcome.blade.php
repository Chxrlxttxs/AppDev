@extends('base')
@section('title', 'Welcome Page')



<a href="{{ route('auth.logout') }}" class="btn btn-danger" style="float: right;margin-top:20px; margin-right: 20px;">Logout</a>


<div class="centered-div">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: black;">
                        <h4 style="float: left; color: aliceblue;"><strong>Student List</strong></h4>
                        <!-- Action btn for modal 
                       
                        <button type="button" class="btn btn-primary" style="float: right;" data-bs-toggle="modal" data-bs-target="#addNewModal">
                            Add New Students
                        </button>   -->

                        <div class="input-group">
                <input type="text" class="form-control me-3" style="max-width: 300px;" placeholder="Search Student's name" name="search">
                <button class="btn btn-primary" type="submit">Search</button>
                        <div>
                <button type="button" class="btn btn-primary" style="float: right; margin-left: 7px;" data-bs-toggle="modal" data-bs-target="#addNewModal">
                            Add New Students
                        </button>
                        </div>
                
                
               

                        </div>


                    </div>

                    @if(Session("success"))
                    <span class="alert alert-success">
                        {{ session('success') }}
                    </span>
                    @endif

                    <div class="card-body" style="background-color: black;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">ID</th>
                                    <th style="text-align: center;">Name</th>
                                    <th style="text-align: center;">Age</th>
                                    <th style="text-align: center;">Gender</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $std)
                                <tr>
                                    <th scope="row">{{ $std -> id }}</th>
                                    <td>{{ $std -> name }}</td>
                                    <td>{{ $std -> age }}</td>
                                    <td>{{ $std -> gender }}</td>
                                    <td style="width: 150px;">
                                        <a class="btn btn-primary" href="{{ route('std.updateView', $std -> id) }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('std.studentDelete', $std -> id) }}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal component -->
    <div class=" modal fade" id="addNewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Student</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('std.addNewStudent') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="text" class="form-control" id="age" name="age" value="{{ old('age') }}" placeholder="Enter age">
                            @error('age')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <input type="text" class="form-control" id="gender" name="gender" value="{{ old('gender') }}" placeholder="Enter gender">
                            @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>