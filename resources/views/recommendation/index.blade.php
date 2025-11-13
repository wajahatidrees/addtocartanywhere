@extends('shopify-app::layouts.default')
@section('content')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/recommendation.css') }}">
@endsection
@section('scripts')
    <script src="{{ asset('js/recommendation.js' )}}" defer></script>
@endsection
<input type="hidden" data-host ="{{app('request')->input('host')}}">
<div class="section_padding">
    <div class="recommendation-container">
        <h3 class="primary_title">Recommendation</h3>
        <p class="primary_text">Explore trusted apps to grow your brand</p>
        <div class="slider">
            <div class="banner_slider">
                <a target="_blank" href="https://share.seoant.com/app/11664ea3c848869R12" class="slide_item">
                    <img class="recommendation_img" src={{url('recommendation-images/recommended_app_1_banner.jpg')}} alt="banner">
                </a>
                <a target="_blank" href="https://parcelpanel.com?ref=rSC3LOGj&Extendons" class="slide_item">
                    <img class="recommendation_img" src={{url('recommendation-images/recommended_app_2_banner.png')}} alt="banner">
                </a>
            </div>
            <div class="btn-wrap">
                <button class="slide-arrow prev-arrow"><img class="recommendation_img" src="recommendation-images/prev.png"></button>
                <button class="slide-arrow next-arrow"><img class="recommendation_img" src="recommendation-images/next.png"></button>
            </div>
        </div>


        <section class="full-width zero-bottom-padding" id="upsellRecommendation" style="margin: 40px 0;">

            <div class="table-card card">
                <div class="">
                    <div class="columns twelve">
                        <h2 class="eosh-h2">
                            Recommended Apps
                        </h2>
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
                            <img src="{{url('recommendation-images/recommended_app_1.webp')}}" alt="App1" loading="lazy" style="width: 50px; height: 50px; margin-right: 10px;">
                            <div>
                                <a class="eosh-h2" href="https://share.channelwill.com/app/33664c0f53c2affZlO" target="_blank">Loloyal: Loyalty and Referral</a>
                                <div class="para_size" style="line-height: 30px;">
                                    <span>4.9</span>
                                    <span>★</span>
                                    <span>Free trial available</span>
                                    <p class="para_size">Loyalty program with Points, Rewards, Referral, VIP, & POS</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 2 -->
                    <div class="product-card-div">
                        <div style="display: flex;">
                            <img src="{{url("recommendation-images/recommended_app_2.png")}}" alt="App2" loading="lazy" style="width: 50px; height: 50px; margin-right: 10px;">
                            <div>
                                <a class="eosh-h2" href="https://parcelpanel.com?ref=rSC3LOGj&Extendons" target="_blank">Parcel Panel Order Tracking</a>
                                <div class="para_size" style="line-height: 30px;">
                                    <span>5.0</span>
                                    <span>★</span>
                                    <span>Free trial available</span>
                                    <p class="para_size">All-in-1 order tracker, Track order for higher CSAT and sales</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 3 -->
                    <div class="product-card-div">
                        <div style="display: flex;">
                            <img src="{{url("recommendation-images/recommended_app_3.png")}}" alt="App3" loading="lazy" style="width: 50px; height: 50px; margin-right: 10px;">
                            <div>
                                <a class="eosh-h2" href="https://apps.shopify.com/quoli-product-reviews-ugc" target="_blank">Quoli Product Reviews & UGC</a>
                                <div class="para_size" style="line-height: 30px;">
                                    <span>4.9</span>
                                    <span>★</span>
                                    <span>Free trial available</span>
                                    <p class="para_size">Collect and display product reviews, photos, videos and UGC.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

    </div>
</div>
@endsection
