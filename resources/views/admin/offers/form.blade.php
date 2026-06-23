@php
    $offer = $offer ?? null;
@endphp            
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Title -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Title <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                name="title"
                                value="{{ old('title', $offer?->title ?? '') }}"
                                placeholder="Enter offer title"
                                class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            >

                        </div>

                        <!-- Offer Code -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Offer Code
                            </label>

                            <input
                                type="text"
                                name="offer_code"
                                value="{{ old('offer_code', $offer?->offer_code) }}"
                                placeholder="SAVE20"
                                class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            >

                        </div>

                        <!-- Discount Type -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Discount Type
                            </label>

                            <select
                                name="discount_type"
                                class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            >

                                <option value="">
                                    Select Type
                                </option>

                                <option
                                    value="percentage"
                                    @selected(old('discount_type', $offer?->discount_type) == 'percentage')
                                >
                                    Percentage
                                </option>

                                <option
                                    value="fixed"
                                    @selected(old('discount_type', $offer?->discount_type) == 'fixed')
                                >
                                    Fixed Amount
                                </option>

                            </select>

                        </div>

                        <!-- Discount Value -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Discount Value
                            </label>

                            <input
                                type="number"
                                step="0.01"
                                name="discount_value"
                                value="{{ old('discount_value', $offer?->discount_value) }}"
                                placeholder="10"
                                class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            >

                        </div>

                        <!-- Offer Start -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Offer Start
                            </label>

                            <input
                                type="datetime-local"
                                name="offer_start"
                                value="{{ old('offer_start', $offer?->offer_start) }}"
                                class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            >

                        </div>

                        <!-- Offer End -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Offer End
                            </label>

                            <input
                                type="datetime-local"
                                name="offer_end"
                                value="{{ old('offer_end', $offer?->offer_end) }}"
                                class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            >

                        </div>

                        <!-- Button Text -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Button Text
                            </label>

                            <input
                                type="text"
                                name="button_text"
                                value="{{ old('button_text', $offer?->button_text) }}"
                                placeholder="Shop Now"
                                class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            >

                        </div>

                        <!-- Button URL -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Button URL
                            </label>

                            <input
                                type="url"
                                name="button_url"
                                value="{{ old('button_url', $offer?->button_url) }}"
                                placeholder="https://example.com"
                                class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            >

                        </div>

                        <!-- Display Order -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Display Order
                            </label>

                            <input
                                type="number"
                                name="display_order"
                                value="{{ old('display_order', $offer?->display_order) }}"
                                class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            >

                        </div>

                        <!-- Image -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Offer Image
                            </label>

                            <input
                                type="file"
                                name="image"
                                class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            >

                        </div>

                    </div>

                    <!-- Description -->
                    <div class="mt-6">

                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="5"
                            placeholder="Write offer description..."
                            class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        >{{ old('description', $offer?->description) }}</textarea>

                    </div>

                    <!-- Checkboxes -->
                    <div class="mt-6 flex flex-wrap gap-6">

                        <!-- Featured -->
                        <label class="inline-flex items-center gap-3">

                            <input
                                type="checkbox"
                                name="is_featured"
                                value="1"
                                @checked(old('is_featured', $offer?->is_featured))
                                class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                            >

                            <span class="text-sm text-gray-700">
                                Featured Offer
                            </span>

                        </label>

                        <!-- Status -->
                        <label class="inline-flex items-center gap-3">

                            <input
                                type="checkbox"
                                name="status"
                                value="1"
                                @checked(old('status', $offer?->status))
                                class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                            >

                            <span class="text-sm text-gray-700">
                                Active Status
                            </span>

                        </label>

                    </div>

                    <!-- Submit Buttons -->
                    <div class="mt-8 flex flex-wrap items-center gap-4">

                        <button
                            type="submit"
                            class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white text-sm font-semibold rounded-xl hover:bg-indigo-700 transition"
                        >
                            Create Offer
                        </button>

                        <a
                            href="{{ route('admin.offers.index') }}"
                            class="inline-flex items-center px-6 py-3 bg-gray-100 border border-gray-300 text-sm font-semibold rounded-xl text-gray-700 hover:bg-gray-200 transition"
                        >
                            Cancel
                        </a>

            </div>