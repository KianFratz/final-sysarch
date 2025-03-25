@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center bg-light p-5 rounded">
        <h1 class="display-4">College Department System</h1>
    </div>

    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Colleges</h4>
                </div>
                <div class="card-body">
                    <p>Manage all colleges in the system:</p>
                    <ul>
                        <li>Create new colleges</li>
                        <li>Update existing college information</li>
                        <li>View college details</li>
                        <li>Delete colleges (soft deletion)</li>
                    </ul>
                    <a href="{{ route('colleges.index') }}" class="btn btn-outline-primary">Go to Colleges</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h4>Departments</h4>
                </div>
                <div class="card-body">
                    <p>Manage all departments in the system:</p>
                    <ul>
                        <li>Create new departments</li>
                        <li>Update existing department information</li>
                        <li>View department details</li>
                        <li>Delete departments (soft deletion)</li>
                    </ul>
                    <a href="{{ route('departments.index') }}" class="btn btn-outline-success">Go to Departments</a>
                </div>
            </div>
        </div>
    </div>
@endsection