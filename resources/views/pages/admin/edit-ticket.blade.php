@extends("template-admin")
@section('message')
    @if(count($alert) > 0)
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
            {{--<li class="footer"><a href="#">See All Messages</a></li>--}}
        </ul>
    @endif
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

                    Edit ticket

                    <a href="{{url('/')}}/admin/listevent" class="btn btn-info btn-xs pull-right">
                        <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                        Back <span class="hidden-xs">to</span><span class="hidden-xs"> list</span>
                    </a>

                </div>
                <div class="panel-body">

                    {{--<form  class="form-horizontal" role="form" method="POST" action="{{ route('admin_ticket_create') }}">--}}
                    {!! Form::model($ticket, array('files'=>true,'class' =>'form-horizontal','action' => array('TicketController@update_admin', $ticket->id), 'method' => 'PUT')) !!}
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{Crypt::encryptString($ticket->id)}}">
                    <input type="hidden" name="id_event" value="{{Crypt::encryptString($event->id)}}">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nom du ticket <span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    {!! Form::text('type',$ticket->type, array( 'id'=>'title','class' => 'form-control' ,'required')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Description <span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <textarea name="description">{{$ticket->description}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Prix unitaire <span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    {!! Form::text('price',$ticket->price, array('class' => 'form-control','required')) !!}
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Nombre de billets<span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    {!! Form::text('number',$ticket->number, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-9">
                                <div class="input-group date">
                                    <p style="color:red;" id="message_after_comparaison">La date fin
                                        de l' évenement doit être supérieure à la date debut</p>

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
                                    <input type="text" name="date_debut_vente" class="form-control pull-right" id="datepicker1" value={{\Carbon\Carbon::parse($ticket->date_debut_vente)->format('d-m-Y')}}>
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
                                    <input type="text" name="date_fin_vente" class="form-control pull-right" id="datepicker2" value={{\Carbon\Carbon::parse($ticket->date_fin_vente)->format('d-m-Y')}}>
                                </div>
                            </div>
                        </div>
                        @if(isset($event))
                            {!! Form::hidden('events_id', $event->id, ['class' => 'form-control']) !!}
                        @endif

                        {!! Form::button('Update', array('id'=>'enregister','class' => 'btn btn-success btn-flat margin-bottom-1 pull-right','type' => 'submit', )) !!}
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
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Nombres</th>
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
                                            <td> {{$event->tickets->count()}}</td>
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
    <script>
        $(document).ready(function () {
            $('#message_after_comparaison').hide();
            $('#message_after_comparaison_date_now').hide();
        });

    </script>
    <script type="text/javascript">
        $('#enregister').click(function () {
            console.log("click");
            var datedebut = $('#datepicker1').val();
            var datefin = $('#datepicker2').val();
            console.log(datefin);
            var arrdd = datedebut.split("-");
            datedebut = arrdd[2] + "-" + arrdd[1] + "-" + arrdd[0];
            var arrdf = datefin.split("-");
            datefin = arrdf[2] + "-" + arrdf[1] + "-" + arrdf[0];
            //console.log(datedebut+" "+$('#heured').val());
            var dd = new Date(datedebut);
            var df = new Date(datefin);
            var now = new Date();
            console.log(dd+" "+df);
            if (df <= dd) {
                $('#message_after_comparaison').show();
                //alert("La date fin de l' évenement doit être supérieure à la date debut");
                return false;
            }


        });
    </script>
    <script src="{{url('/')}}/public/js/select2.full.min.js"></script>
    <script src="{{url('/')}}/public/js/jquery.inputmask.js"></script>
    <script src="{{url('/')}}/public/js/jquery.inputmask.date.extensions.js"></script>
    <script src="{{url('/')}}/public/js/jquery.inputmask.extensions.js"></script>
    <script src="{{url('/')}}/public/js/moment.min.js"></script>
    <script src="{{url('/')}}/public/js/daterangepicker.js"></script>
    <script src="{{url('/')}}/public/js/bootstrap-datepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="{{url('/')}}/public/js/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="{{url('/')}}/public/js/bootstrap-timepicker.min.js"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();

            //Datemask dd/mm/yyyy
            $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
            //Datemask2 mm/dd/yyyy
            $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
            //Money Euro
            $("[data-mask]").inputmask();

            //Date range picker
            $('#reservation').daterangepicker();
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                format: 'MM/DD/YYYY h:mm A'
            });
            //Date range as a button


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
            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            });
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });

            //Colorpicker
            $(".my-colorpicker1").colorpicker();
            //color picker with addon
            $(".my-colorpicker2").colorpicker();

            //Timepicker
            $(".timepicker").timepicker({
                showInputs: false
            });
        });
    </script>
@endsection

