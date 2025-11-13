var svgErrorIcon = '<svg style="color:red;" width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ff0000" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M12 21C10.22 21 8.47991 20.4722 6.99987 19.4832C5.51983 18.4943 4.36628 17.0887 3.68509 15.4442C3.0039 13.7996 2.82567 11.99 3.17294 10.2442C3.5202 8.49836 4.37737 6.89472 5.63604 5.63604C6.89472 4.37737 8.49836 3.5202 10.2442 3.17294C11.99 2.82567 13.7996 3.0039 15.4442 3.68509C17.0887 4.36628 18.4943 5.51983 19.4832 6.99987C20.4722 8.47991 21 10.22 21 12C21 14.387 20.0518 16.6761 18.364 18.364C16.6761 20.0518 14.387 21 12 21ZM12 4.5C10.5166 4.5 9.0666 4.93987 7.83323 5.76398C6.59986 6.58809 5.63856 7.75943 5.07091 9.12988C4.50325 10.5003 4.35473 12.0083 4.64411 13.4632C4.9335 14.918 5.64781 16.2544 6.6967 17.3033C7.7456 18.3522 9.08197 19.0665 10.5368 19.3559C11.9917 19.6453 13.4997 19.4968 14.8701 18.9291C16.2406 18.3614 17.4119 17.4001 18.236 16.1668C19.0601 14.9334 19.5 13.4834 19.5 12C19.5 10.0109 18.7098 8.10323 17.3033 6.6967C15.8968 5.29018 13.9891 4.5 12 4.5Z" fill="#ff0000"></path><path d="M12 13C11.8019 12.9974 11.6126 12.9176 11.4725 12.7775C11.3324 12.6374 11.2526 12.4481 11.25 12.25V8.75C11.25 8.55109 11.329 8.36032 11.4697 8.21967C11.6103 8.07902 11.8011 8 12 8C12.1989 8 12.3897 8.07902 12.5303 8.21967C12.671 8.36032 12.75 8.55109 12.75 8.75V12.25C12.7474 12.4481 12.6676 12.6374 12.5275 12.7775C12.3874 12.9176 12.1981 12.9974 12 13Z" fill="#ff0000"></path><path d="M12 16C11.8019 15.9974 11.6126 15.9176 11.4725 15.7775C11.3324 15.6374 11.2526 15.4481 11.25 15.25V14.75C11.25 14.5511 11.329 14.3603 11.4697 14.2197C11.6103 14.079 11.8011 14 12 14C12.1989 14 12.3897 14.079 12.5303 14.2197C12.671 14.3603 12.75 14.5511 12.75 14.75V15.25C12.7474 15.4481 12.6676 15.6374 12.5275 15.7775C12.3874 15.9176 12.1981 15.9974 12 16Z" fill="#ff0000"></path></g></svg>';
$(document).ready(function () {

    /*
     * Tabs color on active
     */

    $(document).on('click', 'ul.tabs li', function(e) {
        e.preventDefault();
        var tab_id = $(this).children().attr('href');
        var disabled= $(this).children().attr("disabled");
        jQuery('ul.tabs li').removeClass('active');
        jQuery('.tab-content').removeClass('current');
        jQuery('.tab-content').hide();
        jQuery(this).addClass('active');
        jQuery(tab_id).addClass('current');
        jQuery(tab_id).show();
    });

    $(".customer_tag").select2({
        width: '100%',
        placeholder: "Select Tag",
        allowClear: true,
        multiple: true,
    });
    /*
     * Initialize Select2
     */
    $(".product_id").select2({
        width: '100%',
        placeholder: "Select Products",
        allowClear: true,
        multiple: true,
        maximumSelectionLength: 20,
        tokenSeparators: [','],
        ajax: {
            delay:500,
            url:'/product/name',
            dataType: "json",
            type: "GET",
            data: function (params) {
                var queryParameters = {
                    term: params.term
                };
                return queryParameters;
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.title,
                            id: item.id
                        }
                    })
                };
            }
        }
    });

    $(".collection_id").select2({
        width: '100%',
        placeholder: "Select Collection",
        allowClear: true,
        multiple: true,
        maximumSelectionLength: 20,
        tokenSeparators: [','],
        ajax: {
            delay:500,
            url:'/collection/name',
            dataType: "json",
            type: "GET",
            data: function (params) {
                var queryParameters = {
                    term: params.term
                };
                return queryParameters;
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.title,
                            id: item.id
                        }
                    })
                };
            }
        }
    });
    $(".collection_handle").select2({
        width: '100%',
        placeholder: "Select Collection",
        allowClear: true,
        multiple: true,
        maximumSelectionLength: 20,
        tokenSeparators: [','],
        ajax: {
            delay:500,
            url:'/collection/handle',
            dataType: "json",
            type: "GET",
            data: function (params) {
                var queryParameters = {
                    term: params.term
                };
                return queryParameters;
            },
            processResults: function (data) {
                console.log(data);
                return {
                    results: data
                };
            }
        }
    });
    /*
     * widget chat code
     */
    // $(document).on('click',".chatbot__button, .eosh_chatbot__button_popup,.eosh_chat-with-us", function (event) {
    //     event.preventDefault();
    //     $('.popup').toggleClass('show-chatbot');
    // });
    $(".chatbot__button, .eosh_chatbot__button_popup, .eosh_chat-with-us").click(function(event){
        event.preventDefault();
        $('.popup').toggleClass('show-chatbot');
    });
    $(document).on('click', '.card_link', function (event) {
        event.preventDefault();
        if($(this).attr("data-attr") == "whatsapp_btn"){
            $('.main-popup').css('display', 'none');
            $('.inner-popup').css('display', 'block');
            $('.inner-header-image').attr('style',"background:url(whatsapp.png) center center / cover no-repeat;");
            $('#whatsapp_text').html('Whatsapp');
            $(".send_btn").attr('data-attr','whatsapp_btn');
        }
        if($(this).attr("data-attr") == "telegram_btn"){
            $('.main-popup').css('display', 'none');
            $('.inner-popup').css('display', 'block');
            $('.inner-header-image').attr('style',"background:url(telegram.png) center center / cover no-repeat;");
            $('#whatsapp_text').html('Telegram');
            $(".send_btn").attr('data-attr','telegram_btn');
        }
        if($(this).attr("data-attr") == "skype_btn"){
            window.open("https://join.skype.com/invite/XgehoJH5ruN7");
        }
    });
    $(document).on('click', '.send_btn', function (event) {
        event.preventDefault();
        if($(this).attr("data-attr") == "whatsapp_btn"){
            if($('#type-message').val() != ""){
                var whatsappNumber="+923054285555";
                var textMessage=$('#type-message').val();
                var textMessage1=textMessage;
                $('#type-message').val('');
                window.open("https://api.whatsapp.com/send?phone=" + whatsappNumber + "&text=App%20Name:Extendons%20Hide%20Price%20App%0A%0A" + textMessage1, '_blank');
            }
        }
        if($(this).attr("data-attr") == "telegram_btn"){
            if($('#type-message').val() != ""){
                var telgramId="muzammilmalik15";
                var textMessage=$('#type-message').val();
                var textMessage1=textMessage;
                $('#type-message').val('');
                window.open("https://t.me/"+telgramId + "?text=" + textMessage1);
            }
        }
    });
    $(document).on('click', '#back-btn', function (event) {
        event.preventDefault();
        $('.inner-popup').css('display', 'none');
        $('.main-popup').css('display', 'block');
    });
    /*
     * annual billing events
     */
    $(document).on('click', '.eosh_monthly-btn', function (event){

        if ($(".eosh_yearly-btn").hasClass("eosh_active")) {
            $(".eosh_yearly-btn").removeClass("eosh_active");
            $(".eosh_monthly-btn").addClass("eosh_active");
            $(".eosh_monthly").css({ display: "flex" });
            $(".eosh_yearly").css({ display: "none" });
        }
    });
    $(document).on('click', '.eosh_yearly-btn', function (event){
        if ($(".eosh_monthly-btn").hasClass("eosh_active")) {
            $(".eosh_monthly-btn").removeClass("eosh_active");
            $(".eosh_yearly-btn").addClass("eosh_active");
            $(".eosh_yearly").css({ display: "flex" });
            $(".eosh_monthly").css({ display: "none" });
        }
    });
    $(document).on('click', '.eosh-tryApp', function (event){
        event.preventDefault();
        window.open($(this).attr('href'));
    });
});





