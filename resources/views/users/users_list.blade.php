@extends('layouts.partials.lists.main-list')
@include('layouts.partials.lists.list-header',
      ['header' => 'Users',
     // 'list_title' => 'Registered Users'
      ])
    @section('create-list')
        <ul class="list-group list-group-full">
          <li class="list-group-item">
            <div class="media">
              <div class="media-body">
                <h4 class="example-title">Registered Users</h4>
              </div>
            <div class="pl-20">
              <form method="GET" action="/users/register">
                <button type="submit" class="btn btn-success btn-sm ladda-button" data-style="expand-left"
                  data-plugin="ladda"><i class="icon md-plus" aria-hidden="true"></i>
                  Add New
                </button>
              </form>
            </div>
            </div>
            <hr>
          </li>
          @foreach($users as $user)
          <li class="list-group-item">
            <div class="media">
              <div class="media-body">
                <h4>{{ $user->full_name }}</h4>
                <p>
                <a>
                  <i class="icon icon-color md-account" aria-hidden="true"></i> 
                    {{ $user->username  }}      
                </a>
                </p>
                <p>
                  <a>
                    <i class="icon icon-color md-email" aria-hidden="true"></i> 
                      {{ $user->email }}        
                  </a>
                </p>
              </div>
            </div>
            <hr>
          </li>
          @endforeach
        </ul>
      @endsection
