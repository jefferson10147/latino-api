<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Reservation;
use App\Models\ReservedArea;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reservations = Reservation::latest()->paginate(25);

        return $reservations;
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
        $reserved_areas = ReservedArea::where('area_id', $request->area_id)->get();

        for ($i=0; $i < count($reserved_areas); $i++) {
            $reservation = Reservation::find($reserved_areas[$i]->reservation_id);
            if(strtotime($request->start_date) == strtotime($reservation->start_date)) {
                return response()->json(['error' => "Time block."], 400);
            }
        }

        $reservation = Reservation::create([
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "approved" => $request->approved,
            "description" => $request->description,
            "user_id" => $request->user_id,
        ]);

        $reserved_area = ReservedArea::create(["reservation_id" => $reservation->id, 'area_id' => $request->area_id]);

        return response()->json($reservation, 201);
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
        $reservation = Reservation::findOrFail($id);

        return $reservation;
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
        
        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());

        return response()->json($reservation, 200);
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
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        $status = [
            'status' => 'success',
            'message' => 'Reservation deleted successfully'
        ];

        return response()->json($status);
    }
}
