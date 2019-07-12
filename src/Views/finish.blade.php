@extends('installer::layout.main')

@section('stepNumber', 6)

@section('header')
    <h3>{{ trans('installer::lang.finish.header') }}</h3>
    <p>{{ trans('installer::lang.finish.desc') }}</p>
@endsection

@section('content')
    <form role="form" action="{{ route('installer.finish') }}" method="POST">
        @csrf
        <hr>
        <h4>{{ trans('installer::lang.finish.thanks') }}</h4>
        <h5>{{ trans('installer::lang.finish.time') }} {{ $time }}</h5>
        <hr>
        <div class="f1-buttons">
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> {{ trans('installer::lang.main.finish') }}</button>
        </div>
    </form>
@endsection

