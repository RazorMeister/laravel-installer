@extends('installer::layout.main')

@section('stepNumber', 2)

@section('header')
    <h3><strong>{{ trans('installer::lang.packages.header') }}</strong></h3>
    <p>{{ trans('installer::lang.packages.desc') }}</p>
@endsection

@section('content')
    <form role="form" action="{{ route('installer.permissions') }}" method="GET">
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" colspan="2">{{ trans('installer::lang.packages.phpVer') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <strong>{{ trans('installer::lang.packages.currentVer') }}</strong>
                    </td>
                    <td>
                        <strong>{{ trans('installer::lang.packages.minVer') }}</strong>
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
                    <th class="text-center">{{ trans('installer::lang.packages.packetName') }}</th>
                    <th class="text-center">{{ trans('installer::lang.packages.status') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($packagesInfo['packages'] as $package => $installed)
                    <tr>
                        <td><strong>{{ $package }}</strong></td>
                        <td><i class="fa @if($installed) fa-check text-success @else fa-times text-danger @endif"></i></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="f1-buttons">
            @if($phpVerInfo['isOk'] && $packagesInfo['allOk'])
                <button type="button" class="btn" disabled><i class="fa fa-refresh"></i> {{ trans('installer::lang.main.refresh') }}</button>
                <button type="submit" class="btn btn-next"><i class="fa fa-arrow-right"></i> {{ trans('installer::lang.main.next') }}</button>
            @else
                <button type="button" class="btn btn-previous" onclick="window.location.reload();"><i class="fa fa-refresh"></i> {{ trans('installer::lang.main.refresh') }}</button>
                <button type="submit" class="btn" disabled><i class="fa fa-arrow-right"></i> {{ trans('installer::lang.main.next') }}</button>
            @endif
        </div>
    </form>
@endsection

