@extends('layouts.partials.main-forms')
	@include('layouts.partials.page-header',
			['header' => 'Loan Products',
			 'form_title' => 'Loan Product Registration'
			])
    @section('create-form')
    <form method="POST" action="/loan-product">
      		{{ csrf_field() }}
	       <div class="form-group form-material">
          <label class="form-control-label">Product Name</label>
          <span class="required">*</span>
          <input type="text" class="form-control" name="product_name"/>
          </div>
          <div class="row">
            <div class="form-group form-material col-md-6">
            <label class="form-control-label">Interest Method</label>
            <span class="required">*</span>
            <select class="form-control" name="interest_method" >
              <option value=" ">
                -- choose --
              </option>
              <option value="flat">
                Flat
              </option>
              <option value="declining balance">
                Declining Balance
              </option>
            </select>
            </div>
            <div class="form-group form-material col-md-6">
            <label class="form-control-label">Payment Frequency</label>
            <span class="required">*</span>
            <input type="text" class="form-control" name="payment_frequency"/>
            </div>
          </div>
          <div class="row">
            <div class="form-group form-material col-md-6">
            <label class="form-control-label">Interest Rate</label>
            <span class="required">*</span>
            <input type="text" class="form-control" name="interest_rate"/>
            </div>
            <div class="form-group form-material col-md-6">
              <label class="form-control-label">Penalty Rate</label>
              <span class="required">*</span>
              <input type="text" class="form-control" name="penalty_rate" />
            </div>
          </div>
          <div class="form-group form-material">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
	@endsection
