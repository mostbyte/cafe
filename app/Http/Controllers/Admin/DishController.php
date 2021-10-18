<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\Http\Controllers\Controller;
use App\Http\Requests\DishRequest;

class DishController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dishes = Dish::all();
        return view('admin.dishes.index', [
            'dishes' => $dishes
        ]);
    }

    public function create()
    {
        return view('admin.dishes.create');
    }

    public function store(DishRequest $request)
    {
        Dish::query()->create($request->validated());
        return redirect()->route('admin.dish.index');
    }

    public function edit(Dish $dish)
    {
        return view('admin.dishes.edit', [
            'dish' => $dish,
        ]);
    }

    public function update(DishRequest $request, Dish $dish)
    {
       tap($dish)->update($request->validated());
       return redirect()->route('admin.dish.index');
    }

    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('admin.dish.index');
    }
}
