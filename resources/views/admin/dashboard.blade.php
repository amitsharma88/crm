@extends('admin.layouts.default')
@section('content')
{{ HTML::script('public/admin/js/module/admin_dashboard_module.js'); }}
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
<!--            <small>Control panel</small>-->
        </h1>
        <!--ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol-->
    </section>

    <!-- Main content -->
    <section class="content">
         <input type="hidden" class="show_graph" name="graph_name" value="{{isset($_GET['graph_name'])?$_GET['graph_name']:''}}">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <p>Inquiries</p>
                        <div class="row">
                            <div class="col-sm-4 text-center">{{$enquiry_count->this_month}}</div>
                            <div class="col-sm-4 text-center">{{$enquiry_count->this_year}}</div>
                            <div class="col-sm-4 text-center">{{$enquiry_count->all_enquiry}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 text-center" style="font-size: 12px">This Month</div>
                            <div class="col-sm-4 text-center">This Year</div>
                            <div class="col-sm-4 text-center">Till Date</div>
                        </div>
                    </div>
                    <!--                    <div class="icon">
                                            <i class="ion ion-bag"></i>
                                        </div>-->
                    <!--                    <a href="javascript:;" class="small-box-footer">
                                            More info <i class="fa fa-arrow-circle-right"></i>
                                        </a>-->
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <p>Inquiries (Status)</p>
                        <div class="row">
                            <div class="col-sm-3 text-center">{{$enquiry_count->received_enquiry}}</div>
                            <div class="col-sm-3 text-center">{{$enquiry_count->hot_enquiry}}</div>
                            <div class="col-sm-3 text-center">{{$enquiry_count->warm_enquiry}}</div>
                            <div class="col-sm-3 text-center">{{$enquiry_count->qualified_enquiry}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 text-center">New</div>
                            <div class="col-sm-3 text-center">Hot</div>
                            <div class="col-sm-3 text-center">Warm</div>
                            <div class="col-sm-3 text-center">Qualif..</div>
                        </div>
                    </div>
                    <!--                    <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>-->
                    <!--                    <a href="#" class="small-box-footer">
                                            More info <i class="fa fa-arrow-circle-right"></i>
                                        </a>-->
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <p>Site Visits</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 text-center">{{$enquiry_count->site_visit_this_month}}</div>
                        <div class="col-sm-4 text-center">{{$enquiry_count->site_visit_this_year}}</div>
                        <div class="col-sm-4 text-center">{{$enquiry_count->site_visit_till_date}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 text-center" style="font-size: 12px">This Month</div>
                        <div class="col-sm-4 text-center">This Year</div>
                        <div class="col-sm-4 text-center">Till Date</div>
                    </div>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">

                        <p>Bookings</p>
                        <div class="row">
                            <div class="col-sm-4 text-center">{{$enquiry_count->booking_this_month}}</div>
                            <div class="col-sm-4 text-center">{{$enquiry_count->booking_this_year}}</div>
                            <div class="col-sm-4 text-center">{{$enquiry_count->booking_till_date}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 text-center" style="font-size: 12px">This Month</div>
                            <div class="col-sm-4 text-center">This Year</div>
                            <div class="col-sm-4 text-center">Till Date</div>
                        </div>
                    </div>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->


    </section><!-- /.content -->


    <section class="content">
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        @if($user_type!='sales_agent'&& $user_type!='sales_manager')
        <div class="row" id="graph1">
            <div class="col-md-12">
                <!-- LINE CHART -->
                <!-- BAR CHART -->
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Inquiries at Ajmera Realty</h3>
                    </div>

                    <div class="col-md-12">
                        <form method="get">
                            <input type="hidden" class="graph_name" name="graph_name" value="graph1">
                            <table>
                                <tr>
                                    <td>
                                        <select class="form-control" name="master_project4"  onchange="get_ajax_sales_person(this.value, 'sales_agent', 'master_sales4')">
                                            <option value="">All Projects</option>
                                            @if($user_project)
                                            @foreach($user_project as $project)
                                            <option {{isset($_GET['master_project4']) && $_GET['master_project4'] == $project->project_id ? 'selected' : ''}} value="{{$project->project_id}}">{{$project->name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </td>

                                    <td>
                                        <select class="form-control" id='master_sales4' name='master_sales4'>
                                            <option value="">Sales Agent</option>
                                            @if($sale_user)
                                            @foreach($sale_user as $sale)
                                            <option {{isset($_GET['master_sales4']) && $_GET['master_sales4'] == $sale->id ? 'selected' : ''}} value="{{$sale->id}}">{{$sale->first_name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </td>

                                    <td><input type="text" class="form-control from_date" id="master_from4" placeholder="From" name="master_from4" value="{{isset($_GET['master_from4']) && $_GET['master_from4'] ? $_GET['master_from4'] : date('01/m/Y')}}"></td>
                                    <td><input type="text" class="form-control to_date" id="master_to4" placeholder="To" name="master_to4" value="{{isset($_GET['master_to4']) && $_GET['master_to4'] ? $_GET['master_to4'] : date('d/m/Y')}}"></td>
                                    <td>
                                        <button id="btn_submit" type="submit" data-target="graph1" class="btn btn-primary">Search</button>
                                    </td>
                                    <td>
                                        <a href="{{SITE_URL}}dashboard" class="btn btn-primary">Reset</a>
                                    </td>
                                    <td>
                                        <!--<button id="btn_submit" type="submit" class="btn btn-primary">export</button>-->
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div class="box-body chart-responsive">
                        <div id="enquiry_summry_pie_chart" style="height: 250px;"></div>
                        <script type="text/javascript">
                            Morris.Donut({
                                element: 'enquiry_summry_pie_chart',
                                data: [
                                    {label: "Inquries", value: <?php echo $enquiry_summary_pie_chart->all_enquiry ?>},
                                    {label: "Site Visits", value: <?php echo $enquiry_summary_pie_chart->site_visit_till_date ?>},
                                    {label: "Bookings", value: <?php echo $enquiry_summary_pie_chart->booking_till_date ?>}


                                ],
                            });
                        </script>
                    </div><!-- / .box-body -->
                    <div class="box-body chart-responsive">
                        <div id="enquiry_summry_pie_chart1" style="height: 250px;"></div>
                        <script type="text/javascript">
                            Morris.Donut({
                                element: 'enquiry_summry_pie_chart1',
                                data: [
                                    {label: "Warm", value: <?php echo $enquiry_summary_pie_chart->warm_enquiry ?>},
                                    {label: "Hot ", value: <?php echo $enquiry_summary_pie_chart->hot_enquiry ?>},
                                    {label: "Qualified", value: <?php echo $enquiry_summary_pie_chart->qualified_enquiry ?>},
                                    {label: "New", value: <?php echo $enquiry_summary_pie_chart->new_enquiry ?>}


                                ],
                            });
                        </script>
                    </div><!-- / .box-body -->
                </div><!-- /.box -->

            </div><!-- /.col (RIGHT) -->

        </div><!-- /.row -->
        @endif
        @if($user_type!='sales_agent'&& $user_type!='sales_manager')
        <div class="row" id='graph2'>
            <div class="col-md-12">
                <!-- LINE CHART -->
                <!-- BAR CHART -->
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Graph-1: Inquiries, Site Visits, Follow Ups and Bookings</h3>
                    </div>

                    <div class="col-md-12" >
                        <form method="get">
                             <input type="hidden" class="graph_name" name="graph_name" value="graph2">
                            <table>
                                <tr>
                                    <td>
                                        <select class="form-control" name="master_project" onchange="get_ajax_sales_person(this.value, 'sales_agent', 'master_sales')">
                                            <option value="">All Projects</option>
                                            @if($user_project)
                                            @foreach($user_project as $project)
                                            <option {{isset($_GET['master_project']) && $_GET['master_project'] == $project->project_id ? 'selected' : ''}} value="{{$project->project_id}}">{{$project->name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </td>
<!--                                    <td>
                                        <select class="form-control" name="master_sales" id="master_sales">
                                            <option value="">Sales Person</option>
                                        </select>
                                    </td>-->
<!--                                    <td>
                                        <select name="master_source"  id="source" class="form-control">
                                            <option value="">Inquiry Source</option>
                                            @if(getMasters('inquiry_sources'))
                                            @foreach(getMasters('inquiry_sources') as $source)
                                            <option {{isset($_GET['master_source']) && $_GET['master_source'] == $source->id ? 'selected' : ''}} value="{{$source->id}}">{{$source->name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </td>-->

                                    <td><input type="text" class="form-control from_date" placeholder="From" id="master_from" name="master_from" value="{{isset($_GET['master_from']) && $_GET['master_from'] ? $_GET['master_from'] : date('01/m/Y')}}"></td>
                                    <td><input type="text" class="form-control to_date" placeholder="To" id="master_to" name="master_to" value="{{isset($_GET['master_to']) && $_GET['master_to'] ? $_GET['master_to'] : date('d/m/Y')}}"></td>
                                    <td>
                                        <button id="btn_submit" type="submit" data-target="graph2" class="btn btn-primary searchbychar">Search</button>
                                    </td>
                                    <td>
                                        <a href="{{SITE_URL}}dashboard" class="btn btn-primary">Reset</a>
                                    </td>
                                    <td>
                                        <!--<button id="btn_submit" type="submit" class="btn btn-primary">export</button>-->
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div class="box-body chart-responsive">
                        <div id="area-inquiry" style="height: 250px;"></div>

                        <script type="text/javascript">
                            Morris.Bar({
                                element: 'area-inquiry',
                                data: [
<?php
$source = array();
if ($source_enquiry) {
    foreach ($source_enquiry as $k1 => $v1) {
        $source[] = $v1->source_name
        ?>
                                            {y: '<?php echo $v1->source_name ?>', a: <?php echo $v1->all_enquiry ?>, b: <?php echo $v1->site_visit ?>, c: <?php echo $v1->booking ?>,d:<?php echo $v1->followup_done ?>},
        <?php
    }
} else {
    ?>
                                        {y: 'No Data', a: 0, b: 0, c: 0,d:0},
    <?php
}
?>
                                ],
                                xkey: 'y',
                                        ykeys: ['a', 'b', 'c','d'],
                                labels: ['Inquiries', 'Site Visits', 'Booking','Followups']
                            });</script>
                    </div><!-- / .box-body -->
                </div><!-- /.box -->

            </div><!-- /.col (RIGHT) -->

        </div><!-- /.row -->
        @endif



        @if($user_type!='sales_manager')
        <div class="row" id="graph3">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Graph-2: Agent wise Inquiry Management</h3>
                    </div>
                    <div class="col-md-12">
                        <form method="get">
                             <input type="hidden" class="graph_name" name="graph_name" value="graph3">
                            <table>
                                <tr>
                                    <td>
                                        <select class="form-control" name="master_project2" onchange="get_ajax_sales_person(this.value, 'sales_agent', 'master_sales2')">
                                            <option value="">All Projects</option>
                                            @if($user_project)
                                            @foreach($user_project as $project)
                                            <option {{isset($_GET['master_project2']) && $_GET['master_project2'] == $project->project_id ? 'selected' : ''}} value="{{$project->project_id}}">{{$project->name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </td>
                                    @if($user_type!='sales_agent')
                                    <td>
                                        <select class="form-control" id='master_sales2' name='master_sales2'>
                                            <option value="">Sales Agent</option>
                                            @if($sale_user)
                                            @foreach($sale_user as $sale)
                                            <option {{isset($_GET['master_sales2']) && $_GET['master_sales2'] == $sale->id ? 'selected' : ''}} value="{{$sale->id}}">{{$sale->first_name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </td>
                                    @endif
                                    <td><input type="text" class="form-control from_date" placeholder="From" id="master_from2" name="master_from2" value="{{isset($_GET['master_from2']) && $_GET['master_from2'] ? $_GET['master_from2'] : date('01/m/Y')}}"></td>
                                    <td><input type="text" class="form-control to_date" placeholder="To" id="master_to2" name="master_to2" value="{{isset($_GET['master_to2']) && $_GET['master_to2'] ? $_GET['master_to2'] : date('d/m/Y')}}"></td>
                                    <td>
                                        <button id="btn_submit" type="submit" data-target="graph3" class="btn btn-primary searchbychar">Search</button>
                                    </td>
                                    <td>
                                        <a href="{{SITE_URL}}dashboard" class="btn btn-primary">Reset</a>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>

                    <div class="box-body chart-responsive">
                        <div class="chart" id="sales_agent"  style="height: 300px;"></div>
                        <script type="text/javascript">
                            Morris.Bar({
                            element: 'sales_agent',
                                    data: [
<?php
if ($enquiry_sales_agent) {
    foreach ($enquiry_sales_agent as $k1 => $v1) {
        ?>
                                            {y: '<?php echo date('Y-m', strtotime($v1->created)) ?>', a: <?php echo $v1->enquiries ?>, b: <?php echo $v1->site_visits ?>, c: <?php echo $v1->bookings ?>},
        <?php
    }
} else {
    ?>
                                        {y: '2015', a: 0, b: 0, c: 0},
    <?php
}
?>
                                    ],
                                    xkey: 'y',
                                    ykeys: ['a', 'b', 'c'],
                                    labels: ['Inquiries', 'Site Visit', 'Booking'],
                                    //labels: ['Series A', 'Series B'],
//                                            xLabelFormat: function (x) {
//                                            var IndexToMonth = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
//                                                    var month = IndexToMonth[ x.getMonth() ];
//                                                    var year = x.getFullYear();
//                                                    return year + ' ' + month;
//                                            },
//                                            dateFormat: function (x) {
//                                            var IndexToMonth = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
//                                                    var month = IndexToMonth[ new Date(x).getMonth() ];
//                                                    var year = new Date(x).getFullYear();
//                                                    return year + ' ' + month;
//                                            },
//                                            resize: true
                            });</script>
                    </div><!-- / .box-body -->
                </div><!-- /.box -->
            </div><!-- /.col (RIGHT) -->
        </div><!-- /.row -->
        @endif
        @if($user_type=='sales_manager' || $user_type!='sales_agent')
        <div class="row" id="graph4" >
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Graph-3: Manager wise Inquiry Management</h3>
                    </div>
                    <div class="col-md-12">
                        <form method="get">
                            <input type="hidden" class="graph_name" name="graph_name" value="graph4">
                            <table>
                                <tr>
                                    <td>
                                        <select class="form-control" name="master_project3" onchange="get_ajax_sales_person(this.value, 'sales_manager', 'master_sales3')">
                                            <option value="">All Projects</option>
                                            @if($user_project)
                                            @foreach($user_project as $project)
                                            <option {{isset($_GET['master_project3']) && $_GET['master_project3'] == $project->project_id ? 'selected' : ''}} value="{{$project->project_id}}">{{$project->name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" id='master_sales3' name='master_sales3'>
                                            <!--<option value="">Sales Agent</option>-->
                                            <option value="">Sales Manager</option>
                                            @if($sales_manager)
                                            @foreach($sales_manager as $sale)
                                            <option {{isset($_GET['master_sales3']) && $_GET['master_sales3'] == $sale->id ? 'selected' : ''}} value="{{$sale->id}}">{{$sale->first_name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control from_date" placeholder="From" id="master_from3" name="master_from3" value="{{isset($_GET['master_from3']) && $_GET['master_from3'] ? $_GET['master_from3'] : date('01/m/Y')}}"></td>
                                    <td><input type="text" class="form-control to_date" placeholder="To" id="master_to3" name="master_to3" value="{{isset($_GET['master_to3']) && $_GET['master_to3'] ? $_GET['master_to3'] : date('d/m/Y')}}"></td>
                                    <td>
                                        <button id="btn_submit" type="submit" data-target="graph4" class="btn btn-primary searchbychar">Search</button>
                                    </td>
                                    <td>
                                        <a href="{{SITE_URL}}dashboard" class="btn btn-primary">Reset</a>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>

                    <div class="box-body chart-responsive">
                        <div class="chart" id="sales_manager"  style="height: 300px;"></div>
                        <script type="text/javascript">
                            Morris.Bar({
                            element: 'sales_manager',
                                    data: [
<?php
if ($enquiry_sales_manager) {
    foreach ($enquiry_sales_manager as $k1 => $v1) {
        ?>
                                            {y: '<?php echo date('Y-m', strtotime($v1->created)) ?>', a: <?php echo $v1->enquiries ?>, b: <?php echo $v1->site_visits ?>, c: <?php echo $v1->bookings ?>},
        <?php
    }
} else {
    ?>
                                        {y: '2015', a: 0, b: 0, c:0},
    <?php
}
?>
                                    ],
                                    xkey: 'y',
                                    ykeys: ['a', 'b', 'c'],
                                    labels: ['Inquiries', 'Site Visit', 'Bookings'],
                                    //labels: ['Series A', 'Series B'],
//                                            xLabelFormat: function (x) {
//                                            var IndexToMonth = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
//                                                    var month = IndexToMonth[ x.getMonth() ];
//                                                    var year = x.getFullYear();
//                                                    return year + ' ' + month;
//                                            },
//                                            dateFormat: function (x) {
//                                            var IndexToMonth = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
//                                                    var month = IndexToMonth[ new Date(x).getMonth() ];
//                                                    var year = new Date(x).getFullYear();
//                                                    return year + ' ' + month;
//                                            },
//                                            resize: true
                            });
                        </script>
                    </div><!-- / .box-body -->
                </div><!-- /.box -->
            </div><!-- /.col (RIGHT) -->
        </div><!-- /.row -->
        @endif
    </section>

</aside><!-- /.right-side -->

<!-- add new calendar event modal -->
@stop