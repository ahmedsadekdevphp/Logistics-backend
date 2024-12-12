@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Orders</h1>
    @if (session('success'))
        <div class="alert alert-success"> {{ session('success') }} </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Order List</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>User Name</th>
                            <th>Order Number</th>
                            <th>Pickup Time</th>
                            <th>Delivery Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($order->user)
                                        {{ $order->user->name }}
                                    @endif
                                </td>
                                <td>{{ $order->order_no }}</td>
                                <td>{{ $order->pickupTime }}</td>
                                <td>{{ $order->deliveryTime }}</td>
                                <td>
                                    @if ($order->lastStatus)
                                        <span class="badge"
                                            style="background-color: {{ $order->lastStatus->statusName->style }};">
                                            {{ $order->lastStatus->statusName->name ?? 'N/A' }}
                                        </span>
                                    @else
                                        <span class="badge badge-secondary">No Status</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                        class="btn btn-sm btn-info">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No orders found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination links -->
        <div class="card-footer">
            <div class="d-flex justify-content-center">
                {{ $orders->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
