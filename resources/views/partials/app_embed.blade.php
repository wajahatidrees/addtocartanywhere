
<div class="app_popup app-embed">
    <div class="app_popup_content">
        <div class="popup_body">

            <div class="img_block">
                <video src="{{ asset('tourGuide/appembeds.mp4') }}" alt="App Embed" width="100%" height="auto" autoplay loop muted playsinline >
                    Your browser does not support the video tag.
                </video>
            </div>

            <div class="text_block">
                <span class="header_tag_line">Step 3 of 3</span>
                <h3 class="body_heading">App Embeds</h3>
                <p class="body_text">Click on the 'App Embeds' button and enable app embeds.</p>

                <div id="route-btn" data-page="app_embed"></div>

            </div>
        </div>

        <div class="popup_footer">
            <div>
                <button class="footer_btn" id="back-btn-step5" data-page="app_embed" data-direction="prev">Back</button>
                <a href="#!" class="footer_link" id="skip-modal">Skip</a>
            </div>
            <button class="footer_btn" id="embed-next-step" data-page="app_embed" data-direction="next">Next Step
            </button>
        </div>
        
    </div>
</div>
