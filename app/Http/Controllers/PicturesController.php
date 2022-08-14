<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Picture;
use Illuminate\Http\Request;

class PicturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pictures = Picture::latest()->paginate(25);

        return $pictures;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $picture = Picture::create($request->all());

        return response()->json($picture, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $picture = Picture::findOrFail($id);

        return $picture;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $picture = Picture::findOrFail($id);
        $picture->update($request->all());

        return response()->json($picture, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pictures = Picture::findOrFail($id);
        $pictures->delete();
        $status = [
            'status' => 'success',
            'message' => 'Picture deleted successfully'
        ];

        return response()->json($status);
    }
}
