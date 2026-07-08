@if(session('error'))
    <div class="mb-4 flex items-center justify-between bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg shadow-sm">

        <div class="flex items-center gap-2">
            <span class="text-red-600">⚠</span>
            <span class="font-medium">{{ session('error') }}</span>
        </div>

        <button onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-700">
            ✕
        </button>
    </div>
@endif

@if($errors->any())
    <div class="mb-4 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg shadow-sm">
        <ul class="list-disc pl-5 space-y-1 text-sm">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- LEFT --}}
    <div class="space-y-4">

        <div>
            <label class="text-sm font-medium">Name</label>
            <input type="text" name="name"
                value="{{ old('name', $category->name ?? '') }}"
                class="w-full mt-1 border rounded-lg px-3 py-2">
        </div>

       

        <div id="category-selects">

            <div class="mb-4">
                <label class="text-sm font-medium">Parent Category</label>
                <!-- <label class="form-label">
                    Parent Category
                </label> -->

                <select class="w-full mt-1 border rounded-lg px-3 py-2 form-control category-dropdown">

                    <option value="">
                        Select Category
                    </option>

                    @foreach($parentCategories as $pCategory)
                        <option value="{{ $pCategory->id }}"
                            {{ ($selectedCategories[0] ?? '') == $pCategory->id ? 'selected' : '' }}>
                            {{ $pCategory->name }}
                        </option>
                    @endforeach

                </select>

            </div>

            @foreach(($selectedCategories ?? []) as $index => $selectedId)

                    @if($index > 0)

                        @php
                            $children = \App\Models\Category::where(
                                'parent_id',
                                $selectedCategories[$index - 1]
                            )->get();
                        @endphp

                        <div class="mb-4">

                            <label class="text-sm font-medium">
                                Sub Category
                            </label>

                            <select class="w-full mt-1 border rounded-lg px-3 py-2 form-control category-dropdown">

                                <option value="">
                                    Select Sub Category
                                </option>

                                @foreach($children as $child)

                                    <option value="{{ $child->id }}"
                                        {{ $child->id == $selectedId ? 'selected' : '' }}>
                                        {{ $child->name }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                    @endif

                @endforeach

        </div>

        <input type="hidden" name="parent_id" id="selected_category_id">

        <div>
            <label>Description</label>
            <textarea name="description" id="description-editor" class="w-full mt-1 border rounded-lg px-3 py-2">{{ old('description', $category?->description ?? '') }}</textarea>
        </div>

        <div>
            <label>Display Order</label>
            <input type="number" name="display_order"
                value="{{ old('display_order', $category->display_order ?? 0) }}"
                class="w-full mt-1 border rounded-lg px-3 py-2">
        </div>

        <div class="flex gap-6">
            <label>
                <input type="checkbox" name="is_featured" value="1"
                    {{ old('is_featured', $category->is_featured ?? false) ? 'checked' : '' }}>
                Featured
            </label>

            <label>
                <input type="checkbox" name="status" value="1"
                    {{ old('status', $category->status ?? true) ? 'checked' : '' }}>
                Active
            </label>
        </div>

    </div>

    {{-- RIGHT --}}
    <div class="space-y-4">

        <div>
            <label>Image</label>
            <input type="file" name="image" class="w-full mt-1 border rounded-lg p-2">

            @if(!empty($category->image))
                <img width="100px" src="{{ asset('storage/'.$category->image) }}" class="w-16 mt-2">
            @endif
        </div>

        <div>
            <label>Thumbnail</label>
            <input type="file" name="thumbnail" class="w-full mt-1 border rounded-lg p-2">
        </div>

        <div>
            <label>Icon</label>
            <input type="file" name="icon" class="w-full mt-1 border rounded-lg p-2">
        </div>

        <div class="pt-4 border-t">
            <label>Meta Title</label>
            <input type="text" name="meta_title"
                value="{{ old('meta_title', $category->meta_title ?? '') }}"
                class="w-full mb-2 border rounded-lg px-3 py-2">

            <label>Meta Description</label>
            <textarea name="meta_description" id="meta_description-editor"
                class="w-full border rounded-lg px-3 py-2">{{ old('meta_description', $category->meta_description ?? '') }}</textarea>
        </div>

    </div>

</div>


<!-- js for related products -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    //if ($('select[name="parent_id[]"]').length) {
        $('select[name="parent_id"]').select2({
            placeholder: 'Search parent category',
            width: '100%',
            minimumInputLength: 2,
            ajax: {
                url: '/admin/categories/search',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term
                        //exclude_id: {{ $category->id ?? 0 }}
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            }
        });
    //}
});
</script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

$(document).on('change', '.category-dropdown', function(){

    let categoryId = $(this).val();

    // remove all lower level dropdowns
    $(this).closest('.mb-4').nextAll().remove();

    $('#selected_category_id').val(categoryId);

    if(!categoryId){
        return;
    }

    $.get('/admin/categories/children/' + categoryId, function(response){

        if(response.length > 0){

            let html = `
                <div class="mb-4">

                    <label class="text-sm font-medium">
                        Sub Category
                    </label>

                    <select class="w-full mt-1 border rounded-lg px-3 py-2 form-control category-dropdown">

                        <option value="">
                            Select Sub Category
                        </option>
            `;

            response.forEach(function(item){

                html += `
                    <option value="${item.id}">
                        ${item.name}
                    </option>
                `;

            });

            html += `
                    </select>
                </div>
            `;

            $('#category-selects').append(html);
        }

    });

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

    document.addEventListener('DOMContentLoaded', function () {
        ClassicEditor
            .create(document.querySelector('#meta_description-editor'))
            .catch(error => {
                console.error(error);
            });
    });
</script>