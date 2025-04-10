<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $colleges = College::where('IsActive', true)->get();
        return view('colleges.index', compact('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('colleges.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'CollegeName' => 'required|string|max:255',
            'CollegeCode' => 'required|string|max:50|unique:colleges,CollegeCode',
            'CollegeEmail' => 'nullable|email|max:255',
            'CollegePhone' => 'nullable|string|max:20',
        ]);

        $validated['IsActive'] = true;

        $college = College::create($validated);

        Log::info('College created successfully', $college->toArray());

        return redirect()->route('colleges.index')
                        ->with('success', 'College created successfully');
    } catch (\Exception $e) {
        Log::error('Failed to create college', ['error' => $e->getMessage()]);
        return redirect()->back()->withInput()->with('error', 'An error occurred while creating the college.');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(College $college)
    {
        //
        return view('colleges.show', compact('college'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(College $college)
    {
        //
        return view('colleges.edit', compact('college'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, College $college)
{
    try {
        $validated = $request->validate([
            'CollegeName' => 'required|string|max:255',
            'CollegeCode' => [
                'required',
                'string',
                'max:50',
                Rule::unique('colleges', 'CollegeCode')->ignore($college->CollegeID, 'CollegeID')
            ],
            'CollegeEmail' => 'nullable|email|max:255',
            'CollegePhone' => 'nullable|string|max:20',
        ]);

        $college->update($validated);

        Log::info('College updated successfully', $college->toArray());

        return redirect()->route('colleges.index')
                        ->with('success', 'College updated successfully');
    } catch (\Exception $e) {
        Log::error('Failed to update college', ['error' => $e->getMessage()]);
        return redirect()->back()->withInput()->with('error', 'An error occurred while updating the college.');
    }
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(College $college)
{
    try {
        $college->update(['IsActive' => false]);

        Log::warning('College soft deleted', ['CollegeID' => $college->CollegeID]);

        return redirect()->route('colleges.index')
                        ->with('success', 'College deleted successfully');
    } catch (\Exception $e) {
        Log::error('Failed to delete college', ['error' => $e->getMessage()]);
        return redirect()->route('colleges.index')->with('error', 'An error occurred while deleting the college.');
    }

    /**
     * Search functionality
     */

     /**
     * Team: Pagobo
     * Members: Kian Fratz Pagobo, Jethro Dungog
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = College::where('CollegeName', 'LIKE', "%{$query}%")
                        ->orWhere('CollegeCode', 'LIKE', "%{$query}%")
                        ->get();
        
        // Also get all colleges for the second table
        $colleges = College::where('IsActive', true)->get();
        
        return view('colleges.index', compact('results', 'colleges'));
    }
}
}
