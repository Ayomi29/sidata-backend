<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::all();
        return response()->json(
            [
                "message" => "Success",
                "status" => 200,
                "data" => $divisions
            ]
        );
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
            'name' => 'required|max:255',
            'division_code' => 'required|unique:divisions'
        ]);
        $division = Division::create($validate);
        return response()->json(
            [
                "message" => "Data has been created",
                "status" => 200,
                "data" => $division
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $division = Division::find($id);
        return response()->json(
            [
                "message" => "Success",
                "status" => 200,
                "data" => $division
            ]
        );
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

        Division::find($id)->update($validateData);
        return response()->json([
            "message" => "Data has been updated",
            "status" => 200,
            "data" => Division::find($id)
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
        Division::destroy($id);
        return response()->json([
            "message" => "Data has been deleted",
            "status" => 200
        ]);
    }
}
