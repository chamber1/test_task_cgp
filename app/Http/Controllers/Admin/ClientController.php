<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\DataTables\ClientDataTable;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\URL;

class ClientController extends Controller
{

    public function data(){
        $table = Client::all();

        return datatables()->of($table)->addColumn('action', function (Client $table) {
            return  $table->id;
        })->toJson();
    }

    public function index(ClientDataTable $dataTable)
    {
       return $dataTable->render('admin.clients.index');
    }

    public function edit(){
        dd("wow");
    }
}
