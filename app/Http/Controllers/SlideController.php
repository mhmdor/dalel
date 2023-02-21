<?php

namespace App\Http\Controllers;

use App\Models\slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function createSlide(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('admin.create-slide');
        }
        if ($request->method() == 'POST') {
            $validator = $request->validate([
                'image'      => 'required',
            ]);

            $image = $request->file('image');
            $destinationPathImg = public_path('uploads/slide/');
            if (!$image->move($destinationPathImg, $image->getClientOriginalName())) {
                return 'Error saving the file.';
            }

            $image = $image->getClientOriginalName();

            slide::create([
                'image' => $image,
            ]);

            return redirect()->route('admin.home')->with('success', 'تم انشاء السلايد بنجاح');
        }
    }

    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $slide = slide::find($id);
        if ($image_path = "uploads/slide/" . $slide->image) {
            unlink($image_path);
        }
        $slide->delete();
        return redirect()->back();
    }
}
