<div class="contact-form">
    <h2 class="title">{{ trans('themes::contact.write us') }}</h2>
    {!! Form::open(['route' => 'contact.send', 'class' => 'contact', 'method'=>'post']) !!}
    {!! Form::hidden('from', Request::path()) !!}

    @if (session()->has('contact_form_message'))
        <div class="alert alert-success">
            {!! session('contact_form_message') !!}
        </div>
    @endif

        <div class="row">
            <div class="col-sm-6">
                {!! Form::text('first_name', old('first_name'), ['placeholder'=>trans('contact::contacts.form.first_name'), 'class'=>'field-text']) !!}
                {!! $errors->first("first_name", '<span class="help-block red-text">:message</span>') !!}
            </div>
            <div class="col-sm-6">
                {!! Form::text('last_name', old('last_name'), ['placeholder'=>trans('contact::contacts.form.last_name'), 'class'=>'field-text']) !!}
                {!! $errors->first("last_name", '<span class="help-block red-text">:message</span>') !!}
            </div>
            <div class="col-sm-12">
                {!! Form::text('email', old('email'), ['placeholder'=>trans('contact::contacts.form.email'), 'class'=>'field-text']) !!}
                {!! $errors->first("email", '<span class="help-block red-text">:message</span>') !!}
            </div>
            <div class="col-sm-12">
                {!! Form::textarea('enquiry', old('enquiry'), ['class'=>'materialize-textarea', 'placeholder'=>trans('contact::contacts.form.enquiry'), 'class'=>'field-textarea']) !!}
                {!! $errors->first("enquiry", '<span class="help-block red-text">:message</span>') !!}
            </div>
            <div class="col-sm-6">
                <div class="@if ($errors->has('g-recaptcha-response')) has-error @endif">
                    {!! Captcha::display() !!}
                    <span class="help-block red-text"><small>{!! $errors->first('g-recaptcha-response') !!}</small></span>
                </div>
                <button type="submit" name="submit" class="awe-btn awe-btn-13">{{ trans('contact::contacts.form.submit') }}</button>
            </div>
        </div>
        <div id="contact-content"></div>
    {!! Form::close() !!}
</div>

@push('js-inline')
    {!! Captcha::script() !!}
@endpush