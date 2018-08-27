
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

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Resources <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                            <li><a href="/about">Instructions</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/resources">Volunteer Handbook</a></li>
                            <li><a href="/rights">Volunteer Code of Conduct</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/delivery">Fresh Food Delivery</a></li>
                            <li><a href="/booths">GAR Market Booths</a></li>
                            <li><a href="/kitchens">Community Kitchens</a></li>
                            <li><a href="/grow">GROW Project</a></li>
                            <li><a href="/gleaning">Gleaning</a></li>
                            <li><a href="/events">Events</a></li>
                            <li><a href="/office">Office Administration</a></li>



                      </ul>
                </li>


                @if(Auth::check())
                        <li><a href="/profile/shifts">Your Shifts</a></li>
                        <li><a href="/">Programs</a></li>

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
                    <li><a href="/profile">{{ Auth::user()->name }}</a></li>
                    <li><a href="/logout">Logout</a></li>
                @else
                    <li><a href="/login">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
