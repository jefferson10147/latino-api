<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\SportClub;
use Illuminate\Http\Request;

class SportClubsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sportclubs = SportClub::latest()->paginate(25);

        return $sportclubs;
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
        
        $sportclub = SportClub::create($request->all());

        return response()->json($sportclub, 201);
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
        $sportclub = SportClub::findOrFail($id);

        return $sportclub;
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
        
        $sportclub = SportClub::findOrFail($id);
        $sportclub->update($request->all());

        return response()->json($sportclub, 200);
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
        $sportclub = SportClub::findOrFail($id);
        $sportclub->delete();
        $status = [
            'status' => 'success',
            'message' => 'Sport club deleted successfully'
        ];

        return response()->json($status);
    }
}
