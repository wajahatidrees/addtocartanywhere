<div class="app_popup app-embed">
    <div class="app_popup_content">
        <div class="popup_body">

            <div class="img_block">
                <video src="{{ asset('tourGuide/settings.mp4') }}" alt="App Embed" width="100%" height="auto" autoplay loop muted playsinline >
                    Your browser does not support the video tag.
                </video>
            </div>
            
            <div class="text_block">
                <span class="header_tag_line">Step 2 of 3</span>
                <h3 class="body_heading">Configuration</h3>
                <p class="body_text">App Configuration is required to enable app and set the required information for
                    app setup. After this click <b style="color: #1b1b1b">Save</b> to save the configuration.</p>

                <div id="route-btn" data-page="app_setting">
                    <a class="button hidden-app_language-next-button  page-app_setting" href="{{ custom_route('show-setting', ['flow' => 'modal']) }}" style="display: none;">
                        App Configuration
                    </a>
                </div>

                <p class="body_message">
                    <img src="{{ asset('tourGuide/info.png') }}" alt="info" width="auto" height="auto">
                    Make sure to save your theme after each step.</p>
            </div>
        </div>

        <div class="popup_footer">
            <div>
                <button class="footer_btn" id="back-btn-step2" data-page="app_setting" data-direction="prev">
                    Back
                </button>
                <a href="#!" class="footer_link" id="skip-modal">skip</a>
            </div>
            <button class="footer_btn" id="setting-next-step" data-page="app_setting" data-direction="next">
                Next Step
            </button>
        </div>
    </div>
</div>
