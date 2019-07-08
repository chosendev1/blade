<div class="card">
                <div class="card-body">
                  <div class="small text-muted"><u>Manual Apportionment</u></div>
                  <p>
                    <div>
                        @if ($flash=session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ $flash }}
                            </div>
                        @endif 
                    </div>
                  <form method="POST" action="/payments/{{ $loan['id'] }}/manual">
                    {{ csrf_field() }}
                  <input type="hidden" name="loan_applications_id" value="{{ $loan['id'] }}" />
                  <input type="hidden" name="payment_method" value="Manual" />
                  <div class="form-group">             
                      <label class="form-label" for="payment_date">Payment Date</label>
                      <input type="date" name="payment_date" class="form-control">
                  </div>
                  <div class="form-group">             
                      <label class="form-label" for="principal_paid">Principle Paid</label>
                      <input type="number" name="principal_paid" class="form-control">
                  </div>
                  <div class="form-group">
                      <label class="form-label" for="interest_paid">Interest Paid</label>
                      <input type="number" name="interest_paid"  class="form-control">
                  </div>
                  <div class="form-group">
                      <label class="form-label" for="penalty_paid">Penalty Paid</label>
                      <input type="number" name="penalty_paid"  class="form-control">
                  </div>
                  <div class="form-group">
                      <label class="form-label" for="receipt_number">Receipt Number</label>
                      <input type="text" name="receipt_number" placeholder="if cash Payment" class="form-control">
                  </div>
                  <div class="form-group">
                      <label class="form-label" for="cheque_number">Cheque Number</label>
                      <input type="text" name="cheque_number"  placeholder="if cheque Payment" class="form-control">
                  </div><div class="form-group">
                      <label class="form-label" for="bank">Bank</label>
                      <input type="text" name="bank_name"  placeholder="if cheque Payment" class="form-control">
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">Save Payment</button>
                  </div>
                 </form>
                </div>
              </div>
