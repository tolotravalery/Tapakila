<!-- header start -->
<nav id="background" class="navbar navbar-default navbar-static-top ">
    <div class="container custom-container ">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{ url('/') }}/public/img/logo.png" title="leguichet">
            </a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            @if (Auth::guest())
                <ul class="nav navbar-nav navbar-right">
                    <li style="margin-left: 10px;">
                        <div class="panier-header"><a href="{{url('/')}}/organisateur/event"
                                                      class="btn btn-success event"
                                                      role="button"><span class="ico"></span><span
                                        class="descr">AJOUTER<br/> VOTRE EVENEMENT</span></a></div>
                    </li>
                    <li>
                        <a href="{{ url('/shopping/cart') }}">Panier @if (!Auth::guest())
                                ({{ Cart::instance('default')->count(false) }}) @endif</a>
                    </li>

                    <li role="presentation" class="dropdown connexion">
                        <a href="#" class="dropdown-toggle" id="drop6" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false"> Connexion
                            <span class="caret"></span> </a>
                        <ul class="dropdown-menu " id="menu3" aria-labelledby="drop6">
                            <a href="{{ url('/login') }}">
                                <li class="conexion">Se connecter</li>
                            </a>
                            <a href="{{ url('/register') }}">
                                <li class="conexion">S'inscrire</li>
                            </a>
                        </ul>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-md-6  col-md-offsset-4">
                        <div id="custom-search-input">
                            <div class="input-group col-md-12 searchbox" style="width:98%;">
                                <form action="{{url('/')}}/find/q" method="get" class="input-group col-md-12 searchbox">
                                    <input type="text" class="form-control input-lg" name="query"
                                           placeholder="Rechercher..." autocomplete="off" style="font-size:16px;">
                                    <span class="input-group-btn">
                                    <button class="btn btn-info1 btn-lg" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <ul class="nav navbar-nav navbar-right">
                    <li style="margin-left: 10px;">
                        <div class="panier-header"><a href="{{url('/')}}/organisateur/event"
                                                      class="btn btn-success event"
                                                      role="button"><span class="ico"></span><span
                                        class="descr">AJOUTER<br/> VOTRE EVENEMENT</span></a></div>
                    </li>
                    <li>
                        <a href="{{ url('/shopping/cart') }}">Panier @if (!Auth::guest())
                                ({{ Cart::instance('default')->count(false) }}) @endif</a>
                    </li>
                    <li role="presentation" class="dropdown connexion">
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
                        <ul class="dropdown-menu " id="menu3" aria-labelledby="drop6">

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

                </ul>
                <div class="row">
                    <div class="col-md-6  col-md-offsset-4">
                        <div id="custom-search-input">
                            <div class="input-group col-md-12 searchbox" style="width:98%;">
                                <form action="{{url('/')}}/find/q" method="get" class="input-group col-md-12 searchbox" >
                                    <input type="text" class="form-control input-lg" name="query"
                                           placeholder="Rechercher..." autocomplete="off" style="font-size:16px;">
                                    <span class="input-group-btn">
                                    <button class="btn btn-info1 btn-lg" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</nav>
<!-- header end -->


<script>
    function addEventSimpleUsers() {
        if (confirm('Vous avez un évènement à ajouter?')) {
            document.location.href = "{{url('/profile/'.Auth::user()->id.'/edit')}}";
        }
    }
</script>