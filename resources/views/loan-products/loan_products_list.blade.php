@extends('layouts.partials.lists.main-list')
@include('layouts.partials.lists.list-header',
      ['header' => 'Loan Products',
     // 'list_title' => 'Registered Customers'
      ])
    @section('add-new')
      <button type="button" class="btn btn-success btn-sm ladda-button" data-style="expand-left"
        data-plugin="ladda"><i class="icon md-plus" aria-hidden="true"></i>
        Add New
      </button>
    @endsection
    @section('create-list')
        <ul class="list-group list-group-full">
          <li class="list-group-item">
            <div class="media">
              <div class="media-body">
                <h4 class="example-title">Loan Products</h4>
              </div>
            <div class="pl-20">
              <form method="GET" action="/loan-product">
                <button type="submit" class="btn btn-success btn-sm ladda-button" data-style="expand-left"
                  data-plugin="ladda"><i class="icon md-plus" aria-hidden="true"></i>
                  Add New
                </button>
              </form>
            </div>
            </div>
            <hr>
          </li>

          @foreach($loanproducts as $loanproduct)
          <li class="list-group-item">
            <div class="media">
              <div class="media-body">
                <h4 class="mt-0 mb-5">{{ $loanproduct->product_name }}</h4>
                <a>{{ $loanproduct->interest_method }}</a>
              </div>

              <div class="media-body align-self-center">
                <h5>Payment Frequency</h5>
                <a>
                  {{ $loanproduct->payment_frequency }}
                </a>
              </div>
              <div class="media-body align-self-center">
                <h5>Interest Rate</h5>
                <a>
                  {{ $loanproduct->interest_rate }}
                </a>
              </div>

              <div class="media-body align-self-center">
                <h5>Penalty Rate</h5>
                <a>
                  {{ $loanproduct->penalty_rate }}
                </a>
              </div>
              {{-- <div class="pl-20">
                <span class="status status-lg status-online"></span>
              </div> --}}
            </div>
            <hr>
          </li>
          @endforeach
        </ul>
      @endsection
