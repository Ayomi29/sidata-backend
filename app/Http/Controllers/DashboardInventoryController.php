<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Employee;
use App\Models\Inventory;
use App\Models\Item;
use Illuminate\Http\Request;

class DashboardInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventories.index', [
            'inventories' => Inventory::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventories.create', [
            'employees' => Employee::get(),
            'items' => Item::get()
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
        // $validate = $request->validate([
        //     'employee_id' => 'required',
        //     'item_id' => 'required',
        //     'user_id' => 'required',
        //     'unit_code' => 'required'
        // ]);
        $validate = $request->all();
        $validate['user_id'] = auth()->user()->id;

        Inventory::create($validate);

        return redirect('/inventories')->with('success', 'Data inventaris berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        return view('inventories.show', [
            'inventory' => $inventory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        return view('inventories.edit', [
            'employees' => Employee::get(),
            'items' => Item::get(),
            'inventory' => $inventory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        // $validateData = $request->validate([
        //     'employee_id' => 'required',
        //     'item_id' => 'required',
        //     'user_id' => 'required',
        //     'unit_code' => 'required'
        // ]);
        $validateData = $request->all();

        $validateData['user_id'] = auth()->user()->id;

        $inventory->update($validateData);

        return redirect('/inventories')->with('success', 'Data inventaris berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        Inventory::destroy($inventory->id);
        return redirect('/inventories')->with('success', 'Data inventaris berhasil dihapus');
    }
}
