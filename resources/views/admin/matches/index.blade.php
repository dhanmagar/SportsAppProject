@extends('admin.layout')
@section('content')
<section class="content-header">
    <div class="row p-3">
        <div class="pull-left">
            <h5>
                Fixtures
            </h5>
        </div>

        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('matches.create') }}">Add new matches</a>
        </div>
    </div>
</section>
<section class="content">
    <div class="panel panel-default">
        <div class="pannel-heading" style="margin-left:20px; color:#3e9dc9;">
            <p></p>
            <p></p>
            Fixtures
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Home Team</th>
                        <th></th>
                        <th>Away Team</th>
                        <th>Start Time</th>
                        <th>Final Time</th>
                        <th>Action</th>
                        <th>Add Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matches as $keys=>$match)

                    <?php 
                            
                                $homeGoals = [];
                                $awayGoals = [];

                                if($match->status == 1){
                                    if(count($match->goals)){
                                        foreach($match->goals as $goal){
                                            if($goal->player->team_id == $match->team1_id){
                                                array_push($homeGoals, [
                                                    'player' => $goal->player->first_name.' '.$goal->player->last_name,
                                                    'time' => $goal->time
                                                ]);
                                            }else{
                                                array_push($awayGoals, [
                                                    'player' => $goal->player->first_name.' '.$goal->player->last_name,
                                                    'time' => $goal->time
                                                ]);
                                            }
                                        }
                                    }
                                } 
                               
                               
                            ?>

                    <tr style="font-weight:500;" onclick="reveal({{$keys}})">
                        <td>{{$match->team1->name}}</td>
                        <td>VS</td>
                        <td>{{$match->team2->name}}</td>
                        <td>{{$match->start_time}}</td>
                        <td>@if($match->status == 1) {{ count($homeGoals) }} - {{count($awayGoals)}} @else - @endif</td>
                        <td style="display:inline-flex">
                            {{-- {!! Form::open(['method' => 'GET', 'url' => route('matches.show', $match->id)])
                                    !!}
                                    <button id='show' type="submit" class="btn btn-info" style="margin-right:5px;">
                                        Show Details
                                    </button>
                                    {!! Form::close() !!}
                                    {!! Form::open(['method' => 'GET', 'url' => route('matches.edit', $match->id)])
                                    !!}
                                    <button id='score' type="submit" class="btn btn-secondary" style="margin-right:5px;">
                                        Edit
                                    </button>
                                    {!! Form::close() !!} --}}
                            {!! Form::open(['method' => 'DELETE', 'url' => route('matches.destroy',
                            $match->id)]) !!}
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                            {!! Form::close() !!}
                        </td>
                        <td>
                            <a href="{{route('matches.add_scores', [$match->id])}}"><i class="fa fa-plus"
                                    aria-hidden="true"></i></a>
                        </td>
                    </tr>

                    <tr id='toggle-{{$keys}}' style="display:none;">
                        <td> @foreach ($homeGoals as $gol)
                            <ul>
                                <li>{{$gol['player']}}({{$gol['time']}}')</li>
                            </ul>
                            @endforeach
                        </td>
                        <td>
                        </td>
                        <td> @foreach ($awayGoals as $gol)
                            <ul>
                                <li>{{$gol['player']}}({{$gol['time']}}')</li>
                            </ul>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
<script>
    const reveal=(keys)=>{
            let id=`#toggle-${keys}`;
            $(id).toggle("slow");
        }
</script>