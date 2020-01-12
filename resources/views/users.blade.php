@extends('layouts.master')

@section('content')
    <div id="topic">Current Devices and Users</div>
    
    @if(\Auth::user()->isAdmin())
        <a href="{{ url('/users/add') }}"> <div id="add-new">Add End User</div></a>
    @endif

    @if(Session::has('success'))
        <br/>
        <center class="alert-success"> {{ Session::get('success') }} </center><br>
        <br/>
    @endif

    <table border=0>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Department Name</th>
                <th>Employment Status</th>
                <th>Company Name</th>
            </tr>
            </thead>
        <tbody>
            @foreach($users as $user)
                <tr style='background-color:white'>
                    <td style='text-align: center'>{{ $user->first_name }}</td>
                    <td style='text-align: center'>{{ $user->last_name }}</td>
                    <td style="text-align: center">{{ $user->department_name }}</td>
                    <td style="text-align: center">{{ $user->employment_status }}</td>
                    <td style="text-align: center">{{ $user->company->name }}</td>
                </tr>
            @endforeach
            @if ($users->isEmpty())
                <tr style='background-color:white'>
                    <td colspan="{{ \Auth::user()->isAdmin() ? '8' : '6' }}" style='text-align: center'><h1>No devices added at this moment.</h1></td>
                </tr>
            @endif
        </tbody>

    </table>
@endsection
