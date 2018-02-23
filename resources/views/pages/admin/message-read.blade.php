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
@section("content")
    <br/><br/>
    <div class="col-md-12">
        <a href="{{url('admin/message')}}">Back to list</a>
        <br/><br/>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Read Message</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="mailbox-read-info">
                    {{--<h3>Message Subject Is Placed Here</h3>--}}
                    <h5>{{--From: help@example.com--}}
                        {{ \Carbon\Carbon::parse($alert->created_at)->format('D d M Y H:i')}}
                        ({{$alert->created_at->diffForHumans()}})</h5>
                </div>
                <div class="mailbox-read-message">
                    <p style="text-align: justify">
                        {{$alert->message}}
                    </p>

                    <p>Merci,<br>L'équipe Tapakila.mg </p>
                </div>
                <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <ul class="mailbox-attachments clearfix">
                    <li>
                        <span class="mailbox-attachment-icon"><i class="fa fa-link"></i></span>

                        <div class="mailbox-attachment-info">
                            <a href="{{url('/')}}/admin/listevent" class="mailbox-attachment-name"><i
                                        class="fa fa-paperclip"></i>
                                Click to active</a>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
                <div class="pull-right">
                    <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
                    <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
                </div>
                <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
                <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /. box -->
    </div>
@endsection