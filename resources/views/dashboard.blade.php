@extends('shopify-app::layouts.default')
@section('content')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/upsell.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/setupGuide.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/recommendationSlider.css') }}">
@endsection
@section('scripts')
    <script src="{{ asset('js/recommendationSlider.js' )}}" defer></script>
@endsection

<!-- @section('scripts')
    <script src="{{ asset('js/common.js' )}}" defer></script>
    <script src="{{ asset('js/feature_request.js')}}" defer></script>
    <script src="{{ asset('js/recommendationSlider.js' )}}" defer></script> 
@endsection 

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/faq.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/upsell.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/setupGuide.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/recommendationSlider.css') }}">
@endsection -->



<input type="hidden" data-host ="{{app('request')->input('host')}}">
<section></section>


    <div class="modal fade show" id="eidBanner" tabindex="-1" role="dialog" style="display: none">
        <div class="modal-dialog" role="document" style="max-width : 650px !important">
            <div class="modal-content" style="border-radius: 0.8rem">
                <div class="modal-header">
                    <button type="button" class="close no-shadow modal-close-btn" data-dismiss="modal" aria-label="Close"
                        id="eidBannerHide">
                        <span aria-hidden="true" style="font-size: 22px">×</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 0px !important">
                    <img src="{{ asset('eidBanner.webp') }}" alt="Variator App Image" loading="lazy">
                </div>
            </div>
        </div>
    </div>

<section class="full-width zero-bottom-padding">
    <h2 class="eosh-h2">Dashboard</h2>
</section>

<section class="full-width zero-bottom-padding">
    <article>
        <div class="columns ten">
            <p class="para_size">Getting Started</p>
        </div>
        <div class="columns two">
            @include('partials.langDropDown')
        </div>
    </article>
</section>

<section class="full-width zero-bottom-padding" id="setupGuideContainer">
    <article>
        <div class="table-card card">
            <div class="column twelve">
                <h2 class="eosh-h2">Setup guide</h2>
                <p class="para_size">
                    Use this personalized guide to get your store up and running.
                </p>
                <span class="button eosh-default-btn skeleton-loader" style="cursor: text;">
                </span>
            </div>
        </div>
    </article>
</section>

<section class="full-width zero-bottom-padding">
    <article>
        <div class="column twelve">
            <div class="table-card card">
                <h2 class="eosh-h2">Quick tutorials</h2>
                <p class="para_size">
                    Follow our tutorial videos to get used to the app quickly.
                </p>

                <section class="full-width tutorial-cards">
                    <!-- first card -->
                    <div class="card help-center-card">
                        <h3>
                            General Settings
                        </h3>
                        <p class="para_size">
                            In this video, see how to configure the app.
                        </p>
                        <div class="align-center tutorial-card-buttons">
                            <a href="{{ asset('Topimages/animated.mp4') }}" class="button eosh-default-btn" data-start="0" data-fancybox="video-gallery">
                                <svg style="color: #007ace" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="#00b3b3">
                                    <polygon points="10,8 16,12 10,16" fill="black"/>
                                </svg>
                                Watch Video
                            </a> &nbsp;
                            <a onclick="handleNavigation('/user-guide')">
                                Read instruction
                            </a>
                        </div>
                    </div>

                    <!-- Seconds card -->
                    <!-- <div class="card help-center-card">
                        <h3>
                            Create Rules
                        </h3>
                        <p class="para_size">
                            In this video, see how to create rules and apply on products/collections.
                        </p>
                        <div class="align-center tutorial-card-buttons">
                            <a href="{{ asset('Topimages/animated.mp4') }}" class="button eosh-default-btn" data-start="84" data-fancybox="video-gallery">
                                <svg style="color: #007ace" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="#00b3b3">
                                    <polygon points="10,8 16,12 10,16" fill="black"/>
                                </svg>
                                Watch Video
                            </a> &nbsp;
                            <a  onclick="handleNavigation('/user-guide')">
                                Read instruction
                            </a>
                        </div>
                    </div> -->

                    <!-- Fourth card -->
                    <div class="card help-center-card">
                        <h3>
                            Enable App Embed
                        </h3>
                        <p class="para_size">
                            In this video, see how to activate the app.
                        </p>
                        <div class="align-center tutorial-card-buttons">
                            <a href="{{ asset('Topimages/animated.mp4') }}" class="button eosh-default-btn" data-start="130" data-fancybox="video-gallery">
                                <svg style="color: #007ace" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="#00b3b3">
                                    <polygon points="10,8 16,12 10,16" fill="black"/>
                                </svg>
                                Watch Video
                            </a>
                            <a  onclick="handleNavigation('/user-guide')">
                                Read instruction
                            </a>
                        </div>
                    </div>


                </section>
                <div class="tutorial-pagination align-center">
                    <button type="button" class="icon-prev" id="prev-btn" disabled></button>
                    <button type="button" class="icon-next" id="next-btn"></button>
                    &nbsp;
                    <div id="pageNum">0 / 2</div>
                </div>

            </div>
        </div>
    </article>