/*
 * loading on
 */
function loadingOn() {
    jQuery('.app-loader').show();
}
/*
 * loading off
 */
function loadingOff(){
    jQuery('.app-loader').hide();
}

function windowScroll() {
    window.scroll({
        top: 0,
        left: 0,
        behavior: 'smooth'
    });
}

/*
 * Success message
 */
function successMessage(message) {

    jQuery('.sm-content').text(message);

    jQuery('.success-message').removeClass('default-hidden');
    window.setTimeout(function(){
        jQuery(".success-message").addClass("default-hidden");
    },3000);
}

/*
 * Error message
 */
function errorMessage(message) {

    jQuery('.em-content').text(message);

    jQuery('.error-message').removeClass('default-hidden');
    window.setTimeout(function(){
        jQuery(".error-message").addClass("default-hidden");
    },5000);
}

/*
 * Show Validation Errors on its input
 */
function validationError(reject,formSelector){
    if (reject.status === 422) {
        var response = JSON.parse(reject.responseText);
        jQuery.each( response.errors, function( key, value) {
            jQuery("."+formSelector+" #" + key + "_error").text(" " + value[0]).prepend(svgErrorIcon).show();
            setTimeout(function() {
                jQuery( "."+formSelector+" #" + key + "_error").fadeOut('fast');
            }, 3000);
        });
    }
}

function validationError(reject){
    if (reject.status === 422) {
        var response = JSON.parse(reject.responseText);
        console.log(response);
        jQuery.each( response.errors, function( key, value) {
            jQuery("#" + key + "_error").text(" " + value[0]).prepend(svgErrorIcon).show();
            jQuery("#" + key).addClass("error-border");
            // setTimeout(function() {
            //     jQuery("#" + key + "_error").fadeOut('fast');
            // }, 3000);
            jQuery("#" + key).on("input select change", function() {
                jQuery("#" + key).removeClass("error-border");
                jQuery("#" + key + "_error").hide();
            });
            if(jQuery("#" + key).length === 0){
                setTimeout(function() {
                    jQuery("#" + key + "_error").fadeOut('fast');
                }, 3000);
            }
        });
    }
}

/*
 * Return Capital First Letter
 */
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
}
