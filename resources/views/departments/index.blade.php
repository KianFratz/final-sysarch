{{-- 
    Team Name: DUNGOG
    Member Names: Kian Fratz Pagobo, Jethro Dungog
--}}

@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Department</h2>
                <a href="{{ route('departments.create') }}" class="btn btn-primary">Add New Department</a>
            </div>

            <div class="mb-4">                 
                <form action="{{ route('departments.search') }}" method="GET">                     
                    <input type="text" name="query" class="form-control" placeholder="Search by department name or code" value="{{ request('query') }}">                     
                    <button type="submit" class="btn btn-primary mt-2">Search</button>                 
                </form>             
            </div>
            
            @if(isset($results))
                <div class="card mb-4">
                    <div class="card-body">
                        <h4>Search Results</h4>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Department Name</th>
                                    <th>Department Code</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($results as $result)
                                    <tr>
                                        <td>{{ $result->DepartmentID }}</td>
                                        <td>{{ $result->DepartmentName }}</td>
                                        <td>{{ $result->DepartmentCode }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('departments.show', $result->DepartmentID) }}" class="btn btn-info btn-sm me-2">View</a>
                                            <a href="{{ route('departments.edit', $result->DepartmentID) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                                            <form action="{{ route('departments.destroy', $result->DepartmentID) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Department?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No search results found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <h4>All Departments</h4>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Department Name</th>
                                <th>Department Code</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($departments as $department)
                                <tr>
                                    <td>{{ $department->DepartmentID }}</td>
                                    <td>{{ $department->DepartmentName }}</td>
                                    <td>{{ $department->DepartmentCode }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('departments.show', $department->DepartmentID) }}" class="btn btn-info btn-sm me-2">View</a>
                                        <a href="{{ route('departments.edit', $department->DepartmentID) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                                        <form action="{{ route('departments.destroy', $department->DepartmentID) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this department?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No departments found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection