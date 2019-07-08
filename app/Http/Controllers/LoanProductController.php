<?php

namespace App\Http\Controllers;

use App\Models\Loans\LoanProduct;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreLoanProductRequest;

class LoanProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loanproducts = LoanProduct::all();
        return view('loan-products.loan_products_list',compact('loanproducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loan-products.loan_products_form');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoanProductRequest $request)
    {
        $product = new LoanProduct($request->all());
        //$branch->company_id  = $request->user()->company_id; // get users company_id
        $product->company_id = 1;
    
        if(!$product->save()){
            session()->flash('message','Loan Product NOT Registered');
            return redirect('/loan-product');
        }
        session()->flash('message','Loan Product Registered Succcessfully');
        return redirect('/loan-products/list');
    }
}
