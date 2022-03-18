<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Response;
use App\Models\Image;

class UploadImageController extends Controller
{
    public function index()
    {
        return view('image');
    }
 
    public function save(Request $request)
    {
        $validatedData = $request->validate([
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('images');
        $save = new Image;
        $save->user_id = auth()->user()->id;
        $save->name = $name;
        $save->path = $path;
        $save->save();
        return redirect('profile')->with('status', 'Image Has been uploaded');
    }
}
