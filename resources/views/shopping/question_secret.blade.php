@extends("template")
@section('content')
    <section id="sectioncategorie" class="clearfix">
        <div class="container custom-container">
            <ul class="clearfix">
                <li><a href="{{url('/')}}">TOUS</a></li>
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
    <section>
        <div class="container custom-container">
            <div class="bg-back-sustom">
                <h2 class="titlebuy"><i>Quizz</i></h2>
                <div class="spacing"></div>
                <p><i>Pour la raison de sécurité, Leguichet offre un questionnaire pour l'évènement, ... </i></p>
                {!! Form::open(['id' => 'question-form', 'route' => 'checkout_index','role' => 'question', 'method' => 'POST'] ) !!}
                @php($i = 0)
                @foreach (Cart::content() as $item)
                    @php
                        $ticket = \App\Models\Ticket::findOrFail($item->id);
                        $event = $ticket->events()->take(1)->get()[0];
                    @endphp
                    @if($event->question_secret != null)
                        <div class="row">
                            <div class="col-md-4">
                                @if($i==0)
                                    <h2 class="text-center">Evènement</h2>
                                @endif
                                <div class="row">
                                    <div class="col-lg-7 ">
                                        <div class="thumbnail imgpaiment">
                                            <a href="{{url('event/show',[$event->id])}}">
                                                <img src="{{url('/public/img/'.$event->image)}}" class="image_panier">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 ">
                                        <p class="sor"><b>{{str_limit($event->title,$limit=20,$end=' ...')}}</b></p>
                                    </div>
                                    {!! Form::hidden('__hidden_input_ev__[]', $event->id) !!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                @if($i==0)
                                    <h2 class="quiz">Quéstion</h2>
                                @endif
                                <p class="ask2"><strong>{{$event->question_secret}}</strong></p>
                            </div>

                            <div class="col-md-4">
                                @if($i==0)
                                    <h2 class="quiz">Réponse</h2>
                                @endif
                                <input class="form-control answer1" type="texte" name="__hidden_input_ans__[]" placeholder="votre réponse ici" required>
                            </div>

                        </div>
                        <hr class="separated">
                    @endif
                @endforeach
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4 " style="text-align:center;">
                        <button type="submit" class="btn btn-success btn-lg btn-sub">Envoyer</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection