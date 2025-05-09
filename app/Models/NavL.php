<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavL extends Model
{
    public static function getUserNavLinks(){
        return[
            ['id' => 1, 'name' => 'Home', 'href' => '/home'],
            ['id' => 2, 'name' => 'Services', 'href' => '/services'],
            ['id' => 3, 'name' => 'About Us', 'href' => '/about-us'],
            ['id' => 4, 'name' => 'Products', 'href' => '/products'],
            ['id' => 5, 'name' => 'Blog', 'href' => '/blogs'],
            ['id' => 6, 'name' => 'Contact Us', 'href' => '/contact-us'],
        ];
    }

    public static function getAdminNavLinks(){
        return[
            ['id' => 1, 'name' => 'Dashboard', 'href' => 'dashboard'],
        ['id' => 2, 'name' => 'Products', 'href' => 'product.index'],
        ['id' => 3, 'name' => 'Services', 'href' => 'service.index'],
        ['id' => 4, 'name' => 'FQ', 'href' => 'faq.index'],
        ['id' => 5, 'name' => 'Category', 'href' => 'category.index'],
        ['id' => 6, 'name' => 'Blog', 'href' => 'blog.index'],
        ['id' => 7, 'name' => 'User', 'href' => 'user.index'],
        ['id' => 8 ,'name' => 'REG','href' => 'register'],
        ];
    }
}
