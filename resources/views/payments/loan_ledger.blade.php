<div class="card">
        <div class="card-header">
          Ledger
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table card-table text-nowrap">
            <thead>
              <tr>
                <th class="">Date</th>
                <th class="">Receipt No.</th>
                <th class="">Cheque No.</th>
                <th class="">Total-Paid</th>
                <th class="">Princ-Paid</th>
                <th class="">Int-Paid</th>
                <th class="">Penalty-Paid</th>
                <th class="">Princ-Bal</th>
                <th class="">Int-Bal</th>
                <th class="">Penalty-Bal</th>
              </tr> 
            </thead>
            <tbody>
              @foreach($ledger as $payment)
                <tr>
                  <td>
                    {{ $payment['payment_date']}}
                  </td>
                  <td class="">
                    {{ $payment['receipt_number'] }}
                  </td>
                  <td class="">
                    {{ $payment['cheque_number']}}
                  </td>
                  <td class="">
                    {{ $payment['principal_paid'] }}
                  </td>
                  <td class="">
                    {{ $payment['interest_paid'] }}
                  </td>
                  <td class="">
                    {{ $payment['total_amount_paid'] }}
                  </td>
                  <td class="">
                    {{ $payment['penalty_paid'] }}
                  </td>
                  <td class="">
                    {{ $payment['principal_balance'] }}
                  </td>
                  <td class="">
                    {{ $payment['interest_balance'] }}
                  </td>
                  <td class="">
                    {{ $payment['total_balance'] }}
                  </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            <hr>
          </div>
        </div>
      </div>
