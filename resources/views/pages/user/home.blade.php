@extends("template")
@section("content")
    <section id="sectioncategorie" class="clearfix">
        <div class="container custom-container">
            <ul class="clearfix">
                <li><a href="{{url('/')}}">TOUS</a></li>
                @foreach($menus as $menu)
                    <li><a href="{{url('/event/list/categorie',[$menu->id])}}">{{strtoupper($menu->name)}}</a></li>
                @endforeach

            </ul>
            <a href="#" class="menupull" id="pull"><strong>Catégories</strong></a>
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
                                @if(Auth::user()->profile_avatar)
                                    <img src="{{Auth::user()->profile_avatar}}" id="sary" class="postion">
                                @else
                                    <img src="{{url('/')}}/public/img/usercircle.png" id="sary" class="postion">
                                @endif
                            </div>
                            <div class="col-md-8 text-left-md text-left-lg text-center-xs text-center-sm">
                                <label class="pseudoname">{{Auth::user()->name}}</label><br>
                                @if(strpos(Auth::user()->email,'@test.com')!== false && strpos(Auth::user()->email,'missing') !== false)
                                    <p><i class="fa fa-facebook-official fenalope" aria-hidden="true"></i>S'authentifier
                                        via compte facebook
                                    </p>
                                @else
                                    <p><i class="fa fa-envelope fenalope" aria-hidden="true"></i>{{Auth::user()->email}}
                                    </p>
                                @endif
                            </div>
                        </div>
                        @role('user')
                        <p>Vous pouvez changer votre profile en organisateur pour ajouter un
                            événement.</p>
                        @endrole
                    </div>
                    <div class="col-md-7 text-right-md text-right-lg text-center-xs text-center-sm ">
                        <a class="modifinfo" href="{{url('/profile/'.Auth::user()->id.'/edit')}}">Modifier mes
                            Informations</a>
                    </div>
                </div>
                <?php
                if(isset($niova)){?>
                <div class="container">
                    <div style="margin-left: 36px;">
                        <div class="alert alert-success col-md-7" style="text-align: left;">
                            <p style="margin-left: 5px;"><?php echo $niova; ?></p>
                        </div>
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
                        <li class="active" rel="tab3"><b>Mes Achats <br>passés</b></li>
                        <li rel="tab4"><b>Mes Achats<br> Actuels</b></li>
                    </ul>
                    <div class="tab_container">
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
                                    {{--<th scope="col"><b class="bold">PDF File</b></th>--}}
                                    <th scope="col"><b class="bold">QR code</b></th>
                                </tr>
                                </thead>

                                <tbody>
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
                                                <td data-label="QR code">
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
                                </tbody>
                            </table>
                        </div>
                        <!-- #tab3 -->
                        <h3 class="tab_drawer_heading" rel="tab4">Mes Achats Actuels</h3>
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
                                @foreach($achats as $a)
                                    @php
                                        $event = $a->events[0];
                                    @endphp
                                    @if($event->date_fin_event >= date('Y-m-d H:i:s'))
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
                                            <td data-label="QR code">
                                                @php
                                                    $billet_acheter = App\Models\TicketUser::find($a->pivot->id);
                                                @endphp
                                                @foreach($billet_acheter->tapakila as $billet)
                                                    <img src="{{url('/public/qr_code/'.$billet->qr_code)}}"
                                                         class="image_panier"><br/>
                                                @endforeach
                                            </td>
                                            <td data-label="action">
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
            console.log("huhu");
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