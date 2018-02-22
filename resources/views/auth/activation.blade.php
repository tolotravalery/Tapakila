@extends("template-custom")
@section('title')
    <title>Le Guichet | Activer votre compte</title>
@endsection
@section('content')


	<section id="content1">
        <div class="container custom-container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
					<div id="globcontent">
						<p>{{ Lang::get('auth.regThanks') }}<p>
						<p>{{ Lang::get('auth.anEmailWasSent') }}</p>
						<p>{{ Lang::get('auth.clickInEmail') }}</p>
						<a href='{{ url('/') }}/activation'><button type="text" class="btn btn-success ">Renvoyer le message de confirmation</button></a>
					</div>
                </div>
            </div>
        </div>
    </section>

@endsection