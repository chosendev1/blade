@extends('layouts.partials.lists.main-list')
@include('layouts.partials.lists.list-header',
      ['header' => 'Loans'])
    @section('create-list')
        <div class="card">
                <div class="card-header card-header-transparent card-header-bordered">
                   <h4 class="example-title">Applied Loans</h4>
                </div>
                <div class="card-block">
         @foreach($loan_applications as $loan)
        <nav class="navbar navbar-default navbar-mega">
              <div class="container-fluid">
                @include('layouts.partials.lists.list-navbar-header',
                  ['header' => $loan->customer->name_of_applicant ])
                <div class="navbar-collapse collapse" id="navbar-collapse-2">
                  <ul class="nav navbar-toolbar">
                    <li class="nav-item dropdown dropdown-mega"><span class="nav-link"
                        >{{ $loan->customer->member_number }}</span>
                    </li>
                    <li class="nav-item dropdown dropdown-mega"><span class="nav-link"
                        >{{ $loan->loan_product->product_name }}</span>
                    </li>
                    <li class="nav-item dropdown dropdown-fw dropdown-mega"><span class="nav-link"
                        >{{ $loan->amount_applied }}</span>
                    </li>
                    <li class="nav-item dropdown dropdown-mega"><span class="nav-link"
                        >{{ $loan->loan_Period }}</span>
                     
                    </li>
                    <li class="nav-item dropdown dropdown-mega"><span class="nav-link"
                        >{{ $loan->loan_application_date }}</span>
                     
                    </li>
                  </ul>
                  <ul class="nav navbar-toolbar navbar-right">
                    <li class="nav-item dropdown dropdown-mega"><a class="nav-link" href="#">Add Guarantor</a>
                     
                    </li>
                    @include('loans.collateral_form')
                  </ul>
                </div>
              </div>
            </nav>
            <br>
        @endforeach
      </div></div>
      @endsection
