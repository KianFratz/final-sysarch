<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\College;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::with('college')
                                ->where('IsActive', true)
                                ->get();
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        $colleges = College::where('IsActive', true)->get(); // Fixed to fetch colleges
        return view('departments.create', compact('colleges')); // Pass colleges, not departments
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'CollegeID' => 'required|exists:colleges,CollegeID',
            'DepartmentName' => 'required|string|max:255',
            'DepartmentCode' => 'required|string|max:50|unique:departments,DepartmentCode',
        ]);
        
        $validated['IsActive'] = true;
        
        Department::create($validated);
        
        return redirect()->route('departments.index')
                         ->with('success', 'Department created successfully');
    }

    public function show(Department $department)
    {
        return view('departments.show', compact('department'));
    }

    public function edit(Department $department)
    {
        $colleges = College::where('IsActive', true)->get(); // Fixed to fetch colleges
        return view('departments.edit', compact('department', 'colleges'));
    }

    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'CollegeID' => 'required|exists:colleges,CollegeID',
            'DepartmentName' => 'required|string|max:255',
            'DepartmentCode' => [
                'required',
                'string',
                'max:50',
                Rule::unique('departments', 'DepartmentCode')->ignore($department->DepartmentID, 'DepartmentID')
            ],
        ]);
        
        $department->update($validated);
        
        return redirect()->route('departments.index')
                         ->with('success', 'Department updated successfully');
    }

    public function destroy(Department $department)
    {
        $department->update(['IsActive' => false]);
        
        return redirect()->route('departments.index')
                         ->with('success', 'Department deleted successfully');
    }

    /**
     * Team: Pagobo
     * Members: Kian Fratz Pagobo, Jethro Dungog
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Department::where('DepartmentName', 'LIKE', "%{$query}%")
                            ->orWhere('DepartmentCode', 'LIKE', "%{$query}%")
                            ->get();
        
        $departments = Department::where('IsActive', true)->get(); // Fixed variable name
        
        return view('departments.index', compact('results', 'departments')); // Fixed view path
    }
}