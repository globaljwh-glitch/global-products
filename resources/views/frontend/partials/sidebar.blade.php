<div class="col-md-4 col-lg-3">
               <div class="filterByList mt-lg-4 mt-2">
                  <div class="productCategoriesFilter">
                     <h4 class="text-uppercase">Categories</h4>
                     <ul class="ps-0">
                        {{-- Show only 6 categories --}}
                        @foreach($categories_data->take(6) as $category)
                           <li><a href="{{ route('products.index', ['type' => 'category', 'slug' => $category->slug]) }}">
                              {{ ucfirst($category->name) }}</a></li>
                        @endforeach

                        <li class="fw-bold"><a href="/categories">See More +</a></li>
                     </ul>
                  </div>
                    <div class="productCategoriesFilter mt-lg-5 mt-md-4 mt-2">
                        <h4 class="text-uppercase">Shop By Brand</h4>
                        <ul class="ps-0">
                            @foreach($brands_data->take(6) as $brand)
                            <li>
                                <a href="{{ route('products.index', ['type' => 'brand', 'slug' => $brand->slug]) }}">
                                    {{ ucfirst($brand->name) }}
                                </a>
                            </li>
                            @endforeach
                            
                            <li class="fw-bold"><a href="/brands">See More +</a></li>
                        </ul>
                    </div>
                  <div class="productCategoriesFilter mt-lg-5 mt-md-4 mt-2">
                     <h4 class="text-uppercase">Shop By Industry</h4>
                     <ul class="ps-0">
                        @foreach($industries_data->take(6) as $industry)
                            <li>
                                <a href="{{ route('products.index', ['type' => 'industry', 'slug' => $industry->slug]) }}">
                                    {{ ucfirst($industry->name) }}
                                </a>
                            </li>
                        @endforeach
                        
                        <li class="fw-bold"><a href="{{ route('industries.index') }}">See More +</a></li>
                     </ul>
                  </div>
               </div>
            </div>