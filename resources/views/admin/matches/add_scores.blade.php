@extends('admin.layout')
@section('content')
<section>
    <div class="container">
        <div class="box">
            <h2 class="heading">Add Score</h2>
        <div class="addProduct">
            <div class="row" style="margin-bottom: 15px;" id="goalRow">
                <div class="col-md-4">
                    <div>
                        {{Form::select('player_id',$players, '', ['class'=>'form-control','id'=>'players','placeholder' => 'Select Player...'])}}
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="form-group">
                        <input type="text" id = "time" name="time" value="" class="form-control" placeholder="Time...">
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="addGoal"></label>
                    <button type="button" class="btn btn-primary" id="addGoal">Add </button>
                </div>
            </div>
        </div>
        </div>
        {!! Form::open(['method' => 'POST', 'url' => route('matches.update_scores',[$match->id])]) !!}
        <div id="goalList"></div>
        {!! Form::submit(trans('Finalize'), ['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
    <script>
        var goalCounter = 0;
        $('#addGoal').on('click', function () {
            //console.log( $(this).closest('div#goalRow'));
            //    console.log($(this).closest('div#goalRow').find('#players').val());
            //    console.log($(this).closest('div#goalRow').find('#goal').val());
            // console.log($('div#template'));
            var player = $(this).closest('div#goalRow').find('#players option:selected').val();
            var playerName = $(this).closest('div#goalRow').find('#players option:selected').text();
            var time = $(this).closest('div#goalRow').find('#time').val();
            var newRow = `<div class="container">
                    <div class="row itemRow" style="margin-bottom: 15px;">
                    <div class="col-md-4">
                        <div>
                            {{-- {{Form::select('goals[COUNTER][player_id]',$players, '', ['class'=>'form-control','placeholder' => 'Select Player...'])}} --}}
                            <label>[PLAYER_NAME]</label>
                            <input type='hidden' class='player' name='goals[COUNTER][player_id]' type="text" min="1" max='100 ' value='${player}' readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <input class='time' name='goals[COUNTER][time]' type="text" min="1" max='100 '  value='${time}' readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        {{-- <label for="addGoal"></label>--}}
                        <button type="button" class="btn btn-danger removeGoal">Remove</button>
                    </div>
                </div>
            </div>
            </div>`;
            newRow=newRow.replace('COUNTER',goalCounter);
            newRow=newRow.replace('COUNTER',goalCounter);
            newRow=newRow.replace('[PLAYER_NAME]',playerName);

            $('#goalList').append(newRow);
             goalCounter++;
        })
        $('#goalList').on('click', '.removeGoal', function () {
            $(this).closest('div.itemRow').remove();
        })
    </script>
</section>
@endsection
