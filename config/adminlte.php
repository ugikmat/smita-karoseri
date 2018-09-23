<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'Sistem Inventori',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>Smita</b>Karoseri',

    'logo_mini' => '<b>S</b>KR',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        'MAIN NAVIGATION',
        [
            'text'        => 'Dashboard',
            'url'         => 'home',
            'icon'        => 'home',
        ],
        [
            'text'        => 'XL',
            // 'url'         => 'list/users',
            'icon'        => 'phone-square',
            'submenu'     => [
              [
                'text'    => 'Penjualan',
                'icon'    => 'money',
                'submenu' => [
                  [
                      'text'    => 'Penjualan Dompul',
                      'icon'    => 'share',
                      'submenu' => [
                        [
                            'text'  => 'Invoice Dompul',
                            'url'   => '/penjualan/dompul/invoice-dompul',
                            'icon'  => 'credit-card',
                        ],
                        [
                            'text'  => 'List Invoice Dompul',
                            'url'   => '/penjualan/dompul/list-invoice',
                            'icon'  => 'file',
                        ],
                      ],
                  ],
                  [
                    'text'      => 'Penjualan SP',
                    'icon'      => 'share',
                    'submenu'   => [
                      [
                        'text'    => 'Invoice SP',
                        'url'     => '/penjualan/sp/invoice-sp',
                        'icon'    => 'mobile-phone',
                      ],
                      [
                        'text'    => 'List Invoice SP',
                        'url'     => '/penjualan/sp/list-invoice-sp',
                        'icon'    =>  'file',
                      ],
                      [
                        'text'    => 'Pengambilan SP',
                        'url'     => '/penjualan/sp/pengambilan-sp',
                        'icon'    =>  'paste',
                      ],
                    ],
                  ],
                  [
                      'text'    => 'Monitoring Upload',
                      'url'     => '/penjualan/monitoring/mntr-upload',
                      'icon'    => 'play-circle',
                  ],
                  [
                    'text'    => 'Laporan Penjualan',
                    'icon'    => 'share',
                    'submenu' => [
                      [
                        'text'  => 'Dompet Pulsa',
                        'url'   => '/penjualan/laporan-penjualan/LPdompul',
                        'icon'  => 'briefcase',
                      ],
                      [
                        'text'  => 'Penjualan CVS Dompul',
                        'url'   => '/penjualan/laporan-penjualan/LPdompul-cvs',
                        'icon'  => 'user',
                      ],
                      [
                        'text'  => 'Piutang Dompul',
                        'url'   => '/penjualan/laporan-penjualan/LP-piutang-dompul',
                        'icon'  => 'file',
                      ],
                      [
                        'text'  => 'Penjualan Dompul Head',
                        'url'   => '/penjualan/laporan-penjualan/dompul-head',
                        'icon'  => 'money',
                      ],
                      [
                        'text'  => 'Starter Pack',
                        'url'   => '/penjualan/laporan-penjualan/LPsp',
                        'icon'  => 'briefcase',
                      ],
                      [
                        'text'  => 'Penjualan CVS SP',
                        'url'   => '/penjualan/laporan-penjualan/Lbeli-cvs-sp',
                        'icon'  => 'user',
                      ],
                      [
                        'text'  => 'Piutang SP',
                        'url'   => '/penjualan/laporan-penjualan/LP-piutang-sp',
                        'icon'  => 'file',
                      ],
                    ],
                  ],
                ],
              ],
              [
                'text'    => 'Pembelian',
                'icon'    => 'shopping-cart',
                'submenu' => [
                  [
                    'text'    => 'Pembelian Dompul',
                    'icon'    => 'share',
                    'submenu' => [
                      [
                        'text'  => 'Invoice Dompul',
                        'icon'  => 'credit-card',
                        'url'   => '/pembelian/dompul/pembelian-dompul',
                      ],
                      [
                        'text'  =>  'List Invoice Dompul',
                        'icon'  => 'file',
                        'url'   => '/pembelian/dompul/list-pembelian-dompul',
                      ],
                    ],
                  ],
                  [
                    'text'  => 'Pembelian SP',
                    'icon'  => 'share',
                    'submenu' => [
                      [
                        'text'  => 'Invoice SP',
                        'icon'  => 'mobile-phone',
                        'url'   => '/pembelian/sp/pembelian-sp',
                      ],
                      [
                        'text'  => 'List Invoice SP',
                        'icon'  => 'file',
                        'url'   => '/pembelian/sp/list-pembelian-sp',
                      ],
                    ],
                  ],
                  [
                    'text'  => 'Laporan Pembelian',
                    'icon'  => 'share',
                    'submenu' => [
                      [
                        'text'  => 'Dompet Pulsa',
                        'icon'  => 'dollar',
                        'url'   => '/pembelian/laporan-pembelian/Lbeli-dompul',
                      ],
                      [
                        'text'  => 'Starter Pack',
                        'icon'  => 'credit-card',
                        'url'   => '/pembelian/laporan-pembelian/Lbeli-sp',
                      ],
                    ],
                  ],

                ],
              ],
              [
                'text'    => 'Persediaan',
                'icon'    => 'share',
                'submenu' => [
                  [
                    'text'    => 'Dompul',
                    'icon'    => '',
                    'submenu' => [
                      [
                        'text'  => 'Mutasi Stok Dompul',
                        'icon'  => 'truck',
                        'url'   => '/persediaan/dompul/mutasi-dompul',
                      ],
                      [
                        'text'  => 'Dompul per CVS',
                        'icon'  => 'user',
                        'url'   => '/persediaan/dompul/mutasi-dompul-cvs',
                      ],
                      [
                        'text'  => 'Dompul semua CVS',
                        'icon'  => 'users',
                        'url'   => '/persediaan/dompul/mutasi-dompul-semua-cvs',
                      ],
                    ],
                  ],
                  [
                    'text'    => 'SP',
                    'icon'    => '',
                    'submenu' => [
                      [
                        'text'  => 'Mutasi Stok SP',
                        'icon'  => 'tags',
                        'url'   => '/persediaan/sp/mutasi-sp',
                      ],
                      [
                        'text'  => 'SP per CVS',
                        'icon'  => 'user',
                        'url'   => '/persediaan/sp/mutasi-sp-cvs',
                      ],
                      [
                        'text'  => 'SP semua CVS',
                        'icon'  => 'users',
                        'url'   => '/persediaan/sp/mutasi-sp-semua-cvs',
                      ],
                      [
                        'text'  => 'Pengambilan SP',
                        'icon'  => 'paste',
                        'url'   => '/persediaan/sp/pengambilan-sp',
                      ],
                    ],
                  ],
                ],
              ],
              [
                'text'    => 'Upload',
                'url'     => '/upload/dompul',
                'icon'    => 'upload',
              ],
            ],
        ],
        // [
        //     'text'        => 'Karoseri',
        //     'icon'        => 'truck',
        //     'submenu'     => [
        //       [
        //         'text'    => 'Transaksi',
        //         'icon'    => 'money',
        //         'submenu' => [
        //           [
        //               'text'  => 'Penawaran Karoseri',
        //               'url'   => 'karoseri/minta_karoseri',
        //               'icon'  => 'truck',
        //           ],
        //           [
        //               'text'  => 'SPKC',
        //               'url'   => 'karoseri/spkc',
        //               'icon'  => 'user-plus',
        //           ],
        //           [
        //               'text'  => 'Work order',
        //               'url'   => 'karoseri/wo',
        //               'icon'  => 'opencart',
        //           ],
        //           [
        //               'text'  => 'PBB',
        //               'url'   => 'karoseri/pbb',
        //               'icon'  => 'server',
        //           ],
        //           [
        //               'text'  => 'SPKPB',
        //               'url'   => 'karoseri/spkpb',
        //               'icon'  => 'users',
        //           ],
        //           [
        //               'text'  => 'Kasbon',
        //               'url'   => 'karoseri/kasbon',
        //               'icon'  => 'money',
        //           ],
        //           [
        //               'text'  => 'BAP',
        //               'url'   => 'karoseri/bap',
        //               'icon'  => 'newspaper-o',
        //           ],
        //           [
        //               'text'  => 'Surat Jalan',
        //               'url'   => 'karoseri/surat_jalan',
        //               'icon'  => 'envelope-o',
        //           ],
        //         ],
        //       ],
        //       [
        //       'text'    => 'Laporan',
        //       'icon'    => 'tasks',
        //       'submenu' => [
        //         [
        //             'text'    => 'SPKC',
        //             'url'   => 'laporan/lap_spkc',
        //             'icon'    => 'truck',
        //         ],
        //         [
        //             'text'    => 'Penjualan per Customer',
        //             'url'   => 'laporan/lap_penjualan',
        //             'icon'    => 'truck',
        //         ],
        //         [
        //             'text'    => 'Penjualan per Unit',
        //             'url'   => 'laporan/lap_penjualan_unit',
        //             'icon'    => 'truck',
        //         ],
        //         [
        //             'text'    => 'Progress',
        //             'icon'    => 'truck',
        //             'submenu' => [
        //               [
        //                   'text'    => 'Progress Unit',
        //                   'url'   => 'laporan/lap_progress',
        //                   'icon'    => 'truck',
        //               ],
        //               [
        //                   'text'    => 'Progress Pemborong',
        //                   'url'   => 'laporan/lap_progress_pb',
        //                   'icon'    => 'truck',
        //               ],
        //               [
        //               'text'    => 'Detail Pemborong',
        //               'url'   => 'laporan/lap_progress_detailpb',
        //               'icon'    => 'truck',
        //               ],
        //           ],
        //         ],
        //       ],
        //     ],
        //
        //     /*[
        //         'text'    => 'Produksi',
        //         'url'   => 'karoseri/qc_tambah',
        //         'icon'    => 'truck',
        //       ],*/
        //     ],
        // ],

        [
            'text'        => 'Master',
            'icon'        => 'tasks',
            'submenu'     => [
              [
                'text'  => 'User',
                'url'   => '/master/user',
                'icon'  => 'male',
              ],
              [
                'text'  => 'Bank',
                'url'   => '/master/bank',
                'icon'  => 'bank',
              ],
              [
                'text'  => 'Cara Bayar',
                'url'   => '/master/cara_bayar',
                'icon'  => 'money',
              ],
              [
                'text'  => 'PPN',
                'url'   => '/ppn',
                'icon'  => 'money',
              ],
              [
                'text'  => 'Satuan',
                'url'   => '/master/satuan',
                'icon'  => 'inbox',
              ],
              [
                'text'  => 'Supplier',
                'url'   => '/master/supplier',
                'icon'  => 'users',
              ],
              [
                'text'  => 'Customer',
                'url'   => '/customer',
                'icon'  => 'user',
              ],
              [
                'text'  => 'Gudang',
                'url'   => '/gudang',
                'icon'  => 'briefcase',
              ],
              [
                'text'  => 'Lokasi',
                'url'   => '/lokasi',
                'icon'  => 'location-arrow',
              ],
              [
                'text'  => 'Sales',
                'url'   => '/sales',
                'icon'  => 'user-plus',
              ],
              // [
              //   'text'  => 'Pemborong',
              //   'url'   => '/pemborong',
              //   'icon'  => 'users',
              // ],
              [
                'text'  => 'Supervisor',
                'url'   => '/supervisor',
                'icon'  => 'user-secret',
              ],
              [
                'text'  => 'Dompul',
                'url'   => '/master/dompul',
                'icon'  => 'dollar',
              ],
              [
                'text'  => 'Harga Dompul',
                'url'   => '/master/harga_dompul',
                'icon'  => 'money',
              ],

              [
                'text'  => 'SP',
                'url'   => '/master/produk',
                'icon'  => 'credit-card',
              ],
              [
                'text'  => 'Harga SP',
                'url'   => '/master/harga_produk',
                'icon'  => 'money',
              ],
              [
                'text'  => 'Tipe Dompul',
                'url'   => '/master/tipe_dompul',
                'icon'  => 'tag',
              ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => false,
        'chartjs'    => false,
    ],
];
