@extends('layouts.partials.main-forms')
	@include('layouts.partials.page-header',
			['header' => 'Branch',
			 'form_title' => 'Branch Registration'
			])
    @section('create-form')
    	<form method="POST" action="/branch">
      		{{ csrf_field() }}
	      <div class="form-group form-material">
	        <label class="form-control-label">Branch Name</label>
	        <span class="required">*</span>
	        <input type="text" class="form-control" name="branch_name" required/>
	      </div>
	      <div class="row">
	        <div class="form-group form-material col-md-4">
	          <label class="form-control-label">Country</label>
	          <span class="required">*</span>
	          <input type="text" class="form-control" name="country" required/>
	        </div>
	        <div class="form-group form-material col-md-4">
	          <label class="form-control-label">District or City</label>
	          <span class="required">*</span>
	          <input type="text" class="form-control" name="district_city" required/>
	        </div>
	        <div class="form-group form-material col-md-4">
	        <label class="form-control-label">Physical Address</label>
	        <span class="required">*</span>
	        <input type="text" class="form-control" name="physical_address" required/>
	        </div>
	       </div>
	       <div class="row">
	          <div class="form-group form-material col-md-4">
	            <label class="form-control-label">Contact Person</label>
	            <span class="required">*</span>
	            <input type="text" class="form-control" name="contact_person" required/>
	          </div>
	          <div class="form-group form-material col-md-4">
	          <label class="form-control-label">Contact Person Position</label>
	          <span class="required">*</span>
	          <input type="text" class="form-control" name="contact_person_position"
	          required/>
	          </div>
	          <div class="form-group form-material col-md-4">
	            <label class="form-control-label">Contact`s Phone Number</label>
	            <span class="required">*</span>
	            <input type="text" class="form-control" name="contact_phone_number"
	            required/>
	          </div>
	        </div>
	      <div class="form-group form-material">
	        <button type="submit" class="btn btn-success">Save</button>
	      </div>
	    </form>
	@endsection
