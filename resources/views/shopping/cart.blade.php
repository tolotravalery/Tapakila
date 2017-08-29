@extends('template')

@section('content')
    <section>
        <div class="container">
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

                @if (sizeof(Cart::content()) > 0)
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
                                <button type="button" class="btn btn-primary achat">Continuer vos achats</button>
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
                @else
                    <h3>Vous n'avez pas des tickets dans votre panier</h3>
                    <a href="{{ url('/shopping/shop') }}" class="btn btn-primary btn-lg">Continue Shopping</a>
                @endif
            </div>
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
