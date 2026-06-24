<div class="productCategoriesFilter">
    <h4 class="text-uppercase">Categories</h4>
    
     @include('frontend.categories.category-tree',[
          'items'=>$sidebarCategories,
          'category'=>$category,
          'activeCategories'=>$activeCategories,
          'level' => 0
      ])
      
    
 </div>