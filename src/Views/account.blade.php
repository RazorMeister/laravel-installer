@extends('installer::layout.main')

@section('stepNumber', 5)

@section('header')
    <h3>Konto</h3>
    <p>Poniżej możesz ustawić dane logowania do panelu!</p>
@endsection

@section('content')
    <form role="form" @if($isInDb) action="{{ route('installer.finish') }}" method="GET" @else action="{{ route('installer.account') }}" method="POST" @endif>
        @csrf
        <hr>
        @foreach($fields as $key => $info)
            @includeIf('installer::fields.' . $info['inputType'],
           [
                'name' => $key,
                'label' => $info['description'],
                'value' => isset($user->$key) ? $user->$key : '',
                'placeholder' => $info['placeholder'],
                'options' => isset($info['options']) ? $info['options'] : []
           ])
        @endforeach
        <div class="f1-buttons">
            @if($isInDb)
                <button type="button" class="btn" disabled><i class="fa fa-check"></i> Utwórz konto</button>
                <button type="submit" class="btn btn-next"><i class="fa fa-arrow-right"></i> Next</button>
            @else
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Utwórz konto</button>
                <button type="button" class="btn" disabled><i class="fa fa-arrow-right"></i> Next</button>
            @endif
        </div>
    </form>
@endsection

