@extends('admin.layouts.default')
@section('content')
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


<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    Inquiries
                </div>
                <span class="tools">
                    <i class="fa fa-cogs"></i>
                </span>
            </div>
            <div class="widget-body">
                <table class="table table-responsive table-striped table-bordered table-hover no-margin">
                    <thead>
                        <tr>
                            <th style="width:5%">
                                <input type="checkbox" class="no-margin" />
                            </th>
                            <th style="width:40%">
                                Name
                            </th>
                            <th style="width:20%" class="hidden-xs">
                                Product
                            </th>
                            <th style="width:10%" class="hidden-xs">
                                Status
                            </th>
                            <th style="width:15%" class="hidden-xs">
                                Date
                            </th>
                            <th style="width:10%" class="hidden-xs">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($enquiries)
                        @foreach($enquiries as $enquiry)
                        <tr>
                            <td>
                                <input type="checkbox" class="no-margin" />
                            </td>
                            <td>
                                <span class="name">
                                    Mahendra Singh Dhoni
                                </span>
                            </td>
                            <td>
                                Baswa #567
                            </td>
                            <td>
                                <span class="label label-info">
                                    New
                                </span>
                            </td>
                            <td>
                                15 - 02 - 2013
                            </td>
                            <td class="hidden-xs">
                                <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle">
                                        Action 
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="#">Edit</a>
                                        </li>
                                        <li>
                                            <a href="#">Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @endif



                    </tbody>
                </table>
                {!! $enquiries->appends(Input::except('page'))->render() !!}
            </div>
        </div>
    </div>
</div>
@stop
