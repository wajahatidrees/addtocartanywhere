<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ \Osiset\ShopifyApp\Util::getShopifyConfig('app_name') }}</title>
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/uptown.min.css') }}"> -->
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/all.css') }}">

        <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"> -->
        <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
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
        <link rel="stylesheet" href="{{ asset('tourGuide/style.css') }}"> -->

    <style>
        @media only screen and (max-width: 900px) {
            section .card .custom-card {
                padding: 0.5rem;
            }
            .custom-padding {
                padding: 0rem;
            }
        }
        @media (max-width: 480px) {
            a.get-support {
                display: none;
            }
            i.custom-icon-css {
                padding: 14px !important;
            }
        }
    </style>
    
    @yield('styles')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <script src="{{ asset('js/setting.js' )}}" defer></script>
    <script src="{{ asset('js/all.js' )}}" ></script>
    <script src="{{ asset('js/feature_request.js' )}}" defer></script>
   
       <!-- <script src="{{ asset('js/jquery-3.3.1.min.js' )}}"></script> -->
       <!-- <script src="{{ asset('js/app.js' )}}"></script> -->
        <!-- <script src="{{ asset('js/moment.min.js') }}"></script>
        <script src="{{ asset('js/select2.min.js' )}}"></script>
        <script src="{{ asset('js/common.js' )}}"></script>
        <script src="{{ asset('js/slick.min.js' )}}"></script>
        <script src="{{ asset('js/fancybox.umd.js' )}}"></script>
        <script src="{{ asset('js/faq.js' )}}"></script> -->
        <!-- <script src="{{ asset('js/feature_request.js' )}}" defer></script> -->
        <!-- <script src="{{ asset('js/setting.js' )}}" defer></script> -->

        <script>
            $(document).ready(function(){
                setTimeout(function() {
                    // $('#topBarLoader').hide();
                    // $('#topBarHeader').fadeIn('slow');
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

                }, 1000);




            });
        </script>  

        <script>
                const counters = [3, 3, 3, 3, 3, 3];
                let selectedStyle = 0;

                function updateCounters() {
                document.querySelectorAll('.counter').forEach(counter => {
                    const index = counter.dataset.index;
                    if (index === undefined) return;

                    const countEl = counter.querySelector('.count');
                    const inputEl = counter.querySelector('input');

                    if (countEl) countEl.textContent = counters[index];
                    if (inputEl) inputEl.value = counters[index];
                });

                // Update selected header preview
                const selectedCounter = document.getElementById('selected-counter');
                // console.log(selectedCounter, 'sss');
                selectedCounter.innerHTML = getCounterHTML(selectedStyle);
                bindCounterEvents(); // Re-bind events for newly added buttons
                }

                function toggleDropdown() {
                const content = document.getElementById('dropdownContent');
                const arrow = document.getElementById('dropdownArrow');
                    const isOpen = content.style.display === 'flex';
                content.style.display = content.style.display === 'flex' ? 'none' : 'flex';
                arrow.classList.toggle('open', !isOpen);
                }

                function selectStyle(index) {
                selectedStyle = index;

                // Update label
                document.getElementById('selected-label').textContent = `Style ${index + 1}`;

                // Highlight selected row
                document.querySelectorAll('.dropdown-content .row').forEach((row, i) => {
                    row.classList.toggle('selected', i === index);
                });

                toggleDropdown();
                updateCounters();
                }

                function getCounterHTML(index) {
                const value = counters[index];
                switch (index) {
                    case 0:
                    return `
                        <div class="counter style1">
                        <button class="btn plus">+</button>
                        <span class="count">${value}</span>
                        <button class="btn minus">−</button>
                        </div>`;
                    case 1:
                    return `
                        <div class="counter style2">
                        <button class="btn plus">+</button>
                        <span class="count">${value}</span>
                        <button class="btn minus">−</button>
                        </div>`;
                case 2:
                return `
                    <div class="counter style3">
                    <div class="custom-input">
                        <span class="value">${value}</span>
                        <div class="arrows">
                        <button class="arrow up">▲</button>
                        <button class="arrow down">▼</button>
                        </div>
                    </div>
                    </div>`;
                    case 3:
                    return `
                        <div class="counter style4">
                        <button class="btn left">◀</button>
                        <span class="count">${value}</span>
                        <button class="btn right">▶</button>
                        </div>`;
                    case 4:
                    return `
                        <div class="counter style5">
                        <span class="btn plus">+</span>
                        <span class="count">${value}</span>
                        <button class="btn minus">−</button>
                        </div>`;
                    case 5:
                    return `
                        <div class="counter style6">
                        <button class="btn plus">+</button>
                        <span class="count">${value}</span>
                        <button class="btn minus">−</button>
                        </div>`;
                    default:
                    return '';
                }
                }

                function bindCounterEvents() {
                document.querySelectorAll('.counter').forEach(counter => {
                    const index = counter.dataset.index;
                    if (index === undefined) return;

                    counter.querySelector('.plus')?.addEventListener('click', e => {
                    e.stopPropagation();
                    counters[index]++;
                    updateCounters();
                    });

                    counter.querySelector('.minus')?.addEventListener('click', e => {
                    e.stopPropagation();
                    if (counters[index] > 0) counters[index]--;
                    updateCounters();
                    });

                const valueEl = counter.querySelector('.value');
                const upBtn = counter.querySelector('.arrow.up');
                const downBtn = counter.querySelector('.arrow.down');

                    if (valueEl && upBtn && downBtn) {
                    upBtn.addEventListener('click', e => {
                        e.stopPropagation();
                        counters[index]++;
                        updateCounters();
                    });

                downBtn.addEventListener('click', e => {
                    e.stopPropagation();
                    if (counters[index] > 0) counters[index]--;
                    updateCounters();
                });
                }
                });
                }

            // Initial render
            updateCounters();
        </script>

     <script src="{{ asset('js/jscolor.min.js' )}}"></script>
    @if(\Osiset\ShopifyApp\Util::getShopifyConfig('appbridge_enabled'))
    <script src="{{config('shopify-app.appbridge_cdn_url') ?? 'https://unpkg.com'}}/@shopify/app-bridge{{ \Osiset\ShopifyApp\Util::getShopifyConfig('appbridge_version') ? '@'.config('shopify-app.appbridge_version') : '' }}"></script>
            
    <script src="{{config('shopify-app.appbridge_cdn_url') ?? 'https://unpkg.com'}}/@shopify/app-bridge-utils{{ \Osiset\ShopifyApp\Util::getShopifyConfig('appbridge_version') ? '@'.config('shopify-app.appbridge_version') : '' }}"></script>    
       
        <script
            @if(\Osiset\ShopifyApp\Util::getShopifyConfig('turbo_enabled'))
            data-turbolinks-eval="false"
            @endif
        >
            var AppBridge = window['app-bridge'];
            var actions = AppBridge.actions;
            var utils = window['app-bridge-utils'];
            var createApp = AppBridge.default;
            var AppLink = actions.AppLink;
            var NavigationMenu = actions.NavigationMenu;
            var app = createApp({
                apiKey: "{{ \Osiset\ShopifyApp\Util::getShopifyConfig('api_key', base64_decode(\Request::get('host'))) }}",
                shopOrigin: "{{ base64_decode(\Request::get('host')) }}",
                host: "{{ \Request::get('host') }}",
                forceRedirect: true,
            });
            const itemAppConfiguration = AppLink.create(app, {
                label: 'Configuration',
                destination: '/general_setting',
            });
          
       
            const itemUserGuide = AppLink.create(app, {
                label: 'User Guide',
                destination: '/user-guide',
            });
            const itemAppPlans = AppLink.create(app, {
                label: 'Plans',
                destination: '/plans',
            });
            const itemAppFAQs = AppLink.create(app, {
                label: 'FAQs',
                destination: '/faq',
            });
            const itemRecommendation = AppLink.create(app, {
                label: 'Recommendation',
                destination: '/recommendation',
            });

            @if(auth()->check() && !empty(auth()->user()->plan_id))
            const navigationMenu  = NavigationMenu.create(app, {
                    items: [itemAppConfiguration, itemUserGuide, itemAppPlans, itemAppFAQs, itemRecommendation],
                    active: undefined,
                });
            @elseif(auth()->check() && auth()->user()->shopify_freemium == 1)
                const navigationMenu  = NavigationMenu.create(app, {
                    items: [itemAppConfiguration, itemUserGuide, itemAppFAQs, itemRecommendation],
                    active: undefined,
                });
            @else 
            const navigationMenu = NavigationMenu.create(app, {
                    items: [itemAppPlans, itemRecommendation],
                    active: undefined,
                });
            @endif
            
                Toast = actions.Toast;
                window.shopifyToast = function(message) {
                var toastMessage = Toast.create(app, {
                    message,
                    duration: 2700,
                });
                toastMessage.dispatch(Toast.Action.SHOW);
            }

            window.handleNavigation = (destination) => {
                var redirect = actions.Redirect.create(app);
                redirect.dispatch(actions.Redirect.Action.APP, destination);
            };


            const ContextualSaveBar = actions.ContextualSaveBar;
            window.shopifySavebar = function(saveAction, discardAction, selector, hide, discardCallback = () => {}) {
                const contextualSaveBar = ContextualSaveBar.create(app, {
                    saveAction,
                    discardAction,
                });
                if (hide) {
                    contextualSaveBar.dispatch(ContextualSaveBar.Action.HIDE);
                } else {
                    contextualSaveBar.dispatch(ContextualSaveBar.Action.SHOW);
                }
              
                contextualSaveBar.subscribe(
                    ContextualSaveBar.Action.SAVE,
                    function() {
                        contextualSaveBar.set({
                            saveAction: {
                                disabled: true,
                                loading: true
                            }
                        });
                        document.querySelector(selector).click();
                    }
                );
                contextualSaveBar.subscribe(
                    ContextualSaveBar.Action.DISCARD,
                    discardCallback
                );
            }
            shopifySavebar({}, {}, '', true);
        </script>

        @include('shopify-app::partials.token_handler')
        @include('shopify-app::partials.flash_messages')
    @endif
    @yield('scripts')

