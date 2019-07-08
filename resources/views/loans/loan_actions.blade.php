  @extends('layouts.partials.master')
  @section('content')
    {{-- @yield('page-header') --}}
      <div class="page-content">
        <!-- Panel -->
        <div class="panel">
          <div class="panel-body">

            <div class="nav-tabs-horizontal nav-tabs-animate" data-plugin="tabs">
              @yield('tabs_headers')
              <div class="tab-content">
                @yield('tabs_content')
              </div>
            </div>
          </div>
        </div>
        <!-- End Panel -->
      </div>
  @endsection
