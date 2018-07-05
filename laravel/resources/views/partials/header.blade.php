<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="hamburger pull-right visible-xs">
            <span class="glyphicon glyphicon-menu-hamburger"></span>
        </div>

        <div class="navbar-header">
            <a class="pull-left" href="/"><img style="padding:5px;height:50px" src="/img/logocorner4.png" ></a>
            <a class="navbar-brand" href="/">Volunteer Robot</a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/about">About</a></li>

                @if(Auth::check())
                        <li><a href="/profile/shifts">Your Shifts</a></li>
                        <li><a href="/">Events</a></li>

                        @if(Auth::user()->hasRole('admin'))
                            <li><a href="/event">New Event</a></li>
                            <li><a href="/users">Users</a></li>
                            <li><a href="/uploads">Uploads</a></li>
                            <li><a href="/reports">Reports</a></li>
                        @endif
                @endif

            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li class="active"><a href="/profile">{{ Auth::user()->name }}</a></li>
                    <li><a href="/logout">Logout</a></li>
                @else
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
