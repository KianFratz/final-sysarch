@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Colleges</h2>
                <a href="{{ route('colleges.create') }}" class="btn btn-primary">Add New College</a>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>College Name</th>
                                <th>College Code</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($colleges as $college)
                                <tr>
                                    <td>{{ $college->CollegeID }}</td>
                                    <td>{{ $college->CollegeName }}</td>
                                    <td>{{ $college->CollegeCode }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('colleges.show', $college->CollegeID) }}" class="btn btn-info btn-sm me-2">View</a>
                                        <a href="{{ route('colleges.edit', $college->CollegeID) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                                        <form action="{{ route('colleges.destroy', $college->CollegeID) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this college?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No colleges found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection