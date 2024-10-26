<!-- Start:: row-1 -->
<div class="row">
    <div class="col-lg-6 col-sm-6 col-md-6 col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <div class="d-flex align-items-start gap-4 flex-wrap">
                    <div>
                        <span class="avatar avatar-lg bg-primary-transparent">
                            <i class="ri-shopping-bag-line fs-4"></i>
                        </span>
                    </div>
                    <div class="flex-fill d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                            <div class="mb-3">Total Sales</div>
                            <div class="text-muted mb-1 fs-12">
                                <span class="text-dark fs-20 lh-1 vertical-bottom">
                                    {{ $totalSales }}
                                </span>
                            </div>
                        </div>
                        <div id="total-sales"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <div class="d-flex align-items-start gap-4 flex-wrap">
                    <div>
                        <span class="avatar avatar-lg bg-info-transparent">
                            <i class="ri-bill-line fs-4"></i>
                        </span>
                    </div>
                    <div class="flex-fill d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                            <div class="mb-3">Active Salon</div>
                            <div class="text-muted mb-1 fs-12">
                                <span class="text-dark fs-20 lh-1 vertical-bottom">
                                    {{ $salonCount }}
                                </span>
                            </div>
                        </div>
                        <div id="total-expenses"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <div class="d-flex align-items-start gap-4 flex-wrap">
                    <div>
                        <span class="avatar avatar-lg bg-success-transparent">
                            <i class="ri-user-3-line fs-4"></i>
                        </span>
                    </div>
                    <div class="flex-fill d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                            <div class="mb-3">Active Customer</div>
                            <div class="text-muted mb-1 fs-12">
                                <span class="text-dark fs-20 lh-1 vertical-bottom">
                                    {{ $customerCount }}
                                </span>
                            </div>
                        </div>
                        <div id="total-visitors"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <div class="d-flex align-items-start gap-4 flex-wrap">
                    <div>
                        <span class="avatar avatar-lg bg-warning-transparent">
                            <i class="ri-shopping-cart-2-line fs-4"></i>
                        </span>
                    </div>
                    <div class="flex-fill d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                            <div class="mb-3">Total Products</div>
                            <div class="text-muted mb-1 fs-12">
                                <span class="text-dark fs-20 lh-1 vertical-bottom">
                                    {{ $productCount }}
                                </span>
                            </div>
                        </div>
                        <div id="total-orders"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Newly Registered Salon
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">Date Registered</th>
                                <th scope="col">Name</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Documents</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->created_date }}</td>
                                <td>{{ $user->fullname }}</td>
                                <td>{{ $user->subscriptions[0]->status ?? '' }}</td>
                                <td>
                                    @if (isset($user->subscriptions[0]->proof_of_payment))
                                    <a href="{{ $user->subscriptions[0]->proof_of_payment }}" class="text-primary" target="_blank">Proof</a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if (isset($user->subscriptions[0]->proof_of_payment))
                                        <a href="{{ url('client/settings/subscription', $user->subscriptions[0]->id) }}?what=paid" class="btn btn-secondary btn-sm">Mark as Paid</a> &nbsp;
                                        <a href="{{ url('client/settings/subscription', $user->subscriptions[0]->id) }}?what=cancel" class="btn btn-outline-danger btn-sm">Denied</a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">No data available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>