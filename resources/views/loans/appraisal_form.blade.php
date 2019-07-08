@extends('layouts.partials.main-forms')
@include('layouts.partials.page-header',
      ['header' => 'Loan Appraisal',
       'form_title' => 'Loan Appraisal for - '.$loan->customer->name_of_applicant
      ])
    @section('create-form')
        <form class="card" method="POST" action="/loan/{{ $loan->id }}/appraisal">
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
          <input type="hidden" name="loan_id" value="{{ $loan->id }}" />
          <div class="form-group form-material col-md-4">
              <label class="form-control-label">
                  Appraisal Date
              </label>
            <input type="date" class="form-control" name="appraisal_date">
          </div>
          <div class="form-group form-material">
              <label class="form-control-label">
                  Justification
              </label>
            <textarea class="form-control" name="justification"></textarea>
          </div>
          <div class="form-group form-material">
            <button type="submit" class="btn btn-success">Appraise</button>
          </div>
        </form>
      @endsection
