@extends('layouts.partials.main-table')
@include('layouts.partials.table-header',
      ['header' => 'Reports',
       'table_title' => 'Payments'
      ])
    @section('make-table')
          <!-- <p>Add<code>.table-bordered</code>for borders on all sides of the
            table and cells.</p> -->
          <div class="example table-responsive">
            <table class="table table-bordered">
              <thead>
                {{-- <th>#</th> --}}
                <th>Loan</th>
                <th>Customer</th>
                <th>Loan Product</th>
                <th>Payment Date</th>
                <th>Principal</th>
                <th>Interest</th>
                <th>Penalty</th>
                <th>Total</th>                          
            </thead>
            <tbody>
             @foreach($payments as $payment)
              <tr>
               <!--  <td>
                   1
               </td> -->
                <td>
                    {{ $payment->loan_application->id }}
                </td>
                <td>
                    {{ $payment->loan_application->customer->name_of_applicant }}
                </td>
                <td>
                    {{ $payment->loan_application->loan_product->product_name }}
                </td>
                <td>
                    {{ $payment->payment_date}}
                </td>
                <td>
                    {{ $payment->principal_paid }}
                </td>
                <td>
                  {{ $payment->interest_paid}}
                </td>
                <td>
                  {{ $payment->penalty_paid }}
                </td>
                <td>
                  {{ $payment->principle_paid+$payment->interest_paid+$payment->penalty_paid }}
                </td>
              </tr>
            @endforeach
            </tbody>
            </table>
          </div>
    @endsection
