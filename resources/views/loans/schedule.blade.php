<!-- Tables -->
<li class="nav-item dropdown dropdown-fw dropdown-mega"><a class="nav-link dropdown-toggle" data-toggle="dropdown"
    href="#">Schedule</a>
  <ul class="dropdown-menu" role="menu">
    <li>
      <div class="mega-content table-responsive">
        <table class="table table-hover">
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
        @foreach($loan->schedule() as $installment)
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
  </li>
  </ul>
</li>
