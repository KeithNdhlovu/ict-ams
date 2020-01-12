@extends('layouts.master')

@section('content')
    <div id="topic">Current Devices and Users</div>
    
    @if(\Auth::user()->isAdmin())
        <a href="{{ url('/devices/add') }}"> <div id="add-new">Add new device</div></a>
        <a href="{{ url('/users') }}"> <div id="add-new">End Users</div></a>
    @endif

    @if(Session::has('success'))
        <br/>
        <center class="alert-success"> {{ Session::get('success') }} </center><br>
        <br/>
    @endif

    <table border=0>
        <thead>
            <tr>
                <th>Device Type</th>
                <th>Device Status</th>
                <th>User Name</th>
                <th>User Last Name</th>
                <th>Company Name</th>
                <th>User Telephone Number</th>
                @if(\Auth::user()->isAdmin())
                    <th>Actions</th>
                    <th></th>
                @endif
            </tr>
            </thead>
        <tbody>
            @foreach($devices as $device)
                <tr style='background-color:white'>
                    <td style='text-align: center'>{{ $device->device_type }}</td>
                    <td style='text-align: center'>{{ $device->device_status }}</td>
                    <td style="text-align: center">{{ $device->user->first_name }}</td>
                    <td style="text-align: center">{{ $device->user->last_name }}</td>
                    <td style="text-align: center">{{ $device->user->company->name }}</td>
                    <td style="text-align: center">{{ $device->telephone_number }}</td>
                    @if(\Auth::user()->isAdmin())
                        <td style='text-align: center'>
                            <a href="{{ action('UserController@doDeleteDevice', $device->id) }}"><img src="{{ asset('images/icons/delete.ico') }}" height='24'/></a>
                        </td>
                        <td style='text-align: center'>
                            <a href="{{ action('UserController@showEditDevice', $device->id) }}"><img src="{{ asset('images/icons/edit.png') }}" alt='' height='24'/></a>
                        </td>
                    @endif
                </tr>
            @endforeach
            @if ($devices->isEmpty())
                <tr style='background-color:white'>
                    <td colspan="{{ \Auth::user()->isAdmin() ? '8' : '6' }}" style='text-align: center'><h1>No devices added at this moment.</h1></td>
                </tr>
            @endif
        </tbody>

    </table>
    <a href="/report"><div id="report">Generate Report</div></a>
@endsection
