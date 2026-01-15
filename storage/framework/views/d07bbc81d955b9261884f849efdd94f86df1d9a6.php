<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
        $segment2    =    Request::segment(1);
        $segment3    =    Request::segment(2);
        $segment4    =    Request::segment(3);
        $segment5    =    Request::segment(4);    
        
        $current_uri        = $segment2;
        $data_seo           = getSeoData($current_uri);

        if($data_seo){
            $newUrl             = request()->path();
            $metatitle          = !empty($data_seo->title) ? $data_seo->title : '';
            $title              = !empty($metatitle) ? $metatitle : Config::get("Site.title");
            $metaDesc           = !empty($data_seo->meta_description) ? $data_seo->meta_description : '';
            $metaKey            = !empty($data_seo->meta_keywords) ? $data_seo->meta_keywords : '';
            $twitter_card       = !empty($data_seo->twitter_card) ? $data_seo->twitter_card : '';
            $twitter_site       = !empty($data_seo->twitter_site) ? $data_seo->twitter_site : '';
            $og_url             = !empty($data_seo->og_url) ? $data_seo->og_url : '';
            $og_type            = !empty($data_seo->og_type) ? $data_seo->og_type : '';
            $og_title           = !empty($data_seo->og_title) ? $data_seo->og_title : '';
            $og_description     = !empty($data_seo->og_description) ? $data_seo->og_description : '';
            $og_image           = !empty($data_seo->og_image) ? $data_seo->og_image    : '';
            $og_image           = !empty($data_seo->og_image) ? $data_seo->og_image : '';
            $meta_chronicles    = !empty($data_seo->meta_chronicles) ? $data_seo->meta_chronicles    : '';
        }else{
                $metatitle          = '';
                $title				= Config::get("Site.title");
                $metaDesc           = '';
                $metaKey            = '';
                $twitter_card       = '';
                $twitter_site       = '';
                $og_url             = '';
                $og_type            = '';
                $og_title           = '';
                $og_description     = '';
                $og_image           = '';
                $meta_chronicles    = '';
        }
       
    ?>
    <title><?php echo e($title); ?></title>
    <meta name="title" content="<?php echo e($metatitle); ?>">
    <meta name="description" content="<?php echo e($metaDesc); ?>">
    <meta name="keyword" content="<?php echo e($metaKey); ?>">
    <meta property="og:title" content="<?php echo e($metatitle); ?>"/>
    <meta property="og:description" content="<?php echo e($metaDesc); ?>"/>
    <meta property="og:image" content="<?php echo e($og_image); ?>">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo e($og_image); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo e($og_image); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e($og_image); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e($og_image); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e($og_image); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo e($og_image); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo e($og_image); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e($og_image); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e($og_image); ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="i<?php echo e($og_image); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e($og_image); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e($og_image); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e($og_image); ?>">
    <?php if($current_uri != 'product-detail'): ?>
    <?php if(!empty($og_type)): ?>
    <meta property="og:type" content="<?php echo e($og_type); ?>"/>
    <?php else: ?>
    <meta property="og:type" content="Website"/>
    <?php endif; ?>
    <meta name="url" content="<?php echo e(request()->fullUrl()); ?>">
    <meta name="og_url" content="<?php echo e($og_url); ?>">
    <meta property="og:url" content="<?php echo e(request()->fullUrl()); ?>"/>
    <meta name="twitter_card" content="<?php echo e($twitter_card); ?>">
    <meta name="twitter_site" content="<?php echo e($twitter_site); ?>">
    <meta name="twitter:card" content="<?php echo e($twitter_card); ?>"/>
    <meta name="twitter:site" content="<?php echo e($twitter_site); ?>"/>
    <meta name="meta_chronicles" content="<?php echo e($meta_chronicles); ?>"> 
    <?php endif; ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@100..900&family=Yellowtail&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/css/intlTelInput.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <!-- Bootstrap  v5.3.0  CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>">
    <!--  Font-Awesome-5 CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/font-awesome.css')); ?>">
    <!-- Swiper 8.1.5 -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/swiper-bundle.min.css')); ?>">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>">
    <!-- Custom Responsive CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/responsive.css')); ?>">
    <style>
        .toast-error {
            background-color: #ff4d4d !important; /* Red background for errors */
            color: white !important;           /* White text */
        }
    
        .toast-success {
            background-color: #28a745 !important; /* Green background for success */
            color: white !important;             /* White text */
        }
    
        .toast-error .toast-message, 
        .toast-success .toast-message {
            color: white !important; /* Ensure the text inside is white */
        }
    </style>
    
