@extends('layouts.masterClean')

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

    <h1>Sign Up</h1>
    <form name="registration" action="{{ route('register') }}" method="POST">
        {{ csrf_field() }}
        <input id="text_input" 
            type="text" 
            name="fname" 
            placeholder="First name" 
            required 
            maxlength="14"> <br />

        <input id="text_input" 
            type="text" 
            name="lname" 
            placeholder="Last name" 
            required 
            maxlength="14" ><br />

        <input id="text_input" 
            type="text" 
            name="email" 
            placeholder="Email" 
            required 
            maxlength="20" ><br />

        <input id="text_input" 
            type="password" 
            name="password" 
            placeholder="Password" ><br />

        <input type="submit" name="register" value="Create Account" style="font-weight:bold;">
        
    </form>
@endsection