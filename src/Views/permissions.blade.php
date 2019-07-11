@extends('installer::layout.main')

@section('stepNumber', 3)

@section('header')
    <h3>Permisje</h3>
    <p>Poniżej możesz zobaczyć czy są nadane odpowiednie permisje.</p>
@endsection

@section('content')
    <form role="form" action="{{ route('installer.mainSettings') }}" method="GET">
        <hr>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center">Katalog</th>
                <th class="text-center">Obecne prawa</th>
                <th class="text-center">Minimalne prawa</th>
            </tr>
            </thead>
            <tbody>
            @foreach($permsInfo['perms'] as $folder => $info)
                <tr>
                    <td><strong>{{ $folder }}</strong></td>
                    <td><i class="fa @if($info['isOk']) fa-check text-success @else fa-times text-danger @endif"></i> {{ $info['current'] }}</td>
                    <td>{{ $info['needed'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="f1-buttons">
            @if($permsInfo['allOk'])
                <button type="button" class="btn" disabled><i class="fa fa-refresh"></i> Odśwież</button>
                <button type="submit" class="btn btn-next"><i class="fa fa-arrow-right"></i> Next</button>
            @else
                <button type="button" class="btn btn-previous" onclick="window.location.reload();"><i class="fa fa-refresh"></i> Odśwież</button>
                <button type="submit" class="btn" disabled><i class="fa fa-arrow-right"></i> Next</button>
            @endif
        </div>
    </form>
@endsection

