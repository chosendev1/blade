@extends('layouts.partials.lists.main-list')
@include('layouts.partials.lists.list-header',
      ['header' => 'Loan Appraisal'])
      
    @section('create-list')
        <div class="card">
                <div class="card-header card-header-transparent card-header-bordered">
                  <h4 class="example-title">Applied Loans</h4>
                </div>
                <br>
                @include('customers.customer_search_form')
                <div class="card-block">
                <ul class="list-group">
                @foreach($loan_applications as $loan)
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
                            {{ $loan->customer->name_of_applicant }}
                            <small>{{ $loan->customer->member_number }}</small>
                          </h5>
                          <a>
                          <i class="icon icon-color md-smartphone"" aria-hidden="true"></i> 
                            {{ $loan->customer->phone_number }}      
                          </a>
                          {{-- <div>
                            <a class="text-action" href="javascript:void(0)">
                          <i class="icon icon-color bd-dribbble" aria-hidden="true"></i>
                        </a>
                            <a class="text-action" href="javascript:void(0)">
                          <i class="icon icon-color md-email" aria-hidden="true"></i>
                        </a>
                            <a class="text-action" href="javascript:void(0)">
                          <i class="icon icon-color md-smartphone" aria-hidden="true"></i>
                        </a>
                            <a class="text-action" href="javascript:void(0)">
                          <i class="icon icon-color bd-twitter" aria-hidden="true"></i>
                        </a>
                            <a class="text-action" href="javascript:void(0)">
                          <i class="icon icon-color bd-facebook" aria-hidden="true"></i>
                        </a>
                            <a class="text-action" href="javascript:void(0)">
                          <i class="icon icon-color bd-dribbble" aria-hidden="true"></i>
                        </a>
                          </div> --}}
                        </div>
                        <div class="media-body align-self-center">
                          <h5>{{ $loan->loan_product->product_name }} </h5>
                          <a>
                            {{ $loan->amount_applied }}
                          </a>
                        </div>
                        <div class="media-body align-self-center">
                          <h5>{{ $loan->loan_application_date }} </h5>
                          <a>
                            {{ $loan->loan_period }}
                          </a>
                        </div>
                         <div class="media-body align-self-center">
                          <a class="text-action" href="/loan/{{ $loan->id }}/guarantors">
                          Add Guarantors
                          </a>
                          <br>
                          <a class="text-action" href="/loan/{{ $loan->id }}/collaterals">
                          Add Collateral
                          </a>
                        </div>
                        <div class="media-body align-self-center">
                          <a class="text-action" href="/loan/{{ $loan->id }}/schedule">
                          Schedule
                          </a>
                        </div>
                        <div class="pl-0 pl-sm-20 mt-15 mt-sm-0">
                          <form method="GET" action="/loan/{{ $loan->id }}/appraise">
                          <button type="submit" class="btn btn-primary btn-sm">Appraise</button>
                          </form>
                        </div>
                      </div>
                      <hr>
                    </li>
        @endforeach
      </ul>
      </div></div>
      @endsection
