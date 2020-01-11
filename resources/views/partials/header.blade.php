<header>
    <div class="logo">
        <a title="asset" href="/home">
            <img src="{{ asset('images/comp.png') }}" height="66px" weight="66px" />
        </a>

        <span id="title">ICT Asset Management System</span>
    </div>

    <nav>
        <label for="email">Welcome {{ Auth::user()->first_name . " ". Auth::user()->last_name }} </label>
        <a href="/home"><input type="image" src="{{ asset('images/icons/home.png') }}" title="home" value="Home" style="margin-left:10px;"/></a>
        <a href="/profile"><input type="image" src="{{ asset('images/icons/user.png') }}" title="Profile" value="settings " style="margin-left:10px;"/></a>
        <a href="/logout" 
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <input type="image" 
                src="{{ asset('images/icons/logout.png') }}" 
                title="Logout" 
                value="Sign Out" 
                style="margin-left:10px;"/></a>
    </nav>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

</header>