</head>

<body>
    <!-- loader  -->
    <div class="loader-wrapper" style="display: none;">
        <div class="loader">
            <img src="<?php echo e(asset('frontend/img/logo.png')); ?>" alt="">
        </div>
    </div>
    <!-- Back to Top -->
    <div class="progress-wrap cursor-pointer">
        <svg class="arrowTop" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M8.99996 15.9999H6.99996V3.99991L1.49996 9.49991L0.0799561 8.07991L7.99996 0.159912L15.92 8.07991L14.5 9.49991L8.99996 3.99991V15.9999Z"
                fill="black" />
        </svg>

        <svg class="progress-circle svg-content" width="50px" height="50px" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header-flex">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="<?php echo e(route('frontend.index')); ?>">
                                <img src="<?php echo e(asset('frontend/img/logo.png')); ?>" alt="">
                            </a>
                            <div class="overlay" style="display:none"></div>

                            <div class="navcollapse navbar-collapse">
                                <button class="navbar-toggler menuClose-icon" type="button">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.4 14L0 12.6L5.6 7L0 1.4L1.4 0L7 5.6L12.6 0L14 1.4L8.4 7L14 12.6L12.6 14L7 8.4L1.4 14Z"
                                            fill="black" />
                                    </svg>
                                </button>

                                <ul class="navbar-nav">
                                    <li class="nav-item <?php if(Route::is('frontend.index')): ?> active <?php endif; ?>">
                                        <a class="nav-link" href="<?php echo e(route('frontend.index')); ?>"><?php echo e(trans('messages.home')); ?></a>
                                    </li>
                                    <li class="nav-item <?php if(Route::is('frontend.about-us')): ?> active <?php endif; ?> ">
                                        <a class="nav-link" href="<?php echo e(route('frontend.about-us')); ?>"><?php echo e(trans('messages.about_us')); ?></a>
                                    </li>
                                    <li class="nav-item <?php if(Route::is('frontend.faq')): ?> active <?php endif; ?>">
                                        <a class="nav-link" href="<?php echo e(route('frontend.faq')); ?>"><?php echo e(trans('messages.faq')); ?></a>
                                    </li>
                                    <li class="nav-item <?php if(Route::is('frontend.term-and-conditions')): ?> active <?php endif; ?>">
                                        <a class="nav-link" href="<?php echo e(route('frontend.term-and-conditions')); ?>"><?php echo e(trans('messages.T&C')); ?></a>
                                    </li>
                                    <li class="nav-item for_mobile <?php if(Route::is('frontend.contact')): ?> active <?php endif; ?>">
                                        <a class="nav-link" href="<?php echo e(route('frontend.contact')); ?>"><?php echo e(trans('messages.contact_us')); ?></a>
                                    </li>
                                </ul>
                            </div>
                            <button class="navbar-toggler" type="button">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </nav>
                        <div class="header-right">
                            <div class="langugae_filter">
                                <div class="dropdown">
                                    <button class="dropdown-toggle nav-link dropdown-toggle lang_drop" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php if(\App::getLocale() == 'tr'): ?>
                                        <span class="flag_ico"><img src="<?php echo e(asset('frontend/img/tr-flag.jpg')); ?>" alt=""></span> Tr
                                        <i class="far fa-chevron-down"></i>
                                        <?php else: ?>
                                        <span class="flag_ico"><img src="<?php echo e(asset('frontend/img/en-flag.jpg')); ?>" alt="">
                                        </span> En
                                        <i class="far fa-chevron-down"></i>
                                        <?php endif; ?>
                                    </button>
                                    <ul class="dropdown-menu lang_dropdown">
                                        <li>
                                            <a class="dropdown-item lang_country <?php echo e(\App::getLocale() == 'en' ? 'active' : ''); ?>" href="<?php echo e(route('frontlan.change', ['lang' => 'en'])); ?>">
                                                <span class="flag_ico">
                                                    <img src="<?php echo e(asset('frontend/img/en-flag.jpg')); ?>" alt="">
                                                </span> English
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item lang_country <?php echo e(\App::getLocale() == 'tr' ? 'active' : ''); ?>" href="<?php echo e(route('frontlan.change', ['lang' => 'tr'])); ?>">
                                                <span class="flag_ico">
                                                    <img src="<?php echo e(asset('frontend/img/tr-flag.jpg')); ?>" alt="">
                                                </span> Turkish
                                            </a>
                                        </li>                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="cta-btn for_desktop">
                                <a class="contact-btn" href="<?php echo e(route('frontend.contact')); ?>"><?php echo e(trans('messages.contact_us')); ?></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>

