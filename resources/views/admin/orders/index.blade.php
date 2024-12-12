@extends('layouts.app')

@section('content')
    <h1 class="mb-4">{{ trans('order.orders') }}</h1>

    @if (session('success'))
        <div class="alert alert-success"> {{ session('success') }} </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ trans('order.order_list') }}</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>{{ trans('order.user_name') }}</th>
                            <th>{{ trans('order.order_number') }}</th>
                            <th>{{ trans('order.pickup_time') }}</th>
                            <th>{{ trans('order.delivery_time') }}</th>
                            <th>{{ trans('order.status') }}</th>
                            <th>{{ trans('order.actions') }}</th>
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
                                            {{ $order->lastStatus->statusName->name ?? trans('order.na') }}
                                        </span>
                                    @else
                                        <span class="badge badge-secondary">{{ trans('order.no_status') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                        class="btn btn-sm btn-info">{{ trans('order.view') }}</a>
                                    <a href="{{ route('admin.users.send-email', $order->id) }}"
                                        class="btn btn-sm btn-primary">{{ trans('order.send_email') }}</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">{{ trans('order.no_orders_found') }}</td>
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
