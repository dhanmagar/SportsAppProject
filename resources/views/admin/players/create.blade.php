@extends('admin.layout')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Player Registration</h3>
                </div>
                {{ Form::open(['route' => 'players.store'])}}
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
                        {{ Form::label('first_name', 'Frist Name') }}
                        {{ Form::text('first_name','',['class'=>'form-control','placeholder'=>'Your First Name']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('last_name', 'Last Name') }}
                        {{ Form::text('last_name','',['class'=>'form-control','placeholder'=>'Your Last Name']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('team_id', 'Team') }}
                        {{Form::select('team_id',$teams, '', ['class'=>'form-control','placeholder' => 'Pick a Team...'])}}
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="checkbox_field" id="terms" onclick="canSubmit()"> Terms and Conditions
                        </label>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                {{ Form::submit('Create the Team!', array('class' => 'btn btn-primary','id'=>'submit','disabled'=>'disabled')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</section>
<script>
    function canSubmit(){
        if($('#terms').is(':checked')==true){
            $('#submit').prop('disabled',false);
        }
        else{
            $('#submit').prop('disabled',true);
        }
    }

</script>
@endsection
