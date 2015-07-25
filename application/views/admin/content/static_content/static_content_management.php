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
    <script>
        function ConfirmDelete() {
            var x = confirm("Are you sure you want to delete this static content?");
            if (x) return true;
            return false;
        }
    </script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php $this->load->view("admin/templates/header"); ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php $active['menu'] = "content"; $this->load->view("admin/templates/sidebar", $active); ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Static Content Management
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Static Content Management
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                 <div class="col-lg-12">
                        <h2>Static Content List <strong>KepoAbis.com</strong></h2>
                        {success}
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Tag</th>
                                        <th>Status</th>
                                        <th>Created Time</th>
                                        <th>Updated Time </th>
                                        <th>More</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {data_static_content}
                                </tbody>
                            </table>
                            {link}<br><br>
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
