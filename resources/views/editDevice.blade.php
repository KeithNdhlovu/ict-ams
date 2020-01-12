@extends('layouts.master')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/input_form.css') }}" />
@endsection

@section('content')

    @if ($errors->any())
    <div class="">
        <div class="col-lg-12">
            <div class="">
                <div class="header bg-red">
                    <h2>
                        Some Errors have occurred while updating your device
                    </h2>
                </div>
                <div class="body">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(Session::has('success'))
        <br/>
        <center class="alert-success"> {{ Session::get('success') }} </center><br>
        <br/>
    @endif

    <div id='add-item-form'>
    {!! Form::model($device, array('action' => array('UserController@doEditDevice', $device->id), 'method' => 'POST', 'name' => 'add-device')) !!}

            <table border=0>
                <tr>
                    <td id='label-col'>
                        <label>Device Type*</label>
                    </td>
                    <td id='input-col'>
                        {!! Form::text('device_type', old('device_type'), array('id' => 'device_type')) !!}
                    </td>
                </tr>
                <tr>
                    <td id='label-col'>
                        <label>Device Status*</label>
                    </td>
                    <td id='input-col'>
                        {!! Form::text('device_status', old('device_status'), array('id' => 'device_status')) !!}
                    </td>
                </tr>
                <tr>
                    <td id='label-col'>
                        <label>Serial Number*</label>
                    </td>
                    <td id='input-col'>
                        {!! Form::text('serial_number', old('serial_number'), array('id' => 'serial_number')) !!}
                    </td>
                </tr>
                <tr>
                    <td id='label-col'>
                        <label>Asset Number*</label>
                    </td>
                    <td id='input-col'>
                        {!! Form::text('asset_number', old('asset_number'), array('id' => 'asset_number')) !!}
                    </td>
                </tr>
                <tr>
                    <td id='label-col'>
                        <label>Telephone Number*</label>
                    </td>
                    <td id='input-col'>
                        {!! Form::text('telephone_number', old('telephone_number'), array('id' => 'telephone_number')) !!}
                    </td>
                </tr>
                <tr>
                    <td id='label-col'>
                        <label>End User *</label>
                    </td>
                    <td id='input-col'>
                        <select name='user_id'>
                            <option value="">--- Select End User ---</option>
                            @foreach($endUsers as $endUser)
                                <option {!! ($device->user_id === $endUser->id) ? 'selected' : '' !!} value="{{ $endUser->id }}">{{ $endUser->first_name . " " . $endUser->last_name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td id='label-col'>
                        <label>Comments</label> 
                    </td>
                    <td id='input-col'>
                        {!! Form::textarea('comments', old('comments'), array('id' => 'comments', 'rows' => '2')) !!}
                    </td>
                </tr>
            </table>
            <input type='submit' value='Update' name='add_device'>
        {!! Form::close() !!}
    </div>
@endsection