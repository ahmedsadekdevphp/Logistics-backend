@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-4">{{ trans('email.send_email_to', ['user' => $order->user->name]) }}</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.users.send-email.post', $order->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">{{ trans('email.recipient_email') }}</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $order->user->email }}"
                        readonly>
                </div>

                <div class="form-group">
                    <label for="subject">{{ trans('email.subject') }}</label>
                    <input type="text" class="form-control" id="subject" name="subject"
                        value="Order No:{{ $order->order_no }}" placeholder="{{ trans('email.subject_placeholder') }}" required>
                </div>

                <div class="form-group">
                    <label for="body">{{ trans('email.body') }}</label>
                    <textarea class="form-control" id="body" name="body" rows="5" placeholder="{{ trans('email.body_placeholder') }}" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">{{ trans('email.send_email') }}</button>
            </form>
        </div>
    </div>
@endsection
