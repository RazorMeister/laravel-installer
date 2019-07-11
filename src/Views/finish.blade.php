@extends('installer::layout.main')

@section('stepNumber', 6)

@section('header')
    <h3>Koniec!</h3>
    <p>Instalacja aplikacji dobiegła końca</p>
@endsection

@section('content')
    <form role="form" action="{{ url('/') }}" method="GET">
        <hr>
        <h4> Dziękujemy za skorzystanie z <strong>Laravel</strong> Installatora by <i>RazorMeister</i></h4>
        <h5> Czas Twojej instalacji wyniósł: {{ $time }}</h5>
        <hr>
        <div class="f1-buttons">
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Zakończ</button>
        </div>
    </form>
@endsection

