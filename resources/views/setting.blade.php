
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
            <article id="rule-tabs">
                <div class="columns twelve">
                    <div class="columns has-sections card">

                        <ul class="tabs">
                            <li class="active">
                                <a href="#app-setting">
                                    <i class="icon-gear tab-icon-spacing"></i>
                                    <span class="tabs-title">App Settings</span>
                                </a>
                            </li>

                            <li  style="">
                                <a  href="#button-customization" >
                                    <i class="icon-customers tab-icon-spacing"></i>
                                    <span style="text-align: center;" class="tabs-title">Button Customiztion</span>
                                </a>
                            </li>

                            <li style="">
                                <a href="#advanced-customization">
                                    <i class="icon-preview tab-icon-spacing"></i>
                                    <span class="tabs-title">Advanced Customiztion</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-folder">
                            <div class="card-section tab-content" id="app-setting" style="display:block">
                            <div class="columns eight">
                                    <div class="align-left">
                                        <h2 id="customization-heading"><b>Configuration</b></h2>
                                        <p>Here is the guide to get started.Here is the all of the configuration of the app  customization available </p>
                                    </div>
                                </div>
    
                                <form id="general-setting-form" method="POST" action="/general_setting">

                                    <section class="full-width">
                                        <aside  class="columns four">
                                        </aside>
                                        <article class="columns eight">
                                        </article>
                                    </section>

                                    <section class="full-width">
                                        <aside  class="columns four">
                                            <div style="margin-top:10px">
                                                <h4>Enable App Functionality</h4>
                                                <p>Here you  can  enable/disable the</p>
                                                <p>add  to Cart app Functionality</p>
                                            </div>
                                        </aside>
                                        <article class="columns eight">
                                            <div style="border-radius: 25px;" class="card columns eight">
                                                <label class="switch">
                                                        @if(isset($settingdata['enable_app']) &&  $settingdata['enable_app'] == 1 )
                                                            {{ html()->checkbox('enable_app')->value(1)->checked()->id('enable_id') }}
                                                        @elseif(isset($settingdata['enable_app']) && $settingdata['enable_app'] == 0 )
                                                            {{ html()->checkbox('enable_app')->value('0')->checked(false)->id('enable_id') }}
                                                        @else
                                                            {{ html()->checkbox('enable_app', false, '0')->id('enable_id') }}
                                                        @endif
                                                        Enable/Disable
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
                                            <div style="border-radius: 25px;" class="card columns eight">  
                                            <label class="switch">      
                                                @if(isset($settingdata['show_hide_button']) &&  $settingdata['show_hide_button'] == 1 )
                                                    {{ html()->checkbox('show_hide_button', true, '1')->id('button_enable_id') }}
                                                @elseif(isset($settingdata['show_hide_button']) && $settingdata['show_hide_button'] == 0 )
                                                    {{ html()->checkbox('show_hide_button', false, '0')->id('button_enable_id') }}
                                                @else
                                                    {{ html()->checkbox('show_hide_button', false, '0')->id('button_enable_id') }}
                                                @endif
                                                Enable/Disable
                                                <span class="slider round"></span>
                                            </label>
                                            </div>
                                        </article>
                                    </section>

                                    <section class="full-width">
                                        <aside class="columns four">
                                            <label for="icon_path">
                                                <h4>Display add to cart button collection an search page</h4>
                                                <p>Here you can choose the add to cart button location on your store multiple pages and increase conversions rate</p>
                                            </label>
                                        </aside>
                                        <article class="columns eight">
                                            <div style="border-radius: 25px;" class="card columns eight">  
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
                                            </div>    
                                        </article>        
                                    </section>

                                    <section class="full-width">
                                        <aside class="columns four">
                                            <label for="icon_path">
                                            <h4>Display Add to Cart Button on Feature Collection</h4>
                                            <p>Enable this option to display add to cart button on your homepage</p>
                                            
                                            </label>
                                        </aside>
                                        <article class="columns eight">
                                            <div style="border-radius: 25px;" class="card columns eight">  
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
                                                    ->attribute('multiple', 'multiple') 
                                                }} 
                                            </div>    
                                        </article>        
                                    </section>    
                                    
                                    <section class="full-width">
                                        <aside class="columns four">
                                            <label for="icon_path">
                                                <h4>Display add to cart button Animation</h4>
                                                <p>Here you can choose the add to cart button location on your store multiple pages and increase conversions rate</p>
                                            </label>
                                        </aside>
                                        <article class="columns eight">
                                            <div style="border-radius: 25px;" class="card columns eight">  
                                                <div id="icons-wrapper">  

                                                        @if(isset($settingdata['enable_animation_btn']) &&  $settingdata['enable_animation_btn'] == 1 )
                                                            {{ html()->checkbox('enable_animation_btn')->value(1)->checked()->id('enable_animation_btn') }} Enable/Disable
                                                        @elseif(isset($settingdata['enable_animation_btn']) && $settingdata['enable_animation_btn'] == 0 )
                                                            {{ html()->checkbox('enable_animation_btn')->value('0')->checked(false)->id('enable_animation_btn') }} Enable/Disable
                                                        @else
                                                            {{ html()->checkbox('enable_animation_btn', false, '0')->id('enable_animation_btn') }} Enable/Disable
                                                        @endif
                                                        
                                                        <label>Display To:</label>


                                                        @if(isset($settingdata['show_button_hover']) &&  $settingdata['show_button_hover'] == 1 )
                                                            {{ html()->checkbox('show_button_hover', true, '1')->id('show_button_hover') }}
                                                        @elseif(isset($settingdata['show_button_hover']) && $settingdata['show_button_hover'] == 0 )
                                                            {{ html()->checkbox('show_button_hover', false, '0')->id('show_button_hover') }}
                                                        @else
                                                            {{ html()->checkbox('show_button_hover', false, '0')->id('show_button_hover') }}
                                                        @endif
                                                
                                                        <span style="margin-right:15px">While Hovering</span>
                                                
                                                        @if(isset($settingdata['show_button_directly']) &&  $settingdata['show_button_directly'] == 1 )
                                                            {{ html()->checkbox('show_button_directly', true, '1')->id('show_button_directly') }}
                                                        @elseif(isset($settingdata['show_button_directly']) && $settingdata['show_button_directly'] == 0 )
                                                            {{ html()->checkbox('show_button_directly', false, '0')->id('show_button_directly') }}
                                                        @else
                                                            {{ html()->checkbox('show_button_directly', false, '0')->id('show_button_directly') }}
                                                        @endif
                                                        <span>Show Directly</span>
                                                            
                                                </div> 
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
                                            <div style="border-radius: 25px;" class="card columns eight">  
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

                                            <div style="border-radius: 25px;" class="card columns eight">  
                                            <label class="switch">      
                                                @if(isset($settingdata['show_hide_varsize_color']) &&  $settingdata['show_hide_varsize_color'] == 1 )
                                                    {{ html()->checkbox('show_hide_varsize_color', true, '1')->id('show_hide_varsize_color') }}
                                                @elseif(isset($settingdata['show_hide_varsize_color']) && $settingdata['show_hide_varsize'] == 0 )
                                                    {{ html()->checkbox('show_hide_varsize_color', false, '0')->id('show_hide_varsize_color') }}
                                                @else
                                                    {{ html()->checkbox('show_hide_varsize_color', false, '0')->id('show_hide_varsize_color') }}
                                                @endif
                                                <span class="slider round"></span>
                                            </label>

                                            </div>
                                        </article>
                                    </section>

                                    <section class="full-width">
                                        <aside class="columns four">
                                            <div style="margin-top:10px">
                                                <h4>Unavailable varients</h4>
                                            </div>
                                        </aside>
                                        <article class="columns seven">
                                            <div style="border-radius: 25px;" class="card columns eight">  
                                            <label class="switch">      
                                                @if(isset($settingdata['show_hide_un_var']) &&  $settingdata['show_hide_un_var'] == 1 )
                                                    {{ html()->checkbox('show_hide_un_var', true, '1')->id('show_hide_un_var') }}
                                                @elseif(isset($settingdata['show_hide_un_var']) && $settingdata['show_hide_un_var'] == 0 )
                                                    {{ html()->checkbox('show_hide_un_var', false, '0')->id('show_hide_un_var') }}
                                                @else
                                                    {{ html()->checkbox('show_hide_un_var', false, '0')->id('show_hide_un_var') }}
                                                @endif
                                                <span class="slider round"></span>
                                            </label>
                                            </div>
                                        </article>
                                    </section>

                                    <div class="row">
                                        <div class="column twelve align-right" style="padding-right:50px;">
                                            <button type="submit" id="clickMe"  class="btn-save button eosh-brand-btn">Save</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                        <div class="tab-folder">
                            <div class="card-section tab-content" id="button-customization" style="">
                                
                                <section class="full-width">
                                    <article class="">
                                        <div class="columns eight">
                                            <div class="">
                                                <h2 id="customization-heading"><b>Button Customization</b></h2>
                                                <p>Here is the guide to get started.Here is the all of the button customization available </p>
                                            </div>
                                        </div>
                                    </article>
                                </section> 
                                
                                <br>
                    
                                <div class="columns five has-sections card"> 
                                    <div class="row">
                                    </div>
                                        <label><h2 style="">&nbsp;&nbsp;Customize Button style</h2></label>
                                        
                                        <form id="button-setting-form" method="POST" action="/general_setting">

                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                    <section class="full-width">
                                                        <aside  class="columns four">
                                                        </aside>
                                                        <article class="columns eight">
                                                        </article>
                                                    </section>
                                    
                                                <section class="full-width">
                                                    <div style="text" class="columns eight">
                                                        <label>Add multiple style button</label>
                                                        {{ html()->select('append_to_button_style', ['button' => 'Button','quantityselector' => 'Quantity Selector'], $settingdata['append_to_button_style'] ?? '')->id('add_button_style') }}
                                                    </div>
                                                </section>

                                                <section class="full-width select-icon display-icons" style="display:block">
                                                    <article class="columns twelve">
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
                                                    
                                                <section class="full-width">
                                                    <div class="columns eight">
                                                        <p>Customize Button Shape</p>

                                                        <div style="display: flex; gap: 20px;">
                                                            <label><input type="radio" name="select_button_style" value="square" checked>
                                                                Square
                                                            </label>

                                                            <label><input type="radio" name="select_button_style" value="rounded">
                                                                Rounded
                                                            </label>
                                                        </div>
                                                    </div>
                                                </section>
                                              
                                                <section class="full-width">
                                                    <div class="columns eight">
                                                        <p>Add Multiple Button style</p>

                                                        <select id="diff_buttonstyle" name="diff_buttonstyle" style="width:100%; padding:10px 12px; font-size:14px; border:1px solid #ccc; border-radius:8px; outline:none; appearance:none;">
                                                            <option value="buttonstyle1" {{ (isset($settingdata['diff_buttonstyle']) && $settingdata['diff_buttonstyle'] == 'buttonstyle1') ? 'selected' : '' }}>Button style 01</option>
                                                            <option value="buttonstyle2" {{ (isset($settingdata['diff_buttonstyle']) && $settingdata['diff_buttonstyle'] == 'buttonstyle2') ? 'selected' : '' }}>Button style 02</option>
                                                            <option value="buttonstyle3" {{ (isset($settingdata['diff_buttonstyle']) && $settingdata['diff_buttonstyle'] == 'buttonstyle3') ? 'selected' : '' }}>Button style 03</option>
                                                            <option value="buttonstyle4" {{ (isset($settingdata['diff_buttonstyle']) && $settingdata['diff_buttonstyle'] == 'buttonstyle4') ? 'selected' : '' }}>Button style 04</option>
                                                            <option value="buttonstyle5" {{ (isset($settingdata['diff_buttonstyle']) && $settingdata['diff_buttonstyle'] == 'buttonstyle5') ? 'selected' : '' }}>Button style 05</option>
                                                        </select>
  
                                                    </div>
                                                </section>
                                              
                                                <section class="full-width">
                                                    <div class="columns eight">
                                                        <div>
                                                            <p>Add Custom Text For Button</p>
                                                                <input type="text" name="custom_text" id="myInput" class="enterInput" maxlength="30" value="{{ $settingdata['custom_text'] ?? 'add to cart' }}">
                                                        </div>
                                                    </div>
                                                </section>

                                                <section class="full-width">
                                                    <div class="columns eight">

                                                        <div style="margin-bottom: 12px;">
                                                            <p style="margin: 0 0 6px;"> add to cart Button Text Color</p>
                                                            <div style="display: flex; align-items: center; gap: 8px;">
                                                                <input type="text" name="custom_text_color" id="custom_text_color" data-jscolor value="{{ $settingdata['custom_text_color'] ?? '#FF361B' }}">
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <p style="margin: 0 0 6px;"> add to cart Button Background Color</p>
                                                            <div style="display: flex; align-items: center; gap: 8px;">
                                                                <input type="text" name="custom_button_color" id="custom_button_color" data-jscolor value="{{ $settingdata['custom_button_color'] ?? '#FF361B' }}">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </section>

                                                <section class="full-width">
                                                    <div class="columns eight">
                                                        <p>Choose Quantity Button Style</p>

                                                        <div class="columns custom-dropdown">

                                                            <div class="dropdown" id="customSelect">
                                                                <div class="dropdown-header" onclick="toggleDropdown()">
                                                                <span class="selected-label quantity-data" id="selected-label"> {{$settingdata['quantity_button_style'] ?? 'style1'}}</span>
                                                                
                                                                <div class="selected-counter" id="selected-counter"></div>
                                                                    <span class="arrow" id="dropdownArrow">
                                                                        <img src="{{ asset('images/arrow.png') }}" alt="">
                                                                    </span>
                                                                </div>

                                                                <div class="dropdown-content" id="dropdownContent">

                                                                    <div class="quantitychange  form-group {{ ($settingdata['quantity_button_style'] ?? 'style1') == 'style1' ? 'selected' : '' }}" onclick="selectStyle(0)">
                                                                        <span value="style1">style1</span>
                                                                            <div class="counter style1" data-index="0">
                                                                            <button class="btn plus">+</button>
                                                                            <span class="count">3</span>
                                                                            <button class="btn minus">−</button>
                                                                        </div>
                                                                    </div>

                                                                    <div class="quantitychange  form-group {{ ($settingdata['quantity_button_style'] ?? 'style2') == 'style2' ? 'selected' : '' }}" onclick="selectStyle(1)">
                                                                        <span value="style2">style2</span>
                                                                        <div class="counter style2" data-index="1">
                                                                        <button class="btn plus">+</button>
                                                                        <span class="count">3</span>
                                                                        <button class="btn minus">−</button>
                                                                        </div>
                                                                    </div>

                                                                    <div class="quantitychange  form-group {{ ($settingdata['quantity_button_style'] ?? 'style3') == 'style3' ? 'selected' : '' }}" onclick="selectStyle(2)">
                                                                        <span value="style3">style3</span>
                                                                        <div class="counter style3" data-index="2">
                                                                        <div class="custom-input">
                                                                            <span class="value">3</span>
                                                                            <div class="arrows">
                                                                            <button class="arrow up plus">▲</button>
                                                                            <button class="arrow down minus">▼</button>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="quantitychange  form-group {{ ($settingdata['quantity_button_style'] ?? 'style4') == 'style4' ? 'selected' : '' }}" onclick="selectStyle(3)">
                                                                        <span value="style4">style4</span>
                                                                        <div class="counter style4" data-index="3">
                                                                        <button class="btn left plus">◀</button>
                                                                        <span class="count">3</span>
                                                                        <button class="btn right minus">▶</button>
                                                                        </div>
                                                                    </div>

                                                                    <div class="quantitychange  form-group {{ ($settingdata['quantity_button_style'] ?? 'style5') == 'style5' ? 'selected' : '' }}" onclick="selectStyle(4)">
                                                                        <span value="style5">style5</span>
                                                                        <div class="counter style5" data-index="4">
                                                                        <span class="btn plus">+</span>
                                                                        <span class="count">3</span>
                                                                        <button class="btn minus">−</button>
                                                                        </div>
                                                                    </div>

                                                                    <div class="quantitychange form-group {{ ($settingdata['quantity_button_style'] ?? 'style6') == 'style6' ? 'selected' : '' }}" onclick="selectStyle(5)">
                                                                        <span value="style6">style6</span>
                                                                        <div class="counter style6" data-index="5">
                                                                        <button class="btn plus">+</button>
                                                                        <span class="count">3</span>
                                                                        <button class="btn minus">−</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </section>

                                                <section class="full-width">
                                                    <div class="columns eight">
                                                        <div  style="margin-bottom: 12px;">
                                                            <p style="margin: 0 0 6px;">Color for Quantity Increment / Decrement</p>
                                                                <div style="display: flex; align-items: center; gap: 8px;">
                                                                    <input type="text" name="custom_puls_minus_color" id="custom_puls_minus_color" data-jscolor value="{{ $settingdata['custom_puls_minus_color'] ?? '#FF361B' }}">
                                                                </div>  
                                                        </div>

                                                        <div  style="margin-bottom: 12px;">
                                                            <p style="margin: 0 0 6px;">Customize Quantity Selector Background Color</p>
                                                            <div style="display: flex; align-items: center; gap: 8px;">
                                                                <input type="text" name="custom_quantity_color" id="custom_quantity_color" data-jscolor value="{{ $settingdata['quantity_btn_back_color'] ?? '#FF361B' }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>

                                                <div class="form">
                                                    <div class="column twelve align-right" style="padding-right:50px;margin-bottom:24px;">
                                                        <button type="submit" id="button-save"  class="btn-save button eosh-brand-btn">Save</button>
                                                    </div>
                                                </div>                                                                    
                                        </form>

                                    <div class="">
                                    </div>
                                </div>
                                
                                <div class="columns four">
                                    <div class="align-left">
                                    
                                        <div style="border:1px solid #ccc; border-radius:8px; padding:20px; max-width:300px; margin-top:20px;">
                                            <h2 style="text-align:center" id="customization-heading"><b>live Preview</b></h2>

                                                <img src="{{ asset('images/bangle.webp') }}" alt="Product Image" width="300px">
                                                <p style="margin-top: 10px;"><b> bangle bracelet</b></p>

                                                <p style="color:#1a5dbb; font-size:14px; font-weight:600; text-align:left; margin:0 0 10px 0;">
                                                    Price Range:
                                                    <span>$10 – $20</span>
                                                </p>
                                               
                                                @if(isset($settingdata['append_to_button_style']) && $settingdata['append_to_button_style'] == 'quantityselector' )
                                                        @if(isset($settingdata['quantity_button_style']) &&  $settingdata['quantity_button_style'] == 'style1' ) 
                                                            <div class="display-quantitybutton1"  style="display:block;">
                                                                <div class="counter-box style1 form-group counter" style="background-color: {{ $settingdata['custom_quantity_color'] }};">
                                                                    <button id="plus" class="btn plus inc" style="color: {{ $settingdata['custom_puls_minus_color'] }}">+</button>
                                                                    <span id="count" class="count">3</span>
                                                                    <button id="minus" class="btn minus dec" style="color: {{ $settingdata['custom_puls_minus_color'] }}">−</button>
                                                                </div>
                                                            </div>
                                                        @elseif(isset($settingdata['quantity_button_style']) &&  $settingdata['quantity_button_style'] == 'style2' ) 
                                                            <div class="display-quantitybutton2" style="display:block;">       
                                                                <div class="counter-box  style2 form-group counter" data-index="1" style="background-color: {{ $settingdata['custom_quantity_color'] }};">
                                                                    <button id="plus " class="btn plus inc" style="color: {{ $settingdata['custom_puls_minus_color'] }}">+</button>
                                                                    <span id="count" class="count">3</span>
                                                                    <button id="minus " class="btn minus dec" style="color: {{ $settingdata['custom_puls_minus_color'] }}">−</button>
                                                                </div>
                                                            </div>
                                                        @elseif(isset($settingdata['quantity_button_style']) &&  $settingdata['quantity_button_style'] == 'style3' )
                                                            <div class="display-quantitybutton3" style="display:block;">
                                                                <div class="style3" data-index="2">
                                                                    <div class="custom-input counter-box"  style="background-color: {{ $settingdata['custom_quantity_color'] }};">
                                                                        <span class="value" style="color: {{ $settingdata['custom_puls_minus_color'] }}">3</span>
                                                                        <div class="arrows">
                                                                            <button class="arrow up inc " style="color: {{ $settingdata['custom_puls_minus_color'] }}">▲</button>
                                                                            <button class="arrow down dec" style="color: {{ $settingdata['custom_puls_minus_color'] }}">▼</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @elseif(isset($settingdata['quantity_button_style']) &&  $settingdata['quantity_button_style'] == 'style4' )    
                                                            <div class="display-quantitybutton4" style="display:block;">
                                                                <div class="counter counter-box style4" data-index="3" style="background-color: {{ $settingdata['custom_quantity_color'] ?? '#f2f2f2' }};">
                                                                    <button class="btn left inc" style="color: {{ $settingdata['custom_puls_minus_color'] ?? '#000000' }}">◀</button>
                                                                        <span class="count" style="color: {{ $settingdata['custom_puls_minus_color'] ?? '#000000' }}">3</span>
                                                                    <button class="btn right dec" style="color: {{ $settingdata['custom_puls_minus_color'] ?? '#000000' }}">▶</button>
                                                                </div>
                                                            </div>
                                                        @elseif(isset($settingdata['quantity_button_style']) &&  $settingdata['quantity_button_style'] == 'style5' )  
                                                            <div class="display-quantitybutton5" style="display:block;">
                                                                    <div class="counter counter-box style5" data-index="4">
                                                                    <div class="counter  style5" data-index="4">
                                                                    <span class="btn plus inc" style="color: {{ $settingdata['custom_puls_minus_color'] }}">+</span>
                                                                    <span class="count" style="color: {{ $settingdata['custom_puls_minus_color'] }}">3</span>
                                                                    <button class="btn minus dec" style="color: {{ $settingdata['custom_puls_minus_color'] }}">−</button>
                                                                </div>
                                                            </div>
                                                        @elseif(isset($settingdata['quantity_button_style']) &&  $settingdata['quantity_button_style'] == 'style6' )  
                                                            <div class="display-quantitybutton6" style="display:block;">
                                                                <div class="style6" data-index="5">
                                                                    <div class="counter-box  custom-input" style="background-color: {{ $settingdata['custom_quantity_color'] }};">
                                                                        <button class="btn plus" style="color: {{ $settingdata['custom_puls_minus_color'] }}">+</button>
                                                                        <span class="count" style="color: {{ $settingdata['custom_puls_minus_color'] }}">3</span>
                                                                        <button class="btn minus" style="color: {{ $settingdata['custom_puls_minus_color'] }}">−</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif         
                                                @elseif(isset($settingdata['append_to_button_style']) &&    $settingdata['append_to_button_style'] == 'button')                                                
                                                   
                                                    @if(isset($settingdata['diff_buttonstyle']) && $settingdata['diff_buttonstyle'] == 'buttonstyle1')
                                                            <div  class="preview-btn-container cart-btn1"  style="display:block;">
                                                                <div class="button button-color"  style="background: {{ $settingdata['custom_button_color'] ?? '#007bff' }};" >
                                                                        <img src="./New folder/arrow.png" alt="">
                                                                        <p  style="color: {{ $settingdata['custom_text_color'] ?? 'red' }};">{{ $settingdata['custom_text'] ?? 'Add to Cart' }}</p>
                                                                </div>
                                                            </div>
                                                    @elseif(isset($settingdata['diff_buttonstyle']) && $settingdata['diff_buttonstyle'] == 'buttonstyle2')
                                                        <button style="background-color: {{ $settingdata['custom_button_color'] ?? 'red' }};" class="btn-23 cart-btn2 "  style="display:block;">
                                                            <div>
                                                                <span  style="color:{{ $settingdata['custom_text_color'] ?? '#614AB5' }};"   class="text">{{ $settingdata['custom_text'] ?? 'Add to Cart' }}</span>
                                                                <span  style="color:{{ $settingdata['custom_text_color'] ?? '#614AB5' }};"   aria-hidden="" class="marquee">{{ $settingdata['custom_text'] ?? 'Add to Cart' }}</span>
                                                            </div>
                                                        </button>
                                                    @elseif(isset($settingdata['diff_buttonstyle']) && $settingdata['diff_buttonstyle'] == 'buttonstyle3' )
                                                            <button style="background-color: {{ $settingdata['custom_button_color'] ?? 'red' }};" class="btn3 button cart-btn3"  style="display:block;">
                                                                <span style="background-color: {{ $settingdata['custom_button_color'] ?? '#614AB5' }};" class="button_lg">
                                                                    <span class="button_sl"></span>
                                                                    <span style="color:{{ $settingdata['custom_text_color'] ?? '#614AB5' }};" class="button_text">{{ $settingdata['custom_text'] ?? 'Add to Cart' }}</span>
                                                                </span>
                                                            </button>
                                                    @elseif(isset($settingdata['diff_buttonstyle']) && $settingdata['diff_buttonstyle'] == 'buttonstyle4' )    
                                                            <button class="cssbuttons-io-button button4 cart-btn4" style="display:block;"> 
                                                               <p style="color:{{ $settingdata['custom_text_color'] ?? '#614AB5' }};"> {{ $settingdata['custom_text'] ?? 'Add to Cart' }}</p>
                                                                <div class="icon">
                                                                    <svg  height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                                                        <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path>
                                                                    </svg>
                                                                </div>
                                                            </button>
                                                    @elseif(isset($settingdata['diff_buttonstyle']) && $settingdata['diff_buttonstyle'] == 'buttonstyle5' ) 
                                                        <div class="button5 cart-btn5" style="display:block;">
                                                            <div  style="background-color:{{ $settingdata['custom_button_color'] ?? '#614AB5' }};" class="button555">
                                                                <span style="color:{{ $settingdata['custom_text_color'] ?? '#614AB5' }};" class="button__text">{{ $settingdata['custom_text'] ?? 'Add to Cart' }}</span>
                                                                <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
                                                            </div>
                                                        </div>
                                                    @endif

                                                @endif
                                             
                                                {{-- 🔘 Button Preview --}}

                                            <button class="cart-button-style1"  style="display:none;">
                                                <div   class="preview-btn-container ">
                                                    <div class="button button-color" style="background: {{ $settingdata['custom_button_color'] ?? '#007bff' }};">
                                                        <img src="{{ asset('images/arrow.png') }}" alt="">{{ $settingdata['custom_text'] ?? 'Add to Cart' }}
                                                    </div>
                                                </div>
                                            </button>

                                            <button  class="btn-23 cart-button-style2" style="display:none; background-color: {{ $settingdata['custom_button_color'] ?? '#614AB5' }};">
                                               <div>
                                                    <span class="text">{{ $settingdata['custom_text'] ?? 'Add to Cart' }}</span>
                                                    <span aria-hidden="" class="marquee">{{ $settingdata['custom_text'] ?? 'Add to Cart' }}</span>
                                                </div>
                                            </button>

                                            <button  class="btn3  cart-button-style3" style="display:none; background-color: {{ $settingdata['custom_button_color'] ?? '#614AB5' }};">
                                                <span  class="button_lg" style="background-color: {{ $settingdata['custom_button_color'] ?? '#614AB5' }};">
                                                    <span class="button_sl"></span>
                                                    <span class="button_text">{{ $settingdata['custom_text'] ?? 'Add to Cart' }}</span>
                                                </span>
                                            </button>                                                                                        
     
                                            <button  class="cssbuttons-io-button  cart-button-style4  button button4" style="display:none; background-color: {{ $settingdata['custom_button_color'] ?? '#614AB5' }};">
                                                {{ $settingdata['custom_text'] ?? 'Add to Cart' }}
                                                <div style="background-color: {{ $settingdata['custom_button_color'] ?? '#614AB5' }};" class="icon">
                                                    <svg  height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path>
                                                    </svg>
                                                </div>
                                            </button>
                                      
                                            <div  class="button5 cart-button-style5" style="display:none;">
                                                <div style="background-color:{{ $settingdata['custom_button_color'] ?? '#614AB5' }};" class="button555">
                                                    <span class="button__text">{{ $settingdata['custom_text'] ?? 'Add to Cart' }}</span>
                                                    <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
                                                </div>
                                            </div>
                                                               
                                          
                                            {{-- 🔢 Quantity Selector Previews --}}

                                            <div id="preview-quantity" class="preview-block quantity-style1" style="display:none;"> 
                                                <div class="counter-box qntbtn1 style1 form-group counter" style="background-color: {{ $settingdata['custom_quantity_color'] ?? '#f2f2f2' }};">
                                                    <button class="btn plus" style="color: {{ $settingdata['custom_puls_minus_color'] ?? '#000000' }}">+</button>
                                                        <span class="count">3</span>
                                                    <button class="btn minus" style="color: {{ $settingdata['custom_puls_minus_color'] ?? '#000000' }}">−</button>
                                                </div>  
                                            </div>

                                            <div id="preview-quantity" class="preview-block  quantity-style2" style="display:none;">
                                                <div class="counter-box  qntbtn2 style2 form-group counter " style="background-color: {{ $settingdata['custom_quantity_color'] ?? '#f2f2f2'}};">
                                                    <button class="btn plus" style="color: {{ $settingdata['custom_puls_minus_color']  ?? '#000000' }}">+</button>
                                                        <span class="count">3</span>
                                                    <button class="btn minus" style="color: {{ $settingdata['custom_puls_minus_color'] ?? '#000000' }}">−</button>
                                                </div>    
                                            </div>

                                            <div id="preview-quantity" class="preview-block quantity-style3" style="display:none;">
                                                <div class="qntbtn3 style3">
                                                    <div class="counter-box custom-input" style="background-color: {{ $settingdata['custom_quantity_color'] ?? '#f2f2f2' }};">
                                                        <span class="value" style="color: {{ $settingdata['custom_puls_minus_color'] ?? '#f2f2f2' }}">3</span>
                                                        <div class="arrows">
                                                            <button class="arrow up" style="color: {{ $settingdata['custom_puls_minus_color'] ?? '#000000' }}">▲</button>
                                                            <button class="arrow down" style="color: {{ $settingdata['custom_puls_minus_color'] ?? '#000000' }}">▼</button>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>

                                            <div id="preview-quantity" class="preview-block quantity-style4" style="display:none;">
                                                <div class="qntbtn4">
                                                    <div class="counter counter-box style4" data-index="3"  style="background-color: {{ $settingdata['custom_quantity_color'] ?? '#f2f2f2' }};">
                                                        <button class="btn left" style="color: {{ $settingdata['custom_puls_minus_color'] ?? '#000000' }}">◀</button>
                                                        <span class="count" style="color: {{ $settingdata['custom_puls_minus_color'] ?? '#000000' }}">3</span>
                                                        <button class="btn right" style="color: {{ $settingdata['custom_puls_minus_color'] ?? '#000000' }}">▶</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="preview-quantity" class="preview-block quantity-style5" style="display:none;">
                                                <div class=" qntbtn5">
                                                    <div class="counter counter-box style5" data-index="4" style="background-color: {{ $settingdata['custom_quantity_color'] ?? '#f2f2f2' }};">
                                                        <span class="btn plus" style="color: {{ $settingdata['custom_puls_minus_color'] ?? '#000000' }}">+</span>
                                                        <span class="count" style="color: {{ $settingdata['custom_puls_minus_color'] ?? '#f2f2f2' }}">3</span>
                                                        <button class="btn minus" style="color: {{ $settingdata['custom_puls_minus_color'] ?? '#000000' }}">−</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="preview-quantity" class="preview-block quantity-style6" style="display:none;">
                                                <div class=" qntbtn6">
                                                    <div class="counter counter-box style6" data-index="5" style="background-color: {{ $settingdata['custom_quantity_color'] ?? '#f2f2f2' }}" >
                                                        <button class="btn plus" style="color: {{ $settingdata['custom_puls_minus_color'] ?? '#000000' }}">+</button>
                                                            <span class="count" style="color: {{ $settingdata['custom_puls_minus_color'] ?? '#000000' }}">3</span>
                                                        <button class="btn minus" style="color: {{ $settingdata['custom_puls_minus_color'] ?? '#000000' }}">−</button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="tab-folder">
                            <div class="card-section tab-content" id="advanced-customization">

                                <form id="advance-customize-form" method="POST" action="/general_setting">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <section class="full-width">
                                        <article class="">
                                            <div class="columns eight">
                                                <div class="">
                                                    <h2 id="customization-heading"><b>Advanced Customization</b></h2>
                                                    <p>Here is the guide to get started.Here is the all of the button customization available </p>
                                                </div>
                                            </div>
                                        </article>
                                    </section> 
                                    <br>

                                    <section class="full-width">
                                        <aside  class="columns four">
                                            <div style="margin-top:10px">
                                            <label>  Redirect policy </label>
                                            </div>
                                        </aside>
                                        <article class="columns eight">
                                            <div style="border-radius: 25px;" class="card columns eight">


                                                <select id="redirectPolicy" name="redirect_policy" style="width:100%; padding:8px; border-radius:6px; border:1px solid #ccc;">
                                                    <option value="cart" {{ ($settingdata['redirect_policy'] ?? '') == 'cart' ? 'selected' : '' }}>Redirect to the cart page</option>
                                                    <option value="stay" {{ ($settingdata['redirect_policy'] ?? '') == 'stay' ? 'selected' : '' }}>Stay on the same page</option>
                                                    <option value="checkout" {{ ($settingdata['redirect_policy'] ?? '') == 'checkout' ? 'selected' : '' }}>Redirect to checkout page</option>
                                                </select>
                                                
                                                <p style="margin-top:8px; font-size:14px; color:#666;">
                                                        Redirection after adding products to the shopping cart
                                                </p>
                                                        
                                            </div>
                                        </article>
                                    </section>

                                    <section class="full-width">
                                        <aside  class="columns four">
                                            <div style="margin-top:10px">
                                            <label  for="priceRange">Price Range for variants</label>
                                            </div>
                                        </aside>
                                        <article class="columns eight">
                                            <div style="border-radius: 25px;" class="card columns eight">

                                            <select id="priceRange" name="var_price_range" style="width:100%; padding:8px; border-radius:6px; border:1px solid #ccc;">
                                                <option value="min"     {{ ($settingdata['var_price_range'] ?? '') == 'min' ? 'selected' : '' }}>For min price</option>
                                                <option value="minmax"  {{ ($settingdata['var_price_range'] ?? '') == 'minmax' ? 'selected' : '' }}>For min &amp; max price</option>
                                                <option value="regular" {{ ($settingdata['var_price_range'] ?? '') == 'regular' ? 'selected' : '' }}>Regular Price</option>
                                            </select>

                                            </div>
                                        </article>
                                    </section>

                                    <section class="full-width">
                                        <article>
                                            <div class=" column twelve">
                                                <div class="align-right">
                                                    <button id="clickMe"  class="btn-save button eosh-brand-btn">Save</button>
                                                </div>
                                            </div>
                                        </article>
                                    </section>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </article>
        </section>

@endsection 




       