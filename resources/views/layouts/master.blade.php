<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>ICT Asset Management System</title>
        <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
        <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/screen.css') }}">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}" />
        @yield('css')
    </head>

<body>

    <div id="page">
        @include('partials.header')

		<div title="comBox">
            <!-- @TODO: AJAX Post data to filter -->
            <form method="POST" action="">
                <label for="AIDC"> ParkDSC : </label>
                <select id="cmbMake" name="Make">
                    <option value="0">Select ParkDSC</option>
                    <option value="1">CenterHub</option>
                    <option value="2">Four Wheels</option>
                    <option value="3">G_Incubation Center</option>
                    <option value="4">Kasi DH&C </option>
                    <option value="5">SA Automobiles</option>
                    <option value="6">Voom Vehicles</option>

                </select>

                <label for="TENANTS"> TENANTS: </label>
                <select id="cmbMake" name="Make">
                    <option value="0">Select TENANTS</option>
                    <option value="1">AutoFuture Designs</option>
                    <option value="2">Herstellung Giants</option>
                    <option value="3">OTDN Logistics</option>
                    <option value="4">Tooland Skills Hubs</option>
                    <option value="5">UP&Run Solutions</option>
                    <option value="6">QSpeeds Transportation</option>
                </select>
            </form>
		</div>

        <div class="content-center">
            @yield('content')
        </div>

    </div>

    @yield('scripts')
</body>
</html>
