@extends('layouts.partials.lists.main-list')
@include('layouts.partials.lists.list-header',
      ['header' => 'Customers',
     // 'list_title' => 'Registered Customers'
      ])
    {{-- @section('add-new')
    <div class="page-header">
      <button type="button" class="btn btn-success btn-sm ladda-button" data-style="expand-left"
        data-plugin="ladda"><i class="icon md-plus" aria-hidden="true"></i>
        Add New
      </button>
    </div>
    @endsection --}}
    @section('create-list')
        <ul class="list-group list-group-full">
          <li class="list-group-item">
            <div class="media">
              <div class="media-body">
                <h4 class="example-title">Customers</h4>
              </div>
            <div class="pl-20">
              <form method="GET" action="/customers/register">
                <button type="submit" class="btn btn-success btn-sm ladda-button" data-style="expand-left"
                  data-plugin="ladda"><i class="icon md-plus" aria-hidden="true"></i>
                  Add New
                </button>
              </form>
            </div>
            </div>
            <hr>
          </li>
          <li class="list-group-item">
            @include('customers.customer_search_form')
          </li>

          @foreach($customers as $customer)
          <li class="list-group-item">
            <div class="media">
              <!-- <div class="pr-20">
                <a class="avatar" href="javascript:void(0)">
                  <img class="img-fluid" src="../../../global/portraits/1.jpg"
                    alt="...">
                </a>
              </div> -->
              <div class="media-body">
                <h4>{{ $customer->name_of_applicant }}</h4>
                <a>
                  <i class="icon icon-color md-plus-square" aria-hidden="true"></i> 
                    {{ $customer->member_number  }}      
                </a>
              </div>
              <div class="media-body align-self-center">
                <p>
                  <a>
                    <i class="icon icon-color md-smartphone" aria-hidden="true"></i> 
                      {{ $customer->phone_number }}        
                  </a>
                </p>
                <p>
                  <a>
                    <i class="icon icon-color md-pin" aria-hidden="true"></i> 
                      {{ $customer->physical_address }}      
                  </a>
                </p>
              </div>
              <div class="media-body align-self-center">
                <p>
                  @if($customer->gender == 'Male')
                    <a>
                      <i class="icon icon-color md-male" aria-hidden="true"></i> 
                        {{ $customer->gender }}      
                    </a>
                  @endif
                  @if($customer->gender == 'Female')
                    <a>
                      <i class="icon icon-color md-female" aria-hidden="true"></i> 
                        {{ $customer->gender }}      
                    </a>
                  @endif
                <p>
                <p>
                  <a class="text-action" href="javascript:void(0)">
                    <i class="icon icon-color md-navigation" aria-hidden="true"></i>
                    {{ $customer->branch->branch_name }} 
                  </a>
                </p>
              </div>
              <div class="pl-0 pl-sm-20 mt-15 mt-sm-0 align-self-center">
                <form method="GET" action="/loan-applications/{{ $customer->id }}/apply">
                <button type="submit" class="btn btn-primary btn-sm">
                  Loan Application
                </button>
                </form>
              </div>
            </div>
            <hr>
          </li>
          @endforeach
        </ul>
      @endsection
