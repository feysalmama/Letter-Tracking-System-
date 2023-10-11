<?php

namespace App\Http\Controllers\Letter;

use App\Http\Controllers\Controller;
use App\Models\LetterType;
use Illuminate\Http\Request;

class LetterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $letterTypes = LetterType::all();
        return view('letter.letter_types.index', compact('letterTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('letter.letter_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new letter type using mass assignment
        LetterType::create($validated);

        return redirect()->route('admin.letter-types.index')
            ->with('success', 'Letter type created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LetterType  $letterType
     * @return \Illuminate\Http\Response
     */
    public function show(LetterType $letterType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LetterType  $letterType
     * @return \Illuminate\Http\Response
     */
    public function edit(LetterType $letterType)
    {
        return view('letter.letter_types.edit', compact('letterType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LetterType  $letterType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LetterType $letterType)
    {
        // Validate the input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Update the letter type using mass assignment
        $letterType->update($validated);

        return redirect()->route('admin.letter-types.index')
            ->with('success', 'Letter type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LetterType  $letterType
     * @return \Illuminate\Http\Response
     */
    public function destroy(LetterType $letterType)
    {
        //  // Check if there are any associated letters with this letter type
        // $lettersCount = $letterType->letters->count();

        // if ($lettersCount > 0) {
        //     return redirect()->route('letter-types.index')
        //         ->with('error', 'Cannot delete. There are letters associated with this letter type.');
        // }

        // If there are no associated letters, delete the letter type
        $letterType->delete();

        return redirect()->route('admin.letter-types.index')
            ->with('success', 'Letter type deleted successfully.');
    }
}
