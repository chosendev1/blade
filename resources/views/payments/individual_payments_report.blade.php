<div class="card">
        <div class="card-header">
          Payments Report
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table card-table text-nowrap">
            <thead>
              <tr>
                  <th class="">Princ-Paid</th>
                  <th class="text-center">Int-Paid</th>
                  <th class="">Princ-Arrears</th>
                  <th class="text-center">Int-Arrears</th>
                  <th class="">Princ-Due</th>
                  <th class="text-center">Int-Due</th>
                  <th class="">Princ-Outstanding</th>
                  <th class="text-center">Int-Outstanding</th>
              </tr>
            </thead>
            <tbody>
            {{-- @foreach($collaterals as $collateral)
              <tr>
                <td>
                    {{ $collateral->collateral_type}}
                <td class="text-center">
                    {{ $collateral->collateral_value }}
                </td>
                <td class="text-center">
                  {{ $collateral->collateral_location }}
                </td>
              </tr>
            @endforeach --}}
            </tbody>
            </table>
            <hr>
          </div>
        </div>
      </div>