</section>

<section class="full-width zero-bottom-padding" id="recommended_app">
    <div class="table-card card recommendation-container-slider">
        <div style="text-align: end">
            <a class="dismissColor" id="closeRecommendedAppBtn" data-dismiss-target="#recommended_app"
               data-dismiss-key="RecommendedAppDismissed">
                Dismiss
            </a>
        </div>

        <!-- Slider Container -->
        <div class="slider">
            <div class="recommendation_banner_slider">
                <!-- Slide 1 -->
                <div class="slide_item">
                    <div class="grid-container">
                        <div class="grid-image">
                            <img src="{{ asset('assets/images/mpc.webp') }}" alt="Pricing Calculator Image" loading="lazy" />
                        </div>
                        <div class="grid-content">
                            <div>
                                <h2 class="eosh-h2">Sell everything with the price unit using our pricing calculator</h2>
                                <p class="para_size">
                                    Sell Anything, Anytime! Use our price per unit calculator for variable-sized products like wallpapers, tiles, fabrics, and more—priced by length, width, area, or volume!
                                </p>
                                <div class="align-center">
                                    <a class="button eosh-brand-btn" href="https://apps.shopify.com/measurement-price-calculator?show_store_picker=1" target="_blank">
                                        Enjoy-10 days Free Trial
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="slide_item">
                    <div class="grid-container">
                        <div class="grid-image">
                            <img src="{{ asset('assets/images/variator.webp') }}" alt="Variator App Image" loading="lazy">
                        </div>
                        <div class="grid-content">
                            <div>
                                <h2 class="eosh-h2">Maximize your catalog visibility and sales by displaying all variants!</h2>
                                <p class="para_size">
                                    Unlock Endless Options! The Variator App showcases infinite variants in your collection, making it easy for shoppers to find the perfect product—no dropdowns needed!
                                </p>
                                <div class="align-center">
                                    <a class="button eosh-brand-btn" href="https://apps.shopify.com/variants-as-separate-products?show_store_picker=1" target="_blank">
                                        Enjoy-10 days Free Trial
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide3 -->
                <div class="slide_item">
                    <div class="grid-container">
                        <div class="grid-image">
                            <img src="{{ asset('assets/images/mobileApp.webp') }}" alt="Mobile App Image"/>
                        </div>
                        <div class="grid-content">
                            <div>
                                <h2 class="eosh-h2">Boost Sales Transform Your Store into a Mobile App in a Flash!</h2>
                                <p class="para_size">
                                    Turn Your Store into a Mobile App Effortlessly! Create a fully functional app that syncs with your store and boosts sales with push notifications—no extra advertising costs needed!    </p>
                                <div class="align-center">
                                    <a class="button eosh-brand-btn" href="https://apps.shopify.com/mobile-app-builder-extendons?show_store_picker=1" target="_blank">
                                        Enjoy-7 days Free Trial
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide4 -->
                <div class="slide_item">
                    <div class="grid-container">
                        <div class="grid-image">
                            <img src="{{ asset('assets/images/orderOnWhatsapp.webp') }}" alt="Mobile App Image"/>
                        </div>
                        <div class="grid-content">
                            <div>
                                <h2 class="eosh-h2">Boost your conversion rate with WhatsApp chat orders</h2>
                                <p class="para_size">
                                    Display the 'Order on WhatsApp' button on product, collection and cart pages. Add multiple business contacts to simplify chatting and streamline orders!
                                </p>
                                <div class="align-center">
                                    <a class="button eosh-brand-btn" href="https://apps.shopify.com/whatsapp-order?show_store_picker=1" target="_blank">
                                        Enjoy-10 days Free Trial
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Custom Navigation Buttons -->
            <div class="btn-wrap">
                <button class="slide-arrow prev-arrow"><img class="recommendation_img" src="recommendation-images/prev.png"></button>
                <button class="slide-arrow next-arrow"><img class="recommendation_img" src="recommendation-images/next.png"></button>
            </div>
        </div>
    </div>
