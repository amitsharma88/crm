@extends('admin.layouts.default')
@section('content')

<!-- Sub Nav End -->

<!-- Dashboard Wrapper Start -->


    <!-- Left Sidebar Start -->
    <div class="left-sidebar">

        <!-- Row Start -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="widget">
                    <div class="widget-header">
                        <div class="title">
                            Bootstrap-wysihtml5 
                            <span class="mini-title">
                                Simple, beautiful wysiwyg editors
                            </span>
                        </div>
                        <span class="tools">
                            <i class="fa fa-cogs"></i>
                        </span>
                    </div>
                    <div class="widget-body">
                        <div class="hero-unit">
                            <textarea class="textarea form-control" placeholder="Go ahead ..."></textarea>
                        </div>
                        <button class="btn btn-primary btn-lg" type="button"><i class="icon-envelope"></i> Save Changes</button>
                        <button class="btn btn-default btn-lg" type="button">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row End -->

        <!-- Row Start -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-header">
                        <div class="title">
                            Color picke <a id="color-picker">r</a>
                        </div>
                        <span class="tools">
                            <i class="fa fa-cogs"></i>
                        </span>
                    </div>
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-sx-12">
                                <div class="form-group">
                                    <label for="hue-demo">Hue (default)</label>
                                    <input type="text" id="hue-demo" class="form-control demo" data-control="hue" value="#ff6161">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-sx-12">
                                <div class="form-group">
                                    <label for="saturation-demo">Saturation</label>
                                    <input type="text" id="saturation-demo" class="form-control demo" data-control="saturation" value="#0088cc">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-sx-12">
                                <div class="form-group">
                                    <label for="brightness-demo">Brightness</label>
                                    <input type="text" id="brightness-demo" class="form-control demo" data-control="brightness" value="#00ffff">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-sx-12">
                                <div class="form-group">
                                    <label for="wheel-demo">Wheel</label>
                                    <input type="text" id="wheel-demo" class="form-control demo" data-control="wheel" value="#ff99ee">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12">
                                <div class="form-group">
                                    <label for="opacity">Opacity</label>
                                    <br>
                                    <input type="text" id="opacity" class="form-control demo" data-opacity=".5" value="#766fa8">
                                    <span class="help-block">
                                        Opacity can be assigned by including the <code>data-opacity</code> attribute 
                                        or by setting the <code>opacity</code> option to <code>true</code>.
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12">
                                <div class="form-group">
                                    <label for="default-value">Default Value</label>
                                    <br>
                                    <input type="text" id="default-value" class="form-control demo" data-defaultValue="#ff6600">
                                    <span class="help-block">
                                        This field has a default value assigned to it, so it will never be empty.
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-sx-12">
                                <div class="form-group">
                                    <label for="letter-case">Letter Case</label>
                                    <br>
                                    <input type="text" id="letter-case" class="form-control demo" data-letterCase="uppercase" value="#abcdef">
                                    <span class="help-block">
                                        This field will always be uppercase.
                                    </span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-sx-12">
                                <div class="form-group">
                                    <label for="position-bottom-left">Bottom left (default)</label>
                                    <input type="text" id="position-bottom-left" class="form-control demo" data-position="bottom left" value="#0088cc">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-sx-12">
                                <div class="form-group">
                                    <label for="position-top-left">Top left</label>
                                    <input type="text" id="position-top-left" class="form-control demo" data-position="top left" value="#0088cc">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-sx-12">
                                <div class="form-group">
                                    <label for="position-bottom-right">Bottom right</label>
                                    <input type="text" id="position-bottom-right" class="form-control demo" data-position="bottom right" value="#0088cc">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-sx-12">
                                <div class="form-group">
                                    <label for="position-top-right">Top right</label>
                                    <input type="text" id="position-top-right" class="form-control demo" data-position="top right" value="#0088cc">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row End -->

        <!-- Row Start -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="widget">
                    <div class="widget-header">
                        <div class="title">
                            Create Account 
                            <span class="mini-title">
                                Simple form for new Accoun <a id="create-account">t</a>
                            </span>
                        </div>
                    </div>
                    <div class="widget-body">
                        <form class="form-horizontal no-margin">
                            <div class="form-group">
                                <label for="userName" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="userName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emailId" class="col-sm-2 control-label">Email Address</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="emailId" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pwd" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="pwd" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="rptPwd" class="col-sm-2 control-label">Repeat Pwd</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="rptPwd" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pwd" class="col-sm-2 control-label">DOB</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <select id="DateOfBirthMonth" class="form-control">
                                                <option>
                                                    - Month -
                                                </option>
                                                <option value="1">
                                                    January
                                                </option>
                                                <option value="2">
                                                    February
                                                </option>
                                                <option value="3">
                                                    March
                                                </option>
                                                <option value="4">
                                                    April
                                                </option>
                                                <option value="5">
                                                    May
                                                </option>
                                                <option value="6">
                                                    June
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <select name="DateOfBirth_Day"  class="form-control">
                                                <option>
                                                    - Day -
                                                </option>
                                                <option value="1">
                                                    1
                                                </option>
                                                <option value="2">
                                                    2
                                                </option>
                                                <option value="3">
                                                    3
                                                </option>
                                                <option value="4">
                                                    4
                                                </option>
                                                <option value="5">
                                                    5
                                                </option>
                                                <option value="6">
                                                    6
                                                </option>
                                                <option value="7">
                                                    7
                                                </option>
                                                <option value="8">
                                                    8
                                                </option>
                                                <option value="9">
                                                    9
                                                </option>
                                                <option value="10">
                                                    10
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <select name="DateOfBirth_Year" class="form-control">
                                                <option>
                                                    - Year -
                                                </option>
                                                <option value="2013">
                                                    2013
                                                </option>
                                                <option value="2012">
                                                    2012
                                                </option>
                                                <option value="2011">
                                                    2011
                                                </option>
                                                <option value="2010">
                                                    2010
                                                </option>
                                                <option value="2009">
                                                    2009
                                                </option>
                                                <option value="2008">
                                                    2008
                                                </option>
                                                <option value="2007">
                                                    2007
                                                </option>
                                                <option value="2006">
                                                    2006
                                                </option>
                                                <option value="2005">
                                                    2005
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country" class="col-sm-2 control-label">Country/Region</label>
                                <div class="col-sm-10">
                                    <select id="country" class="form-control">
                                        <option value="">
                                            Country...
                                        </option>
                                        <option value="Afganistan">
                                            Afghanistan
                                        </option>
                                        <option value="Albania">
                                            Albania
                                        </option>
                                        <option value="Australia">
                                            Australia
                                        </option>
                                        <option value="Austria">
                                            Austria
                                        </option>
                                        <option value="Chile">
                                            Chile
                                        </option>
                                        <option value="China">
                                            China
                                        </option>
                                        <option value="India">
                                            India
                                        </option>
                                        <option value="Indonesia">
                                            Indonesia
                                        </option>
                                        <option value="Korea Sout">
                                            Korea South
                                        </option>
                                        <option value="Kuwait">
                                            Kuwait
                                        </option>
                                        <option value="Macau">
                                            Macau
                                        </option>
                                        <option value="Malaysia">
                                            Malaysia
                                        </option>
                                        <option value="Malawi">
                                            Malawi
                                        </option>
                                        <option value="Maldives">
                                            Maldives
                                        </option>
                                        <option value="Mali">
                                            Mali
                                        </option>
                                        <option value="Malta">
                                            Malta
                                        </option>
                                        <option value="Mayotte">
                                            Mayotte
                                        </option>
                                        <option value="Zaire">
                                            Zaire
                                        </option>
                                        <option value="Zambia">
                                            Zambia
                                        </option>
                                        <option value="Zimbabwe">
                                            Zimbabwe
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Yes! I would like to receive email relating to products and services.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Remember Me :).
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-info">Create Account</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row End -->

        <!-- Row Start -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="widget">
                    <div class="widget-header">
                        <div class="title">
                            Input <a id="inputs">s</a>
                        </div>
                        <span class="tools">
                            <i class="fa fa-cogs"></i>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form class="form-horizontal row-border" action="#">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Default input</label>
                                <div class="col-md-10">
                                    <input type="text" name="regular" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Password</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="password" name="pass">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Placeholder</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="placeholder" placeholder="placeholder">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Disabled</label>
                                <div class="col-md-10">
                                    <input type="text" name="disabled" disabled="disabled" value="disabled" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Read only</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="readonly" readonly="" value="read only">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Help text</label>
                                <div class="col-md-10">
                                    <input type="text" name="regular" class="form-control">
                                    <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Predefined</label>
                                <div class="col-md-10">
                                    <input type="text" name="regular" value="http://" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">With icon</label>
                                <div class="col-md-10">
                                    <input type="text" name="regular" class="form-control">
                                    <i class="icon-pencil input-icon"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="labelfor" class="col-md-2 control-label">Clickable label</label>
                                <div class="col-md-10">
                                    <input type="text" name="labelfor" id="labelfor" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Column sizing</label>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <input type="text" class="form-control" placeholder=".col-xs-3">
                                        </div>
                                        <div class="col-xs-5">
                                            <input type="text" class="form-control" placeholder=".col-xs-5">
                                        </div>
                                        <div class="col-xs-4">
                                            <input type="text" class="form-control" placeholder=".col-xs-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="col-md-2 control-label">Input success</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="inputSuccess" placeholder="Input Success">
                                    <i class="icon-pencil input-icon success"></i>
                                </div>
                            </div>
                            <div class="form-group has-warning">
                                <label class="col-md-2 control-label">Input warning</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="inputWarning" placeholder="Input Warning">
                                    <i class="icon-pencil input-icon warning"></i>
                                </div>
                            </div>
                            <div class="form-group has-error">
                                <label class="col-md-2 control-label">Input error</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="inputError" placeholder="Input Error">
                                    <i class="icon-pencil input-icon error"></i>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row End -->

    </div>
    <!-- Left Sidebar End -->

    <!-- Right Sidebar Start -->
    <div class="right-sidebar">
        <div class="wrapper">
            <button class="btn btn-block btn-info" type="button">
                Block level button
            </button>
        </div>
        <div class="wrapper">
            <button class="btn btn-block btn-success" type="button">
                Block level button
            </button>
        </div>
        <div class="wrapper">
            <button class="btn btn-block btn-warning" type="button">
                Block level button
            </button>
        </div>

        <hr class="hr-stylish-1">

        <div class="wrapper">
            <ul class="progress-stats">
                <li>
                    <div class="details">
                        <span>Windows</span>
                        <span class="pull-right">78%</span>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="details">
                        <span>Windows 8</span>
                        <span class="pull-right">32%</span>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="details">
                        <span>Mac</span>
                        <span class="pull-right">84%</span>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="84" aria-valuemin="0" aria-valuemax="100" style="width: 84%">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="details">
                        <span>Linux</span>
                        <span class="pull-right">44%</span>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="44" aria-valuemin="0" aria-valuemax="100" style="width: 44%">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="details">
                        <span>IPhone/IPad</span>
                        <span class="pull-right">67%</span>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width: 67%">
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <hr class="hr-stylish-1">

        <div class="wrapper">
            <div class="btn-toolbar no-margin">
                <div class="btn-group">
                    <a href="#" class="btn btn-success">
                        <i class="fa fa-headphones"></i>
                    </a>
                    <a href="#" class="btn btn-warning">
                        <i class="fa fa-thumbs-down"></i>
                    </a>
                    <a href="#" class="btn btn-danger">
                        <i class="fa fa-tasks"></i>
                    </a>
                    <a href="#" class="btn btn-info">
                        <i class="fa fa-thumbs-up"></i>
                    </a>
                </div>
                <div class="btn-group">
                    <a href="#" class="btn btn-default">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Right Sidebar End -->

<!-- Dashboard Wrapper End -->

<!-- Main Container end -->
@stop