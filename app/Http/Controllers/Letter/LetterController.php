<?php


namespace App\Http\Controllers\Letter;

use App\Models\User;
use App\Models\Letter;
use App\Models\LetterType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LetterComingNotification;
use App\Notifications\LetterAcceptedNotification;


class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $letters = Letter::all();
        return view('letter.letter.index', compact('letters'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $letterTypes = LetterType::all(); // Fetch all LetterTypes
        return view('letter.letter.create', compact('letterTypes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




     public function store(Request $request)
    {

         // Validate the incoming request data
        $validated = $request->validate([
            'letter_type_id' => 'required|exists:letter_types,id',
            'customer_name' => 'required|string',
            'customer_phone' => 'required|string',
            'customer_email' => 'required|email',
            'customer_address' => 'required|string',
            'letter_title' => 'required|string',
            'file_path' => 'required|file',
        ]);



        // Generate a unique code

        $uniqueCode = 'LET-' . now()->format('YmdHis') . '-' . Str::random(4);


        // Get the currently authenticated user
        $user = Auth::user();

        // Handle file upload
        $file = $request->file('file_path');
        $fileName = 'letters/' . uniqid() .'.' . $file->extension();
        $filePath = $file->storeAs('public', $fileName);

        // Additional data to include in the create method
        $additionalData = [
            'unique_code' => $uniqueCode,
            'file_path' => $filePath,
            'user_id' => $user->id,
        ];

        // Combine the validated data and additional data
        $letterData = array_merge($validated, $additionalData);

        $letter =Letter::create($letterData);

         // Record the initial movement (finding initial node in the route)
        $initialNode = $letter->getInitialNode();


       if ($initialNode) {
        $email = $letter->customer_email;

        // Record the initial movement
        $movement = $letter->movements()->create([
            'node_id' => $initialNode->id,
            'movement_date' => now(),
        ]);

        // Send the notification to the retrieved email address to our customer
        Notification::route('mail', $email)
            ->notify(new LetterAcceptedNotification($letter));
    }

         // Send the notification to the retrieved email address to initial node user
          $userEmail = $initialNode->user->email;
           $user = User::where('email', $userEmail)->first();
          Notification::send($user, new LetterComingNotification($letter));



        // Redirect to a view or route,
        return redirect()->route('letter.letter.index')->with('success', 'Letter created successfully.');

    }


    // for trying to ...
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function reject(Letter $letter)
    {
        return view('letter.letter.reject',compact('letter'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function status(Letter $letter)
    {
        return view('letter.letter.status',compact('letter'));
    }


    /**
     *
     * Display the specified resource.
     *
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */



public function show( $letter)
{
      $letter = Letter::findOrFail($letter);
      $filePath = $letter->file_path;

        $destinationNode = $letter->getDestinationNode()->name;
        //   dd( $destinationNode);


        if (!$destinationNode) {
            return redirect()->route('letter.letter.show')->with('error', 'Invalid Destination Node');
        }


       return view('letter.letter.show', compact('letter', 'destinationNode','filePath'));
     // return view('letter.letter.show', compact('filePath'));
     // return response()->file($filePath,['content-Type'=>'application/pdf']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function edit(Letter $letter)
    {
        $letterTypes = LetterType::all();
        return view('letter.letter.edit', compact('letter','letterTypes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Letter $letter)
    {
        // Validate the incoming request data
    $validated = $request->validate([
        'letter_type_id' => 'required|exists:letter_types,id',
        'customer_name' => 'required|string',
        'customer_phone' => 'required|string',
        'customer_email' => 'required|email',
        'customer_address' => 'required|string',
        'letter_title' => 'required|string',
        'file_path' => 'file', //  optional
    ]);

    // Get the currently authenticated user
    $user = Auth::user();

    // Check if a new file has been uploaded
    if ($request->hasFile('file_path')) {
        // Handle file upload for the new file
        $newFile = $request->file('file_path');
        $fileName = 'letters/' . uniqid() . '.' . $newFile->getClientOriginalName();
        $filePath = $newFile->storeAs('public', $fileName);

        // Delete the previous file
        Storage::delete($letter->file_path);

        // Update the file path in the additional data
        $additionalData = [
            'file_path' => $filePath,
            'user_id' => $user->id,
        ];
    } else {
        // No new file uploaded, keep the existing file path
        $additionalData = [
            'user_id' => $user->id,
        ];
    }

    // Combine the validated data and additional data
    $letterData = array_merge($validated, $additionalData);

    // Update the letter with the validated data
    $letter->update($letterData);

    // Redirect to a view or route,
    return redirect()->route('letter.letter.index')->with('success', 'Letter updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Letter $letter)
    {
        // Ensure you have a reference to the file path
        $filePath = $letter->file_path;

        // Additional checks for other relationships, if applicable

        // Delete the letter record
        $letter->delete();

        // Delete the associated file
        Storage::delete($filePath);

        return redirect()->route('letter.letter.index')
            ->with('success', 'Letter deleted successfully.');
    }


    public function printLetter(Letter $letter)
    {
        return view('letter.letter.print', compact('letter'));

    }
}
