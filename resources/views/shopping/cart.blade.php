@extends('template')

@section('content')
    <section id="sectioncategorie" class="clearfix">
        <div class="container">
            <ul class="clearfix">
                @foreach($menus as $menu)
                    <li><a href="{{url('/events/list/categorie',[$menu->id])}}">{{$menu->name}}</a></li>
                @endforeach
            </ul>
            <a href="#" class="menupull" id="pull"><strong>Catégories</strong></a>
        </div>
    </section>

    <section id="sectionevenement" role="navigation">
        <div class="container">
            <ul>
                @foreach($sousmenus as $sousmenu)
                    <li>
                        <a href="{{url('/events/list/categorie/'.$sousmenu->name.'',[$sousmenu->id])}}">{{ucfirst($sousmenu->name)}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    <br>
    <section  class="clearfix">
        <div class="container">
            <ul id="breadcrumbs-one">
                <li><a href="">Acceuil</a></li>
                <li><a href="">Panier</a></li>
            </ul>
        </div>
    </section>
    <section>
        <div class="container">
            @if (sizeof(Cart::content()) > 0)
                <div id="custom-white">
                    <h1>Votre Panier</h1>
                    <div class="panier"></div>
                    @if (session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                    @endif

                    @if (session()->has('error_message'))
                        <div class="alert alert-danger">
                            {{ session()->get('error_message') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Ticket</th>
                                <th>Quantité</th>
                                <th>Prix</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach (Cart::content() as $item)
                                <tr>
                                    <td><img src="{{url('img/logo.png')}}"></td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <select class="selectpicker quantity" data-id="{{ $item->rowId }}">
                                            <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
                                            <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
                                            <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
                                            <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
                                            <option {{ $item->qty == 5 ? 'selected' : '' }}>5</option>
                                        </select>
                                    </td>
                                    <td>{{ $item->subtotal }} Ar</td>
                                    <td>
                                        <form action="{{ url('shopping/cart', [$item->rowId]) }}" method="POST"
                                              class="side-by-side">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" class="btn btn-danger" value="Supprimer">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="right">TOTAL :</td>
                                <td>{{ Cart::instance('default')->subtotal() }} Ar</td>
                                <td></td>
                            </tr>
                            {{--<tr>
                                <td></td>
                                <td></td>
                                <td class="right">Tax :</td>
                                <td> 200 AR</td>
                                <td></td>
                            </tr>--}}
                            {{--<tr>
                                <td></td>
                                <td></td>
                                <td class="right">Total :</td>
                                <td> 5800 AR</td>
                                <td></td>
                            </tr>--}}
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div id="footer-btn">
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <a href="{{url('/')}}" class="btn btn-primary achat">Continuer vos achats</a>
                                <a href="{{url('shopping/checkout')}}" class="btn btn-success caisse">Commander</a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <form action="{{ url('/shopping/emptyCart') }}" method="POST">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger vide">Vider panier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <section>
                    <div class="container">
                        <div id="custom-white">
                            <h1 class="couleur_mot">Votre Panier</h1>
                            <div class="panier"></div>
                            <div class="alert alert-success">
                                <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la
                                    mise en page avant
                                    impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis
                                    les
                                    années 1500 </p>
                            </div>
                            <div class="row panier_3">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <div class="thumbnail panier1">
                                        <img src="{{url('img/pan.jpg')}}" class="panier0">
                                        <div class="caption">
                                            <h3 class="mot_h2">Votre panier est vide</h3>
                                            <h5 class="mot_h2"><a href="{{url('/')}}" class="mot_ha">Remplir vos
                                                    panier</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        </div>
    </section>

@endsection

@section('specificScript')
    <script>
        (function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.quantity').on('change', function () {
                var id = $(this).attr('data-id')
                $.ajax({
                    type: "PATCH",
                    url: '{{ url("/shopping/cart") }}' + '/' + id,
                    data: {
                        'quantity': this.value,
                    },
                    success: function (data) {
                        window.location.href = '{{ url('/shopping/cart') }}';
                    }
                });

            });

        })();

    </script>
@endsection
