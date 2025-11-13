
@extends('shopify-app::layouts.default')

    @section('content')
    <section class="full-width zero-bottom-padding">
        <article>
            <div id="setup-guide-popup" class="setupGuide_popup table-card card">
                <div class="export-wrapper">
                    <h2 class="eosh-app-heading-size">Export Data</h2>
                    <p class="para_size" @if (!$nextUser) style="display:none;" @endif>Click the Button
                        below to start export batch</p>
                    <button class="eosh-app-btn-pr start-batch"
                        @if (!$nextUser) style="display:none;" @endif onclick="fetchData()">Start
                        batch</button>
                    <p class="para_size" @if ($nextUser) style="display:none;" @endif>All the shops has
                        been processed for data. Click the button below to export the data into a csv file.</p>
                    <a href="{{ \URL::tokenRoute('shop-data.export') }}" class="eosh-app-btn-pr export-data-btn"
                        @if ($nextUser) style="display:none;" @endif>Export CSV</a>
                </div>
            </div>
        </article>
    </section>
    @endsection


    @section('scripts')
    <script>
        async function fetchData(recursion = false) {
            if (!recursion) {
                $('.start-batch').css({
                    'opacity': 0.7,
                    'pointer-events': 'none'
                });
            }


            if ($('.export-info').length == 0) {
                $('.export-wrapper').append(
                    `<span class="export-info" style="margin-top:10px;display:block;color:#0da60d;">Data export is in progress. Please do not close or refresh this page until the process is complete.</span>`
                );
            }


            $.ajax({
                url: '/shop-data/fetch',
                method: 'GET',
                dataType: 'json',
                success: function(resJson) {
                    if (resJson.completed) {
                        $('.export-info').text(
                            'Data export is completed. Click the button below to export.');
                        $('.export-wrapper').append(
                            `<a href="{{ \URL::tokenRoute('shop-data.export') }}" class="export-data-btn" style="display:block;margin-top:5px;">Export Data</a>`
                        );
                    } else {
                        fetchData(true);
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error while fetching data:', error);
                }
            });
        }


        // $(document).on('click', '.export-data-btn', function(e) {
        //     e.preventDefault();
        //     window.open('/shop-data/export', '_blank');
        // });
    </script>
    @endsection
