

        <!-- ERROR -->
        @if ($errors->any())
            <div class="mb-4 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORM -->
        <form method="POST"
            action="{{ isset($product) ? route('admin.products.update', $product) : route('admin.products.store') }}"
            enctype="multipart/form-data">

            @csrf
            @if(isset($product)) @method('PUT') @endif

            <div class="grid grid-cols-2 gap-6">

                <!-- NAME -->
                <div>
                    <label class="block text-sm font-medium">Name</label>
                    <input type="text" name="name"
                        value="{{ old('name', $product->name ?? '') }}"
                        class="w-full border rounded p-2">
                </div>


                <div class="flex items-center grid grid-cols-2 gap-4">
                    <div>
                        <input type="hidden" name="is_featured" value="0">

                        <input type="checkbox"
                            name="is_featured"
                            value="1"
                            @checked(old('is_featured', $product->is_featured ?? false))
                            class="h-4 w-4">

                        <label class="font-medium">Featured Product</label>
                    </div>

                    <div>
                        <input type="hidden" name="is_exclusive" value="0">

                        <input type="checkbox"
                            name="is_exclusive"
                            value="1"
                            @checked(old('is_exclusive', $product->is_exclusive ?? false))
                            class="h-4 w-4">

                        <label class="font-medium">Exclusive Product</label>
                    </div>
                </div>

                <div>
                    <label class="block font-medium">Description</label>
                    <textarea name="description" id="description-editor"
                            class="w-full border rounded px-3 py-2"
                            rows="3">{{ old('description', optional($product)->description) }}</textarea>
                </div>

                <div>
                    <label class="block font-medium">Other</label>
                    <textarea name="other" id="other-editor" 
                            class="w-full border rounded px-3 py-2"
                            rows="3">{{ old('other', optional($product)->other) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium">SKU</label>
                    <input type="text" name="sku"
                        value="{{ old('sku', $product->sku ?? '') }}"
                        class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">MPN</label>
                    <input type="text" name="mpn"
                        value="{{ old('mpn', $product->mpn ?? '') }}"
                        class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Model</label>
                    <input type="text" name="model_number"
                        value="{{ old('model_number', $product->model_number ?? '') }}"
                        class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Price</label>
                    <input type="text" name="price"
                        value="{{ old('price', $product->price ?? '') }}"
                        class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block font-medium">External URL Label</label>
                    <input type="text"
                        name="external_url_label"
                        value="{{ old('external_url_label', optional($product)->external_url_label) }}"
                        class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block font-medium">External URL</label>
                    <input type="url"
                        name="external_url"
                        value="{{ old('external_url', optional($product)->external_url) }}"
                        class="w-full border rounded px-3 py-2">
                </div>

                <!-- CATEGORY -->
                
                <div id="category-selects">

                    <div class="mb-4">
                        <label class="text-sm font-medium">Parent Category</label>

                        <select class="w-full mt-1 border rounded-lg px-3 py-2 form-control category-dropdown">

                            <option value="">
                                Select Category
                            </option>

                            @foreach($categories as $id => $name)
                                <option value="{{ $id }}"
                                    {{ isset($product) && $product->categories->pluck('id')->contains($id) ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach

                        </select>

                    </div>

                </div>

                <input type="hidden" name="categories" id="selected_category_id">

                <!-- BRAND -->
                <div>
                    <label class="block text-sm font-medium">Brands</label>
                    <select name="brands[]" multiple class="w-full border rounded p-2">
                        @foreach($brands as $id => $name)
                            <option value="{{ $id }}"
                                {{ isset($product) && $product->brands->pluck('id')->contains($id) ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <!-- IMAGES -->
            <!-- <div class="mt-6">
                <label class="block text-sm font-medium mb-2">Product Images</label>

                <input type="file" id="image-input" name="images[]" multiple class="border p-2 rounded w-full mb-4">

                <div id="preview-container" class="grid grid-cols-4 gap-4"></div>

                @if(isset($product) && $product->images->count())
                    
                    <div id="image-list" class="grid grid-cols-6 gap-4">

                        @foreach($product->images as $image)
                            <div class="image-item border p-2 rounded relative" data-id="{{ $image->id }}">

                                <img src="{{ asset('storage/'.$image->image) }}"
                                    class="w-full h-32 object-cover rounded mb-2">

                                <button type="button"
                                    class="remove-image absolute top-1 right-1 bg-red-500 text-white text-xs px-2 py-1 rounded"
                                    data-id="{{ $image->id }}">
                                    ✕
                                </button>

                            </div>
                        @endforeach

                    </div>
                @endif
            </div> -->


            @if(isset($product) && $product->exists && $product->images->count())
                <div class="col-span-2 mt-6">

                    <h3 class="text-lg font-semibold mb-3">Existing Images</h3>

                    <div id="existingImages" class="grid grid-cols-5 gap-4">

                        @foreach($product->images as $image)
                            <div class="relative border rounded p-2 existing-image" data-id="{{ $image->id }}">

                                <img src="{{ asset('storage/'.$image->image) }}"
                                    class="w-full h-24 object-cover rounded">

                                {{-- Remove --}}
                                <button type="button"
                                    onclick="removeExistingImage({{ $image->id }})"
                                    class="absolute top-1 right-1 bg-red-500 text-white text-xs px-2 rounded">
                                    ✕
                                </button>

                            </div>
                        @endforeach

                    </div>

                </div>

                <div id="removedImages"></div>
                <div id="existingMeta"></div>

            @endif

            <div class="col-span-2 mt-6">

                <h3 class="text-lg font-semibold mb-3">Product Images</h3>

                {{-- Upload --}}
                <input type="file" name="images[]" multiple id="imageInput"
                    class="mb-4 border p-2 rounded w-full">

                {{-- Preview Container --}}
                <div id="imagePreview" class="grid grid-cols-5 gap-4"></div>

            </div>

            <!-- ========================= -->
            <!-- 🔥 PRODUCT ATTRIBUTES -->
            <!-- ========================= -->

            <div class="mt-10">

                <h2 class="text-xl font-semibold mb-4">Product Attributes</h2>
                
                <!-- @php
                    $existingAttributes = collect(optional($product)->attributes)->keyBy('id');
                @endphp -->

                @foreach($attributeGroups as $group)
                    <div class="mb-6 border rounded-lg p-4 bg-gray-50">

                        <!-- GROUP TITLE -->
                        <h3 class="font-semibold text-lg mb-3">
                            {{ $group->name }}
                        </h3>

                        <!-- ATTRIBUTES -->
                        <!-- <div class="grid grid-cols-1 gap-4">

                            @foreach($group->attributes as $attr)

                                @php
                                    $value = isset($product)
                                        ? optional($product->attributes->where('attribute_group_id', $group->id)
                                            ->where('name', $attr->name)
                                            ->first())->value
                                        : '';
                                @endphp

                                <div class="flex gap-2 mb-2 items-center attribute-row">
                                    <input type="text"
                                        value="{{ $attr->name }}"
                                        readonly
                                        class="w-1/2 border p-2 rounded bg-gray-100">

                                    <input type="text"
                                        name="attributes[{{ $attr->id }}]"
                                        value="{{ $value }}"
                                        placeholder="Enter value"
                                        class="w-1/2 border p-2 rounded">
                                </div>

                            @endforeach

                        </div> -->

                        <!-- CUSTOM CONTAINER -->
                        <div id="custom-group-{{ $group->id }}" class="mt-2 space-y-2">

                            {{-- EDIT MODE: Load existing attributes --}}
                            @if(isset($product))
                                @foreach($product->attributes->where('attribute_group_id', $group->id) as $attr)
                                    <div class="flex gap-2 mb-2 items-center attribute-row">
                                        
                                        <input type="hidden"
                                            name="custom_attributes[{{ $group->id }}][{{ $loop->index }}][id]"
                                            value="{{ $attr->id }}">

                                        <input type="text"
                                            name="custom_attributes[{{ $group->id }}][{{ $loop->index }}][name]"
                                            value="{{ $attr->name }}"
                                            class="w-1/2 border p-2 rounded">

                                        <input type="text"
                                            name="custom_attributes[{{ $group->id }}][{{ $loop->index }}][value]"
                                            value="{{ $attr->value }}"
                                            class="w-1/2 border p-2 rounded">

                                        <button type="button"
                                            onclick="removeField(this)"
                                            class="bg-red-500 text-white px-3 py-2 rounded">
                                            ✕
                                        </button>
                                    </div>
                                @endforeach
                            @endif

                        </div>

                        <!-- CUSTOM CONTAINER -->
                        <div id="custom-group-{{ $group->id }}" class="mt-2 space-y-2"></div>

                        <!-- ADD CUSTOM -->
                        <button type="button"
                            onclick="addCustomField({{ $group->id }})"
                            class="text-blue-600 text-sm mt-3">
                            + Add {{ $group->name }}
                        </button>

                    </div>
                @endforeach

            </div>

            <div class="col-span-2 mt-6">
                <h3 class="text-lg font-semibold mb-3">Related Products</h3>

                <select name="related_products[]" class="form-control select2" multiple>
                    @if(isset($product))
                        @foreach($product->relatedProducts as $related)
                            <option value="{{ $related->id }}" selected>
                                {{ $related->name }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="grid grid-cols-2 gap-6 mt-6">
                <div>
                    <label class="block font-medium">Status</label>
                    <select name="status" class="w-full border rounded px-3 py-2">
                        <option value="1" @selected(old('status', optional($product)->status) == 1)>Active</option>
                        <option value="0" @selected(old('status', optional($product)->status) == 0)>Inactive</option>
                    </select>
                </div>

                <div>
                    <label class="block font-medium">Display Order</label>
                    <input type="number"
                        name="display_order" required 
                        value="{{ old('display_order', optional($product)->display_order) }}"
                        class="border rounded px-3 py-2">
                </div>
            </div>

            <!-- SUBMIT -->
            <div class="mt-8">
                <button class="bg-blue-600 text-white px-6 py-2 rounded">
                    {{ isset($product) ? 'Update' : 'Create' }}
                </button>
            </div>

        </form>


    <!-- ========================= -->
    <!-- 🔥 JS -->
    <!-- ========================= -->

    <script>
        function addCustomField(groupId) {

            const container = document.getElementById(`custom-group-${groupId}`);
            const index = Date.now();

            const html = `
                <div class="flex gap-2 mb-2 items-center attribute-row">
                    <input type="text"
                        name="custom_attributes[${groupId}][${index}][name]"
                        placeholder="Attribute name"
                        class="w-1/2 border p-2 rounded">

                    <input type="text"
                        name="custom_attributes[${groupId}][${index}][value]"
                        placeholder="Value"
                        class="w-1/2 border p-2 rounded">

                    <button type="button"
                        onclick="removeField(this)"
                        class="bg-red-500 text-white px-3 py-2 rounded">
                        ✕
                    </button>
                </div>
            `;

            container.insertAdjacentHTML('beforeend', html);
        }

        function removeField(btn) {
            btn.closest('.attribute-row').remove();
        }

    </script>

    <script>
document.addEventListener('click', function(e) {

    if (e.target.classList.contains('remove-image')) {

        let id = e.target.getAttribute('data-id');

        // remove UI
        e.target.closest('.image-item').remove();

        // add hidden delete input
        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'deleted_images[]';
        input.value = id;

        document.querySelector('form').appendChild(input);
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

    document.addEventListener('DOMContentLoaded', function () {
        ClassicEditor
            .create(document.querySelector('#other-editor'))
            .catch(error => {
                console.error(error);
            });
    });
</script>


<script>
let selectedFiles = [];

document.getElementById('image-input').addEventListener('change', function(e) {

    const files = Array.from(e.target.files);

    files.forEach(file => {
        selectedFiles.push(file);
    });

    renderPreview();
});

function renderPreview() {

    const container = document.getElementById('preview-container');
    container.innerHTML = '';

    selectedFiles.forEach((file, index) => {

        const reader = new FileReader();

        reader.onload = function(e) {

            const div = document.createElement('div');
            div.classList.add('relative', 'border', 'p-2', 'rounded');

            div.innerHTML = `
                <img src="${e.target.result}" class="w-full h-32 object-cover rounded mb-2">

                <button type="button"
                    onclick="removeImage(${index})"
                    class="absolute top-1 right-1 bg-red-500 text-white text-xs px-2 py-1 rounded">
                    ✕
                </button>
            `;

            container.appendChild(div);
        };

        reader.readAsDataURL(file);
    });

    updateInputFiles();
}

function removeImage(index) {
    selectedFiles.splice(index, 1);
    renderPreview();
}

function updateInputFiles() {
    const dataTransfer = new DataTransfer();

    selectedFiles.forEach(file => {
        dataTransfer.items.add(file);
    });

    document.getElementById('image-input').files = dataTransfer.files;
}
</script>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

<script>
new Sortable(document.getElementById('image-list'), {
    animation: 150,

    onEnd: function () {
        updateImageOrder();
    }
});

function updateImageOrder() {

    let order = [];
    document.querySelectorAll('#image-list .image-item').forEach((el, index) => {
        order.push({
            id: el.dataset.id,
            order: index
        });
    });

    // remove old inputs
    document.querySelectorAll('.order-input').forEach(e => e.remove());

    // append hidden inputs
    order.forEach(item => {
        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = `image_order[${item.id}]`;
        input.value = item.order;
        input.classList.add('order-input');

        document.querySelector('form').appendChild(input);
    });
}
</script>



<script>

let imagesArray = [];
let dataTransfer = new DataTransfer(); // REQUIRED

const input = document.getElementById('imageInput');
const preview = document.getElementById('imagePreview');

input.addEventListener('change', function (e) {
    const files = Array.from(e.target.files);

    files.forEach(file => {

        imagesArray.push({
            file: file,
            url: URL.createObjectURL(file), // faster than FileReader
            is_primary: false
        });

        dataTransfer.items.add(file); // attach file
    });

    // IMPORTANT: reassign files to input
    input.files = dataTransfer.files;

    renderImages();
});


function renderImages() {
    preview.innerHTML = '';

    imagesArray.forEach((img, index) => {

        const div = document.createElement('div');
        div.className = "relative border rounded p-2";

        div.innerHTML = `
            <img src="${img.url}" class="w-full h-24 object-cover rounded">

            <button type="button"
                onclick="removeImage(${index})"
                class="absolute top-1 right-1 bg-red-500 text-white text-xs px-2 rounded">
                ✕
            </button>

        `;

        preview.appendChild(div);
    });

            // <button type="button"
            //     onclick="setPrimary(${index})"
            //     class="absolute bottom-1 left-1 text-xs px-2 py-1 rounded
            //     ${img.is_primary ? 'bg-green-600 text-white' : 'bg-gray-200'}">
            //     Primary
            // </button>

    updateHiddenInputs();
}

// function removeImage(index) {
//     imagesArray.splice(index, 1);
//     renderImages();
// }

function removeImage(index) {
    imagesArray.splice(index, 1);

    // rebuild DataTransfer
    dataTransfer = new DataTransfer();

    imagesArray.forEach(img => {
        dataTransfer.items.add(img.file);
    });

    input.files = dataTransfer.files;

    renderImages();
}

function setPrimary(index) {
    imagesArray.forEach(img => img.is_primary = false);
    imagesArray[index].is_primary = true;
    renderImages();
}

</script>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

<script>
new Sortable(imagePreview, {
    animation: 150,
    onEnd: function (evt) {
        const movedItem = imagesArray.splice(evt.oldIndex, 1)[0];
        imagesArray.splice(evt.newIndex, 0, movedItem);
        renderImages();
    }
});
</script>

<script>
function updateHiddenInputs() {
    document.querySelectorAll('.hidden-image-input').forEach(el => el.remove());

    imagesArray.forEach((img, index) => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = `image_meta[${index}][is_primary]`;
        input.value = img.is_primary ? 1 : 0;
        input.classList.add('hidden-image-input');updateHiddenInputs

        preview.appendChild(input);
    });
}
</script>

<script>
let removedImages = [];
let existingMeta = {};

// remove image
function removeExistingImage(id) {
    removedImages.push(id);

    document.querySelector(`[data-id='${id}']`).remove();

    updateRemovedInputs();
}

// set primary
// function setExistingPrimary(id) {

//     document.querySelectorAll('#existingImages .existing-image button:last-child')
//         .forEach(btn => {
//             btn.classList.remove('bg-green-600', 'text-white');
//             btn.classList.add('bg-gray-200');
//         });

//     const btn = document.querySelector(`[data-id='${id}'] button:last-child`);
//     btn.classList.add('bg-green-600', 'text-white');

//     existingMeta[id] = { is_primary: 1 };

//     updateExistingMeta();
// }

// hidden inputs
function updateRemovedInputs() {
    const container = document.getElementById('removedImages');
    container.innerHTML = '';

    removedImages.forEach(id => {
        container.innerHTML += `<input type="hidden" name="remove_images[]" value="${id}">`;
    });
}

function updateExistingMeta() {
    const container = document.getElementById('existingMeta');
    container.innerHTML = '';

    Object.keys(existingMeta).forEach(id => {
        container.innerHTML += `
            <input type="hidden" name="existing_meta[${id}][is_primary]" value="1">
        `;
    });
}
</script>

<script>
new Sortable(document.getElementById('existingImages'), {
    animation: 150,
    onEnd: function () {
        updateExistingOrder();
    }
});

function updateExistingOrder() {
    const container = document.getElementById('existingMeta');
    container.innerHTML = '';

    document.querySelectorAll('#existingImages .existing-image')
        .forEach((el, index) => {
            const id = el.dataset.id;

            container.innerHTML += `
                <input type="hidden" name="existing_meta[${id}][display_order]" value="${index}">
            `;
        });
}
</script>


<!-- js for related products -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    if ($('select[name="related_products[]"]').length) {
        $('select[name="related_products[]"]').select2({
            placeholder: 'Search related products',
            width: '100%',
            minimumInputLength: 2,
            ajax: {
                url: '/admin/products/search',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term,
                        exclude_id: {{ $product->id ?? 0 }}
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            }
        });
    }
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

                    <select required class="w-full mt-1 border rounded-lg px-3 py-2 form-control category-dropdown">

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
