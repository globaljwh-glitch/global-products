<x-app-layout>

    <div class="py-10">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="flex items-center justify-between mb-8">

                <div>
                    <h1 class="text-3xl font-bold text-gray-900">
                        User Detail
                    </h1>

                    <p class="text-gray-500 mt-1">
                        View user information
                    </p>
                </div>

                <a
                    href="{{ route('admin.users.index') }}"
                    class="px-5 py-2 bg-gray-200 hover:bg-gray-300 rounded-xl text-sm font-medium transition"
                >
                    Back
                </a>

            </div>

            {{-- Card --}}
            <div class="bg-white rounded-3xl shadow-sm p-8">

                <div class="flex items-center gap-6 mb-10">

                    <div class="w-24 h-24 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 text-4xl font-bold">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>

                    <div>

                        <h2 class="text-2xl font-bold text-gray-900">
                            {{ $user->name }}
                        </h2>

                        <p class="text-gray-500">
                            {{ $user->email }}
                        </p>

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="bg-gray-50 rounded-2xl p-5">

                        <p class="text-sm text-gray-500 mb-1">
                            User ID
                        </p>

                        <h3 class="text-lg font-semibold text-gray-900">
                            #{{ $user->id }}
                        </h3>

                    </div>

                    <div class="bg-gray-50 rounded-2xl p-5">

                        <p class="text-sm text-gray-500 mb-1">
                            Registered At
                        </p>

                        <h3 class="text-lg font-semibold text-gray-900">
                            {{ $user->created_at->format('d M Y h:i A') }}
                        </h3>

                    </div>

                    <div class="bg-gray-50 rounded-2xl p-5">

                        <p class="text-sm text-gray-500 mb-1">
                            Updated At
                        </p>

                        <h3 class="text-lg font-semibold text-gray-900">
                            {{ $user->updated_at->format('d M Y h:i A') }}
                        </h3>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>