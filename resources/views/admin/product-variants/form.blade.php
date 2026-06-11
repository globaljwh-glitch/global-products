<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- Product --}}
    <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">
            Product
        </label>

        <select name="product_id"
                class="w-full rounded-md border-gray-300"
                required>

            <option value="">Select Product</option>

            @foreach($products as $id => $title)

                <option value="{{ $id }}"
                    {{ old('product_id', $productVariant->product_id ?? '') == $id ? 'selected' : '' }}>
                    {{ $title }}
                </option>

            @endforeach

        </select>

        @error('product_id')
            <div class="text-red-500 text-sm mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Variant Name --}}
    <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">
            Variant Name
        </label>

        <input type="text"
               name="variant_name"
               value="{{ old('variant_name', $productVariant->variant_name ?? '') }}"
               class="w-full rounded-md border-gray-300"
               required>

        @error('variant_name')
            <div class="text-red-500 text-sm mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Color --}}
    <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">
            Color
        </label>

        <input type="text"
               name="color"
               value="{{ old('color', $productVariant->attributes['color'] ?? '') }}"
               class="w-full rounded-md border-gray-300">
    </div>

    {{-- Size --}}
    <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">
            Size
        </label>

        <input type="text"
               name="size"
               value="{{ old('size', $productVariant->attributes['size'] ?? '') }}"
               class="w-full rounded-md border-gray-300">
    </div>

    {{-- SKU --}}
    <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">
            SKU
        </label>

        <input type="text"
               name="sku"
               value="{{ old('sku', $productVariant->sku ?? '') }}"
               class="w-full rounded-md border-gray-300">
    </div>

    {{-- MOQ --}}
    <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">
            Minimum Quantity
        </label>

        <input type="number"
               name="minimum_quantity"
               value="{{ old('minimum_quantity', $productVariant->minimum_quantity ?? 1) }}"
               class="w-full rounded-md border-gray-300"
               required>
    </div>

    {{-- Stock --}}
    <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">
            Stock
        </label>

        <input type="number"
               name="stock"
               value="{{ old('stock', $productVariant->stock ?? 0) }}"
               class="w-full rounded-md border-gray-300">
    </div>

    {{-- Price --}}
    <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">
            Price
        </label>

        <input type="number"
               step="0.01"
               name="price"
               value="{{ old('price', $productVariant->price ?? '') }}"
               class="w-full rounded-md border-gray-300"
               required>
    </div>

    {{-- Compare Price --}}
    <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">
            Compare Price
        </label>

        <input type="number"
               step="0.01"
               name="compare_price"
               value="{{ old('compare_price', $productVariant->compare_price ?? '') }}"
               class="w-full rounded-md border-gray-300">
    </div>

    {{-- Display Order --}}
    <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">
            Display Order
        </label>

        <input type="number"
               name="display_order"
               value="{{ old('display_order', $productVariant->display_order ?? 0) }}"
               class="w-full rounded-md border-gray-300">
    </div>

    {{-- Status --}}
    <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">
            Status
        </label>

        <select name="status"
                class="w-full rounded-md border-gray-300">

            <option value="1"
                {{ old('status', $productVariant->status ?? 1) == 1 ? 'selected' : '' }}>
                Active
            </option>

            <option value="0"
                {{ old('status', $productVariant->status ?? 1) == 0 ? 'selected' : '' }}>
                Inactive
            </option>

        </select>
    </div>

</div>

<div class="mt-6">
    <button type="submit"
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        Save Variant
    </button>
</div>