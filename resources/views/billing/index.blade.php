

@extends('shopify-app::layouts.default')
@section('content')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/billing.css') }}">
@endsection
<section></section>

<section class="full-width">
    <article style="align-items: center; justify-content: space-between;">
        @canany(['isBasic', 'isBasicAnnual'])
            <div class="nav-breadcrumb">
                <a onclick="handleNavigation('')"> <i class="icon-prev"></i>
                    <span class="nav-breadcrumb-title" style="margin-left:8px">Back</span>
                </a>
            </div>
        @endcanany
        <div>
        @include('partials.langDropDown')
       </div>
    </article>
</section>

<section class="full-width">
    <article>
        <main>
            <header class="eosh_billing-header">
                <div class="eosh_plan-btn">
                    <button onclick="changePlanTab('monthly')"  @canany(['isBasic', 'isNULL']) class="secondary eosh_monthly-btn eosh_active" @else class="secondary eosh_monthly-btn" @endcan>Monthly</button>
                    <button onclick="changePlanTab('yearly')"  @can('isBasicAnnual') class="secondary eosh_yearly-btn eosh_active" @else class="secondary eosh_yearly-btn" @endcan>Yearly (Save 16%)</button>
                </div>
            </header>
            <div class="neosh-plans">
                <div class="neosh-plan-card neosh-monthly @canany('isBasic') neosh-active-plan @endcan"
                     @canany(['isBasic', 'isNULL']) style="display:initial;" @elsecanany('isBasicAnnual') style="display: none;"
                    @endcan>
                    <div class="neosh-upper">
                        <h2 class="neosh-plan-title">Monthly Basic Plan</h2>
                    </div>
                    <div class="neosh-plan-desc">
                        Enjoy premium access of all features and level up your options with no limitations
                    </div>
                    <div class="neosh-plan-tabs">
                        <div class="neosh-plan-tab">
                            <span class="neosh-tab-upper">
                                5-Day Free Triall
                            </span>
                            <div class="neosh-price-wrapper">
                                <span class="neosh-price">$1.99<span class="neosh-price-sub"> /month</span></span>
                            </div>
                        </div>
                        <div class="neosh-plan-tab">
                                <ul>
                                    <li> <i class="neosh-feature"></i>Multiple Animated Templates</li>
                                    <li> <i class="neosh-feature"></i>Customize Template</li>
                                    <li> <i class="neosh-feature"></i>Heading Fields</li>
                                    <li> <i class="neosh-feature"></i>Placeholders</li>
                                    <li> <i class="neosh-feature"></i>Rule Based Management</li>
                                    <li> <i class="neosh-feature"></i>Change Default Login page color</li>
                                </ul> 
                        </div>
                    </div>
                    <a href="{{ custom_route('change.plan',['plan' => 'Basic'])}}" @can('isBasic') class="button eosh-secondary-btn neosh-plan-btn eosh-btn-disabled" @endcan  class="button eosh-brand-btn neosh-plan-btn">@can('isBasic') Current Activated Plan @else Pick Your Plan @endcan </a>
                </div>


                <div class="neosh-plan-card neosh-anually @canany('isBasicAnnual') neosh-active-plan @endcan" @canany(['isBasic', 'isNULL']) style="display:none;" @endcan>
                    <div class="neosh-upper">
                        <h2 class="neosh-plan-title">Basic Annual Plan</h2>
                        <span class="neosh-plan-badge">
                                   16% OFF
                                </span>
                    </div>
                    <div class="neosh-plan-desc">
                        Enjoy premium access of all features and level up your options with no limitations
                    </div>
                    <div class="neosh-plan-tabs">
                        <div class="neosh-plan-tab">
                            <span class="neosh-tab-upper">
                                5-Day Free Trial
                            </span>
                            <div class="neosh-price-wrapper">
                                <span class="neosh-price"><span class="neosh-price-sub neosh-compareat">$23.22</span>$20<span class="neosh-price-sub"> /year</span></span>
                            </div>
                        </div>
                        <div class="neosh-plan-tab">
                            <ul>
                                <li> <i class="neosh-feature"></i>Multiple Animated Templates</li>
                                <li> <i class="neosh-feature"></i>Customize Template</li>
                                <li> <i class="neosh-feature"></i>Heading Fields</li>
                                <li> <i class="neosh-feature"></i>Placeholders</li>
                                <li> <i class="neosh-feature"></i>Rule Based Management</li>
                                <li> <i class="neosh-feature"></i>Change Default Login page color</li>
                            </ul>
                        </div>
                    </div>
                    <a href="{{custom_route('change.plan',['plan' => 'BasicAnnual'])}}"  @can('isBasicAnnual') class="button eosh-brand-btn neosh-plan-btn eosh-btn-disabled" @endcan class="button eosh-brand-btn neosh-plan-btn"> @can('isBasicAnnual' )Current Activated Plan @else  Pick Your Plan  @endcan</a>
                </div>
            </div>
        </main>
    </article>
</section>

<script>
    function changePlanTab(plan) {
        if (plan == 'monthly') {
            document.querySelector('.neosh-monthly').style.display = 'initial';
            document.querySelector('.neosh-anually').style.display = 'none';
            document.querySelector('.eosh_monthly-btn').classList.add('eosh_active');
            document.querySelector('.eosh_yearly-btn').classList.remove('eosh_active');
        } else {
            document.querySelector('.neosh-monthly').style.display = 'none';
            document.querySelector('.neosh-anually').style.display = 'initial';
            document.querySelector('.eosh_yearly-btn').classList.add('eosh_active');
            document.querySelector('.eosh_monthly-btn').classList.remove('eosh_active');
        }
    }
</script>
@include('footer.footer')
@endsection