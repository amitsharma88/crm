@extends('admin.layouts.default')
@section('content')
{{ HTML::script('public/admin/js/module/admin_location_module.js'); }}
<aside class="right-side">
    <section class="content-header listing_section">
        <h1>
            Locations
            <!--small>preview of simple tables</small-->
        </h1>
        <ol class="breadcrumb">
            <!--li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Simple</li-->
            <li><a href="{{URL::route('admin/location/add');}}" class="btn btn-primary btn-sm addnew">+ Add Location</a></li>
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
                        <form action="{{URL::to('admin/search_location')}}" method="get">
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
                    <div class="search_location_data">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <!--th>Sr No</th-->
                                    <th>Location</th>

                                    <th>Edit</th>
                                    <!--th>Delete</th-->
                                </tr>

                                @if(! $locations->isEmpty())
                                <?php $i = 1 ?>
                                @foreach ($locations as $location)
                                <tr>
                                    <!--td>{{$i}}</td-->
                                    <td>{{ $location->location}}</td>

                                    <td><a href="{{URL::route('admin/location/manage',$location->id);}}" class="label label-primary">Edit</a></td>
                                    <!--td>{{HTML::linkAction('delete_location', 'Delete', $location->id ,array('onClick' => 'return confirm(\' Are you sure you want to Delete this Entry? \')','class'=>'label label-danger')) }}</td-->
                                </tr>
                                <?php $i++ ?>
                                @endforeach
                                @else
                                 <tr>
                                    <td colspan="2" class="alert alert-info text-success">Nothing found!</td>
                                </tr>
                                @endif


                            </table>
                        </div><!-- /.box-body -->
                    </div>

                    <div class="box-footer clearfix">
                        <div class="pagination pagination-sm no-margin pull-right">
                            {{$locations->appends(Input::except('page'))->links()}}
                        </div>
                    </div>
                </div><!-- /.box -->
            </div>


        </div>
    </section><!-- /.content -->
</aside>
@stop