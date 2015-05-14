   <div class="box-body table-responsive no-padding">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>Sr No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                   
                                    <th>Type of User</th>
                                    <th>Login</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>

                                @if(! $user->isEmpty())
                                <?php $i = 1 ?>
                                @foreach ($user as $user_info)
                                <tr>
                                    <td>{{ $i}}</td>
                                    <td>{{ $user_info->name}}</td>
                                    <td>{{ $user_info->email}}</td>
                                    
                                    <td>{{ $user_info->user_group}}</td>
                                    <td><button class="btn btn-warning btn-sm" onclick="switch_user_login({{$user_info->id}})">Login</button></td>
                                    <td><a href="{{URL::route('admin/profile/manage',$user_info->id);}}" class="label label-primary">Edit</a></td>
                                    <td>{{HTML::linkAction('delete_user', 'Delete', $user_info->id ,array('onClick' => 'return confirm(\' Are you sure you want to Delete this Entry? \')','class'=>'label label-danger')) }}</td>
                                </tr>
                                <?php $i++ ?>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4">Nothing found!</td>
                                </tr>
                                @endif


                            </table>
                        </div><!-- /.box-body -->