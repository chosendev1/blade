@extends('layouts.partials.main-table')
@include('layouts.partials.table-header',
      ['header' => 'Reports',
       'table_title' => 'Loans Application Report'
      ])
    @section('make-table')
          <!-- <p>Add<code>.table-bordered</code>for borders on all sides of the
            table and cells.</p> -->
          <div class="example table-responsive">
            <table class="table table-bordered">
              <thead>
              <tr>
                <th>#</th>
                <th>Loan</th>
                <th>Customer</th>
                <th>Loan Product</th>
                <th>Application Date</th>
                <th>Applied Amount</th>
                <th>Loan Period</th>
                <th>Branch</th>
              </tr>
            </thead>
            <tbody>
             @foreach($loans as $loan)
              <tr>
                <td> 1 </td>
                <td>
                    {{ $loan->id }}
                </td>
                <td>
                    {{ $loan->customer->name_of_applicant }}
                </td>
                <td>
                    {{ $loan->loan_product->product_name }}
                </td>
                <td>
                    {{ $loan->loan_application_date}}
                </td>
                <td>
                    {{ $loan->amount_applied }}
                </td>
                <td>
                    {{ $loan->loan_period }}
                </td>
                <td>
                    {{ $loan->branch->branch_name }}
                </td>
              </tr>
            @endforeach
            </tbody>
            </table>
          </div>
    @endsection
