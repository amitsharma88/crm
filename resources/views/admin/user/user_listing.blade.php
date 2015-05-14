@extends('admin.layouts.default')
@section('content')

<aside class="right-side">
    <section class="content-header listing_section">
        <h1>
            Users
            <!--small>preview of simple tables</small-->
        </h1>
        <ol class="breadcrumb">

            <li><a href="" class="btn btn-primary btn-sm addnew">+ Add User</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

       
        <div class="alert alert-info text-success"></div>
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
                                    <form id="slot_filter" action="user" method="get">
                                        <table>
                                            <tr>
                                                <td><input type="text" class="form-control" id="user_name" placeholder="User Name/Mobile/Email" name="user" value="{{isset($_GET['user']) && $_GET['user'] !='' ? $_GET['user'] : ''}}"></td>
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
                                    <th>Type of User</th>
                                    <th>Email</th>
                                    <th>Contact Number </th>
                                    <th>Verified</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>

                                

                            </table>

                        </div><!-- /.box-body -->

                        <div class="box-footer clearfix">
                            <div class="pagination pagination-sm no-margin pull-right">
                                <!--$users->appends(Input::except('page'))->links()-->
                            </div>
                        </div>

                    </div>
                </div><!-- /.box -->
            </div>

        </div>
    </section><!-- /.content -->
</aside>
@stop