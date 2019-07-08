@extends('layouts.partials.lists.main-list')
@include('layouts.partials.lists.list-header',
      ['header' => 'Company',
     // 'list_title' => 'Registered Customers'
      ])
    @section('create-list')
        <ul class="list-group list-group-full">
          <li class="list-group-item">
            <div class="media">
              <div class="media-body">
                <h4 class="example-title">Company Details</h4>
              </div>
            </div>
            <hr>
          </li>
          @foreach($companies as $company)
          <li class="list-group-item">
            <div class="media">
              <!-- <div class="pr-20">
                <a class="avatar" href="javascript:void(0)">
                  <img class="img-fluid" src="../../../global/portraits/1.jpg"
                    alt="...">
                </a>
              </div> -->
              <div class="media-body">
                <h4 class="mt-0 mb-4">{{ $company->company_name }}</h4>
                <a>{{ $company->physical_address }}</a>
              </div>
              <!-- <div class="pl-20">
                <span class="status status-lg status-online"></span>
              </div> -->
            </div>
          </li>
          @endforeach
        </ul>
      @endsection
