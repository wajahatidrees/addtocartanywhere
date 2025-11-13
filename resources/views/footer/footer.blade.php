<section class="full-width zero-bottom-padding">
    <article class="eosh_footer">

        <div class="eosh_chat_email">
                            <span class="eosh_footer-text">
                                Chat with Our Experts...</span>
        </div>
        <div class="eosh_social-media">
            <a href="https://wa.me/+923054285555" rel="nofollow noopener noreferrer" target="blank">
                <img src="{{ asset('/images/whatsapp_footer.webp') }}" loading="lazy">
            </a>
            <a href="https://join.skype.com/invite/XgehoJH5ruN7" rel="nofollow noopener noreferrer" target="blank">
                <img src="{{  asset('/images/skype_footer.webp') }}" loading="lazy">
            </a>
            <a href="https://support.extendons.com/open.php" rel="nofollow noopener noreferrer" target="blank">
                <img src="{{ asset('/images/mail_footer.webp') }}" loading="lazy">
            </a>
        </div>

    </article>
</section>

<div class="popup">
    <div class="popup-btn">
        <button class="chatbot__button">
                                <span class="icon whatsapp-btn">
                                    <img src="{{asset('images/sms.webp')}}" loading="lazy" alt="sms">
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
                    <!-- <p>Hi there Welcome to 👋</p> -->
                    <h3 class="chatbox__title">Extendons Support 👋</h3>
                    <p>We typically reply within 15-30 minutes.</p>
                </div>
            </div>
            <ul class="chatbot__box">
                <li class="card_item">
                    <button class="card_link"  data-attr="whatsapp_btn">
                        <div class="popup_avatar">
                            <img class="popup_avatar_image" src="{{asset('images/whatsapp.webp')}}" loading="lazy" alt="whatsapp">
                        </div>

                        <div class="popup_txt">
                            <div class="popup_name">Whatsapp</div>
                            <div class="popup_duty">Get Instant Reply</div>
                        </div>
                    </button>
                </li>

            <!-- <li class="card_item">
                                        <button class="card_link" data-attr="telegram_btn">
                                            <div class="popup_avatar">
                                                <img class="popup_avatar_image" src="{{asset('telegram.webp')}}" loading="lazy" alt="telegram">
                                            </div>

                                            <div class="popup_txt">
                                                <div class="popup_name">Telegram</div>
                                                <div class="popup_duty">Get Instant Reply</div>
                                            </div>
                                        </button>
                                    </li> -->

                <li class="card_item" >
                    <a class="card_skype card_link" data-attr="skype_btn">
                        <div class="popup_avatar">
                            <img class="popup_avatar_image" src="{{asset('images/skype.webp')}}" loading="lazy" alt="skype">
                        </div>

                        <div class="popup_txt">
                            <div class="popup_name">Skype</div>
                            <div class="popup_duty">Get Instant Reply</div>
                        </div>
                    </a>
                </li>

                <li class="card_item">
                    <a class="card_mail" data-attr="email_btn" target="_blank" href="mailto:ess@extendons.com">
                        <div class="popup_avatar">
                            <img class="popup_avatar_image" src="{{asset('images/gmail.webp')}}" loading="lazy" alt="mail">
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
                <div class="inner-header-image" style="background: url('./images/whatsapp.png') center center / cover no-repeat;"></div>
                <div class="inner-header-title">
                    <div class="popup_name" id="whatsapp_text">Whatsapp</div>
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
                    <a href="#" class="send_btn">
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