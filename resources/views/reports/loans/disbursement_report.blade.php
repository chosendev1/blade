@extends('layouts.partials.main-table')
@include('layouts.partials.table-header',
      ['header' => 'Reports',
       'table_title' => 'Disbursement Report'
      ])
    @section('make-table')
          <!-- <p>Add<code>.table-bordered</code>for borders on all sides of the
            table and cells.</p> -->
          <div class="example table-responsive">
            <table class="table table-bordered">
              <thead>
              <tr>
                {{-- <th>#</th> --}}
                <th>Loan</th>
                <th>Customer</th>
                <th>Loan Product</th>
                <th>Disbursement Date</th>
                <th>Disbursed Amount</th>
                <th>Loan Period</th>
                <th>Branch</th>
              </tr>
            </thead>
            <tbody>
             @foreach($loans as $loan)
              <tr>
                {{-- <td> 1 </td> --}}
                <td>
                    {{ $loan->loan_application->id }}
                </td>
                <td>
                    {{ $loan->loan_application->customer->name_of_applicant }}
                </td>
                <td>
                    {{ $loan->loan_application->loan_product->product_name }}
                </td>
                <td>
                    {{ $loan->disbursement->disbursement_date}}
                </td>
                <td>
                    {{ $loan->approval->amount_approved}}
                </td>
                <td>
                    {{ $loan->loan_application->loan_period }}
                </td>
                <td>
                    {{ $loan->loan_application->branch->branch_name }}
                </td>
              </tr>
            @endforeach
            </tbody>
            </table>
          </div>
    @endsection
