<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Resources\Company as CompanyResource;

class CompanyController extends Controller
{
   public function getCompanies(Request $request){
        return CompanyResource::collection(Company::paginate($request->per_page ?? 10));
   }
}
