<div class="productCategoriesFilter mt-lg-5 mt-md-4 mt-2">
   <h4 class="text-uppercase">Shop By Industry</h4>
   <ul class="ps-0">
      @foreach($industries_data as $ind)
      <li><a class="categories-list-group-item categories-list-group-item-action {{ (!empty($industry->id) && $ind->id == $industry->id) ? 'active fw-bold ' : '' }}" href="{{ route('products.index', ['type' => 'industry', 'slug' => $ind->slug]) }}">
         {{ ucfirst($ind->name) }}
      </a></li>
      @endforeach
   </ul>
</div>