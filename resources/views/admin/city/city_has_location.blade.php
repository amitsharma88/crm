@extends('admin.layouts.default')
@section('content')
{{ HTML::script('public/admin/js/module/admin_city_module.js'); }}
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header listing_section">
        <h1>
            Add Location To city
            <!--small>Preview</small-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('admin/city_has_location');}}" class="btn btn-primary btn-sm addnew">Listing View</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="overflow:visible;">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <!--h3 class="box-title">Quick Example</h3-->
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form id="city_has_location_form" method="post" class="">
                        <?php
                        $segment = Request::segment(4);
                      
                        ?>
                        <div class="box-body">
                        
                            <input type="hidden" value="{{isset($segment)?$segment:''}}" class="form-control" id="r_id" name="id">
                            
                              <span class="error_span" id="duplicate_error"></span>
                              
                            <div class="form-group form-input-text city">
                                <label>Select City</label>
                                <select class="form-control" name="city">
                                    <option value="">Select City</option>
                                    @if(! $cities->isEmpty())

                                    @foreach ($cities as $city)

                                    <option value="{{ $city->id}}" <?php if(isset($segment)){ if($segment ==  $city->id) { echo "selected=selected"; }}?>>{{$city->city}}</option>
                                    @endforeach
                                    @else

                                    <option>Nothing found!</option>

                                    @endif
                                </select>
                                @if ($errors->has('city')) <p class="help-block">{{ $errors->first('city') }}</p> @endif
                                 <span class="error_span" id="city_err"></span>
                            </div>

                            <div class="form-group form-input-text location">
                                <label>Select Location</label>
                                <select class="form-control chosen-select" multiple="multiple"  type="select" name="location[]">

                                    @if(!$locations->isEmpty())
                                    @foreach ($locations as $location)
                                      <?php $selected = '' ?>
                                            @if( isset($cities_data))
                                            @foreach($cities_data as $k2=>$v2)
                                            <?php $pieces = explode(",", $v2->Result);?>
                                             @foreach($pieces as $ans ) 
                                            @if($location->id == $ans)
                                            <?php $selected = 'selected' ?>
                                            @endif
                                             @endforeach
                                            @endforeach
                                            @endif    
                                      <option value="{{ $location->id}}" {{$selected}}>{{$location->location}}</option>
                                            @endforeach
                                    @else

                                    <option>Nothing found!</option>

                                    @endif
                                </select>
                                @if ($errors->has('location')) <p class="help-block">{{ $errors->first('location') }}</p> @endif
                                 <span class="error_span" id="location_err"></span>
                            </div>
                            
                             <div class="form-group  form-input-text">
                                <label for="exampleInputEmail1">Active</label><br>
                                <select class="form-control" name="status">

                                    <option value="1" <?php if (isset($cities_data)) {foreach($cities_data as $k2=>$v2){ 
                            if ($v2->status == 1) {
                                echo 'selected=selected';
                            } }
                        } ?>>Yes</option>
                                    <option value="0" <?php if (isset($cities_data)) {foreach($cities_data as $k2=>$v2){ 
                            if ($v2->status == 0) {
                                echo 'selected=selected';
                            } }
                        } ?> >No</option>

                                </select>

                            </div>

                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="form-group"> 
                                <div class="btn_submit_loader"></div>
                                <!--button id="btn_submit" type="submit" class="btn btn-primary">Submit</button-->

                                <input type="submit" id="btn_submit" class="btn btn-primary"  value="Submit">
                            </div>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->

        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->

@stop