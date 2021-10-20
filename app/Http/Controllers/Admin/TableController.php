<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableRequest;
use App\Http\Requests\TableUpdateRequest;
use App\Services\TablesService;
use App\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{

    /** @var TableService */
    private $tableService;

    public function __construct(TablesService $tablesService)
    {
        $this->tableService = $tablesService;
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
        $table = $this->tableService->create($request->validated());

        return response()->json([
            'message' => "Стол создан успешно",
            'id' => $table->id
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
    public function update(TableUpdateRequest $request)
    {
        foreach($request['tables'] as $key => $value){
            $table = Table::where('id', '=', $value['id'])->update($value);
        }
        return response()->json([
            'message' => "Стол изменен успешно"
        ], 200);

        // return redirect()->route('admin.table.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        $table->delete();
        return response()->json([
            'message' => 'Успешно удалено'
        ]);
        // Table::destroy($request->data);
    }
}
