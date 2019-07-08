<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branches\Branch;
use App\Http\Requests\StoreBranchRequest;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::orderBy('id', 'DESC')->get();
        return view('branches.branches_list',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('branches.branches_form');
    }

    public function store(StoreBranchRequest $request)
    {   
        $branch = new Branch($request->all());
        //$branch->company_id  = $request->user()->company_id; // get users company_id
        $branch->company_id = 1;   
        if(!$branch->save()){
           
            session()->flash('message','Branch NOT Registered');
            return redirect()->back();
        }
        
        session()->flash('message','Branch Registered Succcessfully');
        return redirect('/branches/list');
    }

    public function show(Branch $branch)
    {
        return view('branches.customershow', compact('branch'));
    }
}
