<?php

namespace App\Http\Controllers\Admin;

use App\DishType;
use App\Http\Controllers\Controller;
use App\Http\Requests\DishTypeRequest;
use Illuminate\Http\Request;

class DishTypeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dish_types.index', [
            'dishTypes' => DishType::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dish_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishTypeRequest $request)
    {
        DishType::query()->create($request->validated());
        return redirect()->route('admin.dishtype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DishType $dishType)
    {
        return view('admin.dish_types.edit', [
            'dishType' => $dishType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DishTypeRequest $request, DishType $dishType)
    {
        tap($dishType)->update($request->validated());
        return redirect()->route('admin.dishtype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DishType $dishType)
    {
        $dishType->delete();
        return redirect()->route('admin.dishtype.index');
    }
}
