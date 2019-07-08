<div class="card">
                <div class="card-body">
                  <div class="small text-muted"><u>Automatic Apportionment</u></div>
                  <p>
                    <div>
                        @if ($flash=session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ $flash }}
                            </div>
                        @endif 
                    </div>
                  <form method="POST" action="/payments/{{ $loan['id'] }}/automatic">
                    {{ csrf_field() }}
                  <input type="hidden" name="loan_applications_id" value="{{ $loan['id'] }}" />
                  <input type="hidden" name="payment_method" value="Automatic" />
                  <div class="form-group">             
                      <label class="form-label" for="payment_date">Payment Date</label>
                      <input type="date" name="payment_date" class="form-control">
                  </div>
                  <div class="form-group">             
                      <label class="form-label" for="collateral_">Total Amount Paid</label>
                      <input type="number" name="collateral_type" class="form-control">
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
