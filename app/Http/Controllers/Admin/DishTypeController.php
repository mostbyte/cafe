<?php

namespace App\Http\Controllers\Admin;

use App\DishType;
use App\Http\Controllers\Controller;
use App\Http\Requests\DishTypeRequest;

class DishTypeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.dish_types.index', [
            'dishTypes' => DishType::all(),
        ]);
    }

    public function create()
    {
        return view('admin.dish_types.create');
    }

    public function store(DishTypeRequest $request)
    {
        DishType::query()->create($request->validated());
        return redirect()->route('admin.dishtype.index');
    }

    public function edit(DishType $dishType)
    {
        return view('admin.dish_types.edit', [
            'dishType' => $dishType,
        ]);
    }

    public function update(DishTypeRequest $request, DishType $dishType)
    {
        tap($dishType)->update($request->validated());
        return redirect()->route('admin.dishtype.index');
    }

    public function destroy(DishType $dishType)
    {
        $dishType->delete();
        return redirect()->route('admin.dishtype.index');
    }
}
