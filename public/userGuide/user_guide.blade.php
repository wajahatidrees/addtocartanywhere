
@extends('shopify-app::layouts.default')
@section('content')

    <!-- <html lang="en-us">
            <head>
                <meta charset="utf-8">
                <title>Extendons Animated Login App</title>
                <meta name="description" content="Provide discount to the customers">
                <meta name="author" content="Extendons">
                <link rel="stylesheet" href="{{asset('css/uptown.css') }}" media="all">			
                <script>document.createElement('section');var duration='500',easing='swing';</script>
            </head>
            <body>
            <section></section>

                <section class="full-width">  
                    <article>
                            <div  class="columns seven top_btn">
                                <a class="button" href="{{ custom_route('home') }}"><span>Back</span></a>                        
                                <a class="link" style="padding-right: 10px;" target="_blank" href="https://support.extendons.com/">Get Support</a>
                            </div>
                            <div class="columns five">  
                                <div class="align-right" style=""> 
                                <a class="button" href="{{ custom_route('/general_setting') }}"><i  class="icon-gear append-spacing"></i><span>Setting</span></a> 
                                <a class="button" href="{{ custom_route('/rules') }}"><span class="user_guide">Add Rule</span></a> 
                                </div>
                            </div> 
                    </article>  
                </section> 

                <section class="full-width">
                    <article>
                            <div class="columns ten"></div>
                            <div class="columns two">
                                    @include('partials.langDropDown')
                            </div>
                    </article>
                </section>

                <section class="full-width">
                    <article>
                        <div class="card">
                            <div class="row">
                            <div class="columns twelve">
                            <div id="documenter_content"  class="user_guide" style="margin-left:150px">

                            <h3 style="color:#5F6DC5;font-family:'Open Sans Semibold';font-variant: small-caps; font-size:32px">How To Install Extendons Animated Login App</h3><br>
                            <p style="font-family:'Open Sans'; font-size:17px">
                                Go to the <strong style="color:#5F6DC5;font-size:17px;font-family:'Open Sans Semibold'">Apps</strong> store. Here you will find the Extendons Animated Login App. Click on the <strong style="color:#5F6DC5;font-size:17px;font-family:'Open Sans Semibold'">Extendons Animated Login App </strong> and add it to your store.</p>
                            <br>
                        <img loading="lazy"  alt="" src="{{asset('images/image_1.webp')}}"><br> 
                        <br/>
                        <p>
                        <span style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;; font-size: 25px; font-variant-caps: small-caps;">SETTINGS</span></p>
                        <p style="font-family:'Open Sans'; font-size:17px">
                            Click on <strong style="color:#5F6DC5;font-size:17px;font-family:'Open Sans Semibold'">settings</strong> tab in this tab you can configure the following settings that is listed below:  
                        </p>
                        <p>
                        <br/>
                        <p>
                            <p style="font-family:'Open Sans'; font-size:17px">
                            <strong style="color:#5F6DC5;font-size:17px;font-family:'Open Sans Semibold'">Note</strong> This settings can be used for customize button and background color for by default login, signup and forgot forms. 
                        </p>

                    <ul>
                        <li style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                            <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">Enable App:</strong>&nbsp;Option to enable disable the app functionality

                    </ul>

                    <ul>
                        <li style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                            <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">Hide Form :</strong>&nbsp; Option to hide by default login form, signup and forgot forms </li>
                    </ul>

                    <ul>
                        <li style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                            <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">Select Bg Color:</strong>&nbsp;  Option to choose color for forms background that is more suitable with your theme</li>
                    </ul>

                    <ul>
                        <li style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                            <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">Select Button Color:</strong>&nbsp; 	 Option to choose color for form buttons</li>
                    </ul>

                    <ul>
                        <li style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                            <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">Select Forms/Pages:</strong>&nbsp;	 	 Option to select pages where you want to display these settings i.e.  Login page, signup page and forget page</li>
                    </ul>
                    <br>
                    <img loading="lazy"  alt="" src="{{asset('images/image_2.webp')}}">
                    <br>

                    <p class="Body" style="margin-top: 48px">
                        <span style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;; font-size: 25px; font-variant-caps: small-caps;">How To Create Rules</span></p>
                    <p style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                        Here you will have to provide the following rule settings:</p>

                    <p style="color:#5F6DC5;font-family:'Open Sans Semibold';font-variant: small-caps; font-size:25px">
                        Rule Settings&nbsp;</p>

                    <ul>
                        <li style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                            <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">Enables/Disable:</strong>&nbsp;Option to enable disable the new or existing rule	</li>
                    </ul>


                    <ul>
                        <li style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                            <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">Select Template :</strong>&nbsp;	 Select template from dropdown 	</li>
                    </ul>


                    <ul>
                        <li style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                            <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">Select Template Page: </strong>&nbsp;  Here you can select and customize the selected pages i.e login, signup and forget page</li>
                    </ul>
                    <br>
                    <img loading="lazy"  alt="" src="{{asset('images/image_3.webp')}}">
                    <br>
                    <p class="Body">
                        <span style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;; font-size: 25px; font-variant-caps: small-caps;"><br>Customize Template Page</span></p>
                    <p style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                        Here you will have to provide the following  settings for customize login, signup and forgot page: </p>

                    <p style="color:#5F6DC5;font-family:'Open Sans Semibold';font-variant: small-caps; font-size:25px">
                    
                    Customize Login Page &nbsp;</p>
                    <ul>
                        <li style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                            <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">Enables/Disable:</strong>&nbsp;Option to enable the login form for customization	</li>
                    </ul>


                    <ul>
                        <li style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                            <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">Heading:</strong>&nbsp;	 Add heading text you want to dispay on login form page <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">i.e</strong>&nbsp;  welcome , store name  	</li>
                    </ul>
                    <ul>
                        <li style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                            <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">Sub Heading:</strong>&nbsp;	 Add Sub heading text you want to dispay on login form page <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">i.e</strong>&nbsp;  welcome , store name  	</li>
                    </ul>
                    <ul>
                        <li style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                            <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">Email:</strong>&nbsp; Enter a placeholder that will display in the email field <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">e.g.</strong>&nbsp;  Enter your email address here      	</li>
                    </ul>
                    <ul>
                        <li style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                            <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">Password:</strong>&nbsp; Enter a placeholder that will display in the reset password field <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">e.g.</strong>&nbsp;  Enter your new password here </li>
                    </ul>
                    <ul>
                        <li style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                            <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">Password:</strong>&nbsp; Enter a placeholder that will display in the password field <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">e.g.</strong>&nbsp;  Enter your password here </li>
                    </ul>


                    <ul>
                        <li style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                            <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">Login Button: </strong>&nbsp;  Here you can customize the button label text <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">i.e.</strong>&nbsp; Login, Join Us </li>
                    </ul>
                    <br>
                    <img  loading="lazy"  alt="" src="{{asset('images/image_4.webp')}}">
                    <br>

                    <p style="color:#5F6DC5;font-family:'Open Sans Semibold';font-variant: small-caps; font-size:25px">
                        <br>
                        Customize Sign Up Page &nbsp;</p>
                        <img loading="lazy"  alt="" src="{{asset('images/image_5.webp')}}">

                        <br/>
                    <p style="color:#5F6DC5;font-family:'Open Sans Semibold';font-variant: small-caps; font-size:25px">
                        <br>
                        Customize Forgot Page &nbsp;</p>
                        <img loading="lazy"  alt="" src="{{asset('images/image_6.webp')}}">
                    <br>
                    <p style="color:#5F6DC5;font-family:'Open Sans Semibold';font-variant: small-caps; font-size:25px">
                        <br>
                        Preview Templates&nbsp;</p>
                    <p style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                        Click on <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">preview template</strong>&nbsp; tab here you check the customize settings on all pages with live preview.</p>
                        <br>
                        <img loading="lazy"  alt="" src="{{asset('images/image_7.webp')}}">
                        <br>
                    <p style="color:#5F6DC5;font-family:'Open Sans Semibold';font-variant: small-caps; font-size:25px">
                        <br>
                        Rules Management&nbsp;</p>
                    <p style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                        Click on rule button here you can manage rules. Here you can check the following details: </p>
                        <ul>
                        <li style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                            <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;"> Create New Rules: </strong>&nbsp;</li>
                    </ul>
                    <ul>
                        <li style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                            <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">  Enable/Disable Rules Status: </strong>&nbsp;</li>
                    </ul>
                    <ul>
                        <li style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                            <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;"> Edit Rule: </strong>&nbsp;</li>
                    </ul>
                    <ul>
                        <li style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                            <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;"> Delete Rule: </strong>&nbsp;</li>
                    </ul>
                    <br>
                    <img  loading="lazy"   alt="" src="{{asset('images/image_11.webp')}}">
                    <br>

                    <p style="color:#5F6DC5;font-family:'Open Sans Semibold';font-variant: small-caps; font-size:25px">
                    <br>
                    DISPLAY SETTINGS FOR OS 2.0&nbsp;</p>
                        <p style="color:#5F6DC5;font-family:'Open Sans Semibold';font-variant: small-caps; font-size:17px">
                        APPS EMBEDS&nbsp;</p>
                    <p style="font-family: &quot;Open Sans&quot;; font-size: 17px;">
                        At the admin <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;"> dashboard</strong>, click on <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;"> online store</strong> and select themes, click on <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;"> customize</strong>
                    button go to <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;"> theme settings</strong>  > App Embeds At <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;"> apps embeds</strong>  section here you can  Enable <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;"> Extendons Animated Login Section</strong>  and save settings by clicking on <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;"> save</strong>  button.
                    </p>
                    <br/>
                    <img loading="lazy"  alt="" src="{{asset('images/image_70.webp')}}">
                    <br/>
                    <img loading="lazy"  alt="" src="{{asset('images/image_8.webp')}}">
                    <br>
                    <img loading="lazy"  alt="" src="{{asset('images/image_9.webp')}}">
                    <br/>
                    <p style="color:#5F6DC5;font-family:'Open Sans Semibold';font-variant: small-caps; font-size:25px">
                    <br>
                        Extendons Animated Login App Front-End View (Multiple Login, Signup & Forgot Pages Style)&nbsp;</p>
                        <br/>
                    <img loading="lazy"  alt="" src="{{asset('images/image_12.webp')}}">
                    <br/>
                    <img loading="lazy"  alt="" src="{{asset('images/image_13.webp')}}">
                    <br>
                    <br>
                    <img loading="lazy"  alt="" src="{{asset('images/image_14.webp')}}">
                    <br>
                    <p style="color:#5F6DC5;font-family:'Open Sans Semibold';font-variant: small-caps; font-size:25px">
                        <br>
                        Multiple Login Templates &nbsp;</p>
                        <br>
                    <img loading="lazy"   alt="" src="{{ asset('images/image_15.webp ')}}">
                    <br>	
                    </ul>

                    </ul>
                    </li>
                    </ul>
                    <br>

                    <p style="color:#5F6DC5;font-family:'Open Sans Semibold';font-variant: small-caps; font-size:25px">
                        HOW TO Uninstalll Extendons Animated Login App &nbsp;</p>
                        
                    <p style="font-family:'Open Sans'; font-size:17px">
                        At the admin dashboard, go to the  <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">Apps</strong> section and uninstall the Extendons Animated Login App</p>
                    <br>
                    <p style="color:#5F6DC5;font-family:'Open Sans Semibold';font-variant: small-caps; font-size:25px">
                        DISCLAIMER &nbsp;</p>
                    <p style="font-family:'Open Sans'; font-size:17px">
                        It is highly recommended to back up your server files and database before installing this app.</p>
                    <p style="font-family:'Open Sans'; font-size:17px">
                        No responsibility will be taken for any adverse effects occurring during installation. </p>
                    <p style="font-family:'Open Sans'; font-size:17px">
                        <strong style="color: rgb(95, 109, 197); font-family: &quot;Open Sans Semibold&quot;;">It is recommended you install on a test server initially to carry out your own testing.</strong></p>
                    </div>



                                </div>
                            </div>
                        </div>
                    </article>
                </section>

            </body>
    </html> -->

    <html lang="en-us">
    
        <head>
            <meta charset="utf-8">
            <title>update Extendons Animated Login App</title>
            <meta name="description" content="Provide discount to the customers">
            <meta name="author" content="Extendons">
            <link rel="stylesheet" href="{{asset('css/uptown.css') }}" media="all">			
            <script>document.createElement('section');var duration='500',easing='swing';</script>
            <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"> -->
            <link rel="stylesheet" href="{{asset('css/custom.css') }}" media="all">	
          
            <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/userguide.css') }}"> -->
        </head>

        <body>

                 <section></section>

                <section class="full-width">  
                    <article>
                            <div  class="columns seven top_btn">
                                <a class="button" href="{{ custom_route('home') }}"><span>Back</span></a>                        
                                <a class="link" style="padding-right: 10px;" target="_blank" href="https://support.extendons.com/">Get Support</a>
                            </div>
                            <div class="columns five">  
                                <div class="align-right" style=""> 
                                <a class="button" href="{{ custom_route('/general_setting') }}"><i  class="icon-gear append-spacing"></i><span>Setting</span></a> 
                                <a class="button" href="{{ custom_route('/rules') }}"><span class="user_guide">Add Rule</span></a> 
                                </div>
                            </div> 
                    </article>  
                </section> 
                <section class="eosh_app_user_guide">

                <h1>Extendons Animated Login App</h1>

                <div class="align-center eosh_guide_btn">
                    <a class="default" href="#general_setting">General Settings</a>
                    <a class="default" href="#create_rule">Create Rule</a>
                    <a class="default" href="#app_embed">Enable App Embeds</a>
                    <a class="default" href="#live_preview">Watch Live Preview</a>

                    <a class="default" href="https://api.whatsapp.com/send/?phone=03054285555&text&type=phone_number&app_absent=0"  target="_blank">Contact Support</a>

                </div>

                <video id="video" width="1000" height="400" controls>
                    <source src="{{asset('images/AnimatedLoginFormAppVideo.mp4')}}" type="video/mp4">
                </video>

                <center>

                <strong style="color:#FF5050;font-family:'Open Sans Semibold'; font-size:20px">Follow the steps below to configure the app. In case of any issues, feel free to contact the support team</strong></center>
                <span class="eosh_under_heading">
                    Step 1: 
                </span>

                <hr class="notop">
                <span class="eosh_under_heading" id="general_setting">

                    <a id="play" href="#" class="eosh_video_break_btn">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>tutorial-icon</title>
                            <g id="tutorial-icon" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <path d="M22,3 C22.5522847,3 23,3.44771525 23,4 L23,18 C23,18.5522847 22.5522847,19 22,19 L16,19 L16,21 L8,21 L8,19 L2,19 C1.44771525,19 1,18.5522847 1,18 L1,4 C1,3.44771525 1.44771525,3 2,3 L22,3 Z M21,5 L3,5 L3,17 L21,17 L21,5 Z M9,7 L15,11 L9,15 L9,7 Z" id="Combined-Shape" fill="#FFFFFF"></path>
                            </g>
                        </svg>
                        Watch Me
                        <p class="timer">0:04</p>
                    </a>
                    How To Configure App "General Settings"
                </span>
                </span>

                <p>At the back end, go to App Configuration from the app page. check below sections and fill out one by one then click on save button. 
                </p>
                    <ul>
                        <li style="font-family:'Open Sans'; font-size:17px">
                            <strong style="color:#007ace;font-family:'Open Sans Semibold'; font-size:17px">Enable App:</strong> Click on enable app option and activate the app funtionality.</li>
                    </ul>

                    <ul>
                        <li style="font-family:'Open Sans'; font-size:17px">
                            <strong style="color:#007ace;font-family:'Open Sans Semibold'; font-size:17px">Hide Default Form </strong> Here you can hide default login form Functionality before selecting the animated login templates.
                        </li>
                    </ul>

                    <ul>
                        <li style="font-family:'Open Sans'; font-size:17px">
                            <strong style="color:#007ace;font-family:'Open Sans Semibold'; font-size:17px">Set Background and Button Colors</strong> Here you can choose custom colors for button and form background.
                        </li>
                    </ul>

                    <ul>
                        <li style="font-family:'Open Sans'; font-size:17px">
                            <strong style="color:#007ace;font-family:'Open Sans Semibold'; font-size:17px">Select Forms/Pages</strong> Here you can customize and apply setting on login,signup,forgot form/pages
                        </li>
                    </ul>

                    <img alt="" src="images/image_3.png">

                    <span class="eosh_under_heading">
                    Step 2: 
                    </span>

                    <hr class="notop">
                    <span class="eosh_under_heading" id="create_rule">
                        <a id="play" href="#" class="eosh_video_break_btn">
                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>tutorial-icon</title>
                                <g id="tutorial-icon" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <path d="M22,3 C22.5522847,3 23,3.44771525 23,4 L23,18 C23,18.5522847 22.5522847,19 22,19 L16,19 L16,21 L8,21 L8,19 L2,19 C1.44771525,19 1,18.5522847 1,18 L1,4 C1,3.44771525 1.44771525,3 2,3 L22,3 Z M21,5 L3,5 L3,17 L21,17 L21,5 Z M9,7 L15,11 L9,15 L9,7 Z" id="Combined-Shape" fill="#FFFFFF"></path>
                                </g>
                            </svg>
                            Watch Me 
                            <p class="timer">0:48</p>
                        </a>
                    Create Rule
                </span>
                </span>
                <p>At the back end, go to add rule button Here you can create rule for choose login template and customize text heading labels for fields"
                </p>
                
                <!-- <span class="eosh_under_heading" id="app_embed">
                    Step 3: 
                </span>
                <hr class="notop"> -->

                <span class="eosh_under_heading" id="app_embed">
                    Step 3: 
                <hr class="notop">
                    
                <a id="play" href="#" class="eosh_video_break_btn">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>tutorial-icon</title>
                        <g id="tutorial-icon" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <path d="M22,3 C22.5522847,3 23,3.44771525 23,4 L23,18 C23,18.5522847 22.5522847,19 22,19 L16,19 L16,21 L8,21 L8,19 L2,19 C1.44771525,19 1,18.5522847 1,18 L1,4 C1,3.44771525 1.44771525,3 2,3 L22,3 Z M21,5 L3,5 L3,17 L21,17 L21,5 Z M9,7 L15,11 L9,15 L9,7 Z" id="Combined-Shape" fill="#FFFFFF"></path>
                        </g>
                    </svg>
                    Watch Me
                    <p class="timer">1:45</p>
                </a>
                Enable APP Embed 
                </span>

                <p>At the back end, go to activate button online store > theme > enable app embeds and save it. Note "if you are not 2.0 user please don’t enable this options." 
                </p>
                <hr class="notop">

                <ol class="desc">
                    <li>From your Shopify admin, go to Online Store > Themes</li>
                    <li>Find the theme that you want to edit, and then click Customize</li>
                    <li>Open the drop-down menu at the top of the page.</li>
                    <li>Click on Theme Settings > Embeds App.</li>
                    <li>Look in the sidebar, Enable app embeds</li>
                </ol>

                <span class="eosh_under_heading">
                    Step 4: 
                </span>

                <hr class="notop">
                <span class="eosh_under_heading" id="live_preview">
                    <a id="play" href="#" class="eosh_video_break_btn">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>tutorial-icon</title>
                            <g id="tutorial-icon" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <path d="M22,3 C22.5522847,3 23,3.44771525 23,4 L23,18 C23,18.5522847 22.5522847,19 22,19 L16,19 L16,21 L8,21 L8,19 L2,19 C1.44771525,19 1,18.5522847 1,18 L1,4 C1,3.44771525 1.44771525,3 2,3 L22,3 Z M21,5 L3,5 L3,17 L21,17 L21,5 Z M9,7 L15,11 L9,15 L9,7 Z" id="Combined-Shape" fill="#FFFFFF"></path>
                            </g>
                        </svg>
                        Watch Me
                        <p class="timer">2:00</p>
                    </a>
                    Watch Live Preview 
                </span>

                </span>
                <p>After configuring the app and creating rules click on the online store and check results for your applied rule.  
                </p>


                <h4 class="eosh_demo">
                    <strong>Demo Link:</strong> <a href="https://extendons-animated-login-form.myshopify.com/account/login" target="_blank">https://extendons-animated-login-form.myshopify.com/account/login</a>
                </h4>


                <img alt="" src="images/image_5.png">
                <img alt="" src="images/image_6.png">
                <script src="js/jquery.js"></script>
        
                <script>
                        $(document).on("click", ".eosh_video_break_btn", function () {
                            let startTime = $(this).find('p').text();
                            var startTimeArray = startTime.split(":");
                            var minutes = parseInt(startTimeArray[0], 10) || 0;
                            var seconds = parseInt(startTimeArray[1], 10) || 0;
                            var totalSeconds = (minutes * 60) + seconds;
                            video.currentTime = totalSeconds;
                            $('#video').trigger('play');
                        });
                </script>

                <script src="{{ asset('js/gtranslate.js') }}"></script> 
            
                <script>
                    window.gtranslateSettings = {
                        "default_language": "en",
                        "wrapper_selector": ".gtranslate_wrapper"
                    }
                </script> 

                <script>
                    var timeout;

                    function invoke(e, t = 1) {
                        var gtElement = document.querySelector(".gt_selector");
                        var selectedLang = localStorage.getItem('lang');

                        if (timeout) clearTimeout(timeout);

                        if (!gtElement) {
                            return timeout = setTimeout(() => {
                                ++t;
                                invoke(e, t);
                            }, t);
                        }

                        gtElement.addEventListener("change", (e) => {
                            var selectedLang = e.target.value;
                            
                            if (selectedLang == 'en|en' || selectedLang == 'auto|en') {
                                doGTranslate(selectedLang);
                                localStorage.removeItem('lang');
                            } else {
                                localStorage.setItem('lang', selectedLang);
                            }
                        });

                        if (!selectedLang) return;
                        gtElement.value = selectedLang;
                        doGTranslate(selectedLang);
                    }

                    document.addEventListener('DOMContentLoaded', invoke);
                </script> 

        </body>
    </html>

    @endsection
