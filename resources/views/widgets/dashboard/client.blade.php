<!-- Start:: row-1 -->
<div class="row">
    <div class="col-lg-6 col-sm-6 col-md-6 col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <a href="{{ url('client/orders') }}" class="d-flex align-items-start gap-4 flex-wrap">
                    <div>
                        <span class="avatar avatar-lg bg-primary-transparent">
                            <i class="ri-shopping-bag-line fs-4"></i>
                        </span>
                    </div>
                    <div class="flex-fill d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                            <div class="mb-3">Active Orders</div>
                            <div class="text-muted mb-1 fs-12">
                                <span class="text-dark fs-20 lh-1 vertical-bottom">
                                    {{ $orderCount }}
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <a href="{{  url('client/reports/sales')}}" class="d-flex align-items-start gap-4 flex-wrap">
                    <div>
                        <span class="avatar avatar-lg bg-info-transparent">
                            <i class="ri-bill-line fs-4"></i>
                        </span>
                    </div>
                    <div class="flex-fill d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                            <div class="mb-3">Total Monthly Sales</div>
                            <div class="text-muted mb-1 fs-12">
                                <span class="text-dark fs-20 lh-1 vertical-bottom">
                                    P{{ $totalSales }}
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <a href="{{ url('client/customers') }}" class="d-flex align-items-start gap-4 flex-wrap">
                    <div>
                        <span class="avatar avatar-lg bg-success-transparent">
                            <i class="ri-user-3-line fs-4"></i>
                        </span>
                    </div>
                    <div class="flex-fill d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                            <div class="mb-3">Total Customer</div>
                            <div class="text-muted mb-1 fs-12">
                                <span class="text-dark fs-20 lh-1 vertical-bottom">
                                    {{ $customerCount }}
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xl-3">
        <div class="card custom-card">
            <div class="card-body">
                <a href="{{ url('client/products') }}" class="d-flex align-items-start gap-4 flex-wrap">
                    <div>
                        <span class="avatar avatar-lg bg-warning-transparent">
                            <i class="ri-shopping-cart-2-line fs-4"></i>
                        </span>
                    </div>
                    <div class="flex-fill d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                            <div class="mb-3">Active Products</div>
                            <div class="text-muted mb-1 fs-12">
                                <span class="text-dark fs-20 lh-1 vertical-bottom">
                                    {{ $productCount }}
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card custom-card overflow-hidden">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Recent Orders
                </div>
                <a href="{{ url('client/orders') }}" class="link-primary fw-medium">View All Orders<i class="ri-arrow-right-s-line ms-1 align-middle"></i></a>
            </div>
            <div class="card-body px-0 pt-2 pb-0">
                <div class="table-responsive">
                    <table class="table text-nowrap table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Payment Mode</th>
                                <th scope="col">Status</th>
                                <th scope="col">Amount Paid</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td><a href="javascript:void(0);" class="text-primary text-decoration-underline">#{{ strtoupper($order->invoice_number) }}</a></td>
                                <td>
                                    <div>
                                        <span class="d-block mb-1">{{ $order->payment_method }}</span>
                                    </div>
                                </td>
                                <td><span class="badge bg-success-transparent">Completed</span></td>
                                <td>
                                    <div>
                                        <span class="d-block mb-1">P{{ number_format($order->amount, 2) }}</span>
                                        <span class="d-block fs-12 text-muted fw-normal">{{ $order->created_date }}</span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Top Customers
                </div>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0 top-customers">
                    @foreach ($customers as $customer)
                    <li>
                        <a href="javascript:void(0);">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-top justify-content-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-md avatar-rounded">
                                            <img src="{{ url('backend/images/faces/4.jpg') }}" alt="" />
                                        </span>
                                    </div>
                                    <div>
                                        <p class="mb-0 fs-14">{{ $customer->fullname }}</p>
                                        <p class="mb-0 text-muted fs-12">{{ $customer->orders_count }} Purchases<i class="bi bi-patch-check-fill fs-14 text-primary ms-2"></i></p>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <span class="text-muted d-block fs-12">Sale Value</span>
                                    <span class="fs-14">{{ $customer->total_purchase }}</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        
    </div>
</div>