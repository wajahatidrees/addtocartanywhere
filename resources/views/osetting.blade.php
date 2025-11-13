@extends('shopify-app::layouts.default')
@section('content')

        @section('styles')
            <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
        @endsection

        @section('scripts')
            <script src="{{ asset('js/select2.min.js' )}}" defer></script>
            <script src="{{ asset('js/setting.js' )}}" defer></script>
        @endsection
    
        <section></section>

        <section class="full-width">  
            <article>         
                <div  class="columns seven">
                    <a class="button" href="{{ custom_route('home') }}">Back</a>  
                  
                    <a class="button secondary" href="{{ custom_route('billing.index') }}"><i style="" class="icon-addition append-spacing"></i><span>Choose Billing</span></a>        
                    <a class="link" style="padding-right: 10px;" target="_blank" href="https://support.extendons.com/">Get Support</a>
                </div>
                <div class="columns five">  
                    <div class="align-right" >
                   
                </div>
            </article>
        </section>   
       
        <input type="hidden" data-host ="{{app('request')->input('host')}}">


        <section class="full-width success-message default-hidden">
            <article>
                <div class="columns twelve">
                    <div class="alert success">
                        <dl>
                            <dt>Success Alert</dt>
                            <dd class="sm-content">Setting  added successfully!</dd>
                        </dl>
                    </div>
                </div>
            </article>
        </section>
        
        <section class="full-width update-message default-hidden">
            <article>
                <div class="columns twelve">
                    <div class="alert success">
                        <dl>
                            <dt>Success Alert</dt>
                            <dd class="sm-content">Rule Updated Successfully!</dd>
                        </dl>
                    </div>
                </div>
            </article>
        </section>
        
                 
        {!! html()->form()->id('add-setting')->open() !!}
            
            <section>
            </section>
        
            <h2> hello </h2>

            <section class="full-width">
                <aside  class="columns four">
                    <div style="margin-top:10px">
                        <h4>Enable App Functionality</h4>
                        <p>Here you  can  enable/disable the</p>
                        <p>add  to Cart app Functionality</p>
                    </div>
                </aside>
                <article class="columns eight">
                    <div class="card columns eight">
                        <label class="switch">
                                @if(isset($settingdata['enable_app']) &&  $settingdata['enable_app'] == 1 )
                                   
                                    {{ html()->checkbox('enable_app')->value(1)->checked()->id('enable_id') }}
                                @elseif(isset($settingdata['enable_app']) && $settingdata['enable_app'] == 0 )
                                 
                                    {{ html()->checkbox('enable_app')->value('0')->checked(false)->id('enable_id') }}
                                @else
                                   
                                    {{ html()->checkbox('enable_app', false, '0')->id('enable_id') }}
                                @endif
                                <span class="slider round">
                                </span>
                        </label>
                    </div>
                </article>
            </section>

            <section class="full-width">
                <aside class="columns four">
                    <div style="margin-top:10px">
                        <h4>Display Quantity Selector Button</h4>
                        <p>Click here and enable  quantity selector button on all pages</p>
                    </div>
                </aside>
                <article class="columns eight">
                    <div class="card columns eight">  
                    <label class="switch">      
                        @if(isset($settingdata['show_hide_button']) &&  $settingdata['show_hide_button'] == 1 )
                            {{ html()->checkbox('show_hide_button', true, '1')->id('button_enable_id') }}
                        @elseif(isset($settingdata['show_hide_button']) && $settingdata['show_hide_button'] == 0 )
                            {{ html()->checkbox('show_hide_button', false, '0')->id('button_enable_id') }}
                        @else
                            {{ html()->checkbox('show_hide_button', false, '0')->id('button_enable_id') }}
                        @endif
                        <span class="slider round"></span>
                    </label>
                    </div>
                </article>
            </section>

            <section class="full-width">
                <aside class="columns four">
                    <label for="icon_path">
                        <h4>Display add to cart button everywhere</h4>
                        <p>Here you can choose the add to cart button location on your store multiple pages and increase conversions rate</p>
                    </label>
                </aside>
                <article class="columns eight">
                        <div id="icons-wrapper">  

                                @if(isset($settingdata['show_widget_collection']) &&  $settingdata['show_widget_collection'] == 1 )
                                    {{ html()->checkbox('show_widget_collection', true, '1')->id('collectionpage_id') }}
                                @elseif(isset($settingdata['show_widget_collection']) && $settingdata['show_widget_collection'] == 0 )
                                    {{ html()->checkbox('show_widget_collection', false, '0')->id('collectionpage_id') }}
                                @else
                                    {{ html()->checkbox('show_widget_collection', false, '0')->id('collectionpage_id') }}
                                @endif
                        
                                <span style="margin-right:15px">Collection pages</span>
                        
                                @if(isset($settingdata['show_widget_result']) &&  $settingdata['show_widget_result'] == 1 )
                                    {{ html()->checkbox('show_widget_result', true, '1')->id('resultpage_id') }}
                                @elseif(isset($settingdata['show_widget_result']) && $settingdata['show_widget_result'] == 0 )
                                    {{ html()->checkbox('show_widget_result', false, '0')->id('resultpage_id') }}
                                @else
                                    {{ html()->checkbox('show_widget_result', false, '0')->id('resultpage_id') }}
                                @endif
                                <span>Search results page</span>
                                    
                        </div> 
                </article>        
            </section>

            <section class="full-width">
                <aside class="columns four">     
                    <h4>Display Add to Cart Button on Feature Collection</h4>
                    <p>Enable this option to display add to cart button on your homepage</p>
                </aside>
                <article class="columns eight">
                    <div class="columns seven alignment">  
                        <span style="margin-right:15px">Home page</span>

                        @if(isset($settingdata['show_widget_home']) &&  $settingdata['show_widget_home'] == 1 )
                            {{ html()->checkbox('show_widget_home', true, '1')->id('homepage_id') }}
                        @elseif(isset($settingdata['show_widget_home']) && $settingdata['show_widget_home'] == 0 )
                            {{ html()->checkbox('show_widget_home', false, '0')->id('homepage_id') }}
                        @else
                            {{ html()->checkbox('show_widget_home', false, '0')->id('homepage_id') }}
                        @endif
                    
                        {{ html()->select('featured_collections[]', $selectedCollections ?? [], array_keys($selectedCollections) ?? [])
                            ->id('featured_collection')
                            ->class('form-control product home-collection-pages')
                            ->attribute('multiple', 'multiple') }}
                    </div>
                </article>
            </section>

            <section class="full-width">
                <aside class="columns four">
                    <div style="margin-top:10px">
                        <h4>Add Multiple Button style</h4>
                        <p>Here you can select  for Add multiple style button</p>
                    </div>
                </aside>
                <article class="columns seven">
                    <div class="card columns eight">     
                        {{ html()->select('append_to_button_style', ['button' => 'Button', 'icon' => 'Icon'], $settingdata['append_to_button_style'] ?? '')->id('add_button_style') }}
                        <span class="text-danger error-text   append_to_button_style_error"></span>
                    </div>
                </article>
            </section>

            <section class="full-width">
                <aside class="columns four">
                    <div style="margin-top:10px">
                        <h4>Redirect policy</h4>
                        <p>Here you can select for </p>
                    </div>
                </aside>
                <article class="columns seven">

                    <div class=" columns eight">     
                        <div class="card">
                            <label for="redirectPolicy">
                                <select class="cbb-input" id="redirectPolicy" name="redirectPolicy">
                                    <option value="REDIRECT_TO_CART">Redirect to the cart page</option>
                                    <option value="REDIRECT_TO_PRODUCT_PAGE">Redirect to the product page</option>
                                    <option value="REDIRECT_TO_CHECKOUT" selected="selected">Redirect to checkout (skip cart)</option>
                                    <option value="REMAIN_ON_PAGE">Remain in the same page</option>
                                </select>
                            </label>
                                <p class="error-container no-display" style="display: none;">
                                <svg class="error-icon"></svg>
                                <!-- <span class="error-message"> -->
                                     <!-- Allowed text size: undefined - undefined -->
                                <!-- </span> -->
                                </p>
                            <em class="additional-information">Redirection after adding products to the shopping cart</em>
                        </div>
                        <span class="text-danger error-text   append_to_button_style_error"></span>
                    </div>

                </article>
            </section>

            <section class="full-width select-image  data-button ">
                <aside class="columns four">
                    <div style="margin-top:10px">
                        <h4>Customize Button Style</h4>
                        <p>Here you can choose button shape </p>
                    </div>
                </aside>
                <article class="columns seven">
                    <div class="card columns eight">  
                        <div class="columns  tweleve"  id="buttons-wrapper" > 
                            {{ html()->select('select_button_style', ['rounded' => 'Rounded', 'square' => 'Square'], $settingdata['select_button_style'] ?? '')->id('button_style') }}
                        </div> 
                        <span class="text-danger error-text   select_button_style_error"></span>
                    </div>
                </article>
            </section>

            <section class="full-width  data-text ">
                <aside class="columns four">
                    <div style="margin-top:10px">
                        <h4>Add Custom  Text For Button</h4>
                        <p> Here you can add custom text for add to cart button label</p>
                    </div>
                </aside>
                <article class="columns seven">
                    <div class="card columns eight">     
                        {{ html()->text('custom_text', $settingdata['custom_text'] ?? 'add to cart')->id('myInput')->class('enterInput')->attribute('maxlength', '30') }}
                    </div>
                </article>
            </section>

            <section class="full-width  data-preview ">
                <aside class="columns four">
                    <div style="margin-top:10px">
                        <h4>Button Live Preview</h4>
                        <p>Here you can watch live of customized button</p>
                    </div>
                </aside>
                <article class="columns seven">
                    <div class="card columns eight">                    
                        <div class="eosh_cart-quantity">
                                <div class="eosh_prod-card eosh_third">
                                    <div class="columns tweleve"  id="buttons-wrapper"> 
                                        @if(isset($settingdata['select_button_style'])  &&    $settingdata['select_button_style'] == 'rounded')
                                            <div class="button_0" style="display:block">
                                                <div style="text-align:center;border-radius: 50px;background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }}; border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                            </div>
                                            <div class="button_1" style="display:none">
                                                <div style="text-align:center; background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                            </div>
                                        @elseif(isset($settingdata['select_button_style']) && $settingdata['select_button_style']== 'square')
                                            <div class="button_0" style="display:none">
                                                <div style="text-align:center;border-radius: 50px;background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                            </div>
                                            <div class="button_1" style="display:block">
                                                <div style="text-align:center;background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                            </div> 
                                        @else
                                            <div class="button_0" style="display:block">
                                                    <div style="text-align:center;border-radius: 50px;background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                            </div>
                                            <div class="button_1" style="display:none">
                                                <div style="text-align:center;background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                            </div>
                                        @endif
                                    </div>    
                                </div>
                        </div>
                    </div>
                </article>
            </section>

            @if(isset($settingdata['append_to_button_style'])  &&    $settingdata['append_to_button_style'] == 'icon')
                <section class="full-width select-icon display-icons">
                    <aside class="columns four">
                        <label for="icon_path">
                            <h4>Here you can Select the icon </h4>
                            Here you can select the icon
                        </label>
                    </aside>
                    <article class="columns seven">
                        <div id="icons-wrapper"> 
                            @if(isset($settingdata['select_icon_postion']) &&  $settingdata['select_icon_postion'] == 'greenicon' )
                                <img id="buttonIcon_0" class="button secondary  icon-button selectIcon"   value="greenicon"  src="{{ asset('images/icongreen.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_1" class="button secondary  icon-button"   value="squarepluseicon"  src="{{ asset('images/plus-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_2" class="button secondary  icon-button"   value="roundpluseicon"  src="{{ asset('images/button.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_3" class="button secondary  icon-button"   value="blackicon"  src="{{ asset('images/black-cart-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_4" class="button secondary  icon-button"   value="whiteicon"  src="{{ asset('images/whiteicon.svg')}}" style="font-size:40px;">
                            @elseif(isset($settingdata['select_icon_postion']) && $settingdata['select_icon_postion'] == 'squarepluseicon' )
                                <img id="buttonIcon_0" class="button secondary  icon-button"   value="greenicon"  src="{{ asset('images/icongreen.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_1" class="button secondary  icon-button selectIcon"   value="squarepluseicon"  src="{{ asset('images/plus-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_2" class="button secondary  icon-button"   value="roundpluseicon"  src="{{ asset('images/button.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_3" class="button secondary  icon-button"   value="blackicon"  src="{{ asset('images/black-cart-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_4" class="button secondary  icon-button"   value="whiteicon"  src="{{ asset('images/whiteicon.svg')}}" style="font-size:40px;">
                            @elseif(isset($settingdata['select_icon_postion']) && $settingdata['select_icon_postion'] == 'roundpluseicon' )
                                <img id="buttonIcon_0" class="button secondary icon-button"   value="greenicon"  src="{{ asset('images/icongreen.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_1" class="button secondary  icon-button"   value="squarepluseicon"  src="{{ asset('images/plus-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_2" class="button secondary  icon-button selectIcon"   value="roundpluseicon"  src="{{ asset('images/button.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_3" class="button secondary  icon-button"   value="blackicon"  src="{{ asset('images/black-cart-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_4" class="button secondary  icon-button"   value="whiteicon"  src="{{ asset('images/whiteicon.svg')}}" style="font-size:40px;">
                            @elseif(isset($settingdata['select_icon_postion']) && $settingdata['select_icon_postion'] == 'blackicon' )
                                <img id="buttonIcon_0" class="button secondary icon-button"   value="greenicon"  src="{{ asset('images/icongreen.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_1" class="button secondary  icon-button"   value="squarepluseicon"  src="{{ asset('images/plus-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_2" class="button secondary  icon-button"   value="roundpluseicon"  src="{{ asset('images/button.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_3" class="button secondary  icon-button selectIcon"   value="blackicon"  src="{{ asset('images/black-cart-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_4" class="button secondary  icon-button"   value="whiteicon"  src="{{ asset('images/whiteicon.svg')}}" style="font-size:40px;">    
                            @elseif(isset($settingdata['select_icon_postion']) && $settingdata['select_icon_postion'] == 'whiteicon' )
                                <img id="buttonIcon_0" class="button secondary icon-button"   value="greenicon"  src="{{ asset('images/icongreen.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_1" class="button secondary  icon-button"   value="squarepluseicon"  src="{{ asset('images/plus-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_2" class="button secondary  icon-button"   value="roundpluseicon"  src="{{ asset('images/button.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_3" class="button secondary  icon-button"   value="blackicon"  src="{{ asset('images/black-cart-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_4" class="button secondary  icon-button selectIcon"   value="whiteicon"  src="{{ asset('images/whiteicon.svg')}}" style="font-size:40px;">    
                            @else
                                <img id="buttonIcon_0" class="button secondary icon-button"   value="greenicon"  src="{{ asset('images/icongreen.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_1" class="button secondary  icon-button"   value="squarepluseicon"  src="{{ asset('images/plus-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_2" class="button secondary  icon-button"   value="roundpluseicon"  src="{{ asset('images/button.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_3" class="button secondary  icon-button"   value="blackicon"  src="{{ asset('images/black-cart-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_4" class="button secondary  icon-button"   value="whiteicon"  src="{{ asset('images/whiteicon.svg')}}" style="font-size:40px;">    
                            @endif  
                        </div>
                        <input type="hidden" id="icon_path" name="select_icon_postion" value="greenicon">
                    </article>        
                </section>
                
                <section class="full-width select-image display-buttons" style="display:none" >
                    <aside class="columns four">
                        <div style="margin-top:10px">
                            <h4>Customize Button Style</h4>
                            <p>Here you can choose button shape</p>
                        </div>
                    </aside>
                    <article class="columns seven">
                        <div class="card columns eight">  
                            <div class="columns twelve"  id="buttons-wrapper" > 
                                {{ html()->select('select_button_style', ['rounded' => 'rounded', 'square' => 'square'], $settingdata['select_button_style'] ?? '')->id('button_style') }}
                            </div>    
                            <span class="text-danger error-text   select_button_style_error"></span>
                        </div>
                    </article>
                </section>

                <section class="full-width custom-text" style="display:none">
                    <aside class="columns four">
                        <div style="margin-top:10px">
                            <h4>Add Custom  Text For Button</h4>
                            <p> Here you can add custom text for add to cart button label</p>
                        </div>
                    </aside>
                    <article class="columns seven">
                        <div class="card columns eight">     
                            {{ html()->text('custom_text', $settingdata['custom_text'] ?? 'add to cart')->id('myInput')->class('enterInput')->attribute('maxlength', '30') }}
                            <span class="text-danger error-text   custom_text_error"></span>
                        </div>
                    </article>
                </section>
            
                <section class="full-width button-live-preview" style="display:none">
                    <aside class="columns four">
                        <div style="margin-top:10px">
                            <h4>Button Live Preview</h4>
                            <p>Here you can watch live of customized button</p>
                        </div>
                    </aside>
                    <article class="columns seven">
                        <div class="card columns eight">                    
                            <div class="eosh_cart-quantity">
                                    <div class="eosh_prod-card eosh_third">
                                        <div class="columns tewelve"   id="buttons-wrapper"> 
                                            @if(isset($settingdata['select_button_style'])  &&    $settingdata['select_button_style'] == 'rounded')
                                                <div class="button_0" style="display:block">
                                                    <div style="text-align:center;border-radius:50px; background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                                </div>
                                                <div class="button_1" style="display:none">
                                                    <div style="text-align:center;background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                                </div>
                                            @elseif(isset($settingdata['select_button_style']) && $settingdata['select_button_style']== 'square')
                                                <div class="button_0" style="display:none">
                                                        <div style="text-align:center;border-radius: 50px;background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                                </div>
                                                <div class="button_1" style="display:block">
                                                    <div style="text-align:center;background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                                </div> 
                                            @else
                                                <div class="button_0" style="display:block">
                                                    <div style="text-align:center;border-radius: 50px;background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                                </div>
                                                <div class="button_1" style="display:none">
                                                    <div style="text-align:center;cbackground:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                                </div>
                                            @endif
                                        </div> 
                                    </div>
                            </div>
                        </div>
                    </article>
                </section>

            @elseif(isset($settingdata['append_to_button_style']) &&    $settingdata['append_to_button_style'] == 'button')
                <section class="full-width select-image display-buttons">
                    <aside class="columns four">
                        <div style="margin-top:10px">
                            <h4>Customize Button Style</h4>
                            <p>Here you can choose button shape</p>
                        </div>
                    </aside>
                    <article class="columns seven ">
                        <div class="card  columns eight">  
                            <div class="columns tweleve"  id="buttons-wrapper" > 
                                {{ html()->select('select_button_style', ['rounded' => 'rounded', 'square' => 'square'], $settingdata['select_button_style'] ?? '')->id('button_style') }}
                            </div> 
                            <span class="text-danger error-text   select_button_style_error"></span>
                        </div>
                    </article>
                </section>

                <section class="full-width custom-text">
                    <aside class="columns four">
                        <div style="margin-top:10px">
                            <h4>Add Custom  Text For Button</h4>
                            <p> Here you can add custom text for add to cart button label</p>
                        </div>
                    </aside>
                    <article class="columns seven">
                        <div class="card columns eight">     
                            {{ html()->text('custom_text', $settingdata['custom_text'] ?? 'add to cart')->id('myInput')->class('enterInput')->attribute('maxlength', '30') }}
                            <span class="text-danger error-text   custom_text_error"></span>
                        </div>
                    </article>
                </section>
            
                <section class="full-width button-live-preview">
                    <aside class="columns four">
                        <div style="margin-top:10px">
                            <h4>Button Live Preview</h4>
                            <p>Here you can watch live of customized button</p>
                        </div>
                    </aside>
                    <article class="columns seven">
                        <div class="card columns eight">                    
                            <div class="eosh_cart-quantity">
                                    <div class="eosh_prod-card eosh_third">
                                        <div class="columns tweleve"  id="buttons-wrapper"> 
                                            @if(isset($settingdata['select_button_style'])  &&    $settingdata['select_button_style'] == 'rounded')
                                                <div class="button_0" style="display:block">
                                                    <div style="text-align:center;border-radius: 50px;background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                                </div>
                                                <div class="button_1" style="display:none">
                                                    <div style="text-align:center;background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                                </div>
                                            @elseif(isset($settingdata['select_button_style']) && $settingdata['select_button_style']== 'square')
                                                <div class="button_0" style="display:none">
                                                    <div style="text-align:center;border-radius: 50px;background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                                </div>
                                                <div class="button_1" style="display:block">
                                                    <div style="text-align:center;background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                                </div> 
                                            @else
                                                <div class="button_0" style="display:block">
                                                        <div style="text-align:center;border-radius: 50px;background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>  
                                                </div>
                                                <div class="button_1" style="display:none">
                                                    <div style="text-align:center;width:100%;  background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>       
                                                </div>
                                            @endif
                                        </div>    
                                    </div>
                            </div>
                        </div>
                    </article>
                </section>

                <section class="full-width select-icon display-icons" style="display:none">
                    <aside class="columns four">
                        <label for="icon_path">
                            <h4>Here you can Select the icon </h4>
                            <p> Here you can select the icon</p>
                        </label>
                    </aside>
                    <article class="columns seven">
                        <div id="icons-wrapper"> 
                            @if(isset($settingdata['select_icon_postion']) &&  $settingdata['select_icon_postion'] == 'greenicon' )
                                <img id="buttonIcon_0" class="button secondary  icon-button selectIcon"   value="greenicon"  src="{{ asset('images/icongreen.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_1" class="button secondary  icon-button"   value="squarepluseicon"  src="{{ asset('images/plus-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_2" class="button secondary  icon-button"   value="roundpluseicon"  src="{{ asset('images/button.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_3" class="button secondary  icon-button"   value="blackicon"  src="{{ asset('images/black-cart-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_4" class="button secondary  icon-button"   value="whiteicon"  src="{{ asset('images/whiteicon.svg')}}" style="font-size:40px;">
                            @elseif(isset($settingdata['select_icon_postion']) && $settingdata['select_icon_postion'] == 'squarepluseicon' )
                                <img id="buttonIcon_0" class="button secondary  icon-button"   value="greenicon"  src="{{ asset('images/icongreen.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_1" class="button secondary  icon-button selectIcon"   value="squarepluseicon"  src="{{ asset('images/plus-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_2" class="button secondary  icon-button"   value="roundpluseicon"  src="{{ asset('images/button.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_3" class="button secondary  icon-button"   value="blackicon"  src="{{ asset('images/black-cart-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_4" class="button secondary  icon-button"   value="whiteicon"  src="{{ asset('images/whiteicon.svg')}}" style="font-size:40px;">
                            @elseif(isset($settingdata['select_icon_postion']) && $settingdata['select_icon_postion'] == 'roundpluseicon' )
                                <img id="buttonIcon_0" class="button secondary icon-button"   value="greenicon"  src="{{ asset('images/icongreen.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_1" class="button secondary  icon-button"   value="squarepluseicon"  src="{{ asset('images/plus-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_2" class="button secondary  icon-button selectIcon"   value="roundpluseicon"  src="{{ asset('images/button.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_3" class="button secondary  icon-button"   value="blackicon"  src="{{ asset('images/black-cart-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_4" class="button secondary  icon-button"   value="whiteicon"  src="{{ asset('images/whiteicon.svg')}}" style="font-size:40px;">
                            @elseif(isset($settingdata['select_icon_postion']) && $settingdata['select_icon_postion'] == 'blackicon' )
                                <img id="buttonIcon_0" class="button secondary icon-button"   value="greenicon"  src="{{ asset('images/icongreen.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_1" class="button secondary  icon-button"   value="squarepluseicon"  src="{{ asset('images/plus-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_2" class="button secondary  icon-button"   value="roundpluseicon"  src="{{ asset('images/button.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_3" class="button secondary  icon-button selectIcon"   value="blackicon"  src="{{ asset('images/black-cart-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_4" class="button secondary  icon-button"   value="whiteicon"  src="{{ asset('images/whiteicon.svg')}}" style="font-size:40px;">    
                            @elseif(isset($settingdata['select_icon_postion']) && $settingdata['select_icon_postion'] == 'whiteicon' )
                                <img id="buttonIcon_0" class="button secondary icon-button"   value="greenicon"  src="{{ asset('images/icongreen.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_1" class="button secondary  icon-button"   value="squarepluseicon"  src="{{ asset('images/plus-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_2" class="button secondary  icon-button"   value="roundpluseicon"  src="{{ asset('images/button.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_3" class="button secondary  icon-button"   value="blackicon"  src="{{ asset('images/black-cart-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_4" class="button secondary  icon-button selectIcon"   value="whiteicon"  src="{{ asset('images/whiteicon.svg')}}" style="font-size:40px;">    
                            @else
                                <img id="buttonIcon_0" class="button secondary icon-button"   value="greenicon"  src="{{ asset('images/icongreen.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_1" class="button secondary  icon-button"   value="squarepluseicon"  src="{{ asset('images/plus-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_2" class="button secondary  icon-button"   value="roundpluseicon"  src="{{ asset('images/button.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_3" class="button secondary  icon-button"   value="blackicon"  src="{{ asset('images/black-cart-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_4" class="button secondary  icon-button"   value="whiteicon"  src="{{ asset('images/whiteicon.svg')}}" style="font-size:40px;">    
                            @endif  
                        </div>
                        <input type="hidden" id="icon_path" name="select_icon_postion" value="greenicon">
                    </article>        
                </section>
            @else   
                <section class="full-width select-icon display-icons" style="display:none">
                    <aside class="columns four">
                        <label for="icon_path">
                            <h4>Here you can Select the icon </h4>
                            Here you can select the icon
                        </label>
                    </aside>
                    <article class="columns seven">
                        <div id="icons-wrapper"> 
                            @if(isset($settingdata['select_icon_postion']) &&  $settingdata['select_icon_postion'] == 'greenicon' )
                                <img id="buttonIcon_0" class="button secondary  icon-button selectIcon"   value="greenicon"  src="{{ asset('images/icongreen.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_1" class="button secondary  icon-button"   value="squarepluseicon"  src="{{ asset('images/plus-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_2" class="button secondary  icon-button"   value="roundpluseicon"  src="{{ asset('images/button.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_3" class="button secondary  icon-button"   value="blackicon"  src="{{ asset('images/black-cart-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_4" class="button secondary  icon-button"   value="whiteicon"  src="{{ asset('images/whiteicon.svg')}}" style="font-size:40px;">
                            @elseif(isset($settingdata['select_icon_postion']) && $settingdata['select_icon_postion'] == 'squarepluseicon' )
                                <img id="buttonIcon_0" class="button secondary  icon-button"   value="greenicon"  src="{{ asset('images/icongreen.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_1" class="button secondary  icon-button selectIcon"   value="squarepluseicon"  src="{{ asset('images/plus-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_2" class="button secondary  icon-button"   value="roundpluseicon"  src="{{ asset('images/button.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_3" class="button secondary  icon-button"   value="blackicon"  src="{{ asset('images/black-cart-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_4" class="button secondary  icon-button"   value="whiteicon"  src="{{ asset('images/whiteicon.svg')}}" style="font-size:40px;">
                            @elseif(isset($settingdata['select_icon_postion']) && $settingdata['select_icon_postion'] == 'roundpluseicon' )
                                <img id="buttonIcon_0" class="button secondary icon-button"   value="greenicon"  src="{{ asset('images/icongreen.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_1" class="button secondary  icon-button"   value="squarepluseicon"  src="{{ asset('images/plus-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_2" class="button secondary  icon-button selectIcon"   value="roundpluseicon"  src="{{ asset('images/button.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_3" class="button secondary  icon-button"   value="blackicon"  src="{{ asset('images/black-cart-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_4" class="button secondary  icon-button"   value="whiteicon"  src="{{ asset('images/whiteicon.svg')}}" style="font-size:40px;">
                            @elseif(isset($settingdata['select_icon_postion']) && $settingdata['select_icon_postion'] == 'blackicon' )
                                <img id="buttonIcon_0" class="button secondary icon-button"   value="greenicon"  src="{{ asset('images/icongreen.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_1" class="button secondary  icon-button"   value="squarepluseicon"  src="{{ asset('images/plus-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_2" class="button secondary  icon-button"   value="roundpluseicon"  src="{{ asset('images/button.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_3" class="button secondary  icon-button selectIcon"   value="blackicon"  src="{{ asset('images/black-cart-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_4" class="button secondary  icon-button"   value="whiteicon"  src="{{ asset('images/whiteicon.svg')}}" style="font-size:40px;">    
                            @elseif(isset($settingdata['select_icon_postion']) && $settingdata['select_icon_postion'] == 'whiteicon' )
                                <img id="buttonIcon_0" class="button secondary icon-button"   value="greenicon"  src="{{ asset('images/icongreen.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_1" class="button secondary  icon-button"   value="squarepluseicon"  src="{{ asset('images/plus-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_2" class="button secondary  icon-button"   value="roundpluseicon"  src="{{ asset('images/button.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_3" class="button secondary  icon-button"   value="blackicon"  src="{{ asset('images/black-cart-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_4" class="button secondary  icon-button selectIcon"   value="whiteicon"  src="{{ asset('images/whiteicon.svg')}}" style="font-size:40px;">    
                            @else
                                <img id="buttonIcon_0" class="button secondary icon-button"   value="greenicon"  src="{{ asset('images/icongreen.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_1" class="button secondary  icon-button"   value="squarepluseicon"  src="{{ asset('images/plus-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_2" class="button secondary  icon-button"   value="roundpluseicon"  src="{{ asset('images/button.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_3" class="button secondary  icon-button"   value="blackicon"  src="{{ asset('images/black-cart-icon.svg')}}" style="font-size:40px;">
                                <img id="buttonIcon_4" class="button secondary  icon-button"   value="whiteicon"  src="{{ asset('images/whiteicon.svg')}}" style="font-size:40px;">    
                            @endif  
                        </div>
                        <input type="hidden" id="icon_path" name="select_icon_postion" value="greenicon">
                    </article>        
                </section>

                <section class="full-width select-image display-buttons">
                    <aside class="columns four">
                        <div style="margin-top:10px">
                            <h4>Customize Button Style</h4>
                            <p>Here you can choose button shape</p>
                        </div>
                    </aside>
                    <article class="columns seven ">
                        <div class="card  columns eight">  
                            <div class="columns tweleve"  id="buttons-wrapper" > 
        
                                {!! html()->select('select_button_style')->options(['rounded' => 'rounded', 'square' => 'square'])->value($settingdata['select_button_style'] ?? '')->attributes(['id' => 'button_style']) !!}

                            </div> 
                            <span class="text-danger error-text   select_button_style_error"></span>
                        </div>
                    </article>
                </section>

                <section class="full-width custom-text">
                    <aside class="columns four">
                        <div style="margin-top:10px">
                            <h4>Add Custom  Text For Button</h4>
                            <p> Here you can add custom text for add to cart button label</p>
                        </div>
                    </aside>
                    <article class="columns seven">
                        <div class="card columns eight">     
    
                            {!! html()->text('custom_text', $settingdata['custom_text'] ?? 'add to cart')->id('myInput')->class('enterInput')->attribute('maxlength', '30') !!}

                            <span class="text-danger error-text   custom_text_error"></span>
                        </div>
                    </article>
                </section>
            
                <section class="full-width button-live-preview">
                    <aside class="columns four">
                        <div style="margin-top:10px">
                            <h4>Button Live Preview</h4>
                            <p>Here you can watch live of customized button</p>
                        </div>
                    </aside>
                    <article class="columns seven">
                        <div class="card columns eight">                    
                            <div class="eosh_cart-quantity">
                                    <div class="eosh_prod-card eosh_third">
                                        <div class="columns tweleve"  id="buttons-wrapper"> 
                                            @if(isset($settingdata['select_button_style'])  &&    $settingdata['select_button_style'] == 'rounded')
                                                <div class="button_0" style="display:block">
                                                    <div style="text-align:center;border-radius: 50px;background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                                </div>
                                                <div class="button_1" style="display:none">
                                                    <div style="text-align:center;background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                                </div>
                                            @elseif(isset($settingdata['select_button_style']) && $settingdata['select_button_style']== 'square')
                                                <div class="button_0" style="display:none">
                                                    <div style="text-align:center;border-radius: 50px;background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                                </div>
                                                <div class="button_1" style="display:block">
                                                    <div style="text-align:center; background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0; padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                                </div> 
                                            @else
                                                <div class="button_0" style="display:block">
                                                        <div style="text-align:center;background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                                </div>
                                                <div class="button_1" style="display:none">
                                                    <div style="text-align:center;background:{{ $settingdata['custom_button_color'] ?? '#3C6CFF' }};color: {{ $settingdata['custom_text_color'] ?? '#AF5FFF' }};border: 0;padding: 15px;box-shadow: none;" id="result" class="eosh_cart-btn">{{$settingdata['custom_text'] ?? 'add to cart'}}</div>
                                                </div>
                                            @endif
                                        </div>    
                                    </div>
                            </div>
                        </div>
                    </article>
                </section>

            @endif
        
            <section class="full-width"> 
                <aside class="columns four">
                    <div style="margin-top:10px">
                        <h4>Customize  Color for  Quantity selector</h4>
                        <p>Here you can choose Customize  color for Quantity selector</p>
                    </div>
                </aside>
                <article class="columns four">
                    <div class="card columns four">
                        
                        Color for Quanity increment/decrement :{{ html()->text('custom_puls_minus_color', $settingdata['custom_puls_minus_color'] ?? '#FF361B')->attribute('data-jscolor', '') }}

                        <span class="text-danger error-text custom_puls_minus_color_error"></span>
                    </div>
                    <div class="card columns four">
                        Back ground color for quanity selector:{{ html()->text('custom_quantity_color', $settingdata['custom_quantity_color'] ?? '#A6FF7E')->attribute('data-jscolor', '') }}
                        <span class="text-danger error-text custom_button_color_error"></span>
                    </div>
                </article>
            </section>

            <section class="full-width"> 
                <aside class="columns four">
                    <div style="margin-top:10px">
                        <h4>Customize  Color for  Button/icon </h4>
                        <p>Here you can choose Customize  color for Button/icon </p>
                    </div>
                </aside>
                <article class="columns four">
                    <div class="card columns four">
                        
                        Color for text : {{ html()->text('custom_text_color', $settingdata['custom_text_color'] ?? '#181818')->class('selectcolortext')->attribute('data-jscolor', '') }}
                        <span class="text-danger error-text custom_text_color_error"></span>
                    </div>
                    <div class="card columns four">
                        Back ground color for button/icon: {{ html()->text('custom_button_color', $settingdata['custom_button_color'] ?? '#B1FFB3')->class('selectcolorbutton')->attribute('data-jscolor', '') }}
                        <span class="text-danger error-text custom_button_color_error"></span>
                    </div>
                </article>
            </section>


            <section class="full-width">
                <aside class="columns four">
                    <div style="margin-top:10px">
                        <h4>Display the sold out button</h4>
                        <p>Enable the  sold out button</p>
                    </div>
                </aside>
                <article class="columns seven">
                    <div class="card columns eight">  
                    <label class="switch"> 

                        @if(isset($settingdata['show_hide_sold_out_button']) &&  $settingdata['show_hide_sold_out_button'] == 1 )
                            {{ html()->checkbox('show_hide_sold_out_button', true, '1')->id('show_hide_sold_out_button') }}
                        @elseif(isset($settingdata['show_hide_sold_out_button']) && $settingdata['show_hide_sold_out_button'] == 0 )
                            {{ html()->checkbox('show_hide_sold_out_button', false, '0')->id('show_hide_sold_out_button') }}
                        @else
                            {{ html()->checkbox('show_hide_sold_out_button', false, '0')->id('show_hide_sold_out_button') }}
                        @endif
   
                    </label>
                    </div>
                </article>
            </section>


            <section class="full-width">
                <aside class="columns four">
                    <div style="margin-top:10px">
                        <h4>Display Variants / Size Color on Collections</h4>
                        <p>Enable this feature and display your variants color size with add to cart button on collection pages</p>
                    </div>
                </aside>
                <article class="columns seven">
                    <div class="card columns eight">  
                    <label class="switch">      
                        @if(isset($settingdata['show_hide_varsize_color']) &&  $settingdata['show_hide_varsize_color'] == 1 )
                            {{ html()->checkbox('show_hide_varsize_color', true, '1')->id('button_varsize_id') }}
                        @elseif(isset($settingdata['show_hide_varsize_color']) && $settingdata['show_hide_varsize'] == 0 )
                            {{ html()->checkbox('show_hide_varsize_color', false, '0')->id('button_varsize_id') }}
                        @else
                            {{ html()->checkbox('show_hide_varsize_color', false, '0')->id('button_varsize_id') }}
                        @endif
                        <span class="slider round"></span>
                    </label>
                    </div>
                </article>
            </section>


            <section class="full-width">
                <aside class="columns four">
                    <div style="margin-top:10px">
                        <h4>Customiztion the selector / Size Color on Collections</h4>
                        <p>Enable this feature and display your variants color size with add to cart button on collection pages</p>
                    </div>
                </aside>
                <article class="columns seven">
                    <div class="card columns eight">  

                        <div class="advanced-styles">
                            <!-- Border size -->
                            <div class="row">   
                                <div class="field columns six">
                                    <label for="variantSelectorBorderSize">Border size (px)</label>
                                    <input id="variantSelectorBorderSize" type="number" name="variantSelectorBorderSize" min="0" max="20" step="1" value="10">
                                </div>

                                <!-- Border color -->
                                <div class="field columns two">
                                    <label for="variantSelectorBorderColor">Border color</label>
                                    <input id="variantSelectorBorderColor" type="color" name="variantSelectorBorderColor" value="#6bac57">
                                </div>
                            </div>  

                            <div class="row">  
                                <!-- Border radius -->
                                <div class="field columns six">
                                    <label for="variantSelectorBorderRadius">Border radius (px)</label>
                                    <input id="variantSelectorBorderRadius" type="number" name="variantSelectorBorderRadius" min="0" max="100" step="1" value="27">
                                </div>

                                <!-- Background color -->
                                <div class="field columns two">
                                    <label for="variantSelectorBackgroundColor">Background color</label>
                                    <input id="variantSelectorBackgroundColor" type="color" name="variantSelectorBackgroundColor" value="#3b2d1d">
                                </div>
                            </div> 


                            <div class="row">  
                                <!-- Font size -->
                                <div class="field columns six">
                                    <label for="variantSelectorFontSize">Font size (px)</label>
                                    <input id="variantSelectorFontSize" type="number" name="variantSelectorFontSize" min="1" max="100" step="1" value="13">
                                </div>

                                <!-- Font color -->
                                <div class="field columns two">
                                    <label for="variantSelectorFontColor">Font color</label>
                                    <input id="variantSelectorFontColor" type="color" name="variantSelectorFontColor" value="#af3579">
                                </div>
                            </div> 

                            <div class="row"> 

                                <!-- Font style -->
                                <div class="field columns six">
                                    <label for="variantSelectorFontStyle">Font style</label>
                                    <select id="variantSelectorFontStyle" name="variantSelectorFontStyle">
                                    <option value="NORMAL">Normal</option>
                                    <option value="BOLD" selected>Bold</option>
                                    <option value="ITALIC">Italic</option>
                                    <option value="BOLD_ITALIC">Bold Italic</option>
                                    </select>
                                </div>

                                <!-- Font family -->
                                <div class="field columns two">
                                    <label for="variantSelectorFontFamily">Font family</label>
                                    <input id="variantSelectorFontFamily" type="text" name="variantSelectorFontFamily" maxlength="100">
                                </div>

                            </div>


                        </div>

                    </div>
                </article>
            </section>




            <section class="full-width">
                <aside class="columns four">
                    <div style="margin-top:10px">
                        <h4>show the sold out button </h4>
                        <p>Enable show the sold out button when no product is available</p>
                    </div>
                </aside>
                <article class="columns seven">
                    <div class="card columns eight">  

                        <div class="advanced-styles">
                            <!-- Border size -->
                            <div class="row">   
                                <div class="field columns six">
                                    <label for="soldOutButtonSize">Border size (px)</label>
                                    <input id="soldOutButtonSize" type="number" name="soldOutButtonSize" min="0" max="20" step="1" value="10">
                                </div>

                                <!-- Border color -->
                                <div class="field columns two">
                                    <label for="soldOutSelectorButtonColor">Border color</label>
                                    <input id="soldOutSelectorButtonColor" type="color" name="soldOutSelectorButtonColor" value="#6bac57">
                                </div>
                            </div>  

                            <div class="row">  
                                <!-- Border radius -->
                                <div class="field columns six">
                                    <label for="soldOutSelectorBorderRadius">Border radius (px)</label>
                                    <input id="soldOutSelectorBorderRadius" type="number" name="soldOutSelectorBorderRadius" min="0" max="100" step="1" value="27">
                                </div>

                                <!-- Background color -->
                                <div class="field columns two">
                                    <label for="soldOutSelectorBackgroundColor">Background color</label>
                                    <input id="soldOutSelectorBackgroundColor" type="color" name="soldOutSelectorBackgroundColor " value="#3b2d1d">
                                </div>
                            </div> 


                            <div class="row">  
                                <!-- Font size -->
                                <div class="field columns six">
                                    <label for="soldOutSelectorFontSize">Font size (px)</label>
                                    <input id="soldOutSelectorFontSize" type="number" name="soldOutSelectorFontSize" min="1" max="100" step="1" value="13">
                                </div>

                                <!-- Font color -->
                                <div class="field columns two">
                                    <label for="soldOutSelectorFontColor">Font color</label>
                                    <input id="soldOutSelectorFontColor" type="color" name="soldOutSelectorFontColor" value="#af3579">
                                </div>
                            </div> 

                            <div class="row"> 

                                <!-- Font style -->
                                <div class="field columns six">
                                    <label for="soldOutSelectorFontStyle">Font style</label>
                                    <select id="soldOutSelectorFontStyle" name="soldOutSelectorFontStyle">
                                    <option value="NORMAL">Normal</option>
                                    <option value="BOLD" selected>Bold</option>
                                    <option value="ITALIC">Italic</option>
                                    <option value="BOLD_ITALIC">Bold Italic</option>
                                    </select>
                                </div>

                                <!-- Font family -->
                                <div class="field columns two">
                                    <label for="soldOutSelectorFontFamily">Font family</label>
                                    <input id="soldOutSelectorFontFamily" type="text" name="soldOutSelectorFontFamily" maxlength="100">
                                </div>

                            </div>

                        </div>

                    </div>
                </article>
            </section>

           
            <section class="full-width">
                <aside class="columns four">
                    <div class="card-section">
                        <label for="showVariantSelectorLabel">
                            <input id="showVariantSelectorLabel" class="cbb-input" type="checkbox" name="showVariantSelectorLabel" value="true" checked="checked"><input type="hidden" name="_showVariantSelectorLabel" value="on">
                            <span>Show variant selector label</span>
                        </label>
                    </div>
                </aside>
                <article class="columns seven">
                    <div class="card columns eight">  

                        <div class="advanced-styles-row">

                            <div class="card-section six columns">

                                <label for="variantSelectorLabelFontSize">
                                    <span class="additional-information">Font size</span>
                                    <div class="input-group short-input">
                                        <input id="variantSelectorLabelFontSize" class="cbb-input" type="number" required="" min="1" max="100" step="1" name="variantSelectorLabelFontSize" value="15">
                                        <span class="append">px</span>
                                    </div>
                                </label>

                                <p class="error-container no-display" style="display: none;">
                                    <svg class="error-icon"></svg>
                                    <span class="error-message">
                                        Allowed range: 1 - 100
                                    </span>
                                </p>
                                <p class="error-container no-display" style="display: none;">
                                    <svg class="error-icon"></svg>
                                    <span class="error-message">
                                        The value must be an integer, can not have decimal values.
                                    </span>
                                </p>
                                <p class="error-container no-display" style="display: none;">
                                    <svg class="error-icon"></svg>
                                    <span class="error-message">
                                        This value must be a number.
                                    </span>
                                </p>
                                <p class="error-container no-display" style="display: none;">
                                    <svg class="error-icon"></svg>
                                    <span class="error-message">
                                        This field cannot be empty.
                                    </span>
                                </p>

                            </div>

                            <div class="card-section six columns">
                                    <label for="variantSelectorLabelFontColor">
                                        <span class="additional-information">Font color</span>
                                        <input id="variantSelectorLabelFontColor"  name="variantSelectorLabelFontColor"  class="cbb-input color short-input"  type="color"  type="text" required="required" value="#af3579">
                                    </label>
                            </div>

                        </div>

                    </div>
                </article>
            </section>


            <div class="row">
                <div class="column twelve align-right" style="padding-right:50px;">
                {{ html()->submit('Save')->id('clickMe')->class('btn btn-danger') }}
                </div>
            </div>


        {!! html()->form()->close() !!}
        
        <section class="full-width">
            <article>
            <div class="row card spacing current_plan">
                <div class="columns twelve">
                    <span>Try our top rated apps and enjoy discount on annual pricing</span>
                </div>
            </div>
            </article>
        </section>

        <section class="full-width footer_product_card">
            <article>
        
                <div class="card columns four card_box">
                        <div class="head">
                            <h5 class="heading">Variator: See Product Variants
                            <div class="cart_customizer_star"><img src="{{ asset('images/stars.png') }}" alt="stars"> <span class="eosh_star">91</span></div>
                            </h5>
                            <a target="_blank" href="https://apps.shopify.com/variants-as-separate-products" class="button eosh-tryApp">Try App</a>
                        </div>

                        <div class="img_box">
                            <img src="{{ asset('images/Varietor-image1.webp') }}" alt="app1">
                        </div>

                        <ul class="description">
                            <li class="list">Let customers easily find their desired product variant in collection page</li>
                            <li  class="list">Show infinite variants as separate products on collection pages</li>
                            <li  class="list">Show all variants color, size flavor on collection pages</li>
                            <li  class="list">Customize add to cart button</li>
                        </ul>
                </div>

                <div class="card columns four card_box">
                    <div class="head">
                        <h5 class="heading">Quick Product Navigator Slide
                            <span class="new_app">New on App Store</span>
                        </h5>
                        <a target="_blank" href="https://apps.shopify.com/extendons-product-navigation?show_store_picker=1" class="button eosh-tryApp">Try App</a>
                    </div>
                    <div class="img_box">
                        <img src="{{ asset('images/navigationslides.webp') }}" alt="app1">
                    </div>
                    <ul class="description">
                        <li  class="list">Show selected product on left & right side to store anywhere</li>
                        <li  class="list">Customize multiple navigator slides text color, style and layout </li>
                        <li  class="list">Maximize products engagement and conversions</li>
                    </ul>
                </div>

                <div class="card columns four card_box">
                    <div class="head">
                        <h5 class="heading">Whatsapp Integration
                            <div class="cart_customizer_star"><img src="{{ asset('images/stars.png') }}" alt="stars"> <span class="eosh_star">23</span></div>
                        </h5>
                        <a target="_blank" href="https://apps.shopify.com/whatsapp-order?show_store_picker=1" class="button eosh-tryApp">Try App</a>
                    </div>
                    <div class="img_box">
                        <img src="{{ asset('images/orderonwhatsapp.webp') }}" alt="app1">
                    </div>
                    <ul class="description">
                        <li  class="list">Increase customer engagement</li>
                        <li  class="list">Display WhatsApp button on specific product, collection, & cart page</li>
                        <li  class="list">Attach official whatsApp business number for order</li>
                        <li  class="list">Start taking orders directly on your whatsapp</li>
                    </ul>
                </div>

            </article>
        </section>

@endsection 