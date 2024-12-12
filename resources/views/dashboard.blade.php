@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <!-- Add small card for orders -->
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.orders.index') }}" class="text-decoration-none text-dark d-flex align-items-center">
                                <div class="h5 mb-0"><i class="fa fa-car"></i> {{ __('Orders') }}</div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2" width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M10 6l6 6-6 6" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
