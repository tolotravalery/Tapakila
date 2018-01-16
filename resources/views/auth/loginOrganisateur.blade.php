@extends("template")
@section('content')
    <section class="content-elite">
        <!--/content goes here -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <!-- menutab start -->
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a href="#" class="active" id="login-form-link" style="color: #2ea7de;">Connexion
                                        organisateur</a>
                                </div>

                            </div>
                            <hr>
                        </div>
                        <!-- menutab end -->

                        <!-- formulaire start -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- connexion start -->
                                    <form id="login-form" style="display: block;" role="form" method="POST"
                                          action="{{ route('organisateur') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="email">Adresse e-mail </label>
                                            <input type="text" name="email" id="username" tabindex="1"
                                                   class="form-control"
                                                   placeholder="e-mail" value="{{ old('email') }}" required autofocus>

                                            @if ($errors->has('email'))
                                                <span class="red">
                                                            <strong style="color:#d70506;">{{ $errors->first('email') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Mot de passe:</label>
                                            <input type="password" name="password" id="password" tabindex="2"
                                                   class="form-control" placeholder="********" required>
                                            @if ($errors->has('password'))
                                                <span class="red">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-3 col-md-offset-0"></div>
                                                <div class="col-sm-6 col-md-offset-0">
                                                    <input name="login-submit" id="login-submit" tabindex="4"
                                                           class="form-control btn btn-login" value="Se connecter"
                                                           type="submit" style="background-color: #2ea7de;">
                                                </div>
                                                <div class="col-sm-3 col-md-offset-0"></div>
                                            </div>
                                        </div>


                                    </form>


                                    <!-- connexion end -->


                                </div>
                            </div>
                        </div>
                        <!-- formulaire end -->
                    </div>
                </div>
            </div>
        </div>
        <!--/content goes here -->
    </section>
@endsection

@section('specificScript')
    <script typae="text/javascript">
        $('.dropdown-menu ul li a').click(function (event) {
            event.stopPropagation();
            $(this).parent().toggleClass('active').siblings().removeClass('active');
            var target = $(this).attr('href');
            $('ul li .tab-content ' + target).toggleClass(active in);
        });
    </script>
    <script typae="text/javascript">
        $('.dropdown-menu ul li a').click(function (event) {
            event.stopPropagation();
            $(this).parent().toggleClass('active').siblings().removeClass('active');
            var target = $(this).attr('href');
            $('ul li .tab-content ' + target).toggleClass(active in);
        });
    </script>
    <script>
        $(function () {

            $('#login-form-link').click(function (e) {
                $("#login-form").delay(100).fadeIn(100);
                $("#register-form").fadeOut(100);
                $('#register-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#register-form-link').click(function (e) {
                $("#register-form").delay(100).fadeIn(100);
                $("#login-form").fadeOut(100);
                $('#login-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });

        });
    </script>
@endsection


