<div class="space-y-6">

    <div>
        <label class="block mb-2 font-medium">
            Title
        </label>

        <input
            type="text"
            name="title"
            value="{{ old('title', $banner->title ?? '') }}"
            class="w-full rounded-2xl border-gray-300"
        >
    </div>

    <div>
        <label class="block mb-2 font-medium">
            Description
        </label>

        <textarea
            name="description" id="description-editor"
            rows="5"
            class="w-full rounded-2xl border-gray-300"
        >{{ old('description', $banner->description ?? '') }}</textarea>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
            <label class="block mb-2 font-medium">
                Page
            </label>

            <input
                type="text"
                name="page"
                value="{{ old('page', $banner->page ?? '') }}"
                class="w-full rounded-2xl border-gray-300"
            >
        </div>

        <div>
            <label class="block mb-2 font-medium">
                Position
            </label>

            <input
                type="text"
                name="position"
                value="{{ old('position', $banner->position ?? '') }}"
                class="w-full rounded-2xl border-gray-300"
            >
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
            <label class="block mb-2 font-medium">
                Type
            </label>

            <select
                name="type"
                class="w-full rounded-2xl border-gray-300"
            >
                <option value="hero">Hero</option>
                <option value="slider">Slider</option>
                <option value="promo">Promo</option>
                <option value="sidebar">Sidebar</option>
                <option value="popup">Popup</option>
            </select>
        </div>

        <div>
            <label class="block mb-2 font-medium">
                Status
            </label>

            <select
                name="status"
                class="w-full rounded-2xl border-gray-300"
            >
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

    </div>

    <div>
        <label class="block mb-2 font-medium">
            Banner Image
        </label>

        <input type="file" name="image">
    </div>

    <div>
        <label class="block mb-2 font-medium">
            Thumbnail
        </label>

        <input type="file" name="thumbnail">
    </div>

    <div>
        <label class="block mb-2 font-medium">
            Mobile Image
        </label>

        <input type="file" name="mobile_image">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
            <label class="block mb-2 font-medium">
                Button Text
            </label>

            <input
                type="text"
                name="button_text"
                value="{{ old('button_text', $banner->button_text ?? '') }}"
                class="w-full rounded-2xl border-gray-300"
            >
        </div>

        <div>
            <label class="block mb-2 font-medium">
                Button Link
            </label>

            <input
                type="text"
                name="button_link"
                value="{{ old('button_link', $banner->button_link ?? '') }}"
                class="w-full rounded-2xl border-gray-300"
            >
        </div>

    </div>

    <div>
        <label class="block mb-2 font-medium">
            Order
        </label>

        <input
            type="number"
            name="order"
            value="{{ old('order', $banner->order ?? 0) }}"
            class="w-full rounded-2xl border-gray-300"
        >
    </div>

    <div class="flex items-center gap-3">

        <input
            type="checkbox"
            name="is_featured"
            value="1"
            {{ old('is_featured', $banner->is_featured ?? false) ? 'checked' : '' }}
        >

        <label>
            Featured Banner
        </label>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        ClassicEditor
            .create(document.querySelector('#description-editor'))
            .catch(error => {
                console.error(error);
            });
    });
</script>