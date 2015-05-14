<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if(Session::get('admin_user_pic') != "")
                <img src="{{URL::to('/').'/uploads/user_pic/'.Session::get('admin_user_pic')}}" class="img-circle">
                @else
                {{ HTML::image('public/admin/img/defaultuser.jpg' ,'', array('class' => 'img-circle'))}}
                @endif
            </div>
            <div class="pull-left info">

                <p>Logged in as {{Session::get('admin_group_name')}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu">
            <?php
            $navigation = App::make('BaseController')->get_navigation(Session::get('admin_group_name'));
            if ($navigation) {
                foreach ($navigation['parent_nav'] as $key => $nav) {
                    echo '<li class="active"><a href="' . URL::to('/') . '/' . (explode('#', $nav)[0]) . '"><i class="fa fa-dashboard"></i> <span>' . explode('#', $nav)[1] . '</span></a></li>';
                }
            }
            ?>

            @if($navigation['masters'])
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Masters</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    @foreach($navigation['masters'] as $master)
                    <li><a href="{{SITE_URL}}{{explode('#',$master)[0]}}"><i class="fa fa-angle-double-right"></i>{{explode('#',$master)[1]}}</a></li>
                    @endforeach

                </ul>
            </li>
            @endif

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>