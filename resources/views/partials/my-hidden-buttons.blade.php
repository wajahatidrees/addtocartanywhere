{{-- App Setting --}}
<a class="button hidden-app_language-next-button  page-app_setting" href="{{ custom_route('show-setting', ['flow' => 'modal']) }}" style="display: none;">
    App Configuration
</a>


@if($themeNew)
{{-- App Embed --}}
<a class="button hidden-app_rule-next-button page-app_embed" href="https://admin.shopify.com/store/{{$storeName}}/themes/{{$currentThemeId}}/editor
?context=apps" target="_blank" style="display: none;">
   Enable App Embed
</a>
@else
    <a class="button hidden-app_rule-next-button page-app_embed" href="#" style="display: none;">
        <p class="body_btn">Your Theme is not OS:2.0, You Don't Need to enable App Embed.</p>
    </a>
@endif


