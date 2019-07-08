@extends('layouts.partials.main-table')
@include('layouts.partials.table-header',
      ['header' => 'Reports',
       'table_title' => 'Due Payments Report'
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
                <th>Princ-Due</th>
                <th>Int-Due</th>
                <th>Total-Due</th>
              </tr>
            </thead>
            <tbody>
             @foreach($loans as $loan)
             {{-- {{ dd($loan->loanDuePaymentsReport()) }} --}}
              <tr>
                  <td>1</td>
                  <td>
                    {{ $loan->customer->name_of_applicant }}
                  </td>
                  <td>
                    {{ $loan->loan_product->product_name}}
                  </td>
                  <td>
                    {{ $loan->loanDuePaymentsReport()
                      ['total_principal_due'] }}
                  </td>
                  <td>
                    {{ $loan->loanDuePaymentsReport()
                      ['total_interest_due'] }}
                  </td>
                  <td>
                    {{ $loan->loanDuePaymentsReport()
                      ['total_amount_due'] }}
                  </td>
                </tr>
            @endforeach
            </tbody>
            </table>
          </div>
    @endsection
