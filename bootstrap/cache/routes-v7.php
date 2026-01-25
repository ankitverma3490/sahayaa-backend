<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/oauth/token' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.token',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/authorize' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.authorize',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.approve',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.deny',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/token/refresh' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.token.refresh',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.tokens.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/clients' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/scopes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.scopes.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/personal-access-tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sanctum.csrf-cookie',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/health-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.healthCheck',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/execute-solution' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.executeSolution',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/update-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.updateConfig',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GlCMwjgCIWvgEynJ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/designations-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TAoh1oB90OPODa4A',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/dashbord-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SQo1IRuhb0T2FIun',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/approved-job' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::E2ZWWIzNktuIT7mI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/quit-job-request' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PcZvPmkjVjX46oSH',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/leave-apply' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qkVWDQZOiVAI48iU',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/leave-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JzCQCb5J1xajgAcV',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/leave-type-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Xa6CLsJmT9QPbPn4',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/earnings/summary' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aU8iq8jeV3PLmkSE',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::clbHzMrqYteZSlm2',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/transaction/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gtazpRYYHaUZA5l3',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/vendor/list/Auth' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uB7EYPg7nDGOQByi',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/signup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::W3vqPiWknMzjyOSx',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/profile/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KqFmUoKJkfEs2RFO',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/service/category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ew04cxU0KAa1uXDu',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/order/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0rqL1YltY4IUCrE7',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/bookings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::R3iQceur9zItyi0E',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/booking-verify' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0CiZwx50wl8ZvAl2',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/bookings/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OBYJm1ddM2iaVeb5',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/wishlist-add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VFqsUlKPRQ5P12kH',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/wishlist' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KChOveoT91yRm1Gz',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/promo-code/highlighted' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cTFvmHgrHoW7If3s',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/cart/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZVfNIlT7lKDTPIP7',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/cart' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nhg3rZaM8QQGq4eQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/cart/clear' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qsSc7AwZovU0V2zi',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/subscriptions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1jLmjO8a9IpxXzCb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/housesold/salary/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8syXmVRybXoHteto',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/housersold/staff/active-today' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GqT2mpyyYvVuvMCc',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/housersold/attendance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'attendance.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'attendance.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/members/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MBZKbILW8szT7Z74',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/members/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PwAtlB7IA3kQlS2x',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/banner' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7PQddZ7HpnElIel2',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vHFVIHRr5lp9XTZA',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/user/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LHewRw5TOVnAolTX',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/vendor/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::K1NWv4fhDUJfMF64',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/banner/delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pFT8Ia9dWZtJYU79',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/auth-jobs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6zXdrEXuhaAsw9Bq',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/jobs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gwXvNMHC70lpXnst',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/faq-support' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QHjCU2IIf7sVooRw',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KsJ0vF0UcAkmblC1',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/subscriptions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::e4nxjsjYVaumbth9',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/getTransactions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9Y4Nd993WqqCjFbW',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/notification-shortcuts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Xh4WVXN4mlkVXljZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4sbT7v7gJKFvhRGA',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/signup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JN3zHKR3fSif6pvr',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/verify-otp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ALkhFmAubEDXmVoH',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/resend-otp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Vl03Ijh22TIEPAEK',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::P2LTa8RgqapLg4Vk',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/cms-page' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::b0eOZPyV9bxABDba',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/subscription-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::c0EaKwkAVWxkbmyM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/cms-page-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nlk2Hz4l0lbwAj7i',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/google' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jUe1tHF2oND6NriM',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/settings/notification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4EKjMC1I39k4usW8',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qkrxt1SoAofYmrGA',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/settings/AutoPresent' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eDLVb5VvujwjnKFY',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eNvPFfwOdkEWmvrz',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/settings/notification/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::x7vkjSV3UxPiE6fd',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/last-work-experience/save' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2qkPY156CtV8koRX',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/category/save' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mvOpxxNeU0I23SoL',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/category/subcategories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5LnWdy7eVfF4fsdt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/applications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JTjjAN6mORhlR9yu',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uJAHzNyXjx0aQ9hb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/jobs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oVkFR7WyI3akbDIj',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/staff/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cNcAqdkMNhdJAfkL',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/staff/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UkOMSdh4HTzXx1St',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/delete-self' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::urtkH3WXYTvElI80',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/delete-user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BwWjAKrgxHnuECK3',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/deleted-users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::k1qgkl73Aaiuk5Qt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/kyc/upload' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hLBCRXaVmNfEASO3',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/addresses' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jGySuaenRZ65NIEf',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/addresses/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kQfZozcLPQJQ0Ndc',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/work-info-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::E6yVrcEfG004ba7I',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/aadhar/send-otp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::evCoT02f4ZE57IAW',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/aadhar/verify' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::M2maTOxfcNSvsq3W',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/aadhar/resend-otp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zMem6DL4z309RRZR',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/aadhar/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JhUjxTTfMLlNYrjr',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qrqxxy9oYnu8DSg3',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/profile/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0dz6o2zn7Vld1opj',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/update/password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::P7nhxntZwXPMwShJ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/delete/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::n6xsG59H1oC4y5Qb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/random-analytics/overview' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::c4zZNyaPgneL3Lzy',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/update/business-profile/2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xkYo0Q8UDtwBe6wD',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/notifications/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oaVsSryiSCzPOY2f',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/notifications/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::giLLzWGgve8sp3Wd',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/bookings/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LmlDv17ZCtra1jS7',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/reviews/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aYHbrA0DuTygiTUb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/reviews/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0iDBTbQXKgCSC4zR',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/reviews/list-self' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VeEr5mmVp56SvvG8',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/mails' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EWeSEVC5uWG2EVzQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CqqAUzsDgGJpgMhp',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/update/business-availability/3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::A8drPF72ajUHZOJX',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/services' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1zdgLmMDZ8a0o1R4',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7xQ9UJwONkJsRwW5',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/supports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ty45SHSdq7BlBXx8',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::v6QUTWJ7CxeEXPLt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/sub-services' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hF1iiZpDhPTEmNRv',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WcGUL1CVIvdLNUK0',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/promo-codes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1YzK3PNQyPW18E7Z',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5U2yVLdFaVlwYFr4',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/bank-accounts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::t1ujZdHD4lXKw3Ia',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RzvJcZOIOacbmXb8',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/vendor-transactions/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wZazUqQMQ0TCoTLD',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/read-all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6hlE3a4hDTBc272W',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/wallet' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6HoT0xYlyq03cy6v',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mKpvXX049RTdKTjZ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/wallet/verify' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dUTI0b8wduhoWzwm',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/transaction/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::T9rycPhTIBnDHfuD',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/appointment/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jCiS3NF83ScRvCnG',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/analytics/customers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SHcDZtlMXxsF2kE7',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/analytics/vendors' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XDLQhuiCgDhZ1wkP',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/subscription/create-order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gUoJVBVKR6lJE83u',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/subscription/verify-payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BHqoJPHks0WXFwOd',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/subscription/current' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wJPWszfGh97ceRiJ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/subscription/history' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::b15FUNRDDKFcSMZO',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/faq-support' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cleXXS0wfMwTFrCY',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KWE7Zq5eCyQ6gilp',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/faq-support-categories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2m63EvY3X8TVQzzU',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/faq-support-search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gyGWiNJfuBPkZ2L2',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/analytics' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fEq1C7EXW2Iazi0Y',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/refer-submit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rqF3yRZWt1ZAhtaj',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::p1L5n6psplmHmstl',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yfvFEVJFYqXwlE2x',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/searching-product' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'product.search',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/signup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dpIZ9MhAgtOJ0AEO',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/forget-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7Gvz5thl23ADl1DF',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/privacy-policy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::woQ3lfr2IgnLVSaK',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/terms-and-Conditions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0AFKrtl3GjwjgdUZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/help-and-support' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MgD32dHHmnltdaUr',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/about-us' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Q0TwXvqFo2f9bTgI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/shipping-policy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Lxli8FMyDEy312EZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/refund-policy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VmNKxIbOV2lBxYLt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/social-media-links' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UJ7vYf05yRcJNT9V',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/social-login/callback' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5FMub2hsdZ4dN3lW',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/contact-us' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pR4v9dj9hqzpjW3k',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/intro-screen' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::v0FaIVdCTfQ1RvqQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/masters' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZuF3w7nZ05Gej37f',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/faqs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cCtEm0TftP2oGE0m',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/initiatePayment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lkqpDi3ERvHWhW7m',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/callback' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fcmTtt64DkLLvIRZ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/initiatePaymentCard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::iQdjUOxHA3v4UBEC',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/paytr/payment/api' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9AStanKWoSYHGqwp',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/paytr/notification/api' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TbbHKtUwi3mBeFpF',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/profile-setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XpImsLr9CQRr33Ex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/update-profile-setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ctJ5E661z2fPMRtT',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VspZMpacbfGRKili',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/account-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PnRlmOd5FD39EdI4',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/update-notification-setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eE90eJkwK7vMfeRR',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/delete-account' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6dKtyR6M9432rtgU',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/update-language' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YlNw52kdwvlBlwc6',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/product-action' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::c3t74ZjHluRw2vPf',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/get-products' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::I076lqpn6OEH40wL',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/add-product' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7ZuPKRfkYLlht264',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/get-profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2TfLm7RCaLxSO13b',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/add-cart' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cart.add',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/update-cart-quantity' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cart.updatequantity',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/remove-cart' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cart.remove',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/cart' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cart.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/add-shipping-address' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'storeshippingAddress',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/mark-as-default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mark_as_default_address',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/shipping-address-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ShoppingAddressList',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/update-shipping-address' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'address.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/enquiry-submit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'enquiry_submit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/order-place' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'order.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/order-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'order.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/order-details' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'order.details',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/coupons-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'CouponsList',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/order-cancel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'OrderCancel',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/order-cancel-single' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'SingleOrderCancel',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/reject-order-single' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'singleorderreject',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/reject-order' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'OrderReject',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/order-refund-all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'OrderRefundAll',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/order-refund-single' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'OrderRefundSingle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/varient-change' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'varient_change',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/order-received-seller-listing' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'received_order',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/order-received-details' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'received_order_details',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/order-received-cancel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'receivedOrderCancel',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/reasons' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reasons',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/products-name-change' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'changeProductsNames',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/apply-coupon' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'applycoupon',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/remove-coupon' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'removecoupon',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/submit-review' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ratingReviewSubmit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/coupons-add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'couponsAdd',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/coupons-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'couponsUpdate',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/coupons-list-vendor' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'couponsListVendor',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/coupons-edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'couponsEdit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/coupons-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'couponsDelete',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/vendor-product-status-change' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'productStatusChangeVendor',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/send-product-enquires' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sendProductEnquiry',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/product-enquires-user-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ProductEnquiryUserList',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/product-enquires-seller-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ProductEnquirySellerList',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/product-enquires-chats' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ProductEnquiryChat',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/user-queries' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'userQuery',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/seller-queries' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sellerQuery',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/product-enquiry-details' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'enquiryDetails',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/notification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'notificationList',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/clear-all-notification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clearAllNotifications',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/follow' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'follow',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/remove-follow' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'removefollow',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/profile-feed' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profileFeed',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/block-users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'block-users',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/block-users-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'block-users-list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user/v1/un-block-users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'un-block-users',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/oauth/(?|tokens/([^/]++)(*:32)|clients/([^/]++)(?|(*:58))|personal\\-access\\-tokens/([^/]++)(*:99))|/api/(?|customer/(?|leave\\-(?|reject/([^/]++)(*:152)|approve/([^/]++)(*:176))|earnings/summary/([^/]++)(*:210)|vendor/([^/]++)(*:233)|s(?|ervice(?|/category/([^/]++)(*:272)|s/([^/]++)/available\\-slots(*:307))|hops/([^/]++)(*:329)|ub\\-category/([^/]++)(*:358))|ca(?|tegory/shops/([^/]++)(*:393)|rt(?|\\-remove/([^/]++)(*:423)|/remove/([^/]++)(*:447)))|booking(?|\\-(?|create/([^/]++)(*:487)|remove/([^/]++)(*:510))|/([^/]++)(?|(*:531)|/cancel(*:546)))|wishlist\\-remove/([^/]++)(*:581)|promo\\-codes/([^/]++)(*:610))|s(?|u(?|b(?|scriptions/show/([^/]++)(*:655)|\\-services/(?|([^/]++)(?|(*:688))|delete/([^/]++)(*:712)))|pports/([^/]++)/reply(*:743))|taff/(?|([^/]++)(*:768)|update/([^/]++)(*:791))|ervices/(?|([^/]++)(?|(*:822))|delete/([^/]++)(*:846)|category/([^/]++)(*:871)|user/([^/]++)(*:892)))|house(?|sold/salary/staff/([^/]++)(?|(*:939))|rsold/attendance/([^/]++)(?|(*:976)))|a(?|dmin/(?|members/([^/]++)(?|(*:1017))|category/update/([^/]++)(*:1051)|jobs/(?|([^/]++)(*:1076)|delete/([^/]++)(*:1100)|([^/]++)/(?|status(*:1127)|applications(*:1148)))|applications/([^/]++)/status(*:1187)|faq\\-support/(?|([^/]++)(*:1220)|update/([^/]++)(*:1244)|delete/([^/]++)(*:1268))|subscriptions/(?|update/([^/]++)(*:1310)|delete/([^/]++)(*:1334))|notification\\-shortcuts/(?|([^/]++)(*:1379)|update/([^/]++)(*:1403)|delete/([^/]++)(*:1427)|send/([^/]++)(*:1449)))|pplications/([^/]++)/delete(*:1487))|jobs/([^/]++)(*:1510)|kyc/status/([^/]++)(*:1538)|delete/member/([^/]++)(*:1569)|notifications/([^/]++)/read(*:1605)|reviews/delete/([^/]++)(*:1637)|mails/([^/]++)(?|(*:1663)|/send(*:1677))|promo\\-codes/(?|([^/]++)(*:1711)|validate(*:1728)|update/([^/]++)(*:1752)|delete/([^/]++)(*:1776))|b(?|ank\\-accounts/(?|([^/]++)(*:1815)|update/([^/]++)(*:1839)|delete/([^/]++)(*:1863)|type/([^/]++)(*:1885)|set/([^/]++)(*:1906))|ooking/(?|accepted/([^/]++)(*:1943)|reject/([^/]++)(*:1967)|completed/([^/]++)(*:1994)))|transactions/([^/]++)/invoice(*:2034)|faq\\-support/(?|([^/]++)(*:2067)|update/([^/]++)(*:2091)|delete/([^/]++)(*:2115)|category/([^/]++)(*:2141))|user/v1/(?|otp/([^/]++)(?:/([^/]++))?(*:2188)|rese(?|nd\\-otp/([^/]++)/([^/]++)(*:2229)|t\\-password/([^/]++)(*:2258))|categor(?|ies(?:/([^/]++))?(*:2295)|y\\-colors\\-list/([^/]++)(*:2328))|product\\-details(?:/([^/]++))?(*:2368)|update\\-product(?:/([^/]++))?(*:2406)|delete\\-(?|product(?:/([^/]++))?(*:2447)|shipping\\-address/([^/]++)(*:2482))|edit\\-shipping\\-address/([^/]++)(*:2524)))|/((?!api).*)(*:2547))/?$}sDu',
    ),
    3 => 
    array (
      32 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.tokens.destroy',
          ),
          1 => 
          array (
            0 => 'token_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      58 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.update',
          ),
          1 => 
          array (
            0 => 'client_id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.destroy',
          ),
          1 => 
          array (
            0 => 'client_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      99 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.destroy',
          ),
          1 => 
          array (
            0 => 'token_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      152 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5VrFlfwrII2Jfhlo',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      176 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8DyCtiRTfk0s12wu',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      210 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::P82soWmUwMM5iBdr',
          ),
          1 => 
          array (
            0 => 'job_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      233 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::D21i97xP0QGIxka3',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      272 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VRdmUyHM9SvRjN5z',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      307 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QHV9IDRH29lRpBr2',
          ),
          1 => 
          array (
            0 => 'serviceId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      329 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IBDEr9JmHQXLcRsg',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      358 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vzDiVqNOD3iZWRu6',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      393 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::c67Llj7STy5Znfie',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      423 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Z4qjXiAZuBtRxgLo',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      447 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5d0M1TkKbHZMUIvu',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      487 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AW5qJnalMWPEbz8X',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      510 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CxxyvXeYEeKsyRK8',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      531 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1tOx1Au3bX5eLKE0',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      546 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QNXZRjlBIKqr22ca',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      581 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::83ByoYd2n1eu51DA',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      610 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MWmPCGXbWKCxjljx',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      655 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PyDRkfU7Z8joIc1s',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      688 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gdYOGecwiLxNZ5VH',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4xZRFQMrlyROArbz',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      712 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ue93yCnta1KScYeM',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      743 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7pzeRvfdemsfyOGY',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      768 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZQSijvuZ1V2gL4xN',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      791 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RHrHqRDVhT91quTz',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      822 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1sR0wz02K1KtsSrS',
          ),
          1 => 
          array (
            0 => 'service',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lPT9yxz2pqSKwnzl',
          ),
          1 => 
          array (
            0 => 'service',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      846 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lA9QnRlYThNhugCo',
          ),
          1 => 
          array (
            0 => 'service',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      871 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5rApkrU7McwnHynw',
          ),
          1 => 
          array (
            0 => 'categoryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      892 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fSzLA3dxBPlXnqb2',
          ),
          1 => 
          array (
            0 => 'userId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      939 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QRcUBeJjdvfObAX3',
          ),
          1 => 
          array (
            0 => 'user_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CgEQ4gTSeHWFc0wQ',
          ),
          1 => 
          array (
            0 => 'user_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      976 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'attendance.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'attendance.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'attendance.update.patch',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        3 => 
        array (
          0 => 
          array (
            '_route' => 'attendance.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1017 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NYJpcgAJfFlSntFN',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9fx7JrltrbOcpYse',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1051 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HpdI8dPLe93Mu8YC',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1076 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TxI7MdLD4YMm9EEw',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1100 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RlxjkZsYzOy5yakm',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1127 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RbboV6J7v5pmxrJy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1148 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::owFTKthOSierPn6G',
          ),
          1 => 
          array (
            0 => 'jobId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1187 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2T9qEXRtZE5nOPHB',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1220 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UaH9RNag931b3YNp',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1244 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Cls6Oa1xjlQiSlXQ',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1268 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4xv0eq67w3HN3a3u',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1310 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ypmciC8j0L1lCjY4',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1334 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IDxe4bmixvgtH7eO',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1379 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1sjdijfs3tFhSkdt',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1403 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rsP1TEbk3mLHCz83',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1427 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aJinSP6ZmaoGrT5C',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1449 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aDFIXQmfZvabeUoL',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1487 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7AfeNmNXwfo9l0Ys',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1510 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qdoRxkBB1aXptcEg',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1538 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dD8ZxoaVizV3gnPW',
          ),
          1 => 
          array (
            0 => 'user_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1569 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EETBwlXI0Pgn09ww',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1605 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CpZ5LDem6XTlkcs0',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1637 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2DrgdaCrEWHEFFdz',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1663 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dZ6jIwpjgv2gSf4Q',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::m69Qbqo3F72l7hAR',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MkcCrxUTmJDeYmbu',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        3 => 
        array (
          0 => 
          array (
            '_route' => 'generated::efIrCplUqeqpODTm',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1677 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::c0IvswAMYm6tiTmu',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1711 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::u5Vvq3a2tL8DJXhg',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1728 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0UCYO2W9wOKgOGJ6',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1752 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8EMgocpujrH74Ut7',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1776 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8YdmWUbmbSb48Eoh',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1815 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dZsrMDCNPnFaZJmO',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1839 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BWykuRja71V9W0J7',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1863 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::arqV59EDM1cu7dH9',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1885 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EKTYHsvgJJ0n14lY',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1906 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TIeGT1ruA0uapJm3',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1943 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VeamyMNWewejvmN2',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1967 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::erYT2WeG3rI5ktz4',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1994 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zcSRYIVzQMHnA01i',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2034 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0FME45HJBDM4O4Xj',
          ),
          1 => 
          array (
            0 => 'transaction',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2067 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::d026pc52JGMOL6QK',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2091 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8rvKOcKnn5hrvnHv',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2115 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::I0R2u8HdXPtJgcjL',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2141 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mBTqz71ntzBy3dSv',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2188 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PhrFS5hKPBXtSqzr',
            'otp_for' => NULL,
          ),
          1 => 
          array (
            0 => 'validate_string',
            1 => 'otp_for',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2229 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8P1yaXsFHN2JzjMi',
          ),
          1 => 
          array (
            0 => 'validate_string',
            1 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2258 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IxgfSGw0qvAfxLe7',
          ),
          1 => 
          array (
            0 => 'validate_string',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2295 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qUontGTyBDinD3Kp',
            'catId' => NULL,
          ),
          1 => 
          array (
            0 => 'catId',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2328 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tV6M50HQNH6rLOYQ',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2368 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::y8SLj73eCOTfIMzZ',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2406 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TV8YRQWu18545v3Q',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2447 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1PfjstL8cuqjtjCs',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2482 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'address.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2524 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'address.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2547 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9oOJneMXS50NwmpC',
          ),
          1 => 
          array (
            0 => 'any',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'passport.token' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/token',
      'action' => 
      array (
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\AccessTokenController@issueToken',
        'as' => 'passport.token',
        'middleware' => 'throttle',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\AccessTokenController@issueToken',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.authorizations.authorize' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/authorize',
      'action' => 
      array (
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizationController@authorize',
        'as' => 'passport.authorizations.authorize',
        'middleware' => 'web',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizationController@authorize',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.token.refresh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/token/refresh',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\TransientTokenController@refresh',
        'as' => 'passport.token.refresh',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\TransientTokenController@refresh',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.authorizations.approve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\ApproveAuthorizationController@approve',
        'as' => 'passport.authorizations.approve',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\ApproveAuthorizationController@approve',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.authorizations.deny' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\DenyAuthorizationController@deny',
        'as' => 'passport.authorizations.deny',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\DenyAuthorizationController@deny',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.tokens.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@forUser',
        'as' => 'passport.tokens.index',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@forUser',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.tokens.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/tokens/{token_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@destroy',
        'as' => 'passport.tokens.destroy',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@destroy',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/clients',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@forUser',
        'as' => 'passport.clients.index',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@forUser',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/clients',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@store',
        'as' => 'passport.clients.store',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@store',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'oauth/clients/{client_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@update',
        'as' => 'passport.clients.update',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@update',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/clients/{client_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@destroy',
        'as' => 'passport.clients.destroy',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@destroy',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.scopes.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/scopes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\ScopeController@all',
        'as' => 'passport.scopes.index',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\ScopeController@all',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/personal-access-tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@forUser',
        'as' => 'passport.personal.tokens.index',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@forUser',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/personal-access-tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@store',
        'as' => 'passport.personal.tokens.store',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@store',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/personal-access-tokens/{token_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@destroy',
        'as' => 'passport.personal.tokens.destroy',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@destroy',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sanctum.csrf-cookie' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'sanctum.csrf-cookie',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.healthCheck' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_ignition/health-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController',
        'as' => 'ignition.healthCheck',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.executeSolution' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/execute-solution',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController',
        'as' => 'ignition.executeSolution',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.updateConfig' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/update-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController',
        'as' => 'ignition.updateConfig',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GlCMwjgCIWvgEynJ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@loginCustomer',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@loginCustomer',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::GlCMwjgCIWvgEynJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TAoh1oB90OPODa4A' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/designations-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@designationsIndex',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@designationsIndex',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::TAoh1oB90OPODa4A',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::SQo1IRuhb0T2FIun' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/dashbord-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SalaryController@getStaffDashboard',
        'controller' => 'App\\Http\\Controllers\\Api\\SalaryController@getStaffDashboard',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::SQo1IRuhb0T2FIun',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::E2ZWWIzNktuIT7mI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/approved-job',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\JobApplicationController@approvedJob',
        'controller' => 'App\\Http\\Controllers\\Api\\JobApplicationController@approvedJob',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::E2ZWWIzNktuIT7mI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PcZvPmkjVjX46oSH' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/quit-job-request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\JobApplicationController@requestQuitJob',
        'controller' => 'App\\Http\\Controllers\\Api\\JobApplicationController@requestQuitJob',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::PcZvPmkjVjX46oSH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qkVWDQZOiVAI48iU' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/leave-apply',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\JobApplicationController@applyLeave',
        'controller' => 'App\\Http\\Controllers\\Api\\JobApplicationController@applyLeave',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::qkVWDQZOiVAI48iU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JzCQCb5J1xajgAcV' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/leave-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\JobApplicationController@leaveList',
        'controller' => 'App\\Http\\Controllers\\Api\\JobApplicationController@leaveList',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::JzCQCb5J1xajgAcV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Xa6CLsJmT9QPbPn4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/leave-type-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\JobApplicationController@leaveTypeList',
        'controller' => 'App\\Http\\Controllers\\Api\\JobApplicationController@leaveTypeList',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::Xa6CLsJmT9QPbPn4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5VrFlfwrII2Jfhlo' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/leave-reject/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\JobApplicationController@reject',
        'controller' => 'App\\Http\\Controllers\\Api\\JobApplicationController@reject',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::5VrFlfwrII2Jfhlo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8DyCtiRTfk0s12wu' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/leave-approve/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\JobApplicationController@approve',
        'controller' => 'App\\Http\\Controllers\\Api\\JobApplicationController@approve',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::8DyCtiRTfk0s12wu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aU8iq8jeV3PLmkSE' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/earnings/summary',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SalaryController@getEarningsSummary',
        'controller' => 'App\\Http\\Controllers\\Api\\SalaryController@getEarningsSummary',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::aU8iq8jeV3PLmkSE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::P82soWmUwMM5iBdr' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/earnings/summary/{job_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SalaryController@getEarningsSummary',
        'controller' => 'App\\Http\\Controllers\\Api\\SalaryController@getEarningsSummary',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::P82soWmUwMM5iBdr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::D21i97xP0QGIxka3' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/vendor/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@vendorDetails',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@vendorDetails',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::D21i97xP0QGIxka3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::clbHzMrqYteZSlm2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BookingController@homeScreen',
        'controller' => 'App\\Http\\Controllers\\Api\\BookingController@homeScreen',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::clbHzMrqYteZSlm2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gtazpRYYHaUZA5l3' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/transaction/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BookingController@transactionList',
        'controller' => 'App\\Http\\Controllers\\Api\\BookingController@transactionList',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::gtazpRYYHaUZA5l3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uB7EYPg7nDGOQByi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/vendor/list/Auth',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@vendorListAuth',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@vendorListAuth',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::uB7EYPg7nDGOQByi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VRdmUyHM9SvRjN5z' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/service/category/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@categoryDetails',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@categoryDetails',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::VRdmUyHM9SvRjN5z',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::W3vqPiWknMzjyOSx' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/signup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@signUpCustomer',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@signUpCustomer',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::W3vqPiWknMzjyOSx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KqFmUoKJkfEs2RFO' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/profile/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@updateProfileCustomer',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@updateProfileCustomer',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::KqFmUoKJkfEs2RFO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Ew04cxU0KAa1uXDu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/service/category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@serviceCategoryList',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@serviceCategoryList',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::Ew04cxU0KAa1uXDu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0rqL1YltY4IUCrE7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/order/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@orderList',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@orderList',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::0rqL1YltY4IUCrE7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::c67Llj7STy5Znfie' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/category/shops/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ServiceController@categoryShopList',
        'controller' => 'App\\Http\\Controllers\\Api\\ServiceController@categoryShopList',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::c67Llj7STy5Znfie',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IBDEr9JmHQXLcRsg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/shops/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ServiceController@shopDetails',
        'controller' => 'App\\Http\\Controllers\\Api\\ServiceController@shopDetails',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::IBDEr9JmHQXLcRsg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::R3iQceur9zItyi0E' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/bookings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BookingController@addBooking',
        'controller' => 'App\\Http\\Controllers\\Api\\BookingController@addBooking',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::R3iQceur9zItyi0E',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::AW5qJnalMWPEbz8X' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/booking-create/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BookingController@bookingCreate',
        'controller' => 'App\\Http\\Controllers\\Api\\BookingController@bookingCreate',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::AW5qJnalMWPEbz8X',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0CiZwx50wl8ZvAl2' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/booking-verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BookingController@verifyBookingPayment',
        'controller' => 'App\\Http\\Controllers\\Api\\BookingController@verifyBookingPayment',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::0CiZwx50wl8ZvAl2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OBYJm1ddM2iaVeb5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/bookings/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BookingController@bookingList',
        'controller' => 'App\\Http\\Controllers\\Api\\BookingController@bookingList',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::OBYJm1ddM2iaVeb5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1tOx1Au3bX5eLKE0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/booking/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BookingController@bookingDetails',
        'controller' => 'App\\Http\\Controllers\\Api\\BookingController@bookingDetails',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::1tOx1Au3bX5eLKE0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QNXZRjlBIKqr22ca' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/booking/{id}/cancel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BookingController@cancelBooking',
        'controller' => 'App\\Http\\Controllers\\Api\\BookingController@cancelBooking',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::QNXZRjlBIKqr22ca',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vzDiVqNOD3iZWRu6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/sub-category/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ServiceController@subcategoryService',
        'controller' => 'App\\Http\\Controllers\\Api\\ServiceController@subcategoryService',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::vzDiVqNOD3iZWRu6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QHV9IDRH29lRpBr2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/services/{serviceId}/available-slots',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ServiceController@getAvailableSlots',
        'controller' => 'App\\Http\\Controllers\\Api\\ServiceController@getAvailableSlots',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::QHV9IDRH29lRpBr2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VFqsUlKPRQ5P12kH' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/wishlist-add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ServiceController@saveWishlist',
        'controller' => 'App\\Http\\Controllers\\Api\\ServiceController@saveWishlist',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::VFqsUlKPRQ5P12kH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::83ByoYd2n1eu51DA' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/wishlist-remove/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ServiceController@removeWishlist',
        'controller' => 'App\\Http\\Controllers\\Api\\ServiceController@removeWishlist',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::83ByoYd2n1eu51DA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CxxyvXeYEeKsyRK8' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/booking-remove/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ServiceController@bookingWishlist',
        'controller' => 'App\\Http\\Controllers\\Api\\ServiceController@bookingWishlist',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::CxxyvXeYEeKsyRK8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Z4qjXiAZuBtRxgLo' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/cart-remove/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ServiceController@cartWishlist',
        'controller' => 'App\\Http\\Controllers\\Api\\ServiceController@cartWishlist',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::Z4qjXiAZuBtRxgLo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KChOveoT91yRm1Gz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/wishlist',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ServiceController@wishlistList',
        'controller' => 'App\\Http\\Controllers\\Api\\ServiceController@wishlistList',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::KChOveoT91yRm1Gz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MWmPCGXbWKCxjljx' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/promo-codes/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ServiceController@promoCodesList',
        'controller' => 'App\\Http\\Controllers\\Api\\ServiceController@promoCodesList',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::MWmPCGXbWKCxjljx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cTFvmHgrHoW7If3s' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/promo-code/highlighted',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ServiceController@promoCodesListHighlighted',
        'controller' => 'App\\Http\\Controllers\\Api\\ServiceController@promoCodesListHighlighted',
        'namespace' => NULL,
        'prefix' => 'api/customer',
        'where' => 
        array (
        ),
        'as' => 'generated::cTFvmHgrHoW7If3s',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZVfNIlT7lKDTPIP7' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/cart/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\CartController@addToCart',
        'controller' => 'App\\Http\\Controllers\\Api\\CartController@addToCart',
        'namespace' => NULL,
        'prefix' => 'api/customer/cart',
        'where' => 
        array (
        ),
        'as' => 'generated::ZVfNIlT7lKDTPIP7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nhg3rZaM8QQGq4eQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/cart',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\CartController@getCart',
        'controller' => 'App\\Http\\Controllers\\Api\\CartController@getCart',
        'namespace' => NULL,
        'prefix' => 'api/customer/cart',
        'where' => 
        array (
        ),
        'as' => 'generated::nhg3rZaM8QQGq4eQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5d0M1TkKbHZMUIvu' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/customer/cart/remove/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\CartController@removeFromCart',
        'controller' => 'App\\Http\\Controllers\\Api\\CartController@removeFromCart',
        'namespace' => NULL,
        'prefix' => 'api/customer/cart',
        'where' => 
        array (
        ),
        'as' => 'generated::5d0M1TkKbHZMUIvu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qsSc7AwZovU0V2zi' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/customer/cart/clear',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\CartController@clearCart',
        'controller' => 'App\\Http\\Controllers\\Api\\CartController@clearCart',
        'namespace' => NULL,
        'prefix' => 'api/customer/cart',
        'where' => 
        array (
        ),
        'as' => 'generated::qsSc7AwZovU0V2zi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1jLmjO8a9IpxXzCb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/subscriptions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SubscriptionController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\SubscriptionController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::1jLmjO8a9IpxXzCb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PyDRkfU7Z8joIc1s' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/subscriptions/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SubscriptionController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\SubscriptionController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::PyDRkfU7Z8joIc1s',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QRcUBeJjdvfObAX3' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/housesold/salary/staff/{user_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SalaryController@getStaffSalary',
        'controller' => 'App\\Http\\Controllers\\Api\\SalaryController@getStaffSalary',
        'namespace' => NULL,
        'prefix' => 'api/housesold/salary',
        'where' => 
        array (
        ),
        'as' => 'generated::QRcUBeJjdvfObAX3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CgEQ4gTSeHWFc0wQ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/housesold/salary/staff/{user_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SalaryController@updateStaffSalary',
        'controller' => 'App\\Http\\Controllers\\Api\\SalaryController@updateStaffSalary',
        'namespace' => NULL,
        'prefix' => 'api/housesold/salary',
        'where' => 
        array (
        ),
        'as' => 'generated::CgEQ4gTSeHWFc0wQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8syXmVRybXoHteto' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/housesold/salary/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SalaryController@getRecentPayments',
        'controller' => 'App\\Http\\Controllers\\Api\\SalaryController@getRecentPayments',
        'namespace' => NULL,
        'prefix' => 'api/housesold/salary',
        'where' => 
        array (
        ),
        'as' => 'generated::8syXmVRybXoHteto',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GqT2mpyyYvVuvMCc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/housersold/staff/active-today',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SalaryController@getTodayActiveStaff',
        'controller' => 'App\\Http\\Controllers\\Api\\SalaryController@getTodayActiveStaff',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::GqT2mpyyYvVuvMCc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'attendance.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/housersold/attendance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\AttendanceController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\AttendanceController@index',
        'namespace' => NULL,
        'prefix' => 'api/housersold/attendance',
        'where' => 
        array (
        ),
        'as' => 'attendance.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'attendance.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/housersold/attendance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\AttendanceController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\AttendanceController@store',
        'namespace' => NULL,
        'prefix' => 'api/housersold/attendance',
        'where' => 
        array (
        ),
        'as' => 'attendance.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'attendance.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/housersold/attendance/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\AttendanceController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\AttendanceController@show',
        'namespace' => NULL,
        'prefix' => 'api/housersold/attendance',
        'where' => 
        array (
        ),
        'as' => 'attendance.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'attendance.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/housersold/attendance/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\AttendanceController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\AttendanceController@update',
        'namespace' => NULL,
        'prefix' => 'api/housersold/attendance',
        'where' => 
        array (
        ),
        'as' => 'attendance.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'attendance.update.patch' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'api/housersold/attendance/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\AttendanceController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\AttendanceController@update',
        'namespace' => NULL,
        'prefix' => 'api/housersold/attendance',
        'where' => 
        array (
        ),
        'as' => 'attendance.update.patch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'attendance.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/housersold/attendance/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\AttendanceController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\AttendanceController@destroy',
        'namespace' => NULL,
        'prefix' => 'api/housersold/attendance',
        'where' => 
        array (
        ),
        'as' => 'attendance.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MBZKbILW8szT7Z74' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/members/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@storeNewMember',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@storeNewMember',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::MBZKbILW8szT7Z74',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PwAtlB7IA3kQlS2x' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/members/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@memberList',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@memberList',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::PwAtlB7IA3kQlS2x',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NYJpcgAJfFlSntFN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/members/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@editMember',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@editMember',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::NYJpcgAJfFlSntFN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9fx7JrltrbOcpYse' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/members/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@updateMember',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@updateMember',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::9fx7JrltrbOcpYse',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7PQddZ7HpnElIel2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/banner',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BannerController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\BannerController@index',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::7PQddZ7HpnElIel2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LHewRw5TOVnAolTX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/user/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@userList',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@userList',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::LHewRw5TOVnAolTX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::K1NWv4fhDUJfMF64' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/vendor/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@vendorList',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@vendorList',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::K1NWv4fhDUJfMF64',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vHFVIHRr5lp9XTZA' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/banner',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BannerController@storeOrUpdate',
        'controller' => 'App\\Http\\Controllers\\Api\\BannerController@storeOrUpdate',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::vHFVIHRr5lp9XTZA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HpdI8dPLe93Mu8YC' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/category/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@categoryUpdate',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@categoryUpdate',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::HpdI8dPLe93Mu8YC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pFT8Ia9dWZtJYU79' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/banner/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BannerController@delete',
        'controller' => 'App\\Http\\Controllers\\Api\\BannerController@delete',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::pFT8Ia9dWZtJYU79',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6zXdrEXuhaAsw9Bq' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/auth-jobs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\JobController@authBaseList',
        'controller' => 'App\\Http\\Controllers\\Api\\JobController@authBaseList',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::6zXdrEXuhaAsw9Bq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gwXvNMHC70lpXnst' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/jobs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\JobController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\JobController@store',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::gwXvNMHC70lpXnst',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TxI7MdLD4YMm9EEw' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/jobs/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\JobController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\JobController@update',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::TxI7MdLD4YMm9EEw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RlxjkZsYzOy5yakm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/jobs/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\JobController@deleteJob',
        'controller' => 'App\\Http\\Controllers\\Api\\JobController@deleteJob',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::RlxjkZsYzOy5yakm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RbboV6J7v5pmxrJy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/jobs/{id}/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\JobController@updateStatus',
        'controller' => 'App\\Http\\Controllers\\Api\\JobController@updateStatus',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::RbboV6J7v5pmxrJy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::owFTKthOSierPn6G' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/jobs/{jobId}/applications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\JobApplicationController@getJobApplications',
        'controller' => 'App\\Http\\Controllers\\Api\\JobApplicationController@getJobApplications',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::owFTKthOSierPn6G',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2T9qEXRtZE5nOPHB' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/applications/{id}/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\JobApplicationController@updateApplicationStatus',
        'controller' => 'App\\Http\\Controllers\\Api\\JobApplicationController@updateApplicationStatus',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::2T9qEXRtZE5nOPHB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QHjCU2IIf7sVooRw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/faq-support',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\FaqSupportController@customerIndex',
        'controller' => 'App\\Http\\Controllers\\Api\\FaqSupportController@customerIndex',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::QHjCU2IIf7sVooRw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UaH9RNag931b3YNp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/faq-support/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\FaqSupportController@customerShow',
        'controller' => 'App\\Http\\Controllers\\Api\\FaqSupportController@customerShow',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::UaH9RNag931b3YNp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KsJ0vF0UcAkmblC1' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/faq-support',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\FaqSupportController@customerStore',
        'controller' => 'App\\Http\\Controllers\\Api\\FaqSupportController@customerStore',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::KsJ0vF0UcAkmblC1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Cls6Oa1xjlQiSlXQ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/faq-support/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\FaqSupportController@customerUpdate',
        'controller' => 'App\\Http\\Controllers\\Api\\FaqSupportController@customerUpdate',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::Cls6Oa1xjlQiSlXQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4xv0eq67w3HN3a3u' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/faq-support/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\FaqSupportController@customerDestroy',
        'controller' => 'App\\Http\\Controllers\\Api\\FaqSupportController@customerDestroy',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::4xv0eq67w3HN3a3u',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::e4nxjsjYVaumbth9' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/subscriptions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SubscriptionController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\SubscriptionController@store',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::e4nxjsjYVaumbth9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ypmciC8j0L1lCjY4' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/subscriptions/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SubscriptionController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\SubscriptionController@update',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::ypmciC8j0L1lCjY4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IDxe4bmixvgtH7eO' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/subscriptions/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SubscriptionController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\SubscriptionController@destroy',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::IDxe4bmixvgtH7eO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9Y4Nd993WqqCjFbW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/getTransactions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BookingController@getTransactions',
        'controller' => 'App\\Http\\Controllers\\Api\\BookingController@getTransactions',
        'namespace' => NULL,
        'prefix' => 'api/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::9Y4Nd993WqqCjFbW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Xh4WVXN4mlkVXljZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/notification-shortcuts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\NotificationShortcutController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\NotificationShortcutController@index',
        'namespace' => NULL,
        'prefix' => 'api/admin/notification-shortcuts',
        'where' => 
        array (
        ),
        'as' => 'generated::Xh4WVXN4mlkVXljZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4sbT7v7gJKFvhRGA' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/notification-shortcuts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\NotificationShortcutController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\NotificationShortcutController@store',
        'namespace' => NULL,
        'prefix' => 'api/admin/notification-shortcuts',
        'where' => 
        array (
        ),
        'as' => 'generated::4sbT7v7gJKFvhRGA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1sjdijfs3tFhSkdt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/notification-shortcuts/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\NotificationShortcutController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\NotificationShortcutController@show',
        'namespace' => NULL,
        'prefix' => 'api/admin/notification-shortcuts',
        'where' => 
        array (
        ),
        'as' => 'generated::1sjdijfs3tFhSkdt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rsP1TEbk3mLHCz83' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/notification-shortcuts/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\NotificationShortcutController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\NotificationShortcutController@update',
        'namespace' => NULL,
        'prefix' => 'api/admin/notification-shortcuts',
        'where' => 
        array (
        ),
        'as' => 'generated::rsP1TEbk3mLHCz83',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aJinSP6ZmaoGrT5C' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/notification-shortcuts/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\NotificationShortcutController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\NotificationShortcutController@destroy',
        'namespace' => NULL,
        'prefix' => 'api/admin/notification-shortcuts',
        'where' => 
        array (
        ),
        'as' => 'generated::aJinSP6ZmaoGrT5C',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aDFIXQmfZvabeUoL' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/notification-shortcuts/send/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\NotificationShortcutController@sendShortcutNotification',
        'controller' => 'App\\Http\\Controllers\\Api\\NotificationShortcutController@sendShortcutNotification',
        'namespace' => NULL,
        'prefix' => 'api/admin/notification-shortcuts',
        'where' => 
        array (
        ),
        'as' => 'generated::aDFIXQmfZvabeUoL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JN3zHKR3fSif6pvr' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/signup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@signUp',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@signUp',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::JN3zHKR3fSif6pvr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ALkhFmAubEDXmVoH' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/verify-otp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@verifyOtp',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@verifyOtp',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ALkhFmAubEDXmVoH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Vl03Ijh22TIEPAEK' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/resend-otp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@resendOtp',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@resendOtp',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Vl03Ijh22TIEPAEK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::P2LTa8RgqapLg4Vk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@categoryList',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@categoryList',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::P2LTa8RgqapLg4Vk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::b0eOZPyV9bxABDba' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/cms-page',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@getCmsData',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@getCmsData',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::b0eOZPyV9bxABDba',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::c0EaKwkAVWxkbmyM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/subscription-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@getSubscriptionList',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@getSubscriptionList',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::c0EaKwkAVWxkbmyM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nlk2Hz4l0lbwAj7i' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/cms-page-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BannerController@updateBody',
        'controller' => 'App\\Http\\Controllers\\Api\\BannerController@updateBody',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::nlk2Hz4l0lbwAj7i',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jUe1tHF2oND6NriM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/google',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@socialLoginCallback',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@socialLoginCallback',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::jUe1tHF2oND6NriM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4EKjMC1I39k4usW8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/settings/notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SettingController@handleNotification',
        'controller' => 'App\\Http\\Controllers\\Api\\SettingController@handleNotification',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::4EKjMC1I39k4usW8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qkrxt1SoAofYmrGA' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/settings/notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SettingController@handleNotification',
        'controller' => 'App\\Http\\Controllers\\Api\\SettingController@handleNotification',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::qkrxt1SoAofYmrGA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::eDLVb5VvujwjnKFY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/settings/AutoPresent',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SettingController@handleAutoPresent',
        'controller' => 'App\\Http\\Controllers\\Api\\SettingController@handleAutoPresent',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::eDLVb5VvujwjnKFY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::eNvPFfwOdkEWmvrz' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/settings/AutoPresent',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SettingController@handleAutoPresent',
        'controller' => 'App\\Http\\Controllers\\Api\\SettingController@handleAutoPresent',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::eNvPFfwOdkEWmvrz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::x7vkjSV3UxPiE6fd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/settings/notification/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SettingController@handleNotification',
        'controller' => 'App\\Http\\Controllers\\Api\\SettingController@handleNotification',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::x7vkjSV3UxPiE6fd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2qkPY156CtV8koRX' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/last-work-experience/save',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@saveLastWorkExperience',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@saveLastWorkExperience',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::2qkPY156CtV8koRX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mvOpxxNeU0I23SoL' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/category/save',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@storeOrUpdate',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@storeOrUpdate',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::mvOpxxNeU0I23SoL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5LnWdy7eVfF4fsdt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/category/subcategories',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@listSubcategories',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@listSubcategories',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::5LnWdy7eVfF4fsdt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JTjjAN6mORhlR9yu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/applications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\JobApplicationController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\JobApplicationController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::JTjjAN6mORhlR9yu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uJAHzNyXjx0aQ9hb' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/applications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\JobApplicationController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\JobApplicationController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::uJAHzNyXjx0aQ9hb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7AfeNmNXwfo9l0Ys' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/applications/{id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\JobApplicationController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\JobApplicationController@destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::7AfeNmNXwfo9l0Ys',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::oVkFR7WyI3akbDIj' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/jobs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\JobController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\JobController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::oVkFR7WyI3akbDIj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cNcAqdkMNhdJAfkL' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/staff/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@addStaff',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@addStaff',
        'namespace' => NULL,
        'prefix' => 'api/staff',
        'where' => 
        array (
        ),
        'as' => 'generated::cNcAqdkMNhdJAfkL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UkOMSdh4HTzXx1St' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/staff/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@getStaffList',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@getStaffList',
        'namespace' => NULL,
        'prefix' => 'api/staff',
        'where' => 
        array (
        ),
        'as' => 'generated::UkOMSdh4HTzXx1St',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZQSijvuZ1V2gL4xN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/staff/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@getStaffDetails',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@getStaffDetails',
        'namespace' => NULL,
        'prefix' => 'api/staff',
        'where' => 
        array (
        ),
        'as' => 'generated::ZQSijvuZ1V2gL4xN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RHrHqRDVhT91quTz' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/staff/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@updateStaff',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@updateStaff',
        'namespace' => NULL,
        'prefix' => 'api/staff',
        'where' => 
        array (
        ),
        'as' => 'generated::RHrHqRDVhT91quTz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qdoRxkBB1aXptcEg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/jobs/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\JobController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\JobController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::qdoRxkBB1aXptcEg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::urtkH3WXYTvElI80' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/delete-self',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@deleteSelfAccount',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@deleteSelfAccount',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::urtkH3WXYTvElI80',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BwWjAKrgxHnuECK3' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/delete-user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@deleteUserByAdmin',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@deleteUserByAdmin',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::BwWjAKrgxHnuECK3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::k1qgkl73Aaiuk5Qt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/deleted-users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@getDeletedUsers',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@getDeletedUsers',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::k1qgkl73Aaiuk5Qt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hLBCRXaVmNfEASO3' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/kyc/upload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\KycVerificationController@updateOrCreateKyc',
        'controller' => 'App\\Http\\Controllers\\Api\\KycVerificationController@updateOrCreateKyc',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::hLBCRXaVmNfEASO3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dD8ZxoaVizV3gnPW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/kyc/status/{user_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\KycVerificationController@getKycStatus',
        'controller' => 'App\\Http\\Controllers\\Api\\KycVerificationController@getKycStatus',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::dD8ZxoaVizV3gnPW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jGySuaenRZ65NIEf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/addresses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@addressIndex',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@addressIndex',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::jGySuaenRZ65NIEf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kQfZozcLPQJQ0Ndc' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/addresses/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@addressUpdate',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@addressUpdate',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::kQfZozcLPQJQ0Ndc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::E6yVrcEfG004ba7I' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/work-info-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@updateOrCreateWorkInfo',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@updateOrCreateWorkInfo',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::E6yVrcEfG004ba7I',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::evCoT02f4ZE57IAW' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/aadhar/send-otp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@saveAadharAndSendOtp',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@saveAadharAndSendOtp',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::evCoT02f4ZE57IAW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::M2maTOxfcNSvsq3W' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/aadhar/verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@aadharVerifyOtp',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@aadharVerifyOtp',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::M2maTOxfcNSvsq3W',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zMem6DL4z309RRZR' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/aadhar/resend-otp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@resendAadharOtp',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@resendAadharOtp',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::zMem6DL4z309RRZR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JhUjxTTfMLlNYrjr' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/aadhar/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@getAadharStatus',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@getAadharStatus',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::JhUjxTTfMLlNYrjr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qrqxxy9oYnu8DSg3' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@getProfile',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@getProfile',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::qrqxxy9oYnu8DSg3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0dz6o2zn7Vld1opj' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/profile/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@updateProfile',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@updateProfile',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::0dz6o2zn7Vld1opj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::P7nhxntZwXPMwShJ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/update/password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@resetPassword',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@resetPassword',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::P7nhxntZwXPMwShJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::n6xsG59H1oC4y5Qb' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/delete/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@deleteAcc',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@deleteAcc',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::n6xsG59H1oC4y5Qb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EETBwlXI0Pgn09ww' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/delete/member/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@deleteAccUser',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@deleteAccUser',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::EETBwlXI0Pgn09ww',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::c4zZNyaPgneL3Lzy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/random-analytics/overview',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@overview',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@overview',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::c4zZNyaPgneL3Lzy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xkYo0Q8UDtwBe6wD' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/update/business-profile/2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@completeBusinessProfile',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@completeBusinessProfile',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::xkYo0Q8UDtwBe6wD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::oaVsSryiSCzPOY2f' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/notifications/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@notificationAdd',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@notificationAdd',
        'namespace' => NULL,
        'prefix' => 'api/notifications',
        'where' => 
        array (
        ),
        'as' => 'generated::oaVsSryiSCzPOY2f',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::giLLzWGgve8sp3Wd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/notifications/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@notificationList',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@notificationList',
        'namespace' => NULL,
        'prefix' => 'api/notifications',
        'where' => 
        array (
        ),
        'as' => 'generated::giLLzWGgve8sp3Wd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CpZ5LDem6XTlkcs0' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/notifications/{id}/read',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@notificationMarkAsRead',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@notificationMarkAsRead',
        'namespace' => NULL,
        'prefix' => 'api/notifications',
        'where' => 
        array (
        ),
        'as' => 'generated::CpZ5LDem6XTlkcs0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LmlDv17ZCtra1jS7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/bookings/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BookingController@vendorBookingList',
        'controller' => 'App\\Http\\Controllers\\Api\\BookingController@vendorBookingList',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::LmlDv17ZCtra1jS7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aYHbrA0DuTygiTUb' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/reviews/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ReviewController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\ReviewController@store',
        'namespace' => NULL,
        'prefix' => 'api/reviews',
        'where' => 
        array (
        ),
        'as' => 'generated::aYHbrA0DuTygiTUb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0iDBTbQXKgCSC4zR' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/reviews/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ReviewController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\ReviewController@index',
        'namespace' => NULL,
        'prefix' => 'api/reviews',
        'where' => 
        array (
        ),
        'as' => 'generated::0iDBTbQXKgCSC4zR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VeEr5mmVp56SvvG8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/reviews/list-self',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ReviewController@selfIndex',
        'controller' => 'App\\Http\\Controllers\\Api\\ReviewController@selfIndex',
        'namespace' => NULL,
        'prefix' => 'api/reviews',
        'where' => 
        array (
        ),
        'as' => 'generated::VeEr5mmVp56SvvG8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2DrgdaCrEWHEFFdz' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/reviews/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ReviewController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\ReviewController@destroy',
        'namespace' => NULL,
        'prefix' => 'api/reviews',
        'where' => 
        array (
        ),
        'as' => 'generated::2DrgdaCrEWHEFFdz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EWeSEVC5uWG2EVzQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/mails',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\MailShortcutController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\MailShortcutController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::EWeSEVC5uWG2EVzQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CqqAUzsDgGJpgMhp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/mails',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\MailShortcutController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\MailShortcutController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::CqqAUzsDgGJpgMhp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dZ6jIwpjgv2gSf4Q' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/mails/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\MailShortcutController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\MailShortcutController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::dZ6jIwpjgv2gSf4Q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::m69Qbqo3F72l7hAR' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/mails/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\MailShortcutController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\MailShortcutController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::m69Qbqo3F72l7hAR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MkcCrxUTmJDeYmbu' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'api/mails/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\MailShortcutController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\MailShortcutController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::MkcCrxUTmJDeYmbu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::efIrCplUqeqpODTm' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/mails/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\MailShortcutController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\MailShortcutController@destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::efIrCplUqeqpODTm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::c0IvswAMYm6tiTmu' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/mails/{id}/send',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\MailShortcutController@sendShortcutMail',
        'controller' => 'App\\Http\\Controllers\\Api\\MailShortcutController@sendShortcutMail',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::c0IvswAMYm6tiTmu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::A8drPF72ajUHZOJX' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/update/business-availability/3',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@setBusinessAvailability',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@setBusinessAvailability',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::A8drPF72ajUHZOJX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1zdgLmMDZ8a0o1R4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/services',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ServiceController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\ServiceController@index',
        'namespace' => NULL,
        'prefix' => 'api/services',
        'where' => 
        array (
        ),
        'as' => 'generated::1zdgLmMDZ8a0o1R4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7xQ9UJwONkJsRwW5' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/services',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ServiceController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\ServiceController@store',
        'namespace' => NULL,
        'prefix' => 'api/services',
        'where' => 
        array (
        ),
        'as' => 'generated::7xQ9UJwONkJsRwW5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1sR0wz02K1KtsSrS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/services/{service}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ServiceController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\ServiceController@show',
        'namespace' => NULL,
        'prefix' => 'api/services',
        'where' => 
        array (
        ),
        'as' => 'generated::1sR0wz02K1KtsSrS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lPT9yxz2pqSKwnzl' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/services/{service}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ServiceController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\ServiceController@update',
        'namespace' => NULL,
        'prefix' => 'api/services',
        'where' => 
        array (
        ),
        'as' => 'generated::lPT9yxz2pqSKwnzl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lA9QnRlYThNhugCo' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/services/delete/{service}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ServiceController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\ServiceController@destroy',
        'namespace' => NULL,
        'prefix' => 'api/services',
        'where' => 
        array (
        ),
        'as' => 'generated::lA9QnRlYThNhugCo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5rApkrU7McwnHynw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/services/category/{categoryId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ServiceController@getByCategory',
        'controller' => 'App\\Http\\Controllers\\Api\\ServiceController@getByCategory',
        'namespace' => NULL,
        'prefix' => 'api/services',
        'where' => 
        array (
        ),
        'as' => 'generated::5rApkrU7McwnHynw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fSzLA3dxBPlXnqb2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/services/user/{userId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\ServiceController@getByUser',
        'controller' => 'App\\Http\\Controllers\\Api\\ServiceController@getByUser',
        'namespace' => NULL,
        'prefix' => 'api/services',
        'where' => 
        array (
        ),
        'as' => 'generated::fSzLA3dxBPlXnqb2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ty45SHSdq7BlBXx8' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/supports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SupportController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\SupportController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ty45SHSdq7BlBXx8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::v6QUTWJ7CxeEXPLt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/supports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SupportController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\SupportController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::v6QUTWJ7CxeEXPLt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7pzeRvfdemsfyOGY' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/supports/{id}/reply',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SupportController@reply',
        'controller' => 'App\\Http\\Controllers\\Api\\SupportController@reply',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::7pzeRvfdemsfyOGY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hF1iiZpDhPTEmNRv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/sub-services',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SubServiceController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\SubServiceController@index',
        'namespace' => NULL,
        'prefix' => 'api/sub-services',
        'where' => 
        array (
        ),
        'as' => 'generated::hF1iiZpDhPTEmNRv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gdYOGecwiLxNZ5VH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/sub-services/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SubServiceController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\SubServiceController@show',
        'namespace' => NULL,
        'prefix' => 'api/sub-services',
        'where' => 
        array (
        ),
        'as' => 'generated::gdYOGecwiLxNZ5VH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WcGUL1CVIvdLNUK0' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/sub-services',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SubServiceController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\SubServiceController@store',
        'namespace' => NULL,
        'prefix' => 'api/sub-services',
        'where' => 
        array (
        ),
        'as' => 'generated::WcGUL1CVIvdLNUK0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4xZRFQMrlyROArbz' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/sub-services/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SubServiceController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\SubServiceController@update',
        'namespace' => NULL,
        'prefix' => 'api/sub-services',
        'where' => 
        array (
        ),
        'as' => 'generated::4xZRFQMrlyROArbz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ue93yCnta1KScYeM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/sub-services/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SubServiceController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\SubServiceController@destroy',
        'namespace' => NULL,
        'prefix' => 'api/sub-services',
        'where' => 
        array (
        ),
        'as' => 'generated::ue93yCnta1KScYeM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1YzK3PNQyPW18E7Z' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/promo-codes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PromoCodeController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\PromoCodeController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::1YzK3PNQyPW18E7Z',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::u5Vvq3a2tL8DJXhg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/promo-codes/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PromoCodeController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\PromoCodeController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::u5Vvq3a2tL8DJXhg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5U2yVLdFaVlwYFr4' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/promo-codes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PromoCodeController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\PromoCodeController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::5U2yVLdFaVlwYFr4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0UCYO2W9wOKgOGJ6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/promo-codes/validate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PromoCodeController@validatePromoCode',
        'controller' => 'App\\Http\\Controllers\\Api\\PromoCodeController@validatePromoCode',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::0UCYO2W9wOKgOGJ6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8EMgocpujrH74Ut7' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/promo-codes/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PromoCodeController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\PromoCodeController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::8EMgocpujrH74Ut7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8YdmWUbmbSb48Eoh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/promo-codes/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PromoCodeController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\PromoCodeController@destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::8YdmWUbmbSb48Eoh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::t1ujZdHD4lXKw3Ia' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/bank-accounts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BankAccountController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\BankAccountController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::t1ujZdHD4lXKw3Ia',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dZsrMDCNPnFaZJmO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/bank-accounts/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BankAccountController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\BankAccountController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::dZsrMDCNPnFaZJmO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RzvJcZOIOacbmXb8' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/bank-accounts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BankAccountController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\BankAccountController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::RzvJcZOIOacbmXb8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BWykuRja71V9W0J7' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/bank-accounts/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BankAccountController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\BankAccountController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::BWykuRja71V9W0J7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::arqV59EDM1cu7dH9' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/bank-accounts/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BankAccountController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\BankAccountController@destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::arqV59EDM1cu7dH9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EKTYHsvgJJ0n14lY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/bank-accounts/type/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BankAccountController@getByType',
        'controller' => 'App\\Http\\Controllers\\Api\\BankAccountController@getByType',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::EKTYHsvgJJ0n14lY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TIeGT1ruA0uapJm3' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/bank-accounts/set/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BankAccountController@setAcc',
        'controller' => 'App\\Http\\Controllers\\Api\\BankAccountController@setAcc',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::TIeGT1ruA0uapJm3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wZazUqQMQ0TCoTLD' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/vendor-transactions/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BankAccountController@vendorTransactionsList',
        'controller' => 'App\\Http\\Controllers\\Api\\BankAccountController@vendorTransactionsList',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::wZazUqQMQ0TCoTLD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6hlE3a4hDTBc272W' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/read-all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@readAll',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@readAll',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::6hlE3a4hDTBc272W',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0FME45HJBDM4O4Xj' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/transactions/{transaction}/invoice',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'TransactionController@downloadInvoice',
        'controller' => 'TransactionController@downloadInvoice',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::0FME45HJBDM4O4Xj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6HoT0xYlyq03cy6v' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/wallet',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\WalletController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\WalletController@index',
        'namespace' => NULL,
        'prefix' => 'api/wallet',
        'where' => 
        array (
        ),
        'as' => 'generated::6HoT0xYlyq03cy6v',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mKpvXX049RTdKTjZ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/wallet',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\WalletController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\WalletController@store',
        'namespace' => NULL,
        'prefix' => 'api/wallet',
        'where' => 
        array (
        ),
        'as' => 'generated::mKpvXX049RTdKTjZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dUTI0b8wduhoWzwm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/wallet/verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\WalletController@verifyAndCreditWallet',
        'controller' => 'App\\Http\\Controllers\\Api\\WalletController@verifyAndCreditWallet',
        'namespace' => NULL,
        'prefix' => 'api/wallet',
        'where' => 
        array (
        ),
        'as' => 'generated::dUTI0b8wduhoWzwm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::T9rycPhTIBnDHfuD' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/transaction/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BookingController@vendorTransactionList',
        'controller' => 'App\\Http\\Controllers\\Api\\BookingController@vendorTransactionList',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::T9rycPhTIBnDHfuD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jCiS3NF83ScRvCnG' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/appointment/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@appointmentList',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@appointmentList',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::jCiS3NF83ScRvCnG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VeamyMNWewejvmN2' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/booking/accepted/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BookingController@acceptBooking',
        'controller' => 'App\\Http\\Controllers\\Api\\BookingController@acceptBooking',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::VeamyMNWewejvmN2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::erYT2WeG3rI5ktz4' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/booking/reject/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BookingController@rejectBooking',
        'controller' => 'App\\Http\\Controllers\\Api\\BookingController@rejectBooking',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::erYT2WeG3rI5ktz4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zcSRYIVzQMHnA01i' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/booking/completed/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\BookingController@completedBooking',
        'controller' => 'App\\Http\\Controllers\\Api\\BookingController@completedBooking',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::zcSRYIVzQMHnA01i',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::SHcDZtlMXxsF2kE7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/analytics/customers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\AnalyticsController@customerAnalytics',
        'controller' => 'App\\Http\\Controllers\\Api\\AnalyticsController@customerAnalytics',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::SHcDZtlMXxsF2kE7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XDLQhuiCgDhZ1wkP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/analytics/vendors',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\AnalyticsController@vendorAnalytics',
        'controller' => 'App\\Http\\Controllers\\Api\\AnalyticsController@vendorAnalytics',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::XDLQhuiCgDhZ1wkP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gUoJVBVKR6lJE83u' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/subscription/create-order',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SubscriptionController@createSubscriptionOrder',
        'controller' => 'App\\Http\\Controllers\\Api\\SubscriptionController@createSubscriptionOrder',
        'namespace' => NULL,
        'prefix' => 'api/subscription',
        'where' => 
        array (
        ),
        'as' => 'generated::gUoJVBVKR6lJE83u',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BHqoJPHks0WXFwOd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/subscription/verify-payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SubscriptionController@verifySubscriptionPayment',
        'controller' => 'App\\Http\\Controllers\\Api\\SubscriptionController@verifySubscriptionPayment',
        'namespace' => NULL,
        'prefix' => 'api/subscription',
        'where' => 
        array (
        ),
        'as' => 'generated::BHqoJPHks0WXFwOd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wJPWszfGh97ceRiJ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/subscription/current',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SubscriptionController@getCurrentSubscription',
        'controller' => 'App\\Http\\Controllers\\Api\\SubscriptionController@getCurrentSubscription',
        'namespace' => NULL,
        'prefix' => 'api/subscription',
        'where' => 
        array (
        ),
        'as' => 'generated::wJPWszfGh97ceRiJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::b15FUNRDDKFcSMZO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/subscription/history',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\SubscriptionController@getSubscriptionHistory',
        'controller' => 'App\\Http\\Controllers\\Api\\SubscriptionController@getSubscriptionHistory',
        'namespace' => NULL,
        'prefix' => 'api/subscription',
        'where' => 
        array (
        ),
        'as' => 'generated::b15FUNRDDKFcSMZO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cleXXS0wfMwTFrCY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/faq-support',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\FaqSupportController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\FaqSupportController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::cleXXS0wfMwTFrCY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::d026pc52JGMOL6QK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/faq-support/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\FaqSupportController@show',
        'controller' => 'App\\Http\\Controllers\\Api\\FaqSupportController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::d026pc52JGMOL6QK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KWE7Zq5eCyQ6gilp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/faq-support',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\FaqSupportController@store',
        'controller' => 'App\\Http\\Controllers\\Api\\FaqSupportController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::KWE7Zq5eCyQ6gilp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8rvKOcKnn5hrvnHv' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/faq-support/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\FaqSupportController@update',
        'controller' => 'App\\Http\\Controllers\\Api\\FaqSupportController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::8rvKOcKnn5hrvnHv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::I0R2u8HdXPtJgcjL' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/faq-support/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\FaqSupportController@destroy',
        'controller' => 'App\\Http\\Controllers\\Api\\FaqSupportController@destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::I0R2u8HdXPtJgcjL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mBTqz71ntzBy3dSv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/faq-support/category/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\FaqSupportController@getByCategory',
        'controller' => 'App\\Http\\Controllers\\Api\\FaqSupportController@getByCategory',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::mBTqz71ntzBy3dSv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2m63EvY3X8TVQzzU' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/faq-support-categories',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\FaqSupportController@getCategories',
        'controller' => 'App\\Http\\Controllers\\Api\\FaqSupportController@getCategories',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::2m63EvY3X8TVQzzU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gyGWiNJfuBPkZ2L2' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/faq-support-search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\FaqSupportController@search',
        'controller' => 'App\\Http\\Controllers\\Api\\FaqSupportController@search',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::gyGWiNJfuBPkZ2L2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fEq1C7EXW2Iazi0Y' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/analytics',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\WalletController@getAnalytics',
        'controller' => 'App\\Http\\Controllers\\Api\\WalletController@getAnalytics',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::fEq1C7EXW2Iazi0Y',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rqF3yRZWt1ZAhtaj' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/refer-submit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\UserController@referSubmit',
        'controller' => 'App\\Http\\Controllers\\Api\\UserController@referSubmit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::rqF3yRZWt1ZAhtaj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::p1L5n6psplmHmstl' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:295:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000005c80000000000000000";}";s:4:"hash";s:44:"ZSAxvUWqKGJE/UWrJmJQJ/VaFUAb7BaHnljnbLUdLn4=";}}',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::p1L5n6psplmHmstl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yfvFEVJFYqXwlE2x' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@login',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@login',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::yfvFEVJFYqXwlE2x',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'product.search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/searching-product',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\ProductSearchingController@index',
        'controller' => 'App\\Http\\Controllers\\frontend\\ProductSearchingController@index',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'product.search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dpIZ9MhAgtOJ0AEO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'api/user/v1/signup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@signup',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@signup',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::dpIZ9MhAgtOJ0AEO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PhrFS5hKPBXtSqzr' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'api/user/v1/otp/{validate_string}/{otp_for?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@otp',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@otp',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::PhrFS5hKPBXtSqzr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8P1yaXsFHN2JzjMi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'api/user/v1/resend-otp/{validate_string}/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@resendOtp',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@resendOtp',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::8P1yaXsFHN2JzjMi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7Gvz5thl23ADl1DF' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/forget-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@forgot_password',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@forgot_password',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::7Gvz5thl23ADl1DF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IxgfSGw0qvAfxLe7' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/reset-password/{validate_string}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@reset_password',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@reset_password',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::IxgfSGw0qvAfxLe7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::woQ3lfr2IgnLVSaK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/privacy-policy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@privacyPolicy',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@privacyPolicy',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::woQ3lfr2IgnLVSaK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0AFKrtl3GjwjgdUZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/terms-and-Conditions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@termsAndConditions',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@termsAndConditions',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::0AFKrtl3GjwjgdUZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MgD32dHHmnltdaUr' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/help-and-support',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@helpAndSupport',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@helpAndSupport',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::MgD32dHHmnltdaUr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Q0TwXvqFo2f9bTgI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/about-us',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@aboutUs',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@aboutUs',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::Q0TwXvqFo2f9bTgI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Lxli8FMyDEy312EZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/shipping-policy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@shippingPolicy',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@shippingPolicy',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::Lxli8FMyDEy312EZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VmNKxIbOV2lBxYLt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/refund-policy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@refundPolicy',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@refundPolicy',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::VmNKxIbOV2lBxYLt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UJ7vYf05yRcJNT9V' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/social-media-links',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@socialMediaLinks',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@socialMediaLinks',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::UJ7vYf05yRcJNT9V',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5FMub2hsdZ4dN3lW' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/social-login/callback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@socialLoginCallback',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@socialLoginCallback',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::5FMub2hsdZ4dN3lW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pR4v9dj9hqzpjW3k' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/contact-us',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@contactUs',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@contactUs',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::pR4v9dj9hqzpjW3k',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::v0FaIVdCTfQ1RvqQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/intro-screen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@introScreen',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@introScreen',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::v0FaIVdCTfQ1RvqQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZuF3w7nZ05Gej37f' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/masters',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@masters',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@masters',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::ZuF3w7nZ05Gej37f',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cCtEm0TftP2oGE0m' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/faqs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@faqs',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@faqs',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::cCtEm0TftP2oGE0m',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lkqpDi3ERvHWhW7m' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/initiatePayment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\CartController@processPayment',
        'controller' => 'App\\Http\\Controllers\\frontend\\CartController@processPayment',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::lkqpDi3ERvHWhW7m',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fcmTtt64DkLLvIRZ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/callback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\CartController@callback',
        'controller' => 'App\\Http\\Controllers\\frontend\\CartController@callback',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::fcmTtt64DkLLvIRZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::iQdjUOxHA3v4UBEC' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/initiatePaymentCard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\CartController@initiatePaymentCard',
        'controller' => 'App\\Http\\Controllers\\frontend\\CartController@initiatePaymentCard',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::iQdjUOxHA3v4UBEC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9AStanKWoSYHGqwp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/paytr/payment/api',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\PayTRController@paymentRequestapi',
        'controller' => 'App\\Http\\Controllers\\frontend\\PayTRController@paymentRequestapi',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::9AStanKWoSYHGqwp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TbbHKtUwi3mBeFpF' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/paytr/notification/api',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserGuestApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\PayTRController@paymentNotificationpi',
        'controller' => 'App\\Http\\Controllers\\frontend\\PayTRController@paymentNotificationpi',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::TbbHKtUwi3mBeFpF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XpImsLr9CQRr33Ex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/profile-setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@manageProfile',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@manageProfile',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::XpImsLr9CQRr33Ex',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ctJ5E661z2fPMRtT' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/update-profile-setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@updatePersonDetails',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@updatePersonDetails',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::ctJ5E661z2fPMRtT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VspZMpacbfGRKili' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@logout',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@logout',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::VspZMpacbfGRKili',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PnRlmOd5FD39EdI4' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/account-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@accountSettings',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@accountSettings',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::PnRlmOd5FD39EdI4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::eE90eJkwK7vMfeRR' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/update-notification-setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@updateSetting',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@updateSetting',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::eE90eJkwK7vMfeRR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6dKtyR6M9432rtgU' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/delete-account',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@userDestroy',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@userDestroy',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::6dKtyR6M9432rtgU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YlNw52kdwvlBlwc6' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/update-language',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@updateLanguage',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@updateLanguage',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::YlNw52kdwvlBlwc6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qUontGTyBDinD3Kp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'api/user/v1/categories/{catId?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@categoryList',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@categoryList',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::qUontGTyBDinD3Kp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::c3t74ZjHluRw2vPf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'api/user/v1/product-action',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@productAction',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@productAction',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::c3t74ZjHluRw2vPf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::I076lqpn6OEH40wL' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/get-products',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@getProducts',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@getProducts',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::I076lqpn6OEH40wL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7ZuPKRfkYLlht264' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'api/user/v1/add-product',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@addProduct',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@addProduct',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::7ZuPKRfkYLlht264',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tV6M50HQNH6rLOYQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/category-colors-list/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@categoryColorsList',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@categoryColorsList',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::tV6M50HQNH6rLOYQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2TfLm7RCaLxSO13b' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/get-profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@getProfile',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@getProfile',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::2TfLm7RCaLxSO13b',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::y8SLj73eCOTfIMzZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/product-details/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@productDetails',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@productDetails',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::y8SLj73eCOTfIMzZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TV8YRQWu18545v3Q' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/update-product/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@updateProduct',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@updateProduct',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::TV8YRQWu18545v3Q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1PfjstL8cuqjtjCs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/delete-product/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\UserController@deleteProduct',
        'controller' => 'App\\Http\\Controllers\\frontend\\UserController@deleteProduct',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::1PfjstL8cuqjtjCs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cart.add' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/add-cart',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\CartController@addCart',
        'controller' => 'App\\Http\\Controllers\\frontend\\CartController@addCart',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'cart.add',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cart.updatequantity' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/update-cart-quantity',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\CartController@updateQuantity',
        'controller' => 'App\\Http\\Controllers\\frontend\\CartController@updateQuantity',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'cart.updatequantity',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cart.remove' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/remove-cart',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\CartController@removeCart',
        'controller' => 'App\\Http\\Controllers\\frontend\\CartController@removeCart',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'cart.remove',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cart.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/cart',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\CartController@listCart',
        'controller' => 'App\\Http\\Controllers\\frontend\\CartController@listCart',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'cart.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'storeshippingAddress' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/add-shipping-address',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\ShippingAddress@StoreShippingAddress',
        'controller' => 'App\\Http\\Controllers\\frontend\\ShippingAddress@StoreShippingAddress',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'storeshippingAddress',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mark_as_default_address' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/mark-as-default',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\ShippingAddress@mark_as_default_address',
        'controller' => 'App\\Http\\Controllers\\frontend\\ShippingAddress@mark_as_default_address',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'mark_as_default_address',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ShoppingAddressList' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/shipping-address-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\ShippingAddress@ShoppingAddressList',
        'controller' => 'App\\Http\\Controllers\\frontend\\ShippingAddress@ShoppingAddressList',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'ShoppingAddressList',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'address.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/update-shipping-address',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\ShippingAddress@update',
        'controller' => 'App\\Http\\Controllers\\frontend\\ShippingAddress@update',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'address.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'address.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/edit-shipping-address/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\ShippingAddress@edit',
        'controller' => 'App\\Http\\Controllers\\frontend\\ShippingAddress@edit',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'address.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'address.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/delete-shipping-address/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\ShippingAddress@delete',
        'controller' => 'App\\Http\\Controllers\\frontend\\ShippingAddress@delete',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'address.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'enquiry_submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/enquiry-submit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\EnquiryController@enquiry_submit',
        'controller' => 'App\\Http\\Controllers\\frontend\\EnquiryController@enquiry_submit',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'enquiry_submit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'order.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/order-place',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\OrderController@store',
        'controller' => 'App\\Http\\Controllers\\frontend\\OrderController@store',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'order.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'order.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/order-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\OrderController@OrderList',
        'controller' => 'App\\Http\\Controllers\\frontend\\OrderController@OrderList',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'order.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'order.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/order-details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\OrderController@OrderDetails',
        'controller' => 'App\\Http\\Controllers\\frontend\\OrderController@OrderDetails',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'order.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'CouponsList' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/coupons-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\CouponsController@CouponsList',
        'controller' => 'App\\Http\\Controllers\\frontend\\CouponsController@CouponsList',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'CouponsList',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'OrderCancel' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/order-cancel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\OrderController@OrderCancel',
        'controller' => 'App\\Http\\Controllers\\frontend\\OrderController@OrderCancel',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'OrderCancel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'SingleOrderCancel' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/order-cancel-single',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\OrderController@SingleOrderCancel',
        'controller' => 'App\\Http\\Controllers\\frontend\\OrderController@SingleOrderCancel',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'SingleOrderCancel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'singleorderreject' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/reject-order-single',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\OrderController@SingleOrderReject',
        'controller' => 'App\\Http\\Controllers\\frontend\\OrderController@SingleOrderReject',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'singleorderreject',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'OrderReject' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/reject-order',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\OrderController@OrderReject',
        'controller' => 'App\\Http\\Controllers\\frontend\\OrderController@OrderReject',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'OrderReject',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'OrderRefundAll' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/order-refund-all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\OrderController@OrderRefundAll',
        'controller' => 'App\\Http\\Controllers\\frontend\\OrderController@OrderRefundAll',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'OrderRefundAll',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'OrderRefundSingle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/order-refund-single',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\OrderController@OrderRefundSingle',
        'controller' => 'App\\Http\\Controllers\\frontend\\OrderController@OrderRefundSingle',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'OrderRefundSingle',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'varient_change' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/varient-change',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\OrderController@varient_change',
        'controller' => 'App\\Http\\Controllers\\frontend\\OrderController@varient_change',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'varient_change',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'received_order' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/order-received-seller-listing',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\OrderController@received_order',
        'controller' => 'App\\Http\\Controllers\\frontend\\OrderController@received_order',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'received_order',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'received_order_details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/order-received-details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\OrderController@receivedOrderDetails',
        'controller' => 'App\\Http\\Controllers\\frontend\\OrderController@receivedOrderDetails',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'received_order_details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'receivedOrderCancel' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/order-received-cancel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\OrderController@receivedOrderCancel',
        'controller' => 'App\\Http\\Controllers\\frontend\\OrderController@receivedOrderCancel',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'receivedOrderCancel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reasons' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/reasons',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\OrderController@returnreasons',
        'controller' => 'App\\Http\\Controllers\\frontend\\OrderController@returnreasons',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'reasons',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'changeProductsNames' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/products-name-change',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\ProductSearchingController@changeProductsNames',
        'controller' => 'App\\Http\\Controllers\\frontend\\ProductSearchingController@changeProductsNames',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'changeProductsNames',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'applycoupon' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/apply-coupon',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\CouponsController@applyCoupon',
        'controller' => 'App\\Http\\Controllers\\frontend\\CouponsController@applyCoupon',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'applycoupon',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'removecoupon' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/remove-coupon',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\CouponsController@removeCoupon',
        'controller' => 'App\\Http\\Controllers\\frontend\\CouponsController@removeCoupon',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'removecoupon',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ratingReviewSubmit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/submit-review',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\RatingReviewController@ratingReviewSubmit',
        'controller' => 'App\\Http\\Controllers\\frontend\\RatingReviewController@ratingReviewSubmit',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'ratingReviewSubmit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'couponsAdd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/coupons-add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\CouponsController@couponsAdd',
        'controller' => 'App\\Http\\Controllers\\frontend\\CouponsController@couponsAdd',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'couponsAdd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'couponsUpdate' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/coupons-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\CouponsController@couponsUpdate',
        'controller' => 'App\\Http\\Controllers\\frontend\\CouponsController@couponsUpdate',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'couponsUpdate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'couponsListVendor' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/coupons-list-vendor',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\CouponsController@couponsListVendor',
        'controller' => 'App\\Http\\Controllers\\frontend\\CouponsController@couponsListVendor',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'couponsListVendor',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'couponsEdit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/coupons-edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\CouponsController@couponsEdit',
        'controller' => 'App\\Http\\Controllers\\frontend\\CouponsController@couponsEdit',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'couponsEdit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'couponsDelete' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/coupons-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\CouponsController@couponsDelete',
        'controller' => 'App\\Http\\Controllers\\frontend\\CouponsController@couponsDelete',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'couponsDelete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'productStatusChangeVendor' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/vendor-product-status-change',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\OrderController@productStatusChangeVendor',
        'controller' => 'App\\Http\\Controllers\\frontend\\OrderController@productStatusChangeVendor',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'productStatusChangeVendor',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sendProductEnquiry' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/send-product-enquires',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\EnquiryController@sendProductEnquiry',
        'controller' => 'App\\Http\\Controllers\\frontend\\EnquiryController@sendProductEnquiry',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'sendProductEnquiry',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ProductEnquiryUserList' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/product-enquires-user-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\EnquiryController@ProductEnquiryUserList',
        'controller' => 'App\\Http\\Controllers\\frontend\\EnquiryController@ProductEnquiryUserList',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'ProductEnquiryUserList',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ProductEnquirySellerList' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/product-enquires-seller-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\EnquiryController@ProductEnquirySellerList',
        'controller' => 'App\\Http\\Controllers\\frontend\\EnquiryController@ProductEnquirySellerList',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'ProductEnquirySellerList',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ProductEnquiryChat' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/product-enquires-chats',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\EnquiryController@ProductEnquiryChat',
        'controller' => 'App\\Http\\Controllers\\frontend\\EnquiryController@ProductEnquiryChat',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'ProductEnquiryChat',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'userQuery' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/user-queries',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\EnquiryController@userQuery',
        'controller' => 'App\\Http\\Controllers\\frontend\\EnquiryController@userQuery',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'userQuery',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sellerQuery' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/seller-queries',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\EnquiryController@sellerQuery',
        'controller' => 'App\\Http\\Controllers\\frontend\\EnquiryController@sellerQuery',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'sellerQuery',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'enquiryDetails' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/product-enquiry-details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\EnquiryController@enquiryDetails',
        'controller' => 'App\\Http\\Controllers\\frontend\\EnquiryController@enquiryDetails',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'enquiryDetails',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'notificationList' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\NotificationController@notificationList',
        'controller' => 'App\\Http\\Controllers\\frontend\\NotificationController@notificationList',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'notificationList',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clearAllNotifications' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/clear-all-notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\NotificationController@clearAllNotifications',
        'controller' => 'App\\Http\\Controllers\\frontend\\NotificationController@clearAllNotifications',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'clearAllNotifications',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'follow' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/follow',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\FollowerController@follow',
        'controller' => 'App\\Http\\Controllers\\frontend\\FollowerController@follow',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'follow',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'removefollow' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/remove-follow',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\FollowerController@removefollow',
        'controller' => 'App\\Http\\Controllers\\frontend\\FollowerController@removefollow',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'removefollow',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profileFeed' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/profile-feed',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\FollowerController@profileFeed',
        'controller' => 'App\\Http\\Controllers\\frontend\\FollowerController@profileFeed',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'profileFeed',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'block-users' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/block-users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\NotificationController@blockUserProduct',
        'controller' => 'App\\Http\\Controllers\\frontend\\NotificationController@blockUserProduct',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'block-users',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'block-users-list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user/v1/block-users-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\NotificationController@blockUserList',
        'controller' => 'App\\Http\\Controllers\\frontend\\NotificationController@blockUserList',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'block-users-list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'un-block-users' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user/v1/un-block-users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'UserAuthApi',
          2 => 'ResponseMiddleware',
        ),
        'uses' => 'App\\Http\\Controllers\\frontend\\NotificationController@UnBlockUsers',
        'controller' => 'App\\Http\\Controllers\\frontend\\NotificationController@UnBlockUsers',
        'namespace' => NULL,
        'prefix' => '/api/user/v1',
        'where' => 
        array (
        ),
        'as' => 'un-block-users',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9oOJneMXS50NwmpC' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{any}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:288:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:70:"function () {
  return file_get_contents(public_path(\'index.html\'));
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000005ca0000000000000000";}";s:4:"hash";s:44:"1J5cjCj7+Xvy4RL9ftMW03Rn/P8KXqNrTMgxQzGfgrY=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::9oOJneMXS50NwmpC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'any' => '^(?!api).*$',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
