@extends('layouts.partials.main-table')
@include('layouts.partials.table-header',
      ['header' => 'Reports',
       'table_title' => 'Outstanding Balance Report'
      ])
    @section('make-table')
          <!-- <p>Add<code>.table-bordered</code>for borders on all sides of the
            table and cells.</p> -->
          <div class="example table-responsive">
            <table class="table table-bordered">
              <thead>
              <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Loan Product</th>
                <th>Princ-Paid</th>
                <th>Int-Paid</th>
                <th>Total-Paid</th>
                <th>Princ-Bal</th>
                <th>Int-Bal</th>
                <th>Total-Bal</th>
                <th>Last Date of Payment Date</th>
              </tr>
            </thead>
            <tbody>
             @foreach($loans as $loan)
              <tr>
                  <td>1</td>
                  <td>
                    {{ $loan->customer->name_of_applicant }}
                  </td>
                  <td>
                    {{ $loan->loan_product->product_name}}
                  </td>
                  <td>
                    {{ $loan->loanOutstandingBalanceReport()
                      ['total_principal_paid'] }}
                  </td>
                  <td>
                    {{ $loan->loanOutstandingBalanceReport()
                      ['total_interest_paid'] }}
                  </td>
                  <td>
                    {{ $loan->loanOutstandingBalanceReport()
                      ['total_amount_paid'] }}
                  </td>
                  <td>
                    {{ $loan->loanOutstandingBalanceReport()
                      ['principal_balance'] }}
                  </td>
                  <td>
                    {{ $loan->loanOutstandingBalanceReport()
                      ['interest_balance'] }}
                  </td>
                  <td>
                    {{ $loan->loanOutstandingBalanceReport()
                      ['total_balance'] }}
                  </td>
                  <td>
                    {{ $loan->loanOutstandingBalanceReport()
                      ['last_payment_date'] }}
                  </td>
                </tr>
            @endforeach
            </tbody>
            </table>
          </div>
    @endsection
