@extends('layouts.partials.main-forms')
	@include('layouts.partials.page-header',
			['header' => 'Loan Application',
			 'form_title' => 'Loan Details'
			])
    @section('create-form')
    	<form autocomplete="off">
	        <div class="form-group form-material">
	          	<label class="form-control-label">Branch</label>
	          	<span class="required">*</span>
	          	<input type="text" class="form-control" name="company_name"/>
	        </div>
	        <div class="row">
	            <div class="form-group form-material col-md-6">
	            <label class="form-control-label">Loan Product</label>
	            <span class="required">*</span>
	            <input type="text" class="form-control" name="date_established"/>
	            </div>
	            <div class="form-group form-material col-md-6">
	            <label class="form-control-label">Amount Applied</label>
	            <span class="required">*</span>
	            <input type="text" class="form-control" name="telephone_number"/>
	            </div>
	        </div>
	        <div class="row">
	            <div class="form-group form-material col-md-6">
		            <label class="form-control-label">Loan Period In {frequency}</label>
		            <span class="required">*</span>
		            <input type="text" class="form-control" name="company_email"/>
	            </div>
	            <div class="form-group form-material col-md-6">
	              	<label class="form-control-label">Application Date</label>
	              	<span class="required">*</span>
	              	<input type="text" class="form-control" name="country" />
	            </div>
	        </div>
	          	<div class="form-group form-material">
	            	<button type="button" class="btn btn-primary">Save</button>
	          	</div>
	        </form>
    @endsection
