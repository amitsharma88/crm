@extends('admin.layouts.default')
@section('content')
{{ HTML::script('public/admin/js/module/admin_project_module.js'); }}
{{ HTML::script('public/admin/js/formValidator.js'); }}

<aside class="right-side">


    <section class="content-header listing_section">
        <h1>
            <h1>Manage Building Flats </h1>

        </h1>
        <ol class="breadcrumb">
            @if(Session::get('restaurant_A') == 'Y')
            <li><a href="{{URL::route('admin/restaurant/manage',Request::segment(4));}}#table_res_info" class="btn btn-primary btn-sm addnew"> Change Slot Settings</a></li>
            @endif
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if(Session::get('save'))
        <div class="alert alert-info text-success">{{Session::get('save')}}</div>
        @endif


        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!--form method="post"-->
                    <div class="box-header">
                        <div class="box-body bg-aqua">
                            <div class="timeline-item ">
                                <h4 class="timeline-header">Note:</h4>
                                <div class="timeline-body">
                                    Custom Message
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="box-header">
                        <div class="box-body ">
                            <div class="timeline-item ">

                                <h4 class="timeline-header">Filter</h4>
                                <div class="timeline-body">
                                    <form id="slot_filter" action="" method="get">
                                        <table>
                                            <tr>
                                                <td width="200">
                                                    <select name="floor" class="form-control">
                                                        <option value="">Floor No</option>
                                                        @if($floors)
                                                        @foreach($floors as $floor)
                                                        <option value="{{$floor->floor_no}}">{{$floor->floor_no}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </td>
                                                <td width="200"> 
                                                    <input type="text" name="flat_id" placeholder="Flat No" class="form-control">
                                                </td> 
                                                <td>
                                                    <button id="btn_submit" type="submit" class="btn btn-primary">Search</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <form id="slot_form" onsubmit="return false">
                        <!--/form--><!-- /.box-header -->
                        <div class="search_restaurant_data">
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover table-bordered">
                                    <tr>
                                        <th>Flat No</th>
                                        <th>Flat Area</th>
                                        <th>Current Sq. feet Rate</th>
                                        <th>Floor Rise</th>
                                        <th>Flat Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @if($flats)
                                    @foreach($flats as $flat)
                                    <tr>
                                        <td>
                                            <input type="text" required id="custom_flat_id_{{$flat->id}}"  name="custom_flat_id_{{$flat->id}}" value="{{$flat->custom_flat_id}}">
                                            <br><span id="custom_flat_id_{{$flat->id}}_err" class="error err_display"></span>
                                        </td >
                                        <td><input type="text" required name="flat_area_{{$flat->id}}" value="{{$flat->flat_area}}"></td>
                                        <td><input type="text" required name="current_sq_feet_rate_{{$flat->id}}" value="{{$flat->current_sq_feet_rate}}"></td>
                                        <td><input type="text" required name="floor_rise_{{$flat->id}}" value="{{$flat->floor_rise}}"></td>
                                        <td>
                                            <select name="flat_type_{{$flat->id}}">
                                                <option value="" >Select</option>
                                                @if($flat_types)
                                                @foreach($flat_types as $flat_type)
                                                <option {{isset($flat->flat_type) && $flat->flat_type == $flat_type->id ? 'selected':''}} value="{{$flat_type->id}}">{{$flat_type->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </td>
                                        <td>
                                            <select name="status_{{$flat->id}}">
                                                <option {{isset($flat->status) && $flat->status == 1 ? 'selected' : ''}} value="1" >Available</option>
                                                <option {{isset($flat->status) && $flat->status == 2 ? 'selected' : ''}} value="2" >Booked</option>
                                            </select>
                                        </td>
                                        <td><button id="save_{{$flat->id}}" onclick="save_flats(this.id)" type="button" class="btn btn-primary">Save</button></td>

                                    </tr>
                                    @endforeach
                                    @endif


                                    <tr>
                                        <td colspan="4">  
                                            <div class="form-group"> 
                                                <div class="btn_submit_loader"></div>
                                                <button id="btn_submit" type="submit" class="btn btn-primary">Submit</button>
                                            </div></td>

                                    </tr>


                                </table>

                                <div class="box-footer clearfix">

                                </div>
                            </div><!-- /.box -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- /.content -->
</aside>
<script>
//$(document).ready(function (){
//    $("#slot_form").validate({
//        rules: {
//            field: {
//                required: true,
//                number: true
//            }
//        }
//        
//    });
//})
</script>
@stop