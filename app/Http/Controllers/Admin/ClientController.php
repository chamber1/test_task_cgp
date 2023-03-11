<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\DataTables\ClientDataTable;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Support\Facades\URL;

/**
 * Handles Clients Admin Panel CRUD operations
 *
 * @author Yuri Yurenko <yurenkoyura@gmail.com>
 */
class ClientController extends Controller
{
    /**
     * Shows All Clients in Data grid view with Ajax query .
     *
     * @return Json Clients Data
     */
    public function data(){
        $table = Client::all();

        return datatables()->of($table)->addColumn('action', function (Client $table) {
            return  $table->id;
        })->toJson();
    }

    /**
     * Shows All Clients Data grid view .
     *
     * @param ClientDataTable $dataTable object
     *
     * @return view with Clients $dataTable object
     */
    public function index(ClientDataTable $dataTable)
    {
       return $dataTable->render('admin.client.index');
    }
    /**
     * Shows Create Form.
     *
     * @return view
     */
    public function create(){
        return view('admin.client.create');
    }

    /**
     * Creates New Client
     *
     * @param ClientRequest $request
     *
     * @return json responce
     */
    public function store(ClientRequest $request){
       $result = Client::create($request->only('first_name','last_name','age','gender','phone','email'));
    }

    /**
     * Shows Edit Form.
     *
     * @param Client $client Model
     *
     * @return Filled view with client Data
     */
    public function edit(Client $client){
        return view('admin.client.edit', compact('client'));
    }
}
