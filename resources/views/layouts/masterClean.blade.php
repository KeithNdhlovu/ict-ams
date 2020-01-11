<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> ICT Asset Management System</title>
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/screen.css') }}">
    <script src="{{ asset('js/activation.js') }}"></script>
    <script>
        function validateForm() {
            var email = document.forms["registration"]["email"].value;
            if (!validateEmail(email)) {
                alert("Enter a valid email address");
                return false;
            }
            var password = document.forms["registration"]["password"].value;
            if (password.length < 6) {
                alert("Password must have at least 6 characters");
                return false;
            }
        }
        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }
    </script>

</head>
<body>
    
    <div id="page">
        <header>
            <a title="asset" href="">
                <div class="logo">
                    <img src="{{ asset('images/comp.png') }}" height="66px" weight="66px" /> 
                    <span id="title">ICT Asset Management System</span>
                </div>
            </a>

            <nav class="not-authed">
                <a href="/login">Login</a>
                &nbsp;&nbsp;
                <a href="/register">Create New Account</a>
            </nav>
        </header>

        <div class="center-container">
            @yield('content')
        </div>
         
    </div>

</body>
</html>