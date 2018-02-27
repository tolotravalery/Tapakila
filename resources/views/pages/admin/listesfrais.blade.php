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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <style type="text/css" media="screen">
        .users-table {
            border: 0;
        }

        .users-table tr td:first-child {
            padding-left: 15px;
        }

        .users-table tr td:last-child {
            padding-right: 15px;
        }

        .users-table.table-responsive,
        .users-table.table-responsive table {
            margin-bottom: 0;
        }

    </style>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            Frais

                        </div>
                    </div>
                    <div class="panel-body">
                        {!! Form::model($frais, array('files'=>true,'class' =>'form-horizontal','action' => array('EventController@update_frais', $frais->id), 'method' => 'PUT')) !!}
                        <div class="form-group">
                            <label class="col-md-3 control-label">Pourcentage</label>
                            <div class="col-md-9">
                                <div class="input-group date">
                                    <input type="text" name="pourcentage" class="form-control pull-right"
                                           value="{{$frais->pourcentage}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                @if ($errors->has('pourcentage'))
                                    <span style="color:red;">
                                            <strong>{{ $errors->first('pourcentage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {!! Form::button('Update', array('id'=>'enregister','class' => 'btn btn-success btn-flat margin-bottom-1 pull-right','type' => 'submit', )) !!}
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('specificScript')
@endsection