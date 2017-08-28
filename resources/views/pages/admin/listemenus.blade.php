@extends('layouts.app')

@section('template_title')
    Welcome {{ Auth::user()->name }}
@endsection

@section('head')
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
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            Showing All Categories

                            <div class="btn-group pull-right btn-group-xs">

                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        Show Categories Management Menu
                                    </span>
                                </button>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/users/create">
                                            <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                                            Create New Category
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/users/deleted">
                                            <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                            Show Deleted Category
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
                                    <th class="hidden-sm hidden-xs hidden-md">Created</th>
                                    <th class="hidden-sm hidden-xs hidden-md">Updated</th>
                                    <th>Actions</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($menus as $menu)
                                    <tr>
                                        <td>{{$menu->id}}</td>
                                        <td>{{$menu->title}}</td>
                                        <td class="hidden-sm hidden-xs hidden-md">{{$menu->created_at}}</td>
                                        <td class="hidden-sm hidden-xs hidden-md">{{$menu->updated_at}}</td>
                                        <td>
                                            {!! Form::open(array('url' => 'admin/menus/' . $menu->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Delete</span><span class="hidden-xs hidden-sm hidden-md"> Menu</span>', array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete Menu', 'data-message' => 'Are you sure you want to delete this menu ?')) !!}
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

    @include('modals.modal-delete')
    @if (count($menu) > 10)
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
@endsection