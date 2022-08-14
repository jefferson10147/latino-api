<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\ReservedArea;
use Illuminate\Http\Request;

class ReservedAreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reservedareas = ReservedArea::latest()->paginate(25);

        return $reservedareas;
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
        
        $reservedarea = ReservedArea::create($request->all());

        return response()->json($reservedarea, 201);
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
        $reservedarea = ReservedArea::findOrFail($id);

        return $reservedarea;
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
        
        $reservedarea = ReservedArea::findOrFail($id);
        $reservedarea->update($request->all());

        return response()->json($reservedarea, 200);
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
        $reservedArea = ReservedArea::findOrFail($id);
        $reservedArea->delete();
        $status = [
            'status' => 'success',
            'message' => 'Reserved Area deleted successfully'
        ];

        return response()->json($status);
    }
}
