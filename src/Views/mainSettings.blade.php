@extends('installer::layout.main')

@section('stepNumber', 4)

@section('header')
    <h3>{{ trans('installer::lang.mainSettings.header') }}</h3>
    <p>{{ trans('installer::lang.mainSettings.desc') }}</p>
@endsection

@section('content')
    <form role="form" @if($isEnvFile) action="{{ route('installer.setUpDb') }}" method="POST" @else action="{{ route('installer.mainSettings') }}" method="POST" @endif>
        @csrf

        @if (session('file'))
            <hr>
            <h3>{{ trans('installer::lang.mainSettings.createEnvManually') }}</h3>
            <p>{{ trans('installer::lang.mainSettings.errorSavingEnv') }}</p>
            <div class="form-group">
                <textarea rows="10" id="env" class="form-control" style="height: auto;">{{ session('file') }}</textarea>
            </div>
            <div class="f1-buttons">
                <button type="button" class="btn btn-previous" onclick="window.location.reload();"><i class="fa fa-refresh"></i> {{ trans('installer::lang.main.refresh') }}</button>
                <button type="button" class="btn btn-next copy" data-id="env"><i class="fa fa-copy"></i> {{ trans('installer::lang.main.copy') }}</button>
            </div>
        @else
            @foreach($zones as $zoneName => $zoneInfo)
                <hr>
                <h4> {{ $zoneInfo['description'] }} </h4>
                <hr>
                @foreach($zoneInfo['elements'] as $elementName => $elementInfo)
                    @includeIf('installer::fields.' . $elementInfo['inputType'],
                   [
                        'name' => $elementName,
                        'label' => $elementInfo['description'],
                        'value' => isset($currentSettings[$elementInfo['envKey']]) ? $currentSettings[$elementInfo['envKey']] : '',
                        'placeholder' => $elementInfo['placeholder'],
                        'options' => isset($elementInfo['options']) ? $elementInfo['options'] : []
                   ])
                @endforeach
            @endforeach
            <div class="f1-buttons">
                @if($isEnvFile)
                    <button type="button" class="btn" disabled><i class="fa fa-check"></i> {{ trans('installer::lang.main.save') }}</button>
                    <button type="submit" class="btn btn-next"><i class="fa fa-arrow-right"></i> {{ trans('installer::lang.main.next') }}</button>
                @else
                    <button type="submit" class="btn btn-next"><i class="fa fa-check"></i> {{ trans('installer::lang.main.save') }}</button>
                    <button type="button" class="btn" disabled><i class="fa fa-arrow-right"></i> {{ trans('installer::lang.main.next') }}</button>
                @endif
            </div>
        @endif
    </form>
@endsection

