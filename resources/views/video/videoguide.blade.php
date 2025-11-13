@extends('shopify-app::layouts.default')

@section('content')

        <section></section>   

        <section class="full-width">  
            <article>
                <div class="columns six">
                    <h3>Extendons Cart on Collections</h3>
                </div>
                <div class="columns six">
                    <div class="align-right">
                        <a class="button secondary" href="{{ custom_route('show-setting')}}">
                            <span>Back</span>
                        </a>
                    </div>
                </div>
            </article> 
        </section>

        <div>
            <video width="100%" height="80%" controls>
                <source class="embed-responsive-item" src="{{ asset('images/add_to_cart_UserGuide.mp4') }}" allowfullscreen>
            </video>
        </div>

@endsection 