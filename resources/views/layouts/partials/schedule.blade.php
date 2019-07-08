@extends('layouts.partials.master-body')
    @section('content')
    <div class="page-header">
    	<h1 class="page-title">Schedule</h1>
    </div>
		<div class="page-content">
		<div class="panel">
          <div class="panel-body container-fluid">
            <div class="row">
              <div class="col-lg-3">
                <h3>
                  <img class="mr-10" src="../../assets//images/logo-colored.png"
                    alt="...">Remark</h3>
                <address>
                  795 Folsom Ave, Suite 600
                  <br> San Francisco, CA, 94107
                  <br>
                  <abbr title="Mail">E-mail:</abbr>&nbsp;&nbsp;example@google.com
                  <br>
                  <abbr title="Phone">Phone:</abbr>&nbsp;&nbsp;(123) 456-7890
                  <br>
                  <abbr title="Fax">Fax:</abbr>&nbsp;&nbsp;800-692-7753
                </address>
              </div>
              <div class="col-lg-3 offset-lg-6 text-right">
                <h4>Invoice Info</h4>
                <p>
                  <a class="font-size-20" href="javascript:void(0)">#5669626</a>
                  <br> To:
                  <br>
                  <span class="font-size-20">Machi</span>
                </p>
                <address>
                  795 Folsom Ave, Suite 600
                  <br> San Francisco, CA, 94107
                  <br>
                  <abbr title="Phone">P:</abbr>&nbsp;&nbsp;(123) 456-7890
                  <br>
                </address>
                <span>Invoice Date: January 20, 2017</span>
                <br>
                <span>Due Date: January 22, 2017</span>
              </div>
            </div>

            <div class="page-invoice-table table-responsive">
              <table class="table table-hover table-bordered text-right">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Date</th>
                    <th class="text-right">Principal</th>
                    <th class="text-right">Interest</th>
                    <th class="text-right">Installment</th>
                    <th class="text-right">Balance</th>
                  </tr>
                </thead>
                <tbody>    
			        @foreach($loan->schedule() as $installment)
			        <tr>
			      <th class="text-center">{{ $installment['installment_number'] }}</th>
			            <td class="text-center">{{ $installment['due_date'] }}</td>
			            <td>{{ $installment['principal'] }}</td>
			            <td>{{ $installment['interest'] }}</td>
			            <td>{{ $installment['installment'] }}</td>
			            <td>{{ $installment['balance'] }}</td>
			        </tr>
			        @endforeach
			        </tbody>
              	</table>
            </div>
            <div class="text-right clearfix">
              <div class="float-right">
                <p>Sub - Total amount:
                  <span>$4800</span>
                </p>
                <p>VAT:
                  <span>$35</span>
                </p>
                <p class="page-invoice-amount">Grand Total:
                  <span>$4835</span>
                </p>
              </div>
            </div>

            <div class="text-right">
              <button type="submit" class="btn btn-animate btn-animate-side btn-primary">
                <span><i class="icon md-shopping-cart" aria-hidden="true"></i> Proceed
                  to payment</span>
              </button>
              <button type="button" class="btn btn-animate btn-animate-side btn-info" onclick="javascript:window.print();">
                <span><i class="icon md-print" aria-hidden="true"></i> Print</span>
              </button>
            </div>
          </div>
        </div>
		</div>
	@endsection	
