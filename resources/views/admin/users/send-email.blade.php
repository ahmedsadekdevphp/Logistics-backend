@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-4">Send Email to {{ $order->user->name }}</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.users.send-email.post', $order->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Recipient Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $order->user->email }}"
                        readonly>
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject"
                        value="Order No:{{ $order->order_no }}" placeholder="Subject" required>
                </div>

                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea class="form-control" id="body" name="body" rows="5" placeholder="Email Body" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Send Email</button>
            </form>
        </div>
    </div>
@endsection
