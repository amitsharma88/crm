@extends('admin.layouts.default')
@section('content')

{{HTML::script('public/admin/js/module/admin_enquiry_module.js'); }}

<style type="text/css">

</style>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Enquiries</h4>
            </div>
            <div class="model_content"></div>
        </div>
    </div>
</div>


<aside class="right-side">

    <section class="content-header listing_section">
        <h1>Followup </h1>
        <!--        <ol class="breadcrumb">
                    <li><a href="{{SITE_URL}}enquiry/add" class="btn btn-primary btn-sm addnew">+ Add Inquiry</a></li>
                </ol>-->
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
                        <!--                        <form action="URL::to('admin/restaurant/search_restaurant')" method="get">
                                                    <div class="box-tools">
                                                        <div class="input-group">
                                                            <input type="text" name="q" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search" id="search_attribute_text"/>
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-sm btn-default" ><i class="fa fa-search"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>-->
                    </div><!-- /.box-header -->

                    <!--/form--><!-- /.box-header -->
                    <div class="box-header">
                        <div class="box-body ">
                            <div class="timeline-item ">
                                <h4 class="timeline-header">Filter</h4>
                                <div class="timeline-body">
                                    <form id="slot_filter" action="{{SITE_URL}}followup" method="get">
                                        <table>
                                            <tr>
                                                <td width="150">
                                                    <select name="project" id="project" class="form-control" >
                                                        <option value="">All Project/Phase Name</option>
                                                        @if($user_project)
                                                        @foreach($user_project as $project)
                                                        <option {{isset($_GET['project']) && $_GET['project'] == $project->id ? 'selected' : ''}} value="{{$project->id}}">{{$project->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </td>

                                                <td><input type="text" class="form-control" id="followup_date" placeholder="Followup date" name="followup_date" value="{{isset($_GET['followup_date']) && $_GET['followup_date'] ? $_GET['followup_date'] : ''}}"></td>

                                                <td><input type="text" class="form-control" id="user_name" placeholder="Cust Name/Mobile" name="customer_name" value="{{isset($_GET['customer_name']) && $_GET['customer_name'] !='' ? $_GET['customer_name'] : ''}}"></td>
                                                <td width="150"> 
                                                    <select name="followup_type" class="form-control">
                                                        <option value="0" {{isset($_GET['followup_type']) && $_GET['followup_type'] == 'enquiry_followup'? 'selected' : ''}}>All Follow Ups</option>
                                                        <option {{isset($_GET['followup_type']) && $_GET['followup_type'] == 'enquiry_followup'? 'selected' : ''}} value="enquiry_followup">Inquiry Follow Up</option>
                                                        <option {{isset($_GET['followup_type']) && $_GET['followup_type'] == 'site_visit'? 'selected' : ''}} value="site_visit">Site Visit</option>
                                                        <option {{isset($_GET['followup_type']) && $_GET['followup_type'] == 'booking'? 'selected' : ''}} value="booking">Booking</option>
                                                        <!--                                                        @if(getMasters('inquiry_status'))
                                                                                                                @foreach(getMasters('inquiry_status') as $status)
                                                                                                                <option {{isset($_GET['status']) && $_GET['status'] == $status->id ? 'selected' : ''}} value="{{$status->id}}">{{$status->name}}</option>
                                                                                                                @endforeach
                                                                                                                @endif-->
                                                    </select>
                                                </td> 
                                                @if(Session::get('admin_user_group') != 'sales_agent')
                                                <td width="150"> 
                                                    <select name="lead" class="form-control">
                                                        <option value="">All Sales Agent</option>
                                                        @if($sales_user)
                                                        @foreach($sales_user as $user)
                                                        <option {{isset($_GET['lead']) && $_GET['lead'] == $user->id ? 'selected' : ''}} value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </td>
                                                @endif

                                                <td width="150"> 
                                                    <select name="source"  id="source" class="form-control">
                                                        <option value="">All Inquiry Source</option>
                                                        @if(getMasters('inquiry_sources'))
                                                        @foreach(getMasters('inquiry_sources') as $source)
                                                        <option {{isset($_GET['source']) && $_GET['source'] == $source->id ? 'selected' : ''}} value="{{$source->id}}">{{$source->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <button id="btn_submit" type="submit" class="btn btn-primary">Submit</button>
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
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <!--<th>Sr.No</th>-->
                                    <th>Created At</th>
                                    <th>Customer Name</th>
                                    <th>Contact No</th>
                                    <th>Inquiry Status</th>
                                    <!--<th>Email</th>-->
                                    <th>Project/Phase</th>
                                    <th>Follow Up Type</th>
                                    <th>Follow Up Date</th>
<!--                                    <th>Building</th>
                                    <th>Flat No</th>
                                    <th>Parking</th>-->
                                    <!--<th>Flat Status</th>-->

                                    <th>Inquiry Source</th>
                                    <!--<th>Sales Manager</th>-->
<!--<th>Actions</th>-->
                                    <th>Last Follow Up Date</th>
                                    <!--<th>Action</th>-->

                                </tr>
                                @if($enquiries)
                                @foreach($enquiries as $enquiry)
                                <?php
                                $followup_name = '';
                                if (isset($_GET['followup_type']))
                                    if ($_GET['followup_type'] == 'enquiry_followup') {
                                        $followup_name = 'Inquiry Followup';
                                    } else if ($_GET['followup_type'] == 'site_visit') {
                                        $followup_name = 'Site Visit';
                                    } else if ($_GET['followup_type'] == 'booking') {
                                        $followup_name = 'Booking';
                                    }
                                ?>
                                <tr>
                                    <!--<td>$enquiry->enquiry_id</td>-->
                                    <td>{{date('d-m-Y',strtotime($enquiry->inquiry_date))}}</td>
                                    <td>{{$enquiry->first_name}}</td>
                                    <td>{{$enquiry->mobile}}</td>
                                    <td>{{$enquiry->inquiry_list_status}}</td>
                                    <!--<td>$enquiry->email</td>-->
                                    <td>{{$enquiry->project_name}}</td>
                                    <td>{{isset($enquiry->type)?$enquiry->type:$followup_name}}</td>
                                    <td>{{isset($enquiry->followup_date) && (strtotime($enquiry->followup_date)!=strtotime('0000-00-00'))?date('d-m-Y',strtotime($enquiry->followup_date)):((isset($enquiry->followp_date) && (strtotime($enquiry->followp_date)!=strtotime('0000-00-00')))?date('d-m-Y',strtotime($enquiry->followp_date)):'')}}</td>

                                    <td>{{$enquiry->inquiry_source}}</td>
                                    <!--<td>$enquiry->sales_manager_name</td>-->
                                    <td>{{date('Y-m-d H:i',strtotime($enquiry->inquiry_date)) != date('Y-m-d H:i',strtotime($enquiry->updated_date)) ? date('d-m-Y',strtotime($enquiry->updated_date)) : ''}}</td>
<!--                                    <td>
                                        <a class="btn-sm btn-primary" href="{{SITE_URL}}enquiry/edit/{{$enquiry->enquiry_id}}" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                                        <a href="javascript:;" data-toggle="modal" data-target=".bs-example-modal-lg" onclick="get_inquiry({{$enquiry->enquiry_id}})"><i class="fa fa-search-plus"></i></a>|
                                        <a class="btn-sm btn-primary" href="{{SITE_URL}}booking/add/{{encrypt($enquiry->enquiry_id,ENCRYPT_KEY)}}" title="Edit">Booking</a>
                                    </td>-->
                                    <!--<td></td>-->
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="9" class="alert alert-info text-success">Nothing found!</td>
                                </tr>
                                @endif
                            </table>
                          


                        </div>
                        <!-- /.box-body -->
                        
                        <div class="box-footer clearfix">
                            <div class="pagination pagination-sm no-margin pull-right">
                                {{$enquiries->appends(Input::except('page'))->links()}}
                                <!--pagination ends--->
                            </div>
                        </div>
                       
                       
                    </div>
                </div><!-- /.box -->
            </div>


        </div>
    </section><!-- /.content -->

</aside>
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function() {
            get_ajax_buildings($("#project").val());
        }, 1000)
    })
</script>
@stop
