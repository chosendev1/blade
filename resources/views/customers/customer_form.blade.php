@extends('layouts.partials.main-forms')
@include('layouts.partials.page-header',
			['header' => 'Customers',
			 'form_title' => 'Customer Registration'
			])
    @section('create-form')
    	{{-- @include('layouts.partials.errors') --}}
        <form class="card" method="POST" action="/customers">
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
		            	Name of Applicant
		        	</label>
		            <input type="text" class="form-control" name="name_of_applicant" />
	            </div>
	            <div class="form-group form-material col-md-4">
		            <label class="form-control-label">
		            	Branch
		        	</label>
		        	<select class="form-control" name="branch_id" >
		        	  <option value=" ">
                        -- choose --
                      </option>
                      @foreach($branches as $branch)
                      <option value={{ $branch->id }}>
                        {{ $branch->branch_name }}
                      </option>
                    @endforeach
                    </select>
	            </div>
	            <div class="form-group form-material col-md-4">
		            <label class="form-control-label">
		            	Applicant Number
		            </label>
		            <input type="text" class="form-control" name="member_number" />
	            </div>
	        </div>
          	<div class="row">
	            <div class="form-group form-material col-md-4">
	              <label class="form-control-label">Gender</label>
	              <div>
	                <div class="radio-custom radio-default radio-inline">
	                  <input type="radio" name="gender" value="Male" />
	                  <label>Male</label>
	                </div>
	                <div class="radio-custom radio-default radio-inline">
	                  <input type="radio" name="gender" value="Female" />
	                  <label>Female</label>
	                </div>
	              </div>
	            </div>
	            <div class="form-group form-material col-md-4">
		            <label class="form-control-label">
		           		Maritual Status
		            </label>
		            <input type="text" class="form-control" name="maritual_status" required />
	            </div>
	            <div class="form-group form-material col-md-4">
		            <label class="form-control-label">
		            	Nationality
		            </label>
		            <input type="text" class="form-control" name="nationality" />
	          	</div>
            </div>
            <div class="row">
	            <div class="form-group form-material col-md-4">
		            <label class="form-control-label">
		            	Date of Birth
		           	</label>
		            <input class="form-control" type="date" name="date_of_birth" />
	            </div>
	          	<div class="form-group form-material col-md-4">
		            <label class="form-control-label">
		            	Phone Number
		            </label>
		            <input type="text" class="form-control" name="phone_number" />
	          	</div>
	          	<div class="form-group form-material col-md-4">
		            <label class="form-control-label">
		            	Email Address
		            </label>
		            <input type="email" class="form-control" name="email_address" />
	          	</div>
            </div>
            <div class="row">
	            <div class="form-group form-material col-md-4">
		            <label class="form-control-label">
		            	Country
		        	</label>
		            <input type="text" class="form-control" name="country" />
	            </div>
		        <div class="form-group form-material col-md-4">
		            <label class="form-control-label">
		            	District or City
		            </label>
		            <input type="text" class="form-control" name="district_city" />
		        </div>
	            <div class="form-group form-material col-md-4">
		            <label class="form-control-label">
		            	Physical Address
		            </label>
	            <input type="text" class="form-control" name="physical_address" />
	        	</div>
          	</div>
          	<div class="row">
	            <div class="form-group form-material col-md-4">
		            <label class="form-control-label">
		            	Next of Kin Name
		            </label>
		            <input type="text" class="form-control" name="next_of_kin" />
	            </div>
	          	<div class="form-group form-material col-md-4">
		            <label class="form-control-label">
		            	Next of Kin`s Phone Number
		        	</label>
		            <input type="text" class="form-control" name="next_of_kin_phone_number" />
	          	</div>
          	</div>
          	<div class="row">
          	<div class="form-group form-material col-md-4">
            	<button type="submit" class="btn btn-success btn-block">Save</button>
          	</div>
          	</div>
        </form>
	@endsection
