<?php 

if (!function_exists('buildCategoryTree')) {
    function buildCategoryTree($categories, $parentId = null, $prefix = '')
    {
        $branch = [];

        foreach ($categories as $category) {
            if ($category->parent_id == $parentId) {
                $category->label = $prefix . $category->name;
                $branch[] = $category;

                $children = buildCategoryTree($categories, $category->id, $prefix . '-- ');
                $branch = array_merge($branch, $children);
            }
        }

        return $branch;
    }
}