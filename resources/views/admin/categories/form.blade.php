{{-- resources/views/admin/categories/form.blade.php --}}

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

        <div>
            <label class="text-sm font-medium">Parent Category</label>
            <select name="parent_id" class="w-full mt-1 border rounded-lg px-3 py-2">
                <option value="">-- None --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}"
                        {{ old('parent_id', $category->parent_id ?? '') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->label }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Description</label>
            <textarea name="description" class="w-full mt-1 border rounded-lg px-3 py-2">
                {{ old('description', $category->description ?? '') }}
            </textarea>
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
            <textarea name="meta_description"
                class="w-full border rounded-lg px-3 py-2">
                {{ old('meta_description', $category->meta_description ?? '') }}
            </textarea>
        </div>

    </div>

</div>