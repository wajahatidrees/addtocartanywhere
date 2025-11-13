
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ \Osiset\ShopifyApp\Util::getShopifyConfig('app_name') }}</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/uptown.min.css') }}">
        <link href="{{ mix('css/all.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/uptown.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/widgetSupport.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/fancybox.css') }}">
        <link type="text/css" rel="stylesheet"href="{{ asset('css/topBarWidget.css') }}">
        <link href="{{ asset('css/billing.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('css/footer.css') }}" type="text/css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/upsell.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/faq.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('tourGuide/badges.css') }}">
        <link rel="stylesheet" href="{{ asset('tourGuide/style.css') }}">
      
      < @yield('styles')
        <script src="{{ mix('js/all.js') }}" ></script>

        <script src="{{ asset('js/feature_request.js' )}}" defer></script>
        <script src="{{ asset('js/jquery-3.3.1.min.js' )}}"></script>
       <script src="{{ asset('js/app.js' )}}"></script>
        <script src="{{ asset('js/moment.min.js') }}"></script>
       <script src="{{ asset('js/select2.min.js' )}}"></script>
        <script src="{{ asset('js/common.js' )}}"></script>
        <script src="{{ asset('js/slick.min.js' )}}"></script>
       <script src="{{ asset('js/fancybox.umd.js' )}}"></script>
       <script src="{{ asset('js/faq.js' )}}"></script>

        
        @if(\Osiset\ShopifyApp\Util::getShopifyConfig('appbridge_enabled'))
            <script src="https://unpkg.com/@shopify/app-bridge{{ \Osiset\ShopifyApp\Util::getShopifyConfig('appbridge_version') ? '@'.config('shopify-app.appbridge_version') : '' }}"></script>
            <script src="https://unpkg.com/@shopify/app-bridge-utils{{ \Osiset\ShopifyApp\Util::getShopifyConfig('appbridge_version') ? '@'.config('shopify-app.appbridge_version') : '' }}"></script>
            <script>
                @if(\Osiset\ShopifyApp\Util::getShopifyConfig('turbo_enabled'))
                    data-turbolinks-eval="false"
                @endif

                var AppBridge = window['app-bridge'];
                var actions = AppBridge.actions;
                var utils = window['app-bridge-utils'];
                var createApp = AppBridge.default;
                var app = createApp({
                    apiKey: "{{ \Osiset\ShopifyApp\Util::getShopifyConfig('api_key', base64_decode(\Request::get('host'))) }}",
                    shopOrigin: "{{ base64_decode(\Request::get('host')) }}",
                    host: "{{ \Request::get('host') }}",
                    forceRedirect: true,
                });
                
            </script>
            @include('shopify-app::partials.token_handler')
            @include('shopify-app::partials.flash_messages')
        @endif
    </head>

    <body>
        <div class="app-wrapper">
            <div class="app-content">
                <main role="main">

                        <div class="popup"> 
                             <div class="popup-btn">
                                <button class="chatbot__button">
                                    <span class="icon whatsapp-btn">
                                        <img src="{{asset('images/sms.webp')}}" alt="sms.webp">
                                        <span class="message-count">1</span>
                                    </span>
                                    <span class="icon cross-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#ffffff" viewBox="-5 -10 25 30">
                                            <path d="m8.659 6.998 5-5a1.177 1.177 0 0 0 0-1.657 1.177 1.177 0 0 0-1.657 0l-5 5-5-5A1.172 1.172 0 0 0 .345 1.998l5 5-5 5a1.172 1.172 0 0 0 0 1.657 1.177 1.177 0 0 0 1.657 0l5-5 5 5a1.177 1.177 0 0 0 1.657 0 1.177 1.177 0 0 0 0-1.657l-5-5z" fill="#fff"></path>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                            <div class="chatbot"> 
                                <div class="main-popup">
                                    <div class="chatbot__header">
                                        <div class="header-content">
                                            <h3 class="chatbox__title">Extendons Support 👋</h3>
                                            <p>We typically reply within 15-30 minutes.</p>
                                        </div>
                                    </div>

                                    <ul class="chatbot__box">

                                        <li class="card_item">
                                            <button class="card_link" data-attr="whatsapp_btn">
                                                <div class="popup_avatar">
                                                    <img class="popup_avatar_image" src="images/whatsapp.webp" alt="whatsapp">
                                                </div>
                                                <div class="popup_txt">
                                                    <div class="popup_name">Whatsapp</div>
                                                    <div class="popup_duty">Get Instant Reply</div>
                                                </div>
                                            </button>
                                        </li>
                                        <li class="card_item" >
                                            <button  class="card_link card_skype" data-attr="skype_btn">
                                                <div class="popup_avatar">
                                                    <img class="popup_avatar_image" src="images/skype.png" alt="skype">
                                                </div>
                                                <div class="popup_txt">
                                                    <div class="popup_name">Skype</div>
                                                    <div class="popup_duty">Get Instant Reply</div>
                                                </div>
                                            </button>
                                        </li>

                                        <li class="card_item">
                                            <a class="card_mail" href="mailto:ess@extendons.com"  data-attr="" target="_blank">
                                                <div class="popup_avatar">
                                                    <img class="popup_avatar_image" src="/images/gmail.png" alt="mail">
                                                </div>
                                                <div class="popup_txt">
                                                    <div class="popup_name">Email</div>
                                                    <div class="popup_duty">Create Ticket</div>
                                                </div>
                                            </a>
                                        </li>

                                    </ul>
                                </div> 

                                 <div id="chat-window" class="inner-popup" style="display: none">
                                    <div class="inner-header">
                                        <button id="back-btn" href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M14 20.001a.994.994 0 01-.747-.336l-8-9a.999.999 0 010-1.328l8-9a1 1 0 011.494 1.328l-7.41 8.336 7.41 8.336A.998.998 0 0114 20.001z"></path></svg>
                                        </button>
                                        <div class="inner-header-image" style="background: url('./images/whatsapp_data.png') center center / cover no-repeat;"></div>
                                        <div class="inner-header-title">
                                            <div class="popup_name"  id="whatsapp_text">Whatsapp</div>
                                            <div class="popup_duty">Support</div>
                                        </div>
                                    </div>

                                    <ul class="chatbot__box">
                                        <li class="support-msg">
                                            <p class="message">Hello! I'm Honey from the support team.</p>
                                        </li>
                                        <li class="support-msg">
                                            <p class="message">How may I help you?</p>
                                        </li>
                                        <li class="text-area">
                                            <textarea id="type-message" class="type_message" placeholder="Enter your message..."></textarea>
                                            <a href="#" class="send_message send_btn">
                                                <svg><path d="M1.388 15.77c-.977.518-1.572.061-1.329-1.019l1.033-4.585c.123-.543.659-1.034 1.216-1.1l6.195-.72c1.648-.19 1.654-.498 0-.687l-6.195-.708c-.55-.063-1.09-.54-1.212-1.085L.056 1.234C-.187.161.408-.289 1.387.231l12.85 6.829c.978.519.98 1.36 0 1.88l-12.85 6.83z"></path></svg>
                                            </a>
                                        </li>
                                    </ul>

                                </div> 

                                 <div class="footer">
                                    <p>Powered By <a href="https://apps.shopify.com/partners/extendons">Extendons</a></p>
                                </div> 
                             </div> 
                        </div> 

                    @yield('content')

                        <!-- <footer> 
                             <section class="eosh_footer"> 
                                <div class="eosh_chat_email">
                                    <span class="eosh_footer-text">
                                        Chat with Our Experts...</span>
                                </div> 
                                <div class="eosh_social-media"> 
                                     <a href="https://wa.me/+923054285555" rel="nofollow noopener noreferrer" target="blank">
                                        <img src="{{ asset('images/eosh-whatsapp.png') }}" widh="auto" height="auto" loading="lazy"> 
                                    </a> 
                                    <a href="https://join.skype.com/invite/XgehoJH5ruN7" rel="nofollow noopener noreferrer" target="blank">
                                        <img src="{{ asset('images/eosh-skype.png') }}" widh="auto" height="auto" loading="lazy"> 
                                    </a> 
                                     <a href="https://support.extendons.com/open.php" rel="nofollow noopener noreferrer" target="blank">
                                        <img src="{{ asset('images/eosh-mail.png') }}" widh="auto" height="auto" loading="lazy"> 
                                    </a> 
                                </div> 
                             </section> 

                            <script>
                                $(document).ready(function(){
                                    $(".eosh_slick-slider").slick({
                                        slidesToShow: 3,
                                        infinite:false,
                                        slidesToScroll: 1,
                                        prevArrow: '<a type="button" class="eosh_slide-arrow" style="left: -25px;"> <svg width="13" height="23" viewBox="0 0 13 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.25 0.25L13 2.125L3.75 11.5L13 20.875L11.25 22.75L0 11.5L11.25 0.25Z" fill="#77A833 !important"/></svg></a>',
                                        nextArrow: '<a type="button" class="eosh_slide-arrow" style="right: -10px;"> <svg width="13" height="23" viewBox="0 0 13 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.75 0.25L0 2.125L9.25 11.5L0 20.875L1.75 22.75L13 11.5L1.75 0.25Z" fill="#77A833 !important"/></svg></a>',
                                        responsive: [
                                            {
                                                breakpoint: 1280,
                                                settings: {
                                                    slidesToShow: 2,
                                                    slidesToScroll: 1,
                                                    infinite: true,
                                                }
                                            }
                                        ]
                                    });
                                });

                                Fancybox.bind('[data-fancybox="video-gallery"]', {
                                    Thumbs: false
                                });
                            </script> 

                            @if(@$tourData['showTourModal'] && !@$tourData['isModalFlow'])
                                <div class="app_popup_container">
                                    @include('partials.' . $tourData['tourStep'])
                                </div>
                            @endif

                            <script src="{{ asset('js/tourGuide.js' )}}"></script>
                            <script src="{{ asset('js/gtranslate.js' )}}" id="doTranslateJs"></script>
                            <script id="doTranslateScript">
                                window.gtranslateSettings = {
                                    "default_language": "en",
                                    "wrapper_selector": ".gtranslate_wrapper"
                                }

                                var timeout;
                                function invoke(e, t = 1) {
                                    var gtElement = document.querySelector(".gt_selector");
                                    var selectedLang = localStorage.getItem('lang');
                                    if (timeout) clearTimeout(timeout);
                                    if (!gtElement) {
                                        return timeout = setTimeout(() => {
                                            ++t;
                                            invoke(e, t);
                                        }, t);
                                    }

                                    gtElement.addEventListener("change", (e) => {
                                        var selectedLang = e.target.value;

                                        if (selectedLang == 'en|en' || selectedLang == 'auto|en') {
                                            doGTranslate(selectedLang);
                                            localStorage.removeItem('lang');
                                        } else {
                                            localStorage.setItem('lang', selectedLang);
                                        }
                                    });

                                    if (!selectedLang) return;
                                    gtElement.value = selectedLang;
                                    doGTranslate(selectedLang);
                                }

                                document.addEventListener('DOMContentLoaded', invoke);
                                (function () {
                                    var lang = localStorage.getItem('lang');
                                    if (lang) $(".tour-lang-select").val(lang);

                                    $(document).on("change", ".tour-lang-select", function (e) {
                                        var val = $(e.target).val();
                                        $(".gt_selector").val(val);
                                        if (val == 'en|en' || val == 'auto|en') {
                                            localStorage.removeItem('lang');
                                        }else{
                                            localStorage.setItem("lang", val);
                                        }
                                        doGTranslate(val);
                                    });
                                })();
                            </script>

                        </footer>  -->

                </main>
            </div>
        </div>
        @yield('scripts')
    </body>
</html>

