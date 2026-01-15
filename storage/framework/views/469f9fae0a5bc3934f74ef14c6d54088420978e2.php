<?php $__env->startSection('content'); ?>


<section class="hero-section">
    <div class="container position-relative">
        <div class="hero-content">
            
            <?php echo $introHomeCms->cmsDescription->body; ?>


            <div class="apps-block">
                <a href="<?php echo e(config('Social.playstore') ?? ""); ?>" target="_blank"><img src="<?php echo e(asset('frontend/img/g-pay.png')); ?>" alt="<?php echo e($introHomeCms->cmsDescription->button_1_title ?? ""); ?>"></a>
                <a href="<?php echo e(config('Social.appstore') ?? ""); ?>" target="_blank"><img src="<?php echo e(asset('frontend/img/apple.png')); ?>" alt="<?php echo e($introHomeCms->cmsDescription->button_2_title ?? ""); ?>"></a>
            </div>
        </div>


        <div class="girl-vector">
            <img src="<?php echo e($introHomeCms->image ?? ''); ?>" alt="">
            
        </div>

    </div>
</section>


<!-- How It works Section -->
<section class="section-padding how-it-works">
    <div class="container">
        <div class="section-heading">
            <?php echo $howItWorkCms->cmsDescription->body ?? ""; ?>

        </div>

        <div class="user-mode"><?php echo e(trans('messages.customer')); ?></div>

        <div class="user-process">
            <div class="row">
            <?php
                $stepCounter = 1;
            ?>
            <?php $__currentLoopData = $howitwokscustomer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-3 stepsCol">
                    <div class="process-block">
                        <div class="steps">
                            <?php echo e(trans('messages.step')); ?> <?php echo e($stepCounter); ?>  
                        </div>
                        <div class="step-title">
                            <?php echo e($customer->howitworkDes->title ?? ""); ?>

                        </div>
                        <div class="step-text">
                            <?php echo e($customer->howitworkDes->description ?? ""); ?>

                        </div>
                    </div>
                </div>
                <?php
                    $stepCounter++;
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            </div>
        </div>


        <div class="user-mode"><?php echo e(trans('messages.vendor')); ?></div>

        <div class="user-process">
            <div class="row">
                <?php
                $stepCounter = 1;
            ?>
            <?php $__currentLoopData = $howitwoksvendor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-3 stepsCol">
                    <div class="process-block">
                        <div class="steps">
                            <?php echo e(trans('messages.step')); ?> <?php echo e($stepCounter); ?>  
                        </div>
                        <div class="step-title">
                            <?php echo e($vendor->howitworkDes->title ?? ""); ?>

                        </div>
                        <div class="step-text">
                            <?php echo e($vendor->howitworkDes->description ?? ""); ?>

                        </div>
                    </div>
                </div>
                <?php
                    $stepCounter++;
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section class="section-padding about-us-wrapper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-6">
                <div class="about-img">
                    <img src="<?php echo e($aboutAyva->image ?? ""); ?>" style="min-width: 100%" alt="">
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="about-content">
                    <div class="about-h2"><?php echo e($aboutAyva->cmsDescription->short_title ?? ""); ?></div>
                    <div class="about-h1"><?php echo e($aboutAyva->cmsDescription->title ?? ""); ?></div>
                    <div class="about-text">
                        
                        <?php echo e(substr(strip_tags($aboutAyva->cmsDescription->body ?? ""), 0, 300)); ?>

                    </div>
                    <a href="<?php echo e($aboutAyva->button_1_link ?? ""); ?>" class="btn primary-btn"><?php echo e($aboutAyva->cmsDescription->button_1_title ?? ""); ?> <svg xmlns="http://www.w3.org/2000/svg"
                            width="18" height="14" viewBox="0 0 18 14" fill="none">
                            <path d="M9.5598 0.935486L16.2774 7L9.5598 13.0645M15.3444 7H1.72258"
                                stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Testimonials Section -->
<section class="section-padding testimonials-wrapper">
    <div class="container">
        <div class="section-heading mb-2">
           <?php echo $testimonialCms->cmsDescription->body ?? ""; ?>

        </div>
    </div>

    <div class="categorySwiper swiper">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide">
                <div class="review-card">
                    <div class="rev-ratings">
                        <?php for($rating = 1; $rating <= $testimonial->rating; $rating++): ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                            <g clip-path="url(#clip0_3191_1570)">
                                <path
                                    d="M12.1718 22.1838C12.6802 21.8769 13.3169 21.8769 13.8254 22.1838L19.0552 25.3404C20.2669 26.0717 21.7617 24.9853 21.4401 23.607L20.0521 17.6584C19.9172 17.08 20.1137 16.4744 20.5626 16.0855L25.1854 12.0809C26.2552 11.1541 25.6833 9.39688 24.273 9.27727L18.1901 8.76136C17.5987 8.71121 17.0837 8.33788 16.8521 7.79148L14.4717 2.17528C13.9203 0.874474 12.0768 0.874478 11.5254 2.17529L9.14498 7.79148C8.91339 8.33788 8.39839 8.71121 7.80706 8.76136L1.72414 9.27727C0.313824 9.39688 -0.25806 11.1541 0.811731 12.0809L5.43449 16.0855C5.88342 16.4744 6.07998 17.08 5.94502 17.6584L4.55701 23.607C4.2354 24.9853 5.73021 26.0717 6.94195 25.3404L12.1718 22.1838Z"
                                    fill="#F86C01" />
                            </g>
                            <defs>
                                <clipPath id="clip0_3191_1570">
                                    <rect width="26" height="26" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    <?php endfor; ?>

                    </div>
                    <div class="review-content">
                        <div class="review-text"><?php echo e($testimonial->TestimonialDescription->description ?? ""); ?></div>
                        <div class="auther"><?php echo e($testimonial->TestimonialDescription->name ?? ""); ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           


        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<section class="app-download-wrapper">
    <div class="container">
        <div class="app-download-block">
            <div class="app-title"><?php echo e($downloadapp->cmsDescription->title ?? ""); ?></div>
            <div class="app-text"><?php echo $downloadapp->cmsDescription->body ?? ""; ?></div>
            <div class="download-h5"><?php echo e($downloadapp->cmsDescription->short_title ?? ''); ?></div>
            <div class="apps-block mt-2">
                <a href="<?php echo e(config('Social.playstore') ?? ""); ?>" target="_blank"><img src="<?php echo e(asset('frontend/img/g-pay.png')); ?>" alt="<?php echo e($downloadapp->cmsDescription->button_1_title ?? ""); ?>"></a>
                <a href="<?php echo e(config('Social.playstore') ?? ""); ?>" target="_blank"><img src="<?php echo e(asset('frontend/img/apple.png')); ?>" alt="<?php echo e($downloadapp->cmsDescription->button_2_title ?? ""); ?>"></a>
            </div>

            <div class="appscreen-block">
                <img src="<?php echo e($downloadapp->image ?? ""); ?>" alt="">
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ayva/web/ayva.stage04.obdemo.com/public_html/resources/views/frontend/index.blade.php ENDPATH**/ ?>