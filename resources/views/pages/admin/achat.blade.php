@extends("template-admin")
@section('content')
    <br><br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ACHATS
                </div>
                <div class="panel-body">
                    <div class="table-responsive users-table">
                        <table class="table table-striped table-condensed data-table">
                            <thead>
                            <tr>
                                <th>Reference</th>
                                <th>Date Achat</th>
                                <th class="hidden-xs">Evénement</th>
                                <th class="hidden-xs">Type ticket</th>
                                <th>Nombre</th>
                                <th class="hidden-xs">Utilisateur</th>
                                <th>Mode de paiement</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($achats as $achat)
                                @php

                                    $user = App\Models\User::find($achat->user_id);
                                    $ticket = App\Models\Ticket::find($achat->ticket_id);
                                    $event = $ticket->events()->get()[0];
                                    $modePaiement = App\Models\Payement_mode::find($achat->payement_mode_id);
                                @endphp
                                <tr>
                                    <td>{{$achat->achat_reference}}</td>
                                    <td>{{$achat->date_achat}}</td>
                                    <td>{{$event->title}}</td>
                                    <td>{{$ticket->type}}</td>
                                    <td>{{$achat->number}}</td>
                                    <td><a href="{{url('/admin/users/'.$user->id)}}">{{$user->name}}</a></td>
                                    <td>{{$modePaiement->value}}</td>
                                    <td>{{$achat->status_payment}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (count($achats) > 10)
        @include('scripts.datatables')
    @endif
@endsection
