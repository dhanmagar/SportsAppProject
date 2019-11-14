@extends('admin.layout')
@section('content')
<section>
    <div class="container">
        <h2 class="heading">Add Score</h2>
        <div class="addProduct">
            <div class="row" style="margin-bottom: 15px;">
                    <div class="col-md-3">
                           <div>
                            {{Form::select('player_id',$players, '', ['class'=>'form-control','placeholder' => 'Select Player...'])}}
                           </div>
                        </div>
                <div class="col-md-3">
                    <div>
                        <label for="goal">Goal</label>
                        <input id='goal' type="number" min="1" max=''>
                    </div>
                </div>
                <div class="col-md-3">
                    <div>
                        <label for="time">Time</label>
                        <input type="number" id="time">
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="addGoal"></label>
                    <button type="button" class="btn btn-primary" id="addGoal">Add</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
