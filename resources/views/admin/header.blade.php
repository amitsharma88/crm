<!-- Top header -->
{{ HTML::script('public/client/module/client_user_module.js'); }}

<div id="fb-root" style="float:left; width:1px;"></div>

<script type="text/javascript">
window.fbAsyncInit = function() {
	FB.init({
	appId      : '805639959496155', // replace your app id here
	channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', 
	status     : true, 
	cookie     : true, 
	xfbml      : true  
	});
};
(function(d){
	var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement('script'); js.id = id; js.async = true;
	js.src = "//connect.facebook.net/en_US/all.js";
	ref.parentNode.insertBefore(js, ref);
}(document));

function FBLogin(){
	FB.login(function(response){
		if(response.authResponse){
			window.location.href = "client/user/fblogin";
		}
	}, {scope: 'email,user_likes'});
}
</script>

<div id="top-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <div class="th-text pull-left">
                    <div class="th-item"> <a href="#"><i class="fa fa-phone"></i> +91-9773303885</a> </div>
                    <div class="th-item"> <a href="#"><i class="fa fa-envelope"></i> bookings@kookbook.com</a></div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="th-text pull-right">
                    <!--<div class="th-item">
                        <div class="btn-group">
                            <button class="btn btn-default btn-xs dropdown-toggle js-activated" type="button" data-toggle="dropdown"> Mumbai <span class="caret"></span> </button>
                            <ul class="dropdown-menu">
                    <?php
                    $cities = array('Mumbai', 'Pune', 'Ahemedabad', 'Delhi');
                    $selected = '';
                    ?>
                                @if($cities)
                                @foreach($cities as $city)

                                <li> <a href="{{URL::to('/')}}/restaurants/{{$city}}">{{$city}}</a> </li>
                                @endforeach
                                @endif

                            </ul>
                        </div>
                    </div>-->
                    <div class="th-item">
                        <div class="btn-group">
                            <a data-toggle="modal" data-target="#selectcity"> {{Session::get('location')}} <span class="caret"></span> </a>

                        </div>
                    </div>

                    <div class="th-item login-register">
                        <div class="btn-group">
                            <?php
                            if (Session::get('client_user_name')) {
                                ?> 
                                <button class='btn btn-default btn-xs dropdown-toggle js-activated' type='button' data-toggle='dropdown'><?php echo Session::get('client_user_name') ?><span class='caret'></span> </button>
                                <ul class='dropdown-menu'>
                                    <li> <a href='{{URL::to('profile')}}'>Edit Profile</a> </li>
                                    <li> <a href='<?php echo URL::route('client/logout') ?>'>Logout</a> </li>
                                </ul>

                                <?php
                            } else {
                                echo " <a data-toggle='modal' data-target='#myModal'>Login/Register</a>";
                            }
                            ?>

                        </div>
                    </div>
                    <div class="th-item">
                        <div class="social-icons"> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-youtube-play"></i></a> </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Header -->
<header>
    <!-- Navigation -->
    <div class="navbar yamm navbar-default" id="sticky">
        <div class="container">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a href="{{SITE_URL}}" class="navbar-brand">         
                    <!-- Logo -->
                    <div id="logo"> <img id="default-logo" src="{{SITE_URL}}public/client/images/logo.png" alt="Starhotel" style="height:44px;" /> <img id="retina-logo" src="public/client/images/logo-retina.png" alt="Starhotel" style="height:44px;" /> </div>
                </a> </div>

            <div id="navbar-collapse-grid" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li> <a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated">Quick Book on Kook Book!</a></li>
                    <li> <a href="#" data-toggle="dropdown" class="dropdown-toggle  js-activated"><strong>Spot Offers</strong></a></li>
                    <li> <a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated"><strong>Write Review</strong></a></li>
                </ul>
                <!--                        <a class="btn btn-small btn-primary mt10" href="#" style="margin-top:10px;"> Spot Offers </a>
                                        <a class="btn btn-small btn-primary mt10" href="#" style="margin-top:10px;">Write Review</a>-->
            </div>

        </div>
    </div>
</header>



<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Login To Kookbook</h4>
            </div>
            <div class="modal-body">
                <div id="flogin">
                    <a onclick="FBLogin();" class="btn btn-block btn-info"><i class="fa fa-facebook"></i> Login With Facebook</a>
                    <p class="text-center mt20">Recommended. And we will never post anything without your permission.</p>
                </div>
                <div  id="login" >

                    <div id="flash_error"></div>
                    <form role="form" id="client_login_form" >
                        <div class="form-group email">
                            <label for="username">Email/ Username</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter email">
                            <span class="error_span" id="email-err"></span>
                        </div>
                        <div class="form-group password">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            <span class="error_span" id="password-err"></span>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me on this computer
                            </label>
                        </div>
                        <div class="btn_submit_loader"></div>
                        <input type="submit" class="btn btn-default btn_submit" value="Login">
                    </form>
                </div>
                <div  id="signup">
                    <form role="form" id="client_register_form">
                        <div class="form-group fullname">
                            <label for="fullname">Full Name</label>
                            <input type="text" class="form-control" name="fullname"  placeholder="Full Name">
                            <span class="error_span" id="rfullname-err"></span>
                        </div>
                        <div class="form-group email">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email"  placeholder="Enter email">
                            <span class="error_span" id="remail-err"></span>
                        </div>
                        <div class="form-group pass">
                            <label for="pass">Password</label>
                            <input type="password" class="form-control" name="pass"  placeholder="Password">
                            <span class="error_span" id="rpass-err"></span>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Send me occasional email updates
                            </label>
                        </div>

                        <div class="btn_submit_loader"></div>
                        <input type="submit" class="btn btn-default btn_submit" value="Register">
                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="log" class="btn btn-default">login</button>
                <button type="button" id="sign" class="btn btn-default">Sign Up</button>
                <button type="button" id="backbutton" class="btn btn-default">Back</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="selectcity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title text-center" id="myModalLabel">Select Your City</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php $cities = App::make('ClientRestaurantController')->get_city(); ?>

                    @foreach(range('A','Z') as $letter)
                    @if(sort_array($cities,$letter))
                    <div class="col-sm-3">
                        <div class="cat">{{$letter}}</div>
                        @foreach(sort_array($cities,$letter) as $city)
                        <a href="{{SITE_URL}}restaurants/{{$city}}">{{$city}}</a>
                        @endforeach
                    </div>
                    @endif
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</div>
</div>