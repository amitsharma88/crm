<!DOCTYPE html>
<html>
    <head>
        <title>Blue Moon - Responsive Admin Dashboard</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Blue Moon - Responsive Admin Dashboard" />
        <meta name="keywords" content="Notifications, Admin, Dashboard, Bootstrap3, Sass, transform, CSS3, HTML5, Web design, UI Design, Responsive Dashboard, Responsive Admin, Admin Theme, Best Admin UI, Bootstrap Theme, Wrapbootstrap, Bootstrap, bootstrap.gallery" />
        <meta name="author" content="Bootstrap Gallery" />
        <link rel="shortcut icon" href="img/favicon.ico">

        <link href="public/admin/css/bootstrap.min.css" rel="stylesheet">

        <link href="public/admin/css/new.css" rel="stylesheet">
        <!-- Important. For Theming change primary-color variable in main.css  -->

        <link href="public/admin/fonts/font-awesome.min.css" rel="stylesheet">

        <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->


    </head>

    <body>

        <!-- Main Container start -->
        <div class="dashboard-container">

            <div class="container">
                
                <!-- Row Start -->
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-md-offset-4">
                        <div class="sign-in-container">
                            
                            <form action="{{SITE_URL}}/user_login" class="login-wrapper" method="post">
                                
                                <div class="header">
                                    
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <h3>Login<img src="img/logo1.png" alt="Logo" class="pull-right"></h3>
                                            <p>Fill out the form below to login.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="content">
                                    <h3 class="alert alert-block alert-danger fade in">{{$error}}</h3>
                                    <div class="form-group">
                                        <label for="userName">Email</label>
                                        <input type="text" name="email" class="form-control" id="userName" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="Password1">Password</label>
                                        <input type="password" name="password" class="form-control" id="Password1" placeholder="Password">
                                    </div>
                                </div>
                                <div class="actions">
                                    <input class="btn btn-danger" name="Login" type="submit" value="Login">
                                    <a class="link" href="#">Forgot Password?</a>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Row End -->

            </div>
        </div>
        <!-- Main Container end -->

        <script src="public/admin/js/jquery.js"></script>
        <script src="public/admin/js/bootstrap.min.js"></script>

    </body>
</html>