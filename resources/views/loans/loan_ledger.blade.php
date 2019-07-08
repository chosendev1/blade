<!-- Tables -->
<li class="nav-item dropdown dropdown-fw dropdown-mega">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown"
    href="#">Loan Ledger</a>
  <ul class="dropdown-menu" role="menu">
    <li>
      <div class="mega-content table-responsive">
        <table class="table table-hover">
          <thead>
              <tr>
                <th>Date</th>
                <th>Receipt No.</th>
                <th>Cheque No.</th>
                <th>Total-Paid</th>
                <th>Princ-Paid</th>
                <th>Int-Paid</th>
                <th>Penalty-Paid</th>
                <th>Princ-Bal</th>
                <th>Int-Bal</th>
                {{-- <th>Penalty-Bal</th> --}}
                <th>Total-Bal</th>
              </tr> 
            </thead>
            <tbody>
              @foreach($loan->loanLedger() as $payment)
                <tr>
                  <td>
                    {{ $payment['payment_date']}}
                  </td>
                  <td>
                    {{ $payment['receipt_number'] }}
                  </td>
                  <td>
                    {{ $payment['cheque_number']}}
                  </td>
                  <td>
                    {{ $payment['principal_paid'] }}
                  </td>
                  <td>
                    {{ $payment['interest_paid'] }}
                  </td>
                  <td>
                    {{ $payment['total_amount_paid'] }}
                  </td>
                  <td>
                    {{ $payment['penalty_paid'] }}
                  </td>
                  <td>
                    {{ $payment['principal_balance'] }}
                  </td>
                  <td>
                    {{ $payment['interest_balance'] }}
                  </td>
                  <td>
                    {{-- {{ $payment['penalty_balance'] }} --}}
                  </td>
                  <td>
                    {{ $payment['total_balance'] }}
                  </td>

                </tr>
                @endforeach
            </tbody>
    </table>
    </div>
  </li>
  </ul>
</li>
