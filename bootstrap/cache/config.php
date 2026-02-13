<?php return array (
  'app' => 
  array (
    'name' => 'Sahayya',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://localhost',
    'asset_url' => NULL,
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'key' => 'base64:6KGxWWcTOvNhpYEBwmyePe5D4PRoAXREnAWOYqt3VdQ=',
    'cipher' => 'AES-256-CBC',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'Laravel\\Socialite\\SocialiteServiceProvider',
      23 => 'App\\Providers\\AppServiceProvider',
      24 => 'App\\Providers\\AuthServiceProvider',
      25 => 'App\\Providers\\EventServiceProvider',
      26 => 'App\\Providers\\RouteServiceProvider',
      27 => 'Collective\\Html\\HtmlServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'PDF' => 'Meneses\\LaravelMpdf\\Facades\\LaravelMpdf',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Form' => 'Collective\\Html\\FormFacade',
      'HTML' => 'Collective\\Html\\HtmlFacade',
      'Excel' => 'Maatwebsite\\Excel\\Facades\\Excel',
      'Socialite' => 'Laravel\\Socialite\\Facades\\Socialite',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'webs',
      ),
      'admin' => 
      array (
        'driver' => 'session',
        'provider' => 'admins',
      ),
      'api' => 
      array (
        'driver' => 'sanctum',
        'provider' => 'users',
      ),
      'users' => 
      array (
        'driver' => 'session',
        'provider' => 'user',
      ),
      'sanctum' => 
      array (
        'driver' => 'sanctum',
        'provider' => NULL,
      ),
    ),
    'providers' => 
    array (
      'webs' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
      'admins' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\Admin',
      ),
      'user' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
        'throttle' => 60,
      ),
      'admins' => 
      array (
        'provider' => 'admins',
        'table' => 'password_resets',
        'expire' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => NULL,
        'secret' => NULL,
        'app_id' => NULL,
        'options' => 
        array (
          'cluster' => NULL,
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'ably' => 
      array (
        'driver' => 'ably',
        'key' => NULL,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
        'lock_connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '/Users/ankitverma/Desktop/untitled folder/Sahayya_Backend/storage/framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => NULL,
        'secret' => NULL,
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
      'octane' => 
      array (
        'driver' => 'octane',
      ),
    ),
    'prefix' => 'sahayya_cache_',
  ),
  'constants' => 
  array (
    'ALLOWED_TAGS_XSS' => '<iframe><a><strong><b><p><br><i><font><img><h1><h2><h3><h4><h5><h6><span><div><em><table><ul><li><section><thead><tbody><tr><td><figure><article>',
    'DS' => '/',
    'ROOT' => '/Users/ankitverma/Desktop/untitled folder/Sahayya_Backend',
    'APP_PATH' => '/Users/ankitverma/Desktop/untitled folder/Sahayya_Backend/app',
    'NODE_WEBSITE_URL' => NULL,
    'WEBSITE_URL' => 'http://localhost',
    'IMAGE_PATH' => 'http://localhostimg/',
    'IMAGE_ROOT_PATH' => 'img/',
    'LANGUAGE_IMAGE_PATH' => 'http://localhost/uploads/language_image/',
    'LANGUAGE_IMAGE_ROOT_PATH' => 'uploads/language_image/',
    'USER_IMAGE_PATH' => 'http://localhost/uploads/User-image/',
    'USER_IMAGE_ROOT_PATH' => 'uploads/User-image/',
    'SEO_PAGE_IMAGE_IMAGE_PATH' => 'http://localhost/uploads/sep-image/',
    'SEO_PAGE_IMAGE_ROOT_PATH' => 'uploads/sep-image/',
    'CK_EDITOR_URL' => 'http://localhostuploads/ck_editor_images/',
    'CK_EDITOR_ROOT_PATH' => 'uploads/ck_editor_images/',
    'MOBILE_INTRO_IMAGE' => 'http://localhost/uploads/intro-image/',
    'MOBILE_INTRO_IMAGE_ROOT_PATH' => '/uploads/intro-image/',
    'INTRO_SECTION_IMAGE' => 'http://localhost/uploads/intro-section-image/',
    'INTRO_SECTION_IMAGE_ROOT_PATH' => '/uploads/intro-section-image/',
    'CMS_PAGE_IMAGE' => 'http://localhost/uploads/cms-page-image/',
    'CMS_PAGE_IMAGE_ROOT_PATH' => '/uploads/cms-page-image/',
    'ABOUT_AYVA_IMAGE' => 'http://localhost/uploads/about-ayva-image/',
    'ABOUT_AYVA_IMAGE_ROOT_PATH' => '/uploads/about-ayva-image/',
    'CATEGORY_IMAGE' => 'http://localhost/uploads/categories/',
    'CATEGORY_IMAGE_ROOT_PATH' => '/uploads/categories/',
    'PRODUCT_VIDEO_PATH' => 'http://localhost/uploads/product_video/',
    'PRODUCT_VIDEO_ROOT_PATH' => '/uploads/product_video/',
    'REFUND_IMAGE_PATH' => 'http://localhost/uploads/refund_image/',
    'REFUND_IMAGE_ROOT_PATH' => '/uploads/refund_image/',
    'PRODUCT_VIDEO_THUMBNAIL_PATH' => 'http://localhost/uploads/product_video/thumbnail/',
    'PRODUCT_VIDEO_THUMBNAIL_ROOT_PATH' => '/uploads/product_video/thumbnail/',
    'MESSAGE' => 
    array (
      'INACTIVE_MEMBER_STAFF' => 'You can\'t login in site panel, please contact to site admin!',
    ),
    'GENDER' => 
    array (
      1 => 'Men',
      2 => 'Women',
      0 => 'Other',
    ),
    'CUSTOMER' => 
    array (
      'CUSTOMERS_TITLE' => 'Customer',
      'CUSTOMERS_TITLES' => 'Customers',
    ),
    'REPORTS' => 
    array (
      'ORDER_REVENUE_TITLE' => 'Orders & Revenue',
      'MORE_ORDER_PLACED' => 'Customers Who Placed More Orders',
      'ORDER_COMMISSION_TITLE' => 'Orders Commission',
    ),
    'ORDER' => 
    array (
      'ORDER_TITLE' => 'Order',
      'ORDER_TITLES' => 'Orders',
      'ORDER_RETURN' => 'Product Return Details',
    ),
    'PLAN' => 
    array (
      'PLAN_TITLE' => 'Subscription Plan',
      'PLAN_TITLES' => 'Subscription Plans',
    ),
    'PLAN_DURATION' => 
    array (
      'monthly' => 'Monthly',
      'yearly' => 'Yearly',
    ),
    'COUPON' => 
    array (
      'COUPONS_TITLES' => 'Coupons',
      'COUPON_TITLE' => 'coupon',
    ),
    'ENQUIRIE' => 
    array (
      'ENQUIRIE_TITLE' => 'Enquiry',
      'ENQUIRIE_TITLES' => 'Enquiries',
    ),
    'TRANSACTION' => 
    array (
      'TRANSACTION_TITLE' => 'Transaction',
      'TRANSACTION_TITLES' => 'Transactions',
    ),
    'MOBILE_INTRO_SCREEN' => 
    array (
      'MOBILE_INTRO_SCREEN_TITLE' => 'Intro Screen',
      'MOBILE_INTRO_SCREEN_TITLES' => 'Intro Screens',
    ),
    'INTRO_SECTION' => 
    array (
      'INTRO_SECTION_TITLE' => 'Intro Section',
      'INTRO_SECTION_TITLES' => 'Intro Sections',
    ),
    'ABOUT_AYVA' => 
    array (
      'ABOUT_AYVA_TITLE' => 'About Ayva',
      'ABOUT_AYVA_TITLES' => 'About Ayvas',
    ),
    'SEO' => 
    array (
      'SEO_TITLE' => 'Seo pages',
    ),
    'CMS_MANAGER' => 
    array (
      'CMS_PAGES_TITLE' => 'Cms Pages',
      'CMS_PAGE_TITLE' => 'Cms Page',
      'VIEW_PAGE' => 'View Page',
    ),
    'FAQ' => 
    array (
      'FAQ_TITLE' => 'Faq',
      'FAQS_TITLE' => 'Faq\'s',
      'VIEW_PAGE' => 'Faq View',
    ),
    'EMAIL_TEMPLATES' => 
    array (
      'EMAIL_TEMPLATES_TITLE' => 'Email Templates',
      'EMAIL_TEMPLATE_TITLE' => 'Email Template',
    ),
    'EMAIL_LOGS' => 
    array (
      'EMAIL_LOGS_TITLE' => 'Email Logs',
      'EMAIL_DETAIL_TITLE' => 'Email Detail',
    ),
    'LANGUAGE_SETTING' => 
    array (
      'LANGUAGE_SETTINGS_TITLE' => 'Language Setting',
      'LANGUAGE_SETTING_TITLE' => 'Language Setting',
    ),
    'ACL' => 
    array (
      'ACLS_TITLE' => 'Acl',
      'ACL_TITLE' => 'Acl Management',
    ),
    'SETTING' => 
    array (
      'SETTINGS_TITLE' => 'Settings',
      'SETTING_TITLE' => 'Setting',
    ),
    'DESIGNATION' => 
    array (
      'DESIGNATIONS_TITLE' => 'Roles',
      'DESIGNATION_TITLE' => 'Role',
    ),
    'STAFF' => 
    array (
      'STAFFS_TITLE' => 'Staff\'s',
      'STAFF_TITLE' => 'Staff',
    ),
    'CONTACT_QUERY' => 
    array (
      'CONTACT_QUERYS_TITLE' => 'Contact Query\'s',
      'CONTACT_QUERY_TITLE' => 'Contact Query',
    ),
    'COLOR' => 
    array (
      'COLOR_TITLES' => 'Colors',
      'COLOR_TITLE' => 'Color',
    ),
    'SIZE' => 
    array (
      'SIZE_TITLES' => 'Sizes',
      'SIZE_TITLE' => 'Size',
    ),
    'PRODUCT' => 
    array (
      'PRODUCT_TITLES' => 'Products',
      'PRODUCT_TITLE' => 'Product',
    ),
    'CATEGORY' => 
    array (
      'CATEGORY_TITLES' => 'Category',
      'CATEGORY_TITLE' => 'Category',
    ),
    'TESTIMONIAL' => 
    array (
      'TESTIMONIAL_TITLES' => 'Testimonials',
      'TESTIMONIAL_TITLE' => 'Testimonial',
    ),
    'SUBCATEGORY' => 
    array (
      'SUBCATEGORY_TITLES' => 'Sub Category',
      'SUBCATEGORY_TITLE' => 'Sub Category',
    ),
    'ROLE_ID' => 
    array (
      'ADMIN_ID' => 1,
      'SUPER_ADMIN_ROLE_ID' => 1,
      'CUSTOMER_ROLE_ID' => 2,
      'STAFF_ROLE_ID' => 3,
    ),
    'DEFAULT_LANGUAGE' => 
    array (
      'FOLDER_CODE' => 'en',
      'LANGUAGE_CODE' => 1,
      'LANGUAGE_NAME' => 'English',
    ),
    'SETTING_FILE_PATH' => '/Users/ankitverma/Desktop/untitled folder/Sahayya_Backend/config/settings.php',
    'WEBSITE_ADMIN_URL' => '/Users/ankitverma/Desktop/untitled folder/Sahayya_Backend/adminpnlx',
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
      1 => 'sanctum/csrf-cookie',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'railway',
        'prefix' => '',
        'foreign_key_constraints' => true,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => 'tramway.proxy.rlwy.net',
        'port' => '36363',
        'database' => 'railway',
        'username' => 'root',
        'password' => 'vamDoVZyHrfQvgFVNECOUUcKfuqJhFqG',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => 'tramway.proxy.rlwy.net',
        'port' => '36363',
        'database' => 'railway',
        'username' => 'root',
        'password' => 'vamDoVZyHrfQvgFVNECOUUcKfuqJhFqG',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'search_path' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => 'tramway.proxy.rlwy.net',
        'port' => '36363',
        'database' => 'railway',
        'username' => 'root',
        'password' => 'vamDoVZyHrfQvgFVNECOUUcKfuqJhFqG',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'sahayya_database_',
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
      ),
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '/Users/ankitverma/Desktop/untitled folder/Sahayya_Backend/storage/app',
        'throw' => false,
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '/Users/ankitverma/Desktop/untitled folder/Sahayya_Backend/storage/app/public',
        'url' => 'http://localhost/storage',
        'visibility' => 'public',
        'throw' => false,
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => NULL,
        'secret' => NULL,
        'region' => NULL,
        'bucket' => NULL,
        'url' => NULL,
        'endpoint' => NULL,
        'use_path_style_endpoint' => false,
        'throw' => false,
      ),
    ),
    'links' => 
    array (
      '/Users/ankitverma/Desktop/untitled folder/Sahayya_Backend/public/storage' => '/Users/ankitverma/Desktop/untitled folder/Sahayya_Backend/storage/app/public',
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 65536,
      'threads' => 1,
      'time' => 4,
    ),
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'deprecations' => NULL,
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => '/Users/ankitverma/Desktop/untitled folder/Sahayya_Backend/storage/logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => '/Users/ankitverma/Desktop/untitled folder/Sahayya_Backend/storage/logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'debug',
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
          'connectionString' => 'tls://:',
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => '/Users/ankitverma/Desktop/untitled folder/Sahayya_Backend/storage/logs/laravel.log',
      ),
      'deprecations' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'smtp',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'host' => 'smtp.mailgun.org',
        'port' => 587,
        'encryption' => 'tls',
        'username' => NULL,
        'password' => NULL,
        'timeout' => NULL,
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'mailgun' => 
      array (
        'transport' => 'mailgun',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs -i',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
      'failover' => 
      array (
        'transport' => 'failover',
        'mailers' => 
        array (
          0 => 'smtp',
          1 => 'log',
        ),
      ),
    ),
    'from' => 
    array (
      'address' => 'hello@example.com',
      'name' => 'Example',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => '/Users/ankitverma/Desktop/untitled folder/Sahayya_Backend/resources/views/vendor/mail',
      ),
    ),
  ),
  'paytr' => 
  array (
    'credentials' => 
    array (
      'merchant_id' => NULL,
      'merchant_salt' => NULL,
      'merchant_key' => NULL,
    ),
    'options' => 
    array (
      'base_uri' => 'https://www.paytr.com',
      'timeout' => 60,
      'success_url' => NULL,
      'fail_url' => NULL,
      'test_mode' => true,
    ),
    'merchant_id' => NULL,
    'merchant_key' => NULL,
    'merchant_salt' => NULL,
    'api_url' => 'https://www.paytr.com',
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
        'after_commit' => false,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
        'after_commit' => false,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => NULL,
        'secret' => NULL,
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'default',
        'suffix' => NULL,
        'region' => 'us-east-1',
        'after_commit' => false,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
        'after_commit' => false,
      ),
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'sanctum' => 
  array (
    'stateful' => 
    array (
      0 => 'localhost',
      1 => 'localhost:3000',
      2 => '127.0.0.1',
      3 => '127.0.0.1:8000',
      4 => '::1',
      5 => 'localhost',
    ),
    'guard' => 
    array (
      0 => 'web',
    ),
    'expiration' => NULL,
    'token_prefix' => '',
    'middleware' => 
    array (
      'verify_csrf_token' => 'App\\Http\\Middleware\\VerifyCsrfToken',
      'encrypt_cookies' => 'App\\Http\\Middleware\\EncryptCookies',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
      'endpoint' => 'api.mailgun.net',
      'scheme' => 'https',
    ),
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'ses' => 
    array (
      'key' => NULL,
      'secret' => NULL,
      'region' => 'us-east-1',
    ),
    'razorpay' => 
    array (
      'key' => NULL,
      'secret' => NULL,
    ),
    'google' => 
    array (
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => NULL,
    ),
    'recaptcha' => 
    array (
      'site' => NULL,
      'secret' => NULL,
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => '/Users/ankitverma/Desktop/untitled folder/Sahayya_Backend/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'sahayya_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => NULL,
    'http_only' => true,
    'same_site' => 'lax',
  ),
  'Commission' => 
  array (
    'admin_commission_amount' => '40',
  ),
  'contact' => 
  array (
    'address' => 'Calle 123, Madrid - España',
  ),
  'Contact' => 
  array (
    'admin_email' => 'admin@gmail.com',
    'email_address' => 'dummy@mailinator.com',
    'phone' => '00 (123) 456 78 90',
  ),
  'Reading' => 
  array (
    'date_format' => 'm-d-Y',
    'date_time_format' => 'm-d-Y h:i A',
    'records_per_page' => '10',
  ),
  'shipping' => 
  array (
    'shipping_amount' => '10',
  ),
  'Site' => 
  array (
    'apple_play_store' => 'hello',
    'from_email' => 'info@obdemo.com',
    'google_play_store' => 'hello',
    'no_of_exchange_days' => '5',
    'right' => 'Copyright 2024 Avya. All Rights Reserved.',
    'share_text_english' => 'hello ENGLISH',
    'share_text_turkish' => 'hello turkish',
    'title' => 'Avya',
  ),
  'Social' => 
  array (
    'appstore' => 'https://apps.apple.com/us/app/apple-store',
    'facebook' => 'https://www.facebook.com',
    'instagram' => 'https://www.instagram.com/',
    'linkedin' => 'https://www.linkedin.com',
    'playstore' => 'https://play.google.com/store',
    'twitter' => 'https://twitter.com/',
    'youtube' => 'https://www.youtube.com/',
  ),
  'settings' => 1,
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/Users/ankitverma/Desktop/untitled folder/Sahayya_Backend/resources/views',
    ),
    'compiled' => '/Users/ankitverma/Desktop/untitled folder/Sahayya_Backend/storage/framework/views',
  ),
  'dompdf' => 
  array (
    'show_warnings' => false,
    'public_path' => NULL,
    'convert_entities' => true,
    'options' => 
    array (
      'font_dir' => '/Users/ankitverma/Desktop/untitled folder/Sahayya_Backend/storage/fonts',
      'font_cache' => '/Users/ankitverma/Desktop/untitled folder/Sahayya_Backend/storage/fonts',
      'temp_dir' => '/var/folders/xw/8x9398qd5bb6x8qz_r5swnpc0000gn/T',
      'chroot' => '/Users/ankitverma/Desktop/untitled folder/Sahayya_Backend',
      'allowed_protocols' => 
      array (
        'data://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'file://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'http://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'https://' => 
        array (
          'rules' => 
          array (
          ),
        ),
      ),
      'artifactPathValidation' => NULL,
      'log_output_file' => NULL,
      'enable_font_subsetting' => false,
      'pdf_backend' => 'CPDF',
      'default_media_type' => 'screen',
      'default_paper_size' => 'a4',
      'default_paper_orientation' => 'portrait',
      'default_font' => 'serif',
      'dpi' => 96,
      'enable_php' => false,
      'enable_javascript' => true,
      'enable_remote' => false,
      'allowed_remote_hosts' => NULL,
      'font_height_ratio' => 1.1,
      'enable_html5_parser' => true,
    ),
  ),
  'excel' => 
  array (
    'exports' => 
    array (
      'chunk_size' => 1000,
      'pre_calculate_formulas' => false,
      'strict_null_comparison' => false,
      'csv' => 
      array (
        'delimiter' => ',',
        'enclosure' => '"',
        'line_ending' => '
',
        'use_bom' => false,
        'include_separator_line' => false,
        'excel_compatibility' => false,
        'output_encoding' => '',
        'test_auto_detect' => true,
      ),
      'properties' => 
      array (
        'creator' => '',
        'lastModifiedBy' => '',
        'title' => '',
        'description' => '',
        'subject' => '',
        'keywords' => '',
        'category' => '',
        'manager' => '',
        'company' => '',
      ),
    ),
    'imports' => 
    array (
      'read_only' => true,
      'ignore_empty' => false,
      'heading_row' => 
      array (
        'formatter' => 'slug',
      ),
      'csv' => 
      array (
        'delimiter' => NULL,
        'enclosure' => '"',
        'escape_character' => '\\',
        'contiguous' => false,
        'input_encoding' => 'guess',
      ),
      'properties' => 
      array (
        'creator' => '',
        'lastModifiedBy' => '',
        'title' => '',
        'description' => '',
        'subject' => '',
        'keywords' => '',
        'category' => '',
        'manager' => '',
        'company' => '',
      ),
      'cells' => 
      array (
        'middleware' => 
        array (
        ),
      ),
    ),
    'extension_detector' => 
    array (
      'xlsx' => 'Xlsx',
      'xlsm' => 'Xlsx',
      'xltx' => 'Xlsx',
      'xltm' => 'Xlsx',
      'xls' => 'Xls',
      'xlt' => 'Xls',
      'ods' => 'Ods',
      'ots' => 'Ods',
      'slk' => 'Slk',
      'xml' => 'Xml',
      'gnumeric' => 'Gnumeric',
      'htm' => 'Html',
      'html' => 'Html',
      'csv' => 'Csv',
      'tsv' => 'Csv',
      'pdf' => 'Dompdf',
    ),
    'value_binder' => 
    array (
      'default' => 'Maatwebsite\\Excel\\DefaultValueBinder',
    ),
    'cache' => 
    array (
      'driver' => 'memory',
      'batch' => 
      array (
        'memory_limit' => 60000,
      ),
      'illuminate' => 
      array (
        'store' => NULL,
      ),
      'default_ttl' => 10800,
    ),
    'transactions' => 
    array (
      'handler' => 'db',
      'db' => 
      array (
        'connection' => NULL,
      ),
    ),
    'temporary_files' => 
    array (
      'local_path' => '/Users/ankitverma/Desktop/untitled folder/Sahayya_Backend/storage/framework/cache/laravel-excel',
      'local_permissions' => 
      array (
      ),
      'remote_disk' => NULL,
      'remote_prefix' => NULL,
      'force_resync_remote' => NULL,
    ),
  ),
  'flare' => 
  array (
    'key' => NULL,
    'flare_middleware' => 
    array (
      0 => 'Spatie\\FlareClient\\FlareMiddleware\\RemoveRequestIp',
      1 => 'Spatie\\FlareClient\\FlareMiddleware\\AddGitInformation',
      2 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddNotifierName',
      3 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddEnvironmentInformation',
      4 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddExceptionInformation',
      5 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddDumps',
      'Spatie\\LaravelIgnition\\FlareMiddleware\\AddLogs' => 
      array (
        'maximum_number_of_collected_logs' => 200,
      ),
      'Spatie\\LaravelIgnition\\FlareMiddleware\\AddQueries' => 
      array (
        'maximum_number_of_collected_queries' => 200,
        'report_query_bindings' => true,
      ),
      'Spatie\\LaravelIgnition\\FlareMiddleware\\AddJobs' => 
      array (
        'max_chained_job_reporting_depth' => 5,
      ),
      'Spatie\\FlareClient\\FlareMiddleware\\CensorRequestBodyFields' => 
      array (
        'censor_fields' => 
        array (
          0 => 'password',
          1 => 'password_confirmation',
        ),
      ),
      'Spatie\\FlareClient\\FlareMiddleware\\CensorRequestHeaders' => 
      array (
        'headers' => 
        array (
          0 => 'API-KEY',
        ),
      ),
    ),
    'send_logs_as_events' => true,
  ),
  'ignition' => 
  array (
    'editor' => 'phpstorm',
    'theme' => 'auto',
    'enable_share_button' => true,
    'register_commands' => false,
    'solution_providers' => 
    array (
      0 => 'Spatie\\Ignition\\Solutions\\SolutionProviders\\BadMethodCallSolutionProvider',
      1 => 'Spatie\\Ignition\\Solutions\\SolutionProviders\\MergeConflictSolutionProvider',
      2 => 'Spatie\\Ignition\\Solutions\\SolutionProviders\\UndefinedPropertySolutionProvider',
      3 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\IncorrectValetDbCredentialsSolutionProvider',
      4 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingAppKeySolutionProvider',
      5 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\DefaultDbNameSolutionProvider',
      6 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\TableNotFoundSolutionProvider',
      7 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingImportSolutionProvider',
      8 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\InvalidRouteActionSolutionProvider',
      9 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\ViewNotFoundSolutionProvider',
      10 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\RunningLaravelDuskInProductionProvider',
      11 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingColumnSolutionProvider',
      12 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\UnknownValidationSolutionProvider',
      13 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingMixManifestSolutionProvider',
      14 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingViteManifestSolutionProvider',
      15 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingLivewireComponentSolutionProvider',
      16 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\UndefinedViewVariableSolutionProvider',
      17 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\GenericLaravelExceptionSolutionProvider',
    ),
    'ignored_solution_providers' => 
    array (
    ),
    'enable_runnable_solutions' => NULL,
    'remote_sites_path' => '/Users/ankitverma/Desktop/untitled folder/Sahayya_Backend',
    'local_sites_path' => '',
    'housekeeping_endpoint_prefix' => '_ignition',
    'settings_file_path' => '',
    'recorders' => 
    array (
      0 => 'Spatie\\LaravelIgnition\\Recorders\\DumpRecorder\\DumpRecorder',
      1 => 'Spatie\\LaravelIgnition\\Recorders\\JobRecorder\\JobRecorder',
      2 => 'Spatie\\LaravelIgnition\\Recorders\\LogRecorder\\LogRecorder',
      3 => 'Spatie\\LaravelIgnition\\Recorders\\QueryRecorder\\QueryRecorder',
    ),
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
