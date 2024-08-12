<?php

namespace App\Http\Controllers;

use App\Models\create_stuffs_table;
use App\Http\Requests\Storecreate_stuffs_tableRequest;
use App\Http\Requests\Updatecreate_stuffs_tableRequest;

use Illuminate\Support\Facades\DB;

class StuffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stuffs = Stuff::with(['category', 'detail'])->get();

        return view('stuff.list', [
            'data' => $stuffs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stuff.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storecreate_stuffs_tableRequest $request)
    {
        Stuff::create($request->all());

        return redirect('/stuffs');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stuff $stuffs)
    {
        return view('stuff.add', [
            'data' => $stuff,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stuff $stuff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStuffRequest $request, Stuff $stuff)
    {
        $stuff->fill($request->all());
        $stuff->save();

        return redirect('/stuffs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stuff $stuffs)
    {
        $stuff->delete();

        return redirect('/stuffs');
    }
}
