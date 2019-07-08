@extends('layouts.partials.main-forms')
@include('layouts.partials.page-header',
      ['header' => 'Loans',
       'form_title' => 'Import Disbursed Loans'
      ])
  @section('create-form')
    <form class="form-horizontal" method="POST" action="/loans/importation" enctype="multipart/form-data"> 
      {{ csrf_field() }}
      <div class="panel-body container-fluid">
      <div class="row row-lg">
        <div class="example-wrap">
          <h5 class="example-title">Create an Excel file with the following headers in that order:</h5>
          <p>branch_id, loan_product_id, customer_id, amount_applied, loan_period, loan_application_date</p>
          <p>Note: The loan will be disbursed normally with the amount provided. If the loan has been partly or fully paid, import single payments for each loan or sum up all principal,interest and penalty and import them as a single payment.</p>
        </div>
      </div>
       {{-- change amount applied to amount disbursed, and application date to disbursement date --}}
       <div class="row row-lg">
          <div class="panel-heading">
            <h5 class="panel-title">Branches</h5>
          </div>
      </div>
      <div class="row row-lg">
        <div class="col-xl-5">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Branch</th>
                <th>Id</th>
              </tr>
            </thead>
            <tbody>
              @foreach($branches as $branch)
              <tr>
                <td class="text-middle">{{ $branch->branch_name }}</td>
                <td class="text-middle">{{ $branch->id }}</td>
              </tr>
               @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="row row-lg">
          <div class="panel-heading">
            <h5 class="panel-title">Products</h5>
          </div>
      </div>
      <div class="row row-lg">
        <div class="col-xl-5">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Product</th>
                <th>Id</th>
              </tr>
            </thead>
            <tbody>
              @foreach($products as $product)
              <tr>
                <td class="text-middle">{{ $product->product_name }}</td>
                <td class="text-middle">{{ $product->id }}</td>
              </tr>
               @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="row row-lg">
        <div class="col-xl-4 col-md-6">
          <div class="example">
            <input type="file" id="input-file-now" name ="loans_import_file" data-plugin="dropify" data-default-file=""
            />
          </div>
        </div>
      </div>
      </div>
      <div class="form-group">
      <button type="submit" class="btn btn-lg btn-success col-6 col-md-4">Upload</button>
      </div>
    </form>
  @endsection
