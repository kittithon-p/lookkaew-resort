<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Furniture;

class FurnitureController extends Controller
{

    public function index()
    {
        $furniture = Furniture::all();
        return response()->json(['status' => 'success', 'data' => $furniture]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $furniture = new Furniture();
        $furniture->name = $request->get('name');
        $furniture->state = $request->get('state');
        $furniture->save();
        return response()->json(['status' => 'success']);
    }


    public function show($id)
    {
        $furniture = Furniture::find($id);
        return response()->json(['status' => 'success', 'data' => $furniture]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $furniture = Furniture::find($id);
        $furniture->name = $request->get('name');
        $furniture->state = $request->get('state');
        $furniture->save();
        return response()->json(['status' => 'success']);
    }

    public function destroy($id)
    {
        $furniture = Furniture::find($id);
        $furniture->delete();
        return response()->json(['status' => 'success']);
    }
}
