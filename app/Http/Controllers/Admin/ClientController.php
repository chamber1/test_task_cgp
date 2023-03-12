<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Models\ClientsCompany;
use Illuminate\Routing\Controller;
use App\DataTables\ClientDataTable;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

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
        $companiesList = Company::all()->pluck('name','id');
        return view('admin.client.create',compact('companiesList'));
    }

    /**
     * Creates New Client
     *
     * @param ClientRequest $request
     *
     */
    public function store(ClientRequest $request){
       $client = Client::create($request->only('first_name','last_name','age','gender','phone','email'));
        if($request->companies){
            foreach ($request->companies as $company => $company_id){
                ClientsCompany::insert([
                    'client_id' => $client->id,
                    'company_id' => $company_id
                ]);
            }
        }
    }

    /**
     * Shows Edit Form.
     *
     * @param Client $client Model
     *
     * @return Filled view with client Data
     */
    public function edit(Client $client){
        $companiesList = Company::all()->pluck('name','id');
        $clientCompanies = $client->companies->pluck('company_id');

        return view('admin.client.edit', compact('client','companiesList','clientCompanies'));
    }

    /**
     * Updates Existing Client
     *
     * @param ClientRequest $request
     *
     */
    public function update(Client $client, ClientRequest $request){
        $client->update($request->only('first_name','last_name','age','gender','phone','email'));
        if($request->companies){
            ClientsCompany::where('client_id',$client->id)->delete();
            foreach ($request->companies as $company => $company_id){
                ClientsCompany::insert([
                    'client_id' => $client->id,
                    'company_id' => $company_id
                ]);
            }
        }
    }

    /**
     * Deletes Existing Client
     *
     * @param Request $request
     *
     */
    public function delete(Request $request){
        Client::where('id',$request->client_id)->delete();
        ClientsCompany::where('client_id',$request->client_id)->delete();
    }
}
