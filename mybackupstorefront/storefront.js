
$(document).ready(function() {
    
    var APP_BASE_URL = 'https://addtocartanywhere.test';
    var domain = Shopify.shop;
    var themeStore = Shopify.theme.theme_store_id;
    var settingdata ='';
    var productOption=''; 

    var loadScript = function(url, callback){
        var script = document.createElement("script");
        script.type = "text/javascript";
        if (script.readyState){ 
                script.onreadystatechange = function(){
                if (script.readyState == "loaded" || script.readyState == "complete"){
                    script.onreadystatechange = null;
                    callback();
                }};
        }else {
                script.onload = function(){
                callback();
                };
        }
        script.src = url;
        document.getElementsByTagName("head")[0].appendChild(script);
    };
    
    var myAppJavaScript = function($){

        // parent sector
        if(domain === 'faacad-2.myshopify.com'){
            var eoProductSelector = '.pr_grid_item';
        }else if(domain === '21cc49-ae.myshopify.com'){
            var eoProductSelector = '.product';
        }else if(domain === '543544-47.myshopify.com'){
            var eoProductSelector = '.card';
        }else if(domain === 'noovesnails.myshopify.com'){
             var eoProductSelector = '.ProductItem';
        }else if(themeStore === 2847){
            var eoProductSelector = document.querySelectorAll('.product-card-item');
        }else if(domain === '3f1992-3a.myshopify.com'){
            var eoProductSelector = '.container--large';
        }else{
             var eoProductContainer = [".Grid__Item",".product-block__inner .image-inner","li.grid__item",".collection__main",".price-list","a product-card-link",
             ".product-card",".grid-item__content",".product-item__inner",".grid-product__content"];

            // var eoProductContainer = [ ".product-block",".product-card",".product-card-item",".product--card-detail",".product-tile",".yv-product-information",".product-grid-item__title",".product-vendor",".main-collection--root",".product-card--root",".product-card__info",".product-grid-item",".product-grid",".product-media",".product-thumbnail__header",".grid__item",".product-thumbnail",".product-card-gallery__title-placeholder",".product__grid__info", ".product-grid-item__container",".product-block",".collectionList__item",".product-index",".Grid__Item",".product-block__inner .image-inner","li.grid__item",".collection__main",".price-list","a product-card-link",
            //     ".product-card",".grid-item__content",".product-item__inner",".grid-product__content",".product-item",".prod-th",".thumbnail",".card-information" ];

            var eoProductSelector = eoProductContainer.toString();
        }

              // for child
        if(domain === '21cc49-ae.myshopify.com'){
            var eoCart = '.ProductItem__PriceList .ProductItem__Price:last-child';
        }
        else if(domain === '543544-47.myshopify.com'){
            var eoCart = '.price__regular';
        }
        else if(domain === 'noovesnails.myshopify.com'){
            var sheet = document.createElement('style');
            sheet.innerHTML = `.eosh_third .eosh_cart-btn{font-weight: 900;font-size: 1rem; padding: 0px;}`;
            document.body.appendChild(sheet);
            
            var eoCart = '.ProductItem__Info';

            // var eoCart = '.ProductItem__Price';
        }
        else if(themeStore === 1621){
            var eoCart = '.product-item__price:eq(1)';
        }
        else if(domain === '3f1992-3a.myshopify.com'){
            var eoCart = '.product-price--original';
        }
        else{
            // var eoProductCartContainer = [ ".Price",".price .theme-money",".price__container",".price-list",".money",".grid-product__price--current",
            // ".product-item__price:last",".grid-product__price"];
            
            var eoProductCartContainer = [".product-price__reduced",".product--actual-price",".product-list",".quickBuyPrice",".yv-product-price",".product-item__price",".product-grid-item__price",".product--price",".f-price-item--regular",".price__container .price__sale",".price__container .price__regular",".grid-product__price" ,".product__grid__price" ,".mb__5",".Price",".price__regular",".price .theme-money",".price__sale",".price-list",".money",".grid-product__price--current",
                ".product-item__price:last",".grid-product__price" ,".product-card-info .price" ,".product-price .price", ".was_price .money"];
            var eoCart = eoProductCartContainer.toString();
        }
        
        function getSetting(){
            // cssFileForTemplate(APP_BASE_URL + '/css/custom.css');
            // cssFileForTemplate(APP_BASE_URL + '/css/buttondropdown.css');
            // jsFileForTemplate(APP_BASE_URL + '/js/button.js');
            var setting = '';
            $.ajax({
                    url: APP_BASE_URL + '/api/setting',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        'domain' : domain
                    },
                    async: false,
                    crossDomain: true,
                    contentType: "json",
                    success: function (response) {
                        setting = response.setting;
                    }
            });
            return setting;
        }
        settingdata  =  getSetting(); 
        console.log('settingdata',settingdata);
                //previous page 

        if(settingdata.enable_app == 1) {  
            console.log('App is enabled');     
            
            if((window.location.pathname.indexOf("collections/") > -1)){
                if(settingdata.show_widget_collection == 1){ 
                        var handle='';
                        var allvariants='';
                        var headoption ='';
                        var productdata = JSON.parse(productsData);

                        // console.log(productdata);

                        // Loop through the array and print each item
                        for (var i = 0; i < productdata.length; i++) {

                                //console.log(productdata[i]);
                                handle = productdata[i].handle;
                                // handle = productdata[i].handle;
                                allvariants = productdata[i].variants;
                                headoption = productdata[i].options;

                                var hiddehtml = ``;
                                var hidden=``;
                                $.each(allvariants, function (key, value) { 
                                    // console.log(value.featured_image.src)
                                       if (value.featured_image && value.featured_image.src) {
                                           var featuredImage =value.featured_image.src;
                                        //    console.log(featuredImage);
                                        }
                        
                                        var title=value.title;
                                        if (title=='Default Title' && domain !== 'mfr21f-0d.myshopify.com'){
                                        return false;
                                        }
                                        // var title=value.title.replace(/\s/g, '')
                                        hiddehtml += `<option  product-price=${value.price}  value=${value.id}  data-image="${featuredImage}" >${title}</option>`; 
                                        hidden =`<select style="display:block;" id="eosh-hiddenDropDown" class="" style="position: relative;z-index: 1; overflow-wrap: break-word; white-space: normal; text-decoration: none; line-height: 1.2; letter-spacing: 0px; width: 100%; height: 40px; font-weight: normal; font-style: normal; font-family: Lato, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(51, 51, 51); background-color: transparent; border-width: 1px; border-color: rgb(51, 51, 51); border-radius: 0px; border-style: solid; margin: 5px 0px 0px; padding: 0px 10px; cursor: pointer; background-image: linear-gradient(45deg, transparent 50%, rgb(51, 51, 51) 50%), linear-gradient(135deg, rgb(51, 51, 51) 50%, transparent 50%); background-position: calc(100% - 14px) calc(1em + 2px), calc(100% - 10px) calc(1em + 2px); background-size: 4px 4px; background-repeat: no-repeat; appearance: none; text-indent: 1px;">
                                        ${hiddehtml}
                                        </select>`; 
                                });

                                if($('a[href*="'+handle+'"]').parents(eoProductSelector).find('.eosh_prod-card').length == 0){ 
                                    $('a[href*="'+handle+'"]').parents(eoProductSelector).find(eoCart).append(hidden);
                                } 

                                var labelDropDown1 = null;
                                var dropDown1 = [];
                                var labelDropDown2 = null;
                                var dropDown2 = [];
                                var labelDropDown3 = null;
                                var dropDown3 = [];
                                let isAvailable = false;

                              
                                $.each(headoption, function(key, variantName) {
                                    if (key == 0) {
                                        labelDropDown1 = variantName.name;
                                        $.each(variantName.values, function(id,variantValue){
                                            dropDown1.push(variantValue);
                                        });
                                        let html = ``;
                                        for (var x of dropDown1) {
                                            var y = x;
                                            if (y == 'Default Title') {
                                                return false;
                                        }
                                        x = x.replace(/\s/g, '');

                                           // Check variant availability based on option1
                                            var matchedVariant = allvariants.find(v => v.option1 === y);

                                            if (matchedVariant && matchedVariant.available === false) {
                                                html += `<option value="${x}" disabled>${y} (Sold Out)</option>`;
                                            } else {
                                                html += `<option value="${x}">${y}</option>`;
                                            }

                                    
                                        }
                                        var dataselect = `<div id="labelDropDown1" style="margin: 5px 0px 0px; font-size: 20px; color: rgb(160, 116, 116); font-weight: normal; font-style: italic; font-family: Lato, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif;">${labelDropDown1}</div>
                                        <select id="eosh-dropdown1" class="eosh-dropdown1 eosh-price" data-product-id="${handle}" style="position: relative;z-index: 1; overflow-wrap: break-word; white-space: normal; text-decoration: none; line-height: 1.2; letter-spacing: 0px; width: 100%; height: 40px; font-weight:${settingdata.variantSelectorFontSize};font-style:${settingdata.variantSelectorFontStyle}; font-family:${settingdata.variantSelectorFontFamily}; font-size: ${settingdata.variantSelectorFontSize}; color:${settingdata.variantSelectorFontColor}; background-color:${settingdata.variantSelectorBackgroundColor}; border-width: 2px; border-color:${settingdata.variantSelectorBorderColor}; border-radius:${settingdata.variantSelectorBorderRadius}px; border-style: solid; margin: 5px 0px 0px; padding: 0px 10px; cursor: pointer; background-image: linear-gradient(45deg, transparent 50%, rgb(51, 51, 51) 50%), linear-gradient(135deg, rgb(51, 51, 51) 50%, transparent 50%); background-position: calc(100% - 14px) calc(1em + 2px), calc(100% - 10px) calc(1em + 2px); background-size: 4px 4px; background-repeat: no-repeat; appearance: none; text-indent: 1px;">
                                            ${html}
                                        </select>`;
                                    } else if (key == 1) {
                                        labelDropDown2 = variantName.name;
                                        $.each(variantName.values,function (id, variantValue) {
                                            dropDown2.push(variantValue);
                                        });
                                        let html1 = ``;

                                        for (var x of dropDown2) {
                                            var y = x;
                                            x = x.replace(/\s/g, '');
                                            var matchedVariant = allvariants.find(v => v.option2 === y);
                                            if (matchedVariant && matchedVariant.available === false) {
                                                html1 += `<option value="${x}" disabled>${y} (Sold Out)</option>`;
                                            } else {
                                                html1 += `<option value="${x}">${y}</option>`;
                                            }
                                            // html1 += `<option value="${x}">${y}</option>`;
                                        }

                                        var dataselect = `
                                        <div style="margin: 5px 0px 0px; font-size: 20px; color: rgb(160, 116, 116); font-weight: normal; font-style: italic; font-family: Lato, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif;">${labelDropDown2}</div>
                                        <select id="eosh-dropdown2" class="eosh-dropdown2" style="position: relative;z-index: 1; overflow-wrap: break-word; white-space: normal; text-decoration: none; line-height: 1.2; letter-spacing: 0px; width: 100%; height: 40px; font-weight: ${settingdata.variantSelectorFontSize}; font-style: ${settingdata.variantSelectorFontStyle}; font-family:${settingdata.variantSelectorFontFamily}; font-size:${settingdata.variantSelectorFontSize}; color: ${settingdata.variantSelectorFontColor}; background-color: ${settingdata.variantSelectorBackgroundColor}; border-width: ${settingdata.variantSelectorBorderSize}; border-color:${settingdata.variantSelectorBorderColor}; border-radius:${settingdata.variantSelectorBorderRadius}; border-style: solid; margin: 5px 0px 0px; padding: 0px 10px; cursor: pointer; background-image: linear-gradient(45deg, transparent 50%, rgb(51, 51, 51) 50%), linear-gradient(135deg, rgb(51, 51, 51) 50%, transparent 50%); background-position: calc(100% - 14px) calc(1em + 2px), calc(100% - 10px) calc(1em + 2px); background-size: 4px 4px; background-repeat: no-repeat; appearance: none; text-indent: 1px;">
                                            ${html1}
                                        </select>`;
                                    } else {
                                        labelDropDown3 = variantName.name;
                                        $.each(variantName.values,function (id, variantValue) {
                                        dropDown3.push(variantValue);
                                        });
                                        let html2 = ``;
                                        for (var x of dropDown3) {
                                        var y = x;
                                        x = x.replace(/\s/g, '');
                                        html2 += `<option value="${x}">${y}</option>`;
                                        }
                                        var dataselect = `
                                        <div style="margin: 5px 0px 0px; font-size: 20px; color: rgb(160, 116, 116); font-weight: normal; font-style: italic; font-family: Lato, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif;">${labelDropDown3}</div>
                                        <select id="eosh-dropdown3" style="position: relative;z-index: 1; overflow-wrap: break-word; white-space: normal; text-decoration: none; line-height: 1.2; letter-spacing: 0px; width: 100%; height: 40px; font-weight: ${settingdata.variantSelectorFontSize}; font-style:${settingdata.variantSelectorFontStyle}; font-family: ${settingdata.variantSelectorFontFamily}; font-size: ${settingdata.variantSelectorFontSize}; color: ${settingdata.variantSelectorFontColor}; background-color:${settingdata.variantSelectorBackgroundColor}; border-width: ${settingdata.variantSelectorBorderSize}; border-color:${settingdata.variantSelectorBorderColor}; border-radius:${settingdata.variantSelectorBorderRadius} ; border-style: solid; margin: 5px 0px 0px; padding: 0px 10px; cursor: pointer; background-image: linear-gradient(45deg, transparent 50%, rgb(51, 51, 51) 50%), linear-gradient(135deg, rgb(51, 51, 51) 50%, transparent 50%); background-position: calc(100% - 14px) calc(1em + 2px), calc(100% - 10px) calc(1em + 2px); background-size: 4px 4px; background-repeat: no-repeat; appearance: none; text-indent: 1px;">
                                        ${html2}
                                        </select>`;
                                    }
                                    if (settingdata.show_hide_varsize_color == 1) {
                                        if ($('a[href*="' + handle + '"]').parents(eoProductSelector).find('.eosh_prod-card').length == 0) {
                                            $('a[href*="' + handle + '"]').parents(eoProductSelector).find(eoCart).append(dataselect);
                                        }
                                    }
                                });

                                selectedtitle=[];
                                var optionvalue=[];

                                $.each(allvariants, function(key,currentVariant){
                
                                    if(settingdata.append_to_button_style == 'icon' && settingdata.select_icon_postion == 'greenicon'){ 
                                        var icon = `
                                            <div class="eosh_prod-card eosh_tenth">
                                            <div class="eosh_cart-quantity">
                                            ${settingdata.show_hide_button == 1 ? 
                                            `<div class="eosh_quantity pointer">
                                            <span class="eosh_down minus">
                                            <svg width="5" height="3" viewBox="0 0 5 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path class="pluseminus" d="M0.0980001 0.844H4.598V2.338H0.0980001V0.844Z" fill="#2C2C2C"/>
                                            </svg> 
                                            </span>
                                            <span style="width:50px;border:none; text-align: center;" class="num" min="1" name="quantity" value="1">1</span>
                                            <span class="eosh_up plus">
                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path class="pluseminus" d="M9.558 5.627H5.931V9.452H4.5V5.627H0.891V4.295H4.5V0.487999H5.931V4.295H9.558V5.627Z" fill="#2C2C2C"/>
                                            </svg> 
                                            </span>
                                            </div>` 
                                            : ``}
                                            <button class="crtbtn eosh_cart-btn pointer button-data" id="${currentVariant.id}">
                                            <svg width="40" height="40" viewBox="0 0 40 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path class="button-icon" d="M32.4398 15.6074C36.5391 15.6074 40 12.1911 40 8.06186C40 3.93264 36.5839 0.516357 32.4398 0.516357C28.3106 0.516357 24.8942 3.93264 24.8942 8.06186C24.8942 12.2208 28.3106 15.6074 32.4398 15.6074ZM12.0758 24.8759H29.4097C29.9889 24.8759 30.4939 24.4006 30.4939 23.7619C30.4939 23.1232 29.9889 22.6479 29.4097 22.6479H12.3283C11.4816 22.6479 10.9618 22.0537 10.8281 21.1477L10.6053 19.5881H29.4395C30.9842 19.5881 31.9792 18.9345 32.5439 17.6571C31.2662 17.6571 30.0631 17.4046 28.9491 16.9145C28.7265 17.2116 28.4441 17.3452 28.0284 17.3452L10.2636 17.3601L9.00114 8.74514H22.9039C22.8296 8.06186 22.8741 7.17064 22.9781 6.50229H8.67436L8.407 4.61593C8.24364 3.47214 7.84257 2.89293 6.32757 2.89293H1.09914C0.505 2.89293 0 3.41279 0 4.00693C0 4.61593 0.505 5.13579 1.09914 5.13579H6.11957L8.49614 21.4448C8.808 23.5539 9.92207 24.8759 12.0758 24.8759ZM32.4547 12.9635C31.9349 12.9635 31.4743 12.607 31.4743 12.0574V8.96793H28.6374C28.1324 8.96793 27.7311 8.55207 27.7311 8.06186C27.7311 7.57171 28.1324 7.15579 28.6374 7.15579H31.4743V4.08121C31.4743 3.51671 31.9349 3.16029 32.4547 3.16029C32.9746 3.16029 33.4199 3.51671 33.4199 4.08121V7.15579H36.2571C36.7621 7.15579 37.178 7.57171 37.178 8.06186C37.178 8.55207 36.7621 8.96793 36.2571 8.96793H33.4199V12.0574C33.4199 12.607 32.9746 12.9635 32.4547 12.9635ZM13.2492 32.0946C14.586 32.0946 15.6554 31.04 15.6554 29.6884C15.6554 28.3516 14.586 27.2821 13.2492 27.2821C11.8975 27.2821 10.8429 28.3516 10.8429 29.6884C10.8429 31.04 11.8975 32.0946 13.2492 32.0946ZM27.1519 32.0946C28.4889 32.0946 29.5581 31.04 29.5581 29.6884C29.5581 28.3516 28.4889 27.2821 27.1519 27.2821C25.8003 27.2821 24.716 28.3516 24.716 29.6884C24.716 31.04 25.8003 32.0946 27.1519 32.0946Z" fill="#00B35D"/>
                                            </svg> 
                                            </button>
                                            </div>
                                            </div`; 
                                    }
                                    else if(settingdata.append_to_button_style == 'icon' && settingdata.select_icon_postion == 'squarepluseicon'){
                                        var icon = `
                                        <div class="eosh_prod-card eosh_fifth">
                                        <div class="eosh_cart-quantity">
                                        ${settingdata.show_hide_button == 1 ? 
                                        `<div class="eosh_quantity">
                                        <span class="eosh_down minus">
                                        <svg width="5" height="3" viewBox="0 0 5 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="pluseminus" d="M0.0980001 0.844H4.598V2.338H0.0980001V0.844Z" fill="#2C2C2C"/>
                                        </svg> 
                                        </span>
                                        <span style="width:50px;border:none; text-align: center;" class="num" min="1" name="quantity" value="1">1</span>
                                        <span class="eosh_up plus">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="pluseminus" d="M9.558 5.627H5.931V9.452H4.5V5.627H0.891V4.295H4.5V0.487999H5.931V4.295H9.558V5.627Z" fill="#2C2C2C"/>
                                        </svg> 
                                        </span>
                                        </div>
                                        ` : `<h1>Hello</h1>`}
                                        <button class="crtbtn eosh_cart-btn" id="${currentVariant.id}">
                                        <svg width="24" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="button-icon" d="M12.808 0.207936V11.0319H23.152V12.7839H12.808V23.6559H10.936V12.7839H0.616V11.0319H10.936V0.207936H12.808Z" fill="white"/>
                                        </svg> 
                                        </button>
                                        </div>
                                        </div>
                                        <div class="showdata" style="display:block; display: flex; justify-content: center; align-items: center;">
                                        <p class="errorMessage"></p> 
                                        </div> `; 
                                    }
                                    else if(settingdata.append_to_button_style == 'icon' && settingdata.select_icon_postion == 'roundpluseicon'){
                                        var icon =`<div class="eosh_prod-card eosh_sixth">
                                        <div class="eosh_price-quantity">
                                        ${settingdata.show_hide_button == 1 ? `
                                        <div class="eosh_quantity pointer">
                                        <span class="eosh_down minus">
                                        <svg width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="pluseminus" d="M5 6.49999C4.93442 6.50079 4.86941 6.48786 4.80913 6.46202C4.74885 6.43619 4.69465 6.39803 4.65 6.34999L0.15 1.84999C-0.05 1.64999 -0.05 1.33999 0.15 1.13999C0.35 0.93999 0.66 0.93999 0.86 1.13999L5.01 5.28999L9.15 1.14999C9.35 0.94999 9.66 0.94999 9.86 1.14999C10.06 1.34999 10.06 1.65999 9.86 1.85999L5.36 6.35999C5.26 6.45999 5.13 6.50999 5.01 6.50999L5 6.49999Z" fill="#2C2C2C"/>
                                        </svg> 
                                        </span>
                                        <span style="width:50px;border:none; text-align: center;" class="num" min="1" name="quantity" value="1">1</span>
                                        <span class="eosh_up plus">
                                        <svg width="16" height="7" viewBox="0 0 16 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="pluseminus" d="M7.98999 1.00001C7.92441 0.99921 7.8594 1.01214 7.79912 1.03798C7.73884 1.06381 7.68464 1.10197 7.63999 1.15001L3.13999 5.65001C2.93999 5.85001 2.93999 6.16001 3.13999 6.36001C3.33999 6.56001 3.64999 6.56001 3.84999 6.36001L7.99999 2.21001L12.14 6.35001C12.34 6.55001 12.65 6.55001 12.85 6.35001C13.05 6.15001 13.05 5.84001 12.85 5.64001L8.34999 1.14001C8.24999 1.04001 8.11999 0.990009 7.99999 0.990009L7.98999 1.00001Z" fill="#2C2C2C"/>
                                        </svg> 
                                        </span>
                                        </div>
                                        ` : `<h1>Hello</h1>`}
                                        <button class="crtbtn eosh_cart-btn" id=${currentVariant.id}>
                                        <svg width="24" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="button-icon" d="M12.808 0.207936V11.0319H23.152V12.7839H12.808V23.6559H10.936V12.7839H0.616V11.0319H10.936V0.207936H12.808Z" fill="white"/>
                                        </svg>
                                        </button>
                                        </div>
                                        </div>

                                        <div class="showdata" style="display:block; display: flex; justify-content: center; align-items: center;">
                                        <p class="errorMessage"></p> 
                                        </div>`; 
                                    }else if(settingdata.append_to_button_style == 'icon' && settingdata.select_icon_postion == 'blackicon'){
                                        var icon =` <div class="eosh_prod-card eosh_ninth" style="z-index:1000; position:relative;">
                                        <div class="eosh_price-quantity">
                                        <div class="eosh_quantity-cart">
                                        ${settingdata.show_hide_button == 1 ? 
                                        `<div class="eosh_quantity pointer">
                                        <span class="eosh_down minus">
                                        <svg width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="pluseminus" d="M5 6.49999C4.93442 6.50079 4.86941 6.48786 4.80913 6.46202C4.74885 6.43619 4.69465 6.39803 4.65 6.34999L0.15 1.84999C-0.05 1.64999 -0.05 1.33999 0.15 1.13999C0.35 0.93999 0.66 0.93999 0.86 1.13999L5.01 5.28999L9.15 1.14999C9.35 0.94999 9.66 0.94999 9.86 1.14999C10.06 1.34999 10.06 1.65999 9.86 1.85999L5.36 6.35999C5.26 6.45999 5.13 6.50999 5.01 6.50999L5 6.49999Z" fill="#2C2C2C"/>
                                        </svg> 
                                        </span>
                                        <span style="width:50px;border:none; text-align: center;" class="num" min="1" name="quantity" value="1">1</span>
                                        <span class="eosh_up plus">
                                        <svg width="16" height="7" viewBox="0 0 16 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="pluseminus" d="M7.98999 1.00001C7.92441 0.99921 7.8594 1.01214 7.79912 1.03798C7.73884 1.06381 7.68464 1.10197 7.63999 1.15001L3.13999 5.65001C2.93999 5.85001 2.93999 6.16001 3.13999 6.36001C3.33999 6.56001 3.64999 6.56001 3.84999 6.36001L7.99999 2.21001L12.14 6.35001C12.34 6.55001 12.65 6.55001 12.85 6.35001C13.05 6.15001 13.05 5.84001 12.85 5.64001L8.34999 1.14001C8.24999 1.04001 8.11999 0.990009 7.99999 0.990009L7.98999 1.00001Z" fill="#2C2C2C"/>
                                        </svg> 
                                        </span>
                                        </div>
                                        ` : `<h1>Hello</h1>`}
                                        <button class="crtbtn pointer eosh_cart-btn" id=${currentVariant.id}>
                                        <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="button-icon" d="M28.6352 7.58871C28.5384 7.47287 28.4174 7.3797 28.2806 7.31577C28.1438 7.25185 27.9947 7.21873 27.8438 7.21875H7.04859L6.41824 3.75633C6.3319 3.2811 6.08151 2.85124 5.71073 2.5417C5.33994 2.23216 4.87227 2.06257 4.38926 2.0625H2.0625C1.789 2.0625 1.52669 2.17115 1.3333 2.36455C1.1399 2.55794 1.03125 2.82025 1.03125 3.09375C1.03125 3.36725 1.1399 3.62956 1.3333 3.82295C1.52669 4.01635 1.789 4.125 2.0625 4.125H4.38281L7.67766 22.2093C7.77471 22.7456 8.01173 23.2468 8.36473 23.662C7.87752 24.1171 7.52587 24.6982 7.34876 25.3409C7.17166 25.9836 7.17602 26.6628 7.36136 27.3032C7.5467 27.9436 7.90579 28.5202 8.39879 28.9689C8.8918 29.4177 9.49946 29.7212 10.1544 29.8457C10.8094 29.9702 11.486 29.9108 12.1093 29.6743C12.7325 29.4377 13.2781 29.0331 13.6855 28.5054C14.0929 27.9777 14.3462 27.3474 14.4172 26.6846C14.4883 26.0217 14.3744 25.3521 14.0882 24.75H19.9431C19.7124 25.233 19.593 25.7616 19.5938 26.2969C19.5938 27.0107 19.8054 27.7086 20.202 28.3021C20.5986 28.8957 21.1624 29.3583 21.8219 29.6315C22.4814 29.9047 23.2071 29.9762 23.9073 29.8369C24.6074 29.6976 25.2506 29.3539 25.7553 28.8491C26.2601 28.3443 26.6039 27.7012 26.7432 27.001C26.8824 26.3009 26.8109 25.5752 26.5378 24.9156C26.2646 24.2561 25.8019 23.6924 25.2084 23.2958C24.6148 22.8992 23.917 22.6875 23.2031 22.6875H10.7211C10.4796 22.6875 10.2458 22.6027 10.0604 22.4479C9.87501 22.2931 9.74981 22.0782 9.70664 21.8406L9.29801 19.5938H24.2511C24.9757 19.5936 25.6772 19.3393 26.2333 18.875C26.7895 18.4106 27.1651 17.7659 27.2946 17.053L28.8621 8.43434C28.8886 8.28537 28.8821 8.13239 28.8429 7.98625C28.8037 7.84011 28.7328 7.70439 28.6352 7.58871ZM23.2031 24.75C23.5091 24.75 23.8081 24.8407 24.0625 25.0107C24.3169 25.1807 24.5152 25.4223 24.6323 25.7049C24.7493 25.9876 24.78 26.2986 24.7203 26.5987C24.6606 26.8987 24.5133 27.1743 24.2969 27.3907C24.0806 27.607 23.805 27.7543 23.5049 27.814C23.2048 27.8737 22.8938 27.8431 22.6112 27.726C22.3285 27.6089 22.0869 27.4107 21.9169 27.1563C21.747 26.9019 21.6563 26.6028 21.6563 26.2969C21.6563 25.8866 21.8192 25.4932 22.1093 25.2031C22.3994 24.913 22.7929 24.75 23.2031 24.75ZM10.8281 24.75C11.1341 24.75 11.4331 24.8407 11.6875 25.0107C11.9419 25.1807 12.1402 25.4223 12.2573 25.7049C12.3743 25.9876 12.405 26.2986 12.3453 26.5987C12.2856 26.8987 12.1383 27.1743 11.9219 27.3907C11.7056 27.607 11.43 27.7543 11.1299 27.814C10.8298 27.8737 10.5188 27.8431 10.2362 27.726C9.95351 27.6089 9.71192 27.4107 9.54195 27.1563C9.37197 26.9019 9.28125 26.6028 9.28125 26.2969C9.28125 25.8866 9.44422 25.4932 9.73432 25.2031C10.0244 24.913 10.4179 24.75 10.8281 24.75Z" fill="white"/>
                                        </svg> 
                                        </button>
                                        </div>
                                        </div>
                                        </div>
                                        <div class="showdata" style="display:block; display: flex; justify-content: center; align-items: center;">
                                        <p class="errorMessage"></p> 
                                        </div>`;
                                    }else if(settingdata.append_to_button_style == 'icon' && settingdata.select_icon_postion == 'whiteicon'){
                                        var icon =`<div class="eosh_prod-card eosh_eight"> 
                                        ${settingdata.show_hide_button == 1 ? 
                                        `<div class="eosh_quantity pointer">
                                        <span class="eosh_down minus">
                                        <svg width="5" height="3" viewBox="0 0 5 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="pluseminus" d="M0.0980001 0.844H4.598V2.338H0.0980001V0.844Z" fill="#2C2C2C"/>
                                        </svg> 
                                        </span>
                                        <span style="width:50px;border:none; text-align: center;" class="num" min="1" name="quantity" value="1">1</span>
                                        <span class="eosh_up plus">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="pluseminus" d="M9.558 5.627H5.931V9.452H4.5V5.627H0.891V4.295H4.5V0.487999H5.931V4.295H9.558V5.627Z" fill="#2C2C2C"/>
                                        </svg> 
                                        </span>
                                        </div>`
                                        : `<h1>test</h1>`}
                                        <button class="crtbtn eosh_cart-btn pointer" id=${currentVariant.id}>
                                        <svg width="45" height="40" viewBox="0 0 43 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="button-icon" d="M36.3564 0.275024C32.886 0.275024 30.0593 3.10173 30.0593 6.57214C30.0593 10.0426 32.886 12.8693 36.3564 12.8693C39.8268 12.8693 42.6535 10.0426 42.6535 6.57214C42.6535 3.10173 39.8268 0.275024 36.3564 0.275024ZM36.3564 1.67438C39.0711 1.67438 41.2541 3.85738 41.2541 6.57214C41.2541 9.2869 39.0711 11.4699 36.3564 11.4699C33.6416 11.4699 31.4586 9.2869 31.4586 6.57214C31.4586 3.85738 33.6416 1.67438 36.3564 1.67438ZM36.3564 3.07374C35.9688 3.07374 35.6567 3.3858 35.6567 3.77342V5.87246H33.5577C33.1701 5.87246 32.858 6.18452 32.858 6.57214C32.858 6.95976 33.1701 7.27182 33.5577 7.27182H35.6567V9.37086C35.6567 9.75848 35.9688 10.0705 36.3564 10.0705C36.744 10.0705 37.0561 9.75848 37.0561 9.37086V7.27182H39.1551C39.5427 7.27182 39.8548 6.95976 39.8548 6.57214C39.8548 6.18452 39.5427 5.87246 39.1551 5.87246H37.0561V3.77342C37.0561 3.3858 36.744 3.07374 36.3564 3.07374ZM15.366 18.4667H33.5577C33.9453 18.4667 34.2574 18.7787 34.2574 19.1664C34.2574 19.554 33.9453 19.8661 33.5577 19.8661H15.366C14.9784 19.8661 14.6663 19.554 14.6663 19.1664C14.6663 18.7787 14.9784 18.4667 15.366 18.4667ZM13.9667 12.8693H30.759C31.1466 12.8693 31.4586 13.1813 31.4586 13.5689C31.4586 13.9566 31.1466 14.2686 30.759 14.2686H13.9667C13.579 14.2686 13.267 13.9566 13.267 13.5689C13.267 13.1813 13.579 12.8693 13.9667 12.8693ZM30.759 26.8628C28.8348 26.8628 27.2606 28.4371 27.2606 30.3612C27.2606 32.2854 28.8348 33.8596 30.759 33.8596C32.6831 33.8596 34.2574 32.2854 34.2574 30.3612C34.2574 28.4371 32.6831 26.8628 30.759 26.8628ZM30.759 28.2622C31.926 28.2622 32.858 29.1942 32.858 30.3612C32.858 31.5283 31.926 32.4603 30.759 32.4603C29.5919 32.4603 28.6599 31.5283 28.6599 30.3612C28.6599 29.1942 29.5919 28.2622 30.759 28.2622ZM16.7654 26.8628C14.8413 26.8628 13.267 28.4371 13.267 30.3612C13.267 32.2854 14.8413 33.8596 16.7654 33.8596C18.6895 33.8596 20.2638 32.2854 20.2638 30.3612C20.2638 28.4371 18.6895 26.8628 16.7654 26.8628ZM16.7654 28.2622C17.9324 28.2622 18.8644 29.1942 18.8644 30.3612C18.8644 31.5283 17.9324 32.4603 16.7654 32.4603C15.5983 32.4603 14.6663 31.5283 14.6663 30.3612C14.6663 29.1942 15.5983 28.2622 16.7654 28.2622ZM1.38361 1.67438C0.446043 1.67438 0.436248 3.07374 1.38361 3.07374H6.41011C6.51366 3.57051 7.3057 7.34878 8.24887 11.7917C8.74984 14.1511 9.26201 16.558 9.67342 18.4611C10.0834 20.3642 10.3801 21.7174 10.4962 22.1456C10.681 22.8369 10.8545 23.6219 11.3638 24.3062C11.8704 24.9891 12.7632 25.4621 13.9667 25.4621H33.5465C34.7499 25.4621 35.6427 24.9891 36.1521 24.3062C36.6601 23.6205 36.8322 22.8369 37.0197 22.1442C37.1414 21.6796 37.3331 20.6007 37.5934 19.2475C37.8495 17.8902 38.1532 16.3187 38.433 15.1236C38.6639 14.2658 37.2352 13.8922 37.0729 14.8074C36.7846 16.0444 36.4753 17.6229 36.2165 18.9831C35.9576 20.3446 35.7309 21.5467 35.6679 21.7818C35.4776 22.4898 35.2999 23.1042 35.0284 23.4694C34.7569 23.836 34.4407 24.0627 33.5479 24.0627H13.9667C13.0739 24.0627 12.7576 23.836 12.4833 23.4694C12.2133 23.1056 12.0355 22.4899 11.8452 21.7832C11.7753 21.5131 11.4534 20.0662 11.042 18.1658C10.632 16.2655 10.1184 13.8614 9.61884 11.4993C8.6169 6.77925 7.65974 2.22993 7.65974 2.22993C7.59257 1.90808 7.3071 1.67578 6.97405 1.67578L1.38361 1.67438ZM12.5701 7.27182C11.6395 7.27182 11.6507 8.67118 12.5701 8.67118H26.5525C27.4929 8.67118 27.4719 7.27182 26.5525 7.27182H12.5701Z" fill="#2C2C2C"/>
                                        </svg> 
                                        </button>
                                        </div>
                                        <div class="showdata" style="display:block; display: flex; justify-content: center; align-items: center;">
                                        <p class="errorMessage"></p> 
                                        </div>`; 
                                    }else if( settingdata.append_to_button_style == 'button' && settingdata.select_button_style == 'rounded'){
                                        var btn =` 
                                        <div class="eosh_prod-card eosh_fourth" style="z-index:1000; position:relative;"> 
                                        <div class="eosh_cart-quantity"> 
                                        ${settingdata.show_hide_button == 1 ? 
                                        `<div style="display:none"><p>hello pakistan how are you<p></div> <div class="eosh_quantity pointer">
                                        <span class="eosh_down minus">
                                        <svg width="5" height="5" viewBox="0 0 5 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="pluseminus" d="M0.0980001 0.844H4.598V2.338H0.0980001V0.844Z" fill="#ffffff"/>
                                        </svg> 
                                        </span>
                                        <span style="width:50px;border:none; text-align: center;" class="num" min="1" name="quantity" value="1">1</span>
                                        <span class="eosh_up plus"> 
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="pluseminus" d="M9.558 5.627H5.931V9.452H4.5V5.627H0.891V4.295H4.5V0.487999H5.931V4.295H9.558V5.627Z" fill="#2C2C2C"/>
                                        </svg> 
                                        </span>
                                        ` : '<div style="display:block;">hello pakistan </div>'}
                                        </div>     
                                        <button class="crtbtn rounded eosh_cart-btn pointer" id=${currentVariant.id}>
                                                <span class="change-text-color">${settingdata.custom_text}</span>
                                            </button>
                                        </div>
                                        </div> 
                                        <div class="showdata" style="display:block; display: flex; justify-content: center; align-items: center;">
                                        <p class="errorMessage"></p> 
                                        </div> `;
                                    }else if( settingdata.append_to_button_style == 'button' && settingdata.select_button_style == 'square'){
                                        var btn =`
                                        <div class="eosh_prod-card eosh_third" style="z-index:1;position:relative;">
                                        <div class="eosh_cart-quantity pointer">
                                        ${settingdata.show_hide_button == 1 ? 
                                        ` <div class="eosh_quantity">
                                        <span class="eosh_down minus">
                                        <svg width="8" height="10" viewBox="0 0 5 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="pluseminus" d="M0.0980001 0.844H4.598V2.338H0.0980001V0.844Z" fill="#2C2C2C"/>
                                        </svg> 
                                        </span>
                                        <span class="num" min="1" name="quantity" value="1">1</span>
                                        <span class="eosh_up plus">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="pluseminus" d="M9.558 5.627H5.931V9.452H4.5V5.627H0.891V4.295H4.5V0.487999H5.931V4.295H9.558V5.627Z" fill="#2C2C2C"/>
                                        </svg> 
                                        </span>
                                        </div>
                                        ` : ''}
                                        <button class="crtbtn square eosh_cart-btn pointer" id=${currentVariant.id}><span class="change-text-color">${settingdata.custom_text}</span></button>
                                        </div>
                                        </div>`;
                                    }
                                    
                                    if (domain == 'faacad-2.myshopify.com') {
                                        if($('a[href*="'+handle+'"]').parents(eoProductSelector).find('.eosh_prod-card').length > 0){
                                            $('a[href*="'+handle+'"]').parents(eoProductSelector).find('.eosh_prod-card').remove();
                                        } 
                                        $('a[href*="'+handle+'"]').parents(eoProductSelector).find(eoCart).append(btn,icon);
                                    } else  if(domain === '21cc49-ae.myshopify.com'){
                                        if($('a[href*="'+handle+'"]').parents(eoProductSelector).find('.eosh_prod-card').length == 0){
                                            $('a[href*="'+handle+'"]').parents(eoProductSelector).find(eoCart).after(btn,icon);
                                        } 

                                    } else  if(domain === '543544-47.myshopify.com'){
                                        if($('a[href*="'+handle+'"]').parents(eoProductSelector).find('.eosh_prod-card').length == 0){
                                            $('a[href*="'+handle+'"]').parents(eoProductSelector).find(eoCart).after(btn,icon);
                                        } 
                                    }else if(domain === '3f1992-3a.myshopify.com'){
                                        if($('a[href*="'+handle+'"]').parents(eoProductSelector).find('.eosh_prod-card').length == 0){
                                            $('a[href*="'+handle+'"]').parents(eoProductSelector).find(eoCart).after(btn,icon);
                                        } 
                                    }else if(domain === 'noovesnails.myshopify.com'){
                                        if($('a[href="/products/'+handle+'"]').parents(eoProductSelector).find('.eosh_prod-card').length == 0){
                                            $('a[href="/products/'+handle+'"]').parents(eoProductSelector).find(eoCart).eq(0).after(btn,icon);
                                        } 
                                    }else if(domain === 'mfr21f-0d.myshopify.com'){
                                        if($('a[href="/products/'+handle+'"]').parents(eoProductSelector).first().find('.eosh_prod-card').length == 0){
                                            $('a[href="/products/'+handle+'"]').parents(eoProductSelector).first().find(eoCart).append(btn,icon);
                                        } 
                                    }else {
                                        if($('a[href*="'+handle+'"]').parents(eoProductSelector).find('.eosh_prod-card').length == 0){
                                            $('a[href*="'+handle+'"]').parents(eoProductSelector).find(eoCart).append(btn,icon);
                                        } 
                                    }
                                    // return false;
                        
                                });

                                $('.rounded').css("background-color", `${settingdata.custom_button_color}`);
                                $('button .change-text-color').css("color", `${settingdata.custom_text_color}`);
                                $('.eosh_down ').css("background-color",`${settingdata.custom_quantity_color}`);
                                $('.eosh_up').css("background-color", `${settingdata.custom_quantity_color}`);
                                $('.square').css("background-color", `${settingdata.custom_button_color}`);
                                $('svg path.button-icon').css("fill", `${settingdata.custom_button_color}`);
                                $('svg path.pluseminus').css("fill", `${settingdata.custom_puls_minus_color}`);
                
                        
                                $('.eosh-dropdown1').on('change', function() {
                                    var variantIds=[];
                                    let dropdownval1 = $(this).val();
                                    let dropdownval2 = $(this).parent().find('#eosh-dropdown2').val();
                                    if (dropdownval2 === undefined ) {
                                        dropdownval2 = '';
                                    }
                                    let dropdownval3 = $(this).parent().find('#eosh-dropdown3').val();
                                    if (dropdownval3 === undefined ) {
                                        dropdownval3 = '';
                                    }
                                    let selectedtitle = dropdownval1.concat('/'+dropdownval2+'/'+dropdownval3); 
                                    var selectedtitle1 = selectedtitle.replace(/\/$/, '')
                                    selectedtitle = selectedtitle1.replace(/\/$/, '')
                                    $(this).parent().find('#eosh-hiddenDropDown option').filter(function() {
                                    optionvalue = $(this).text().replaceAll(/ /g,'');
                                    if(optionvalue == selectedtitle){
                                        variantIds = $(this).val();
                                        productprice =  $(this).attr('product-price');

                                        let option = $('#eosh-dropdown3 option');
                                        let name   = option.val();
                                        option.text(`${name}-${productprice}`);

                                        var imageUrl = $(this).attr('data-image');
                                        console.log(imageUrl);

                                        // $(this).parent().find('.card__media img').attr('srcset', imageUrl);
                                        // $('.card__media img').attr('srcset', imageUrl); 
                    
                                        $(this).closest('.card-wrapper').find('.card__media img').attr('srcset', imageUrl);
                                    }
                                    else{
                                        var messageError = 'product is unavailable';
                                    }
                                    });
                                    $(this).parent().find('.eosh_cart-btn').attr('id',variantIds);
                                });

                                $('.eosh-dropdown2').on('change', function() {
                                    var variantIds=[];
                                    let dropdownval2 = $(this).val();
                                    let dropdownval1 = $(this).parent().find('#eosh-dropdown1').val();
                                    let dropdownval3 = $(this).parent().find('#eosh-dropdown3').val();
                                    if (dropdownval3 === undefined ) {
                                        dropdownval3 = '';
                                    }
                                    var selectedtitle =dropdownval1.concat('/'+dropdownval2+'/'+dropdownval3); 
                                    optionvalue = $(this).text();
                                    optionvalue = optionvalue.replace(/\/$/, '');
                                    selectedtitle = selectedtitle.replace(/\/$/, ''); 
                                    $(this).parent().find('#eosh-hiddenDropDown option').filter(function() {
                                    optionvalue = $(this).text();
                                    if(optionvalue == selectedtitle){
                                        variantIds = $(this).val();

                                        var imageUrl = $(this).attr('data-image');
                                        console.log(imageUrl);
                                    
                                        $(this).closest('.card-wrapper').find('.card__media img').attr('srcset', imageUrl);
                                    }
                                    });
                                    $(this).parent().find('.eosh_cart-btn').attr('id',variantIds);
                                });           
                        } 
                } 
            }  

                        // search liquid 
            if( window.location.pathname.indexOf("search") > -1 ){     
                if(settingdata.show_widget_result == 1){
                    var handle='';
                    var allvartiants='';
                    var headoption ='';
                    var productdata  = JSON.parse(productsData);
                    
                    for (var i = 0; i < productdata.length; i++) {
                        handle = productdata[i].handle;
                        allvartiants = productdata[i].variants;
                        headoption = productdata[i].options;

                                    var hiddehtml = ``;
                                    var hidden=``;
                                    $.each(allvartiants, function (key, value) {
                                        var title=value.title;
                                        if (title=='Default Title'){
                                            return false;
                                        }
                                        hiddehtml += `<option  value=${value.id}>${title}</option>`;  
                                        hidden =`<select style="display:block;"  id="eosh-hiddenDropDown" class="" style="position: relative;z-index: 1; overflow-wrap: break-word; white-space: normal; text-decoration: none; line-height: 1.2; letter-spacing: 0px; width: 100%; height: 40px; font-weight: normal; font-style: normal; font-family: Lato, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(51, 51, 51); background-color: transparent; border-width: 1px; border-color: rgb(51, 51, 51); border-radius: 0px; border-style: solid; margin: 5px 0px 0px; padding: 0px 10px; cursor: pointer; background-image: linear-gradient(45deg, transparent 50%, rgb(51, 51, 51) 50%), linear-gradient(135deg, rgb(51, 51, 51) 50%, transparent 50%); background-position: calc(100% - 14px) calc(1em + 2px), calc(100% - 10px) calc(1em + 2px); background-size: 4px 4px; background-repeat: no-repeat; appearance: none; text-indent: 1px;">
                                                ${hiddehtml}
                                                </select>`; 
                                    });
                                    if($('a[href*="'+handle+'"]').parents(eoProductSelector).find('.eosh_prod-card').length == 0){
                                        $('a[href*="'+handle+'"]').parents(eoProductSelector).find(eoCart).append(hidden);
                                    } 
                                                                                                    
                                    var labelDropDown1 = null;
                                    var dropDown1 = [];
                                    var labelDropDown2 = null;
                                    var dropDown2 = [];
                                    var labelDropDown3 = null;
                                    var dropDown3 = [];
                                
                                    $.each(headoption, function(key,variantName){
                                            if (key == 0) {
                                                labelDropDown1 = variantName.name;
                                                $.each(variantName.values, function(id,variantValue){
                                                    dropDown1.push(variantValue);
                                                });
                                                let html = ``;
                                                for (var x  of dropDown1) {
                                                    var y=  x;
                                                    if (y =='Default Title'){
                                                        return false;
                                                    }
                                                    x=  x.replace(/\s/g, '')
                                                    html+= `<option value=${x}>${y}</option>`;
                                                }
                                                var dataselect =`<div id="labelDropDown1" class="labeldropdown1">${labelDropDown1}</div>
                                                <select  id="eosh-dropdown1" class="eosh-dropdown1">
                                                    ${html} 
                                                </select>`; 
                                            
                                            } else if (key == 1) {
                                                labelDropDown2 = variantName.name;
                                                $.each(variantName.values,function (id, variantValue) {
                                                    dropDown2.push(variantValue);
                                                });
                                                let html1 = ``;
                                                for (var x  of dropDown2) {
                                                        var y=  x;
                                                        x=  x.replace(/\s/g, '')
                                                    html1+= `<option value=${x}>${y}</option>`;
                                                }
                                                var dataselect =`<div id="" class="labeldropdown2">${labelDropDown2}</div>
                                                <select  id="eosh-dropdown2" class="eosh-dropdown2">
                                                    ${html1};
                                                </select>`;
                                            }else {
                                                labelDropDown3 = variantName.name;
                                                $.each(variantName.values,function (id, variantValue) {
                                                        dropDown3.push(variantValue);
                                                    });
                                                let html2 = ``;
                                                for (var x  of dropDown3) {
                                                    var y=  x;
                                                    html2+= `<option  value="${x}">${y}</option>`;
                                                }
                                                var dataselect =`
                                                <div class="labeldropdown3" >${labelDropDown3}</div>
                                                <select  id="eosh-dropdown3" class="eosh-dropdown3">
                                                    ${html2}
                                                </select>`;
                                            } 

                                            if(settingdata.show_hide_varsize_color == 1){
                                                if($('a[href*="'+handle+'"]').parents(eoProductSelector).find('.eosh_prod-card').length == 0){
                                                    $('a[href*="'+handle+'"]').parents(eoProductSelector).find(eoCart).append(dataselect);
                                                } 
                                            }   
                                    });
                        
                                    selectedtitle=[];
                                    var  optionvalue=[];
                            
                                    $.each(allvartiants, function(key,value){
                                        // if(value.available == true){    
                                            if(settingdata.append_to_button_style == 'icon' && settingdata.select_icon_postion == 'greenicon'){
                                                var icon =`<div class="eosh_prod-card eosh_tenth">
                                                                <div class="eosh_cart-quantity">
                                                                ${settingdata.show_hide_button == 1 ? 
                                                                    `<div class="eosh_quantity pointer">
                                                                        <span class="eosh_down minus">
                                                                            <svg width="5" height="3" viewBox="0 0 5 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path class="pluseminus" d="M0.0980001 0.844H4.598V2.338H0.0980001V0.844Z" fill="#2C2C2C"/>
                                                                            </svg>                            
                                                                        </span>
                                                                        <span style="width:50px;border:none; text-align: center;" class="num"  min="1" name="quantity" value="1">1</span>
                                                                        <span class="eosh_up plus">
                                                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path class="pluseminus" d="M9.558 5.627H5.931V9.452H4.5V5.627H0.891V4.295H4.5V0.487999H5.931V4.295H9.558V5.627Z" fill="#2C2C2C"/>
                                                                            </svg>                                                      
                                                                        </span>
                                                                    </div>`
                                                                    : ``}
                                                                    <button  class="crtbtn eosh_cart-btn pointer  button-data"  id=${value.id} >
                                                                        <svg width="40" height="40" viewBox="0 0 40 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path class="button-icon" d="M32.4398 15.6074C36.5391 15.6074 40 12.1911 40 8.06186C40 3.93264 36.5839 0.516357 32.4398 0.516357C28.3106 0.516357 24.8942 3.93264 24.8942 8.06186C24.8942 12.2208 28.3106 15.6074 32.4398 15.6074ZM12.0758 24.8759H29.4097C29.9889 24.8759 30.4939 24.4006 30.4939 23.7619C30.4939 23.1232 29.9889 22.6479 29.4097 22.6479H12.3283C11.4816 22.6479 10.9618 22.0537 10.8281 21.1477L10.6053 19.5881H29.4395C30.9842 19.5881 31.9792 18.9345 32.5439 17.6571C31.2662 17.6571 30.0631 17.4046 28.9491 16.9145C28.7265 17.2116 28.4441 17.3452 28.0284 17.3452L10.2636 17.3601L9.00114 8.74514H22.9039C22.8296 8.06186 22.8741 7.17064 22.9781 6.50229H8.67436L8.407 4.61593C8.24364 3.47214 7.84257 2.89293 6.32757 2.89293H1.09914C0.505 2.89293 0 3.41279 0 4.00693C0 4.61593 0.505 5.13579 1.09914 5.13579H6.11957L8.49614 21.4448C8.808 23.5539 9.92207 24.8759 12.0758 24.8759ZM32.4547 12.9635C31.9349 12.9635 31.4743 12.607 31.4743 12.0574V8.96793H28.6374C28.1324 8.96793 27.7311 8.55207 27.7311 8.06186C27.7311 7.57171 28.1324 7.15579 28.6374 7.15579H31.4743V4.08121C31.4743 3.51671 31.9349 3.16029 32.4547 3.16029C32.9746 3.16029 33.4199 3.51671 33.4199 4.08121V7.15579H36.2571C36.7621 7.15579 37.178 7.57171 37.178 8.06186C37.178 8.55207 36.7621 8.96793 36.2571 8.96793H33.4199V12.0574C33.4199 12.607 32.9746 12.9635 32.4547 12.9635ZM13.2492 32.0946C14.586 32.0946 15.6554 31.04 15.6554 29.6884C15.6554 28.3516 14.586 27.2821 13.2492 27.2821C11.8975 27.2821 10.8429 28.3516 10.8429 29.6884C10.8429 31.04 11.8975 32.0946 13.2492 32.0946ZM27.1519 32.0946C28.4889 32.0946 29.5581 31.04 29.5581 29.6884C29.5581 28.3516 28.4889 27.2821 27.1519 27.2821C25.8003 27.2821 24.716 28.3516 24.716 29.6884C24.716 31.04 25.8003 32.0946 27.1519 32.0946Z" fill="#00B35D"/>
                                                                        </svg>  
                                                                    </button>
                                                                </div>
                                                        </div>
                                                            <div class="showdata" style="display:block; display: flex; justify-content: center; align-items: center;">
                                                                <p class="errorMessage"></p> 
                                                            </div> `;
                                            }else if(settingdata.append_to_button_style == 'icon' &&  settingdata.select_icon_postion == 'squarepluseicon'){
                                                var icon =`
                                                <div class="eosh_prod-card eosh_fifth">
                                                    <div class="eosh_cart-quantity">
                                                    ${settingdata.show_hide_button == 1 ? 
                                                        `<div class="eosh_quantity">
                                                            <span class="eosh_down minus">
                                                                <svg width="5" height="3" viewBox="0 0 5 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path class="pluseminus" d="M0.0980001 0.844H4.598V2.338H0.0980001V0.844Z" fill="#2C2C2C"/>
                                                                </svg>                            
                                                            </span>
                                                            <span style="width:50px;border:none; text-align: center;" class="num"  min="1" name="quantity" value="1">1</span>
                                                            <span class="eosh_up plus">
                                                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path class="pluseminus" d="M9.558 5.627H5.931V9.452H4.5V5.627H0.891V4.295H4.5V0.487999H5.931V4.295H9.558V5.627Z" fill="#2C2C2C"/>
                                                                </svg>                                                      
                                                            </span>
                                                        </div>`
                                                        : ``}
                                                        <button class="crtbtn  eosh_cart-btn" id=${value.id}>
                                                            <svg width="24" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path class="button-icon" d="M12.808 0.207936V11.0319H23.152V12.7839H12.808V23.6559H10.936V12.7839H0.616V11.0319H10.936V0.207936H12.808Z" fill="white"/>
                                                                </svg>                        
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="showdata" style="display:block; display: flex; justify-content: center; align-items: center;">
                                                    <p class="errorMessage"></p> 
                                                </div> 
                                            `;
                                            }else if(settingdata.append_to_button_style == 'icon' &&  settingdata.select_icon_postion == 'roundpluseicon'){
                                                var icon =`<div class="eosh_prod-card eosh_sixth">
                                                            <div class="eosh_price-quantity">
                                                            ${settingdata.show_hide_button == 1 ? 
                                                                `<div class="eosh_quantity pointer">
                                                                    <span class="eosh_down minus">
                                                                        <svg width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path class="pluseminus" d="M5 6.49999C4.93442 6.50079 4.86941 6.48786 4.80913 6.46202C4.74885 6.43619 4.69465 6.39803 4.65 6.34999L0.15 1.84999C-0.05 1.64999 -0.05 1.33999 0.15 1.13999C0.35 0.93999 0.66 0.93999 0.86 1.13999L5.01 5.28999L9.15 1.14999C9.35 0.94999 9.66 0.94999 9.86 1.14999C10.06 1.34999 10.06 1.65999 9.86 1.85999L5.36 6.35999C5.26 6.45999 5.13 6.50999 5.01 6.50999L5 6.49999Z" fill="#2C2C2C"/>
                                                                        </svg>                            
                                                                    </span>
                                                                    <span style="width:50px;border:none; text-align: center;" class="num"  min="1" name="quantity" value="1">1</span>
                                                                    <span class="eosh_up plus">
                                                                        <svg width="16" height="7" viewBox="0 0 16 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path class="pluseminus" d="M7.98999 1.00001C7.92441 0.99921 7.8594 1.01214 7.79912 1.03798C7.73884 1.06381 7.68464 1.10197 7.63999 1.15001L3.13999 5.65001C2.93999 5.85001 2.93999 6.16001 3.13999 6.36001C3.33999 6.56001 3.64999 6.56001 3.84999 6.36001L7.99999 2.21001L12.14 6.35001C12.34 6.55001 12.65 6.55001 12.85 6.35001C13.05 6.15001 13.05 5.84001 12.85 5.64001L8.34999 1.14001C8.24999 1.04001 8.11999 0.990009 7.99999 0.990009L7.98999 1.00001Z" fill="#2C2C2C"/>
                                                                        </svg>                                                        
                                                                    </span>
                                                                </div>`
                                                                : ``}
                                                                <button class="crtbtn  eosh_cart-btn" id=${value.id}>
                                                                        <svg width="24" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path class="button-icon" d="M12.808 0.207936V11.0319H23.152V12.7839H12.808V23.6559H10.936V12.7839H0.616V11.0319H10.936V0.207936H12.808Z" fill="white"/>
                                                                        </svg>
                                                                </button>
                                                            </div>
                                                        </div>
        
                                                        <div class="showdata" style="display:block; display: flex; justify-content: center; align-items: center;">
                                                            <p class="errorMessage"></p> 
                                                        </div>  
                                                        `;     
                                            }else if(settingdata.append_to_button_style == 'icon' &&  settingdata.select_icon_postion == 'blackicon'){
                                                var icon =` <div class="eosh_prod-card eosh_ninth" style="z-index:1000; position:relative;">
                                                                <div class="eosh_price-quantity">
                                                                    <div class="eosh_quantity-cart">
                                                                    ${settingdata.show_hide_button == 1 ?   
                                                                        `<div class="eosh_quantity pointer">
                                                                            <span class="eosh_down minus">
                                                                                <svg width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path class="pluseminus" d="M5 6.49999C4.93442 6.50079 4.86941 6.48786 4.80913 6.46202C4.74885 6.43619 4.69465 6.39803 4.65 6.34999L0.15 1.84999C-0.05 1.64999 -0.05 1.33999 0.15 1.13999C0.35 0.93999 0.66 0.93999 0.86 1.13999L5.01 5.28999L9.15 1.14999C9.35 0.94999 9.66 0.94999 9.86 1.14999C10.06 1.34999 10.06 1.65999 9.86 1.85999L5.36 6.35999C5.26 6.45999 5.13 6.50999 5.01 6.50999L5 6.49999Z" fill="#2C2C2C"/>
                                                                                </svg>                            
                                                                            </span>
                                                                            <span style="width:50px;border:none; text-align: center;" class="num"  min="1" name="quantity" value="1">1</span>
                                                                            <span class="eosh_up plus">
                                                                                <svg width="16" height="7" viewBox="0 0 16 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path class="pluseminus" d="M7.98999 1.00001C7.92441 0.99921 7.8594 1.01214 7.79912 1.03798C7.73884 1.06381 7.68464 1.10197 7.63999 1.15001L3.13999 5.65001C2.93999 5.85001 2.93999 6.16001 3.13999 6.36001C3.33999 6.56001 3.64999 6.56001 3.84999 6.36001L7.99999 2.21001L12.14 6.35001C12.34 6.55001 12.65 6.55001 12.85 6.35001C13.05 6.15001 13.05 5.84001 12.85 5.64001L8.34999 1.14001C8.24999 1.04001 8.11999 0.990009 7.99999 0.990009L7.98999 1.00001Z" fill="#2C2C2C"/>
                                                                                </svg>                                                        
                                                                            </span>
                                                                        </div>`
                                                                        : ``}
                                                                        <button  class="crtbtn pointer eosh_cart-btn" id=${value.id}>
                                                                            <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path class="button-icon" d="M28.6352 7.58871C28.5384 7.47287 28.4174 7.3797 28.2806 7.31577C28.1438 7.25185 27.9947 7.21873 27.8438 7.21875H7.04859L6.41824 3.75633C6.3319 3.2811 6.08151 2.85124 5.71073 2.5417C5.33994 2.23216 4.87227 2.06257 4.38926 2.0625H2.0625C1.789 2.0625 1.52669 2.17115 1.3333 2.36455C1.1399 2.55794 1.03125 2.82025 1.03125 3.09375C1.03125 3.36725 1.1399 3.62956 1.3333 3.82295C1.52669 4.01635 1.789 4.125 2.0625 4.125H4.38281L7.67766 22.2093C7.77471 22.7456 8.01173 23.2468 8.36473 23.662C7.87752 24.1171 7.52587 24.6982 7.34876 25.3409C7.17166 25.9836 7.17602 26.6628 7.36136 27.3032C7.5467 27.9436 7.90579 28.5202 8.39879 28.9689C8.8918 29.4177 9.49946 29.7212 10.1544 29.8457C10.8094 29.9702 11.486 29.9108 12.1093 29.6743C12.7325 29.4377 13.2781 29.0331 13.6855 28.5054C14.0929 27.9777 14.3462 27.3474 14.4172 26.6846C14.4883 26.0217 14.3744 25.3521 14.0882 24.75H19.9431C19.7124 25.233 19.593 25.7616 19.5938 26.2969C19.5938 27.0107 19.8054 27.7086 20.202 28.3021C20.5986 28.8957 21.1624 29.3583 21.8219 29.6315C22.4814 29.9047 23.2071 29.9762 23.9073 29.8369C24.6074 29.6976 25.2506 29.3539 25.7553 28.8491C26.2601 28.3443 26.6039 27.7012 26.7432 27.001C26.8824 26.3009 26.8109 25.5752 26.5378 24.9156C26.2646 24.2561 25.8019 23.6924 25.2084 23.2958C24.6148 22.8992 23.917 22.6875 23.2031 22.6875H10.7211C10.4796 22.6875 10.2458 22.6027 10.0604 22.4479C9.87501 22.2931 9.74981 22.0782 9.70664 21.8406L9.29801 19.5938H24.2511C24.9757 19.5936 25.6772 19.3393 26.2333 18.875C26.7895 18.4106 27.1651 17.7659 27.2946 17.053L28.8621 8.43434C28.8886 8.28537 28.8821 8.13239 28.8429 7.98625C28.8037 7.84011 28.7328 7.70439 28.6352 7.58871ZM23.2031 24.75C23.5091 24.75 23.8081 24.8407 24.0625 25.0107C24.3169 25.1807 24.5152 25.4223 24.6323 25.7049C24.7493 25.9876 24.78 26.2986 24.7203 26.5987C24.6606 26.8987 24.5133 27.1743 24.2969 27.3907C24.0806 27.607 23.805 27.7543 23.5049 27.814C23.2048 27.8737 22.8938 27.8431 22.6112 27.726C22.3285 27.6089 22.0869 27.4107 21.9169 27.1563C21.747 26.9019 21.6563 26.6028 21.6563 26.2969C21.6563 25.8866 21.8192 25.4932 22.1093 25.2031C22.3994 24.913 22.7929 24.75 23.2031 24.75ZM10.8281 24.75C11.1341 24.75 11.4331 24.8407 11.6875 25.0107C11.9419 25.1807 12.1402 25.4223 12.2573 25.7049C12.3743 25.9876 12.405 26.2986 12.3453 26.5987C12.2856 26.8987 12.1383 27.1743 11.9219 27.3907C11.7056 27.607 11.43 27.7543 11.1299 27.814C10.8298 27.8737 10.5188 27.8431 10.2362 27.726C9.95351 27.6089 9.71192 27.4107 9.54195 27.1563C9.37197 26.9019 9.28125 26.6028 9.28125 26.2969C9.28125 25.8866 9.44422 25.4932 9.73432 25.2031C10.0244 24.913 10.4179 24.75 10.8281 24.75Z" fill="white"/>
                                                                            </svg>                            
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="showdata" style="display:block; display: flex; justify-content: center; align-items: center;">
                                                                <p class="errorMessage"></p> 
                                                            </div>  
                                                `;
                                            }else if(settingdata.append_to_button_style == 'icon' &&  settingdata.select_icon_postion == 'whiteicon'){
                                                var icon =`<div class="eosh_prod-card eosh_eight"> 
                                                                ${settingdata.show_hide_button == 1 ? 
                                                                `<div class="eosh_quantity pointer">
                                                                        <span class="eosh_down minus">
                                                                            <svg width="5" height="3" viewBox="0 0 5 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path class="pluseminus" d="M0.0980001 0.844H4.598V2.338H0.0980001V0.844Z" fill="#2C2C2C"/>
                                                                            </svg>                            
                                                                        </span>
                                                                        <span style="width:50px;border:none; text-align: center;" class="num"  min="1" name="quantity" value="1">1</span>
                                                                        <span class="eosh_up plus">
                                                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path class="pluseminus" d="M9.558 5.627H5.931V9.452H4.5V5.627H0.891V4.295H4.5V0.487999H5.931V4.295H9.558V5.627Z" fill="#2C2C2C"/>
                                                                                </svg>                                                        
                                                                        </span>
                                                                </div>`
                                                                : ``}
                                                                <button class="crtbtn eosh_cart-btn pointer" id=${value.id}>
                                                                    <svg width="45" height="40" viewBox="0 0 43 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path class="button-icon"  d="M36.3564 0.275024C32.886 0.275024 30.0593 3.10173 30.0593 6.57214C30.0593 10.0426 32.886 12.8693 36.3564 12.8693C39.8268 12.8693 42.6535 10.0426 42.6535 6.57214C42.6535 3.10173 39.8268 0.275024 36.3564 0.275024ZM36.3564 1.67438C39.0711 1.67438 41.2541 3.85738 41.2541 6.57214C41.2541 9.2869 39.0711 11.4699 36.3564 11.4699C33.6416 11.4699 31.4586 9.2869 31.4586 6.57214C31.4586 3.85738 33.6416 1.67438 36.3564 1.67438ZM36.3564 3.07374C35.9688 3.07374 35.6567 3.3858 35.6567 3.77342V5.87246H33.5577C33.1701 5.87246 32.858 6.18452 32.858 6.57214C32.858 6.95976 33.1701 7.27182 33.5577 7.27182H35.6567V9.37086C35.6567 9.75848 35.9688 10.0705 36.3564 10.0705C36.744 10.0705 37.0561 9.75848 37.0561 9.37086V7.27182H39.1551C39.5427 7.27182 39.8548 6.95976 39.8548 6.57214C39.8548 6.18452 39.5427 5.87246 39.1551 5.87246H37.0561V3.77342C37.0561 3.3858 36.744 3.07374 36.3564 3.07374ZM15.366 18.4667H33.5577C33.9453 18.4667 34.2574 18.7787 34.2574 19.1664C34.2574 19.554 33.9453 19.8661 33.5577 19.8661H15.366C14.9784 19.8661 14.6663 19.554 14.6663 19.1664C14.6663 18.7787 14.9784 18.4667 15.366 18.4667ZM13.9667 12.8693H30.759C31.1466 12.8693 31.4586 13.1813 31.4586 13.5689C31.4586 13.9566 31.1466 14.2686 30.759 14.2686H13.9667C13.579 14.2686 13.267 13.9566 13.267 13.5689C13.267 13.1813 13.579 12.8693 13.9667 12.8693ZM30.759 26.8628C28.8348 26.8628 27.2606 28.4371 27.2606 30.3612C27.2606 32.2854 28.8348 33.8596 30.759 33.8596C32.6831 33.8596 34.2574 32.2854 34.2574 30.3612C34.2574 28.4371 32.6831 26.8628 30.759 26.8628ZM30.759 28.2622C31.926 28.2622 32.858 29.1942 32.858 30.3612C32.858 31.5283 31.926 32.4603 30.759 32.4603C29.5919 32.4603 28.6599 31.5283 28.6599 30.3612C28.6599 29.1942 29.5919 28.2622 30.759 28.2622ZM16.7654 26.8628C14.8413 26.8628 13.267 28.4371 13.267 30.3612C13.267 32.2854 14.8413 33.8596 16.7654 33.8596C18.6895 33.8596 20.2638 32.2854 20.2638 30.3612C20.2638 28.4371 18.6895 26.8628 16.7654 26.8628ZM16.7654 28.2622C17.9324 28.2622 18.8644 29.1942 18.8644 30.3612C18.8644 31.5283 17.9324 32.4603 16.7654 32.4603C15.5983 32.4603 14.6663 31.5283 14.6663 30.3612C14.6663 29.1942 15.5983 28.2622 16.7654 28.2622ZM1.38361 1.67438C0.446043 1.67438 0.436248 3.07374 1.38361 3.07374H6.41011C6.51366 3.57051 7.3057 7.34878 8.24887 11.7917C8.74984 14.1511 9.26201 16.558 9.67342 18.4611C10.0834 20.3642 10.3801 21.7174 10.4962 22.1456C10.681 22.8369 10.8545 23.6219 11.3638 24.3062C11.8704 24.9891 12.7632 25.4621 13.9667 25.4621H33.5465C34.7499 25.4621 35.6427 24.9891 36.1521 24.3062C36.6601 23.6205 36.8322 22.8369 37.0197 22.1442C37.1414 21.6796 37.3331 20.6007 37.5934 19.2475C37.8495 17.8902 38.1532 16.3187 38.433 15.1236C38.6639 14.2658 37.2352 13.8922 37.0729 14.8074C36.7846 16.0444 36.4753 17.6229 36.2165 18.9831C35.9576 20.3446 35.7309 21.5467 35.6679 21.7818C35.4776 22.4898 35.2999 23.1042 35.0284 23.4694C34.7569 23.836 34.4407 24.0627 33.5479 24.0627H13.9667C13.0739 24.0627 12.7576 23.836 12.4833 23.4694C12.2133 23.1056 12.0355 22.4899 11.8452 21.7832C11.7753 21.5131 11.4534 20.0662 11.042 18.1658C10.632 16.2655 10.1184 13.8614 9.61884 11.4993C8.6169 6.77925 7.65974 2.22993 7.65974 2.22993C7.59257 1.90808 7.3071 1.67578 6.97405 1.67578L1.38361 1.67438ZM12.5701 7.27182C11.6395 7.27182 11.6507 8.67118 12.5701 8.67118H26.5525C27.4929 8.67118 27.4719 7.27182 26.5525 7.27182H12.5701Z" fill="#2C2C2C"/>
                                                                    </svg>                    
                                                                </button>
                                                            </div>
                                                            <div class="showdata" style="display:block; display: flex; justify-content: center; align-items: center;">
                                                                <p class="errorMessage"></p> 
                                                            </div> `;  
                                            }else if( settingdata.append_to_button_style == 'button' && settingdata.select_button_style == 'rounded'){
                                                var btn =`        
                                                <div class="eosh_prod-card eosh_fourth" style="z-index:1000; position:relative;"> 
                                                    <div class="eosh_cart-quantity">
                                                    ${settingdata.show_hide_button == 1 ? 
                                                        `<div class="eosh_quantity pointer">
                                                            <span class="eosh_down minus">
                                                                <svg width="5" height="3" viewBox="0 0 5 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path class="pluseminus" d="M0.0980001 0.844H4.598V2.338H0.0980001V0.844Z" fill="#2C2C2C"/>
                                                                </svg> 
                                                            </span>
                                                            <span style="width:50px;border:none; text-align: center;" class="num"  min="1" name="quantity" value="1">1</span>
                                                            <span class="eosh_up plus">  
                                                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path class="pluseminus" d="M9.558 5.627H5.931V9.452H4.5V5.627H0.891V4.295H4.5V0.487999H5.931V4.295H9.558V5.627Z" fill="#2C2C2C"/>
                                                                </svg>                                                   
                                                            </span>
                                                        </div>`
                                                        : ``}
                                                        <button class="crtbtn rounded eosh_cart-btn pointer" id=${value.id}><span class="change-text-color">${settingdata.custom_text}</span></button>
                                                    </div>
                                                </div> 
            
                                                <div class="showdata" style="display:block; display: flex; justify-content: center; align-items: center;">
                                                    <p class="errorMessage"></p> 
                                                </div>  
                                                `;
                                            }else if( settingdata.append_to_button_style == 'button' && settingdata.select_button_style == 'square'){
                                                var btn =`
                                                            <div class="eosh_prod-card eosh_third" style="z-index:1;position:relative;">
                                                                <div class="eosh_cart-quantity pointer">
                                                                ${settingdata.show_hide_button == 1 ? 
                                                                    `<div class="eosh_quantity">
                                                                        <span class="eosh_down minus">
                                                                            <svg width="8" height="10" viewBox="0 0 5 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path class="pluseminus" d="M0.0980001 0.844H4.598V2.338H0.0980001V0.844Z" fill="#2C2C2C"/>
                                                                            </svg>                            
                                                                        </span>
                                                                        <span  class="num"  min="1" name="quantity" value="1">1</span>
                                                                        <span class="eosh_up plus">
                                                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path class="pluseminus" d="M9.558 5.627H5.931V9.452H4.5V5.627H0.891V4.295H4.5V0.487999H5.931V4.295H9.558V5.627Z" fill="#2C2C2C"/>
                                                                            </svg>                                                       
                                                                        </span>
                                                                    </div>`
                                                                    : ``}
                                                                    <button  style="" class="crtbtn square eosh_cart-btn pointer" id=${value.id}><span class="change-text-color">${settingdata.custom_text}</span></button>
                                                                </div>
                                                            </div>
                                                `;
                                            }
                                            
                                            if($('a[href*="'+handle+'"]').parents(eoProductSelector).find('.eosh_prod-card').length == 0){
                                                $('a[href*="'+handle+'"]').parents(eoProductSelector).find(eoCart).append(btn,icon);
                                            }
                                            return false;
                                        // }
                                    });

                                    $('.rounded').css("background-color", `${settingdata.custom_button_color}`);
                                    $('button .change-text-color').css("color", `${settingdata.custom_text_color}`);
                                    $('.eosh_down ').css("background-color",`${settingdata.custom_quantity_color}`);
                                    $('.eosh_up').css("background-color", `${settingdata.custom_quantity_color}`);
                                    $('.square').css("background-color", `${settingdata.custom_button_color}`);
                                    $('svg path.button-icon').css("fill", `${settingdata.custom_button_color}`);
                                    $('svg path.pluseminus').css("fill", `${settingdata.custom_puls_minus_color}`);

                                    $('.eosh-dropdown1').on('change', function() {
                                        var  variantIds=[];
                                        let  dropdownval1 = $(this).val();
                                
                                        let  dropdownval2 = $(this).parent().find('#eosh-dropdown2').val();
                                        if (dropdownval2 === undefined ) {
                                            dropdownval2 = '';
                                        }
                                        let  dropdownval3 = $(this).parent().find('#eosh-dropdown3').val();
                                        if (dropdownval3 === undefined ) {
                                            dropdownval3 = '';
                                        }
                                        let selectedtitle =  dropdownval1.concat('/'+dropdownval2+'/'+dropdownval3); 
                                    
                                        var selectedtitle1 = selectedtitle.replace(/\/$/, '')
                                        selectedtitle  = selectedtitle1.replace(/\/$/, '')
                                        $(this).parent().find('#eosh-hiddenDropDown option').filter(function() {
                                            optionvalue = $(this).text().replaceAll(/ /g,'');
                                            if(optionvalue == selectedtitle){
                                                variantIds  = $(this).val();
                                            }
                                            else{
                                                var messageError = 'product is  unavailable';
                                            }
                                        });
                                        $(this).parent().find('.eosh_cart-btn').attr('id',variantIds);
                                    });

                                    $('.eosh-dropdown2').on('change', function() {
                                        var  variantIds=[];
                                        let  dropdownval2 = $(this).val();
                                        let  dropdownval1 = $(this).parent().find('#eosh-dropdown1').val();
                                        let dropdownval3 = $(this).parent().find('#eosh-dropdown3').val();
                                        if (dropdownval3 === undefined ) {
                                            dropdownval3 = '';
                                        }
                                        var selectedtitle =dropdownval1.concat('/'+dropdownval2+'/'+dropdownval3); 
                                        optionvalue = $(this).text();
                                        optionvalue =    optionvalue.replace(/\/$/, '');
                                        selectedtitle =  selectedtitle.replace(/\/$/, '');                    
                                        $(this).parent().find('#eosh-hiddenDropDown option').filter(function() {
                                            optionvalue = $(this).text();
                                            if(optionvalue == selectedtitle){
                                                variantIds  = $(this).val();
                                            }
                                        });
                                        $(this).parent().find('.eosh_cart-btn').attr('id',variantIds);
                                    });      
                    }
                }
            }
                        // add to cart
            $(document).on('click', '.crtbtn', function(event) {
                event.preventDefault();
                var pointer = $(this);
                var VariantId = $(this).attr('id');
                var productQuantity = $(this).parent().find('.num').text();
                // console.log("Product Quantity:", productQuantity); 
                var item = [{ 'id': VariantId, 'quantity': productQuantity }];
                updateQty(item, pointer);
            });

            // Add this function to handle the plus/minus buttons with event delegation
            function setupQuantityButtons() {
                // Get the current domain and URL path
                const domain = window.location.hostname;
                const path = window.location.pathname;
                
                // Define the specific domain and collection
                const specificDomain = 'friske.com';
                const specificCollection = '/collections/cookies';
                
                // Set initial values for all quantity inputs
                $(document).ready(function() {
                    $('.num').each(function() {
                        let initialValue = (domain === specificDomain && path.startsWith(specificCollection)) ? 6 : 1;
                        $(this).text(initialValue);
                    });
                });
                
                // Handle plus button clicks with event delegation
                $(document).on('click', '.eosh_up.plus', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    
                    let numElement = $(this).parent().find('.num');
                    let currentValue = parseInt(numElement.text());
                    
                    if (domain === specificDomain && path.startsWith(specificCollection)) {
                        currentValue += 6; // Increment by 6 for specific domain/collection
                    } else {
                        currentValue += 1; // Default increment by 1
                    }
                    
                    numElement.text(currentValue);
                });
                
                // Handle minus button clicks with event delegation
                $(document).on('click', '.eosh_down.minus', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    
                    let numElement = $(this).parent().find('.num');
                    let currentValue = parseInt(numElement.text());
                    
                    if (domain === specificDomain && path.startsWith(specificCollection)) {
                        if (currentValue > 6) { // Don't go below 6
                            currentValue -= 6;
                        }
                    } else {
                        if (currentValue > 1) { // Don't go below 1
                            currentValue -= 1;
                        }
                    }
                    
                    numElement.text(currentValue);
                });
            }

            // Test function to manually open cart drawer
            // function testCartDrawer() {
            //     const cartDrawer = document.querySelector('cart-drawer');
            //     if (cartDrawer) {
            //         cartDrawer.classList.remove('is-empty');
            //         cartDrawer.classList.add('active');
                    
            //         const cartDrawerItems = cartDrawer.querySelector('cart-drawer-items');
            //         if (cartDrawerItems) {
            //             cartDrawerItems.classList.remove('is-empty');
            //         }
                    
            //         const drawerInnerEmpty = cartDrawer.querySelector('.drawer__inner-empty');
            //         if (drawerInnerEmpty) {
            //             drawerInnerEmpty.style.display = 'none';
            //         }
            //     }
                
            // }

            // Call the setup function when document is ready
            $(document).ready(function() {
                setupQuantityButtons();
            });
                                        
                //liquid for home
            if( window.location.pathname == '/'){    
                if(settingdata.show_widget_home == 1){ 

                    var handle='';
                    var allvartiants='';
                    var headoption ='';
                    var productdata  = JSON.parse(productsData);
                    
                    for (var i = 0; i < productdata.length; i++) {
                        handle = productdata[i].handle;
                        allvartiants = productdata[i].variants;
                        headoption = productdata[i].options;

                            var hiddehtml = ``;
                            var hidden=``;
                            $.each(allvartiants, function (key, value) {
                                var title=value.title;
                                if (title=='Default Title' && domain !== 'mfr21f-0d.myshopify.com'){
                                    return false;
                                }
                                hiddehtml += `<option  value=${value.id}>${title}</option>`;  
                                hidden =`<select style="display:block;"  id="eosh-hiddenDropDown" class="" style="position: relative;z-index: 1; overflow-wrap: break-word; white-space: normal; text-decoration: none; line-height: 1.2; letter-spacing: 0px; width: 100%; height: 40px; font-weight: normal; font-style: normal; font-family: Lato, &quot;Helvetica Neue&quot;, Arial, Helvetica, sans-serif; font-size: 14px; color: rgb(51, 51, 51); background-color: transparent; border-width: 1px; border-color: rgb(51, 51, 51); border-radius: 0px; border-style: solid; margin: 5px 0px 0px; padding: 0px 10px; cursor: pointer; background-image: linear-gradient(45deg, transparent 50%, rgb(51, 51, 51) 50%), linear-gradient(135deg, rgb(51, 51, 51) 50%, transparent 50%); background-position: calc(100% - 14px) calc(1em + 2px), calc(100% - 10px) calc(1em + 2px); background-size: 4px 4px; background-repeat: no-repeat; appearance: none; text-indent: 1px;">
                                        ${hiddehtml}
                                        </select>`; 
                            });
                            if($('a[href*="'+handle+'"]').parents(eoProductSelector).find('.eosh_prod-card').length == 0){
                                $('a[href*="'+handle+'"]').parents(eoProductSelector).find(eoCart).append(hidden);
                            }                                                                   
                            var labelDropDown1 = null;
                            var dropDown1 = [];
                            var labelDropDown2 = null;
                            var dropDown2 = [];
                            var labelDropDown3 = null;
                            var dropDown3 = [];
                        
                            $.each(headoption, function(key,variantName){
                                if (key == 0) {
                                    labelDropDown1 = variantName.name;
                                    $.each(variantName.values, function(id,variantValue){
                                        console.log(variantValue);
                                        dropDown1.push(variantValue);
                                    });
                                    let html = ``;
                                    for (var x  of dropDown1) {
                                        var y=  x;
                                        if (y =='Default Title'){
                                            return false;
                                        }
                                        x=  x.replace(/\s/g, '')
                                        html+= `<option value=${x}>${y}</option>`;
                                    }
                                    var dataselect =`<div id="labelDropDown1" class="labeldropdown1">${labelDropDown1}</div>
                                    <select  id="eosh-dropdown1" class="eosh-dropdown1">
                                        ${html} 
                                    </select>`; 
                                
                                } else if (key == 1) {
                                    labelDropDown2 = variantName.name;
                                    $.each(variantName.values,function (id, variantValue) {
                                        dropDown2.push(variantValue);
                                    });
                                    let html1 = ``;
                                    for (var x  of dropDown2) {
                                            var y=  x;
                                            x=  x.replace(/\s/g, '')
                                        html1+= `<option value=${x}>${y}</option>`;
                                    }
                                    var dataselect =`<div id="" class="labeldropdown2">${labelDropDown2}</div>
                                    <select  id="eosh-dropdown2" class="eosh-dropdown2">
                                        ${html1};
                                    </select>`;
                                }else {
                                    labelDropDown3 = variantName.name;
                                    $.each(variantName.values,function (id, variantValue) {
                                            dropDown3.push(variantValue);
                                        });
                                    let html2 = ``;
                                    for (var x  of dropDown3) {
                                        var y=  x;
                                        html2+= `<option  value="${x}">${y}</option>`;
                                    }
                                    var dataselect =`
                                    <div class="labeldropdown3" >${labelDropDown3}</div>
                                    <select  id="eosh-dropdown3" class="eosh-dropdown3">
                                        ${html2}
                                    </select>`;
                                } 
                                if(settingdata.show_hide_varsize_color == 1){
                                    if($('a[href*="'+handle+'"]').parents(eoProductSelector).find('.eosh_prod-card').length == 0){
                                        $('a[href*="'+handle+'"]').parents(eoProductSelector).find(eoCart).append(dataselect);
                                    } 
                                }   
                            });
                            selectedtitle=[];
                            var  optionvalue=[];
                        
                            $.each(allvartiants, function(key,value){
                                
                                if(settingdata.append_to_button_style == 'icon' && settingdata.select_icon_postion == 'greenicon'){
                                    var icon =`<div class="eosh_prod-card eosh_tenth">
                                                    <div class="eosh_cart-quantity">
                                                    ${settingdata.show_hide_button == 1 ? 
                                                        `<div class="eosh_quantity pointer">
                                                            <span class="eosh_down minus">
                                                                <svg width="5" height="3" viewBox="0 0 5 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path class="pluseminus" d="M0.0980001 0.844H4.598V2.338H0.0980001V0.844Z" fill="#2C2C2C"/>
                                                                </svg>                            
                                                            </span>
                                                            <span style="width:50px;border:none; text-align: center;" class="num"  min="1" name="quantity" value="1">1</span>
                                                            <span class="eosh_up plus">
                                                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path class="pluseminus" d="M9.558 5.627H5.931V9.452H4.5V5.627H0.891V4.295H4.5V0.487999H5.931V4.295H9.558V5.627Z" fill="#2C2C2C"/>
                                                                </svg>                                                      
                                                            </span>
                                                        </div>`
                                                        : ``}
                                                        <button  class="crtbtn eosh_cart-btn pointer  button-data"  id=${value.id} >
                                                            <svg width="40" height="40" viewBox="0 0 40 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path class="button-icon" d="M32.4398 15.6074C36.5391 15.6074 40 12.1911 40 8.06186C40 3.93264 36.5839 0.516357 32.4398 0.516357C28.3106 0.516357 24.8942 3.93264 24.8942 8.06186C24.8942 12.2208 28.3106 15.6074 32.4398 15.6074ZM12.0758 24.8759H29.4097C29.9889 24.8759 30.4939 24.4006 30.4939 23.7619C30.4939 23.1232 29.9889 22.6479 29.4097 22.6479H12.3283C11.4816 22.6479 10.9618 22.0537 10.8281 21.1477L10.6053 19.5881H29.4395C30.9842 19.5881 31.9792 18.9345 32.5439 17.6571C31.2662 17.6571 30.0631 17.4046 28.9491 16.9145C28.7265 17.2116 28.4441 17.3452 28.0284 17.3452L10.2636 17.3601L9.00114 8.74514H22.9039C22.8296 8.06186 22.8741 7.17064 22.9781 6.50229H8.67436L8.407 4.61593C8.24364 3.47214 7.84257 2.89293 6.32757 2.89293H1.09914C0.505 2.89293 0 3.41279 0 4.00693C0 4.61593 0.505 5.13579 1.09914 5.13579H6.11957L8.49614 21.4448C8.808 23.5539 9.92207 24.8759 12.0758 24.8759ZM32.4547 12.9635C31.9349 12.9635 31.4743 12.607 31.4743 12.0574V8.96793H28.6374C28.1324 8.96793 27.7311 8.55207 27.7311 8.06186C27.7311 7.57171 28.1324 7.15579 28.6374 7.15579H31.4743V4.08121C31.4743 3.51671 31.9349 3.16029 32.4547 3.16029C32.9746 3.16029 33.4199 3.51671 33.4199 4.08121V7.15579H36.2571C36.7621 7.15579 37.178 7.57171 37.178 8.06186C37.178 8.55207 36.7621 8.96793 36.2571 8.96793H33.4199V12.0574C33.4199 12.607 32.9746 12.9635 32.4547 12.9635ZM13.2492 32.0946C14.586 32.0946 15.6554 31.04 15.6554 29.6884C15.6554 28.3516 14.586 27.2821 13.2492 27.2821C11.8975 27.2821 10.8429 28.3516 10.8429 29.6884C10.8429 31.04 11.8975 32.0946 13.2492 32.0946ZM27.1519 32.0946C28.4889 32.0946 29.5581 31.04 29.5581 29.6884C29.5581 28.3516 28.4889 27.2821 27.1519 27.2821C25.8003 27.2821 24.716 28.3516 24.716 29.6884C24.716 31.04 25.8003 32.0946 27.1519 32.0946Z" fill="#00B35D"/>
                                                            </svg>  
                                                        </button>
                                                    </div>
                                            </div>
                                                <div class="showdata" style="display:block; display: flex; justify-content: center; align-items: center;">
                                                    <p class="errorMessage"></p> 
                                                </div> `;
                                }else if(settingdata.append_to_button_style == 'icon' &&  settingdata.select_icon_postion == 'squarepluseicon'){
                                    var icon =`
                                    <div class="eosh_prod-card eosh_fifth">
                                        <div class="eosh_cart-quantity">
                                        ${settingdata.show_hide_button == 1 ? 
                                            `<div class="eosh_quantity">
                                                <span class="eosh_down minus">
                                                    <svg width="5" height="3" viewBox="0 0 5 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path class="pluseminus" d="M0.0980001 0.844H4.598V2.338H0.0980001V0.844Z" fill="#2C2C2C"/>
                                                    </svg>                            
                                                </span>
                                                <span style="width:50px;border:none; text-align: center;" class="num"  min="1" name="quantity" value="1">1</span>
                                                <span class="eosh_up plus">
                                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path class="pluseminus" d="M9.558 5.627H5.931V9.452H4.5V5.627H0.891V4.295H4.5V0.487999H5.931V4.295H9.558V5.627Z" fill="#2C2C2C"/>
                                                    </svg>                                                      
                                                </span>
                                            </div>`
                                            : ``}
                                            <button class="crtbtn  eosh_cart-btn" id=${value.id}>
                                                <svg width="24" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path class="button-icon" d="M12.808 0.207936V11.0319H23.152V12.7839H12.808V23.6559H10.936V12.7839H0.616V11.0319H10.936V0.207936H12.808Z" fill="white"/>
                                                    </svg>                        
                                            </button>
                                        </div>
                                    </div>
                                    <div class="showdata" style="display:block; display: flex; justify-content: center; align-items: center;">
                                        <p class="errorMessage"></p> 
                                    </div> 
                                `;
                                }else if(settingdata.append_to_button_style == 'icon' &&  settingdata.select_icon_postion == 'roundpluseicon'){
                                    var icon =`<div class="eosh_prod-card eosh_sixth">
                                                <div class="eosh_price-quantity">
                                                ${settingdata.show_hide_button == 1 ? 
                                                    `<div class="eosh_quantity pointer">
                                                        <span class="eosh_down minus">
                                                            <svg width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path class="pluseminus" d="M5 6.49999C4.93442 6.50079 4.86941 6.48786 4.80913 6.46202C4.74885 6.43619 4.69465 6.39803 4.65 6.34999L0.15 1.84999C-0.05 1.64999 -0.05 1.33999 0.15 1.13999C0.35 0.93999 0.66 0.93999 0.86 1.13999L5.01 5.28999L9.15 1.14999C9.35 0.94999 9.66 0.94999 9.86 1.14999C10.06 1.34999 10.06 1.65999 9.86 1.85999L5.36 6.35999C5.26 6.45999 5.13 6.50999 5.01 6.50999L5 6.49999Z" fill="#2C2C2C"/>
                                                            </svg>                            
                                                        </span>
                                                        <span style="width:50px;border:none; text-align: center;" class="num"  min="1" name="quantity" value="1">1</span>
                                                        <span class="eosh_up plus">
                                                            <svg width="16" height="7" viewBox="0 0 16 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path class="pluseminus" d="M7.98999 1.00001C7.92441 0.99921 7.8594 1.01214 7.79912 1.03798C7.73884 1.06381 7.68464 1.10197 7.63999 1.15001L3.13999 5.65001C2.93999 5.85001 2.93999 6.16001 3.13999 6.36001C3.33999 6.56001 3.64999 6.56001 3.84999 6.36001L7.99999 2.21001L12.14 6.35001C12.34 6.55001 12.65 6.55001 12.85 6.35001C13.05 6.15001 13.05 5.84001 12.85 5.64001L8.34999 1.14001C8.24999 1.04001 8.11999 0.990009 7.99999 0.990009L7.98999 1.00001Z" fill="#2C2C2C"/>
                                                            </svg>                                                        
                                                        </span>
                                                    </div>`
                                                    : ``}
                                                    <button class="crtbtn  eosh_cart-btn" id=${value.id}>
                                                            <svg width="24" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path class="button-icon" d="M12.808 0.207936V11.0319H23.152V12.7839H12.808V23.6559H10.936V12.7839H0.616V11.0319H10.936V0.207936H12.808Z" fill="white"/>
                                                            </svg>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="showdata" style="display:block; display: flex; justify-content: center; align-items: center;">
                                                <p class="errorMessage"></p> 
                                            </div>  
                                            `;     
                                }else if(settingdata.append_to_button_style == 'icon' &&  settingdata.select_icon_postion == 'blackicon'){
                                    var icon =` <div class="eosh_prod-card eosh_ninth" style="z-index:1000; position:relative;">
                                                    <div class="eosh_price-quantity">
                                                        <div class="eosh_quantity-cart">
                                                        ${settingdata.show_hide_button == 1 ?   
                                                            `<div class="eosh_quantity pointer">
                                                                <span class="eosh_down minus">
                                                                    <svg width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path class="pluseminus" d="M5 6.49999C4.93442 6.50079 4.86941 6.48786 4.80913 6.46202C4.74885 6.43619 4.69465 6.39803 4.65 6.34999L0.15 1.84999C-0.05 1.64999 -0.05 1.33999 0.15 1.13999C0.35 0.93999 0.66 0.93999 0.86 1.13999L5.01 5.28999L9.15 1.14999C9.35 0.94999 9.66 0.94999 9.86 1.14999C10.06 1.34999 10.06 1.65999 9.86 1.85999L5.36 6.35999C5.26 6.45999 5.13 6.50999 5.01 6.50999L5 6.49999Z" fill="#2C2C2C"/>
                                                                    </svg>                            
                                                                </span>
                                                                <span style="width:50px;border:none; text-align: center;" class="num"  min="1" name="quantity" value="1">1</span>
                                                                <span class="eosh_up plus">
                                                                    <svg width="16" height="7" viewBox="0 0 16 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path class="pluseminus" d="M7.98999 1.00001C7.92441 0.99921 7.8594 1.01214 7.79912 1.03798C7.73884 1.06381 7.68464 1.10197 7.63999 1.15001L3.13999 5.65001C2.93999 5.85001 2.93999 6.16001 3.13999 6.36001C3.33999 6.56001 3.64999 6.56001 3.84999 6.36001L7.99999 2.21001L12.14 6.35001C12.34 6.55001 12.65 6.55001 12.85 6.35001C13.05 6.15001 13.05 5.84001 12.85 5.64001L8.34999 1.14001C8.24999 1.04001 8.11999 0.990009 7.99999 0.990009L7.98999 1.00001Z" fill="#2C2C2C"/>
                                                                    </svg>                                                        
                                                                </span>
                                                            </div>`
                                                            : ``}
                                                            <button  class="crtbtn pointer eosh_cart-btn" id=${value.id}>
                                                                <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path class="button-icon" d="M28.6352 7.58871C28.5384 7.47287 28.4174 7.3797 28.2806 7.31577C28.1438 7.25185 27.9947 7.21873 27.8438 7.21875H7.04859L6.41824 3.75633C6.3319 3.2811 6.08151 2.85124 5.71073 2.5417C5.33994 2.23216 4.87227 2.06257 4.38926 2.0625H2.0625C1.789 2.0625 1.52669 2.17115 1.3333 2.36455C1.1399 2.55794 1.03125 2.82025 1.03125 3.09375C1.03125 3.36725 1.1399 3.62956 1.3333 3.82295C1.52669 4.01635 1.789 4.125 2.0625 4.125H4.38281L7.67766 22.2093C7.77471 22.7456 8.01173 23.2468 8.36473 23.662C7.87752 24.1171 7.52587 24.6982 7.34876 25.3409C7.17166 25.9836 7.17602 26.6628 7.36136 27.3032C7.5467 27.9436 7.90579 28.5202 8.39879 28.9689C8.8918 29.4177 9.49946 29.7212 10.1544 29.8457C10.8094 29.9702 11.486 29.9108 12.1093 29.6743C12.7325 29.4377 13.2781 29.0331 13.6855 28.5054C14.0929 27.9777 14.3462 27.3474 14.4172 26.6846C14.4883 26.0217 14.3744 25.3521 14.0882 24.75H19.9431C19.7124 25.233 19.593 25.7616 19.5938 26.2969C19.5938 27.0107 19.8054 27.7086 20.202 28.3021C20.5986 28.8957 21.1624 29.3583 21.8219 29.6315C22.4814 29.9047 23.2071 29.9762 23.9073 29.8369C24.6074 29.6976 25.2506 29.3539 25.7553 28.8491C26.2601 28.3443 26.6039 27.7012 26.7432 27.001C26.8824 26.3009 26.8109 25.5752 26.5378 24.9156C26.2646 24.2561 25.8019 23.6924 25.2084 23.2958C24.6148 22.8992 23.917 22.6875 23.2031 22.6875H10.7211C10.4796 22.6875 10.2458 22.6027 10.0604 22.4479C9.87501 22.2931 9.74981 22.0782 9.70664 21.8406L9.29801 19.5938H24.2511C24.9757 19.5936 25.6772 19.3393 26.2333 18.875C26.7895 18.4106 27.1651 17.7659 27.2946 17.053L28.8621 8.43434C28.8886 8.28537 28.8821 8.13239 28.8429 7.98625C28.8037 7.84011 28.7328 7.70439 28.6352 7.58871ZM23.2031 24.75C23.5091 24.75 23.8081 24.8407 24.0625 25.0107C24.3169 25.1807 24.5152 25.4223 24.6323 25.7049C24.7493 25.9876 24.78 26.2986 24.7203 26.5987C24.6606 26.8987 24.5133 27.1743 24.2969 27.3907C24.0806 27.607 23.805 27.7543 23.5049 27.814C23.2048 27.8737 22.8938 27.8431 22.6112 27.726C22.3285 27.6089 22.0869 27.4107 21.9169 27.1563C21.747 26.9019 21.6563 26.6028 21.6563 26.2969C21.6563 25.8866 21.8192 25.4932 22.1093 25.2031C22.3994 24.913 22.7929 24.75 23.2031 24.75ZM10.8281 24.75C11.1341 24.75 11.4331 24.8407 11.6875 25.0107C11.9419 25.1807 12.1402 25.4223 12.2573 25.7049C12.3743 25.9876 12.405 26.2986 12.3453 26.5987C12.2856 26.8987 12.1383 27.1743 11.9219 27.3907C11.7056 27.607 11.43 27.7543 11.1299 27.814C10.8298 27.8737 10.5188 27.8431 10.2362 27.726C9.95351 27.6089 9.71192 27.4107 9.54195 27.1563C9.37197 26.9019 9.28125 26.6028 9.28125 26.2969C9.28125 25.8866 9.44422 25.4932 9.73432 25.2031C10.0244 24.913 10.4179 24.75 10.8281 24.75Z" fill="white"/>
                                                                </svg>                            
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="showdata" style="display:block; display: flex; justify-content: center; align-items: center;">
                                                    <p class="errorMessage"></p> 
                                                </div>  
                                    `;
                                }else if(settingdata.append_to_button_style == 'icon' &&  settingdata.select_icon_postion == 'whiteicon'){
                                    var icon =`<div class="eosh_prod-card eosh_eight"> 
                                                    ${settingdata.show_hide_button == 1 ? 
                                                    `<div class="eosh_quantity pointer">
                                                            <span class="eosh_down minus">
                                                                <svg width="5" height="3" viewBox="0 0 5 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path class="pluseminus" d="M0.0980001 0.844H4.598V2.338H0.0980001V0.844Z" fill="#2C2C2C"/>
                                                                </svg>                            
                                                            </span>
                                                            <span style="width:50px;border:none; text-align: center;" class="num"  min="1" name="quantity" value="1">1</span>
                                                            <span class="eosh_up plus">
                                                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path class="pluseminus" d="M9.558 5.627H5.931V9.452H4.5V5.627H0.891V4.295H4.5V0.487999H5.931V4.295H9.558V5.627Z" fill="#2C2C2C"/>
                                                                    </svg>                                                        
                                                            </span>
                                                    </div>`
                                                    : ``}
                                                    <button class="crtbtn eosh_cart-btn pointer" id=${value.id}>
                                                        <svg width="45" height="40" viewBox="0 0 43 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path class="button-icon"  d="M36.3564 0.275024C32.886 0.275024 30.0593 3.10173 30.0593 6.57214C30.0593 10.0426 32.886 12.8693 36.3564 12.8693C39.8268 12.8693 42.6535 10.0426 42.6535 6.57214C42.6535 3.10173 39.8268 0.275024 36.3564 0.275024ZM36.3564 1.67438C39.0711 1.67438 41.2541 3.85738 41.2541 6.57214C41.2541 9.2869 39.0711 11.4699 36.3564 11.4699C33.6416 11.4699 31.4586 9.2869 31.4586 6.57214C31.4586 3.85738 33.6416 1.67438 36.3564 1.67438ZM36.3564 3.07374C35.9688 3.07374 35.6567 3.3858 35.6567 3.77342V5.87246H33.5577C33.1701 5.87246 32.858 6.18452 32.858 6.57214C32.858 6.95976 33.1701 7.27182 33.5577 7.27182H35.6567V9.37086C35.6567 9.75848 35.9688 10.0705 36.3564 10.0705C36.744 10.0705 37.0561 9.75848 37.0561 9.37086V7.27182H39.1551C39.5427 7.27182 39.8548 6.95976 39.8548 6.57214C39.8548 6.18452 39.5427 5.87246 39.1551 5.87246H37.0561V3.77342C37.0561 3.3858 36.744 3.07374 36.3564 3.07374ZM15.366 18.4667H33.5577C33.9453 18.4667 34.2574 18.7787 34.2574 19.1664C34.2574 19.554 33.9453 19.8661 33.5577 19.8661H15.366C14.9784 19.8661 14.6663 19.554 14.6663 19.1664C14.6663 18.7787 14.9784 18.4667 15.366 18.4667ZM13.9667 12.8693H30.759C31.1466 12.8693 31.4586 13.1813 31.4586 13.5689C31.4586 13.9566 31.1466 14.2686 30.759 14.2686H13.9667C13.579 14.2686 13.267 13.9566 13.267 13.5689C13.267 13.1813 13.579 12.8693 13.9667 12.8693ZM30.759 26.8628C28.8348 26.8628 27.2606 28.4371 27.2606 30.3612C27.2606 32.2854 28.8348 33.8596 30.759 33.8596C32.6831 33.8596 34.2574 32.2854 34.2574 30.3612C34.2574 28.4371 32.6831 26.8628 30.759 26.8628ZM30.759 28.2622C31.926 28.2622 32.858 29.1942 32.858 30.3612C32.858 31.5283 31.926 32.4603 30.759 32.4603C29.5919 32.4603 28.6599 31.5283 28.6599 30.3612C28.6599 29.1942 29.5919 28.2622 30.759 28.2622ZM16.7654 26.8628C14.8413 26.8628 13.267 28.4371 13.267 30.3612C13.267 32.2854 14.8413 33.8596 16.7654 33.8596C18.6895 33.8596 20.2638 32.2854 20.2638 30.3612C20.2638 28.4371 18.6895 26.8628 16.7654 26.8628ZM16.7654 28.2622C17.9324 28.2622 18.8644 29.1942 18.8644 30.3612C18.8644 31.5283 17.9324 32.4603 16.7654 32.4603C15.5983 32.4603 14.6663 31.5283 14.6663 30.3612C14.6663 29.1942 15.5983 28.2622 16.7654 28.2622ZM1.38361 1.67438C0.446043 1.67438 0.436248 3.07374 1.38361 3.07374H6.41011C6.51366 3.57051 7.3057 7.34878 8.24887 11.7917C8.74984 14.1511 9.26201 16.558 9.67342 18.4611C10.0834 20.3642 10.3801 21.7174 10.4962 22.1456C10.681 22.8369 10.8545 23.6219 11.3638 24.3062C11.8704 24.9891 12.7632 25.4621 13.9667 25.4621H33.5465C34.7499 25.4621 35.6427 24.9891 36.1521 24.3062C36.6601 23.6205 36.8322 22.8369 37.0197 22.1442C37.1414 21.6796 37.3331 20.6007 37.5934 19.2475C37.8495 17.8902 38.1532 16.3187 38.433 15.1236C38.6639 14.2658 37.2352 13.8922 37.0729 14.8074C36.7846 16.0444 36.4753 17.6229 36.2165 18.9831C35.9576 20.3446 35.7309 21.5467 35.6679 21.7818C35.4776 22.4898 35.2999 23.1042 35.0284 23.4694C34.7569 23.836 34.4407 24.0627 33.5479 24.0627H13.9667C13.0739 24.0627 12.7576 23.836 12.4833 23.4694C12.2133 23.1056 12.0355 22.4899 11.8452 21.7832C11.7753 21.5131 11.4534 20.0662 11.042 18.1658C10.632 16.2655 10.1184 13.8614 9.61884 11.4993C8.6169 6.77925 7.65974 2.22993 7.65974 2.22993C7.59257 1.90808 7.3071 1.67578 6.97405 1.67578L1.38361 1.67438ZM12.5701 7.27182C11.6395 7.27182 11.6507 8.67118 12.5701 8.67118H26.5525C27.4929 8.67118 27.4719 7.27182 26.5525 7.27182H12.5701Z" fill="#2C2C2C"/>
                                                        </svg>                    
                                                    </button>
                                                </div>
                                                <div class="showdata" style="display:block; display: flex; justify-content: center; align-items: center;">
                                                    <p class="errorMessage"></p> 
                                                </div> `;  
                                }else if( settingdata.append_to_button_style == 'button' && settingdata.select_button_style == 'rounded'){
                                    var btn =`        
                                    <div class="eosh_prod-card eosh_fourth" style="z-index:1000; position:relative;"> 
                                        <div class="eosh_cart-quantity">
                                        ${settingdata.show_hide_button == 1 ? 
                                            `<div class="eosh_quantity pointer">
                                                <span class="eosh_down minus">
                                                    <svg width="5" height="3" viewBox="0 0 5 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path class="pluseminus" d="M0.0980001 0.844H4.598V2.338H0.0980001V0.844Z" fill="#2C2C2C"/>
                                                    </svg> 
                                                </span>
                                                <span style="width:50px;border:none; text-align: center;" class="num"  min="1" name="quantity" value="1">1</span>
                                                <span class="eosh_up plus">  
                                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path class="pluseminus" d="M9.558 5.627H5.931V9.452H4.5V5.627H0.891V4.295H4.5V0.487999H5.931V4.295H9.558V5.627Z" fill="#2C2C2C"/>
                                                    </svg>                                                   
                                                </span>
                                            </div>`
                                            : ``}
                                            ${domain === '3f1992-3a.myshopify.com' ? 
                                            `` : 
                                            `<button class="crtbtn rounded eosh_cart-btn pointer" id=${value.id}>
                                                <span class="change-text-color">${settingdata.custom_text}</span>
                                            </button>`
                                            }
                                        </div>
                                    </div> 

                                    <div class="showdata" style="display:block; display: flex; justify-content: center; align-items: center;">
                                        <p class="errorMessage"></p> 
                                    </div>  
                                    `;
                                }else if( settingdata.append_to_button_style == 'button' && settingdata.select_button_style == 'square'){
                                    var btn =`
                                                <div class="eosh_prod-card eosh_third" style="z-index:1;position:relative;">
                                                    <div class="eosh_cart-quantity pointer">
                                                    ${settingdata.show_hide_button == 1 ? 
                                                        `<div class="eosh_quantity">
                                                            <span class="eosh_down minus">
                                                                <svg width="8" height="10" viewBox="0 0 5 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path class="pluseminus" d="M0.0980001 0.844H4.598V2.338H0.0980001V0.844Z" fill="#2C2C2C"/>
                                                                </svg>                            
                                                            </span>
                                                            <span  class="num"  min="1" name="quantity" value="1">1</span>
                                                            <span class="eosh_up plus">
                                                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path class="pluseminus" d="M9.558 5.627H5.931V9.452H4.5V5.627H0.891V4.295H4.5V0.487999H5.931V4.295H9.558V5.627Z" fill="#2C2C2C"/>
                                                                </svg>                                                       
                                                            </span>
                                                        </div>`
                                                        : ``}
                                                        <button  style="" class="crtbtn square eosh_cart-btn pointer" id=${value.id}><span class="change-text-color">${settingdata.custom_text}</span></button>
                                                    </div>
                                                </div>
                                    `;
                                }  
                                if(domain === '3f1992-3a.myshopify.com'){
                                    if($('a[href*="'+handle+'"]').parents(eoProductSelector).find('.eosh_prod-card').length == 0){
                                        $('a[href*="'+handle+'"]').parents(eoProductSelector).find(eoCart).append(btn,icon);
                                    }
                                }
                                else if(domain === 'noovesnails.myshopify.com'){
                                    if($('a[href="/products/'+handle+'"]').parents(eoProductSelector).find('.eosh_prod-card').length == 0){
                                        $('a[href="/products/'+handle+'"]').parents(eoProductSelector).find(eoCart).after(btn,icon);
                                    } 
                                }
                                else if(domain === 'mfr21f-0d.myshopify.com'){
                                    if($('a[href="/products/'+handle+'"]').parents(eoProductSelector).first().find('.eosh_prod-card').length == 0){
                                        $('a[href="/products/'+handle+'"]').parents(eoProductSelector).first().find(eoCart).after(btn,icon);
                                    } 
                                }
                                else {
                                    if($('a[href="/products/'+handle+'"]').parents(eoProductSelector).find('.eosh_prod-card').length == 0){
                                        $('a[href="/products/'+handle+'"]').parents(eoProductSelector).find(eoCart).append(btn,icon);
                                    }
                                }
                                return false;
                            });

                            $('.rounded').css("background-color", `${settingdata.custom_button_color}`);
                            $('button .change-text-color').css("color", `${settingdata.custom_text_color}`);
                            $('.eosh_down ').css("background-color",`${settingdata.custom_quantity_color}`);
                            $('.eosh_up').css("background-color", `${settingdata.custom_quantity_color}`);
                            $('.square').css("background-color", `${settingdata.custom_button_color}`);
                            $('svg path.button-icon').css("fill", `${settingdata.custom_button_color}`);
                            $('svg path.pluseminus').css("fill", `${settingdata.custom_puls_minus_color}`);

                            $('.eosh-dropdown1').on('change', function() {
                                var  variantIds=[];
                                let  dropdownval1 = $(this).val();
                        
                                let  dropdownval2 = $(this).parent().find('#eosh-dropdown2').val();
                                if (dropdownval2 === undefined ) {
                                    dropdownval2 = '';
                                }
                                let  dropdownval3 = $(this).parent().find('#eosh-dropdown3').val();
                                if (dropdownval3 === undefined ) {
                                    dropdownval3 = '';
                                }
                                let selectedtitle =  dropdownval1.concat('/'+dropdownval2+'/'+dropdownval3); 
                            
                                var selectedtitle1 = selectedtitle.replace(/\/$/, '')
                                selectedtitle  = selectedtitle1.replace(/\/$/, '')
                                $(this).parent().find('#eosh-hiddenDropDown option').filter(function() {
                                    optionvalue = $(this).text().replaceAll(/ /g,'');
                                    if(optionvalue == selectedtitle){
                                        variantIds  = $(this).val();
                                    }
                                    else{
                                        var messageError = 'product is  unavailable';
                                    }
                                });
                                $(this).parent().find('.eosh_cart-btn').attr('id',variantIds);
                            });
                            $('.eosh-dropdown2').on('change', function() {
                                var  variantIds=[];
                                let  dropdownval2 = $(this).val();
                                let  dropdownval1 = $(this).parent().find('#eosh-dropdown1').val();
                                let dropdownval3 = $(this).parent().find('#eosh-dropdown3').val();
                                if (dropdownval3 === undefined ) {
                                    dropdownval3 = '';
                                }
                                var selectedtitle =dropdownval1.concat('/'+dropdownval2+'/'+dropdownval3); 
                                optionvalue = $(this).text();
                                optionvalue =    optionvalue.replace(/\/$/, '');
                                selectedtitle =  selectedtitle.replace(/\/$/, '');                    
                                $(this).parent().find('#eosh-hiddenDropDown option').filter(function() {
                                    optionvalue = $(this).text();
                                    if(optionvalue == selectedtitle){
                                        variantIds  = $(this).val();
                                    }
                                });
                                $(this).parent().find('.eosh_cart-btn').attr('id',variantIds);
                            }); 

                            $(document).ready(function() {
                                $('.ProductItem .ProductItem__Title a').css({
                                    'display': '-webkit-box',
                                    '-webkit-box-orient': 'vertical',
                                    'overflow': 'hidden',
                                    '-webkit-line-clamp': '2',
                                    'white-space': 'normal'
                                });
                            });  
                    }
                }  
            }

            if(domain === 'noovesnails.myshopify.com'){
                var find = $('.change-text-color');
                $(eoProductSelector).find(find).addClass("Button Button--primary");
                if(meta.page.pageType === "home"){
                    $('.flickity-viewport:eq(1)')[0].style.height='750px';
                }
            }  
            
            async function getFilteredPage(page=1) {
                getPageUrl = location.href;
                try {
                        const res = await fetch(getPageUrl);
                        const resText = await res.text();
                        const parser = new DOMParser();
                        const filteredDom = parser.parseFromString(resText, 'text/html');
                        var scrTag = filteredDom.getElementById("eosh-script");
                        var addToCart = new Function(scrTag.innerText);
                        addToCart();
                        loadScript('https://code.jquery.com/jquery-3.5.1.min.js', function() {
                            jQuery = jQuery.noConflict(true);
                            init(jQuery);
                            handleBtns();
                        });

                } catch (error) {
                    console.log('Error fetching filtered page:', error);
                }
            }
            
            var filterSelectors = [ '.ProductItem','#Collection-template--16284261482662__main-main', '.product-list-container', '.product-grid-container','div#ProductGridContainer','product-list', '.shopify-section--main-collection', '#main-collection-product-grid','#root'].join(','); 
            var observerConfig = {
                childList: true,
                subtree: false,
                attributes: false,
                characterData: false
            };
            // var targetNode = document.body;
            var observer = new MutationObserver(function(mutationsList, observer) {
                    for (var mutation of mutationsList) {
                        if (mutation.type === 'childList') {
                            if (mutation.target.matches(filterSelectors) || mutation.target.closest(filterSelectors)) {
                                getFilteredPage();
                                break;
                            }
                        }
                    }
                }
            );
            observer.observe(document.querySelector(filterSelectors), observerConfig);


            function windowScroll() {   
                window.scroll({
                    top: 0,
                    left: 0,
                    behavior: "smooth",
                });
            }

            function updateQty(item,pointer){
                $.ajax({
                    type: "POST",
                    url: "/cart/add.js",
                    data: {
                        items: item,
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        //location.href = "/cart";
                    var  messgaeshow ='';
                    var checkhandle = response.items[0].handle;
                    if(checkhandle !=''){

                        if(domain === 'noovesnails.myshopify.com'){
                            messgaeshow ='Producto añadido al carrito'; 
                        }else{
                            messgaeshow ='product is added to your cart'; 
                        }

                            windowScroll();
                            $("body").addClass("intro");
                            $('.intro').append(`<p style="position: absolute;z-index: 1111; left: auto; right: auto; width: 100%;text-align: center;background: green;padding: 0px; top: 0;margin-top: 0;">${messgaeshow}</p>`);
                            $('.intro').show();
                            window.setTimeout(function(){
                            $('p').hide();
                            },3000);
                        }
                        location.reload();
                        // testCartDrawer();
                        location.href = "/checkout";
                    },
                    error: function (data, status, error) {
                        responsedata =data.responseJSON;
                        if(responsedata.status == 422 || responsedata.status == 'bad_request' ){
                            // var Errormessage = responsedata.description;
                            var Errormessage = responsedata.message;
                            if(Errormessage =='Cart Error'){
                                Errormessage ='product is already sold out';
                            }
                            if(Errormessage =='Parameter Missing or Invalid'){
                                Errormessage ='product is unavailable';
                            }
                            windowScroll();
                            $("body").addClass("intro");
                            $('.intro').append(`<p style="position: absolute;z-index: 1111;left: auto;right: auto;width: 100%;text-align: center;background: red;padding: 0px;top: 0;margin-top: 0;">${Errormessage}</p>`);
                            setTimeout(function () {
                                $('p').hide();
                            }, 3000);
                        }  
                        
                    }
                });
            }

            if (domain == 'faacad-2.myshopify.com') {
                const target = document.querySelector(".products.nt_products_holder");
                const observer = new MutationObserver(function(mutationList) {
                    init();
                });
                observer.observe(target, {childList: true, subtree: false, attributes: false});
            }
        }
    };

    if ((typeof jQuery === 'undefined') || (parseFloat(jQuery.fn.jquery) < 1.7)) {
        loadScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', function(){
        jQuery191 = jQuery.noConflict(true);
        myAppJavaScript(jQuery191);
        });
    } else {
        myAppJavaScript(jQuery);
    }     
});
               






















