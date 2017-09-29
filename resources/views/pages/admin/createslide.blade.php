@extends("template-admin")

@section('message')
    @if(count($alert) > 0)
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
            {{--<li class="footer"><a href="#">See All Messages</a></li>--}}
        </ul>
    @endif
@endsection
@section('content')
    <br><br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">

                    Ajouter image

                    <a href="{{url('/')}}/admin/slides" class="btn btn-info btn-xs pull-right">
                        <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                        Back <span class="hidden-xs">to</span><span class="hidden-xs"> list</span>
                    </a>

                </div>
                <div class="panel-body">

                    <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ route('slide') }}">
                        {!! csrf_field() !!}
                        <div class="form-group has-feedback row {{ $errors->has('title') ? ' has-error ' : '' }}">
                            {!! Form::label('title', 'Titre (*)', array('class' => 'col-md-3 control-label')) !!}
                            <div class="col-md-9">
                                <div class="input-group">
                                    {!! Form::text('title', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'titre image')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group has-feedback row {{ $errors->has('') ? ' has-error ' : '' }}">
                            {!! Form::label('image', 'Image (*)', array('class' => 'col-md-3 control-label')) !!}
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="file" id="exampleInputFile" name="image">
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
