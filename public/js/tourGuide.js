
$(document).ready(function () {
    const setupGuideContainer = $('#setupGuideContainer');
    const embedModalBtn = $('.app_embed_btn');
    if (setupGuideContainer.length || embedModalBtn.length) {
        if(embedModalBtn.length) {
            embedModalBtn.css('display','none');
        }
        setTimeout(function () {
            $.ajax({
                url: '/setupGuide-data',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    if(setupGuideContainer.length){
                        setupGuideContainer.html(data.setupGuideHtml);
                    }
                    if(embedModalBtn.length){
                        if(data.themeNew){
                            $(embedModalBtn).empty().append(`
                                        <a class="button eosh-brand-btn" href="https://admin.shopify.com/store/${data.storeName}/themes/${data.currentThemeId}/editor?context=apps" target="_blank">
                                          Enable App Embed
                                         </a> `);
                        }
                        embedModalBtn.css('display','block');
                    }
                },
                error: function (error) {
                    console.error('Error fetching AppTour data:', error);
                }
            });
        }, 50);
    }

});

$('body').on('click', '#skip-tour,#lang-next-step, #configuration-next-step, #back-btn-step2, #back-btn-step3, #rule-next-step, #back-btn-step4, #embed-next-step', function () {
    var page = $(this).attr('data-page');
    var direction = $(this).attr('data-direction');

    $.ajax({
        url: '/tour/nextOrPrevTourStep',
        method: 'POST',
        data: { page: page, direction: direction },
        success: function (data) {
            if (page === 'all') {
                $('.app_popup_container').remove();
            } else {
                $('.app_popup_container').html(data['modalContent']);

                if (page == 'app_setting' && direction == 'prev') {
                    var lang = localStorage.getItem('lang');
                    if (lang) $(".tour-lang-select").val(lang);
                }

                if(data.themeNew){
                    $('#route-btn').empty().append(`
                                    <a class="button eosh-brand-btn"
                                    href="https://admin.shopify.com/store/${data.storeName}/themes/${data.currentThemeId}/editor?context=apps" target="_blank">
                                      Enable App Embed
                                     </a>
                                `);
                }
            }
        },
        error: function (reject) {
            //
        }
    });
});

$('body').on('click', '#skip-modal', function () {
    $('.app_popup_container').remove();
});

