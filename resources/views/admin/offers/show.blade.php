<x-app-layout>

    <!-- Header -->
    <x-slot name="header">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div>

                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                    Offer Details
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    View promotional offer information
                </p>

            </div>

            <!-- Back -->
            <a
                href="{{ route('admin.offers.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-200 transition"
            >
                ← Back
            </a>

        </div>

    </x-slot>

    <!-- Content -->
    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Card -->
            <div class="bg-white shadow-sm rounded-2xl border border-gray-100 overflow-hidden">

                <div class="p-8">

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

                        <!-- Left -->
                        <div>

                            @if($offer->image)

                                <img
                                    src="{{ asset('storage/' . $offer->image) }}"
                                    alt="{{ $offer->title }}"
                                    class="w-full rounded-2xl border border-gray-200 object-cover"
                                >

                            @else

                                <div class="w-full h-80 bg-gray-100 rounded-2xl flex items-center justify-center text-gray-400">
                                    No Image
                                </div>

                            @endif

                        </div>

                        <!-- Right -->
                        <div>

                            <!-- Title -->
                            <h1 class="text-3xl font-bold text-gray-900">
                                {{ $offer->title }}
                            </h1>

                            <!-- Description -->
                            <div class="mt-5 text-gray-600 leading-relaxed">

                                {!! nl2br(e($offer->description)) !!}

                            </div>

                            <!-- Details -->
                            <div class="mt-8 space-y-5">

                                <!-- Offer Code -->
                                <div>

                                    <div class="text-sm font-semibold text-gray-500">
                                        Offer Code
                                    </div>

                                    <div class="mt-1 text-gray-900">
                                        {{ $offer->offer_code ?? 'N/A' }}
                                    </div>

                                </div>

                                <!-- Discount -->
                                <div>

                                    <div class="text-sm font-semibold text-gray-500">
                                        Discount
                                    </div>

                                    <div class="mt-1 text-gray-900">

                                        @if($offer->discount_type === 'percentage')

                                            {{ $offer->discount_value }}%

                                        @elseif($offer->discount_type === 'fixed')

                                            ${{ number_format($offer->discount_value, 2) }}

                                        @else

                                            N/A

                                        @endif

                                    </div>

                                </div>

                                <!-- Offer Period -->
                                <div>

                                    <div class="text-sm font-semibold text-gray-500">
                                        Offer Period
                                    </div>

                                    <div class="mt-1 text-gray-900">

                                        @if($offer->offer_start)

                                            {{ $offer->offer_start->format('d M Y h:i A') }}

                                        @else

                                            N/A

                                        @endif

                                        →

                                        @if($offer->offer_end)

                                            {{ $offer->offer_end->format('d M Y h:i A') }}

                                        @else

                                            N/A

                                        @endif

                                    </div>

                                </div>

                                <!-- Button -->
                                <div>

                                    <div class="text-sm font-semibold text-gray-500">
                                        Button
                                    </div>

                                    <div class="mt-1">

                                        @if($offer->button_url)

                                            <a
                                                href="{{ $offer->button_url }}"
                                                target="_blank"
                                                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition"
                                            >
                                                {{ $offer->button_text ?: 'Visit Link' }}
                                            </a>

                                        @else

                                            <span class="text-gray-400">
                                                N/A
                                            </span>

                                        @endif

                                    </div>

                                </div>

                                <!-- Status -->
                                <div class="flex flex-wrap gap-3 pt-2">

                                    @if($offer->status)

                                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-100 text-green-700">
                                            Active
                                        </span>

                                    @else

                                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-red-100 text-red-700">
                                            Inactive
                                        </span>

                                    @endif

                                    @if($offer->is_featured)

                                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-indigo-100 text-indigo-700">
                                            Featured
                                        </span>

                                    @endif

                                </div>

                            </div>

                            <!-- Action Buttons -->
                            <div class="mt-10 flex flex-wrap gap-4">

                                <!-- Edit -->
                                <a
                                    href="{{ route('admin.offers.edit', $offer->id) }}"
                                    class="inline-flex items-center px-6 py-3 bg-yellow-500 text-white rounded-xl hover:bg-yellow-600 transition"
                                >
                                    Edit Offer
                                </a>

                                <!-- Delete -->
                                <form
                                    action="{{ route('admin.offers.destroy', $offer->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this offer?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="inline-flex items-center px-6 py-3 bg-red-600 text-white rounded-xl hover:bg-red-700 transition"
                                    >
                                        Delete Offer
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>