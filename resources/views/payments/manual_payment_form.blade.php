@extends('layouts.partials.main-forms')
@include('layouts.partials.page-header',
      ['header' => 'Loan Payment',
       'form_title' => 'Loan Payment for - '.$loan->customer->name_of_applicant
      ])
  @section('create-form')
    <form method="POST" action="/loan/payment">
                {{ csrf_field() }}
      <input type="hidden" name="loan_application_id" value="{{ $loan->id }}" />
      <input type="hidden" name="payment_method" value="Manual" />

        <div class="row">
          <div class="col-md-12">
            @if ($flash=session('message'))
                <div class="alert alert-success" role="alert">
                  {{ $flash }}
                </div>
            @endif 
          </div>

          <div class="form-group form-material col-md-4">            
            <label class="form-control-label" for="principal_paid">
              Principle Paid
            </label>
            <input type="text" name="principal_paid" class="form-control">
          </div>

          <div class="form-group form-material col-md-4">
            <label class="form-control-label" for="interest_paid">
              Interest Paid
            </label>
            <input type="text" name="interest_paid"  class="form-control">
          </div>

          <div class="form-group form-material col-md-4">
            <label class="form-control-label" for="penalty_paid">
              Penalty Paid
            </label>
            <input type="text" name="penalty_paid"  class="form-control">
          </div>
        </div>

        <div class="row">
        <div class="form-group form-material col-md-4">
          <label class="form-control-label" for="receipt_number">
            Receipt Number
          </label>
           <input type="text" name="receipt_number" placeholder="if cash Payment" class="form-control">
        </div>

        <div class="form-group form-material col-md-4">
          <label class="form-control-label" for="bank">
            Bank
          </label>
          <input type="text" name="bank_name"  placeholder="if cheque Payment" class="form-control">
        </div>

        <div class="form-group form-material col-md-4">
          <label class="form-control-label" for="cheque_number">
            Cheque Number
          </label>
          <input type="text" name="cheque_number"  placeholder="if cheque Payment" class="form-control">
        </div>
        </div>
        
        <div class="row">
          <div class="form-group form-material col-md-4">             
            <label class="form-control-label" for="payment_date">
              Payment Date
            </label>
            <input type="date" name="payment_date" class="form-control">
          </div>
        </div>

        <div class="row">
        <div class="form-group form-material col-md-3">
          <button type="submit" class="btn btn-success btn-block">
            Save Payment
          </button>
        </div>
      </div>
    </form>
   @endsection
