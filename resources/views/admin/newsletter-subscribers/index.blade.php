<x-app-layout>

<!-- Content -->
    <div class="py-8">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                Newsletter Subscribers
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Manage newsletter subscriber list
            </p>
        </div>
    </div>

        <div class="max-w-7xl mx-auto">

            <!-- Success Message -->
            @if(session('success'))

                <div
                    class="mb-6 bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-lg">

                    {{ session('success') }}

                </div>

            @endif

            <!-- Filter Section -->
            <div class="bg-white shadow-sm rounded-2xl p-6 mb-6 border border-gray-100">

                <form method="GET">

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                        <!-- Search -->
                        <div class="md:col-span-2">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Search Email
                            </label>

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Enter email address"
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            >

                        </div>

                        <!-- Status -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Status
                            </label>

                            <select
                                name="status"
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            >

                                <option value="">
                                    All Status
                                </option>

                                <option
                                    value="active"
                                    @selected(request('status') == 'active')
                                >
                                    Active
                                </option>

                                <option
                                    value="unsubscribed"
                                    @selected(request('status') == 'unsubscribed')
                                >
                                    Unsubscribed
                                </option>

                            </select>

                        </div>

                        <!-- Buttons -->
                        <div class="flex items-end gap-3">

                            <button
                                type="submit"
                                class="inline-flex items-center px-5 py-2.5 bg-indigo-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition"
                            >
                                Filter
                            </button>

                            <a
                                href="{{ route('admin.newsletter-subscribers.index') }}"
                                class="inline-flex items-center px-5 py-2.5 bg-gray-100 border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-200 transition"
                            >
                                Reset
                            </a>

                        </div>

                    </div>

                </form>

            </div>

            <!-- Table Card -->
            <div class="bg-white shadow-sm rounded-2xl overflow-hidden border border-gray-100">

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-200">

                        <!-- Table Head -->
                        <thead class="bg-gray-50">

                            <tr>

                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Subscribed At
                                </th>

                                <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    Action
                                </th>

                            </tr>

                        </thead>

                        <!-- Table Body -->
                        <tbody class="bg-white divide-y divide-gray-100">

                            @forelse($subscribers as $subscriber)

                                <tr class="hover:bg-gray-50 transition">

                                    <!-- ID -->
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                        #{{ $subscriber->id }}
                                    </td>

                                    <!-- Email -->
                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $subscriber->email }}
                                        </div>

                                    </td>

                                    <!-- Status -->
                                    <td class="px-6 py-4 whitespace-nowrap">

                                        @if($subscriber->status === 'active')

                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                                Active
                                            </span>

                                        @else

                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                                Unsubscribed
                                            </span>

                                        @endif

                                    </td>

                                    <!-- Date -->
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">

                                        {{ $subscriber->subscribed_at
                                            ? $subscriber->subscribed_at->format('d M Y h:i A')
                                            : 'N/A'
                                        }}

                                    </td>

                                    <!-- Actions -->
                                    <td class="px-6 py-4 whitespace-nowrap text-center">

                                        <div class="flex items-center justify-center gap-2">

                                            <!-- View -->
                                            <a
                                                href="{{ route('admin.newsletter-subscribers.show', $subscriber->id) }}"
                                                class="inline-flex items-center px-3 py-2 bg-indigo-600 text-white text-xs font-semibold rounded-lg hover:bg-indigo-700 transition"
                                            >
                                                View
                                            </a>

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
                                                    class="inline-flex items-center px-3 py-2 bg-red-600 text-white text-xs font-semibold rounded-lg hover:bg-red-700 transition"
                                                >
                                                    Delete
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="5"
                                        class="px-6 py-12 text-center text-gray-500"
                                    >

                                        No subscribers found.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- Pagination -->
            @if($subscribers->hasPages())

                <div class="adminPagination mt-6">

                    {{ $subscribers->links() }}

                </div>

            @endif

        </div>

    </div>

</x-app-layout>