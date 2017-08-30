@extends('shopping.master')

@section('content')
    <div class="container">
        <div id="menu4">
            <h2>Congratulation</h2>
            <p>Your booking is save in our database.... check to active this</p>
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
                        @foreach($user->products as $product)
                            <tr>
                                <td>
                                    {{ $product->name }}
                                </td>
                                <td>
                                    {{ $product->pivot->number }}
                                </td>
                                <td>
                                    {{ $product->pivot->number * $product->price }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br/><br/>
    </div>
@endsection
