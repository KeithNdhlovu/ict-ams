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

    <div title="comBox">
        <!-- @TODO: AJAX Post data to filter -->
        <form method="POST" action="">
            <label for="AIDC"> Filter By Company : </label>
            <select id="cmbMake" name="Make" onchange="filterByCompany()">
                <option value="">-----</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>

            <!-- <label for="TENANTS"> TENANTS: </label>
            <select id="cmbMake" name="Make">
                <option value="0">Select TENANTS</option>
                <option value="1">AutoFuture Designs</option>
                <option value="2">Herstellung Giants</option>
                <option value="3">OTDN Logistics</option>
                <option value="4">Tooland Skills Hubs</option>
                <option value="5">UP&Run Solutions</option>
                <option value="6">QSpeeds Transportation</option>
            </select> -->
        </form>
    </div>

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
                    @if ($isSearch)
                        <td colspan="{{ \Auth::user()->isAdmin() ? '8' : '6' }}" style='text-align: center'><h2>No devices for the selected company.</h2></td>
                    @else
                        <td colspan="{{ \Auth::user()->isAdmin() ? '8' : '6' }}" style='text-align: center'><h2>No devices added at this moment.</h2></td>
                    @endif
                </tr>
            @endif
        </tbody>

    </table>
    <a href="/report"><div id="report">Generate Report</div></a>

    <script>
        function filterByCompany() {
            var x = document.getElementById("cmbMake").value;
            window.location.href = "/devices?company="+x;
        }
    </script>
@endsection
