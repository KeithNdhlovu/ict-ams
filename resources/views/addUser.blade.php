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
                        Some Errors have occurred while adding your device
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
        <form name="add-device" method='POST' action='{{ action("UserController@doAddUser") }}'>
            {{ csrf_field() }}

            <table border=0>
                <tr>
                    <td id='label-col'>
                        <label>First Name*</label>
                    </td>
                    <td id='input-col'>
                        <input type='text' name='first_name' />
                    </td>
                </tr>
                <tr>
                    <td id='label-col'>
                        <label>Last Name*</label>
                    </td>
                    <td id='input-col'>
                        <input type='text' name='last_name' />
                    </td>
                </tr>
                <tr>
                    <td id='label-col'>
                        <label>Department Name*</label>
                    </td>
                    <td id='input-col'>
                        <input type='text' name='department_name' />
                    </td>
                </tr>
                <tr>
                    <td id='label-col'>
                        <label>Employment Status*</label>
                    </td>
                    <td id='input-col'>
                        <input type='text' name='employment_status' />
                    </td>
                </tr>
                <tr>
                    <td id='label-col'>
                        <label>Company *</label>
                    </td>
                    <td id='input-col'>
                        <select name='company_id'>
                            <option value="">--- Select Company ---</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                
            </table>
            <input type='submit' value='Add' name='add_user'>
        </form>
    </div>
@endsection