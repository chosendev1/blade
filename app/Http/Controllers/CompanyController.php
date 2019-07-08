<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company\Company;
use App\Http\Requests\StoreCompanyRequest;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('id', 'DESC')->get();
        return view('company.company_list',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.company_form');
    }

    public function store(StoreCompanyRequest $request)
    {
        $company = new Company($request->all());
                    
        if(!$company->save()){
           
            session()->flash('message','Company NOT Registered');
            return redirect()->back();
        }
        
        session()->flash('message','Company Registered Succcessfully');
        return redirect('/company/list');
    }

    public function show(Company $company)
    {
        return view('company.customershow', compact('company'));
    }
}
