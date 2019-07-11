@extends('installer::layout.main')

@section('stepNumber', 3)

@section('header')
    <h3>{{ trans('installer::lang.permissions.header') }}</h3>
    <p>{{ trans('installer::lang.permissions.desc') }}</p>
@endsection

@section('content')
    <form role="form" action="{{ route('installer.mainSettings') }}" method="GET">
        <hr>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center">{{ trans('installer::lang.permissions.folder') }}</th>
                <th class="text-center">{{ trans('installer::lang.permissions.currentPerms') }}</th>
                <th class="text-center">{{ trans('installer::lang.permissions.minPerms') }}</th>
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
                <button type="button" class="btn" disabled><i class="fa fa-refresh"></i> {{ trans('installer::lang.main.refresh') }}</button>
                <button type="submit" class="btn btn-next"><i class="fa fa-arrow-right"></i> {{ trans('installer::lang.main.next') }}</button>
            @else
                <button type="button" class="btn btn-previous" onclick="window.location.reload();"><i class="fa fa-refresh"></i> {{ trans('installer::lang.main.refresh') }}</button>
                <button type="submit" class="btn" disabled><i class="fa fa-arrow-right"></i> {{ trans('installer::lang.main.next') }}</button>
            @endif
        </div>
    </form>
@endsection

