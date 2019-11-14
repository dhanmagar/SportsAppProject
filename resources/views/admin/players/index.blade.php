@extends('admin.layout')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                @if (Session::has('message'))
                <div class="row">
                    <div class="col-md-6">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Alert!</h4>
                            {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
                @endif
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('players.create') }}">Add new player</a>
                </div>
                <h3 class="box-title" style="color:darkkhaki;">List of all Players</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table id="example-list" class="table table-striped table-bordered" style="width:100%"
                    examclass="table table-hover">
                    <thead class="thead-light" style="color: #401500;background-color: #FFDDCC;border-color: #792700;">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Team</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($players as $key=> $player )
                        <tr style="font-weight:500;">
                            <td>{{ $key+ $players->firstItem() }}</td>
                            <td>{{$player->first_name}}</td>
                            <td>{{$player->last_name}}</td>
                            <td>{{$player->team->name}}</td>
                            <td style="display:inline-flex">
                                {!! Form::open(['method' => 'GET', 'url' => route('players.show', $player->id)])
                                !!}
                                <button id='show' type="submit" class="btn btn-info" style="margin-right:5px;">
                                    Show Details
                                </button>
                                {!! Form::close() !!}
                                {!! Form::open(['method' => 'GET', 'url' => route('players.edit', $player->id)])
                                !!}
                                <button id='edit' type="submit" class="btn btn-primary" style="margin-right:5px;">
                                    Edit
                                </button>
                                {!! Form::close() !!}
                                {!! Form::open(['method' => 'DELETE', 'url' => route('players.destroy',
                                $player->id)]) !!}
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">
                                    Remove</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>

                     </tfoot>
                </table>
                <div class="container-fluid">
                    <div class-="row">
                        <div class="col-sm-3 pull-right">
                            {{$players->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
@endsection
