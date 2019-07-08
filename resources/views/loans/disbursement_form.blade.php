   @extends('layouts.partials.main-forms')
@include('layouts.partials.page-header',
      ['header' => 'Loan Disbursement',
       'form_title' => 'Loan Disbursement for - '.$loan->customer->name_of_applicant
      ])
    @section('create-form')
        <form method="POST" action="/loan/{{ $loan->id }}/disbursement">
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
                  Amount Disbursed
              </label>
            <input type="text" class="form-control" name="amount_approved" value="{{ $loan->approval->amount_approved }}" disabled="disabled">
          </div>
          <div class="form-group form-material col-md-6">
            <label class="form-control-label">
                  Disbursement Date
              </label>
            <input type="date" class="form-control" name="disbursement_date" placeholder="Disbursement Date">
          </div>
          </div>
          <div class="form-group form-material">
            <button type="submit" class="btn btn-success">Disburse</button>
          </div>
        </form>
      @endsection

