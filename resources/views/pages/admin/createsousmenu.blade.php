@extends('layouts.app')

@section('template_title')
    Welcome {{ Auth::user()->name }}
@endsection

@section('head')
@endsection

@section('content')

    <section id="detail">
        <div class="container">
            <div class="page-menu row">
                <div class="col-md-9">
                    <h1>Créér un sous-menu</h1>
                </div>
                
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('sousmenu') }}">
            {{ csrf_field() }}
            <div class="panel panel-content">
                <div class="panel-body border-bottom">
                    <div class="clearfix"></div>
                    <div class="form-group ">
                        <label class="control-label ">
                            <span>Name : *</span>
                        </label>
                        
                        <input id="name" type="placeholde" placeholder="name" class="form-control"  name="name"  required autofocus>
                        @if ($errors->has('email'))
                        <span class="red">
                                    <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label ">
                        <span>Menus : </span>
                        </label>
                        <div class="form-group" style="margin-left: 0px!important;margin-right: 0px!important;">
                            <select class="form-control" name="menu">
                                <option>--------choisir-----------</option>
                                     @foreach($menus as $menu)
                                     <option value="{{$menu->id}}">{{$menu->name}}</option>
                                     @endforeach
                           </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        
                            <button type="submit" class="btn btn-default enregistrer ">Enregistrer</button>
                        
                    </div>
                </div>
            </div>
            </form>
            <li><a href="{{url('/')}}/admin/sousmenus">Sous Menus</a></li>
    </section>

    

@endsection

