<div class="row">
    <div class="columns twelve">
    
        {{ html()->email('email')->class('email')->placeholder('Your Email Address')->required() }}

        <span id="email_error" class="redError">{!! $errors->first('email', '<label class="error">:message</label>') !!}</span>
    </div>
</div>

<div class="row">
    <div class="columns twelve">
       
        {{ html()->input('text', 'phone')->value(null)->class('phone')->placeholder('Your Phone Number')->required() }}

        <span id="phone_error" class="redError">{!! $errors->first('phone', '<label class="error">:message</label>') !!}</span>
    </div>
</div>

<div class="row">
    <div class="columns twelve">
       
        {{ html()->input('text', 'feature')->value(null)->class('feature')->placeholder('What would you like to add?')->required() }}
        <span id="feature_error" class="redError">{!! $errors->first('feature', '<label class="error">:message</label>') !!}</span>
    </div>
</div>

<div class="row">
    <div class="columns twelve">
      
        {{ html()->textarea('details')->value(null)->class('details')->placeholder('Tell us more')->attribute('rows', 3) }}

    </div>
</div>

<div class="row">
    <div class="columns twelve">
      
        {{ html()->file('file_path[]')->attribute('multiple', 'multiple')->class('file_path') }}
        <span id="file_path_error" class="redError">{!! $errors->first('file_path', '<label class="error">:message</label>') !!}</span>
    </div>
</div>

