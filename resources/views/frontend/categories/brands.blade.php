<div class="productCategoriesFilter mt-lg-5 mt-md-4 mt-2">
   <h4 class="text-uppercase">Shop By Brand</h4>
   <ul class="ps-0">
      @foreach($brands_data->take(6) as $br)
      <li><a class="categories-list-group-item categories-list-group-item-action {{ (!empty($brand->id) && $br->id == $brand->id) ? 'active fw-bold ' : '' }}" href="{{ route('products.index', ['type' => 'brand', 'slug' => $br->slug]) }}">
         {{ ucfirst($br->name) }}
      </a></li>
      @endforeach
   </ul>
</div>