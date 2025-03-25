@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Add New College</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('colleges.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="CollegeName" class="form-label">College Name</label>
                            <input type="text" class="form-control @error('CollegeName') is-invalid @enderror" id="CollegeName" name="CollegeName" value="{{ old('CollegeName') }}" required>
                            @error('CollegeName')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="CollegeCode" class="form-label">College Code</label>
                            <input type="text" class="form-control @error('CollegeCode') is-invalid @enderror" id="CollegeCode" name="CollegeCode" value="{{ old('CollegeCode') }}" required>
                            @error('CollegeCode')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Save College</button>
                            <a href="{{ route('colleges.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection