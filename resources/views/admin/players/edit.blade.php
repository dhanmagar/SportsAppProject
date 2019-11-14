@extends('admin.layout')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Player Registration</h3>
                </div>
                {{ Form::model($player,['method' => 'PUT', 'url' => route('players.update', $player->id)])}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('first_name', 'First Name') }}
                        {{ Form::text('first_name',NULL,['class'=>'form-control','placeholder'=>'Your First Name']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('last_name', 'Last Name') }}
                        {{ Form::text('last_name',NULL,['class'=>'form-control','placeholder'=>'Your Last Name']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('team_id', 'Team') }}
                        {{Form::select('team_id',$teams,"",['class'=>'form-control'])}}
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="checkbox_field"> Terms and Conditions
                        </label>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                {{ Form::submit('Update the Team!', array('class' => 'btn btn-primary')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</section>
<div class="container ">
</div>
@endsection
