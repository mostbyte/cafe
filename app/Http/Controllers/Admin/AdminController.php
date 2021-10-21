<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\DishType;
use App\Http\Controllers\Controller;
use App\Table;
use App\User;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usersCount = User::count();
        $dishesCount = Dish::count();
        $tablesCount = Table::count();
        $dishTypesCount = DishType::count();
        return view('admin.index', [
            'usersCount' => $usersCount,
            'dishesCount' => $dishesCount,
            'tablesCount' => $tablesCount,
            'dishTypesCount' => $dishTypesCount
        ]);
    }
}
