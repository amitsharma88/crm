@extends('admin.layouts.default')
@section('content')

{{HTML::script('public/admin/js/module/admin_report_module.js'); }}

<style type="text/css">

</style>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Reports</h4>
            </div>
            <div class="model_content"></div>
        </div>
    </div>
</div>


<aside class="right-side">

    <section class="content-header listing_section">
        <h1>Reports </h1>
        <!--if($user_type=='sales_agent'||$user_type=='superadmin')-->
<!--        <ol class="breadcrumb">
            <li><a href="SITE_URLreport/add" class="btn btn-primary btn-sm addnew">+ Add Inquiry</a></li>
        </ol>-->
        <!--endif-->
    </section>

    <!-- Main content -->
    <section class="content">
        @if(Session::get('save'))
        <div class="alert alert-info text-success">{{Session::get('save')}}</div>
        @endif

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                    </div><!-- /.box-header -->
                    <!--/form--><!-- /.box-header -->
                    <div class="box-header">
                        <div class="box-body ">
                            <div class="timeline-item ">

                                <h4 class="timeline-header">Call Agent Report</h4>
                                <div class="timeline-body">
                                    <form id="slot_filter" action="{{SITE_URL}}report/sales-agent" method="get">
                                        <table>
                                            <tr>
                                                <td width="200">
                                                    <select name="project" id="project" class="form-control" >
                                                        <option value="">Project/Phase Name</option>
                                                        @if(getMasters('projects'))
                                                        @foreach(getMasters('projects') as $project)
                                                        <option {{isset($_GET['project']) && $_GET['project'] == $project->id ? 'selected' : ''}} value="{{$project->id}}">{{$project->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </td>

                                                <td><input type="text" class="from form-control" id="from" placeholder="From" name="from" value="{{date('01-m-Y');}}"></td>
                                                <td><input type="text" class="to form-control" id="to" placeholder="To" name="to" value="{{date('d-m-Y');}}"></td>
                                                <td>
                                                    <button id="btn_submit" type="submit" class="btn btn-primary">Export</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="search_restaurant_data">
                        <div class="box-body table-responsive no-padding">
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            
                        </div>
                    </div>
                </div><!-- /.box -->
            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                    </div><!-- /.box-header -->
                    <!--/form--><!-- /.box-header -->
                    <div class="box-header">
                        <div class="box-body ">
                            <div class="timeline-item ">

                                <h4 class="timeline-header">Project Wise Report</h4>
                                <div class="timeline-body">
                                    <form id="slot_filter" action="{{SITE_URL}}report/project-report" method="get">
                                        <table>
                                            <tr>
                                                <td width="200">
                                                    <select name="project1" id="project1" class="form-control" >
                                                        <option value="">Project/Phase Name</option>
                                                        @if(getMasters('projects'))
                                                        @foreach(getMasters('projects') as $project)
                                                        <option {{isset($_GET['project']) && $_GET['project'] == $project->id ? 'selected' : ''}} value="{{$project->id}}">{{$project->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </td>

                                                <td><input type="text" class="from form-control" id="from" placeholder="From" name="from" value="{{date('01-m-Y')}}"></td>
                                                <td><input type="text" class="to form-control" id="to" placeholder="To" name="to" value="{{date('d-m-Y')}}"></td>
                                                <td>
                                                    <button id="btn_submit" type="submit" class="btn btn-primary">Export</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="search_restaurant_data">
                        <div class="box-body table-responsive no-padding">
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            
                        </div>
                    </div>
                </div><!-- /.box -->
            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                    </div><!-- /.box-header -->
                    <!--/form--><!-- /.box-header -->
                    <div class="box-header">
                        <div class="box-body ">
                            <div class="timeline-item ">

                                <h4 class="timeline-header">Medium Wise Report</h4>
                                <div class="timeline-body">
                                    <form id="slot_filter" action="{{SITE_URL}}report/inquiry-source-report" method="get">
                                        <table>
                                            <tr>
                                                <td width="200">
                                                    <select name="project2" id="project2" class="form-control" >
                                                        <option value="">Project/Phase Name</option>
                                                        @if(getMasters('projects'))
                                                        @foreach(getMasters('projects') as $project)
                                                        <option {{isset($_GET['project']) && $_GET['project'] == $project->id ? 'selected' : ''}} value="{{$project->id}}">{{$project->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </td>

                                                <td><input type="text" class="from form-control" id="from" placeholder="From" name="from" value="{{date('01-m-Y');}}"></td>
                                                <td><input type="text" class="to form-control" id="to" placeholder="To" name="to" value="{{date('d-m-Y')}}"></td>
                                                <td>
                                                    <button id="btn_submit" type="submit" class="btn btn-primary">Export</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="search_restaurant_data">
                        <div class="box-body table-responsive no-padding">
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            
                        </div>
                    </div>
                </div><!-- /.box -->
            </div>
        </div>
        
        
        
        
    </section><!-- /.content -->

</aside>
<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function () {
            get_ajax_buildings($("#project").val());
        }, 1000)
    })
</script>
@stop
