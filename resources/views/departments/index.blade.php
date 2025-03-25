@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Departments</h2>
                <a href="{{ route('departments.create') }}" class="btn btn-primary">Add New Department</a>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Department Name</th>
                                <th>Department Code</th>
                                <th>College</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($departments as $department)
                                <tr>
                                    <td>{{ $department->DepartmentID }}</td>
                                    <td>{{ $department->DepartmentName }}</td>
                                    <td>{{ $department->DepartmentCode }}</td>
                                    <td>{{ $department->college->CollegeName }}</td>
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
                                    <td colspan="5" class="text-center">No departments found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection