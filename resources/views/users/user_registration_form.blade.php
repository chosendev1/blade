@extends('layouts.partials.main-forms')
@include('layouts.partials.page-header',
			['header' => 'Users',
			 'form_title' => 'User Registration'
			])
    @section('create-form')
        <form class="card" method="POST" action="/users">
      		{{ csrf_field() }}
	        <div class="row">
	        	<div class="col-md-12">
                @if ($flash=session('message'))
                    <div class="alert alert-success" role="alert">
                      {{ $flash }}
                    </div>
                @endif 
            	</div>
	            <div class="form-group form-material col-md-4">
		            <label class="form-control-label">
		            	User Full Names
		        	</label>
		            <input type="text" class="form-control" name="full_name" required/>
	            </div>
	            <div class="form-group form-material col-md-4">
		            <label class="form-control-label">
		            	User Email
		            </label>
		            <input type="text" class="form-control" name="email" required/>
	            </div>
	        </div>
            <div class="row">
	          	<div class="form-group form-material col-md-4">
		            <label class="form-control-label">
		            	Username
		            </label>
		            <input type="text" class="form-control" name="username" required/>
	          	</div>
	          	<div class="form-group form-material col-md-4">
		            <label class="form-control-label">
		            	Password
		            </label>
		            <input type="password" class="form-control" name="password" required/>
	          	</div>
            </div>
            <div class="row">
	            <div class="form-group form-material col-md-4">
		            <label class="form-control-label">
		            	Comfirm Password
		        	</label>
		            <input type="password" class="form-control" name="password_confirmation" required/>
	            </div>
          	</div>
          	<div class="row">
          	<div class="form-group form-material col-md-4">
            	<button type="submit" class="btn btn-success btn-block">Save</button>
          	</div>
          	</div>
        </form>
	@endsection
