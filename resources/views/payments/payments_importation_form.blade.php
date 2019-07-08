@extends('layouts.partials.main-forms')
@include('layouts.partials.page-header',
      ['header' => 'Loan Payments',
       'form_title' => 'Import Loan Payments'
      ])
  @section('create-form')
    <form class="form-horizontal" method="POST" action="/payments/importation" enctype="multipart/form-data"> 
      {{ csrf_field() }}
      <div class="panel-body container-fluid">
      <div class="row row-lg">
        <div class="example-wrap">
          <h5 class="example-title">Create an Excel file with the following headers in that order:</h5>
          <p>branch_id, loan_applications_id, principal_paid, interest_paid, penalty_paid, payment_date, receipt_number, cheque_number, bank_name, payment_method</p>
        </div>
      </div>

      <div class="row row-lg">
        <div class="col-xl-4 col-md-6">
          <div class="example">
            <input type="file" id="input-file-now" name ="payments_import_file" data-plugin="dropify" data-default-file=""
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
