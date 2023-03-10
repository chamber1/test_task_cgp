<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\DataTables\ClientDataTable;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{

    public function data(){
        return datatables()->of(Client::all())->toJson();
    }

    public function index(ClientDataTable $dataTable)
    {
       return $dataTable->render('admin.client');
    }
}
