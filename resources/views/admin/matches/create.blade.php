@extends('admin.layout')
@section('content')
<h3 class="page-title">Create fixtures</h3>
{!! Form::open(['method' => 'POST', 'route' => ['matches.store']]) !!}
<div class="panel panel-default">
    <div class="panel-heading">
        Create
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('team1_id', 'Team1', ['class' => 'control-label']) !!}
                {!! Form::select('team1_id', $team1s, old('team1_id'), ['class' => 'form-control select2']) !!}
                <p class="help-block"></p>
                @if($errors->has('team1_id'))
                <p class="help-block">
                    {{ $errors->first('team1_id') }}
                </p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('team2_id', 'Team2', ['class' => 'control-label']) !!}
                {!! Form::select('team2_id', $team2s, old('team2_id'), ['class' => 'form-control select2']) !!}
                <p class="help-block"></p>
                @if($errors->has('team2_id'))
                <p class="help-block">
                    {{ $errors->first('team2_id') }}
                </p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('start_time', 'Start time', ['class' => 'control-label']) !!}
                {!! Form::datetime('start_time', old('start_time'), ['class' => 'form-control glyphicon glyphicon-calendar','id'=>'datetimepicker1', 'placeholder' =>
                'YY-mm-dd HH:mm:ss']) !!}
                <p class="help-block"></p>
                @if($errors->has('start_time'))
                <p class="help-block">
                    {{ $errors->first('start_time') }}
                </p>
                @endif
            </div>
        </div>
    </div>
</div>

{!! Form::submit(trans('Create Match'), ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
@stop

