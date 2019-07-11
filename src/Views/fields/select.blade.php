<div class="form-group row">
    <label for="{{ $name }}" class="col-sm-4 col-form-label">{{ $label }}</label>

    <div class="col-sm-8">
        <select name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" @if(isset($options['disabled']) && $options['disabled']) disabled @endif>
            @foreach($options['select'] as $val => $selectLabel)
                <option @if( $value == $val ) selected  @endif value="{{ $val }}">{{ $selectLabel }}</option>
            @endforeach
        </select>
        @error($name)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>