@extends("template-admin")
@section('specificCss')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{url('/')}}/public/admin-assets/bower_components/select2/dist/css/select2.min.css">
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
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <form role="form" method="POST" action="{{ url('admin/payment') }}">
                        {{ csrf_field() }}
                        <div class="panel-heading">
                            <div style="display: flex; justify-content: space-between; align-items: center;">

                                Paiement vers l'organisateur

                                <a href="{{url('/admin/payment')}}" class="btn btn-info btn-xs pull-right">
                                    <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                                    Back <span class="hidden-xs"></span>
                                </a>

                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                  <!-- /.form-group -->
                                  <div class="form-group">
                                    <label>Transaction numéro:</label>
                                    <input type="text" class="form-control" name="transaction">
                                  </div>
                                  <!-- /.form-group -->

                                  <!-- /.form-group -->
                                  <div class="form-group">
                                    <label>Date paiement:</label>
                                    <input type="text" class="form-control" id="date-pay" name="date_payment">
                                  </div>
                                  <!-- /.form-group -->

                                  <div class="form-group">
                                    <label>Evénement</label>
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="event">
                                        @foreach($events as $e)
                                            <option value="{{$e->id}}">{{str_limit($e->title,20,'...')}}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                </div>
                                <!-- /.col -->
                              </div>
                        </div>

                        <div class="panel-footer">
                             @if (session('success'))
                                <div class="alert alert1 alert-success">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    <strong>{!! session('success') !!}</strong>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Enregister</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>        
@endsection
@section('specificScript')
<!-- Select2 -->
<script src="{{url('/')}}/public/admin-assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="{{url('/')}}/public/admin-assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
      $(function () {
        //Initialize Select2 Elements
            $('.select2').select2()
            $('#date-pay').datepicker({
                format: 'dd-mm-yyyy',
                todayHighlight: true,
                autoclose: true,
            });
       });
</script>
@endsection