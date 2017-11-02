{{--@extends('layouts.app')--}}

{{--@section('template_title')--}}
{{--Welcome {{ Auth::user()->name }}--}}
{{--@endsection--}}

{{--@section('head')--}}
{{--@endsection--}}
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
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">

                    Edit Event

                    <a href="{{url('/')}}/admin/listevent" class="btn btn-info btn-xs pull-right">
                        <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                        Back <span class="hidden-xs">to</span><span class="hidden-xs"> list</span>
                    </a>

                </div>
                <div class="panel-body">

                    {!! Form::model($event, array('files'=>true,'class' =>'form-horizontal','action' => array('EventController@updateadmin', $event->id), 'method' => 'PUT')) !!}
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{$event->id}}">
                    <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                       {{-- {!! Form::label('title', 'Title *', array('class' => 'col-md-3 control-label')) !!}--}}
                       <label class="col-md-3 control-label">Title (*)</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                {!! Form::text('title', $event->title, array('id' => 'title', 'class' => 'form-control', 'placeholder' => 'category title')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', 'Menus (*)', array('class' => 'col-md-3 control-label')) !!}
                        <div class="col-md-9">
                            <select class="form-control" name="sousmenu">
                                <option value="{{$event->sous_menus->id}}">Sous-menu actuel
                                    - {{$event->sous_menus->name}}</option>
                                @foreach($sousmenus as $sousmenu)
                                    <option value="{{$sousmenu->id}}">{{$sousmenu->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Date début</label>
                        <div class="col-md-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="date_debut" class="form-control pull-right" id="datepicker" value="{{\Carbon\Carbon::parse($event->date_debut_envent)->format('d/m/Y')}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Heure début</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                {{--<input type="text" class="form-control timepicker">--}}
                                <input type="text" name="heure_debut" value="{{\Carbon\Carbon::parse($event->date_debut_envent)->format('h:i')}}" class="form-control" data-inputmask="&quot;mask&quot;: &quot;99:99&quot;" data-mask  >

                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Date fin</label>
                        <div class="col-md-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="date_fin" class="form-control pull-right" id="datepicker1" value="{{\Carbon\Carbon::parse($event->date_fin_event)->format('d/m/Y')}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Heure fin</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                {{--<input type="text" class="form-control timepicker">--}}
                                <input type="text" name="heure_fin" class="form-control" value="{{\Carbon\Carbon::parse($event->date_fin_event)->format('h:i')}}" data-inputmask="&quot;mask&quot;: &quot;99:99&quot;" data-mask  >

                            </div>
                        </div>

                    </div>

                    <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                        {!! Form::label('title', 'Description (*)', array('class' => 'col-md-3 control-label')) !!}
                        <div class="col-md-9">
                            <div class="input-group">
                                {!! Form::textarea('description', $event->additional_note, array('id' => 'title', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                        {!! Form::label('title', 'Localisation nom (*)', array('class' => 'col-md-3 control-label')) !!}
                        <div class="col-md-9">
                            <div class="input-group">
                                {!! Form::text('localisation_nom', $event->localisation_nom, array('id' => 'title', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                        {!! Form::label('title', 'Localisation addresse', array('class' => 'col-md-3 control-label')) !!}
                        <div class="col-md-9">
                            <div class="input-group">
                                {!! Form::text('localisation_adresse', $event->localisation_addresse, array('id' => 'title', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                        {!! Form::label('title', 'Additional note', array('class' => 'col-md-3 control-label')) !!}
                        <div class="col-md-9">
                            <div class="input-group">
                                {!! Form::textarea('additional_note', $event->additional_note, array('id' => 'title', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                        {!! Form::label('title', 'Publié organisateur', array('class' => 'col-md-3 control-label')) !!}
                        <div class="col-md-9">
                            <div class="input-group">
                                {!! Form::textarea('additional_note', $event->additional_note, array('id' => 'title', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::button('Update', array('class' => 'btn btn-success btn-flat margin-bottom-1 pull-right','type' => 'submit', )) !!}


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('specificScript')
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
            $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
            //Date range as a button


            //Date picker
            $('#datepicker').datepicker({
                format:'dd/mm/yyyy',
                autoclose: true
            });
            $('#datepicker1').datepicker({
                format:'dd/mm/yyyy',
                autoclose: true
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

