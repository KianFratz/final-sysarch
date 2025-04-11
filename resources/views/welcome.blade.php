@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center bg-teal-100 p-5 rounded shadow-sm">
        <h1 class="display-4 text-teal-800">College Department System</h1>
    </div>

    <div class="row mt-5">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">Colleges</h4>
                </div>
                <div class="card-body">
                    <p>Manage all colleges in the system:</p>
                    <ul class="mb-3">
                        <li>Create new colleges</li>
                        <li>Update existing college information</li>
                        <li>View college details</li>
                        <li>Delete colleges (soft deletion)</li>
                    </ul>
                    <a href="{{ route('colleges.index') }}" class="btn btn-info text-white">Go to Colleges</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-indigo text-white">
                    <h4 class="mb-0">Departments</h4>
                </div>
                <div class="card-body">
                    <p>Manage all departments in the system:</p>
                    <ul class="mb-3">
                        <li>Create new departments</li>
                        <li>Update existing department information</li>
                        <li>View department details</li>
                        <li>Delete departments (soft deletion)</li>
                    </ul>
                    <a href="{{ route('departments.index') }}" class="btn btn-indigo text-white">Go to Departments</a>
                </div>
            </div>
        </div>
    </div>
@endsection
