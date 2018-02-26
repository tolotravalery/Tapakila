@extends("template-admin")
@section('message')
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success">{{count($alert)}}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">You have {{count($alert)}} messages</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    @foreach($alert as $a)
                        <li><!-- start message -->
                            <a href="{{url('admin/message/read',[$a->id])}}">
                                <div class="pull-left">
                                    <img src="{{url('/')}}/public/admin-assets/dist/img/user2-160x160.jpg"
                                         class="img-circle"
                                         alt="User Image">
                                </div>
                                <h4>
                                    New event
                                    <small><i class="fa fa-clock-o"></i> {{$a->created_at->diffForHumans() }}</small>
                                </h4>
                                <p>{{ str_limit($a->message,$limit = 35 ,$end = ' ...') }}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="footer"><a href="{{url('/admin/clear-alert')}}">Tous marqués lu</a></li>
        </ul>
@endsection
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
                                    <td class="hidden-xs">{{$event->title}}</td>
                                    <td class="hidden-xs">{{$ticket->type}}</td>
                                    <td>{{$achat->number}}</td>
                                    <td class="hidden-xs"><a href="{{url('/admin/users/'.$user->id)}}">{{$user->name}}</a></td>
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
@endsection
@section('footer')
@endsection
@section('specificScript')
    @if (count($achats) > 10)
        @include('scripts.datatables')
    @endif
@endsection
