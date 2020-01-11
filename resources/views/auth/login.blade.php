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

    <h1>Login</h1>
    <form name="login" class="login-form" action="{{ route('login') }}" method="POST">
        {{ csrf_field() }}
        <input 
            type="text" 
            name="email" 
            placeholder="Your Email" > <br />

        <input 
            type="password" 
            name="password" 
            placeholder="Your Password"  ><br />

        <input type="submit" value="Login" style="font-weight:bold;" />
        <a href="{{ url('/password/reset') }}">Forgot Password</a>
        
    </form>
@endsection