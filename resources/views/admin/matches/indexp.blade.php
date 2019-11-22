@extends('admin.layout')
@section('content')
<section class="content">
    <div class="panel panel-default">
        <div class="pannel-heading" style="margin-left:20px; color:#3e9dc9;">
            <p></p>
            <p></p>
            Premiere League Fixtures
        </div>
        <div class="panel-body table-responsive">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Home Team</th>
                        <th> Time</th>
                        <th>Away Team</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fixtures as $keys=>$fixture)

                    <tr style="font-weight:500;" onclick="reveal({{$keys}})">
                        <td>{{$fixture['home_name']}}</td>
                        <td>{{$fixture['time']}}</td>
                        <td>{{$fixture['away_name']}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Home Team</th>
                        <th> Time</th>
                        <th>Away Team</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>
<script>
    $('#myTable').DataTable();
</script>
@endsection