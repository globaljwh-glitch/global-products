<div class="grid grid-cols-2 gap-6">

    <div>
        <label>Name</label>
        <input type="text" name="name"
            value="{{ old('name', $attribute->name ?? '') }}"
            class="w-full border rounded px-3 py-2">
    </div>

    <!-- <div>
        <label>Group Name</label>
        <input type="text" name="group_name"
            value="{{ old('group_name', $attribute->group_name ?? '') }}"
            placeholder="e.g. Product Details"
            class="w-full border rounded px-3 py-2">
    </div> -->

    <div>
        <label>Display Order</label>
        <input type="number" name="display_order"
            value="{{ old('display_order', $attribute->display_order ?? 0) }}"
            class="w-full border rounded px-3 py-2">
    </div>

</div>