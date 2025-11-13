$(document).ready(function () {
    // Contextual Bar
    var cEnableApp = $("[name='enable_app']").prop("checked");
    var cEnquiryEmail = $("[name='enquiry_email']").val();
    var cContactFormLabel = $("[name='contact_form_label']").val();
    var cModalSubmitButtonText = $("[name='modal_submit_button_text']").val();
    var cModalCancelButtonText = $("[name='modal_cancel_button_text']").val();
    var cModalSubmitButtonFontColor = $("[name='modal_submit_button_font_color']").val();
    var cModalSubmitButtonBackgroundColor = $("[name='modal_submit_button_background_color']").val();
    var cSuccessMessage = $("[name='success_message']").val();
    var cErrorMessage = $("[name='error_message']").val();
    var cModalButtonFontColor = $("[name='modal_button_font_color']").val();
    var cModalButtonBackgroundColor = $("[name='modal_button_background_color']").val();
    var cQuotePosition = $("[name='qoute_position']").val();
    var cQuoteFontColor = $("[name='qoute_font_color']").val();
    var cQuoteBgColor = $("[name='qoute_bg_color']").val();
    var cAutoResponse = $("[name='auto_response']").prop("checked");
    var cSenderName = $("[name='sender_name']").val();
    var cSenderEmail = $("[name='sender_email']").val();
    var cSubject = $("[name='subject']").val();
    var cEmailResponse = $("[name='email_response']").val();
    var cProductContainerSelector = $("[name='product_container_selector']").val();
    var cPriceSelector = $("[name='price_selector']").val();
    var cAddToCartSelector = $("[name='add_to_cart_selector']").val();
    var cBuyButtonSelector = $("[name='buy_button_selector']").val();
    var cFeaturedCollections = $("[name*='featured_collections']").val();
    var initialData = {};
    shopifySavebar({}, {}, '#save-config', true, handleDiscard);
    $('#save-config').prop('disabled',true);
    $(".configuration_form").on("input change", handleFieldChange);
    function handleFieldChange(e) {
        shopifySavebar({ laoding: false, disabled: true }, {}, '#save-config', false, handleDiscard);

        initialData = JSON.stringify({
            cEnableApp,
            cEnquiryEmail,
            cContactFormLabel,
            cModalSubmitButtonText,
            cModalCancelButtonText,
            cModalSubmitButtonFontColor,
            cModalSubmitButtonBackgroundColor,
            cSuccessMessage,
            cErrorMessage,
            cModalButtonFontColor,
            cModalButtonBackgroundColor,
            cQuotePosition,
            cQuoteFontColor,
            cQuoteBgColor,
            cAutoResponse,
            cSenderName,
            cSenderEmail,
            cSubject,
            cEmailResponse,
            cProductContainerSelector,
            cPriceSelector,
            cAddToCartSelector,
            cBuyButtonSelector,
            cFeaturedCollections,
        });
        var currentData = getCurrentData();

        if (initialData !== JSON.stringify(currentData)) {
            shopifySavebar({}, {}, '#save-config', false, handleDiscard);
            $('#save-config').prop('disabled',false);
        } else {
            shopifySavebar({laoding: false, disabled: true}, {}, '#save-config', true, handleDiscard);
            $('#save-config').prop('disabled',true);
        }
    }

    function handleDiscard() {
        shopifySavebar({}, {}, '#save-config', true);
        $('#save-config').prop('disabled',true);
        var prevData = JSON.parse(initialData);

        $("[name='enable_app']").prop("checked", prevData.cEnableApp);
        $("[name='enquiry_email']").val(prevData.cEnquiryEmail);
        $("[name='contact_form_label']").val(prevData.cContactFormLabel);
        $("[name='modal_submit_button_text']").val(prevData.cModalSubmitButtonText);
        $("[name='modal_cancel_button_text']").val(prevData.cModalCancelButtonText);
        $("[name='modal_submit_button_font_color']").val(prevData.cModalSubmitButtonFontColor).trigger('change');
        $("[name='modal_submit_button_background_color']").val(prevData.cModalSubmitButtonBackgroundColor).trigger('change');
        $("[name='success_message']").val(prevData.cSuccessMessage);
        $("[name='error_message']").val(prevData.cErrorMessage);
        $("[name='modal_button_font_color']").val(prevData.cModalButtonFontColor).trigger('change');
        $("[name='modal_button_background_color']").val(prevData.cModalButtonBackgroundColor).trigger('change');
        $("[name='qoute_position']").val(prevData.cQuotePosition).trigger('change');
        $("[name='qoute_font_color']").val(prevData.cQuoteFontColor);
        $("[name='qoute_bg_color']").val(prevData.cQuoteBgColor);
        $("[name='auto_response']").prop("checked", prevData.cAutoResponse);
        $("[name='sender_name']").val(prevData.cSenderName);
        $("[name='sender_email']").val(prevData.cSenderEmail);
        $("[name='subject']").val(prevData.cSubject);
        $("[name='email_response']").val(prevData.cEmailResponse);
        $("[name='product_container_selector']").val(prevData.cProductContainerSelector);
        $("[name='price_selector']").val(prevData.cPriceSelector);
        $("[name='add_to_cart_selector']").val(prevData.cAddToCartSelector);
        $("[name='buy_button_selector']").val(prevData.cBuyButtonSelector);
        $("[name*='featured_collections']").val(prevData.cFeaturedCollections).trigger('change');

    }

    function getCurrentData() {
        var enableApp = $("[name='enable_app']").prop("checked");
        var enquiryEmail = $("[name='enquiry_email']").val();
        var contactFormLabel = $("[name='contact_form_label']").val();
        var modalSubmitButtonText = $("[name='modal_submit_button_text']").val();
        var modalCancelButtonText = $("[name='modal_cancel_button_text']").val();
        var modalSubmitButtonFontColor = $("[name='modal_submit_button_font_color']").val();
        var modalSubmitButtonBackgroundColor = $("[name='modal_submit_button_background_color']").val();
        var successMessage = $("[name='success_message']").val();
        var errorMessage = $("[name='error_message']").val();
        var modalButtonFontColor = $("[name='modal_button_font_color']").val();
        var modalButtonBackgroundColor = $("[name='modal_button_background_color']").val();
        var quotePosition = $("[name='qoute_position']").val();
        var quoteFontColor = $("[name='qoute_font_color']").val();
        var quoteBgColor = $("[name='qoute_bg_color']").val();
        var autoResponse = $("[name='auto_response']").prop("checked");
        var senderName = $("[name='sender_name']").val();
        var senderEmail = $("[name='sender_email']").val();
        var subject = $("[name='subject']").val();
        var emailResponse = $("[name='email_response']").val();
        var productContainerSelector = $("[name='product_container_selector']").val();
        var priceSelector = $("[name='price_selector']").val();
        var addToCartSelector = $("[name='add_to_cart_selector']").val();
        var buyButtonSelector = $("[name='buy_button_selector']").val();
        var featuredCollections = $("[name*='featured_collections']").val();
        return {
            cEnableApp: enableApp,
            cEnquiryEmail: enquiryEmail,
            cContactFormLabel: contactFormLabel,
            cModalSubmitButtonText: modalSubmitButtonText,
            cModalCancelButtonText: modalCancelButtonText,
            cModalSubmitButtonFontColor: modalSubmitButtonFontColor,
            cModalSubmitButtonBackgroundColor: modalSubmitButtonBackgroundColor,
            cSuccessMessage: successMessage,
            cErrorMessage: errorMessage,
            cModalButtonFontColor: modalButtonFontColor,
            cModalButtonBackgroundColor: modalButtonBackgroundColor,
            cQuotePosition: quotePosition,
            cQuoteFontColor: quoteFontColor,
            cQuoteBgColor: quoteBgColor,
            cAutoResponse: autoResponse,
            cSenderName: senderName,
            cSenderEmail: senderEmail,
            cSubject: subject,
            cEmailResponse: emailResponse,
            cProductContainerSelector: productContainerSelector,
            cPriceSelector: priceSelector,
            cAddToCartSelector: addToCartSelector,
            cBuyButtonSelector: buyButtonSelector,
            cFeaturedCollections: featuredCollections
        };
    }


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    /*
   * Get Theme Info & Add or Remove Script Tag in Background
   */
    const configurationSection = document.getElementById('configuration');
    if (configurationSection) {
        setTimeout(function () {
            $.ajax({
                url: '/themeInfo-scriptTag-link-unlink',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    if (data.themeName) {
                        console.log(data.themeName);
                        const selectElement = document.querySelector('.theme-name');
                        const newOption = document.createElement('option');
                        newOption.value = data.themeName;
                        newOption.text = `${data.themeName} (Live)`;
                        newOption.selected = true;
                        selectElement.innerHTML = '';
                        selectElement.appendChild(newOption);
                    }
                },
                error: function (error) {
                    console.error('Error ThemeInfo:', error);
                }
            });
        }, 50);
    }

    /*
     * Add/Update Configuration
     */
    $(document).on('click', '.save-config', function(e) {
        e.preventDefault();
        loadingOn();
        shopifySavebar({disabled:true, loading:true}, {disabled:true, loading:false}, '#save-config', false, handleDiscard);
        var action = 'configuration/store';
        var formSelector='configuration_form';

        $.ajax({
            url: action,
            method:'post',
            data: $('.'+formSelector).serialize(),
            success: function(data){
                if(data['message']=='success'){
                    $('#app_configuration').find('.badge_icon').addClass('active');
                    setTimeout(function() {
                        loadingOff();
                        windowScroll();
                        // successMessage(data['response']);
                        shopifyToast(data['response']);
                    }, 1200);

                    let currentData = getCurrentData();
                    cEnableApp = currentData.cEnableApp;
                    cEnquiryEmail = currentData.cEnquiryEmail;
                    cContactFormLabel = currentData.cContactFormLabel;
                    cModalSubmitButtonText = currentData.cModalSubmitButtonText;
                    cModalCancelButtonText = currentData.cModalCancelButtonText;
                    cModalSubmitButtonFontColor = currentData.cModalSubmitButtonFontColor;
                    cModalSubmitButtonBackgroundColor = currentData.cModalSubmitButtonBackgroundColor;
                    cSuccessMessage = currentData.cSuccessMessage;
                    cErrorMessage = currentData.cErrorMessage;
                    cModalButtonFontColor = currentData.cModalButtonFontColor;
                    cModalButtonBackgroundColor = currentData.cModalButtonBackgroundColor;
                    cQuotePosition = currentData.cQuotePosition;
                    cQuoteFontColor = currentData.cQuoteFontColor;
                    cQuoteBgColor = currentData.cQuoteBgColor;
                    cAutoResponse = currentData.cAutoResponse;
                    cSenderName = currentData.cSenderName;
                    cSenderEmail = currentData.cSenderEmail;
                    cSubject = currentData.cSubject;
                    cEmailResponse = currentData.cEmailResponse;
                    cProductContainerSelector = currentData.cProductContainerSelector;
                    cPriceSelector = currentData.cPriceSelector;
                    cAddToCartSelector = currentData.cAddToCartSelector;
                    cBuyButtonSelector = currentData.cBuyButtonSelector;
                    cFeaturedCollections = currentData.cFeaturedCollections;
                    $('#save-config').prop('disabled',true);
                    shopifySavebar({}, {}, '#save-config', true, handleDiscard);

                }else{
                    setTimeout(function() {
                        shopifySavebar({}, {}, '#save-config', false, handleDiscard);
                        loadingOff();
                        windowScroll();
                        errorMessage(data['response']);
                    }, 1200);
                }
                return false;
            }, error :function( reject ) {
                loadingOff();
                windowScroll();
                validationError(reject);
                shopifySavebar({}, {}, '#save-config', false, handleDiscard);
                return false;
            }
        });
        return false;
    });

    /*
     * Render modal
     */
    $(document).on('click', '.contact-modal', function(e) {
        $('#create-form-field').modal('show');
        $('#create-form-field').find('form').trigger('reset');
    });
    /*
     * modal field
     */
    $(document).on('change', '.field_type', function(e) {
        var fieldType=$(this).val();
        if(fieldType == 'textarea'){
            $('.input-type-field').hide();
        }else {
            $('.input-type-field').show();
        }
    });

    /*
     * Add form field
     */
    $(document).on('click', '.add-form-field', function(e) {
        e.preventDefault();
        var formSelector='contact_form';
        var action= $('.'+formSelector).attr('action'),
            method = $('.'+formSelector).attr('method');
        var data= $('.'+formSelector).serialize();

        $.ajax({
            url: action,
            method:method,
            data: data,
            success: function(response){
                if(response['message']=='success') {
                    var recordId = response.data["id"];
                    var fieldLabel = response.data["field_label"];
                    var fieldType = response.data["field_type"];
                    var inputType = response.data["input_type"];
                    var order = response.data["order"];
                    var status = response.data["status"];
                    var statusColor='';
                    if(status == "enabled" ){
                        statusColor="tag green";
                    }else{
                        statusColor="tag yellow";
                    }
                    var item = $('.form-table tbody').first("tr").text();
                    if($.trim(item) == 'No record found!'){
                        var parent= '.form-table tbody tr';
                        $(parent).remove();
                    }

                    $('.form-table').prepend(
                        "<tr id=formrow-"+recordId+">" +
                        "<td>"+fieldLabel +"</td>" +
                        "<td>"+fieldType +"</td>" +
                        "<td>"+inputType+"</td>"+
                        "<td>"+order+"</td>"+
                        "<td><span class='"+statusColor+"'>"+capitalizeFirstLetter(status)+"</span></td>"+
                        "<td><button type='button' class='secondary icon-edit edit-row' data-row-id="+recordId+"></button> " +
                        "<button type='button' class='secondary icon-trash row-id delete-row' data-row-id="+recordId+"></button></td>" +
                        "</tr>");
                    var message='Contact form added successfully!';
                    // successMessage(message);
                    shopifyToast(message);
                    $('#app_contact_form').find('.badge_icon').addClass('active');
                }
                // Hide modal
                $('#create-form-field').modal('hide');
                return false;
            }, error :function( reject ) {
                validationError(reject,formSelector);
                return false;
            }
        });
        return false;
    });

    /*
     * Edit field modal
     */
    $(document).on('click', '.edit-row',function (e) {
        e.preventDefault;
        var rowId=$(this).data('row-id');
        editRecord(rowId);
        return false;
    });

    /*
     *Show data to modal
     */
    function editRecord(id){
        var fieldId= id;
        var formSelector='edit_field_form';
        $.ajax({
            url: 'contact-form/edit',
            method: 'post',
            data: {
                id:fieldId
            },
            success: function(response){
                if(response['message']=='success'){

                    $('.'.formSelector).find('form').trigger('reset');
                    var recordId = response.data["id"];
                    var fieldLabel = response.data["field_label"];
                    var fieldType = response.data["field_type"];
                    var inputType = response.data["input_type"];
                    var order = response.data["order"];
                    var status = response.data["status"].toLowerCase();

                    if(fieldType =='input'){
                        $('.input_type').show();
                    }else{
                        $('.input_type').hide();
                    }

                    $('.field_id').val(recordId);
                    $('.field_label').val(fieldLabel);
                    $('.field_type').val(fieldType);
                    $('.input_type').val(inputType);
                    $('.order').val(order);
                    $('#status option')
                        .removeAttr('selected')
                        .filter('[value="'+status+'"]')
                        .attr('selected', true);
                    // show modal
                    $('#edit-field-form').modal('show');
                }
            },error :function( reject ) {
                var message='Record not existed';
                errorMessage(message);
                return false;
            }
        });
    }
    /*
     * Update price
     */
    $(document).on('click', '.update-form-field',function (e) {
        e.preventDefault;
        var formSelector='edit_contact_form';
        var data= $('.'+formSelector).serialize();
        $.ajax({
            url: 'contact-form/update',
            method: 'put',
            data:data,
            success: function(response){
                if(response['message']=='success'){
                    var statusColor='';
                    if(response.data["status"] == "enabled" ){
                        statusColor="tag green";
                    }else{
                        statusColor="tag yellow";
                    }
                    var parent= '.form-table tbody tr#formrow-'+response.data['id'];
                    $(parent+' td:nth-child(1)').html(response.data["field_label"]);
                    $(parent+' td:nth-child(2)').html( response.data["field_type"]);
                    $(parent+' td:nth-child(3)').html(response.data["input_type"]);
                    $(parent+' td:nth-child(4)').html(response.data["order"]);
                    $(parent+' td:nth-child(5)').html("<span class='"+statusColor+"'>"+capitalizeFirstLetter(response.data["status"])+"</span>");
                }
                // hide edit modal
                $("#edit-field-form").modal("hide");
                var message = 'Record updated Successfully!';
                // successMessage(message);
                shopifyToast(message);
                return false;
            }, error :function( reject ) {
                validationError(reject, formSelector);
                return false;
            }
        });
    });
    /*
     * Delete price
     */
    $(document).on('click', '.delete-row', function(e) {
        e.preventDefault();
        var rowId=$(this).data('row-id');
        $('#confirmation').modal('show');
        $('button.confirm').attr('data-row-id', rowId);
    });

    $(document).on('click', '.confirm', function(e) {
        $('#confirmation').modal('hide');
        var rowId=$(this).data('row-id');
        var parent='';
        $.ajax({
            url: 'contact-form/'+rowId,
            method: 'delete',
            success: function(response){
                if(response['message']=='success') {
                    parent = '.form-table tbody tr#formrow-'+rowId;
                    $(parent).remove();
                }
                return false;
            }, error :function( reject ) {
                validationError(reject);
                return false;
            }
        });
    });

    /*
    * pagination & search
    */
    $(document).on('keyup', '#search-field', function(e) {
        var query = $(this).val();
        $.ajax({
            url: 'contact-form/search',
            type: 'GET',
            data: {
                query:query
            },
            success: function (response) {
                if (response['message'] == 'success') {
                    var parent = '.form-table tbody tr';
                    var formFields = response['data'].data;
                    $(parent).remove();
                    $("div .app-pagination").remove();
                    $(response['pagination']).insertAfter($(".form-table"));
                    $.each(formFields, function (key, formField) {
                        var fieldLabel = formField.field_label;
                        var fieldType = formField.field_type;
                        var inputType = formField.input_type;
                        var order = formField.order;
                        var status = formField.status;
                        var recordId = formField.id;
                        var statusColor = '';
                        if (status == "Enabled") {
                            statusColor = "tag green";
                        } else {
                            statusColor = "tag yellow";
                        }
                        var item = $('.form-table tbody').first("tr").text();
                        if ($.trim(item) == 'No record found!') {
                            var parent = '.form-table tbody tr';
                            $(parent).remove();
                        }

                        var newRowContent = "<tr id=formrow-" + recordId + ">" +
                            "<td>" + fieldLabel + "</td>" +
                            "<td>" + fieldType + "</td>" +
                            "<td>" + inputType + "</td>" +
                            "<td>" + order + "</td>" +
                            "<td><span class='" + statusColor + "'>" + capitalizeFirstLetter(status) + "</span></td>" +
                            "<td><button type='button' class='secondary icon-edit edit-row' data-row-id=" + recordId + "></button> " +
                            "<button type='button' class='secondary icon-trash row-id delete-row' data-row-id=" + recordId + "></button></td>" +
                            "</tr>";
                        $(".form-table tbody").append(newRowContent);
                    });
                }
            }, error: function (reject) {
                return false;
            }
        });
    });

    $(document).on('click', '.pagelink', function (e) {
        e.preventDefault();
        var link = $(this).parent().attr("href");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: link,
            type: 'GET',
            success: function (response) {
                if (response['message'] == 'success') {
                    var parent = '.form-table tbody tr';
                    var formFields = response['data'].data;
                    $(parent).remove();
                    $("div .app-pagination").remove();
                    $(response['pagination']).insertAfter($(".form-table"));
                    $.each(formFields, function (key, formField) {
                        var fieldLabel = formField.field_label;
                        var fieldType = formField.field_type;
                        var inputType = formField.input_type;
                        var order = formField.order;
                        var status = formField.status;
                        var recordId = formField.id;
                        var statusColor = '';
                        if (status == "Enabled") {
                            statusColor = "tag green";
                        } else {
                            statusColor = "tag yellow";
                        }
                        var item = $('.form-table tbody').first("tr").text();
                        if ($.trim(item) == 'No record found!') {
                            var parent = '.form-table tbody tr';
                            $(parent).remove();
                        }

                        var newRowContent = "<tr id=formrow-" + recordId + ">" +
                            "<td>" + fieldLabel + "</td>" +
                            "<td>" + fieldType + "</td>" +
                            "<td>" + inputType + "</td>" +
                            "<td>" + order + "</td>" +
                            "<td><span class='" + statusColor + "'>" + capitalizeFirstLetter(status) + "</span></td>" +
                            "<td><button type='button' class='secondary icon-edit edit-row' data-row-id=" + recordId + "></button> " +
                            "<button type='button' class='secondary icon-trash row-id delete-row' data-row-id=" + recordId + "></button></td>" +
                            "</tr>";
                        $(".form-table tbody").append(newRowContent);
                    });
                }
            }, error: function (reject) {
                return false;
            }
        });
    });

    /*
     * Update App Files
     */
    $(document).on('click', '.update-app', function(e) {
        e.preventDefault();
        $('.modal-body p').text('Do you want to update the app?');
        $('button.confirm').attr('name','update-app')
        $('#confirmation').modal('show');
    });

    $(document).on('click', 'button[name=update-app]', function(e) {
        $('#confirmation').modal('hide');
        loadingOn();
        $.ajax({
            url: 'update/resource',
            method: 'GET',
            success: function(response){
                if(response['message']=='success') {
                    var message='App updated successfully!';
                    // successMessage(message);
                    shopifyToast(message);
                }
                $('.update-app').attr('disabled', 'disabled');
                return false;
            }, error :function( reject ) {
                return false;
            }
        });
        loadingOff();
        $('button.confirm').removeAttr('name');
    });


    /*
     * Add asset file
     */
    $(document).on('click', '.add-asset', function(e) {
        e.preventDefault();
        $('.modal-body p').text('Do you want to add assets file?');
        $('button.confirm').attr('name','add-asset');
        $('#confirmation').modal('show');

    });

    $(document).on('click', 'button[name=add-asset]', function(e) {
        $('#confirmation').modal('hide');
        loadingOn();
        $.ajax({
            url: 'add/resource',
            method: 'GET',
            success: function(response){
                if(response['message']=='success') {
                    var message='Asset file added successfully!';
                    // successMessage(message);
                    shopifyToast(message);
                }
                loadingOff();
                return false;
            }, error :function( reject ) {
                validationError(reject);
                loadingOff();
                return false;
            }
        });
        $('button.confirm').removeAttr('name');
    });


    /*
     * delete asset file
     */
    $(document).on('click', '.remove-asset', function(e) {
        e.preventDefault();
        $('.modal-body p').text('Do you want to remove assets file?');
        $('button.confirm').attr('name','remove-asset');
        $('#confirmation').modal('show');
    });

    $(document).on('click', 'button[name=remove-asset]', function(e) {
        $('#confirmation').modal('hide');
        loadingOn();
        $.ajax({
            url: 'remove/resource',
            method: 'GET',
            success: function(response){
                if(response['message']=='success') {
                    var message='Asset file remove successfully!';
                    // successMessage(message);
                    shopifyToast(message);
                }
                loadingOff();
                return false;
            }, error :function( reject ) {
                validationError(reject);
                loadingOff();
                return false;
            }
        });
        $('button.confirm').removeAttr('name');
    });


    /*
     * delete asset file
     */
    $(document).on('click', '.remove-script', function(e) {
        e.preventDefault();
        $('.modal-body p').text('Do you want to remove script tag?');
        $('button.confirm').attr('name','remove-script');
        $('#confirmation').modal('show');
    });

    $(document).on('click', 'button[name=remove-script]', function(e) {
        $('#confirmation').modal('hide');
        loadingOn();
        $.ajax({
            url: 'remove/script',
            method: 'GET',
            success: function(response){
                if(response['message']=='success') {
                    var message='Script Tag remove successfully!';
                    // successMessage(message);
                    shopifyToast(message);
                }
                loadingOff();
                return false;
            }, error :function( reject ) {
                validationError(reject);
                loadingOff();
                return false;
            }
        });
        $('button.confirm').removeAttr('name');
    });
});
