<section class="full-width zero-bottom-padding">
    <article>
        <div class="column twelve">
            <div class="table-card card">
                <h2 class="eosh-h2">Help Center</h2>

                <div class="" style="display: flex; justify-content: space-between; flex-wrap: wrap;">

                    <!-- First Card -->
                    <div class="card column help-center-card">
                        <a href="{{ custom_route('faq') }}" onclick="handleNavigation('/faq')">
                            <svg style="color: #007ace" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="#007bff">
                                <circle cx="12" cy="12" r="12" />
                                <text x="50%" y="50%" text-anchor="middle" fill="white" font-size="12" font-family="Arial" dy=".3em">?</text>
                            </svg>
                            <span class="nav-breadcrumb-title" style="margin-left:8px;">
                              Popular FAQ's
                            </span>
                        </a>
                        <p></p>
                        <p class="para_size">
                            Check your common questions and quick answers regarding the app.
                        </p>
                    </div>

                    <!-- Second Card -->
                    <div class="card column help-center-card">
                        <a href="https://support.extendons.com/open.php" target="_blank">
                            <svg style="color: #007ace" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="#007bff">
                                <circle cx="12" cy="12" r="12" />
                                <path d="M8 9h8v2H8zm0 3h6v2H8z" fill="white" style="color: white" />
                            </svg>
                            <span class="nav-breadcrumb-title" style="margin-left:8px;">
                                Contact Us
                            </span>
                        </a>
                        <p></p>
                        <p class="para_size">
                            Chat with us for instant assistance!
                        </p>
                    </div>

                    <!-- Third Card -->
                    <?php $start = $start ?? 0; ?>

                        <div class="card column help-center-card">
                            <a href="{{ asset('Topimages/HidePriceLatest.mp4') }}" class="video-play-btn" data-start="{{ $start }}" data-fancybox="video-gallery">
                                <svg style="color: #007ace" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="#00b3b3">
                                    <circle cx="12" cy="12" r="12" />
                                    <polygon points="10,8 16,12 10,16" fill="white"/>
                                </svg>
                                <span class="nav-breadcrumb-title" style="margin-left:8px;">
                                Quick Tutorials
                                </span>
                            </a>
                            <p></p>
                            <p class="para_size">
                                Get started quickly with our easy app tutorial!
                            </p>
                        </div>

                        <!-- Fourth Card -->
                        <div class="card column help-center-card">
                            <a  onclick="handleNavigation('/user-guide')">
                                <svg style="color: #007ace" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="#007ace">
                                    <rect x="6" y="4" width="12" height="16" fill="#007bff" stroke="#007ace" stroke-width="2"/>
                                    <line x1="8" y1="6" x2="16" y2="6" stroke="white" stroke-width="1"/>
                                    <line x1="8" y1="10" x2="16" y2="10" stroke="white" stroke-width="1"/>
                                </svg>
                                <span class="nav-breadcrumb-title" style="margin-left:8px;">
                                    User Guide
                                </span>
                            </a>
                            <p></p>
                            <p class="para_size">
                                Click here to access the user guide, Here you will find step-by-step instructions
                            </p>
                        </div>
                </div>
                
            </div>
        </div>
    </article>
</section>



