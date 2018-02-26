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

                            Liste slide images

                            <div class="btn-group pull-right btn-group-xs">

                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        Slide image
                                    </span>
                                </button>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('/')}}/admin/slide">
                                            <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                                            Ajouter
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">

                        <div class="table-responsive users-table">
                            <table class="table table-striped table-condensed data-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Activé</th>
                                    <th class="hidden-sm hidden-xs hidden-md">Created</th>
                                    <th class="hidden-sm hidden-xs hidden-md">Updated</th>
                                    <th>Actions</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($slides as $slide)

                                    <tr>
                                        <td>{{$slide->id}}</td>
                                        <td>{{$slide->title}}</td>
                                        {{ Form::open(array('url' => 'admin/updateActive') ) }}
                                            @if($slide->active == true)
                                                <td><input type="checkbox" name="active"  value-item="{{$slide->id}}" checked></td>
                                            @else
                                                <td><input type="checkbox"  value-item="{{$slide->id}}" name="active"></td>
                                            @endif
                                            <td class="hidden-sm hidden-xs hidden-md">{{$slide->created_at}}</td>
                                            <td class="hidden-sm hidden-xs hidden-md">{{$slide->updated_at}}</td>
                                            <td>

                                                    <input type="hidden" name="id" value="{{$slide->id}}">
                                                    <button class="btn btn-sm btn-success btn-block" data-toggle="tooltip">
                                                        <span class="hidden-xs hidden-sm">Update</span>
                                                    </button>
                                            </td>
                                        {{ Form::close() }}
                                        <td>
                                            {!! Form::open(array('url' => 'admin/slides/' . $slide->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::button('<span class="hidden-xs hidden-sm">Delete</span>', array('class' => 'btn btn-danger btn-sm','type' => 'submit', 'style' =>'width: 100%;' )) !!}
                                            {!! Form::close() !!}
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
    </div>
@endsection
@section('specificScript')
    @include('modals.modal-delete')
    @if (count($slides) > 10)
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
@endsection