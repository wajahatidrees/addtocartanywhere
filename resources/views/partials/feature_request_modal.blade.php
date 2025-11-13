<div class="modal fade" id="feature-request-modal"  role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Request a Feature</h5>
                <button type="button" class="close no-shadow modal-close-btn text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="full-width">
                    <article>
                        <div class="card no-border no-shadow mb-0 pb-0">
                            <p id="loading-bar" style="display: none; height: 4px; background: green; width: 0%;"></p>
                            <div id="success-message" style="display:none; color: green; padding: 10px; text-align: center; font-weight: bold;">
                                Thank you for submitting your feature request!
                            </div>
                            {!! html()->form('POST', route('submit.feature.request'))->class('request_feature_form')->attribute('files', true) !!}
                                @include('modal.feature_request_form', ['submit' => 'Submit'])
                            {!! html()->form()->close() !!}
                        </div>
                    </article>
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="button eosh-default-btn" data-dismiss="modal">Close</button>
                <button id="submit-request-feature" type="submit" class="button eosh-brand-btn" style="margin-left: 5px">Submit</button>
            </div>
        </div>
    </div>
</div>

