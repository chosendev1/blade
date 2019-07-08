@extends('layouts.partials.master-body')
    @section('content')
    {{-- <div class='row'>
    <div class='col-md-6'> --}}
    @yield('page-header')
	{{-- </div>
    <div class='col-md-6 text-right'>
    @yield('add-new')
    </div>
    </div> --}}
		<div class="page-content">
			<div class="panel">
				<div class="panel-body container-fluid">
				    <div class="row row-lg">
				      	<div class="col-md-12">
				      		<p>
						        @if ($flash=session('message'))
						            <div class="alert alert-success" role="alert">
						                {{ $flash }}
						            </div>
						        @endif 
						    </p>
					        <div class="example-wrap m-lg-0">
								@yield('create-list')
					        </div>
				    	</div>
					</div>
				</div>
			</div>
		</div>
	@endsection	
