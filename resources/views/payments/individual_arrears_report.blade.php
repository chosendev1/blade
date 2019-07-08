<div class="card">
        <div class="card-header">
          Arrears Report as at {{ date('Y-m-d') }}
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table card-table text-nowrap">
            <thead>
              <tr>
                  <th class="">Princ-Expected</th>
                  <th class="">Int-Expected</th>
                  <th class="">Total-Expected</th>
                  <th class="">Princ-Paid</th>
                  <th class="">Int-Paid</th>
                  <th class="">Total-Paid</th>
                  <th class="">Princ-Arrears</th>
                  <th class="">Int-Arrears</th>
                  <th class="">Total-Arrears</th>
                  <th class="">Last Payment Date</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="">
                  {{ $arrears_report['principal_expected'] }}
                </td>
                <td class="">
                  {{ $arrears_report['interest_expected'] }}
                </td>
                <td>
                  {{ $arrears_report['total_amount_expected'] }}
                </td>
                <td class="">
                  {{ $arrears_report['principal_paid'] }}
                </td>
                <td class="">
                  {{ $arrears_report['interest_paid'] }}
                </td>
                <td>
                  {{ $arrears_report['total_amount_paid'] }}
                </td>
                <td class="">
                  {{ $arrears_report['principal_arrears'] }}
                </td>
                <td class="">
                  {{ $arrears_report['interest_arrears'] }}
                </td>
                <td class="">
                  {{ $arrears_report['total_arreas'] }}
                </td>
                <td class="">
                  {{ $arrears_report['last_payment_date'] }}
                </td>
              </tr>
            </tbody>
            </table>
            <hr>
          </div>
        </div>
      </div>
