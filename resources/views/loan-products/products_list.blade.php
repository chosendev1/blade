@extends('layouts.partials.lists.main-list')
@include('layouts.partials.lists.list-header',
      ['header' => 'Loans',
     // 'list_title' => 'Registered Customers'
      ])
    @section('add-new')
    <div class="page-header">
      <button type="button" class="btn btn-success btn-sm ladda-button" data-style="expand-left"
        data-plugin="ladda"><i class="icon md-plus" aria-hidden="true"></i>
        Add New
      </button>
    </div>
    @endsection
    @section('create-list')
        <ul class="list-group list-group-full">
          @foreach($loans as $loan)
          <li class="list-group-item">
            <div class="media">
              <!-- <div class="pr-20">
                <a class="avatar" href="javascript:void(0)">
                  <img class="img-fluid" src="../../../global/portraits/1.jpg"
                    alt="...">
                </a>
              </div> -->
              <div class="media-body">
                <h5 class="mt-0 mb-5">{{ $loan->amount_applied }}</h5>
                <small>{{ $loan->id }}</small>
              </div>
              <div class="pl-20">
                <span class="status status-lg status-online"></span>
              </div>
            </div>
            <hr>
          </li>
          @endforeach
        </ul>
      @endsection