</section>


@include('partials.feature_requests')
@include('partials.help_center')

<section class="full-width zero-bottom-padding" id="rateUs">
    <article>
        <div class="table-card card shopify-info-bg shopify-info-border">
            <div class="">
                <div class="columns twelve" style="display: flex; justify-content: space-between;">
                    <h2 class="eosh-h2">
                        <svg style="color: #007ace" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="#007bff">
                            <circle cx="12" cy="12" r="12" />
                            <text x="50%" y="50%" text-anchor="middle" fill="white" font-size="12" font-family="Arial" dy=".3em">!</text>
                        </svg>
                        How was your experience with Extendons Hide Price
                    </h2>
                    <span class="eosh-close-btn" id="closeRateUsBtn" data-dismiss-target="#rateUs" data-dismiss-key="rateUsDismissed">&times;</span>
                </div>

                <div style="padding: 0 30px;">
                    <p class="para_size">
                        Rate your experience by tapping 5 stars!
                    </p>
                    <a href="https://apps.shopify.com/hide-price-add-to-cart#modal-show=WriteReviewModal" target="_blank">
                        <img src="{{ asset('assets/images/stars.webp') }}" loading="lazy"/>
                    </a>
                </div>
            </div>
            <div class="" style="text-align: end">
                <div style="bottom: 20px; position: absolute; right: 20px;">
                    <a class="button eosh-brand-btn" href="https://apps.shopify.com/hide-price-add-to-cart#modal-show=WriteReviewModal" target="_blank">
                        Rate Us
                    </a>
                </div>
            </div>
        </div>
    </article>
</section>

