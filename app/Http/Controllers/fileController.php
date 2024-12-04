<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fileController extends Controller
{

    public function store(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png|max:2048', // 2MB max
        ]);

        // Retrieve the uploaded file
        $file = $request->file('file');

        // Define the destination path
        $destinationPath = public_path('images'); // This points to /public/images folder

        // Save the file with the original name "intro-bg.jpg"
        $file->move($destinationPath, 'intro-bg.jpg');

        return back()->with('success', 'File uploaded successfully to the images folder.');
    }

}