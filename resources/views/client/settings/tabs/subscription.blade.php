<div class="tab-pane {{ isset($active) ? 'show active' : '' }} p-3" id="subscriptions" role="tabpanel">
    <h6 class="fw-medium mb-3">Subscription</h6>
    <small>To continue using this application, please pay the amount of P100.00 monthly. Send via GCash at 091712345678.</small>
    <div class="row gy-4 mb-4">
        <form action="{{ url('client/settings/subscription') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="p-sm-3 p-0">
                <div class="row">
                    <div class="col-xl-4 mb-3">
                        <label for="proof-payment" class="form-label">Proof of Payment</label>
                        <input type="file" name="payment" class="form-control rounded-0" id="proof-payment" />
                    </div>
                    <div class="col-xl-3 mb-3">
                        <label for="proof-payment" class="form-label">Subsciption Period</label>
                        <select name="subscription_basis" id="subscription_basis" class="form-select form-control rounded-0">
                            <option value="1">Monthly</option>
                            <option value="2">Quarterly</option>
                            <option value="3">Annual</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-6">
                    <button class="btn btn-primary" type="submit">Upload Proof of Payment</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row gy-4 mb-4">
        <div class="col-xl-12">
            <div class="table-responsive">
                @if (isset($hasDatatable))
                {{ $dataTable->table() }}
                @endif
            </div>
        </div>
    </div>
</div>