@extends('layouts.partials.lists.main-list')
@include('layouts.partials.lists.list-header',
      ['header' => 'Branches',
     // 'list_title' => 'Registered Customers'
      ])
    @section('create-list')
        <ul class="list-group list-group-full">
          <li class="list-group-item">
            <div class="media">
              <div class="media-body">
                <h4 class="example-title">Branches</h4>
              </div>
            <div class="pl-20">
              <form method="GET" action="/branch">
                <button type="submit" class="btn btn-success btn-sm ladda-button" data-style="expand-left"
                  data-plugin="ladda"><i class="icon md-plus" aria-hidden="true"></i>
                  Add New
                </button>
              </form>
            </div>
            </div>
            <hr>
          </li>
          @foreach($branches as $branch)
          <li class="list-group-item">
            <div class="media">
              <!-- <div class="pr-20">
                <a class="avatar" href="javascript:void(0)">
                  <img class="img-fluid" src="../../../global/portraits/1.jpg"
                    alt="...">
                </a>
              </div> -->
              <div class="media-body">
                <h5 class="mt-0 mb-5">{{ $branch->branch_name }}</h5>
                <small>{{ $branch->id }}</small>
              </div>
              <!-- <div class="pl-20">
                <span class="status status-lg status-online"></span>
              </div> -->
            </div>
            <hr>
          </li>
          @endforeach
        </ul>
      @endsection
