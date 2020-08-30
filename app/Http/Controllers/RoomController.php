<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomController extends Controller
{

    public function index()
    {
        $room = Room::all();
        return response()->json(['status' => 'success', 'data' => $room]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $room = new Room();
        $room->name = $request->get('name');
        $room->price_night = $request->get('price_night');
        $room->price_threehr = $request->get('price_threehr');
        $room->price_onehr = $request->get('price_onehr');
        $room->people = $request->get('people');
        $room->state = $request->get('state');
        $room->save();
        return response()->json(['status' => 'success']);
    }

    
    public function show($id)
    {
        $room = Room::find($id);
        return response()->json(['status' => 'success', 'data' => $room]);
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        $room = new Room();
        $room->name = $request->get('name');
        $room->price_night = $request->get('price_night');
        $room->price_threehr = $request->get('price_threehr');
        $room->price_onehr = $request->get('price_onehr');
        $room->people = $request->get('people');
        $room->state = $request->get('state');
        $room->save();
        return response()->json(['status' => 'success']);
    }

    
    public function destroy($id)
    {
        $room = Room::find($id);
        $room->delete();
        return response()->json(['status' => 'success']);
    }
}
