@extends('shopping.master')

@section('content')
    <div class="container">
        <div id="menu4">
            <h2>Summary</h2>
            <p>Nisy mail nalefanay any aminao {{$checkout->getAdresseFacturation()['mail']}}. Tsy ekena ny réservation
                anao raha tsy validé-nao ny mail</p>
            <div class="panel panel-default">
                <div class="panel-heading">Produit</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($checkout->getCart() as $item)
                            <tr>
                                <td>
                                    {{$item['name'] }}
                                </td>
                                <td>
                                    {{$item['qty']}}
                                </td>
                                <td>
                                    {{$item['price']}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Adresse Facturation</div>
                <div class="panel-body">
                    Mr/Mme/Mlle {{$checkout->getAdresseFacturation()['name'] }}<br/>
                    {{$checkout->getAdresseFacturation()['adresse']}}<br/>
                    {{$checkout->getAdresseFacturation()['city']}}<br/>
                    {{$checkout->getAdresseFacturation()['phone']}}<br/>
                    {{$checkout->getAdresseFacturation()['mail']}}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Adresse Livraison</div>
                <div class="panel-body">
                    <div id="show_livraison">
                        Mr/Mme/Mlle {{$checkout->getAdresseLivraison()['name'] }}<br/>
                        {{$checkout->getAdresseLivraison()['adresse']}}<br/>
                        {{$checkout->getAdresseLivraison()['city']}}<br/>
                        {{$checkout->getAdresseLivraison()['phone']}}<br/>
                        {{$checkout->getAdresseLivraison()['mail']}}<br/>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Payement méthode</div>
                <div class="panel-body">
                    @if($checkout->getMethodePayement() == 'paypal')
                        <span><img src="{{url('/img/paypal.png')}}"
                                   style="width: 100px; height: 50px;"></span>
                    @else
                        <span><img src="{{url('/img/mvola.jpg')}}"
                                   style="width: 100px; height: 50px;"></span>
                    @endif
                </div>
            </div>
            <button class="btn btn-default">
                Confirmer
            </button>

        </div>
        <br/><br/>
    </div>
@endsection
