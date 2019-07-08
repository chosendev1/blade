@extends('layouts.partials.lists.main-list')
@include('layouts.partials.lists.list-header',
      ['header' => 'Collaterals',
     // 'list_title' => 'Registered Customers'
      ])
    @section('create-list')
        <ul class="list-group list-group-full">
          <li class="list-group-item">
            <div class="media">
              <div class="media-body">
                <h4 class="example-title">Collaterals for {{ $loan->customer->name_of_applicant }}</h4>
                  <a>{{ $loan->loan_product->product_name }}</a>
                  <p><a>{{ $loan->amount_applied }}</a></p>
              </div>
            <div class="pl-20">
              <form method="GET" action="/loan/{{$loan}}/add-collaterals">
                <button type="submit" class="btn btn-success btn-sm ladda-button" data-style="expand-left"
                  data-plugin="ladda"><i class="icon md-plus" aria-hidden="true"></i>
                  Add New
                </button>
              </form>
            </div>
            </div>
            <hr>
          </li>
          @foreach($collaterals as $collateral)
          <li class="list-group-item">
            <div class="media">
              <!-- <div class="pr-20">
                <a class="avatar" href="javascript:void(0)">
                  <img class="img-fluid" src="../../../global/portraits/1.jpg"
                    alt="...">
                </a>
              </div> -->
              <div class="media-body">
                <h4 class="mt-0 mb-4">{{ $collateral->collateral_type }}</h5>
                <a>{{ $collateral->collateral_location }}</a>
              </div>
              <div class="pr-20">
                <h4 class="mt-0 mb-4">{{ $collateral->collateral_value }}</h5>
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
