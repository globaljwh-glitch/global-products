<div class="grid grid-cols-1 gap-6">

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Product <span class="text-red-500">*</span>
        </label>

        <select name="product_id"
            class="form-control"
            required>

            <option value="">Select Product</option>

            @foreach($products as $product)

                <option value="{{ $product->id }}"
                    {{ old('product_id', $productQuestion->product_id ?? '') == $product->id ? 'selected' : '' }}>

                    {{ $product->name }}

                </option>

            @endforeach

        </select>
    </div>

    <!-- <label class="form-label">Product</label>

    <select name="product_id"
            class="form-control"
            required>

        <option value="">Select Product</option>

        @foreach($products as $product)

            <option value="{{ $product->id }}"
                {{ old('product_id', $productQuestion->product_id ?? '') == $product->id ? 'selected' : '' }}>

                {{ $product->name }}

            </option>

        @endforeach

    </select> -->


    <div>

        <label class="block text-sm font-semibold text-gray-700 mb-2">Question</label>

        <textarea name="question" id="question-editor"
                class="form-control"
                rows="3"
                required>{{ old('question', $productQuestion->question ?? '') }}</textarea>

    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Answer</label>

        <textarea name="answer" id="answer-editor"
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
    <!-- <div>
        <input type="checkbox"
            class="form-check-input"
            name="is_published"
            value="1"
            {{ old('is_published', $productQuestion->is_published ?? true) ? 'checked' : '' }}>

        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Published
        </label>

    </div> -->

    <!-- <button type="submit" class="btn btn-success">
        Save
    </button> -->

    <div class="mt-8 flex flex-wrap items-center gap-4">

        <button
            type="submit"
            class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white text-sm font-semibold rounded-xl hover:bg-indigo-700 transition"
        >
            Create Offer
        </button>

        <a
            href="{{ route('admin.product-questions.index') }}"
            class="inline-flex items-center px-6 py-3 bg-gray-100 border border-gray-300 text-sm font-semibold rounded-xl text-gray-700 hover:bg-gray-200 transition"
        >
            Cancel
        </a>

    </div>

</div>

<script>
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
</script>