@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Add New Department</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('departments.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="CollegeID" class="form-label">College</label>
                            <select class="form-select @error('CollegeID') is-invalid @enderror" id="CollegeID" name="CollegeID" required>
                                <option value="">Select College</option>
                                @foreach($colleges as $college)
                                    <option value="{{ $college->CollegeID }}" {{ old('CollegeID') == $college->CollegeID ? 'selected' : '' }}>
                                        {{ $college->CollegeName }} ({{ $college->CollegeCode }})
                                    </option>
                                @endforeach
                            </select>
                            @error('CollegeID')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="DepartmentName" class="form-label">Department Name</label>
                            <input type="text" class="form-control @error('DepartmentName') is-invalid @enderror" id="DepartmentName" name="DepartmentName" value="{{ old('DepartmentName') }}" required>
                            @error('DepartmentName')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="DepartmentCode" class="form-label">Department Code</label>
                            <input type="text" class="form-control @error('DepartmentCode') is-invalid @enderror" id="DepartmentCode" name="DepartmentCode" value="{{ old('DepartmentCode') }}" required>
                            @error('DepartmentCode')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Save Department</button>
                            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection