<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>User Management - KepoAbis.com</title>

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
    

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php $this->load->view("admin/templates/header"); ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php $active['menu'] = "user"; $this->load->view("admin/templates/sidebar", $active); ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            User Management
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>User Management
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <h2>Detail User</h2><br>
                <div class="col-lg-8">
                    <div class="row clearfix">
                        <div class="col-md-12 column"> <br>
                            <table class="table">
                                <tbody>
                                <td>
                                    <tr>{image}</tr>
                                </td>
                                <td>
                                    <tr>
                                        <td align="left"><strong>Username</strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{username}   
                                    </td>
                                        
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Name<strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{nama_lengkap} </td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Date of Birth</strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{date_of_birth}</td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Place of Birth</strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{place_of_birth}</td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Role</strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{role} </td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Email</strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{email}</td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Phone Number</strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{phone_number}</td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Address</strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{address}</td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong> Position </strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{position}</td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Description</strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{description}</td>
                                    </tr>
                                </td>
                                </tbody>
                            </table>
                            <a href='<?php echo base_url(); ?>admin/user'>Back</a>
                        </div>
                    </div>
                </div>  
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

</body>

</html>
