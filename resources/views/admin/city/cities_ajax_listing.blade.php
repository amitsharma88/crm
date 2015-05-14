
<div class="box-body table-responsive no-padding">
    <table class="table table-hover table-bordered">
        <tr>
            <!--th>Sr.No</th-->
            <th>City</th>

            <th>Edit</th>
            <!--th>Delete</th-->
        </tr>

        @if(! $cities->isEmpty())
        <?php $i = 1 ?>
        @foreach ($cities as $city)
        <tr>
            <!--td>{{$i}}</td-->
            <td>{{ $city->city}}</td>

            <td><a href="{{URL::route('admin/city/manage',$city->id);}}" class="label label-primary">Edit</a></td>
            <!--td>{{HTML::linkAction('delete_city', 'Delete', $city->id ,array('onClick' => 'return confirm(\' Are you sure you want to Delete this Entry? \')','class'=>'label label-danger')) }}</td-->
        </tr>
        <?php $i++ ?>
        @endforeach
        @else
        <tr>
            <td colspan="4"class="alert alert-info text-success">Search result Not found!</td>
        </tr>
        @endif


    </table>
</div><!-- /.box-body -->


