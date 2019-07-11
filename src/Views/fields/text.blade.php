<div class="form-group row">
    <label class="col-sm-4 col-form-label" for="{{ $name }}">{{ $label }}</label>
    <div class="col-sm-8">
        <input type="text" placeholder="{{ $placeholder }}" value="{{ $value }}" name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror" @if(isset($options['disabled']) && $options['disabled']) disabled @endif>
        @error($name)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>