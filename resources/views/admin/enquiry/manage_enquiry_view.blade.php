@extends('admin.layouts.default')
@section('content')

{{ HTML::style('public/admin/css/jquery-ui-1.10.4.custom.min.css'); }}
{{ HTML::script('public/admin/js/module/admin_enquiry_module.js'); }}
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header listing_section">
        <h1>
            {{ucwords($page_type)}} Inquiry
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{SITE_URL}}enquiry" class="btn btn-primary btn-sm addnew">Listing View</a></li>
        </ol>
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="row">
            <form id="enquiry_form"  onsubmit="return false;">
                <!-- left column -->
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Customer Information</h3>
                        </div><!-- /.box-header -->
                        @if($page_type=='add')
                        <div class="box-header">
                            <div class="box-body ">
                                <div class="timeline-item ">

                                    <h4 class="timeline-header">Search for existing Customer</h4>
                                    <div class="timeline-body">
                                        <form id="slot_filter" action="" method="get">
                                            <table>
                                                <tr>
                                                    <td width="300"> 
                                                        <input type="text"  id="customer_search" name="customer_search" placeholder="Search Name/Mobile/Email" class="form-control">
                                                    </td> 
                                                    <td>
                                                        <!--<button id="btn_submit" type="submit" class="btn btn-primary">Search</button>-->
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="box-body">
                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group name">
                                        <label for="restaurantname">First Name</label>
                                        <input type="text" value="{{isset($enquiry->first_name) ? $enquiry->first_name:''}}" class="form-control"  placeholder="First Name" id="first_name" name="first_name">
                                        <span id="first_name_err" class="error err_display"></span>
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group name">
                                        <label for="restaurantname">Last Name</label>
                                        <input type="text"  value="{{isset($enquiry->last_name) ? $enquiry->last_name:''}}" class="form-control"  placeholder="Last Name" id="last_name" name="last_name">
                                        <span id="last_name_err" class="error err_display"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group name">
                                        <label for="restaurantname">Mobile</label>
                                        <input type="text"  value="{{isset($enquiry->mobile) ? $enquiry->mobile:''}}" class="form-control"placeholder="Mobile" id="mobile" name="mobile">
                                        <span id="mobile_err" class="error err_display"></span>
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group name">
                                        <label for="restaurantname">Email</label>
                                        <input type="text" value="{{isset($enquiry->email) ? $enquiry->email:''}}" class="form-control"  placeholder="Email" id="email" name="email">
                                        <span id="email_err" class="error err_display"></span>
                                    </div>
                                </div>

                            </div>


                            <div class="clearfix"></div>
                                <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group category">
                                        <label for="exampleInputEmail1">State</label>
                                        <select name="state"  class="form-control state_enquiry" onchange="get_ajax_city(this.value)">
                                            <option value="">Select</option>
                                            @if(getMasters('states','country_id = 113'))
                                            @foreach(getMasters('states','country_id = 113') as $state)
                                            <option {{isset($enquiry->states) && $enquiry->states == $state->id?'selected' : ''}} value="{{$state->id}}">{{$state->name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        <span id="state_err" class="error err_display"> fsfg</span>
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group category">
                                        <label for="exampleInputEmail1">City</label>
                                        <select name="city" id="city" class="form-control">
                                            <option value="">Select</option>
                                            @if(isset($enquiry->states))
                                            @if(getMasters('city','state_id = '.$enquiry->states))
                                            @foreach(getMasters('city','state_id = '.$enquiry->states) as $city)
                                            <option {{isset($enquiry->city) && $enquiry->city == $city->id ?  'selected' : ''}} value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                            @endif
                                            @endif
                                        </select>
                                        <span id="city_err" class="error err_display"> fsfg</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Address</label>
                                        <textarea class="form-control" name="address">{{isset($enquiry->address) ? $enquiry->address:''}}</textarea>
                                        <span id="about_restaurant_err" class="error err_display"></span>
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group name">
                                        <label for="restaurantname">Zone</label>
                                        <select name="zone"  class="form-control">
                                            <option value="">Select</option>
                                            @if(getMasters('zones'))
                                            @foreach(getMasters('zones') as $zone)
                                            <option {{isset($enquiry->zone) && $enquiry->zone == $zone->id ? 'selected' : $zone->id == 7 ? 'selected' : ''}} value="{{$zone->id}}">{{$zone->name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        <span id="zone_err" class="error err_display"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group name">
                                        <label for="restaurantname">Pin Code</label>
                                        <input type="text" value="{{isset($enquiry->pin_code) ? $enquiry->pin_code:''}}" class="form-control" id="exampleInputEmail1" placeholder="Pin Code" name="pin_code">
                                        <span id="pin_code_err" class="error err_display"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class=" col-md-6">
                                    <div class="form-group category">
                                        <label for="exampleInputEmail1">Inquiry Source</label>
                                        <select name="contact_source_id" id="contact_source_id" class="form-control">
                                            <option value="">Select</option>
                                            @if(getMasters('inquiry_sources'))
                                            @foreach(getMasters('inquiry_sources') as $source)
                                            <option {{isset($enquiry->contact_source_id) && $enquiry->contact_source_id == $source->id ? 'selected' :'' }} value="{{$source->id}}">{{$source->name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        <span id="contact_source_id_err" class="error err_display"> fsfg</span>
                                    </div>
                                </div>
                                <div class="col-md-6" id="agent_div" style="display: none">
                                    <div class="form-group category">
                                        <label for="exampleInputEmail1">Agent</label>
                                        <select name="agent" class="form-control">
                                            <option value="">Select Agent</option>
                                            <option value="1">Agent 1</option>

                                        </select>
                                        <span id="contact_source_id_err" class="error err_display"> fsfg</span>
                                    </div>
                                </div>
                            </div>


                            <!--                            <div class="row">
                                                            <div class=" col-md-12">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">About Building(Will be displayed in 'About Building' tab in the BuildingDetail page)</label>
                                                                    <textarea class="form-control ckeditor" name="description">{{isset($building->description) ? $building->description:''}}</textarea>
                                                                    <span id="about_restaurant_err" class="error err_display"></span>
                                                                </div>
                                                            </div>
                                                        </div>-->

                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Customer Interests</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class=" col-md-6">
                                            <div class="form-group category">
                                                <label for="exampleInputEmail1">Project Name</label>
                                                <select name="project" id="project" onchange="get_ajax_buildings(this.value), get_ajax_project_user(this.value),get_ajax_project_sales_manager(this.value)"  class="form-control">
                                                    <option value="">Select</option>
                                                    @if($projects)
                                                    @foreach($projects as $project)
                                                    <option {{isset($enquiry->project_id) && $enquiry->project_id == $project->id ? 'selected' :'' }} value="{{$project->id}}">{{$project->name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                <span id="project_err" class="error err_display"> fsfg</span>
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group category">
                                                <label for="exampleInputEmail1">Designated Sales Manger</label>
                                                <select name="designated_sales_manager" id="designated_sales_manager" class="form-control">
                                                    <option value="">Select</option>
                                                    @if($designated_sales_manager)
                                                    @foreach($designated_sales_manager as $manager)
                                                    <option {{isset($enquiry->designated_sales_manager) && $enquiry->designated_sales_manager == $manager->id ? 'selected' :''}}  value="{{$manager->id}}">{{$manager->first_name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                <span id="designated_sales_manager_err" class="error err_display"> fsfg</span>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <!--                                        <div class=" col-md-6">
                                                                                    <div class="form-group category">
                                                                                        <label for="exampleInputEmail1">Flat No</label>
                                                                                        <select name="flat_no" id="flat"  class="form-control">
                                                                                            <option value="">Select</option>
                                                                                        </select>
                                                                                        <span id="flat_no_err" class="error err_display"> fsfg</span>
                                                                                    </div>
                                                                                </div>-->
                                        <div class=" col-md-6">
                                            <div class="form-group category">
                                                <label for="exampleInputEmail1">Unit Type</label>
                                                <select name="flat_type"  class="form-control">
                                                    <option value="">Select</option>
                                                    @if($flat_types)
                                                    @foreach($flat_types as $f_type)
                                                    <option {{isset($enquiry->flat_type) && $enquiry->flat_type == $f_type->id ? 'selected' :'' }} value="{{$f_type->id}}">{{$f_type->name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                <span id="floor_no_err" class="error err_display"> fsfg</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class=" col-md-6">
                                            <div class="form-group category">
                                                <label for="exampleInputEmail1">Budget</label>
                                                <select name="budget"  class="form-control">
                                                    <option value="">Select</option>
                                                    @if(getMasters('budgets'))
                                                    @foreach(getMasters('budgets') as $budget)
                                                    <option {{isset($enquiry->budget) && $enquiry->budget == $budget->id ? 'selected' : ''}} value="{{$budget->id}}">{{$budget->name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                <span id="budget_err" class="error err_display"> fsfg</span>
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group category">
                                                <label for="exampleInputEmail1">Transaction Interest</label>
                                                <select name="fund_source_id"  class="form-control">
                                                    <option value="">Select</option>
                                                    @if(getMasters('fund_sources'))
                                                    @foreach(getMasters('fund_sources') as $fund)
                                                    <option {{isset($enquiry->fund_source_id) && $enquiry->fund_source_id == $fund->id ? 'selected' : ''}} value="{{$fund->id}}">{{$fund->name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                <span id="fund_source_id_err" class="error err_display"> fsfg</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--                                    <div class="row">
                                                                            <div class=" col-md-6">
                                                                                <div class="form-group category">
                                                                                    <label for="exampleInputEmail1">Interested in Parking</label>
                                                                                    <select name="is_interested_parking"  class="form-control">
                                                                                        <option isset($enquiry->is_interested_parking) && $enquiry->is_interested_parking == 1 ? 'selected' : '' value="1">Yes</option>
                                                                                        <option isset($enquiry->is_interested_parking) && $enquiry->is_interested_parking == 2 ? 'selected' : '' value="2">No</option>
                                                                                        <option isset($enquiry->is_interested_parking) && $enquiry->is_interested_parking == 3 ? 'selected' : '' value="3">Not Sure</option>
                                                                                    </select>
                                                                                    <span id="fund_source_id_err" class="error err_display"> fsfg</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>-->

                                </div>
                            </div>

                            <!--<div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Booking Details</h3>
                                </div> <!--/.box-header 
                                                                <div class="box-body">
                                                                    <div class="row">
                                                                        <div class=" col-md-6">
                                                                            <div class="form-group cuisine">
                                                                                <label for="exampleInputEmail1">Current Sq feet Rate</label>
                                                                                <input type="text" name="current_sq_feet_rate"  class="form-control" value="{{isset($building->current_sq_feet_rate) ? $building->current_sq_feet_rate : ''}}">
                                                                                <span id="total_floor_err" class="error err_display"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" col-md-6">
                                                                            <div class="form-group category">
                                                                                <label for="exampleInputEmail1">Floor Rise </label>
                                                                                <input type="text" name="floor_rise"  class="form-control" value="{{isset($building->floor_rise) ? $building->floor_rise :''}}">
                                                                                <span id="floor_rise_err" class="error err_display"> fsfg</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class=" col-md-6">
                                                                            <div class="form-group cuisine">
                                                                                <label for="exampleInputEmail1">Dev Charges </label>
                                                                                <input type="text" name="dev_charges"  class="form-control" value="{{isset($building->dev_charges) ? $building->dev_charges : ''}}">
                                                                                <span id="dev_charges_err" class="error err_display"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" col-md-6">
                                                                            <div class="form-group category">
                                                                                <label for="exampleInputEmail1">Club Membership Charges </label>
                                                                                <input type="text" name="club_membership_charges"  class="form-control" value="{{isset($building->club_membership_charges) ? $building->club_membership_charges :''}}">
                                                                                <span id="club_membership_charges_err" class="error err_display"> fsfg</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class=" col-md-6">
                                                                            <div class="form-group cuisine">
                                                                                <label for="exampleInputEmail1">Parking Charges </label>
                                                                                <input type="text" name="parking_charges"  class="form-control" value="{{isset($building->parking_charges) ? $building->parking_charges : ''}}">
                                                                                <span id="parking_charges_err" class="error err_display"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" col-md-6">
                                                                            <div class="form-group category">
                                                                                <label for="exampleInputEmail1">Advance Maintenance </label>
                                                                                <input type="text" name="advance_maintenace"  class="form-control" value="{{isset($building->advance_maintenace) ? $building->advance_maintenace :''}}">
                                                                                <span id="advance_maintenace_err" class="error err_display"> fsfg</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                            </div>-->

                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">User</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class=" col-md-6">
                                            <div class="form-group cuisine">
                                                <label for="exampleInputEmail1">Sales Agent</label>
                                                <select name="lead_user[]" id="lead_user"  class="form-control chosen-select" multiple>
                                                    <option value="">Select</option>
                                                    @if($lead_users)
                                                    @foreach($lead_users as $user)
                                                    <?php $selected = '' ?>
                                                    @foreach($enquiry_users as $e_user)
                                                    @if($e_user->user_id == $user->id)
                                                    <?php $selected = 'selected' ?>
                                                    @endif
                                                    @endforeach
                                                    <option {{$selected}} value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                <span id="lead_user_err" class="error err_display"></span>
                                            </div>
                                        </div>

                                        <div class=" col-md-6">
                                            <div class="form-group category">
                                                <label for="exampleInputEmail1">Next Followup Date</label>
                                                <input type="text" class="form-control" name="next_followup_date" id="next_followup_date"  value="{{isset($enquiry->next_followup_date) && (strtotime($enquiry->next_followup_date)!=strtotime('0000-00-00')) ? date('d-m-Y',strtotime($enquiry->next_followup_date)):''}}">
                                                <span id="next_followup_date_err" class="error err_display"> fsfg</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Specific Requirements</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">


                                    <div class="row">
                                        <div class=" col-md-6">
                                            <div class="form-group category">
                                                <label for="exampleInputEmail1">Site Visit Planned?</label>
                                                <select name="site_visit_done" id="site_visit_done"  class="form-control">
                                                    <option {{isset($enquiry->site_visit_done) && $enquiry->site_visit_done == 0 ? 'selected' : ''}} value="0">No</option>
                                                    <option {{isset($enquiry->site_visit_done) && $enquiry->site_visit_done == 1 ? 'selected' : ''}} value="1">Yes</option>

                                                </select>
                                                <span id="fund_source_id_err" class="error err_display"> fsfg</span>
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group category">
                                                <label for="exampleInputEmail1">Site Visit Date</label>
                                                <input type="text" class="form-control" name="site_visit_date" id="site_visit_date" disabled value="{{isset($enquiry->site_visit_date) && (strtotime($enquiry->site_visit_date)!=strtotime('0000-00-00')) ? date('d-m-Y',strtotime($enquiry->site_visit_date)):''}}">
                                                <span id="site_visit_date_err" class="error err_display"> fsfg</span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class=" col-md-6">
                                            <div class="form-group category">
                                                <label for="exampleInputEmail1">Booking Planned?</label>
                                                <select name="booking_done" id="booking_done" class="form-control">
                                                    <option {{isset($enquiry->booking_done) && $enquiry->booking_done == 0 ? 'selected' : ''}} value="0">No</option>
                                                    <option {{isset($enquiry->booking_done) && $enquiry->booking_done == 1 ? 'selected' : ''}} value="1">Yes</option>
                                                </select>
                                                <span id="fund_source_id_err" class="error err_display"> fsfg</span>
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group category">
                                                <label for="exampleInputEmail1">Booking Date</label>
                                                <input type="text" class="form-control" name="booking_date" id="booking_date" disabled value="{{isset($enquiry->booking_date) && (strtotime($enquiry->booking_date)!=strtotime('0000-00-00')) ? date('d-m-Y',strtotime($enquiry->booking_date)):''}}">
                                                <span id="booking_date_err" class="error err_display"> fsfg</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class=" col-md-6">
                                            <div class="form-group cuisine">
                                                @if(isset($enquiry->operator_remark) &&isset($enquiry->operator_remark) != '')
                                                @if(count(explode('##',$enquiry->operator_remark)) > 0)
                                                @foreach(explode('##',$enquiry->operator_remark) as $k => $v)
                                                <b>{{$v}}</b><br>
                                                @endforeach
                                                @endif
                                                @endif
                                                <br>
                                                <label for="exampleInputEmail1"> Remarks(Enter every follow up comment here)</label>
                                                <input type="hidden" name="hideen_operator_remarks"  class="form-control" value="{{isset($enquiry->operator_remark) ? $enquiry->operator_remark : ''}}">
                                                <input type="text" name="operator_remarks"  class="form-control" value="" >
                                                <span id="operator_remarks_err" class="error err_display"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Priority (Status)</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">

                                    <div class="row">
                                        <div class=" col-md-6">
                                            <div class="form-group cuisine">
                                                <label for="exampleInputEmail1">Inquiry Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="">Select</option>
                                                    @if(getMasters('inquiry_status'))
                                                    @foreach(getMasters('inquiry_status') as $status)
                                                    <option {{isset($enquiry->inquiry_status) && $enquiry->inquiry_status == $status->id ? 'selected' : $status->id == 7 ? 'selected' : ''}} value="{{$status->id}}">{{$status->name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                <span id="status_err" class="error err_display"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div><!-- /.box-body -->
                    </div><!-- /.box -->


                    <div class="box box-info">
                        <div class="box-footer">

                            <input type="hidden" value="{{isset($enquiry->follow_up_count) && $enquiry->follow_up_count ? $enquiry->follow_up_count : ''}}" class="form-control" id="follow_up_count" name="follow_up_count">
                            <input type="hidden" value="{{isset($enquiry->user_id) && $enquiry->user_id ? $enquiry->user_id : ''}}" class="form-control" id="user_id" name="id">
                            <input type="hidden" value="{{isset($enquiry->enquiry_id) && $enquiry->enquiry_id ? $enquiry->enquiry_id : ''}}" class="form-control" id="enquiry_id" name="enquiry_id">
                            <div class="form-group"> 
                                <div class="btn_submit_loader"></div>
                                <button id="btn_submit" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function() {
            $("#flat").val('<?php echo isset($enquiry->flat_id) && $enquiry->flat_id ? $enquiry->flat_id : '' ?>');
        }, 1000)

    });
</script>

@stop