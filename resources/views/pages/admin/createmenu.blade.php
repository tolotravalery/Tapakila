{{--@extends('layouts.app')--}}

{{--@section('template_title')--}}
{{--Welcome {{ Auth::user()->name }}--}}
{{--@endsection--}}

{{--@section('head')--}}
{{--@endsection--}}
@extends("template-admin")
@section('content')
    <br><br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">

                    Create New Categorie

                    <a href="{{url('/')}}/admin/menus" class="btn btn-info btn-xs pull-right">
                        <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                        Back <span class="hidden-xs">to</span><span class="hidden-xs"> list</span>
                    </a>

                </div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('menu') }}">
                        {!! csrf_field() !!}
                        <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                            {!! Form::label('name', 'Name (*)', array('class' => 'col-md-3 control-label')) !!}
                            <div class="col-md-9">
                                <div class="input-group">
                                    {!! Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'category name')) !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::button('Créer', array('class' => 'btn btn-success btn-flat margin-bottom-1 pull-right','type' => 'submit', )) !!}

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

