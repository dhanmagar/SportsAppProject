@extends('admin.layout')
@section('content')
<section class="content">
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Laravel Sports App</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-success" href="{{ route('teams.create') }}"> Create New Team</a>
    </div>
  </div>
</div>
<table class="table table-bordered">
  <tr>
    <th>Team</th>
    <th></th>
    <th width="280px">Action</th>
  </tr>
  @foreach($teams as $team)
  <tr>
    <td>{{ $team->name }}</td>
  <td><img src="/images/{{$team->logo}}" alt="team logo here" style="height:40px;width:50px;border-radius: 50%;opacity:0.8;
    filter: alpha(opacity=50);">
  </td>
    <td>
    <form action="{{ route('teams.destroy',$team->id) }}" method="POST">
    <a class="btn btn-info" href="{{ route('teams.show',$team->id) }}">Show</a>
    <a class="btn btn-primary" href="{{ route('teams.edit',$team->id) }}">Edit</a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    </td>
  </tr>
  @endforeach
</table>
</section>
@endsection
