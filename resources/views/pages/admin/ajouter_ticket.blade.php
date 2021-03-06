@extends("template-admin")
@section('specificCss')
<link rel="stylesheet" href="{{url('/')}}/public/admin-assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
@endsection
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
    @if (session('message'))
        <div class="container">
            <div style="">
                <div class="alert alert-success col-md-7" style="text-align: left;">
                    <p><i>{{ session('message') }}</i></p>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">

                    Ajouter ticket

                    <a href="{{url('/')}}/admin/listevent" class="btn btn-info btn-xs pull-right">
                        <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                        Back <span class="hidden-xs">to</span><span class="hidden-xs"> list</span>
                    </a>

                </div>
                <div class="panel-body">

                    <form  class="form-horizontal" role="form" method="POST" action="{{ route('admin_ticket_create') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{Crypt::encryptString($event->id)}}">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nom du ticket <span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    {!! Form::text('type', '', array( 'id'=>'title','class' => 'form-control' ,'required')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Description <span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <textarea name="description"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Prix unitaire <span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    {!! Form::text('price', '', array('class' => 'form-control','required')) !!}
                                </div>
                            </div>
                        </div>


                        @php

                            $i = 0;
                            $interval = new DateInterval('P1D');
                            $daterange = new DatePeriod(\Carbon\Carbon::parse($event->date_debut_envent), $interval ,\Carbon\Carbon::parse($event->date_fin_event));
                            foreach ($daterange as $d)
                            $i++;
                        @endphp
                        @if($i > 1)
                            <div class="form-group">

                                <label class="col-md-3 control-label">Date du ticket <span style="color: red">*</span></label>
                                <span class="help-block">
                                            <i>Votre évènement a @php echo $i @endphp jours. Vous
                                                devriez entrer la date de ce ticket et créer à nouveau un ticket pour les autres dates</i>
                                        </span>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('date_ticket',\Carbon\Carbon::parse($event->date_debut_envent)->format('Y-m-d') , ['class' => 'form-control', 'id' => 'datepicker','placeholder'=>'','required', 'autofocus']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <span class="help-block"><i>Ou simplement:</i></span>
                                <input type="checkbox" name="isValable"/> <i>Ce ticket est valable dans tous les jours de l'évènement.</i>
                            </div>

                        @else
                            {!! Form::hidden('date_ticket', \Carbon\Carbon::parse($event->date_debut_envent)->format('Y-m-d'), ['class' => 'form-control', 'id' => 'date','placeholder'=>'','required', 'autofocus']) !!}
                        @endif
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nombre de billets<span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    {!! Form::text('number', '', array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Date début <span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="date_debut_vente" class="form-control pull-right"
                                           id="datepicker1">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Date fin <span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="date_fin_vente" class="form-control pull-right"
                                           id="datepicker2">
                                </div>
                            </div>
                        </div>
                        @if(isset($event))
                            {!! Form::hidden('events_id', $event->id, ['class' => 'form-control']) !!}
                        @endif

                        {!! Form::button('Ajouter', array('id'=>'enregister','class' => 'btn btn-success btn-flat margin-bottom-1 pull-right','type' => 'submit', )) !!}
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if($event->tickets->count()>0)
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Liste des tickets
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive users-table">
                            <table class="table table-striped table-condensed data-table">
                                <thead>
                                <tr>
                                    <th width="20%">Type</th>
                                    <th>Price</th>
                                    <th width="10%">Nombres</th>
                                    <th width="10%">Ticket vendu</th>
                                    <th width="10%">Ticket non vendu</th>
                                    <th width="10%">Ticket payé</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $id=0; @endphp
                                @foreach($event->tickets as $ticket)
                                    @if($ticket->id != $id)
                                        @php
                                            $id = $ticket->id;
                                        @endphp
                                        <tr>
                                            <td>{{$ticket->type}}</td>
                                            <td>{{$ticket->price}}</td>
                                            <td>{{$ticket->tapakila()->count()}}</td>
                                            @php
                                                $tapakilas=$ticket->tapakila();
                                                $tapakila_vendu = $ticket->tapakila()->where('vendu', '=', '1')->get();
                                                $tapakila_non_vendu = $ticket->tapakila()->where('vendu', '=', '0')->get();
                                                $nbre_vendu=$tapakila_vendu->count();
                                                $nbre_non_vendu=$tapakila_non_vendu->count();
                                                $nbre_paye=0;
                                                $users=$ticket->users()->wherePivot('ticket_id', '=', $ticket->id)->get();
                                            @endphp
                                            @foreach($users as $user)
                                                @php
                                                    $ticket_users=$user->tickets()->wherePivot('ticket_id', '=',$ticket->id )->wherePivot('status_payment', '=',"SUCCESS")->get();;
                                                    $nbre_paye=$ticket_users->count();
                                                @endphp
                                            @endforeach
                                            <td>{{ $nbre_vendu}}</td>
                                            <td>{{ $nbre_non_vendu}}</td>
                                            <td>{{$nbre_paye}}</td>

                                            <td style="width: 25px;">
                                                {!! Form::open(array('url' => 'admin/ticket/delete/'.$ticket->id."/".$event->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                                {!! Form::hidden('_method', 'delete') !!}
                                                {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Delete</span><span class="hidden-xs hidden-sm hidden-md"> ticket</span>', array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Ticket', 'data-message' => 'Are you sure you want to delete this ticket ?')) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            <td style="width: 25px;">
                                                <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('admin/tickets/update/' . $ticket->id ."/".$event->id ) }}" data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                                                    <span class="hidden-xs hidden-sm">Edit</span>
                                                    <span class="hidden-xs hidden-sm hidden-md"> ticket</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    @endif

@endsection
@section('specificScript')
    @include('modals.modal-delete')
    @if ($event->tickets->count() > 10)
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    <script src="{{url('/')}}/public/admin-assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#message_after_comparaison').hide();
            $('#message_after_comparaison_date_now').hide();
        });

    </script>
    <script type="text/javascript">
        $('#enregister').click(function () {
            console.log("click");
            var datedebut = $('#datepicker').val();
            var datefin = $('#datepicker1').val();

            var arrdd = datedebut.split("/");
            datedebut = arrdd[2] + "-" + arrdd[1] + "-" + arrdd[0];
            var arrdf = datefin.split("/");
            datefin = arrdf[2] + "-" + arrdf[1] + "-" + arrdf[0];
            //console.log(datedebut+" "+$('#heured').val());
            var dd = new Date(datedebut + " " + $('#heured').val());
            var df = new Date(datefin + " " + $('#heuref').val());
            var now = new Date();
            console.log(now + "/////" + dd + "/////" + df);
            if (dd < now || df < now) {
                $('#message_after_comparaison_date_now').show();
                //alert("La date fin de l' évenement doit être supérieure à la date debut");
                return false;
            }
            if (df <= dd) {
                $('#message_after_comparaison').show();
                //alert("La date fin de l' évenement doit être supérieure à la date debut");
                return false;
            }

        });
    </script>
    
    <script>
        $(function () {
            
            //Date picker
            $('#datepicker').datepicker({
                format: 'dd-mm-yyyy',
                todayHighlight: true,
                autoclose: true,
            });
            $('#datepicker1').datepicker({
                format: 'dd-mm-yyyy',
                todayHighlight: true,
                autoclose: true,
            });
            $('#datepicker2').datepicker({
                format: 'dd-mm-yyyy',
                todayHighlight: true,
                autoclose: true,
            });
                
        });
    </script>
@endsection

