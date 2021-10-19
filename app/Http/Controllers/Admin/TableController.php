<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableRequest;
use App\Table;
use Illuminate\Http\Request;

class TableController extends Controller
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
        $tables = Table::all();
        return view('admin.tables.index', [
            'tables' => $tables,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TableRequest $request)
    {
        $storeData = [
            'coordinates' => json_encode([
                'x' => $request->x,
                'y' => $request->y,
            ]),
            'size' => json_encode([
                'width' => $request->width,
                'height' => $request->height
            ])
        ];
        Table::query()->create($storeData);
        return response()->json([
            'message' => "Стол создан успешно"
        ], 201);
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
    public function edit(Table $table)
    {
        return view('admin.tables.edit', [
            'table' => $table
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        foreach($request['tables'] as $key => $value){
            $table = Table::find($value['id']);
            $table->name = $value['id'];
            $table->coordinates = $value['coordinates'];
            $table->size = $value['size'];
            $table->type = $value['type'];
            $table->save();
        }
        // return response()->json([
        //     'message' => "Стол изменен успешно"
        // ], 201);

        // return redirect()->route('admin.table.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Table::destroy($request->data);
    }
}