</head>
    <body>
        <div class="app-wrapper">
            <div class="app-content">
                <main role="main">
                    <div class="lds-ring app-loader"><div></div><div></div><div></div><div></div></div>

                    @yield('content')
                    <footer>
                        @if(@$tourData['showTourModal'] && !@$tourData['isModalFlow'])
                            <div class="app_popup_container">
                                @include('partials.' . $tourData['tourStep'])
                            </div>
                        @endif

                        <script>
                            Fancybox.bind('[data-fancybox="video-gallery"]', {
                                Thumbs: false,
                                on: {
                                    reveal: (fancybox, slide) => {
                                        const videoElement = slide.contentEl.querySelector('video');
                                        if (videoElement) {
                                            const startTime = slide.triggerEl.getAttribute('data-start') || 0;
                                            videoElement.currentTime = startTime;
                                            videoElement.play();
                                        }else {
                                            console.log('No video or iframe found.');
                                        }
                                    }
                                }
                            });
                        </script>

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

                        {{-- Dismissale Generic Function --}}
                        <script>
                            function setupDismissables() {
                                $('[data-dismiss-target]').each(function () {
                                    const element = $(this);
                                    const elementSelector = element.attr('data-dismiss-target');
                                    const storageKey = element.attr('data-dismiss-key');
                                    if (sessionStorage.getItem(storageKey) == 'true') {
                                        $(elementSelector).hide();
                                    }
                                    element.on('click', function () {
                                        $(elementSelector).slideUp();
                                        sessionStorage.setItem(storageKey, 'true');
                                    });
                                });
                            }
            </div>
        </div>
    </body>
</html>

