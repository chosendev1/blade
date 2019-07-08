@extends('layouts.partials.main-forms')
@include('layouts.partials.page-header',
      ['header' => 'Collaterals',
       'form_title' => 'Register Collateral for - '.$loan->customer->name_of_applicant
      ])
    @section('create-form')
      <form method="POST" action="/loan/{{ $loan->id }}/collateral">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-12">
              @if ($flash=session('message'))
                <div class="alert alert-success" role="alert">
                  {{ $flash }}
                </div>
              @endif 
            </div>
          </div>
        <input type="hidden" name="loan_applications_id" value="{{ $loan->id }}" />
        <div class="row">
        <div class="form-group form-material col-md-6">            
          <label class="form-label" for="collateral_">Collateral Type</label>
          <input type="text" name="collateral_type" class="form-control">
        </div>
        <div class="form-group form-material col-md-6">
            <label class="form-label" for="collateral_">Collateral Value</label>
            <input type="text" name="collateral_value"  class="form-control">
        </div>
        </div>
        <div class="form-group form-material">
            <label class="form-label" for="collateral_">Collation Location</label>
            <input type="text" name="collateral_location" rows="3" class="form-control">
        </div>
        <div class="form-group form-material col-md-3">
          <button type="submit" class="btn btn-success btn-block">Save Collateral</button>
        </div>
       </form>
      @endsection
