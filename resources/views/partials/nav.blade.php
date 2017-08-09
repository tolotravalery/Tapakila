
<nav  id="background" class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="./img/logo.png" title="tapakila">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">

                <li><button type="" class="btn btn-success event"><span class="ico"></span><span class="descr">AJOUTER<br/> VOTRE EVENEMENT</span></button></li>
                <li><a href="#">Panier</a></li>
                <li role="presentation" class="dropdown">
                    <a href="#" class="dropdown-toggle" id="drop6" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Rechercher
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
               <li role="presentation" class="dropdown connexion" >


                   <a href="#" class="dropdown-toggle" id="drop6" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> @if ((Auth::User()->profile) && Auth::user()->profile->avatar_status == 1)
                            <img src="{{ Auth::user()->profile->avatar }}" alt="{{ Auth::user()->name }}" class="user-avatar-nav">
                        @else
                            <div class="user-avatar-nav"></div>
                        @endif

                        {{ Auth::user()->name }}
                        <span class="caret"></span>
                    </a>
                   <ul class="dropdown-menu " role="menu">


                    <li {{ Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name ) ? 'class=active' : null }}>
                            {!! HTML::link(url('/profile/'.Auth::user()->name), trans('titles.profile')) !!}
                        </li>
                        <li {{ Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/edit') ?  : null }}>
                        <!--  {!! HTML::link(url('/profile/'.Auth::user()->name), trans('titles.profile')) !!} -->
                        {!! HTML::link(url('/profile/'.Auth::user()->name.'/edit'), trans('profile.editAccountTitle')) !!}
                        <!--{!! HTML::icon_link(URL::to('/profile/'.Auth::user()->name.'/edit'), 'fa fa-fw fa-cog', trans('titles.editProfile'), array('class' => 'btn btn-small btn-info btn-block')) !!}
                        {{ trans('profile.editAccountTitle') }}-->
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {!! trans('titles.logout') !!}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>



