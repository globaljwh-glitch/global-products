<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- LEFT --}}
    <div class="space-y-4">

        <div>
            <label class="text-sm font-medium">Name</label>
            <input type="text" name="name"
                value="{{ old('name', $brand->name ?? '') }}"
                class="w-full mt-1 border rounded-lg px-3 py-2">
        </div>

        <div>
            <label class="text-sm font-medium">Categories</label>
            <select name="categories[]" multiple
                class="w-full mt-1 border rounded-lg px-3 py-2">

                @foreach($categories as $id => $name)
                    
                        @php
                            $selectedCategories = old('categories', isset($brand) ? $brand->categories->pluck('id')->toArray() : []);
                        @endphp

                        <option value="{{ $id }}"
                            {{ in_array($id, $selectedCategories) ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                @endforeach

            </select>
        </div>

        <div class="flex gap-6">
            <label>
                <input type="checkbox" name="is_featured" value="1"
                    {{ old('is_featured', $brand->is_featured ?? false) ? 'checked' : '' }}>
                Featured
            </label>

            <label>
                <input type="checkbox" name="is_exclusive" value="1"
                    {{ old('is_exclusive', $brand->is_exclusive ?? false) ? 'checked' : '' }}>
                Exclusive
            </label>

            <label>
                <input type="checkbox" name="status" value="1"
                    {{ old('status', $brand->status ?? true) ? 'checked' : '' }}>
                Active
            </label>
        </div>

    </div>

    {{-- RIGHT --}}
    <div class="space-y-4">

        <div>
            <label>Logo</label>
            <input type="file" name="logo" class="w-full mt-1 border rounded-lg p-2">

            @if(!empty($brand->logo))
                <img src="{{ asset('storage/'.$brand->logo) }}" class="w-20 mt-2">
            @endif
        </div>

        <div>
            <label>Banner</label>
            <input type="file" name="banner" class="w-full mt-1 border rounded-lg p-2">

            @if(!empty($brand->banner))
                <img src="{{ asset('storage/'.$brand->banner) }}" class="w-full mt-2 rounded">
            @endif
        </div>

    </div>

</div>