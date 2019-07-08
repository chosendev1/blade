@extends('layouts.partials.lists.main-list')
@include('layouts.partials.lists.list-header',
      ['header' => 'Loan Disbursement' ])
    
    @section('create-list')
      <div class="card">
              <div class="card-header card-header-transparent card-header-bordered">
                <h4 class="example-title">Approved Loans</h4>
              </div>
              <br>
                @include('customers.customer_search_form')
              <ul class="list-group">
                <div class="card-block">
                @foreach($approved_loans as $loan)
                    <li class="list-group-item">
                      <div class="media">
                        <!-- <div class="pr-0 pr-sm-20 align-self-center">
                          <div class="avatar avatar-online">
                            <img src="../../../global/portraits/1.jpg" alt="...">
                            <i class="avatar avatar-busy"></i>
                          </div>
                        </div> -->
                        <div class="media-body align-self-center">
                          {{-- <h5 class="mt-0 mb-5"> --}}
                          <h5>
                            {{ $loan->loan_application->customer->name_of_applicant }}
                            <small>{{ $loan->loan_application->customer->member_number }}</small>
                          </h5>
                          <a>
                          <i class="icon icon-color md-smartphone"" aria-hidden="true"></i> 
                            {{ $loan->loan_application->customer->phone_number }}      
                          </a>
                        </div>
                        <div class="media-body align-self-center">
                          <h5>{{ $loan->loan_application->loan_product->product_name }} </h5>
                          <a>
                            {{ $loan->loan_application->approval->amount_approved }}</span>
                          </a>
                        </div>
                        <div class="media-body align-self-center">
                          <h5>{{ $loan->loan_application->loan_application_date }} </h5>
                          <a>
                            {{ $loan->loan_application->loan_period }}</span>
                          </a>
                        </div>
                        <div class="media-body align-self-center">
                          <br>
                          <a class="text-action" href="/loan/{{ $loan->id }}/approve">
                          Guarantors
                          </a>
                          <br>
                          <a class="text-action" href="/loan/{{ $loan->id }}/approve">
                          Collateral
                          </a>
                          <br>
                          <a class="text-action" href="/loan/{{ $loan->id }}/appraise">
                          Schedule</a>
                        </div>
                        <div class="pl-0 pl-sm-20 mt-15 mt-sm-0 align-self-center">
                          <form method="GET" action="/loan/{{$loan->id}}/disburse">
                          <button type="submit" class="btn btn-primary btn-sm">
                            Disburse
                          </button>
                          </form>
                        </div>
                      </div>
                       <hr>
                    </li>
      @endforeach
       </ul>
      </div></div>
    @endsection
