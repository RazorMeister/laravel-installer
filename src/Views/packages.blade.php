@extends('installer::layout.main')

@section('stepNumber', 2)

@section('header')
    <h3><strong>Pakiety</strong></h3>
    <p>Poniżej został wypisany status wymaganych pakietów.</p>
@endsection

@section('content')
    <form role="form" action="{{ route('installer.permissions') }}" method="GET">
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" colspan="2">Wersja PHP</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <strong>Obecna wersja</strong>
                    </td>
                    <td>
                        <strong>Minimalna wymagana</strong>
                    </td>
                </tr>
                <tr>
                    <td><i class="fa @if($phpVerInfo['isOk']) fa-check text-success @else fa-times text-danger @endif"></i>
                        {{ $phpVerInfo['current']}}
                    </td>
                    <td>
                        {{ $phpVerInfo['min'] }}
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Nazwa pakietu</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($packagesInfo['packages'] as $package => $installed)
                    <tr>
                        <td><strong>{{ $package }}</strong></td>
                        <td><i class="fa @if($phpVerInfo['isOk']) fa-check text-success @else fa-times text-danger @endif"></i></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="f1-buttons">
            @if($phpVerInfo['isOk'] && $packagesInfo['allOk'])
                <button type="button" class="btn" disabled><i class="fa fa-refresh"></i> Odśwież</button>
                <button type="submit" class="btn btn-next"><i class="fa fa-arrow-right"></i> Next</button>
            @else
                <button type="button" class="btn btn-previous" onclick="window.location.reload();"><i class="fa fa-refresh"></i> Odśwież</button>
                <button type="submit" class="btn" disabled><i class="fa fa-arrow-right"></i> Next</button>
            @endif
        </div>
    </form>
@endsection

