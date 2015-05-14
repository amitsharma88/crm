@extends('admin.layouts.default')
@section('content')
{{ HTML::script('public/admin/js/module/admin_user_module.js'); }}
<aside class="right-side">
    <section class="content-header listing_section">
        <h1>
            Customers
            <!--small>preview of simple tables</small-->
        </h1>
        <ol class="breadcrumb">

            <li><a href="{{URL::route('admin/customer/add');}}" class="btn btn-primary btn-sm addnew">+ Add Customer</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        @if(Session::get('save'))
        <div class="alert alert-info text-success">{{Session::get('save')}}</div>
        @endif
        <div class="row">
            <div class="col-xs-12 user_div">
                <div class="box">
                    <div class="box-header">
                        <!--                        <form action="URL::to('admin/search_user') " method="get">
                                                    <div class="box-tools">
                                                        <div class="input-group">
                                                            <input type="text" name="search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search" id="search_attribute_text"/>
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-sm btn-default" ><i class="fa fa-search"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>-->
                    </div><!-- /.box-header -->
                    <div class="box-header">
                        <div class="box-body ">
                            <div class="timeline-item ">
                                <h4 class="timeline-header">Filter</h4>
                                <div class="timeline-body">
                                    <form id="slot_filter" action="{{SITE_URL}}customer" method="get">
                                        <table>
                                            <tr>
                                                <td><input type="text" class="form-control" id="user_name" placeholder="User Name/Mobile/Email" name="user_name" value="{{isset($_GET['user_name']) && $_GET['user_name'] !='' ? $_GET['user_name'] : ''}}"></td>
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
                    <div class="search_user_data">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <!--th>Sr No</th-->
                                    <th>Name</th>
                                    <th>Email</th>
                                    <!--<th>Type of User</th>-->
                                    <th>Contact Number </th>
                                    <th>Created At</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>

                                @if($users)
                                @foreach ($users as $user_info)
                                <tr>
                                    <!--td></td-->
                                    <td>{{$user_info->first_name}} {{$user_info->last_name}}</td>
                                    <td>{{$user_info->email}}</td>
                                    <!--<td>$user_info->group_name</td>-->
                                    <td>{{$user_info->mobile}}</td>
                                    <td>{{date('d-m-Y',strtotime($user_info->created_at))}}</td>
                                    <!--td><a href="{{URL::route('admin/user/restaurant_static',$user_info->id);}}" class="label label-info">Static</a></td-->
                                    <td><a href="{{URL::route('customer/profile/manage',$user_info->id)}}" class="label label-primary">Edit</a></td>
                                    <td>{{HTML::linkAction('delete_user', 'Delete', $user_info->id ,array('onClick' => 'return confirm(\' Are you sure you want to Delete this Entry? \')','class'=>'label label-danger')) }}</td>
                                </tr>
                                @endforeach
                                @else

                                <tr>
                                    <td colspan="9" class="alert alert-info text-success">Nothing found!</td>
                                </tr>

                                @endif

                            </table>

                        </div><!-- /.box-body -->

                        <div class="box-footer clearfix">
                            <div class="pagination pagination-sm no-margin pull-right">
                                {{$users->appends(Input::except('page'))->links()}}
                            </div>
                        </div>

                    </div>
                </div><!-- /.box -->
            </div>

        </div>
    </section><!-- /.content -->
</aside>
@stop