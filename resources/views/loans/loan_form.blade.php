@extends('layouts.partials.main-forms')
	@include('layouts.partials.page-header',
			['header' => 'Loans',
			 'form_title' => 'Loan Application for - '.$customer['name_of_applicant']
			])
    @section('create-form')
   {{--  @include('layouts.partials.errors') --}}
    	<form method="POST" action="/loan-application">
      		{{ csrf_field() }}
        <input type="hidden" name="customer_id" value="{{ $customer['id'] }}" />
	       <div class="form-group form-material">
          <label class="form-control-label">Branch</label>
          <span class="required">*</span>
            <select class="form-control" name="branch_id" >
              <option value=" ">-- choose -- </option>
                @foreach($branches as $branch)
                  <option value={{ $branch->id }}>
                    {{ $branch->branch_name }}
                  </option>
                @endforeach
            </select>
          </div>
          <div class="row">
            <div class="form-group form-material col-md-6">
            <label class="form-control-label">Loan Product</label>
            <span class="required">*</span>
              <select class="form-control" name="loan_product_id" >
                <option value=" ">-- choose -- </option>
                  @foreach($loan_products as $product)
                    <option value={{ $product->id }}>
                      {{ $product->product_name }}
                    </option>
                  @endforeach
              </select>
            </div>
            <div class="form-group form-material col-md-6">
            <label class="form-control-label">Amount Applied</label>
            <span class="required">*</span>
            <input type="text" class="form-control" name="amount_applied"/>
            </div>
          </div>
          <div class="row">
            <div class="form-group form-material col-md-6">
            <label class="form-control-label">Loan Period (based on frequency)</label>
            <span class="required">*</span>
            <input type="text" class="form-control" name="loan_period"/>
            </div>
            <div class="form-group form-material col-md-4">
              <label class="form-control-label">Application Date</label>
              <span class="required">*</span>
              <input type="date" class="form-control" name="loan_application_date" />
            </div>
          </div>
          <div class="form-group form-material">
            <button type="submit" class="btn btn-success">Save</button>
          </div>
        </form>
	@endsection
