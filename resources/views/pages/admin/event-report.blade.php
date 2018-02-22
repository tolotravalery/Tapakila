@extends("template-admin")
 @php($montant=0)
    @foreach($event->tickets as $t)
        @php($montant += count($t->tapakila()->where('vendu','=',1)->get()) * $t->price)
    @endforeach
@section('content')
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-xs-4">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$nombreAchat}}</h3>

                        <p>Achats</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-4">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$revenu}}<sup style="font-size: 20px">%</sup></h3>

                        <p>Revenu</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xs-4">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$montant}}</h3>

                        <p>ARIARY</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-dollar"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable ui-sortable">

                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-black"
                         style="background: url('{{url('/public/img/'.$event->image)}}') center center;">
                        <h3 class="widget-user-username">{{str_limit($event->title,25,'...')}}</h3>
                        <h5 class="widget-user-desc">{{str_limit($event->additional_note,50,'...')}}</h5>
                    </div>
                    <div class="widget-user-image">
                        @if(\App\Models\User::find($event->user_id)->profile_avatar)
                            <img class="img-circle" src="{{Auth::user()->profile_avatar}}" alt="User Avatar">
                        @else
                            <img class="img-circle" src="{{url('/')}}/public/img/usercircle.png" alt="User Avatar">
                        @endif

                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{count($event->tickets)}}</h5>
                                    <span class="description-text">TYPE DE TICKET</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{$ticket_genere}}</h5>
                                    <span class="description-text">TICKET GENERE</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{$montant}}</h5>
                                    <span class="description-text">ARIARY</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>

                @php($j = 0)
                <div class="row">
                    @foreach($event->tickets as $t)
                        <div class="col-md-6">
                            <!-- Widget: user widget style 1 -->
                            <div class="box box-widget widget-user-2">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-aqua-active">
                                    <!-- /.widget-user-image -->
                                    <h3 class="widget-user-username">{{$t->type}}</h3>
                                    <h5 class="widget-user-desc">{{$t->description}}</h5>
                                </div>
                                <div class="box-footer no-padding">
                                    <ul class="nav nav-stacked">
                                        <li><a href="#">Billet générer : <span
                                                        class="pull-right badge bg-blue">{{count($t->tapakila)}}</span></a>
                                        </li>
                                        <li><a href="#">Billet vendu : <span class="pull-right badge bg-aqua">{{count($t->tapakila()->where('vendu','=',1)->get())}}</span></a>
                                        </li>
                                        <li><a href="#">Montant reçu : <span
                                                        class="pull-right badge bg-green">{{count($t->tapakila()->where('vendu','=',1)->get()) * $t->price}} Ariary</span></a></li>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>
                    @endforeach
                </div>

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Overview de tous les achats</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example1_wrapper"
                             class="table table-bordered table-striped table-responsive dataTable">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable"
                                           role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="hidden-xs hidden-sm">
                                                Référence
                                            </th>
                                            <th class="hidden-xs hidden-sm">
                                                Date achat
                                            </th>
                                            <th>
                                                Nombre
                                            </th>
                                            <th>
                                                Type ticket
                                            </th>
                                            <th class="hidden-xs hidden-sm">
                                                Client
                                            </th>
                                            <th class="hidden-xs hidden-sm">
                                                Mode de paiement
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($achats as $ac)
                                            @foreach($ac as $a)
                                                <tr role="row" class="odd">
                                                    <td class="hidden-xs hidden-sm">{{$a->achat_reference}}</td>
                                                    <td class="hidden-xs hidden-sm">{{$a->date_achat}}</td>
                                                    <td>{{$a->number}}</td>
                                                    <td>{{\App\Models\Ticket::find($a->ticket_id)->type}}</td>
                                                    <td class="hidden-xs hidden-sm">{{\App\Models\User::find($a->user_id)->name}}</td>
                                                    <td class="hidden-xs hidden-sm">{{\App\Models\Payement_mode::find($a->payement_mode_id)->value}}</td>
                                                    <td>{{$a->status_payment}}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>


            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable ui-sortable">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{str_limit($event->title,25,'...')}}</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="chart-responsive">
                                    <canvas id="pieChart" height="160" width="175"
                                            style="width: 175px; height: 160px;"></canvas>
                                </div>
                                <!-- ./chart-responsive -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <center>
                                <div class="col-md-6 col-xs-6">
                                    Nombre total des tickets généré: {{$ticket_genere}}
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    @php($ticket_vendu = 0)
                                    @foreach($data_achat as $data)
                                        @php($ticket_vendu += $data['nombreVendu'])
                                    @endforeach
                                    Nombre total des tickets vendu : {{$ticket_vendu}}
                                </div>
                            </center>
                        </div>
                    </div>
                    <!-- /.footer -->
                </div>

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{str_limit($event->title,25,'...')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Ticket</th>
                                <th>Pourcentage vendu</th>
                                <th style="width: 40px">Texte</th>
                            </tr>
                            @php($i = 1)
                            @foreach($data_achat as $data)
                                @php
                                    $pourcentage = $data['nombreVendu'] * 100 / (count($data['ticket']->tapakila) != 0 ? count($data['ticket']->tapakila) : 1);
                                @endphp
                                <tr>
                                    <td>{{$i}}.</td>
                                    <td>{{$data['ticket']->type}}</td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar"
                                                 style="width: {{$pourcentage}}%;background-color: {{$data['couleur']}} !important;"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge" style="background: {{$data['couleur']}};">{{$pourcentage}}
                                            %</span></td>
                                </tr>
                                @php($i++)
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{--<ul class="pagination pagination-sm no-margin pull-right">--}}
                        {{--<li><a href="#">«</a></li>--}}
                        {{--<li><a href="#">1</a></li>--}}
                        {{--<li><a href="#">2</a></li>--}}
                        {{--<li><a href="#">3</a></li>--}}
                        {{--<li><a href="#">»</a></li>--}}
                        {{--</ul>--}}
                    </div>
                </div>
            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>
@endsection

@section('specificScript')
    <script type="text/javascript">
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [
                @foreach($data_achat as $data)
            {
                value: {{$data['nombreVendu']}},
                color: '{{$data['couleur']}}',
                highlight: '{{$data['couleur']}}',
                label: '{{$data['ticket']->type}}'
            },
            @endforeach
        ];
        var pieOptions = {
            // Boolean - Whether we should show a stroke on each segment
            segmentShowStroke: true,
            // String - The colour of each segment stroke
            segmentStrokeColor: '#fff',
            // Number - The width of each segment stroke
            segmentStrokeWidth: 1,
            // Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            // Number - Amount of animation steps
            animationSteps: 100,
            // String - Animation easing effect
            animationEasing: 'easeOutBounce',
            // Boolean - Whether we animate the rotation of the Doughnut
            animateRotate: true,
            // Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale: false,
            // Boolean - whether to make the chart responsive to window resizing
            responsive: true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: false,
        };
        pieChart.Doughnut(PieData, pieOptions);
    </script>
    <!-- DataTables -->
    <script src="{{url('/')}}/public/admin-assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{url('/')}}/public/admin-assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>
@endsection