@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>College Details</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th style="width: 150px;">College ID:</th>
                            <td>{{ $college->CollegeID }}</td>
                        </tr>
                        <tr>
                            <th>College Name:</th>
                            <td>{{ $college->CollegeName }}</td>
                        </tr>
                        <tr>
                            <th>College Code:</th>
                            <td>{{ $college->CollegeCode }}</td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>{{ $college->IsActive ? 'Active' : 'Inactive' }}</td>
                        </tr>
                    </table>
                    
                    <div class="mt-4">
                        <h5>Departments in this College</h5>
                        @if($college->departments->where('IsActive', true)->count() > 0)
                            <ul class="list-group">
                                @foreach($college->departments->where('IsActive', true) as $department)
                                    <li class="list-group-item">
                                        <a href="{{ route('departments.show', $department->DepartmentID) }}">
                                            {{ $department->DepartmentName }} ({{ $department->DepartmentCode }})
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>No departments found for this college.</p>
                        @endif
                    </div>
                    
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('colleges.edit', $college->CollegeID) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('colleges.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection