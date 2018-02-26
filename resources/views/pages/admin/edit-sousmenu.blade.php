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
    <br><br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">

                    Edit Sous Categorie

                    <a href="{{url('/')}}/admin/sousmenus" class="btn btn-info btn-xs pull-right">
                        <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                        Back <span class="hidden-xs">to</span><span class="hidden-xs"> list</span>
                    </a>

                </div>
                <div class="panel-body">

                    {!! Form::model($sousmenu, array('class' =>'form-horizontal','action' => array('SousmenuController@update', $sousmenu->id), 'method' => 'PUT')) !!}
                    {!! csrf_field() !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name (*)', array('class' => 'col-md-3 control-label')) !!}
                        <div class="col-md-9">
                            <div class="input-group">
                                {!! Form::text('name',$sousmenu->name, array('id' => 'name', 'class' => 'form-control')) !!}
                            </div>
                            @if ($errors->has('name'))
                                <span style="color: red;">
                                  <strong>Ce nom existe déja.</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', 'Menus (*)', array('class' => 'col-md-3 control-label')) !!}
                        <div class="col-md-9">
                            <select class="form-control" name="menu">
                                <option value="{{$sousmenu->menus->id}}">Catégorie actuel
                                    - {{$sousmenu->menus->name}}</option>
                                @foreach($menus as $menu)
                                    <option value="{{$menu->id}}">{{$menu->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {!! Form::button('Update', array('class' => 'btn btn-success btn-flat margin-bottom-1 pull-right','type' => 'submit', )) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

