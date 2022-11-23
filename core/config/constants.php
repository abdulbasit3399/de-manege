<?php
return [

    'image' => [
        'default' => 'assets/images/default.png',
    ],
    
     

    'admin' => [
        'profile' => [
            'path' => 'assets/admin/images/profile',
            'size' => '400x400',
        ],
        'plan_image' => [
             'path' => 'assets/admin/images/plan',
            ],
        'plan_document' => [
            'path' => 'assets/admin/document/plan'
            ]
    ],


    'language' => [
        'path' => 'assets/images/lang',
        'size' => '64x64'
    ],

    'withdraw' => [
        'method' => [
            'path' => 'assets/images/withdraw/method',
            'size' => '800x800',
        ],
        'verify' => [
            'path' => 'assets/images/verify_withdraw'

        ]
    ],
    'deposit' => [
        'gateway' => [
            'path' => 'assets/images/gateway',
            'size' => '800x800',
        ],
        'verify' => [
            'path' => 'assets/images/verify_deposit'

        ]
    ],

    'logoIcon' => [
        'path' => 'assets/images/logoIcon',
    ],

    'favicon' => [
        'size' => '128x128',
    ],

    'user' => [
        'profile' => [
            'path' => 'assets/images/user/profile',
            'size' => '800x800',
        ],
        'document' => [
            'path' => 'assets/images/user/document'
        ]
    ],
    'table' => [
        'default' => 15,
        'preview' => 6,
    ],
    'currency' => [
        'precision' => [
            'crypto' => 8,
            'fiat' => 2,
        ],
        'base' => 'fiat',

    ],

    'seo' => [
        'path' => 'assets/images/seo',
        'size' => '600x315',
    ],

    'plugin' => [
        'path' => 'assets/images/plugin',
    ],
    'stringLimit' => [
        'default' => 40,
    ],

];
