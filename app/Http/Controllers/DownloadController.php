<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $files = Download::paginate(10);
        return view('download.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('download.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'file' => 'required|mimes:pdf,doc,zip|max:2048',
        ]);
        $file = $request->file('file');
        $name = $request->name . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('files'), $name);
        $form_data = array(
            'name' => $request->name,
            'file' => $name,
            'user_id' => Auth::id(),
        );
        Download::create($form_data);
        return redirect()->route('download.index')->with('success', 'File added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Download $download)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Download $download)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Download $download)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Download $download)
    {
        //
    }
    public function download($file)
    {
        $loadfile = Download::where('id', $file)->firstOrFail();
        return response()->download(public_path('files/' . $loadfile->file));
    }
}
