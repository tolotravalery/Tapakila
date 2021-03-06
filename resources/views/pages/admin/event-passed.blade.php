{{--@extends('layouts.app')--}}

{{--@section('template_title')--}}
{{--Welcome {{ Auth::user()->name }}--}}
{{--@endsection--}}

{{--@section('head')--}}
{{--@endsection--}}
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

                            Showing All Events

                            <a href="{{url('/')}}/admin/events/create" class="btn btn-info btn-xs pull-right">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Create <span class="hidden-xs"> Event</span>
                            </a>

                        </div>
                    </div>

                    <div class="panel-body">

                        <div class="table-responsive users-table">
                            <table class="table table-striped table-condensed data-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th class="hidden-sm hidden-xs hidden-md">Sous menus</th>
                                    <th class="hidden-sm hidden-xs hidden-md">Date début</th>
                                    <th class="hidden-sm hidden-xs hidden-md">Localisation</th>
                                    <th class="hidden-sm hidden-xs hidden-md">Publié par l'organisateur</th>
                                    <th class="hidden-sm hidden-xs hidden-md">Activé</th>
                                    {{--<th class="hidden-sm hidden-xs hidden-md">Billets</th>--}}
                                    <th>Actions</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $j=0;
                                    $u=1;
                                @endphp
                                @foreach($events as $ev)
                                    <tr>
                                        {{-- {{ Form::open(array('url' => 'admin/updatePublie') ) }}--}}
                                        <input type="hidden" name="id" value="{{$ev->id}}">
                                        <td>{{$u}}</td>
                                        <td>{{$ev->title}} </td>
                                        <td class="hidden-sm hidden-xs hidden-md">{{$ev->sous_menus->name}}</td>
                                        <td class="hidden-sm hidden-xs hidden-md">{{$ev->date_debut_envent}}</td>
                                        <td class="hidden-sm hidden-xs hidden-md">{{$ev->localisation_nom}}
                                            ;{{$ev->localisation_adresse}}</td>
                                        <td class="hidden-sm hidden-xs hidden-md">
                                            @if(strcmp($ev->publie_organisateur,"0") == 0)
                                                Non publié
                                            @else
                                                Publié
                                            @endif
                                        </td>
                                        @if($ev->publie == true)
                                            <td class="hidden-sm hidden-xs hidden-md"><input type="checkbox" name="active" id="checkbox{{$j}}"
                                                       value-item="{{$ev->id}}" checked></td>
                                        @else
                                            <td class="hidden-sm hidden-xs hidden-md"><input type="checkbox" id="checkbox{{$j}}" value-item="{{$ev->id}}"
                                                       name="active"></td>
                                        @endif

                                        <td>
                                            <a href="{{url('/admin/events/repport/'.$ev->id)}}" class="btn btn-sm btn-success btn-block" data-toggle="tooltip"
                                                    title="Show">
                                                <span>View</span>
                                            </a>
                                        </td>
                                        @php
                                            $j++;
                                            $u++;
                                        @endphp
                                        {{--{{ Form::close() }}--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <input type="hidden" id="isanCheckbox" value="{{$j}}">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('specificScript')
    @include('modals.modal-delete')
    @if (count($events) > 10)
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    <script>
        (function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#buttonUpdate').click(function () {
                var isanCheckbox = $('#isanCheckbox').val();
                for (var i = 0; i < (isanCheckbox);) {
                    if ($('#checkbox' + i).prop('checked') == true) {
                        var update = 1;
                    }
                    else {
                        var update = 0;
                    }
                    var id = $('#checkbox' + i).attr('value-item');
                    $.ajax({
                        type: "GET",
                        url: '{{ url("/admin/updatePublieAll") }}',
                        data: {
                            'id': id,
                            'active': update,
                        },
                        success: function (data) {
                            console.log(data);
                        }
                    });

                    i++;
                }
                //window.location.reload(true);
            });
        })();

    </script>
@endsection