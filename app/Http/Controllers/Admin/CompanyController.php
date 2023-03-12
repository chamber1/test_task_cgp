<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClientsCompany;
use Illuminate\Routing\Controller;
use App\DataTables\CompanyDataTable;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

/**
 * Handles Companies Admin Panel CRUD operations
 *
 * @author Yuri Yurenko <yurenkoyura@gmail.com>
 */
class CompanyController extends Controller
{
    /**
     * Shows All Companies in Data grid view with Ajax query .
     *
     * @return Json Companies Data
     */
    public function data(){
        $table = Company::all();

        return datatables()->of($table)->addColumn('action', function (Company $table) {
            return  $table->id;
        })->toJson();
    }

    /**
     * Shows All Clients Data grid view .
     *
     * @param CompanyDataTable $dataTable object
     *
     * @return view with Company $dataTable object
     */
    public function index(CompanyDataTable $dataTable)
    {
       return $dataTable->render('admin.company.index');
    }
    /**
     * Shows Create Form.
     *
     * @return view
     */
    public function create(){
        return view('admin.company.create');
    }

    /**
     * Creates New Client
     *
     * @param CompanyRequest $request
     *
     */
    public function store(CompanyRequest $request){
       Company::create($request->only('name','phone','email'));
    }

    /**
     * Shows Edit Form.
     *
     * @param Company $company Model
     *
     * @return Filled view with client Data
     */
    public function edit(Company $company){
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Updates Existing Client
     *
     * @param CompanyRequest $request
     *
     */
    public function update(Company $company, CompanyRequest $request){
        $company->update($request->only('name','phone','email'));
    }

    /**
     * Deletes Existing Client
     *
     * @param Request $request
     *
     */
    public function delete(Request $request){
        Company::where('id',$request->company_id)->delete();
        ClientsCompany::where('company_id',$request->company_id)->delete();
    }
}
