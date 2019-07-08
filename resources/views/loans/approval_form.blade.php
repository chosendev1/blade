@extends('layouts.partials.main-forms')
@include('layouts.partials.page-header',
      ['header' => 'Loan Approval',
       'form_title' => 'Loan Approval for - '.$loan->customer->name_of_applicant
      ])
    @section('create-form')
        <form method="POST" action="/loan/{{ $loan->id }}/approval">
          {{ csrf_field() }}
           <div class="row">
            <div class="col-md-12">
                @if ($flash=session('message'))
                    <div class="alert alert-success" role="alert">
                      {{ $flash }}
                    </div>
                @endif 
            </div>
          <input type="hidden" name="loan_id" value="{{ $loan->id }}" />
          <div class="form-group form-material col-md-6">
              <label class="form-control-label">
                  Amount Approved
              </label>
            <input type="text" class="form-control" name="amount_approved">
          </div>
          <div class="form-group form-material col-md-6">
              <label class="form-control-label">
                  Approval Date
              </label>
            <input type="date" class="form-control" name="approval_date">
          </div>
          </div>
          <div class="form-group form-material">
              <label class="form-control-label">
                  Justification
              </label>
            <textarea class="form-control" name="justification"></textarea>
          </div>
          <div class="form-group form-material">
            <button type="submit" class="btn btn-success">Approve</button>
          </div>
        </form>
      @endsection
