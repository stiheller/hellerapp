<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => '',
    'title_prefix' => 'INTRANET | ',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>INTRANET</b>',
    'logo_img' => 'vendor/adminlte/dist/img/logo.png',
    'logo_img_class' => 'brand-image elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'INTRANET',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' =>true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */
    'classes_auth_card' => 'bg-gradient-dark',
    'classes_auth_header' => '',
    'classes_auth_body' => 'bg-gradient-dark',
    'classes_auth_footer' => 'text-center',
    'classes_auth_icon' => 'fa-fw text-light',
    'classes_auth_btn' => 'btn-flat btn-light',

    /*'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',*/

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-danger elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => true,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => true,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'dash',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        /*[
            'text' => 'search',
            'search' => true,
            'topnav' => true,
        ],*/
        /*[
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],*/

        [
            'text'        => 'Dashboard',
            'url'         => '/dash',
            'icon'        => 'fas fa-tachometer-alt fa-fw',
            /*'label'       => 4,
            'label_color' => 'success',*/
        ],

        /*['header' => 'Menú del Usuario'],*/

        [
            'text'    => 'Utilidades',
            'icon'    => 'fas fa-tools',
            'label'       => 9,
            'label_color' => 'success',
            'submenu' => [
                [
                    'text' => 'Mensaje a Usuario',
                    'route'  => 'admin.users.sendmessage',
                    'icon' => 'fas fa-sms fa-fw'
                ],
                [
                    'text' => 'Centrex',
                    'route'  => 'centrex',
                    'icon' => 'fas fa-mobile-alt fa-fw'
                ],
                [
                    'text' => 'Internos',
                    'route'  => 'internos',
                    'icon' => 'fas fa-phone-volume fa-fw'
                ],

                [
                    'text' => 'Paginas Utiles',
                    'route'  => 'pagutil',
                    'icon'  => 'fas fa-passport fa-fw'
                ],
                [
                    'text' => 'Cambiar Clave',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-lock',
                ],
                [
                    'text' => 'Mis Datos',
                    'route'  => 'profile',
                    'icon' => 'fas fa-user fa-fw',
                ],
                [
                    'text' => 'Correo Institucional',
                    'url'  => 'http://hhheller.org:2084/login.php?idn',
                    'target' => '_blank',
                    'icon'  => 'fas fa-envelope-open-text fa-fw'
                ],
                [
                    'text' => 'Pagina Web',
                    'url'  => 'https://hhheller.org/',
                    'target' => '_blank',
                    'icon' => 'fas fa-globe fa-fw'
                ]

            ],
        ],
        [
            'text'    => 'Personal',
            'icon'    => 'fas fa-user fa-fw',
            'label'       => 4,
            'label_color' => 'success',
            'active'    => ['personal/*'],
            'submenu' => [
                [
                    'text' => 'Formularios',
                    'url'  => '#',
                    'icon' => 'fas fa-file-invoice fa-fw'
                ],
                [
                    'text' => 'Mis Fichadas',
                    'url'  => '#',
                    'icon' => 'fas fa-calendar fa-fw'
                ],
                [
                    'text' => 'Mis Articulos',
                    'url'  => '#',
                    'icon' => 'fas fa-calendar fa-fw'
                ],
                [
                    'text' => 'Mis Datos',
                    'url'  => '#',
                    'icon' => 'fas fa-user fa-fw',
                ]
            ],

        ],

        [
            'text'    => 'STI',
            'icon'    => 'fas fa-laptop-code',
            'label'       => 5,
            'label_color' => 'success',
            'active'    => ['users/*'],
            'can' => 'admin.users.index',
            'submenu' => [
                [
                    'text' => 'Usuarios',
                    'route'  => 'admin.users.index',
                    'icon' => 'fas fas fa-users',
                    'can' => 'admin.users.index'
                ],
                [
                    'text' => 'Roles',
                    'route'  => 'admin.roles.index',
                    'icon' => 'fas fa-house-user fa-fw',
                    'can' => 'admin.roles.index'
                ],
                [
                    'text' => 'Permisos',
                    'route'  => 'admin.permission.index',
                    'icon' => 'fas fa-users-cog fa-fw',
                    'can' => 'admin.permission.index'
                ],
                [
                    'text' => 'Sectores',
                    'route'  => 'admin.sector.index',
                    'icon' => 'fa fa-sitemap fa-fw',
                    'can' => 'admin.sector.index'
                ]


            ],
        ],

        [
            'text'    => 'Inventario',
            'icon'    => 'fas fa-laptop-code',
            'icon_color' => 'green',
            /* 'label'       => 5,
            'label_color' => 'success', */
            'active'    => ['inventario*'],
            'can' => 'admin.users.index',
            'submenu' => [
                [
                    'text'       => 'Inventario',
                    'route'      => 'inventario.principal',/* 'admin.home', */
                    'active' => ['inventario.principal'],
                    'icon'       => 'fas fa-globe fa-fw',
                    'icon_color' => 'cyan',
                ],
                ['header' => 'SETTINGS'],
                [
                    'text' => 'Sectores',
                    'route'  => 'inventario.sectores.index',/* 'admin.sectores.index', */
                    'active' => ['inventario/sectores*'],
                    'icon' => 'fas fa-fw fa-city',
                    'icon_color' => 'indigo',
                ],
                [
                    'text' => 'Switchs',
                    'route'  => 'inventario.conmutadores.index',/* 'admin.conmutadores.index', */
                    'active' => ['inventario/conmutadores*'],
                    'icon' => 'fas fa-fw fa-handshake',
                    'icon_color' => 'orange',
                ],
                [
                    'text' => 'Racks',
                    'route'  => 'inventario.racks.index',/*  'admin.racks.index', */
                    'active' => ['admin/racks*'],
                    'icon' => 'fab fa-fw fa-buffer',
                    'icon_color' => 'cyan',
                ],
                [
                    'text'    => 'Equipamientos',
                    'icon' => 'fas fa-fw fa-truck-monster',
                    'icon_color' => 'green',
                    'active' => ['inventario/cpus*','inventario/monitores*', 'inventario/scanners*', 'inventario/impresoras*'], /*  ['inventario/cpus*', 'inventario/monitores*'], */
                    /* 'url'     => 'admin.users.index', *//* 'admin.home', */
                    'submenu' => [
                        [
                            'text' => "CPU's",
                            'icon' => 'fas fa-fw fa-dice-d6',
                            'icon_color' => 'teal',
                            'active' => ['inventario/cpus*'],
                            'route'  => 'inventario.cpus.index',/*  'admin.cpus.index', */
                        ],
                        [
                            'text'    => 'Monitores',
                            'icon' => 'fas fa-fw fa-desktop',
                            'icon_color' => 'teal',
                            'active' => ['inventario/monitores*'],
                            'route'     => 'inventario.monitores.index',/*  'admin.monitores.index', */
                        ],
                        [
                            'text' => 'Impresoras',
                            'icon' => 'fas fa-fw fa-print',
                            'icon_color' => 'teal',
                            'active' => ['inventario/impresoras*'],
                            'route'  => 'inventario.impresoras.index',/*  'admin.impresoras.index', */
                        ],
                        [
                            'text' => 'Scanners',
                            'icon' => 'fas fa-fw fa-print',
                            'icon_color' => 'teal',
                            'active' => ['inventario/scanners*'],
                            'route'  => 'inventario.scanners.index',/*  'admin.impresoras.index', */
                        ],
                    ],
                ],
                [
                    'text'    => 'Puestos',
                    'icon'    => 'fas fa-fw fa-keyboard',
                    'icon_color' => 'purple',
                    'active' => ['inventario/puestos*'],
                    'route'  => 'inventario.puestos.index',/* 'admin.puestos.index', */
                ],
                ['header' => "####  IP's  ####"],
                [
                    'text'       => "Registro de IP's",
                    'icon_color' => 'red',
                    'icon' => 'fas fa-fw fa-eye',
                    'route'        => 'inventario.ips.index',/*  'admin.ips.index', */
                    'active' => ['admin/ips*'],
                ],


            ],
        ],

        [
            'text'    => 'Comunicación',
            'icon'    => 'fas fa-bullhorn fa-fw',
            'label'       => 1,
            'label_color' => 'success',
            'active'    => ['comunicacion/*'],
            'can' => 'comunicacion.calendario.index',
            'submenu' => [
                [
                    'text' => 'Espacios Institucionales',
                    'route'  => 'comunicacion.calendario.index',
                    'icon' => 'fas fa-calendar fa-fw',
                ]
            ],

        ],
        [
            'text'    => 'Insumos',
            'icon'    => 'fas fa-box fa-fw',
            'label'       => 2,
            'label_color' => 'success',
            'active'    => ['insumos/*'],
            'submenu' => [
                
                [
                    'text' => 'Grupos',
                    'route'  => 'insumos.grupos.index',
                    'icon' => 'fas fa-boxes fa-fw',
                    'can' => 'insumos.grupos.index' 
                ],
                [
                    'text' => 'Insumos',
                    'route'  => 'insumos.insumos.index',
                    'icon' => 'fas fa-list fa-fw'
                ]
            

            ]
        ],

        [
            'text'    => 'Reportes',
            'icon'    => 'fas fa-chart-bar fa-fw',
            'label'       => 2,
            'label_color' => 'success',
            'active'    => ['reports/*'],
            'submenu' => [
                [
                    'text' => 'Impresiones',
                    'route'  => 'admin.impresiones',
                    'icon' => 'fas fa-chart-pie fa-fw',
                    'can' => 'admin.impresiones'

                ],
                [
                    'text' => 'Seguimiento Intranet',
                    'route'  => 'sti.segIntranet',
                    'icon' => 'fas fa-chart-bar fa-fw',
                    'can' => 'sti.segIntranet.index'
                ]
            ],

        ],


        [
            'text'    => 'Home Intranet',
            'icon'    => 'fas fa-home fa-fw',
            'label'       => 2,
            'label_color' => 'success',
            'active'    => ['IntranetHome/*'],
            'can' => 'homeintranet.noticias.index',
            'submenu' => [

                [
                    'text' => 'Novedades',
                    'route'  => 'homeintranet.noticias.index',
                    'icon' => 'fas fa-newspaper fa-fw',
                    'can' => 'homeintranet.noticias.index'
                ],
            ],

        ],


        [
            'text'    => 'Administración',
            'icon'    => 'fas fa-wallet fa-fw',
            'label'       => 5,
            'label_color' => 'success',
            'active'    => ['bancos/*'],
            'can'  => 'administracion.facturas.index',
            'submenu' => [
                [
                    'text' => 'Bancos',
                    'route'  => 'administracion.bancos.index',
                    'icon' => 'fas fa-university fa-fw',
                    'can'  => 'administracion.bancos.index'

                ],

                [
                    'text' => 'Proveedores',
                    'route'  => 'administracion.proveedores.index',
                    'icon' => 'fas fa-truck fa-fw',
                    'can'  => 'administracion.proveedores.index'
                ],
                [
                    'text' => 'Pedidos',
                    'route'  => 'administracion.compras.index',
                    'icon' => 'fas fa-shopping-cart fa-fw',
                    'can'  => 'administracion.compras.index'

                ],
                [
                    'text' => 'Facturas',
                    'route'  => 'administracion.facturas.index',
                    'icon' => 'fas fa-file-invoice fa-fw',
                    'can'  => 'administracion.facturas.index'

                ],
                [
                    'text' => 'Rubros',
                    'route'  => 'administracion.rubro.index',
                    'icon' => 'fas fa-keyboard fa-fw',
                    'can'  => 'administracion.rubro.index'

                ]

            ],

        ],
        [
            'text'    => 'Inspec Servicios',
            'icon'    => 'fa fa-wrench fa-fw',
            'label'       => 2,
            'label_color' => 'success',
            'active'    => ['mnt/*'],

            'submenu' => [

                [
                    'text' => 'Empresas',
                    'route'  => 'mnt.empresa.index',
                    'icon' => 'fa fa-building fa-fw',
                    'can'  => 'mnt.empresa.index'

                ],
                [
                    'text' => 'Ordenes',
                    'route'  => 'mnt.ordenes.index',
                    'icon' => 'fa fa-tasks fa-fw',
                ],
            ],

        ]
        /*['header' => 'labels'],
        [
            'text'       => 'important',
            'icon_color' => 'red',
            'url'        => '#',
        ],
        [
            'text'       => 'warning',
            'icon_color' => 'yellow',
            'url'        => '#',
        ],
        [
            'text'       => 'information',
            'icon_color' => 'cyan',
            'url'        => '#',
        ],*/
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    */

    'livewire' => true,
];
