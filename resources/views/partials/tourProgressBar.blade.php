<div class="badges">
    @php
        $pageImages = [
            'app_language' => 'tourGuide/app_language.png',
            'app_setting' => 'tourGuide/app_configuration.png',
        ];

        $pageRoutes = [
            'app_language' => 'show-setting',
            'app_setting' => 'show-setting',
        ];

        $pages = [
            'app_language' => 'Select Language',
            'app_setting' => 'General Settings'
        ];

        if ($themeNew) {
            $pageImages['app_embed'] = 'tourGuide/app_embed.png';
            $pageRoutes['app_embed'] = "https://admin.shopify.com/store/{$storeName}/themes/{$currentThemeId}/editor?context=apps";
            $pages['app_embed'] = 'App Embeds';
        }

    @endphp
   
    @foreach ($pages as $page => $title)
   
        <div class="badge_details">
            @php
                $href = filter_var($pageRoutes[$page], FILTER_VALIDATE_URL) ? $pageRoutes[$page] : custom_route($pageRoutes[$page]);
            @endphp
            <a id="{{ $page }}" class="{{ $page }}" href="{{ $href }}" {{ $page == 'app_embed' ? 'target="_blank"' : '' }} >
                <div class="badge_icon {{ $progressBar[$page] || $page == 'app_language' ? 'active' : '' }}">
                    <img src="{{ asset($pageImages[$page]) }}" alt="{{ $title }}" width="auto" height="auto">
                </div>
            </a>
            <span class="badge_title">{{ $title }}</span> 
           
        </div>
    @endforeach
</div>
