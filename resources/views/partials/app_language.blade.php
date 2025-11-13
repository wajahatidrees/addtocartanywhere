
<div class="app_popup language">
    <div class="app_popup_content">
        <div class="popup_header">
            <span class="header_tag_line">Step 1 of 3</span>
            <h3 class="header_heading">Welcome to Extendons Cart on Collections App Tour Guide</h3>
        </div>

        <div class="popup_body">
            <h3 class="body_heading">Please select your language</h3>
            <span class="body_tag_line">This is the language that will be used for texts of the app.</span>


            <div class="dropdown">
                @include('partials.tourSelectLang')
            </div>
        </div>

        <div class="popup_footer">
            <div>
                <a href="#!" id="skip-tour" class="footer_link" data-page="all">skip all</a>
            </div>
            <button class="footer_btn" id="lang-next-step" data-page="app_language" data-direction="next">Next Step
            </button>
        </div>
    </div>
</div>


<script>
    
    $(document).ready(function () {
        $(function () {
            // Set
            var main = $('.dropdown .header')
            var li = $('.dropdown > .language_list > li.list_item')
            var inputoption = $(".dropdown .option")

            // Animation
            main.click(function () {
                li.toggle('fast');
            });

            // Insert Data
            li.click(function () {
                // hide
                li.toggle('fast');
                var livalue = $(this).data('value');
                var lihtml = $(this).html();
                main.html(lihtml);
                inputoption.val(livalue);
            });
        });
    });

</script>
