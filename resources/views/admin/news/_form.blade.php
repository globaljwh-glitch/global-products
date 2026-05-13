<div class="space-y-6">

    <div>
        <label class="block mb-2 font-medium">
            Title
        </label>

        <input
            type="text"
            name="title"
            value="{{ old('title', $news->title ?? '') }}"
            class="w-full rounded-2xl border-gray-300"
        >
    </div>

    <div>
        <label class="block mb-2 font-medium">
            Excerpt
        </label>

        <textarea
            name="excerpt"
            class="w-full rounded-2xl border-gray-300"
        >{{ old('excerpt', $news->excerpt ?? '') }}</textarea>
    </div>

    <div>
        <label class="block mb-2 font-medium">
            Description
        </label>

        <textarea
            name="description"
            rows="8"
            class="w-full rounded-2xl border-gray-300"
        >{{ old('description', $news->description ?? '') }}</textarea>
    </div>

    <div>
        <label class="block mb-2 font-medium">
            Image
        </label>

        <input
            type="file"
            name="image"
        >
    </div>

    <div>
        <label class="block mb-2 font-medium">
            Thumbnail
        </label>

        <input
            type="file"
            name="thumbnail"
        >
    </div>

    <div>
        <label class="block mb-2 font-medium">
            Status
        </label>

        <select
            name="status"
            class="w-full rounded-2xl border-gray-300"
        >
            <option value="draft">Draft</option>
            <option value="published">Published</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>

    <div class="flex items-center gap-3">

        <input
            type="checkbox"
            name="is_featured"
            value="1"
            {{ old('is_featured', $news->is_featured ?? false) ? 'checked' : '' }}
        >

        <label>
            Featured News
        </label>

    </div>

    <div>
        <label class="block mb-2 font-medium">
            Meta Title
        </label>

        <input
            type="text"
            name="meta_title"
            value="{{ old('meta_title', $news->meta_title ?? '') }}"
            class="w-full rounded-2xl border-gray-300"
        >
    </div>

    <div>
        <label class="block mb-2 font-medium">
            Meta Description
        </label>

        <textarea
            name="meta_description"
            class="w-full rounded-2xl border-gray-300"
        >{{ old('meta_description', $news->meta_description ?? '') }}</textarea>
    </div>

</div>