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

                            Showing All Events

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
                                    <th class="hidden-sm hidden-xs hidden-md">Date fin</th>
                                    <th class="hidden-sm hidden-xs hidden-md">Localisation</th>
                                    <th class="hidden-sm hidden-xs hidden-md">Publié</th>
                                    <th>Actions</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                                </thead>
                                @foreach($events as $ev)

                                    <tr>
                                        {{ Form::open(array('url' => 'admin/updatePublie') ) }}
                                        <input type="hidden" name="id" value="{{$ev->id}}">
                                        <td>{{$ev->id}}</td>
                                        <td>{{$ev->title}} </td>
                                        <td class="hidden-sm hidden-xs hidden-md">{{$ev->sous_menus->name}}</td>
                                        <td class="hidden-sm hidden-xs hidden-md">{{$ev->date_debut_envent}}</td>
                                        <td class="hidden-sm hidden-xs hidden-md">{{$ev->date_fin_event}}</td>
                                        <td class="hidden-sm hidden-xs hidden-md">{{$ev->localisation_nom}};{{$ev->localisation_adresse}}</td>
                                        <?php if($ev->publie == true):?>
                                        <td><input type="checkbox" name="active" checked></td>
                                        <?php else: ?>
                                        <td><input type="checkbox" name="active"></td>
                                        <?php endif;?>
                                        <td>
                                            <button class="btn btn-sm btn-success btn-block" data-toggle="tooltip"title="Show">
                                                <span class="hidden-xs hidden-sm">Update</span>
                                            </button>
                                        </td>
                                        {{ Form::close() }}
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
    @if (($ev->count()) > 10)
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
@endsection