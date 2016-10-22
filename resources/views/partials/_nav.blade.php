<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">HandballApp</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('athlete') ? "active" : "" }}"><a href="{{ route('athlete.index') }}">Athletes</a></li>
                <li class="{{ Request::is('team') ? "active" : "" }}"><a href="{{ route('team.index') }}">Teams</a></li>
                <li class="{{ Request::is('camp') ? "active" : "" }}"><a href="{{ route('camp.index') }}">Camps</a></li>
                <li class="{{ Request::is('match') ? "active" : "" }}"><a href="{{ route('match.index') }}">Matches</a></li>
                <li class="{{ Request::is('about') ? "active" : "" }}"><a href="about">About</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Hello {{ Auth::user()->name }}
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @if(Auth::check() && Auth::user()->role == 'admin')
                                <li><a href="{{ route('user.index') }}">Users</a></li>
                                <li role="separator" class="divider"></li>
                            @endif
                            <li><a href="{{ route('auth.logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <a href="{{ route('auth.login') }}" class="btn btn-default" style="margin-top: 7px;">Login</a>
                @endif
            </ul>
        </div>
    </div>
</nav>