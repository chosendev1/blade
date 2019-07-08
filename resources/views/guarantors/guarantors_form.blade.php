@extends('layouts.partials.main-forms')
@include('layouts.partials.page-header',
			['header' => 'Guarantors',
			 'form_title' => 'Guarantor Registration'
			])
    @section('create-form')
        <form autocomplete="off">
	        <div class="row">
	            <div class="form-group form-material col-md-4">
		            <label class="form-control-label" for="inputBasicFirstName">
		            	Name of Guarantor
		        	</label>
		            <input type="text" class="form-control" name="name_of_guarantor"
		            autocomplete="off" />
	            </div>
	            <div class="form-group form-material col-md-4">
		            <label class="form-control-label" for="inputBasicLastName">
		            	Relationship to Applicant
		        	</label>
		            <input type="text" class="form-control" name="relationship_to_applicant"
		             autocomplete="off" />
	            </div>
	            <div class="form-group form-material col-md-4">
		            <label class="form-control-label" for="inputBasicLastName">
		            	Nationality
		            </label>
		            <input type="text" class="form-control" name="nationality" required
		             autocomplete="off" />
	          	</div>
	        </div>
          	<div class="row">
	            <div class="form-group form-material col-md-4">
	              <label class="form-control-label">Gender</label>
	              <div>
	                <div class="radio-custom radio-default radio-inline">
	                  <input type="radio" id="inputBasicMale" name="inputGender" />
	                  <label for="inputBasicMale">Male</label>
	                </div>
	                <div class="radio-custom radio-default radio-inline">
	                  <input type="radio" id="inputBasicFemale" name="inputGender" checked />
	                  <label for="inputBasicFemale">Female</label>
	                </div>
	              </div>
	            </div>
	            <div class="form-group form-material col-md-4">
		            <label class="form-control-label" for="inputBasicLastName">
		            	Date of Birth
		           	</label>
		            <input type="text" class="form-control" id="inputBasicLastName" name="inputLastName"
		            autocomplete="off" />
	            </div>
	          	<div class="form-group form-material col-md-4">
		            <label class="form-control-label" for="inputBasicEmail">
		            	Physical Address
		            </label>
	            <input type="email" class="form-control" id="inputBasicEmail" name="inputEmail"
	              autocomplete="off" />
	        	</div>
            </div>
            <div class="row">
            	<div class="form-group form-material col-md-4">
		            <label class="form-control-label" for="inputBasicEmail">
		            	Phone Number
		            </label>
		            <input type="email" class="form-control" id="inputBasicEmail" name="inputEmail"
		              autocomplete="off" />
	          	</div>
	          	<div class="form-group form-material col-md-4">
		            <label class="form-control-label" for="inputBasicEmail">
		            	Phone Number 2
		            </label>
		            <input type="email" class="form-control" id="inputBasicEmail" name="inputEmail"
		              autocomplete="off" />
	          	</div>
	          	<div class="form-group form-material col-md-4">
		            <label class="form-control-label" for="inputBasicEmail">
		            	Email Address
		            </label>
		            <input type="email" class="form-control" id="inputBasicEmail" name="inputEmail"
		              autocomplete="off" />
	          	</div>
            </div>
          	<div class="form-group form-material">
            	<button type="button" class="btn btn-primary">Save</button>
          	</div>
        </form>
	@endsection
