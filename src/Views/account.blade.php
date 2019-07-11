@extends('installer::layout.main')

@section('stepNumber', 5)

@section('header')
    <h3>{{ trans('installer::lang.account.header') }}</h3>
    <p>{{ trans('installer::lang.account.desc') }}</p>
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
                <button type="button" class="btn" disabled><i class="fa fa-check"></i> {{ trans('installer::lang.main.createAccount') }}</button>
                <button type="submit" class="btn btn-next"><i class="fa fa-arrow-right"></i> {{ trans('installer::lang.main.next') }}</button>
            @else
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> {{ trans('installer::lang.main.createAccount') }}</button>
                <button type="button" class="btn" disabled><i class="fa fa-arrow-right"></i> {{ trans('installer::lang.main.next') }}</button>
            @endif
        </div>
    </form>
@endsection

