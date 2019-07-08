<div class="card">
        <div class="card-header">
          Schedule
        </div>
        <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Principal</th>
                                    <th>Interest</th>
                                    <th>Installment</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            <tbody>                               
                            @foreach($payment_schedule as $installment)
                            <tr>
                            <th scope="row">{{ $installment['installment_number'] }}</th>
                                <td>{{ $installment['due_date'] }}</td>
                                <td>{{ $installment['principal'] }}</td>
                                <td>{{ $installment['interest'] }}</td>
                                <td>{{ $installment['installment'] }}</td>
                                <td>{{ $installment['balance'] }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
      </div>
