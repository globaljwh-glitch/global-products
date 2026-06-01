<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <div>

                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                    Product Questions & Answers
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Manage Q & A
                </p>

            </div>

            <a
                href="{{ route('admin.product-questions.create') }}"
                class="inline-flex items-center px-5 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition"
            >
                Create Q & A
            </a>

        </div>

    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))

                <div class="mb-6 bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>

            @endif

            <div class="bg-white shadow-sm rounded-2xl overflow-hidden border border-gray-100">

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-200">

                        <thead class="bg-gray-50">

                            <tr>

                                <th class="px-4 py-3 text-uppercase text-muted small">
                                    Product
                                </th>

                                <th class="px-4 py-3 text-uppercase text-muted small">
                                    Question
                                </th>

                                <th class="px-4 py-3 text-uppercase text-muted small">
                                    Answer
                                </th>

                                <th class="px-4 py-3 text-uppercase text-muted small">
                                    Status
                                </th>

                                <th class="px-4 py-3 text-uppercase text-muted small">
                                    Published
                                </th>

                                <th class="px-4 py-3 text-uppercase text-muted small text-center">
                                    Action
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($questions as $question)

                                <tr>

                                    {{-- Product --}}
                                    <td class="px-4 py-4">

                                        <div class="fw-semibold text-dark">
                                            {{ $question->product->name ?? '-' }}
                                        </div>

                                    </td>

                                    {{-- Question --}}
                                    <td class="px-4 py-4">

                                        <div class="fw-bold text-dark mb-1">
                                            {{ Str::limit($question->question, 60) }}
                                        </div>

                                    </td>

                                    {{-- Answer --}}
                                    <td class="px-4 py-4">

                                        @if($question->answer)

                                            <div class="text-muted">
                                                {{ Str::limit($question->answer, 80) }}
                                            </div>

                                        @else

                                            <span class="text-danger">
                                                No Answer
                                            </span>

                                        @endif

                                    </td>

                                    {{-- Answered Status --}}
                                    <td class="px-4 py-4">

                                        @if($question->is_answered)

                                            <span class="badge px-3 py-2"
                                                  style="background:#dcfce7; color:#15803d; border-radius:20px;">

                                                Answered

                                            </span>

                                        @else

                                            <span class="badge px-3 py-2"
                                                  style="background:#fee2e2; color:#dc2626; border-radius:20px;">

                                                Pending

                                            </span>

                                        @endif

                                    </td>

                                    {{-- Published --}}
                                    <td class="px-4 py-4">

                                        @if($question->is_published)

                                            <span class="badge px-3 py-2"
                                                  style="background:#e0e7ff; color:#4338ca; border-radius:20px;">

                                                Published

                                            </span>

                                        @else

                                            <span class="text-muted">
                                                Hidden
                                            </span>

                                        @endif

                                    </td>

                                    {{-- Action --}}
                                    <td class="px-4 py-4 text-center">

                                        <div class="d-flex gap-2 justify-content-center">

                                            {{-- Edit --}}
                                            <a href="{{ route('admin.product-questions.edit', $question->id) }}"
                                               class="btn btn-sm text-white"
                                               style="background:#4f46e5; border-radius:10px;">

                                                Edit

                                            </a>

                                            {{-- Delete --}}
                                            <form action="{{ route('admin.product-questions.destroy', $question->id) }}"
                                                  method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        onclick="return confirm('Delete this question?')"
                                                        class="btn btn-sm text-white"
                                                        style="background:#dc2626; border-radius:10px;">

                                                    Delete

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6"
                                        class="text-center py-5 text-muted">

                                        No questions found.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            {{-- Pagination --}}
            <div class="adminPagination mt-4">
                {{ $questions->links() }}
            </div>

        </div>

    </div>

</x-app-layout>