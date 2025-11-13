
    $(document).ready(function (){ 

            // Handle both forms in one listener
            $('#general-setting-form, #button-setting-form , #advance-customize-form ').submit(function (e) {
                e.preventDefault();

                const form = $(this);
                const formId = form.attr('id');

                var value  = $('.quantity-data').text().trim().replace(/\s+/g, '').toLowerCase();

                var formData = new FormData(this);
          
                if (formId === 'general-setting-form') {
                    if ($('#enable_id').length) {
                        formData.append('enable_app', $('#enable_id').is(':checked') ? '1' : '0');
                    }
                    if ($('#button_enable_id').length) {
                        formData.append('show_hide_button', $('#button_enable_id').is(':checked') ? '1' : '0');
                    }
                    if ($('#show_hide_varsize_color').length) {
                        formData.append('show_hide_varsize_color', $('#show_hide_varsize_color').is(':checked') ? '1' : '0');
                    }
                    if ($('#homepage_id').length) {
                        formData.append('show_widget_home', $('#homepage_id').is(':checked') ? '1' : '0');
                    }
                    if ($('#collectionpage_id').length) {
                        formData.append('show_widget_collection', $('#collectionpage_id').is(':checked') ? '1' : '0');
                    }
                    if ($('#resultpage_id').length) {
                        formData.append('show_widget_result', $('#resultpage_id').is(':checked') ? '1' : '0');
                    }
                    if ($('#show_hide_sold_out_button').length) {
                        formData.append('show_hide_sold_out_button', $('#show_hide_sold_out_button').is(':checked') ? '1' : '0');
                    }
                    if ($('#enable_animation_btn').length) {
                        formData.append('enable_animation_btn', $('#enable_animation_btn').is(':checked') ? '1' : '0');
                    }
                    if ($('#show_button_hover').length) {
                        formData.append('show_button_hover', $('#show_button_hover').is(':checked') ? '1' : '0');
                    }

                    if ($('#show_button_directly').length) {
                        formData.append('show_button_directly', $('#show_button_directly').is(':checked') ? '1' : '0');
                    }
                    if ($('#show_hide_un_var').length) {
                        formData.append('show_hide_un_var', $('#show_hide_un_var').is(':checked') ? '1' : '0');
                    }
                    
                    if (!formData.has('append_to_button_style')) {
                        formData.append('append_to_button_style', 'button'); 
                    }
                    
                    if (!formData.has('custom_text_color')) {       
                        formData.append('custom_text_color', '#1A0804'); // Default to black
                    }

                    if (!formData.has('custom_button_color')) {
                        formData.append('custom_button_color', '#A1F8A9');
                    }
                    
                    if (!formData.has('custom_puls_minus_color')) {   
                        formData.append('custom_puls_minus_color', '#B84848');
                    }

                    if (!formData.has('custom_quantity_color')) {   
                        formData.append('custom_quantity_color', '##2ea64e');
                    }
                }else if (formId === 'button-setting-form') {

                    if (!formData.has('quantity_button_style')) {   
                        formData.append('quantity_button_style', `${value}`);
                    }   

                    if (!formData.has('cart_button_style')) {   
                        formData.append('cart_button_style', 'rounded');
                    }   
                        
                }else if (formId === 'advance-customize-form') {

                    if (!formData.has('"quantity_btn_back_color"')) {
                        formData.append('"quantity_btn_back_color"', '#000000'); // Default to black
                    }

                    if (!formData.has('custom_puls_minus_color')) {
                        formData.append('custom_puls_minus_color', '#8B5CFF'); // Default to black
                    }
                
                    if (!formData.has('redirect_policy')) {
                        formData.append('redirect_policy', 'cart'); // Default to 'cart'
                    }
                }
                console.log([...formData]);
        
                saveSettings(formData);
            });
        
            // Reusable AJAX function
            function saveSettings(formData) {
                $.ajax({
                    url: "/store-setting",
                    type: 'POST',
                    dataType: "json",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // console.log(response);
                        if (response.status === 200) {
                            $('#addrulebtn').show();
                            $('#app_setting').find('.badge_icon').addClass('active');
                            successMessage(response.message);
                            setTimeout(() => $('.error-text').hide(), 2500);
                            windowScroll();
                        } else if (response.status === 400) {
                            validationError(response);
                        }
                    },
                    error: function (xhr) {
                        console.error('AJAX Error:', xhr.responseText);
                    }
                });
            }

            if($('select[name="append_to_button_style"] option:selected').val() == 'button'){
                  
                    var selectedStyle = $('select[name="diff_buttonstyle"]').val();
                
                    $('.quantity-style1').hide();
                    $('.quantity-style2').hide();
                    $('.quantity-style3').hide();
                    $('.quantity-style4').hide();
                    $('.quantity-style5').hide();
                    $('.quantity-style6').hide();
                   
                    $('.display-quantitybutton1').hide();
                    $('.display-quantitybutton2').hide();
                    $('.display-quantitybutton3').hide();
                    $('.display-quantitybutton4').hide();
                    $('.display-quantitybutton5').hide();
                    $('.display-quantitybutton6').hide();

                        // Hide all button styles
                    $('.cart-btn1, .cart-btn2, .cart-btn3, .cart-btn4 ,.cart-btn5').hide();

                    if (selectedStyle === "buttonstyle1") {
                        $('.cart-btn1').show();
                    } else if (selectedStyle === "buttonstyle2") {
                        $('.cart-btn2').show();
                    } else if (selectedStyle === "buttonstyle3") {
                        $('.cart-btn3').show();
                    } else if (selectedStyle === "buttonstyle4") {
                        $('.cart-btn4').show();
                    }else if (selectedStyle === "buttonstyle5") {
                        $('.cart-btn5').show();
                    }
            }
            else if($('select[name="append_to_button_style"] option:selected').val() == 'quantityselector'){             
                $('.button-live-preview').hide();
                $('.quantity-style1').hide();
                $('.quantity-style2').hide();
                $('.quantity-style3').hide();
                $('.quantity-style4').hide();
                $('.quantity-style5').hide();
                $('.quantity-style6').hide();
               
                if (selectedStyle === 'style1') {
                    $('.quantity-style1').show();
                } else if (selectedStyle === 'style2') {
                    $('.quantity-style2').show();
                } else if (selectedStyle === 'style3') {
                    $('.quantity-style3').show();
                } else if (selectedStyle === 'style4') {
                    $('.quantity-style4').show();
                }else if (selectedStyle === 'style5') {
                    $('.quantity-style5').show();
                }else if (selectedStyle === 'style6') {
                    $('.quantity-style6').show();
                }
            }

            $(document).on('change', '#add_button_style', function () {       
                if($(this).val() == 'button'){
                    
                    var buttonStyle = $('select[name="diff_buttonstyle"]').val();

                    $('.display-quantitybutton1').hide();
                    $('.display-quantitybutton2').hide();
                    $('.display-quantitybutton3').hide();
                    $('.display-quantitybutton4').hide();
                    $('.display-quantitybutton5').hide();
                    $('.display-quantitybutton6').hide();
                 
                    $('.quantity-style1').hide();
                    $('.quantity-style2').hide();
                    $('.quantity-style3').hide();
                    $('.quantity-style4').hide();
                    $('.quantity-style5').hide();
                    $('.quantity-style5').hide(); 
                    $('.quantity-style6').hide();

                    $('.cart-button-style1, .cart-button-style2, .cart-button-style3, .cart-button-style4, .cart-button-style5').hide();

                     // ✅ Show selected button style
                    if (buttonStyle === 'buttonstyle1') {
                        $('.cart-button-style1').show();
                    } else if (buttonStyle === 'buttonstyle2') {
                        $('.cart-button-style2').show();
                    } else if (buttonStyle === 'buttonstyle3') {
                        $('.cart-button-style3').show();
                    } else if (buttonStyle === 'buttonstyle4') {
                        $('.cart-button-style4').show();
                    }else if (buttonStyle === 'buttonstyle5') {
                        $('.cart-button-style5').show();
                    }
                }
                else if($(this).val() == 'quantityselector'){
                    
                      $('.cart-btn1, .cart-btn2, .cart-btn3, .cart-btn4, .cart-btn5').hide();
                      $('.cart-button-style1, .cart-button-style2, .cart-button-style3, .cart-button-style4, .cart-button-style5 ').hide();

                     var quantityStyle = $('.quantity-data').text().trim().replace(/\s+/g, '').toLowerCase();
                
                    $('.quantity-style1, .quantity-style2, .quantity-style3, .quantity-style4, .quantity-style5, .quantity-style6').hide();
         
                    if (quantityStyle === 'style1') {
                        $('.quantity-style1').show();
                    } else if (quantityStyle === 'style2') {
                        $('.quantity-style2').show();
                    } else if (quantityStyle === 'style3') {
                        $('.quantity-style3').show();
                    } else if (quantityStyle === 'style4') {
                        $('.quantity-style4').show();
                    }else if (quantityStyle === 'style5') {
                        $('.quantity-style5').show();
                    }else if (quantityStyle === 'style6') {
                        $('.quantity-style6').show();
                    }
                    
                }
            }); 

            $('.quantitychange').on('click', function () {
                var val = $(this).find('span[value]').attr('value');
                $('#quantityStyle').val(val).change(); // ✅ this triggers ON CHANGE
            });
            
            $('.selectcolortext').change(function(){
                var color = $(this).val(); 
                $('.eosh_cart-btn').css('color', color);
            });

            $('.selectcolorbutton').change(function(){
                var color = $(this).val(); 
                $('.eosh_cart-btn').css('background', color); 
            });

            $(document).on("click",".icon-button",function() {
                let dataLabel = $(this).attr('value');
                $('.icon-button').removeClass("selectIcon");
                $(this).addClass("selectIcon");
                $('#icon_path').val(dataLabel);
            });

            // change preview button color
            $(document).on('input', '#custom_button_color', function() {
                const newColor = $(this).val();
                $('.button-color').css('background', newColor);
            });

            $(document).on('input', '#custom_text_color', function() {
                const newColor = $(this).val();
                $('.button-color').css('color', newColor);
            });

            $(document).on('input', '#custom_quantity_color', function() {
                const newBgColor = $(this).val();
                console.log(newBgColor);
                $('.counter-box').css('background-color', newBgColor);
            });

            $(document).on('input', '#custom_puls_minus_color', function() {
                let newColor = $(this).val();
                console.log(newColor);
                $('.plus, .minus ,.inc ,.dec').css('color', newColor);    
            });


            $(document).on("change", "#diff_buttonstyle", function () {
                var selectedValue = $("#add_button_style").val();

                if(selectedValue === 'button'){
                    let val = $(this).val(); 

                    $('.cart-btn1, .cart-btn2, .cart-btn3, .cart-btn4,.cart-btn5 ').hide();
                    $('.cart-button-style1, .cart-button-style2, .cart-button-style3, .cart-button-style4, .cart-button-style5 ').hide();
                
                    if(val == "buttonstyle1"){
                        $('.cart-button-style1').show();
                    }
                    else if(val == "buttonstyle2"){
                        $('.cart-button-style2').show();
                    }
                    else if(val == "buttonstyle3"){
                        $('.cart-button-style3').show();
                    }
                    else if(val == "buttonstyle4"){
                        $('.cart-button-style4').show();
                    }else if(val == "buttonstyle5"){
                        $('.cart-button-style5').show();
                    }
                }
            });

            $(document).on("click", ".quantitychange", function () {
                var selectedValue = $("#add_button_style").val();
                let spanValue = $(this).find("span").attr("value");

                if(selectedValue === 'quantityselector'){
                    
                    $('.display-quantitybutton1').hide();
                    $('.display-quantitybutton2').hide();
                    $('.display-quantitybutton3').hide();
                    $('.display-quantitybutton4').hide();
                    $('.display-quantitybutton5').hide();
                    $('.display-quantitybutton6').hide();
                 
                    $('.preview-block').hide();
                 
                    if (spanValue === 'style1') {
                        $('.quantity-style1').show();
                    } else if (spanValue === 'style2') {
                        $('.quantity-style2').show();
                    } else if (spanValue === 'style3') {
                        $('.quantity-style3').show();
                    } else if (spanValue === 'style4') {
                        $('.quantity-style4').show();
                    } else if (spanValue === 'style5') {
                        $('.quantity-style5').show();
                    } else if (spanValue === 'style6') {
                        $('.quantity-style6').show();
                    }
                }
            });
                       
            function successMessage(message) {
                console.log(message)
                $('.sm-content').text(message);
                $('.success-message').removeClass('default-hidden');
                window.setTimeout(function(){
                $(".success-message").addClass("default-hidden");
                },3000);
            }
    
            function windowScroll() {
                window.scroll({
                    top: 0,
                    left: 0,
                    behavior: "smooth",
                });
            }

            $("#featured_collection").select2({
                maximumSelectionLength: 25,
                multiple: true,
                ajax: {
                    url: '/collections/handles',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        var query = {
                            search: params.term,
                            applied_on: 'collection'
                        }
                        return query;
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    }
                },
                placeholder : "Select Items"
            });


                 // if($('select[name="select_button_style"] option:selected').val() == 'rounded'){
            //     $(".button_1").hide();
            //     $(".button_0").show();
            // }
            // else  if($('select[name="select_button_style"] option:selected').val() == 'square'){
            //     $(".button_0").hide();
            //     $(".button_1").show();
            // }


    }); 