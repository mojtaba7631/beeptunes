<?php

namespace App\Helper;

use App\Models\Category;

class GetCategoryTitle
{
    static function get_category_title($category_id)
    {
        $category_info = Category::query()
            ->where('id',$category_id)
            ->first();

        return $category_info['cat_title'];

    }
}
