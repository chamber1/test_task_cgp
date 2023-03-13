<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Company;
use App\Http\Resources\Client as ClientResource;
use App\Http\Resources\Company as CompanyResource;


use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
   public function getClients(Request $request){

       $clients = Client::select(
           'clients.id',
           'clients.first_name',
           'clients.last_name',
           'clients.age',
            DB::raw('IF(clients.gender=1,\'Male\',\'Female\') as gender'),
           'clients.phone',
           'clients.email')
           ->join('client_company', 'client_company.client_id', '=', 'clients.id')
           ->join('companies', 'client_company.company_id', '=', 'companies.id')
           ->where('companies.id',$request->company_id)
           ->paginate($request->per_page ?? 10);

       return ClientResource::collection($clients);
   }

    public function getClientCompanies(Request $request){

        $companies = Company::select('companies.id','companies.name','companies.phone','companies.email')
            ->join('client_company', 'client_company.company_id', '=', 'companies.id')
            ->join('clients', 'client_company.client_id', '=', 'clients.id')
            ->where('clients.id',$request->client_id)->get();

        return CompanyResource::collection($companies);
    }
}
