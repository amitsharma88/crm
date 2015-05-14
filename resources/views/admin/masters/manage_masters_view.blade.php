@extends('admin.layouts.default')
@section('content')

{{ HTML::script('public/admin/js/module/admin_project_module.js'); }}
{{ HTML::script('public/admin/js/map.js'); }}
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header listing_section">
        <h1>Add Building</h1>
        <ol class="breadcrumb">
            @if(Request::segment(3) != "")
            <li><a href="{{SITE_URL}}building/manage-proposed-payment-slab/{{isset($building->id) ? $building->id:''}}" class="btn btn-primary btn-sm addnew">Proposed Payment Slabs</a></li>
            @endif
            
            
            <li><a href="{{SITE_URL}}building" class="btn btn-primary btn-sm addnew">Listing View</a></li>
        </ol>
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="row">
            <form id="project_form"  onsubmit="return false;">
                <!-- left column -->
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Building Information</h3>
                        </div><!-- /.box-header -->

                        <div class="box-body">
                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group name">
                                        <label for="restaurantname">Building Name</label>
                                        <input type="text" value="{{isset($building->name) ? $building->name:''}}" class="form-control" id="exampleInputEmail1" placeholder="Name" name="name">
                                        <span id="name_err" class="error err_display"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group category">
                                        <label for="exampleInputEmail1">Phase</label>
                                        <select name="project"  class="form-control chosen-select">
                                            <option value="">Select</option>
                                            @if($projects)
                                            @foreach($projects as $project)

                                            <option {{isset($building->project_id) && $building->project_id == $project->id ? 'selected':''}} value="{{$project->id}}">{{$project->name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        <span id="project_err" class="error err_display"> fsfg</span>
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group category">
                                        <label for="exampleInputEmail1">Amenities</label>
                                        <select name="amenity"  class="form-control chosen-select">
                                            <option value="">Select</option>
                                            <option value="1">Parking</option>
                                            <option value="1">Garden</option>

                                        </select>
                                        <span id="project_err" class="error err_display"> fsfg</span>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class=" col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Building Infomation</label>
                                        <textarea class="form-control ckeditor" name="description">{{isset($building->description) ? $building->description:''}}</textarea>
                                        <span id="about_restaurant_err" class="error err_display"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Floor And Flat Details</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class=" col-md-6">
                                            <div class="form-group cuisine">
                                                <label for="exampleInputEmail1">No of Floor(s)</label>
                                                <input type="text" name="total_floor"  class="form-control" value="{{isset($building->total_floor) ? $building->total_floor : ''}}">
                                                <span id="total_floor_err" class="error err_display"></span>
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group category">
                                                <label for="exampleInputEmail1">Flat(s)/Floor </label>
                                                <input type="text" name="flat_per_floor"  class="form-control" value="{{isset($building->flat_per_floor) ? $building->flat_per_floor :''}}">
                                                <span id="flat_per_floor_err" class="error err_display"> fsfg</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class=" col-md-6">
                                            <div class="form-group cuisine">
                                                <label for="exampleInputEmail1">Total No of Flats</label>
                                                <input type="text" name="total_flats"  class="form-control" value="{{isset($building->total_flats)? $building->total_flats : ''}}">
                                                <span id="total_flats_err" class="error err_display"> fsfg</span>
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group cuisine">
                                                <label for="exampleInputEmail1">Flats starting from Floor</label>
                                                <input type="text" name="flat_starts_floor"  class="form-control" value="{{isset($building->flat_starts_floor) ? $building->flat_starts_floor:''}}">
                                                <span id="flat_starts_floor_err" class="error err_display"> fsfg</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=" col-md-6">
                                            <div class="form-group cuisine">
                                                <label for="exampleInputEmail1">Std. Sq. feet Area</label>
                                                <input type="text" name="sq_feet_area"  class="form-control" value="{{isset($building->sq_feet_area)? $building->sq_feet_area : ''}}">
                                                <span id="total_flats_err" class="error err_display"> fsfg</span>
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group cuisine">
                                                <label for="exampleInputEmail1">Flat Type</label>
                                                <select name="flat_type"  class="form-control">
                                                    <option value="">Select</option>
                                                    @if($flat_types)
                                                    @foreach($flat_types as $flat_type)
                                                    <option {{isset($building->flat_type) && $building->flat_type == $flat_type->id ? 'selected':''}} value="{{$flat_type->id}}">{{$flat_type->name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                <span id="flat_type_err" class="error err_display"> fsfg</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Costing Details</h3>
                                </div><!-- /.box-header -->
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
                                                <label for="exampleInputEmail1">Floor Rise/Floor </label>
                                                <input type="text" name="floor_rise"  class="form-control" value="{{isset($building->floor_rise) ? $building->floor_rise :''}}">
                                                <span id="floor_rise_err" class="error err_display"> fsfg</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=" col-md-6">
                                            <div class="form-group cuisine">
                                                <label for="exampleInputEmail1">Development Charges </label>
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
                            </div>


                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Status</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">

                                    <div class="row">
                                        <div class=" col-md-6">
                                            <div class="form-group cuisine">
                                                <label for="exampleInputEmail1"> </label>
                                                <select name="status" class="form-control">
                                                    <option value="">Select</option>
                                                    @if(getMasters('project_building_status'))
                                                    @foreach(getMasters('project_building_status') as $status)
                                                    <option {{isset($building->status) && $building->status == $status->id ? 'selected' : ''}} value="{{$status->id}}">{{$status->name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                <span id="status_err" class="error err_display"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!--                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Payment Slabs</h3>
                        </div> /.box-header 
                        <div class="box-body">
                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group category">
                                        <label for="exampleInputEmail1">Payment Slabs </label>
                                        <input type="text" name="payment_slab"  class="form-control" value="{{isset($building->payment_slab) ? $building->payment_slab :''}}">
                                        <span id="advance_maintenace_err" class="error err_display"> fsfg</span>
                                    </div>
                                </div>
                            </div>


                            
                        </div>

                    </div>-->

                    <div class="box box-info">
                        <div class="box-footer">
                            <input type="hidden" value="{{isset($building->id) ? $building->id:''}}" class="form-control" id="r_id" name="id">
                            <div class="form-group"> 
                                <div class="btn_submit_loader"></div>
                                <button id="btn_submit" type="submit" class="btn btn-primary" onClick="CKupdate();">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->


@stop