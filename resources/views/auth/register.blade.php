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
                        <div class="alert alert-danger" style="color:red;">
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
    <form name="registration" class="registration-form" action="{{ route('register') }}" method="POST">
        {{ csrf_field() }}
        <input 
            type="text" 
            name="first_name" 
            placeholder="First name" > <br />

        <input 
            type="text" 
            name="last_name" 
            placeholder="Last name"  ><br />

        <input 
            type="text" 
            name="email" 
            placeholder="Email"  ><br />

        <input 
            type="password" 
            name="password" 
            placeholder="Password" ><br />
        
        <input 
            type="password" 
            name="password_confirmation" 
            placeholder="Confirm Password" ><br />

        <input type="submit" name="register" value="Create Account" style="font-weight:bold;">
        
    </form>
@endsection