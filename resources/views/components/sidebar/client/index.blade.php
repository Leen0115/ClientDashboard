@php
    $arr = [
        [
            'name' => __('sideBar.overview'),
            'route' => '',
            'bootstrapIcon' => '',
            'children' => [
                [
                    'name' => __('sideBar.dashboard'),
                    'route' => '/client/analytics',
                    'bootstrapIcon' => 'bi bi-columns-gap',
                    'children' => [],
                ],
                [
                    'name' => __('sideBar.activeOrders'),
                    'route' => '/client/orders/active',
                    'bootstrapIcon' => 'bi-list',
                    'children' => [],
                ],
                [
                    'name' => __('sideBar.addOrder'),
                    'route' => '/client/orders/create',
                    'bootstrapIcon' => 'bi-plus-circle',
                    'children' => [],
                ],

                [
                    'name' => __('sideBar.orderHistory'),
                    'route' => '/client/settings/history',
                    'bootstrapIcon' => 'bi-clock-history',
                    'children' => [],
                ],
                [
                    'name' => __('sideBar.documents'),
                    'route' => '',
                    'bootstrapIcon' => 'bi bi-folder',
                    'children' => [
                        [
                            'name' => __('sideBar.reports'),
                            'route' => '/client/settings/reports',
                            'bootstrapIcon' => 'bi bi-bar-chart',
                            'children' => [],
                        ],
                        [
                            'name' => __('sideBar.invoice'),
                            'route' => '',
                            'bootstrapIcon' => 'bi bi-receipt',
                            'children' => [],
                        ],
                        [
                            'name' => __('sideBar.pods'),
                            'route' => '',
                            'bootstrapIcon' => 'bi bi-file-check',
                            'children' => [],
                        ],

                        [
                            'name' => __('sideBar.wallet'),
                            'route' => '/client/settings/wallet',
                            'bootstrapIcon' => 'bi bi-wallet2',
                            'children' => [],
                        ],
                    ],
                ],
            ],
        ],
        [
            'name' => __('sideBar.manageParties'),
            'route' => '',
            'bootstrapIcon' => '',
            'children' => [
                [
                    'name' => __('sideBar.myClients'),
                    'route' => '/client/settings/saved-locations',
                    'bootstrapIcon' => 'bi bi-person-gear',
                    'children' => [],
                ],

                [
                    'name' => __('sideBar.mySuppliers'),
                    'route' => '/client/settings/suppliers',
                    'bootstrapIcon' => 'bi-truck',
                    'children' => [],
                ],
            ],
        ],

        // [
        //     'name' => 'DOCUMENTS',
        //     'route' => '',
        //     'bootstrapIcon' => '',
        //     'children' => [
        //         [
        //             'name' => 'Reports',
        //             'route' => '/client/settings/reports',
        //             'bootstrapIcon' => 'bi bi-bar-chart',
        //             'children' => [],
        //         ],
        //         [
        //             'name' => 'Invoices',
        //             'route' => '',
        //             'bootstrapIcon' => 'bi bi-receipt',
        //             'children' => [],
        //         ],
        //         [
        //             'name' => 'PODs',
        //             'route' => '',
        //             'bootstrapIcon' => 'bi bi-file-check',
        //             'children' => [],
        //         ],

        //         [
        //             'name' => 'Wallet',
        //             'route' => '/client/settings/wallet',
        //             'bootstrapIcon' => 'bi bi-wallet2',
        //             'children' => [],
        //         ],
        //     ],
        // ],

        [
            'name' => __('sideBar.accountDetails'),
            'route' => '',
            'bootstrapIcon' => '',
            'children' => [
                [
                    'name' => __('sideBar.myLocations'),
                    'route' => '',
                    'bootstrapIcon' => 'bi-geo-alt',
                    'children' => [],
                ],
                [
                    'name' => __('sideBar.myEmployees'),
                    'route' => '/client/settings/employees',
                    'bootstrapIcon' => 'bi-people',
                    'children' => [],
                ],
                [
                    'name' => __('sideBar.settings'),
                    'route' => '/client/settings',
                    'bootstrapIcon' => 'bi bi-gear',
                    'children' => [
                        [
                            'name' => __('sideBar.profile'),
                            'route' => '/client/settings/profile',
                            'bootstrapIcon' => 'bi-person-circle',
                            'children' => [],
                        ],

                        // [
                        //     'name' => __('sideBar.language'),
                        //     'route' => '/client/settings/language',
                        //     'bootstrapIcon' => 'bi-translate',
                        //     'children' => [],
                        // ],
                        // [
                        //     'name' => __('sideBar.abouttheApp'),
                        //     'route' => '/client/settings/about',
                        //     'bootstrapIcon' => 'bi-info-circle',
                        //     'children' => [],
                        // ],

                        [
                            'name' => __('sideBar.companyProfile'),
                            'route' => '/client/settings/Companyprofile',
                            'bootstrapIcon' => 'bi bi-buildings',
                            'children' => [],
                        ],
                    ],
                ],
            ],
        ],
        [
            'name' => __('sideBar.support'),
            'route' => '',
            'bootstrapIcon' => 'bi bi-question-circle me-2',
            'isSupport' => true,
            'children' => [
                [
                    'name' => __('sideBar.chatWithUs'),
                    'route' => '/client/settings/contact',
                    'bootstrapIcon' => 'bi-chat-dots',
                    'children' => [],
                ],
                [
                    'name' => __('sideBar.faq'),
                    'route' => '/client/settings/faq',
                    'bootstrapIcon' => 'bi-question-circle',
                    'children' => [],
                ],
                [
                    'name' => __('sideBar.abouttheApp'),
                    'route' => '/client/settings/about',
                    'bootstrapIcon' => 'bi-envelope',
                    'children' => [],
                ],
                [
                    'name' => __('sideBar.howdoestheAppWork'),
                    'route' => '/client/settings/how-it-works',
                    'bootstrapIcon' => 'bi-question-circle',
                    'children' => [],
                ],
                [
                    'name' => __('sideBar.privacy'),
                    'route' => '/client/settings/privacy-policy',
                    'bootstrapIcon' => 'bi-shield-lock',
                    'children' => [],
                ],
                [
                    'name' => __('sideBar.terms'),
                    'route' => '/client/settings/terms',
                    'bootstrapIcon' => 'bi-file-earmark-text',
                    'children' => [],
                ],
            ],
        ],
      

    ];

@endphp
<x-sidebar :arr="$arr" />

<x-sidebar.client.nav :arr="$arr" />