@extends('shopify-app::layouts.default')

@section('content')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/faq.css') }}">
@endsection
@section('scripts')
    <script src="{{ asset('js/faq.js' )}}" defer></script>
@endsection


@if (auth()->user()->name == 'motor-bikes-store.myshopify.com')
    <a href="{{ custom_route('shop-data.index') }}" class="eosh-app-btn-pr" style="margin-left:10px;">Export shop data</a>
@endif

<section class="full-width">
</section>

<section class="full-width zero-bottom-padding">
    <article>
        <div class="columns eight">
            <div class="nav-breadcrumb">
               
            </div>
            <h2 class="eosh-h2">Frequently Asked Questions</h2>
        </div>
        <div class=" columns two">
            <div class="align-right">
                <a class="get-support button eosh-default-btn" target="_blank" href="https://support.extendons.com/">Get Support</a>
            </div>
        </div>
        <div class="columns two">
            @include('partials.langDropDown')
        </div>
    </article>
</section>

<section class="full-width">
    <div class="eosh_faq_box">
        <div class="eosh_faq">
            <label class="eosh_question active">What does the Extendons Cart on Collections app do?
                <span><svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z"/></svg></span>
            </label>
            <div class="eosh_answer" style="max-height: 195px;">
                <p>The Extendons Cart on Collections app displays an 'Add to Cart' button directly on collection pages, allowing customers to add products to their cart without navigating to the product page.
                </p>
                <button class="eosh_chat-with-us button eosh-secondary-btn">Chat with us <span>(50)</span></button>
            </div>
        </div>
        <div class="eosh_faq">
            <label class="eosh_question">Can I customize the 'Add to Cart' button?
                <span><svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z"/></svg></span>
            </label>
            <div class="eosh_answer">
                <p>Yes, you can customize the text and color of the 'Add to Cart' button to match your store's theme and branding.
                </p>
                <button class="eosh_chat-with-us button eosh-secondary-btn">Chat with us <span>(45)</span></button>
            </div>
        </div>


        <div class="eosh_faq">
            <label class="eosh_question">Is it possible to show icons or buttons on collection pages?
                <span><svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z"/></svg></span>
            </label>
            <div class="eosh_answer">
                <p>Yes, merchants can choose to display either icons or buttons on their collection pages, enhancing the visual appeal and functionality.
                </p>
                <button class="eosh_chat-with-us button eosh-secondary-btn">Chat with us <span>(40)</span></button>
            </div>
        </div>

        <div class="eosh_faq">
            <label class="eosh_question">Will the 'Add to Cart' button be visible on the home page?
                <span><svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z"/></svg></span>
            </label>
            <div class="eosh_answer">
                <p> Yes, the 'Add to Cart' button can be displayed on the featured collection section of the home page, making it easier for customers to purchase products directly from the home page.
                </p>
                <button class="eosh_chat-with-us button eosh-secondary-btn">Chat with us <span>(35)</span></button>
            </div>
        </div>

        <div class="eosh_faq">
            <label class="eosh_question">Can customers select variant options like size and color directly from the collection page?
                <span><svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z"/></svg></span>
            </label>
            <div class="eosh_answer">
                <p>Yes, customers can select variant options such as size and color directly from the collection page, streamlining the shopping experience.
                </p>
                <button class="eosh_chat-with-us button eosh-secondary-btn">Chat with us <span>(30)</span></button>
            </div>
        </div>

        <div class="eosh_faq">
            <label class="eosh_question">Does the app display the 'Add to Cart' button in search results?
                <span><svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z"/></svg></span>
            </label>
            <div class="eosh_answer">
                <p>Yes, the app also displays the 'Add to Cart' button in search results, allowing customers to add products to their cart straight from the search results page.
                </p>
                <button class="eosh_chat-with-us button eosh-secondary-btn">Chat with us <span>(25)</span></button>
            </div>
        </div>
    </div>
</section>

<section></section>

@include('footer.footer')
@endsection