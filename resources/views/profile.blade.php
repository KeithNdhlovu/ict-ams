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
                        Some Errors have occurred while updating your profile
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
      <center> {{ Session::get('success') }} </center><br>
    @endif

    <div id='add-item-form'>
        <form name="add-device" method='POST' action='{{ action("UserController@doUpdateProfile") }}'>
            {{ csrf_field() }}

            <table border=0>
                <tr>
                    <td id='label-col'>
                        <label>Device Type*</label>
                    </td>
                    <td id='input-col'>
                        <input type='text' name='device_type' required maxlength=30>
                    </td>
                </tr>
                <tr>
                    <td id='label-col'>
                        <label>Device Status*</label>
                    </td>
                    <td id='input-col'>
                        <input type='text' name='device_status' required maxlength=30>
                    </td>
                </tr>
                <tr>
                    <td id='label-col'>
                        <label>Serial Number*</label>
                    </td>
                    <td id='input-col'>
                        <input type='text' name='serial_number' required maxlength=30>
                    </td>
                </tr>
                <tr>
                    <td id='label-col'>
                        <label>Asset Number*</label>
                    </td>
                    <td id='input-col'>
                        <input type='text' name='asset_number' required maxlength=30>
                    </td>
                </tr>
                <tr>
                    <td id='label-col'>
                        <label>Telephone Number*</label>
                    </td>
                    <td id='input-col'>
                        <input type='text' name='telephone_number' required maxlength="10">
                    </td>
                </tr>
                <tr>
                    <td id='label-col'>
                        <label>Comments</label> 
                    </td>
                    <td id='input-col'>
                        <textarea name='comments' rows='2'></textarea>
                    </td>
                </tr>
            </table>
            <input type='submit' value='Add' name='add_device'>
        </form>
    </div>
@endsection