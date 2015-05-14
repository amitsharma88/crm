        <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover table-bordered">
                                        <tr>
                                            <!--th>Sr No</th-->
                                            <th>Location</th>
                                           
                                            <th>Edit</th>
                                            <!--th>Delete</th-->
                                        </tr>
                                        
                                        @if(! $locations->isEmpty())
										<?php $i=1 ?>
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
                                         <td colspan="4"class="alert alert-info text-success">Search result Not found!</td>
                                          </tr>
                                       @endif
                                        
                                     
                                    </table>
                                </div><!-- /.box-body -->