<?php echo $__env->yieldContent('content'); ?>

<footer class="footer-wrapper">
    <div class="container">
        <div class="footer-flex">
            <div class="footer-block">
                <figure>
                    <a href="<?php echo e(route('frontend.index')); ?>">
                        <img src="<?php echo e(asset('frontend/img/footer-logo.png')); ?>" alt="">
                    </a>
                </figure>
            </div>

            <div class="footer-menu">
                <div class="footerLink">
                    <a href="<?php echo e(route('frontend.privacy-policy')); ?>"><?php echo e(trans('messages.privacy_policy')); ?></a>
                </div>
                <div class="footerLink">
                    <a href="<?php echo e(route('frontend.term-and-conditions')); ?>"><?php echo e(trans('messages.terms_and_conditions')); ?></a>
                </div>
                <div class="footerLink">
                    <a href="<?php echo e(route('frontend.about-us')); ?>"><?php echo e(trans('messages.about_us')); ?></a>
                </div>
                <div class="footerLink">
                    <a href="<?php echo e(route('frontend.contact')); ?>"><?php echo e(trans('messages.contact_us')); ?></a>
                </div>
                <div class="footerLink">
                    <a href="<?php echo e(route('frontend.faq')); ?>"><?php echo e(trans('messages.faq')); ?></a>
                </div>
            </div>

            <div class="social-links">
                <a href="<?php echo e(config('Social.facebook') ?? ""); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="51" viewBox="0 0 50 51"
                        fill="none">
                        <circle cx="25" cy="25.6357" r="25" fill="currentColor" fill-opacity="0.12" />
                        <path
                            d="M27.2727 27.3404H30.1136L31.25 22.7949H27.2727V20.5222C27.2727 19.3518 27.2727 18.2495 29.5454 18.2495H31.25V14.4313C30.8795 14.3824 29.4807 14.2722 28.0034 14.2722C24.9182 14.2722 22.7273 16.1552 22.7273 19.6131V22.7949H19.3182V27.3404H22.7273V36.9995H27.2727V27.3404Z"
                            fill="currentColor" />
                    </svg>
                </a>

                <a href="<?php echo e(config('Social.instagram') ?? ""); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="51" viewBox="0 0 50 51"
                        fill="none">
                        <circle cx="25" cy="25.6357" r="25" fill="currentColor" fill-opacity="0.12" />
                        <path
                            d="M20.2273 14.2722H29.7727C33.4091 14.2722 36.3637 17.2268 36.3637 20.8631V30.4086C36.3637 32.1566 35.6693 33.833 34.4332 35.0691C33.1972 36.3051 31.5208 36.9995 29.7727 36.9995H20.2273C16.5909 36.9995 13.6364 34.0449 13.6364 30.4086V20.8631C13.6364 19.1151 14.3308 17.4387 15.5668 16.2026C16.8029 14.9666 18.4793 14.2722 20.2273 14.2722ZM20 16.5449C18.915 16.5449 17.8745 16.9759 17.1073 17.7431C16.3401 18.5103 15.9091 19.5509 15.9091 20.6359V30.6359C15.9091 32.8972 17.7387 34.7268 20 34.7268H30C31.085 34.7268 32.1255 34.2958 32.8927 33.5286C33.6599 32.7614 34.0909 31.7208 34.0909 30.6359V20.6359C34.0909 18.3745 32.2614 16.5449 30 16.5449H20ZM30.9659 18.2495C31.3427 18.2495 31.704 18.3991 31.9703 18.6655C32.2367 18.9319 32.3864 19.2932 32.3864 19.6699C32.3864 20.0467 32.2367 20.408 31.9703 20.6744C31.704 20.9407 31.3427 21.0904 30.9659 21.0904C30.5892 21.0904 30.2279 20.9407 29.9615 20.6744C29.6951 20.408 29.5455 20.0467 29.5455 19.6699C29.5455 19.2932 29.6951 18.9319 29.9615 18.6655C30.2279 18.3991 30.5892 18.2495 30.9659 18.2495ZM25 19.954C26.5069 19.954 27.9521 20.5527 29.0177 21.6182C30.0832 22.6837 30.6818 24.1289 30.6818 25.6359C30.6818 27.1428 30.0832 28.588 29.0177 29.6535C27.9521 30.7191 26.5069 31.3177 25 31.3177C23.4931 31.3177 22.0479 30.7191 20.9824 29.6535C19.9168 28.588 19.3182 27.1428 19.3182 25.6359C19.3182 24.1289 19.9168 22.6837 20.9824 21.6182C22.0479 20.5527 23.4931 19.954 25 19.954ZM25 22.2268C24.0959 22.2268 23.2288 22.5859 22.5894 23.2253C21.9501 23.8646 21.5909 24.7317 21.5909 25.6359C21.5909 26.54 21.9501 27.4071 22.5894 28.0464C23.2288 28.6858 24.0959 29.0449 25 29.0449C25.9042 29.0449 26.7713 28.6858 27.4106 28.0464C28.0499 27.4071 28.4091 26.54 28.4091 25.6359C28.4091 24.7317 28.0499 23.8646 27.4106 23.2253C26.7713 22.5859 25.9042 22.2268 25 22.2268Z"
                            fill="currentColor" />
                    </svg>
                </a>

                <a href="<?php echo e(config('Social.twitter') ?? ""); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="51" viewBox="0 0 50 51"
                        fill="none">
                        <circle cx="25" cy="25.6357" r="25" fill="currentColor" fill-opacity="0.12" />
                        <path
                            d="M26.5984 24.0695L33.9956 15.4084H32.2423L25.8211 22.9284L20.6899 15.4084H14.7727L22.5308 26.7812L14.7727 35.863H16.526L23.3081 27.9208L28.7271 35.863H34.6443L26.5984 24.0695ZM24.1979 26.8805L23.4118 25.7482L17.1571 16.738H19.8498L24.8962 24.0096L25.6823 25.1419L32.2438 34.5948H29.5511L24.1979 26.8805Z"
                            fill="currentColor" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <div class="copyright">
        <div class="container">
            <span>
                <?php echo e(config('Site.right') ?? ""); ?>

                
            </span>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<!-- Bootstrap v5.3.0  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Swiper 10.0.3 -->
