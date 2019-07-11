@extends('installer::layout.main')

@section('stepNumber', 1)

@section('header')
    <h3><strong>Start</strong></h3>
    <p>Witaj w kreatorze instalacji Laravel!</p>
@endsection

@section('content')
    <form role="form" action="{{ route('installer.packages') }}" method="GET">
        <hr>
        <h4>Kliknij poniższy przycisk, aby przystąpić do instalacji!</h4>
        <hr>
        <div class="f1-buttons">
            <button type="submit" class="btn btn-next"><i class="fa fa-arrow-right"></i> Next</button>
        </div>
    </form>
@endsection

