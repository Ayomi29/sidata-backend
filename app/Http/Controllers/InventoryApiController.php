<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::all();
        return response()->json([
            'message' => 'Success',
            'status' => 200,
            'data' => $inventories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'employee_id' => 'required',
            'item_id' => 'required',
            'user_id' => 'required',
            'unit_code' => 'required'
        ]);

        // $validate['user_id'] = auth()->user()->id;

        $inventory = Inventory::create($validate);
        return response()->json([
            'message' => 'Data has been created',
            'status' => 200,
            'data' => $inventory
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventory = Inventory::find($id);
        return response()->json([
            'message' => 'Success',
            'status' => 200,
            'data' => $inventory
        ]);
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
        $validateData = $request->all();
        // $validateData['user_id'] = auth()->user()->id;

        Inventory::find($id)->update($validateData);
        return response()->json([
            'message' => 'Data has been updated',
            'status' => 200,
            'data' => Inventory::find($id)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Inventory::destroy($id);
        return response()->json([
            'message' => 'Data has been deleted',
            'status' => 200
        ]);
    }
}
