@extends('installer::layout.main')

@section('stepNumber', 1)

@section('header')
    <h3><strong>{{ trans('installer::lang.start.header') }}</strong></h3>
    <p>{{ trans('installer::lang.start.desc') }}</p>
@endsection

@section('content')
    <form role="form" action="{{ route('installer.packages') }}" method="GET">
        <hr>
        <h4>{{ trans('installer::lang.start.info') }}</h4>
        <hr>
        <div class="f1-buttons">
            <button type="submit" class="btn btn-next"><i class="fa fa-arrow-right"></i> {{ trans('installer::lang.main.next') }}</button>
        </div>
    </form>
@endsection

