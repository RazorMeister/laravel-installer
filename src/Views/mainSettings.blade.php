@extends('installer::layout.main')

@section('stepNumber', 4)

@section('header')
    <h3>Główne ustawienia</h3>
    <p>Poniżej skonfiguruj swoją aplikacje.</p>
@endsection

@section('content')
    <form role="form" @if($isEnvFile) action="{{ route('installer.account') }}" method="GET" @else action="{{ route('installer.mainSettings') }}" method="POST" @endif>
        @csrf
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
                <button type="button" class="btn" disabled><i class="fa fa-check"></i> Zapisz</button>
                <button type="submit" class="btn btn-next"><i class="fa fa-arrow-right"></i> Next</button>
            @else
                <button type="submit" class="btn btn-next"><i class="fa fa-check"></i> Zapisz</button>
                <button type="button" class="btn" disabled><i class="fa fa-arrow-right"></i> Next</button>
            @endif
        </div>
    </form>
@endsection

