<div class="card">
        <div class="card-header">
          Ledger
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table card-table text-nowrap">
            <thead>
              {{-- <tr> this is for the ledger
                <th class="">Date</th>
                <th class="text-center">Receipt No.</th>
                <th class="text-center">Cheque No.</th>
                <th class="text-center">Total-Paid</th>
                <th class="">Princ-Paid</th>
                <th class="text-center">Int-Paid</th>
                <th class="">Penalty-Paid</th>
                <th class="">Princ-Bal</th>
                <th class="text-center">Int-Bal</th>
                <th class="">Penalty-Bal</th>
              </tr> --}}
              <tr>
                <th class="">Date</th>
                <th class="">Princ-Paid</th>
                <th class="text-center">Int-Paid</th>
                <th class="text-center">Total-Paid</th>
                <th class="">Princ-Bal</th>
                <th class="text-center">Int-Bal</th>
                <th class="">Total-Bal</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <td>
                    {{ $balance['last_payment_date']}}
                  </td>
                  <td class="text-center">
                    {{ $balance['total_principal_paid'] }}
                  </td>
                  <td class="text-center">
                    {{ $balance['total_interest_paid']}}
                  </td>
                  <td class="text-center">
                    {{ $balance['total_amount_paid'] }}
                  </td>
                  <td class="text-center">
                    {{ $balance['principal_balance'] }}
                  </td>
                  <td class="text-center">
                    {{ $balance['interest_balance']}}
                  </td>
                  <td class="text-center">
                    {{ $balance['total_balance'] }}
                  </td>
                </tr>
            </tbody>
            </table>
            <hr>
          </div>
        </div>
      </div>
