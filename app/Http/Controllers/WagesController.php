<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Wage;
use Illuminate\Http\Request;

class WagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $wages = Wage::latest()->paginate(25);

        return $wages;
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
        
        $wage = Wage::create($request->all());

        return response()->json($wage, 201);
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
        $wage = Wage::findOrFail($id);

        return $wage;
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
        
        $wage = Wage::findOrFail($id);
        $wage->update($request->all());

        return response()->json($wage, 200);
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
        $wage = Wage::findOrFail($id);
        $wage->delete();
        $status = [
            'status' => 'success',
            'message' => 'Wage deleted successfully'
        ];

        return response()->json($status);
    }
}
