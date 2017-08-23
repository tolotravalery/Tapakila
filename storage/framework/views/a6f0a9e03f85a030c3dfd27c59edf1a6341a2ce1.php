<nav  id="background" class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"><?php echo trans('titles.toggleNav'); ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                <img src=<?php echo e(url('/img/logo.png')); ?> title="tapakila">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
                <li role="presentation" class="dropdown connexion" >

                    <a href="#" class="dropdown-toggle" id="drop6" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Admin
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu search" id="menu3" aria-labelledby="drop6">
                        <li <?php echo e(Request::is('users', 'users/' . Auth::user()->id, 'users/' . Auth::user()->id . '/edit') ? 'class=active' : null); ?>><?php echo HTML::link(url('/users'), Lang::get('titles.adminUserList')); ?></li>
                        <li <?php echo e(Request::is('users/create') ? 'class=active' : null); ?>><?php echo HTML::link(url('/users/create'), Lang::get('titles.adminNewUser')); ?></li>
                        <li <?php echo e(Request::is('themes','themes/create') ? 'class=active' : null); ?>><?php echo HTML::link(url('/themes'), Lang::get('titles.adminThemesList')); ?></li>
                        <li <?php echo e(Request::is('logs') ? 'class=active' : null); ?>><?php echo HTML::link(url('/logs'), Lang::get('titles.adminLogs')); ?></li>
                        <li <?php echo e(Request::is('php') ? 'class=active' : null); ?>><?php echo HTML::link(url('/php'), Lang::get('titles.adminPHP')); ?></li>
                        <li <?php echo e(Request::is('routes') ? 'class=active' : null); ?>><?php echo HTML::link(url('/routes'), Lang::get('titles.adminRoutes')); ?></li>
                    </ul>

                </li>
                <?php endif; ?>
            </ul>

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
                <?php if(Auth::guest()): ?>
                    <li><a href="<?php echo e(route('login')); ?>"><?php echo trans('titles.login'); ?></a></li>
                    <li><a href="<?php echo e(route('register')); ?>"><?php echo trans('titles.register'); ?></a></li>
                <?php else: ?>
                    <li role="presentation" class="dropdown">
                        <a href="#" class="dropdown-toggle" id="drop6" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                        <?php if((Auth::User()->profile) && Auth::user()->profile->avatar_status == 1): ?>
                                <img src="<?php echo e(Auth::user()->profile->avatar); ?>" alt="<?php echo e(Auth::user()->name); ?>" class="user-avatar-nav">
                            <?php else: ?>
                                <div class="user-avatar-nav"></div>
                            <?php endif; ?>

                            <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu search" id="menu3" aria-labelledby="drop6">
                            <li <?php echo e(Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/edit') ? 'class=active' : null); ?>>
                                <?php echo HTML::link(url('/profile/'.Auth::user()->name), trans('titles.profile')); ?>

                            </li>
                            <li <?php echo e(Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/edit') ?  : null); ?>>
                            <!--  <?php echo HTML::link(url('/profile/'.Auth::user()->name), trans('titles.profile')); ?> -->
                            <?php echo HTML::link(url('/profile/'.Auth::user()->name.'/edit'), trans('profile.editAccountTitle')); ?>

                            <!--<?php echo HTML::icon_link(URL::to('/profile/'.Auth::user()->name.'/edit'), 'fa fa-fw fa-cog', trans('titles.editProfile'), array('class' => 'btn btn-small btn-info btn-block')); ?>

                            <?php echo e(trans('profile.editAccountTitle')); ?>-->
                            </li>
                            <li><a href="<?php echo e(url('/')); ?>/category">Categories</a></li>
                            <li><a href="<?php echo e(url('/')); ?>/event">Events</a></li>
                            <li>
                                <a href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <?php echo trans('titles.logout'); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>