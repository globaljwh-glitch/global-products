<x-app-layout>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="flex items-center justify-between mb-8">

                <div>
                    <h1 class="text-3xl font-bold text-gray-900">
                        Users
                    </h1>

                    <p class="text-gray-500 mt-1">
                        Manage application users
                    </p>
                </div>

            </div>

            {{-- Card --}}
            <div class="bg-white rounded-3xl shadow-sm overflow-hidden">

                {{-- Table --}}
                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-200">

                        <thead class="bg-gray-50">
                            <tr>

                                <th class="px-6 py-5 text-left text-sm font-semibold text-gray-500 uppercase">
                                    User
                                </th>

                                <th class="px-6 py-5 text-left text-sm font-semibold text-gray-500 uppercase">
                                    Email
                                </th>

                                <th class="px-6 py-5 text-left text-sm font-semibold text-gray-500 uppercase">
                                    Joined
                                </th>

                                <th class="px-6 py-5 text-right text-sm font-semibold text-gray-500 uppercase">
                                    Action
                                </th>

                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100 bg-white">

                            @forelse($users as $user)

                                <tr class="hover:bg-gray-50 transition">

                                    <td class="px-6 py-5">

                                        <div class="flex items-center gap-4">

                                            <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold text-lg">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>

                                            <div>
                                                <h3 class="text-base font-semibold text-gray-900">
                                                    {{ $user->name }}
                                                </h3>

                                                <p class="text-sm text-gray-500">
                                                    ID: #{{ $user->id }}
                                                </p>
                                            </div>

                                        </div>

                                    </td>

                                    <td class="px-6 py-5 text-gray-700">
                                        {{ $user->email }}
                                    </td>

                                    <td class="px-6 py-5 text-gray-600">
                                        {{ $user->created_at->format('d M Y') }}
                                    </td>

                                    <td class="px-6 py-5 text-right">

                                        <a
                                            href="{{ route('admin.users.show', $user->id) }}"
                                            class="inline-flex items-center px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-xl transition"
                                        >
                                            View
                                        </a>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                                        No users found.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            {{-- Pagination --}}
            <div class="adminPagination mt-6">
                {{ $users->links() }}
            </div>

        </div>
    </div>

</x-app-layout>