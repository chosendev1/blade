@extends('layouts.partials.main-table')
@include('layouts.partials.table-header',
      ['header' => 'Reports',
       'table_title' => 'Arrears Report'
      ])
    @section('make-table')
          <!-- <p>Add<code>.table-bordered</code>for borders on all sides of the
            table and cells.</p> -->
          <div class="example table-responsive">
            <table class="table table-bordered">
              <thead>
                  {{-- <th>#</th> --}}
                  <th>Customer</th>
                  <th>Loan Product</th>
                  <th>Princ-Expected</th>
                  <th>Int-Expected</th>
                  <th>Total-Expected</th>
                  <th>Princ-Paid</th>
                  <th>Int-Paid</th>
                  <th>Total-Paid</th>
                  <th>Princ-Arrears</th>
                  <th>Int-Arrears</th>
                  <th>Total-Arrears</th>
                  <th>Last Payment Date</th>
            </thead>
            <tbody>
               @foreach($loans as $loan)
              <tr>
                {{-- <td>1</td> --}}
                <td>
                  {{ $loan->customer->name_of_applicant }}
                </td>
                <td>
                  {{ $loan->loan_product->product_name}}
                </td>
                <td class="">
                  {{ $loan->loanArrearsReport()['principal_expected'] }}
                </td>
                <td class="">
                  {{ $loan->loanArrearsReport()['interest_expected'] }}
                </td>
                <td>
                  {{ $loan->loanArrearsReport()['total_amount_expected'] }}
                </td>
                <td class="">
                  {{ $loan->loanArrearsReport()['principal_paid'] }}
                </td>
                <td class="">
                  {{ $loan->loanArrearsReport()['interest_paid'] }}
                </td>
                <td>
                  {{ $loan->loanArrearsReport()['total_amount_paid'] }}
                </td>
                <td class="">
                  {{ $loan->loanArrearsReport()['principal_arrears'] }}
                </td>
                <td class="">
                  {{ $loan->loanArrearsReport()['interest_arrears'] }}
                </td>
                <td class="">
                  {{ $loan->loanArrearsReport()['total_arreas'] }}
                </td>
                <td class="">
                  {{ $loan->loanArrearsReport()['last_payment_date'] }}
                </td>
              </tr>
            @endforeach
            </tbody>
            </table>
          </div>
    @endsection
