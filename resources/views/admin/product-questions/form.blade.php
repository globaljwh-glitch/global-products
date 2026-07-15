<div class="grid grid-cols-1 gap-6">

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Product <span class="text-red-500">*</span>
        </label>

        <select name="product_ids[]" multiple class="w-full mt-1 border rounded-lg px-3 py-2">
            @foreach($products as $product)
                <option value="{{ $product->id }}"
                    {{ isset($productQuestion) && $productQuestion->products->contains($product->id) ? 'selected' : '' }}>
                    {{ $product->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>

        <label class="block text-sm font-semibold text-gray-700 mb-2">Question</label>

        <textarea name="question" 
                class="form-control"
                rows="3"
                >{{ old('question', $productQuestion->question ?? '') }}</textarea>

    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Answer</label>

        <textarea name="answer" 
                class="form-control"
                rows="5">{{ old('answer', $productQuestion->answer ?? '') }}</textarea>

    </div>


    <div class="mt-6 flex flex-wrap gap-6">

        <!-- Status -->
        <label class="inline-flex items-center gap-3">

            <input type="checkbox"
                class="form-check-input"
                name="is_published"
                value="1" 
                {{ old('is_published', $productQuestion->is_published ?? true) ? 'checked' : '' }} 
                class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" 
            >

            <span class="text-sm text-gray-700">
                Active Status
            </span>

        </label>

    </div>

    <div class="mt-8 flex flex-wrap items-center gap-4">

        <button
            type="submit"
            class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white text-sm font-semibold rounded-xl hover:bg-indigo-700 transition"
        >
            Submit
        </button>

        <a
            href="{{ route('admin.product-questions.index') }}"
            class="inline-flex items-center px-6 py-3 bg-gray-100 border border-gray-300 text-sm font-semibold rounded-xl text-gray-700 hover:bg-gray-200 transition"
        >
            Cancel
        </a>

    </div>

</div>

<!-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        ClassicEditor
            .create(document.querySelector('#question-editor'))
            .catch(error => {
                console.error(error);
            });
    });

    document.addEventListener('DOMContentLoaded', function () {
        ClassicEditor
            .create(document.querySelector('#answer-editor'))
            .catch(error => {
                console.error(error);
            });
    });
</script> -->

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
        @if(isset($productQuestion))
            let selectedProducts = @json($productQuestion->products->map(function($p){
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