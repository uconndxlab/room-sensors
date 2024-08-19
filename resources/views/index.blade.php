@extends('layout')

@section('content')
<div class="py-5">
    <div class="container">
        <h1>Room Sensors</h1>

        <p class="lead">Total Pings: {{$total_pings}}</p>

        {{ $pings->links() }}

        <table class="table">
            <thead>
                <tr>
                    <th>Room</th>
                    <th>Motion</th>
                    <th>Alive</th>
                    <th>Temperature</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pings as $ping)
                <tr>
                    <td>{{$ping->room}}</td>
                    <td>{{$ping->motion}}</td>
                    <td>{{$ping->alive}}</td>
                    <td>{{$ping->temp}}</td>
                    <td>{{$ping->created_at->format('m/d/Y H:i:s')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $pings->links() }}
    </div>
</div>
@endsection