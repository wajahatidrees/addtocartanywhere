<div class="modal fade" id="create-form-field"  tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contact Form Field</h5>
                <button type="button" class="close no-shadow modal-close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="full-width">
                    <article>
                        <div class="card no-border no-shadow" style="margin-bottom: 0; padding-bottom: 0;">
                            {!! html()->form('POST', route('contact-form.store'))->class('contact_form') !!}
                            @include('modal.form', ['submit' =>  'Save'])
                            {!! html()->form()->close() !!}
                        </div>
                    </article>
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="button eosh-default-btn" data-dismiss="modal">Close</button>
                <button type="button" class="button add-form-field eosh-brand-btn" style="margin-left: 5px">Save</button>
            </div>
        </div>
    </div>
</div>
