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
                    <div class="panel-heading">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            Paiement vers l'organisateur

                            <a href="{{url('/admin/payment/create')}}" class="btn btn-info btn-xs pull-right">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Create
                            </a>

                        </div>
                    </div>

                    <div class="panel-body">
                        <table id="example1" class="table table-bordered table-striped dataTable table-responsive" role="grid" aria-describedby="Liste des paiements vers l'organisateur">
                            <thead>
                                <tr role="row">
                                    <th>date paiement</th>
                                    <th>Transaction numéro</th>
                                    <th>Evénement</th>
                            </thead>
                            <tbody>
                                @foreach($payevent as $p)
                                <tr role="row">
                                  <td>{{ $p->date_payment }}</td>
                                  <td>{{ $p->reference_transaction }}</td>
                                  <td>
                                    <a href="{{url('/admin/events/update/'.$p->events->id)}}">{{ str_limit($p->events->title,25,'...')}}</a>
                                  </td>
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
@section('specificScript')
<!-- DataTables -->
    <script src="{{url('/')}}/public/admin-assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{url('/')}}/public/admin-assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            $('#example1').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>
@endsection