<script src="<?php echo e(asset('frontend/js/jquery.matchHeight-min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/swiper-bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/script.js' )); ?>"></script>
<!-- Bootstrap v5.3.0  -->
<!-- Swiper 10.0.3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/js/intlTelInput.min.js"></script>
<?php echo $__env->yieldContent('js'); ?>

<script>
   $(function () {
    $('#mobile').intlTelInput({
        autoHideDialCode: true,
        dropdownContainer: '.contryList',
        formatOnDisplay: true,
        initialCountry: "tr",
        separateDialCode: true,
    });
});

</script>
<script>
    // Match Height
    $(function () {
        $(".process-block").matchHeight();
        $(".review-text").matchHeight();
    });

    // Swiper
    var swiper = new Swiper(".categorySwiper", {
        spaceBetween: 25,
        pagination: {
            el: ".testimonials-wrapper .swiper-pagination",
            clickable: true,
        },
        loop: true,
        slidesOffsetBefore: '-150',
        paginationClickable: false,
        // speed: 3000,
        // autoplay: {
        //     delay: 2000,
        //     disableOnInteraction: false,
        // },
        // mousewheel: true,
        //keyboard: true,
        breakpoints: {
            0: {
                slidesPerView: 1.5,
                slidesOffsetBefore: '15',
            },
            767: {
                slidesPerView: 2.3,
                slidesOffsetBefore: '15',
            },
            991: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 3,
            },
            1400: {
                slidesPerView: 4,
            },
            1600: {
                slidesPerView: 5,
            },
        },
    });


</script>
</body>

</html><?php /**PATH /home/ayva/web/ayva.stage04.obdemo.com/public_html/resources/views/frontend/layouts/layout.blade.php ENDPATH**/ ?>