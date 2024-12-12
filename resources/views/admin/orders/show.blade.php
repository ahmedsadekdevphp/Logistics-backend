@extends('layouts.app')

@section('content')
    <div class="card mt-20">
        <div class="card-header">
            <h5>
                <center>{{ trans('order.order_details') }}</center>
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td>{{ trans('order.order_no') }}</td>
                            <td>{{ $order->order_no }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('order.placed_at') }}</td>
                            <td>{{ $order->created_at }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('order.location') }}</td>
                            <td>{{ $order->location }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('order.size') }}</td>
                            <td>{{ $order->size }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('order.weight') }}</td>
                            <td>{{ $order->weight }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('order.pickup_time') }}</td>
                            <td>{{ $order->pickupTime }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('order.delivery_time') }}</td>
                            <td>{{ $order->deliveryTime }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('order.user_name') }}</td>
                            <td>{{ $order->user->name }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('order.user_email') }}</td>
                            <td>{{ $order->user->email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mt-20">
        <div class="card-header">
            <h5>
                <center>{{ trans('order.order_status_details') }}</center>
            </h5>
        </div>
        <div class="card-body">
            <div class="timeline">
                <ul class="timeline-list">
                    @foreach ($order->statusDetails as $status)
                        <li class="timeline-item" style="color:{{ $status->statusName->style }};">
                            <div class="timeline-info"> <span>{{ $status->created_at->format('Y-m-d H:i:s') }}</span> </div>
                            <div class="timeline-marker"></div>
                            <i class="fa fa-car"></i>
                            <div class="timeline-content">
                                <h4 class="timeline-title">
                                    <span class="badge" style="background-color: {{ $status->statusName->style }};">
                                        {{ $status->statusName->name }}
                                    </span>
                                </h4>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="card mt-20">
        <div class="card-header">
            <h5>
                <center>{{ trans('order.order_status_control') }}</center>
            </h5>
        </div>
        <div class="card-body pt-100">
            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="status">{{ trans('order.status') }}</label>
                    <select id="status" name="status" class="form-control">
                        @foreach ($orderStatues as $id => $name)
                            <option value="{{ $id }}" {{ $id == $order->lastStatus->order_statuse_id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">{{ trans('order.update_status') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
