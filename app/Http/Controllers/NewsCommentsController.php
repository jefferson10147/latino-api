<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\NewsComment;
use Illuminate\Http\Request;

class NewsCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $newscomments = NewsComment::latest()->paginate(25);

        return $newscomments;
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
        
        $newscomment = NewsComment::create($request->all());

        return response()->json($newscomment, 201);
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
        $newscomment = NewsComment::findOrFail($id);

        return $newscomment;
    }

    /**
     * Display comments from a specific new
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function getCommentByNewId($id) 
    {
        $newComments = NewsComment::where('new_id', $id)->get();

        return response()->json($newComments, 200);
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
        
        $newscomment = NewsComment::findOrFail($id);
        $newscomment->update($request->all());

        return response()->json($newscomment, 200);
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
        $newsComment = NewsComment::findOrFail($id);
        $newsComment->delete();
        $status = [
            'status' => 'success',
            'message' => 'New Comment deleted successfully'
        ];

        return response()->json($status);
    }
}
