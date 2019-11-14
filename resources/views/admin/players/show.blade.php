@extends('admin.layout')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Players details</h2> 
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('players.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="box-body table-responsive no-padding">
        <table id="example-list" class="table table-striped table-bordered" style="width:100%"
            examclass="table table-hover">
            <thead class="thead-light" style="color: #401500;background-color: #FFDDCC;border-color: #792700;">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
            </thead>
            <tbody>
                <tr style="font-weight:500;">
                    <td>{{$player->first_name}}</td>
                    <td>{{$player->last_name}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@endsection