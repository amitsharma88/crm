<!DOCTYPE html>
<html class="bg-black">
    <head>

        <meta charset="UTF-8">
        <title>CBkart | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        {{ HTML::style('public/admin/css/bootstrap.min.css'); }}

        {{ HTML::style('public/admin/css/font-awesome.min.css'); }}
        {{ HTML::style('public/admin/css/custom.css'); }}


        {{ HTML::style('public/admin/css/AdminLTE.css'); }}


        <style>
            .err_display{display: none;color: red}
        </style>
        <script type="text/javascript">
            var SITE_URL = '<?php echo URL::to('/') . '/'; ?>';
        </script>


    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Please type in your register email address</div>
            <div id="flash_error">{{ Session::get('flash_error') }}</div>
            <form action="{{ URL::route('admin/send_new_password'); }}" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="email" id="email" class="form-control @if ($errors->has('email')) login_error @endif" placeholder="User ID"/>
                        @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                    </div>


                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn btn-success bg-olive btn-block">Submit</button>

                </div>
            </form>


        </div>


        <!-- jQuery 2.0.2 -->
        {{ HTML::script('public/admin/js/jquery.min.js'); }}   

    </body>
</html>