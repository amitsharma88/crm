 <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-bordered">
                            <tr>
                                <!--th>Sr No</th-->
                                <th>City</th>
                                <th>Location</th>
                                <th>Edit</th>
                                <!--th>Delete</th-->
                            </tr>

                            
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
                            
                        </table>
                    </div>