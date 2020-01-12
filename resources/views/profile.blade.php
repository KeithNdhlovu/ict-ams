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
        <br/>
        <center class="alert-success"> {{ Session::get('success') }} </center><br>
        <br/>
    @endif

    <div id='add-item-form'>
        {!! Form::model($user, array('action' => array('UserController@doUpdateProfile'), 'method' => 'POST', 'name' => 'add-device')) !!}
        <table border=0>
                <tr>
                    <td id='label-col'>
                        <label>First Name</label>
                    </td>
                    <td id='input-col'>
                        {!! Form::text('first_name', old('first_name'), array('id' => 'first_name')) !!}
                    </td>
                </tr>
                <tr>
                    <td id='label-col'>
                        <label>Last Name</label>
                    </td>
                    <td id='input-col'>
                        {!! Form::text('last_name', old('last_name'), array('id' => 'last_name')) !!}
                    </td>
                </tr>
            </table>
            <input type='submit' value='Update Profile' name='add_device'>
        {!! Form::close() !!}
    </div>
@endsection