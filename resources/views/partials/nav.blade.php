<nav id="background" class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">{!! trans('titles.toggleNav') !!}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src={{ url('/img/logo.png') }} title="tapakila">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    @role('organisateur')
                    <button type="" class="btn btn-success event"
                            onclick="javascript:location.href='{{url('/')}}/organisateur/event'"><span
                                class="ico"></span><span
                                class="descr">AJOUTER<br/> VOTRE EVENEMENT</span></button>
                    @endrole
                    @role('user')
                    <button type="" class="btn btn-success event"
                            onclick="addEventSimpleUsers()"><span
                                class="ico"></span><span
                                class="descr">AJOUTER<br/> VOTRE EVENEMENT</span></button>
                    @endrole
                    @if (Auth::guest())
                        <button type="" class="btn btn-success event"
                                onclick="javascript:location.href='{{url('/')}}/organisateur/event'"><span
                                    class="ico"></span><span
                                    class="descr">AJOUTER<br/> VOTRE EVENEMENT</span></button>
                    @endif
                </li>
                <li><a href="{{ url('/shopping/cart') }}">Panier @if (!Auth::guest())
                            ({{ Cart::instance('default')->count(false) }}) @endif</a>
                </li>

                <li role="presentation" class="dropdown">
                    <a href="#" class="dropdown-toggle" id="drop6" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"> Rechercher
                        <span class="caret"></span> </a>
                    <ul class="dropdown-menu search" id="menu3" aria-labelledby="drop6">
                        <li>
                            <form action="./page/recherche.html" method="get">
                                <input type="text" name="query" placeholder="Search..." autocomplete="off">
                                <input type="submit" value="Search">
                            </form>
                        </li>
                    </ul>
                </li>

            @if (Auth::guest())
                <!--<li><a href="{{ route('login') }}">{!! trans('titles.login') !!}</a></li>-->
                    <li>
                        <a href="#" class="dropdown-toggle" id="drop6" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false"> Connexion <span class="caret"></span></a>
                        <ul class="dropdown-menu search" id="menu3" aria-labelledby="drop6">
                            @if (Route::has('login'))
                                @if (Auth::check())
                                    <li><a href="{{ url('/home') }}">Home</a></li>
                                @else
                                    <li><a href="{{ url('/login') }}">Login</a></li>
                                    <li><a href="{{ url('/register') }}">Register</a></li>
                                @endif
                            @endif
                        </ul>
                    </li>
                @else
                    <li role="presentation" class="dropdown">
                        <a href="#" class="dropdown-toggle" id="drop6" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">

                            @if ((Auth::User()->profile) && Auth::user()->profile->avatar_status == 1)
                                <img src="{{ Auth::user()->profile->avatar }}" alt="{{ Auth::user()->name }}"
                                     class="user-avatar-nav">
                            @else
                                <div class="user-avatar-nav"></div>
                            @endif

                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu search" id="menu3" aria-labelledby="drop6">

                            @role('admin')
                            <li {{ Request::is('users', 'users/' . Auth::user()->id, 'users/' . Auth::user()->id . '/edit') ? 'class=active' : null }}>{!! HTML::link(url('/admin/users'), Lang::get('titles.adminUserList')) !!}</li>
                            <li {{ Request::is('users/create') ? 'class=active' : null }}>{!! HTML::link(url('/admin/users/create'), Lang::get('titles.adminNewUser')) !!}</li>
                            <li><a href="{{url('/')}}/admin/menu">Menus</a></li>
                            <li><a href="{{url('/')}}/admin/sousmenu">Sous menus</a></li>
                            <li><a href="{{url('/')}}/admin/listevent">List events</a></li>
                            @endrole
                            <li {{ Request::is('profile/'.Auth::user()->id, 'profile/'.Auth::user()->id . '/edit') ?  : null }}>
                            {!! HTML::link(url('/profile/'.Auth::user()->id.'/edit'), trans('titles.profile')) !!}
                            <!--{!! HTML::icon_link(URL::to('/profile/'.Auth::user()->id.'/edit'), 'fa fa-fw fa-cog', trans('titles.editProfile'), array('class' => 'btn btn-small btn-info btn-block')) !!}
                            {{ trans('profile.editAccountTitle') }}-->
                            </li>
                            @role('organisateur')
                            <li><a href="{{url('/')}}/organisateur/event">Events</a></li>
                            @endrole
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {!! trans('titles.logout') !!}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<script>
    function addEventSimpleUsers() {
        if (confirm('Vous avez un évènement à ajouter?')) {
            document.location.href = "{{url('/profile/'.Auth::user()->id.'/edit')}}";
        }
    }
</script>