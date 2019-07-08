
    @extends('layouts.master')

        @section ('content')
        <div class="card">
          <div class="card-header">
            Payments For:
            <a href="#" class="nav-link">
              @foreach($customer as $applicant)
               {{ $applicant->name_of_applicant }}
              @endforeach            
            </a>
            Loan Product:
            <a href="#" class="nav-link">
            @foreach($loan_product as $loan_type)
                {{ $loan_type->product_name }}
              @endforeach
            </a>
            Loan Number:
            <a href="#" class="nav-link">
            @foreach($loan_product as $loan_type)
                {{ $loan_type->id }}
              @endforeach
            </a> 
          </div>
          <div class="card-body">
         @include('layouts.errors')
      
          <div class="row">
            <div class="col-md-5">
                <div class="card-body">
                  <div class="small text-muted"><u>Payments</u></div>
                  <p>
                  <div class="table-responsive">
                    <table class="table card-table text-nowrap">
                    <thead>
                      <tr>
                        <th class="">Date</th>
                        <th class="text-center">Principal</th>
                        <th class="text-center">Interest</th>
                        <th class="text-center">Penalty</th>
                        <th class="">Total</th>                          
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($payments as $payment)
                      <tr>
                        <td>
                            {{ $payment->payment_date}}
                        </td>
                        <td class="text-center">
                            {{ $payment->principal_paid }}
                        </td>
                        <td class="text-center">
                          {{ $payment->interest_paid}}
                        </td>
                        <td class="text-center">
                          {{ $payment->penalty_paid }}
                        </td>
                        <td class="text-center">
                          {{ $payment->principle_paid+$payment->interest_paid+$payment->penalty_paid }}
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                    </table>
                  </div>
                </div>
            </div>

            <div class="col-md-4">
              @include('payments.manual_payment_method')
            </div>   
            <div class="col-md-3">
               @include('payments.automatic_payment_method')
            </div>                           
          </div>
        </div>
      </div> 
      @include('payments.loan_ledger') 
      @include('payments.outstanding_balance_report')
      @include('payments.individual_arrears_report')
      @include('payments.schedule')

     @endsection
      


    
