@extends('admin.layouts.default')
@section('content')
{{ HTML::script('public/admin/js/module/admin_city_module.js'); }}
<aside class="right-side">
    <section class="content-header listing_section">
        <h1>
            City-Locations Mapping 
        
        </h1>
        <ol class="breadcrumb">
          
            <li><a href="{{URL::route('admin/city_has_location/add');}}" class="btn btn-primary btn-sm addnew">+ Add Location to city</a></li>
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
                   <div class="box-header">
                        <form action="{{URL::to('admin/search_city_location')}}" method="get">
                            <div class="box-tools">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search" id="search_attribute_text"/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default" ><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!-- /.box-header -->
                    <div class="search_city_location_data">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-bordered">
                            <tr>
                                <!--th>Sr No</th-->
                                <th>City</th>
                                <th>Location</th>
                                <th>Edit</th>
                                <!--th>Delete</th-->
                            </tr>

                            @if(! $city_has_location->isEmpty())
                            <?php $i = 1 ?>
                            @foreach ($city_has_location as $val)
                            <tr>
                                <!--td>{{$i}}</td-->
                                <td>{{$val->city}}</td>
                                <td>{{$val->result_name}}</td>
                                <td><a href="{{URL::route('admin/city_has_location/manage',$val->city_id);}}" class="label label-primary">Edit</a></td>
                               
                            </tr>
                            <?php $i++ ?>
                            @endforeach
                             @else
                                <tr>
                                    <td colspan="3" class="alert alert-info text-success">Nothing found!</td>
                                </tr>
                             @endif
                        </table>
                    </div><!-- /.box-body -->
                     <div class="box-footer clearfix">
                        <div class="pagination pagination-sm no-margin pull-right">
                           {{$city_has_location->appends(Input::except('page'))->links()}}
                        </div>
                    </div>
                    </div>
                   
                </div><!-- /.box -->
            </div>


        </div>
    </section><!-- /.content -->
</aside>
@stop