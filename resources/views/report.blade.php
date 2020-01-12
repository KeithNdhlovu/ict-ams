@extends('layouts.master')

@section('content')
<div id="topic"> General Report</div>
<table border=0>
    <thead>
        <tr>
            <th>Device Type</th>
            <th>Device Status</th>
            <th>User Name</th>
            <th>User Last Name</th>
            <th>Company Name</th>
            <th>User Telephone Number</th>
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
            </tr>
        @endforeach
    </tbody>

</table>

<div class="summary" style="margin: 10% auto; text-align: center">
    <h2>TOTAL DEVICES = {{ $devices->count() }}</h2>        
</div>



@endsection
