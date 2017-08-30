@extends('layouts.app')

@section('template_title')
    Welcome {{ Auth::user()->name }}
@endsection

@section('head')
@endsection

@section('content')
    <div class="container">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('sousmenu') }}">
            {{ csrf_field() }}
            <p class="reinitialise">Create new sous menu</p>
            <div class="white">
                <div class="champs2">
                    <p><strong>Title</strong></p>
                    <input id="name" type="placeholde" placeholder="name" class="form-control"  name="name"  required autofocus>

                    @if ($errors->has('email'))
                        <span class="red">
                                    <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif


                </div>
            </div>
            <div class="form-group has-feedback row ">
                <div class="col-md-9">
                    <div class="input-group">

                            <select class="form-control" name="menu">
                                @foreach($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->name}}</option>
                                @endforeach
                            </select>


                    </div>
                </div>
            </div>




            <div class="customcolor">
                <div class="row divider">
                    <div class="col-md-6 col-xs-12">
                        <input class="sinscrire input-submit" type="submit" name="s'inscrire'"  value="Add" style="margin-left: 80px;width: 180px;height: 56px;">
                    </div>

                </div>
            </div>

        </form>
        <li><a href="{{url('/')}}/admin/sousmenus">Sous Menus</a></li>
    </div>

@endsection

