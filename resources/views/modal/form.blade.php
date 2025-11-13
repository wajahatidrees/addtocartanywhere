<div class="row">
    <div class="columns two">
        {{ html()->label('Field Type', 'field_type')->class('required') }}

    </div>
    <div class="columns ten">
        {!! html()->select('field_type', ['input' => 'Input', 'textarea' => 'Text Area'])->value('input')->class('field_type') !!}

        <span id="field_type_error" class="red">{!! $errors->first('field_type_error', '<label class="error">:message</label>') !!}</span>
    </div>
</div>
<div class="row">
    <div class="columns two">
        {!! html()->label('Field Label', 'field_label')->class('required') !!}
    </div>
    <div class="columns ten">
        {!! html()->input('text', 'field_label', null)->class('field_label')->placeholder('Contact Form Field Label') !!}

        <span id="field_label_error" class="red">{!! $errors->first('field_label_error', '<label class="error">:message</label>') !!}</span>
    </div>
</div>
<div class="row input-type-field">
    <div class="columns two">
        
        {!! html()->label('Input Type', 'input_type')->class('required') !!}

    </div>
    <div class="columns ten">
        {!! html()->select('input_type', ['text' => 'Text','number' => 'Number','email' => 'Email','date' => 'Date','tel' => 'Contact Number'])->class('input_type')->value(null) !!}
        <span id="input_type_error" class="red"> {!! $errors->first('input_type_error', '<label class="error">:message</label>') !!}</span>
    </div>
</div>
<div class="row">
    <div class="columns two">
        {!! html()->label('Field Option', 'field_option')->class('required') !!}

    </div>
    <div class="columns ten">
        {!! html()->select('field_option', ['required' => 'Required', 'optional' => 'Optional'])->value('required') !!}
        <span id="field_option_error" class="red">{!! $errors->first('status', '<label class="error">:message</label>') !!}</span>
    </div>
</div>
<div class="row">
    <div class="columns two">
        {!! html()->label('Order', 'order')->class('required') !!}
    </div>
    <div class="columns ten">
        {!! html()->number('order')->value(null)->class('order')->attribute('min', '1')->placeholder('Field Order in Contact Form') !!}

        <span id="order_error" class="red">{!! $errors->first('order_error', '<label class="error">:message</label>') !!}</span>
    </div>
</div>
<div class="row">
    <div class="columns two">
        {!! html()->label('Status')->for('status') !!}

    </div>
    <div class="columns ten">
       
        {!! html()->select('status', ['enabled' => 'Enable', 'disabled' => 'Disable'])->value('enabled') !!}

        <span id="status_error" class="red">{!! $errors->first('status', '<label class="error">:message</label>') !!}</span>
    </div>
</div>

{!! html()->hidden('id', null)->class('field_id') !!}


