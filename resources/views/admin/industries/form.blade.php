<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- LEFT --}}
    <div class="space-y-4">

        <div>
            <label class="text-sm font-medium">Name</label>
            <input type="text" name="name" value="{{ old('name', $industry->name ?? '') }}" class="w-full mt-1 border rounded-lg px-3 py-2">
        </div>

        <div>
            <label class="text-sm font-medium">Description</label>
            <textarea name="description" id="description-editor" class="w-full mt-1 border rounded-lg px-3 py-2">{{ old('description', $industry->description ?? '') }}</textarea>
        </div>

        <div>
            <label class="text-sm font-medium">Categories</label>
            <select name="category_ids[]" multiple class="w-full mt-1 border rounded-lg px-3 py-2">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ isset($industry) && $industry->categories->contains($category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="text-sm font-medium">Brands</label>
            <select name="brand_ids[]" multiple class="w-full mt-1 border rounded-lg px-3 py-2">
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}"
                        {{ isset($industry) && $industry->brands->contains($brand->id) ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="text-sm font-medium">Products</label>
            <select name="product_ids[]" multiple class="w-full mt-1 border rounded-lg px-3 py-2">
                @foreach($products as $product)
                    <option value="{{ $product->id }}"
                        {{ isset($industry) && $industry->products->contains($product->id) ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="text-sm font-medium">Status</label>
            <select name="status" class="w-full mt-1 border rounded-lg px-3 py-2">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <div class="flex gap-6">
            <label>
                <input type="checkbox" name="is_featured" value="1"
                    {{ old('is_featured', $industry->is_featured ?? false) ? 'checked' : '' }}>
                Featured
            </label>

            <label>
                <input type="checkbox" name="is_exclusive" value="1"
                    {{ old('is_exclusive', $industry->is_exclusive ?? false) ? 'checked' : '' }}>
                Exclusive
            </label>

        </div>

        <div>
            <label class="text-sm font-medium">Display Order</label>
            <input type="number"
                name="display_order" required 
                value="{{ old('display_order', $industry->display_order ?? 0 ) }}"
                class="w-full mt-1 border rounded-lg px-3 py-2">
        </div>

    </div>

    {{-- RIGHT --}}
    <div class="space-y-4">

        <div>
            <label class="text-sm font-medium">Logo</label>
            <input type="file" name="logo" class="w-full mt-1 border rounded-lg p-2">

            @if(!empty($industry->logo))
                <img src="{{ asset('storage/'.optional($industry)->logo ) }}" class="w-20 mt-2">
            @endif
        </div>

        <div>
            <label class="text-sm font-medium">Banner</label>
            <input type="file" name="banner" class="w-full mt-1 border rounded-lg p-2">

            @if(!empty($industry->banner))
                <img src="{{ asset('storage/'.optional($industry)->banner) }}" class="w-full mt-2 rounded">
            @endif
        </div>

    </div>

</div>



<script>
document.addEventListener('DOMContentLoaded', function () {

    let $el = $('select[name="product_ids[]"]');

    if ($el.length) {

        $el.select2({
            placeholder: 'Search products',
            width: '100%',
            minimumInputLength: 2,

            ajax: {
                url: "/admin/products/search",
                dataType: 'json',
                delay: 250,

                data: function (params) {
                    return {
                        q: params.term
                    };
                },

                processResults: function (data) {
                    return {
                        results: data
                    };
                },

                cache: true
            }
        });

        // ✅ PRESELECT (for edit page)
        @if(isset($industry))
            let selectedProducts = @json($industry->products->map(function($p){
                return ['id' => $p->id, 'text' => $p->name];
            }));

            selectedProducts.forEach(function(item) {
                let option = new Option(item.text, item.id, true, true);
                $el.append(option);
            });

            $el.trigger('change');
        @endif

    }
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        ClassicEditor
            .create(document.querySelector('#description-editor'))
            .catch(error => {
                console.error(error);
            });
    });
</script>