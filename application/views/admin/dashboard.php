<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>Home Dahsboard - KepoAbis.com</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>ajax/stat.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/canvasjs.min.js"></script>   
    
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php $this->load->view("admin/templates/header"); ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php $active['menu'] = "home"; $this->load->view("admin/templates/sidebar", $active); ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Home Dashboard
                            <small>KepoAbis.com</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>&nbsp;Home
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                 <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Welcome</strong> on <strong>Dashboard KepoAbis.com</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{celcius}&deg;c</div>
                                    <div><strong>{weather}</strong><br>{city}</div>
                                </div>
                            </div>
                        </div>
                        <a>
                            <div class="panel-footer">
                                <span class="pull-left">{now}</span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">2</div>
                                        <div>New Comments!<br>&nbsp;<br></div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url() . "admin/comment-notif"; ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class="form-group">
                    <div class="col-sm-2">
                        <label>Year</label>
                        <select class="form-control" id="year" name="year" onchange="stat(this.value)">
                            <option value="null">- Select Year -</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>  
                        </select>
                    </div>
                    </div>
                </div>
                <div id="chartContainer" style="height: 300px; width: 100%;">
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


</body>

</html>
