<div class="modal-body">
    <div  class="table-responsive">
        <table class="table enqtable"> 
            <tr>
                <td>Sr No: </td>
                <td>{{$enquiry->enquiry_id}}</td>
                <td></td>
                <td>Created At: </td>
                <td>{{date('d-m-Y',strtotime($enquiry->inquiry_date))}}</td>
            </tr>
            <tr>
                <td>New: </td>
                <td>{{$enquiry->is_new == 1 ? 'Yes' : 'No' }}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>First Name:</td>
                <td>{{$enquiry->first_name}} </td>
                <td></td>
                <td>Last Name:</td>
                <td>{{$enquiry->last_name}}</td>
            </tr>
            <tr>
                <td>Mobile: </td>
                <td>{{$enquiry->mobile}}</td>
                <td></td>
                <td>Email: </td>
                <td>{{$enquiry->email}}</td>
            </tr>
            <tr>
                <td>Project/Phase:</td>
                <td>{{$enquiry->project_name}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Transaction Interest:</td>
                <td>{{$enquiry->fund_source_name}}</td>
                <td></td>
                <td>Budget Range: </td>
                <td>{{$enquiry->budget_name}}</td>
            </tr>

            <tr>
                <td>Inquiry Status:</td>
                <td>{{$enquiry->inquiry_list_status}}</td>
                <td></td>
                <td>Sales Agent Name(s):</td>
                <td><!--$enquiry->sales_agent--></td>
            </tr>

        </table>
        <div  class="text-justify"> <strong>Remark:</strong> 
            @if(isset($enquiry->operator_remark) && isset($enquiry->operator_remark) != '')
            @if(count(explode('##',$enquiry->operator_remark)) > 0)
            @foreach(explode('##',$enquiry->operator_remark) as $k => $v)
            <b>{{$v}}</b><br>
            @endforeach
            @endif
            @endif
        </div>
    </div>
</div>
<div class="modal-footer">
    <a class="btn-sm btn-primary " href="{{SITE_URL}}enquiry/edit/{{$enquiry->enquiry_id}}"><i class="fa fa-pencil"></i>Edit</a></td>
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>