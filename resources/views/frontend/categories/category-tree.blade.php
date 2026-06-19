<ul class="ps-{{ $level }} blueBg">

@foreach($items as $index=>$cat)

    <li>
        <div class="categories-list-group">
        @if($cat->childrenRecursive->count())

            <a
                class="categories-list-group-item categories-list-group-item-action {{ $cat->id == $category->id ? 'fw-bold text-primary' : '' }}"
                data-bs-toggle="collapse"
                href="#cat{{ $cat->id }}"
                role="button">

                {{ $cat->name }}

            </a>

            <div
                class="collapse subCatBg {{ in_array($cat->id,$activeParents) || $cat->id == $category->id ? 'show' : '' }}"
                id="cat{{ $cat->id }}">

                @include('frontend.categories.category-tree',[
                    'items'=>$cat->childrenRecursive,
                    'category'=>$category,
                    'activeParents'=>$activeParents,
                     'level' => $level + 1

                ])

            </div>

        @else

            <a
                href="{{ url('category/'.$cat->slug) }}"
                class="categories-list-group-item categories-list-group-item-action {{ $cat->id == $category->id ? 'fw-bold text-primary' : '' }}">

                {{ $cat->name }}

            </a>

        @endif
    </div>
    </li>

@endforeach

</ul>