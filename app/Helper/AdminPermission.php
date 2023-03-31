<?php

namespace App\Helper;


class AdminPermission
{
public static function all() {


        $permission = [

            "admins"=>['read','create','update','delete'],
            "users"=>['read','create','update','delete'],
            "products-categories"=>['read','create','update','delete'],
            "products"=>['read','create','update','delete'],
            "products-reviews"=>['read','delete'],
            "orders"=>['read','update'],
            "orders-extra-fees"=>['create','delete'],
            "orders-special-discounts"=>['create','delete'],
            "taxes"=>['read','create','update','delete'],
            "promo-codes"=>['read','create','update','delete'],
            "shippings"=>['read','create','update','delete'],
            "ads-categories"=>['read','create','update','delete'],
            "ads"=>['read','create','update','delete'],
            "home-slider"=>['read','create','update','delete'],
            "countries"=>['read','create','update','delete'],
            "cities"=>['read','create','update','delete'],
            "regions"=>['read','create','update','delete'],
            "contacts"=>['read','create','update','delete'],
            "pages"=>['read','create','update','delete'],
            "blogs"=>['read','create','update','delete'],
            "settings"=>['read','update'],
            'faq-categories' => ['read','create','update','delete'],
            'faqs' => ['read','create','update','delete'],

        ];

        return $permission;

}
}


