<section class="full-width zero-bottom-padding" id="upsell">
    <article>
        <div class="table-card card">
            <div class="">
                <div class="columns twelve" style="display: flex; justify-content: space-between;">
                    <h2 class="eosh-h2">
                        Our More Apps
                    </h2>
                    <a class="dismissColor" id="closeUpsellBtn" data-dismiss-target="#upsell" data-dismiss-key="UpsellDismissed">
                        Dismiss
                    </a>
                </div>

                <div>
                    <p class="para_size">
                        Increase sessions, engage shoppers and promote your products by adding more apps.
                    </p>
                </div>
            </div>


            <div class="product-grid">

                <!-- Product Card 1 -->
                <div class="product-card-div">
                    <div style="display: flex;">
                        <img src="{{ asset('images/variator.webp') }}" alt="Variator Icon" loading="lazy" style="width: 50px; height: 50px; margin-right: 10px;">
                        <div>
                            <a class="eosh-h2" href="https://apps.shopify.com/variants-as-separate-products?show_store_picker=1" target="_blank">Variator: See Product Variants</a>
                            <div class="para_size" style="line-height: 30px;">
                                <span>4.8</span>
                                <span>★ (159)</span>
                                <span>Free trial available</span>
                                <p class="para_size">Variator: Show variants on collection pages as separate product</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="product-card-div">
                    <div style="display: flex;">
                        <img src="{{ asset('images/otp.webp') }}" alt="OTP Icon" loading="lazy" style="width: 50px; height: 50px; margin-right: 10px;">
                        <div>
                            <a class="eosh-h2" href="https://apps.shopify.com/login-with-phone-number?show_store_picker=1" target="_blank">Extendons OTP Login with Phone</a>
                            <div class="para_size" style="line-height: 30px;">
                                <span>5.0</span>
                                <span>★ (50)</span>
                                <span>Free trial available</span>
                                <p class="para_size">Fast & Seamless OTP verification</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="product-card-div">
                    <div style="display: flex;">
                        <img src="{{ asset('images/whatsapp.webp') }}" alt="Whatsapp Icon" loading="lazy" style="width: 50px; height: 50px; margin-right: 10px;">
                        <div>
                            <a class="eosh-h2" href="https://apps.shopify.com/whatsapp-order?show_store_picker=1" target="_blank">Extendons WhatsApp Integration</a>
                            <div class="para_size" style="line-height: 30px;">
                                <span>5.0</span>
                                <span>★ (40)</span>
                                <span>Free trial available</span>
                                <p class="para_size">Show order on WhatsApp on store pages & get more conversions</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Card 4 -->
                <div class="product-card-div">
                    <div style="display: flex;">
                        <img src="{{ asset('images/mpc.webp') }}" alt="MPC Icon" loading="lazy" style="width: 50px; height: 50px; margin-right: 10px;">
                        <div>
                            <a class="eosh-h2" href="https://apps.shopify.com/measurement-price-calculator?show_store_picker=1" target="_blank">Measurement Price Calculator</a>
                            <div class="para_size" style="line-height: 30px;">
                                <span>4.8</span>
                                <span>★ (47)</span>
                                <span>Free trial available</span>
                                <p class="para_size">Allows to conveniently calculate the price of products by entering measurements in respective units</p>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Product Card 5 -->
                <div class="product-card-div">
                    <div style="display: flex;">
                        <img src="{{ asset('images/pwyw.webp') }}" alt="pwyw Icon" loading="lazy" style="width: 50px; height: 50px; margin-right: 10px;">
                        <div>
                            <a class="eosh-h2" href="https://apps.shopify.com/pay-what-you-want-extendons?show_store_picker=1" target="_blank">Pay What You Want - PWYW</a>
                            <div class="para_size" style="line-height: 30px;">
                                <span>4.5</span>
                                <span>★ (49)</span>
                                <span>Free trial available</span>
                                <p class="para_size">Offer easy donation & make an offer with better price bargain</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Card 6 -->
                <div class="product-card-div">
                    <div style="display: flex;">
                        <img src="{{ asset('images/vat.webp') }}" alt="vat Icon" loading="lazy" style="width: 50px; height: 50px; margin-right: 10px;">
                        <div>
                            <a class="eosh-h2" href="https://apps.shopify.com/vat-dual-pricing?show_store_picker=1" target="_blank">Extendons VAT Dual Pricing</a>
                            <div class="para_size" style="line-height: 30px;">
                                <span>4.8</span>
                                <span>★ (25)</span>
                                <span>Free trial available</span>
                                <p class="para_size">Show include VAT price & exclude VAT dual price to B2B & B2C</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div>
                <a class="button eosh-default-btn" href="https://apps.shopify.com/partners/extendons" target="_blank">
                    View more apps
                </a>
            </div>

        </div>
    </article>
</section>


 

@include('footer.footer')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const cards = document.querySelectorAll('.tutorial-cards .help-center-card');
        const totalCards = cards.length;
        const cardsPerPage = 2;
        let currentPage = 0;

        function showPage(page) {
            const start = page * cardsPerPage;
            const end = start + cardsPerPage;

            cards.forEach((card, index) => {
                card.style.display = (index >= start && index < end) ? 'block' : 'none';
            });

            // Update button states
            document.getElementById('prev-btn').disabled = (page === 0);
            document.getElementById('next-btn').disabled = (end >= totalCards);
            document.getElementById('pageNum').innerHTML = (page + 1) + ' / ' + Math.ceil(totalCards / cardsPerPage);
        }

        document.getElementById('prev-btn').addEventListener('click', () => {
            if (currentPage > 0) {
                currentPage--;
                showPage(currentPage);
            }
        });

        document.getElementById('next-btn').addEventListener('click', () => {
            if (currentPage < Math.floor(totalCards / cardsPerPage)) {
                currentPage++;
                showPage(currentPage);
            }
        });

        // Show the first page on load
        showPage(currentPage);

        if (!localStorage.getItem("eidBannerClosed")) {
        document.getElementById("eidBanner").style.display = "block";
    } else {
        document.getElementById("eidBanner").style.display = "none";
    }
    document.getElementById("eidBannerHide").addEventListener("click", function () {
        document.getElementById("eidBanner").style.display = "none"; // Hide modal
        localStorage.setItem("eidBannerClosed", "true"); // Save in localStorage
    });
    });
</script>

@include('modal.feature_request_modal')


@endsection


