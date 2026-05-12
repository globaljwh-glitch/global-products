<x-app-layout>

    <!-- Header -->
    <x-slot name="header">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">

            <div>

                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                    Subscriber Details
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    View newsletter subscriber information
                </p>

            </div>

            <!-- Back Button -->
            <div class="mt-4 sm:mt-0">

                <a
                    href="{{ route('admin.newsletter-subscribers.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-200 transition"
                >
                    ← Back
                </a>

            </div>

        </div>

    </x-slot>

    <!-- Content -->
    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Card -->
            <div class="bg-white shadow-sm rounded-2xl border border-gray-100 overflow-hidden">

                <!-- Top Section -->
                <div class="border-b border-gray-100 px-8 py-6">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

                        <div>

                            <h3 class="text-xl font-semibold text-gray-800">
                                {{ $subscriber->email }}
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                Subscriber ID: #{{ $subscriber->id }}
                            </p>

                        </div>

                        <!-- Status Badge -->
                        <div>

                            @if($subscriber->status === 'active')

                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-100 text-green-700">
                                    Active Subscriber
                                </span>

                            @else

                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-red-100 text-red-700">
                                    Unsubscribed
                                </span>

                            @endif

                        </div>

                    </div>

                </div>

                <!-- Details -->
                <div class="p-8">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Email -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-500 mb-2">
                                Email Address
                            </label>

                            <div class="bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-gray-800">
                                {{ $subscriber->email }}
                            </div>

                        </div>

                        <!-- Status -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-500 mb-2">
                                Subscription Status
                            </label>

                            <div class="bg-gray-50 border border-gray-200 rounded-xl px-4 py-3">

                                @if($subscriber->status === 'active')

                                    <span class="text-green-700 font-medium">
                                        Active
                                    </span>

                                @else

                                    <span class="text-red-700 font-medium">
                                        Unsubscribed
                                    </span>

                                @endif

                            </div>

                        </div>

                        <!-- Source -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-500 mb-2">
                                Source
                            </label>

                            <div class="bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-gray-800">
                                {{ $subscriber->source ?? 'Website' }}
                            </div>

                        </div>

                        <!-- IP Address -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-500 mb-2">
                                IP Address
                            </label>

                            <div class="bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-gray-800">
                                {{ $subscriber->ip_address ?? 'N/A' }}
                            </div>

                        </div>

                        <!-- Subscribed At -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-500 mb-2">
                                Subscribed At
                            </label>

                            <div class="bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-gray-800">

                                {{ $subscriber->subscribed_at
                                    ? $subscriber->subscribed_at->format('d M Y h:i A')
                                    : 'N/A'
                                }}

                            </div>

                        </div>

                        <!-- Unsubscribed At -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-500 mb-2">
                                Unsubscribed At
                            </label>

                            <div class="bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-gray-800">

                                {{ $subscriber->unsubscribed_at
                                    ? $subscriber->unsubscribed_at->format('d M Y h:i A')
                                    : 'N/A'
                                }}

                            </div>

                        </div>

                        <!-- Created At -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-500 mb-2">
                                Created At
                            </label>

                            <div class="bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-gray-800">

                                {{ $subscriber->created_at
                                    ? $subscriber->created_at->format('d M Y h:i A')
                                    : 'N/A'
                                }}

                            </div>

                        </div>

                        <!-- Updated At -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-500 mb-2">
                                Updated At
                            </label>

                            <div class="bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-gray-800">

                                {{ $subscriber->updated_at
                                    ? $subscriber->updated_at->format('d M Y h:i A')
                                    : 'N/A'
                                }}

                            </div>

                        </div>

                    </div>

                    <!-- Token -->
                    <div class="mt-8">

                        <label class="block text-sm font-semibold text-gray-500 mb-2">
                            Unsubscribe Token
                        </label>

                        <div class="bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-700 break-all">

                            {{ $subscriber->token }}

                        </div>

                    </div>

                    <!-- User Agent -->
                    <div class="mt-8">

                        <label class="block text-sm font-semibold text-gray-500 mb-2">
                            User Agent
                        </label>

                        <div class="bg-gray-50 border border-gray-200 rounded-xl px-4 py-4 text-sm text-gray-700 leading-relaxed break-all">

                            {{ $subscriber->user_agent ?? 'N/A' }}

                        </div>

                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-8 flex flex-wrap gap-3">

                        <!-- Delete -->
                        <form
                            action="{{ route('admin.newsletter-subscribers.destroy', $subscriber->id) }}"
                            method="POST"
                            onsubmit="return confirm('Delete this subscriber?')"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="inline-flex items-center px-5 py-2.5 bg-red-600 text-white text-sm font-semibold rounded-lg hover:bg-red-700 transition"
                            >
                                Delete Subscriber
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>