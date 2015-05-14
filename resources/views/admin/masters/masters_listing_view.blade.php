@extends('admin.layouts.default')
@section('content')
<!--{{ HTML::script('public/admin/js/module/admin_menu_module.js'); }}-->



<aside class="right-side">

    <section class="content-header listing_section">
        <h1>
            <h1>{{ucwords($heading)}} </h1>

        </h1>
        <ol class="breadcrumb">

            <li><a href="{{SITE_URL}}masters/{{$heading}}/{{$table_name}}/manage" class="btn btn-primary btn-sm addnew">+ Add {{ucwords($heading)}}</a></li>

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
                    <div class="search_restaurant_data">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <!--<th>Status</th>-->
                                    <!--<th>Actions</th>-->
                                    <th>Edit</th>
                                    <!--<th>Delete</th>-->

                                </tr>

                                @if($master)
                                @foreach($master as $project)
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <!--<td></td>-->
                                    <!--<td><a href="">Buildings</a></td>-->
                                    <td><a href="{{SITE_URL}}masters/{{$heading}}/{{$table_name}}/manage/{{$project->id}}" class="btn-sm btn-primary"><i class="fa fa-pencil"></i>Edit</a></td>
                                    <!--<td><a href="javascript:;" class="btn-sm btn-danger delete_master" heading='{{$heading}}' table_name='{{$table_name}}' id='{{$project->id }}'><i class="fa fa-trash-o"></i> Delete</a></td>-->
                                    <!--<td>{{HTML::linkAction('delete_master', 'Delete',$heading,$table_name,$project->id ,array('onClick' => 'return confirm(\' Are you sure you want to Delete this Entry? \')','class'=>'label label-danger')) }}</td>-->

                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="9" class="alert alert-info text-success">Nothing found!</td>
                                </tr>
                                @endif

                            </table>
                            @if($master)
                            @foreach($master as $res)


                            @endforeach


                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="pagination pagination-sm no-margin pull-right">
                               {{$master->appends(Input::except('page'))->links()}}
                                <!--pagination ends--->
                            </div>
                        </div>
                        @endif
                    </div>
                </div><!-- /.box -->
            </div>


        </div>
    </section><!-- /.content -->

</aside>
@stop
