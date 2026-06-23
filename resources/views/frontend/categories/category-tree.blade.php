<ul class="ps-0 active-{{ $level }}">

@foreach($items as $cat)

    <li>

        <a href="{{ route('products.index', ['type' => 'category', 'slug' => $cat->slug]) }}"
           class="categories-list-group-item categories-list-group-item-action
                  {{(!empty($category->id) && $cat->id == $category->id) ? 'active fw-bold ' : '' }}">

            {{ $cat->name }}

        </a>

        {{-- Show children only if this category is in active path --}}
        @if(
            $cat->childrenRecursive->isNotEmpty()
            && in_array($cat->id, $activeCategories)
        )

            @include('frontend.categories.category-tree', [
                'items' => $cat->childrenRecursive,
                'category' => $category,
                'activeCategories' => $activeCategories,
                'level' => $level + 1
            ])

        @endif

    </li>

@endforeach

</ul>