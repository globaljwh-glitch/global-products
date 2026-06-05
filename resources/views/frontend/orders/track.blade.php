@extends('layouts.frontend')

@section('content')

<section class="sectionPadding">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6">

                <h2 class="text-center mb-4">
                    Track My Order
                </h2>

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('orders.track.submit') }}"
                      method="POST">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Order Number
                        </label>

                        <input type="text"
                               name="order_number"
                               class="form-control"
                               placeholder="Enter Order Number"
                               required>

                    </div>

                    <button type="submit"
                            class="customBtn01 redBg">
                        Track Order
                    </button>

                </form>

            </div>
        </div>

        @isset($order)

            <div class="row mt-5">
                <div class="col-md-12">

                    <div class="order-box">

                        <h4>
                            Order #{{ $order->order_number }}
                        </h4>

                        <p>
                            Current Status:
                            <strong>
                                {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                            </strong>
                        </p>

                        @php
                            $steps = [
                                'placed' => 'Placed',
                                'processing' => 'Processing',
                                'shipped' => 'Shipped',
                                'out_for_delivery' => 'Out For Delivery',
                                'delivered' => 'Delivered',
                            ];

                            $currentStep = array_search(
                                $order->status,
                                array_keys($steps)
                            );
                        @endphp

                        <div class="timeline">

                            @foreach($steps as $key => $label)

                                @php
                                    $stepIndex = array_search(
                                        $key,
                                        array_keys($steps)
                                    );
                                @endphp

                                <div class="timeline-step {{ $stepIndex <= $currentStep ? 'active' : '' }}">
                                    <span>
                                        {{ $stepIndex <= $currentStep ? '✓' : '' }}
                                    </span>

                                    <p>{{ $label }}</p>
                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>
            </div>

        @endisset

    </div>
</section>

@endsection