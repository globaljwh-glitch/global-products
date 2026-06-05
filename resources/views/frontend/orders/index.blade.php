@extends('layouts.frontend')

@section('content')

<section class="sectionPadding imageBackground02">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="text-center">
                    <h2 class="fw-bold welcomeUser">
                        <span class="text-red">Welcome</span>
                        {{ auth()->user()->name }}
                    </h2>
                </div>

                <div class="userProfileImage">
                    <a href="#" class="d-block shadow">
                        <img src="{{ asset('images/user-image.jpg') }}"
                             alt="{{ auth()->user()->name }}"
                             class="imgResponsive">
                    </a>

                    <div class="memberSince fw-bold">
                        Member Since {{ auth()->user()->created_at->format('Y') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="sectionPadding profileInfoOuter">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">

                @forelse($orders as $order)

                    <div class="order-box d-flex justify-content-between align-items-center greyBg">

                        <div>

                            <h5>
                                <a href="/my-orders/{{ $order->id }}">Order #{{ $order->order_number }}</a>
                            </h5>

                            <p class="mb-0">
                                Placed on {{ $order->created_at->format('d M Y') }}
                            </p>

                        </div>

                        <h6 class="text-white p-3
                            @if($order->order_status == 'delivered')
                                bg-success
                            @elseif($order->order_status == 'cancelled')
                                bg-danger
                            @else
                                bg-warning
                            @endif
                            me-3">

                            {{ ucfirst($order->order_status) }}

                        </h6>

                    </div>

                @empty

                    <div class="alert alert-info text-center">
                        No orders found.
                    </div>

                @endforelse

                </div>
            </div>
        </div>
    </div>
</section>

@endsection