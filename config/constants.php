<?php
return [
    'db' => [
        'roles' => [
            'admin' => 'admin',
            'customer' => 'customer'
        ],
        'order_statuses' => [
            'In_process',
            'Paid',
            'Completed'
        ]
    ],
    'paginate' => [
        'paginate_product_2' => 2,
        'paginate_product_5' => 5,
        'paginate_product_25' => 25,
        'paginate_product_50' => 50,
        'paginate_product_100' => 100,
        'paginate_category_3' => 3,
        'paginate_category_10' => 10,
        'paginate_order_2' => 2,
    ],
    'emails'=>[
        'admin' => 'admin@gmail.com',
        'new_order' => 'New purchase order has been generated.',
    ]
];
