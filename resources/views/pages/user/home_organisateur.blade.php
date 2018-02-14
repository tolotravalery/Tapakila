@extends("template")
@section("content")
    <section id="sectioncategorie" class="clearfix">
        <div class="container custom-container">
            <ul class="clearfix">
                <li><a href="{{url('/')}}">accueil</a></li>
                @foreach($menus as $menu)
                    <li><a href="{{url('/event/list/categorie',[$menu->id])}}">{{strtoupper($menu->name)}}</a></li>
                @endforeach

            </ul>
            <a href="#" class="menupull" id="pull"><strong>Catégories &nbsp <label class="test">&darr;</label></strong></a>
        </div>
    </section>

    <section id="sectionevenement" role="navigation">
        <div class="container custom-container">
            <ul>
                @foreach($sousmenus as $sousmenu)
                    <li>
                        <a href="{{url('/event/list/categorie/'.$sousmenu->name.'',[$sousmenu->id])}}">{{ucfirst(strtolower($sousmenu->name))}}</a>
                    </li>
                @endforeach

            </ul>
        </div>
    </section>
    <br/>

    <section>
        <div class="container custom-container">
            <div class="compte-bg">
                <div class="Modifcompte2"></div>
                <div class="row row-custom position-custom">
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-4 text-center-md text-center-lg text-center-xs text-center-sm ">
                                <img src="{{url('/')}}/public/img/usercircle.png" id="sary" class="postion">
                            </div>
                            <div class="col-md-8 text-left-md text-left-lg text-center-xs text-center-sm" >
                                <label class="pseudoname">{{Auth::user()->name}}</label><br>
                                <p><i class="fa fa-envelope fenalope" aria-hidden="true"></i>{{Auth::user()->email}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 text-right-md text-right-lg text-center-xs text-center-sm " style="text-align:rihgt;">
                        <a class="modifinfo" href="{{url('/profile/'.Auth::user()->id.'/edit')}}">Modifier mes
                            Informations</a>
                    </div>
                </div>
                <?php
                if(isset($niova)){?>
                <div class="container">
                    <div class="alert alert1 alert-success col-md-7" style="margin-left:55px;">
                        <span class="glyphicon glyphicon-ok"></span> <strong><?php echo $niova; ?></strong>
                        <hr class="message-inner-separator">
                    </div>
                </div>
                <br/>
                <?php
                }
                ?>
                @if (session('message'))
                    <div class="alert alert1 alert-success">
                        <span class="glyphicon glyphicon-ok"></span>
                        <strong>{!! session('message') !!} </strong>
                        <hr class="message-inner-separator">
                    </div>
                @endif
                @if (session('status_payment'))
                    <div class="alert alert1 alert-success">
                        <span class="glyphicon glyphicon-ok"></span>
                        <strong>{!! session('status_payment') !!} </strong>
                        <hr class="message-inner-separator">
                    </div>
                @endif

                <div class="padding-custom">
                    <ul class="tabs">
                        <li class="active" rel="tab1"><b>Mes Ventes<br> passées</b></li>
                        <li rel="tab2"><b>Mes ventes <br> Actuelles</b></li>
                        <li rel="tab3"><b>Mes Achats <br>passés</b></li>
                        <li rel="tab4"><b>Mes Achats<br> Actuels </b></li>
                    </ul>
                    <div class="tab_container">
                        <h3 class="d_active tab_drawer_heading" rel="tab1">Mes Ventes passés</h3>
                        <div id="tab1" class="tab_content">
                            <table class="tabl-content table-custom">
                                <thead>
                                <tr>
                                    <th scope="col" class=""><b class="bold">Evénement</b></th>
                                    <th scope="col" class=""><b class="bold">Date</b></th>
                                    <th scope="col"><b class="bold">Tickets</b></th>
                                    <th scope="col"><b class="bold">Prix Unitaire</b></th>
                                    <th scope="col"><b class="bold"></b></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($events_passe as $e)
                                    <tr>
                                        <td data-label="">
                                            <div class="thumbnail imgpaiment">
                                                <img src="{{url('/')}}/public/img/{{$e->image}}" class="image_panier">
                                            </div>
                                        </td>
                                        <td data-label="Date">
                                            De {{\Carbon\Carbon::parse($e->date_debut_envent)->format('d M Y H:i')}}
                                            <br/>à
                                            {{\Carbon\Carbon::parse($e->date_fin_event)->format('d M Y H:i')}}
                                        </td>
                                        <td data-label="Tickets">
                                            @if($e->tickets()->count())
                                                @foreach($e->tickets() as $t)
                                                    {{$t->type}}<br/>
                                                @endforeach
                                            @else
                                                Ticket indisponible
                                            @endif
                                        </td>

                                        <td data-label="Prix">
                                            @if($e->tickets()->count())
                                                @foreach($e->tickets() as $t)
                                                    {{$t->price}}<br/>
                                                @endforeach
                                            @else
                                                Indisponible
                                            @endif
                                        </td>
                                        <td data-label=""><p><a href="organisateur/event/{{$e->id}}/edit" alt="Edit"
                                                                class="rapport">Modifier</a></p>
                                        </td>
                                        <td data-label="">
                                            <p><a href="organisateur/rapport/{{$e->id}}" alt="Edit" class="rapport">Rapport</a>
                                            </p>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- #tab1 -->
                        <h3 class="tab_drawer_heading" rel="tab2">Mes ventes Actuelles</h3>
                        <div id="tab2" class="tab_content">
                            <table class="tabl-content table-custom">
                                <thead>
                                <tr>
                                    <th scope="col" class=""><b class="bold">Evénement</b></th>
                                    <th scope="col"><b class="bold">Date</b></th>
                                    <th scope="col"><b class="bold">Tickets</b></th>
                                    <th scope="col"><b class="bold">Prix Unitaire</b></th>
                                    <th scope="col"><b class="bold"></b></th>
                                    <th scope="col"><b class="bold"></b></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events_futur as $e)
                                    <tr>
                                        <td data-label="">
                                            <div class="thumbnail imgpaiment">
                                                <a href="event/show/{{$e->id}}">
                                                    <img src="{{url('/')}}/public/img/{{$e->image}}"
                                                         class="image_panier">
                                                </a>
                                            </div>
                                        </td>
                                        <td data-label="Date">
                                            De {{\Carbon\Carbon::parse($e->date_debut_envent)->format('d M Y H:i')}}
                                            <br/>à
                                            {{\Carbon\Carbon::parse($e->date_fin_event)->format('d M Y H:i')}}
                                        </td>
                                        <td data-label="Tickets">
                                            @if($e->tickets()->count())
                                                @foreach($e->tickets as $t)
                                                    {{$t->type}}<br/>
                                                @endforeach
                                            @else
                                                Ticket indisponible
                                            @endif
                                        </td>

                                        <td data-label="Prix">
                                            @if($e->tickets()->count())
                                                @foreach($e->tickets as $t)
                                                    {{$t->price}} Ar<br/>
                                                @endforeach
                                            @else
                                                Indisponible
                                            @endif
                                        </td>
                                        <td data-label=""><p><a href="organisateur/event/{{$e->id}}/edit" alt="Edit"
                                                                class="rapport">Modifier</a></p>
                                        </td>
                                        <td data-label="">
                                            <p><a href="organisateur/rapport/{{$e->id}}" alt="Edit" class="rapport">Rapport</a>
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- #tab2 -->
                        <h3 class="tab_drawer_heading" rel="tab3">Mes achats passés</h3>
                        <div id="tab3" class="tab_content">
                            <table class="tabl-content table-custom">
                                <thead>
                                <tr>
                                    <th scope="col" class=""><b class="bold">Evénement</b></th>
                                    <th scope="col"><b class="bold">Tickets</b></th>
                                    <th scope="col"><b class="bold">Date Achat</b></th>
                                    <th scope="col"><b class="bold">Nombre</b></th>
                                    <th scope="col"><b class="bold">QR code</b></th>
                                </tr>
                                </thead>

                                <tbody>
                                @if(count($achats)>0)
                                    @foreach($achats as $a)
                                        @php
                                            $event = $a->events[0];
                                        @endphp
                                        @if($event->date_fin_event < date('Y-m-d H:i:s'))
                                            @if($a->pivot->status_payment!='FAILED')
                                                <tr>
                                                    <td data-label="">
                                                        <div class="thumbnail imgpaiment">
                                                            <img src="{{url('/')}}/public/img/{{$event->image}}"
                                                                 class="image_panier">
                                                        </div>
                                                    </td>
                                                    <td data-label="Tickets">{{$a->type}}</td>
                                                    <td data-label="Date">{{\Carbon\Carbon::parse($a->pivot->date_achat)->format('d M Y H:i')}}</td>
                                                    <td data-label="Quantité">{{$a->pivot->number}}</td>
                                                    <td data-label="Qrcode">
                                                        @php
                                                            $billet_acheter = App\Models\TicketUser::find($a->pivot->id);
                                                        @endphp
                                                        @foreach($billet_acheter->tapakila as $billet)
                                                            <img src="{{url('/public/qr_code/'.$billet->qr_code)}}"
                                                                 class="image_panier"><br/>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- #tab3 -->
                        <h3 class="tab_drawer_heading" rel="tab4">Mes achats Actuels</h3>
                        <div id="tab4" class="tab_content">
                            <table class="tabl-content table-custom">
                                <thead>
                                <tr>
                                    <th scope="col" class=""><b class="bold">Evénement</b></th>
                                    <th scope="col"><b class="bold">Tickets</b></th>
                                    <th scope="col"><b class="bold">Date Achat</b></th>
                                    <th scope="col"><b class="bold">Nombre</b></th>
                                    {{--<th scope="col"><b class="bold">PDF File</b></th>--}}
                                    <th scope="col"><b class="bold">QR code</b></th>
                                    <th scope="col"><b class="bold"></b></th>
                                </tr>
                                </thead>

                                <tbody>
                                @if(count($achats)>0)
                                    @foreach($achats as $a)
                                        @php
                                            $event = $a->events[0];
                                        @endphp
                                        @if($event->date_fin_event >= date('Y-m-d H:i:s'))
                                            <tr>
                                                <td data-label="">
                                                    <div class="thumbnail imgpaiment">
                                                        <a href="event/show/{{$event->id}}">
                                                            <img src="{{url('/')}}/public/img/{{$event->image}}"
                                                                 class="image_panier">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td data-label="Tickets">{{$a->type}}</td>
                                                <td data-label="Date">{{\Carbon\Carbon::parse($a->pivot->date_achat)->format('d M Y H:i')}}</td>
                                                <td data-label="Quantité">{{$a->pivot->number}}</td>
                                                <td data-label="qr_code">
                                                    @php
                                                        $billet_acheter = App\Models\TicketUser::find($a->pivot->id);
                                                    @endphp
                                                    @foreach($billet_acheter->tapakila as $billet)
                                                        <img src="{{url('/public/qr_code/'.$billet->qr_code)}}"
                                                             class="image_panier">
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if($a->pivot->status_payment=='FAILED')
                                                        <p>
                                                            <a href="shopping/pay/{{Auth::user()->id}}/{{$a->pivot->id}}"
                                                               alt="Edit"
                                                               style="color: #d70506;font-size: 30px !important;">Payer</a>
                                                        </p>
                                                        <p>
                                                            <a href="shopping/cancel/{{Auth::user()->id}}/{{$a->pivot->id}}"
                                                               alt="Edit"
                                                               style="color: #d70506;font-size: 18px !important;">Annuler</a>
                                                        </p>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- #tab4 -->
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section("specificScript")
    <script>
        $(document).ready(function () {

        });

        // tabbed content
        $(".tab_content").hide();
        $(".tab_content:first").show();

        /* if in tab mode */
        $("ul.tabs li").click(function () {

            $(".tab_content").hide();
            var activeTab = $(this).attr("rel");
            $("#" + activeTab).fadeIn();

            $("ul.tabs li").removeClass("active");
            $(this).addClass("active");

            $(".tab_drawer_heading").removeClass("d_active");
            $(".tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");

        });
        /* if in drawer mode */
        $(".tab_drawer_heading").click(function () {

            $(".tab_content").hide();

            var d_activeTab = $(this).attr("rel");

            $("#" + d_activeTab).fadeIn();

            $(".tab_drawer_heading").removeClass("d_active");
            $(this).addClass("d_active");

            $("ul.tabs li").removeClass("active");
            $("ul.tabs li[rel^='" + d_activeTab + "']").addClass("active");
        });


        /* Extra class "tab_last"
         to add border to right side
         of last tab */
        $('ul.tabs li').last().addClass("tab_last");

    </script>
@endsection