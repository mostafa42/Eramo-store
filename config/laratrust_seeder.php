<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super-admin' => [
            'users' => 'c,r,u,d',
            'admins' => 'c,r,u,d',
            'products-categories' => 'c,r,u,d',
            'products' => 'c,r,u,d',
            'products-reviews' => 'c,r,u,d',
            'orders' => 'c,r,u,d',
            'orders-extra-fees' => 'c,r,u,d',
            'orders-special-discounts' => 'c,r,u,d',
            'taxes' => 'c,r,u,d',
            'promo-codes' => 'c,r,u,d',
            'shippings' => 'c,r,u,d',
            'ads-categories' => 'c,r,u,d',
            'ads' => 'c,r,u,d',
            'home-slider' => 'c,r,u,d',
            'countries' => 'c,r,u,d',
            'cities' => 'c,r,u,d',
            'regions' => 'c,r,u,d',
            'contacts' => 'c,r,u,d',
            'pages' => 'c,r,u,d',
            'blogs' => 'c,r,u,d',
            'settings' => 'c,r,u,d',
            'faq-categories' => 'c,r,u,d',
            'faqs' => 'c,r,u,d',

        ],
        'admin' => [

        ],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
