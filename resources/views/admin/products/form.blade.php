@if($errors->any())
    <div class="mb-4 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
        <ul class="list-disc pl-5 text-sm space-y-1">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-2 gap-6">

    <div>
        <label>Name</label>
        <input type="text" name="name"
            value="{{ old('name', $product->name ?? '') }}"
            class="w-full border rounded p-2">
    </div>

    <div>
        <label>Price</label>
        <input type="text" name="price"
            value="{{ old('price', $product->price ?? '') }}"
            class="w-full border rounded p-2">
    </div>

    <div>
        <label>Categories</label>
        <select name="categories[]" multiple class="w-full border rounded p-2">
            @foreach($categories as $id => $name)
                <option value="{{ $id }}"
                    {{ isset($product) && $product->categories->pluck('id')->contains($id) ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Brands</label>
        <select name="brands[]" multiple class="w-full border rounded p-2">
            @foreach($brands as $id => $name)
                <option value="{{ $id }}"
                    {{ isset($product) && $product->brands->pluck('id')->contains($id) ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- <div>
        <label>Image</label>
        <input type="file" name="image">
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

                    {{-- Primary --}}
                    <!-- <button type="button"
                        onclick="setExistingPrimary({{ $image->id }})"
                        class="absolute bottom-1 left-1 text-xs px-2 py-1 rounded
                        {{ $image->is_primary ? 'bg-green-600 text-white' : 'bg-gray-200' }}">
                        Primary
                    </button> -->

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
        input.classList.add('hidden-image-input');

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
function setExistingPrimary(id) {

    document.querySelectorAll('#existingImages .existing-image button:last-child')
        .forEach(btn => {
            btn.classList.remove('bg-green-600', 'text-white');
            btn.classList.add('bg-gray-200');
        });

    const btn = document.querySelector(`[data-id='${id}'] button:last-child`);
    btn.classList.add('bg-green-600', 'text-white');

    existingMeta[id] = { is_primary: 1 };

    updateExistingMeta();
}

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