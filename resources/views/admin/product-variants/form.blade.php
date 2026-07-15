<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">
            Product
        </label>

        <select
            name="product_id"
            id="product_id"
            class="w-full">
        </select>

        @error('product_id')
            <div class="text-red-500 text-sm mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Variant Name --}}
    <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">
            Variant Name
        </label>

        <input type="text"
               name="variant_name"
               value="{{ old('variant_name', $productVariant->variant_name ?? '') }}"
               class="w-full rounded-md border-gray-300"
               required>

        @error('variant_name')
            <div class="text-red-500 text-sm mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="md:col-span-2 mt-4">

        <div class="flex justify-between items-center mb-3">

            <label class="font-medium text-sm">
                Variant Attributes
            </label>

            <button
                type="button"
                id="addAttribute"
                class="px-3 py-2 bg-green-600 text-white rounded">

                + Add Attribute

            </button>

        </div>

        <div id="attributeContainer">

        <div class="grid grid-cols-12 gap-3 attribute-row mb-3">

            <div class="col-span-11">
                <select
                    name="attribute_id[]"
                    class="w-full border rounded-lg attribute-dropdown">
                    <option value="">Select Attribute</option>
                </select>
            </div>

            <div class="col-span-1">
                <button
                    type="button"
                    class="removeRow w-full px-3 py-2 bg-red-600 text-white rounded-lg">
                    Remove
                </button>
            </div>

        </div>

        </div>

    </div>

    {{-- SKU --}}
    <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">
            SKU
        </label>

        <input type="text"
               name="sku"
               value="{{ old('sku', $productVariant->sku ?? '') }}"
               class="w-full rounded-md border-gray-300">
    </div>

    {{-- MOQ --}}
    <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">
            Minimum Quantity
        </label>

        <input type="number"
               name="minimum_quantity"
               value="{{ old('minimum_quantity', $productVariant->minimum_quantity ?? 1) }}"
               class="w-full rounded-md border-gray-300"
               required>
    </div>

    {{-- Stock --}}
    <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">
            Stock
        </label>

        <input type="number"
               name="stock"
               value="{{ old('stock', $productVariant->stock ?? 0) }}"
               class="w-full rounded-md border-gray-300">
    </div>

    {{-- Price --}}
    <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">
            Price
        </label>

        <input type="number"
               step="0.01"
               name="price"
               value="{{ old('price', $productVariant->price ?? '') }}"
               class="w-full rounded-md border-gray-300"
               required>
    </div>

    {{-- Compare Price --}}
    <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">
            Compare Price
        </label>

        <input type="number"
               step="0.01"
               name="compare_price"
               value="{{ old('compare_price', $productVariant->compare_price ?? '') }}"
               class="w-full rounded-md border-gray-300">
    </div>

    {{-- Display Order --}}
    <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">
            Display Order
        </label>

        <input type="number"
               name="display_order"
               value="{{ old('display_order', $productVariant->display_order ?? 0) }}"
               class="w-full rounded-md border-gray-300">
    </div>

    {{-- Status --}}
    <div>
        <label class="block font-medium text-sm text-gray-700 mb-1">
            Status
        </label>

        <select name="status"
                class="w-full rounded-md border-gray-300">

            <option value="1"
                {{ old('status', $productVariant->status ?? 1) == 1 ? 'selected' : '' }}>
                Active
            </option>

            <option value="0"
                {{ old('status', $productVariant->status ?? 1) == 0 ? 'selected' : '' }}>
                Inactive
            </option>

        </select>
    </div>

</div>

<div class="mt-6">
    <button type="submit"
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        Save Variant
    </button>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

let attributeRowTemplate;

$(function () {
    
    attributeRowTemplate = $('.attribute-row:first').clone();

    $('#product_id').select2({
        placeholder: 'Search Product',
        allowClear: true,
        width: '100%',
        minimumInputLength: 2,

        ajax: {
            url: '/admin/products/search',
            dataType: 'json',
            delay: 300,

            data: function (params) {
                return {
                    q: params.term
                };
            },

            processResults: function (data) {
                return {
                    results: data
                };
            }
        }
    });


    // Bind AFTER Select2 initialization
    $('#product_id').on('change', function () {

        let productId = $(this).val();

        console.log('Selected Product:', productId);

        loadAttributes(productId);

    });

    @if(isset($productVariant) && $productVariant->product)

        var option = new Option(
            "{{ $productVariant->product->name }}",
            "{{ $productVariant->product_id }}",
            true,
            true
        );

        $('#product_id').append(option).trigger('change');

    @endif

});


function loadAttributes(productId)
{

    $.ajax({

        url: '/admin/products/' + productId + '/attributes',

        type: 'GET',

        success: function(response){

            // Save for later use
            window.productAttributes = response;

            $('#attributeContainer').empty();

            @if(isset($productVariant))

                let variantAttributes = @json(
                    $productVariant->variantAttributes->pluck('attribute_id')
                );

                variantAttributes.forEach(function(attributeId){

                    addAttributeRow(response, attributeId);

                });

            @else

                // Create page
                addAttributeRow(response);

            @endif
        }

    });

}

function populateAttributeDropdown(dropdown, attributes)
{
    dropdown.empty();

    dropdown.append('<option value="">Select Attribute</option>');

    $.each(attributes, function(index, item){

        dropdown.append(
            '<option value="'+item.id+'">'+item.text+'</option>'
        );

    });
}

function addAttributeRow(attributes, selectedId = '')
{
    let row = attributeRowTemplate.clone();

    populateAttributeDropdown(
        row.find('.attribute-dropdown'),
        attributes
    );

    row.find('.attribute-dropdown').val(selectedId);

    $('#attributeContainer').append(row);
}


$('#addAttribute').on('click', function () {

    addAttributeRow(window.productAttributes);

});

$(document).on('click', '.removeRow', function () {

    if ($('.attribute-row').length == 1) {
        //alert('At least one attribute row is required.');
        Swal.fire({
            icon: 'warning',
            title: 'Cannot Remove',
            text: 'At least one attribute row is required.',
            confirmButtonText: 'OK',
            confirmButtonColor: '#2563eb'
        });
        return;
    }

    $(this).closest('.attribute-row').remove();

});

</script>