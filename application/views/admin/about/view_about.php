<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>About - KepoAbis.com</title>

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
            <?php $active['menu'] = "about"; $this->load->view("admin/templates/sidebar", $active); ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            About
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>&nbsp;About
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <h2>About - <strong>KepoAbis.com</strong></h2><br>
                <div class="col-lg-8">
                    <div class="row clearfix">
                        <div class="col-md-12 column"> <br>
                            <table class="table">
                                <tbody>
                                    <tr>{image}</tr>
                                    <tr>
                                        <td align="left"><strong>Title</strong></td><td>:</td><td align="left">{title}   
                                    </td> 
                                    </tr>
									<tr>
                                        <td align="left"><strong>Tagline</strong></td><td>:</td><td align="left">{tagline}   
                                    </td>
                                        
                                    </tr>
									<tr>
                                        <td align="left"><strong>Description</strong></td><td>:</td><td align="left">{description}   
                                    </td>     
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Phone</strong></td><td>:</td><td align="left">{contact_phone} </td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Phone Mobile First</strong></td><td>:</td><td align="left">{contact_phone_mobile_first}</td>
                                    </tr>
									<tr>
                                        <td align="left"><strong>Phone Mobile Second</strong></td><td>:</td><td align="left">{contact_phone_mobile_second}</td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Fax</strong></td><td>:</td><td align="left">{contact_fax}</td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Email Addres First</strong></td><td>:</td><td align="left">{contact_email_address_first}</td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Email Address Second</strong></td><td>:</td><td align="left">{contact_email_address_second}</td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Contact Lat</strong></td><td>:</td><td align="left">{contact_lat}</td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Contact Long</strong></td><td>:</td><td align="left">{contact_long}</td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Address<strong></td><td>:</td><td align="left">{contact_address} </td>
                                    </tr>
									<tr>
                                        <td align="left"><strong>Facebook<strong></td><td>:</td><td align="left"><a href="{contact_facebook}">{contact_facebook}</a></td>
                                    </tr>
									<tr>
                                        <td align="left"><strong>Twitter<strong></td><td>:</td><td align="left"><a href="{contact_twitter}">{contact_twitter}</a></td>
                                    </tr>
									<tr>
                                        <td align="left"><strong>Google Plus<strong></td><td>:</td><td align="left"><a href="{contact_googleplus}">{contact_googleplus}</a></td>
                                    </tr>
									<tr>
                                        <td align="left"><strong>Youtube<strong></td><td>:</td><td align="left"><a href="{contact_youtube}">{contact_youtube}</a></td>
                                    </tr>
									<tr>
                                        <td align="left"><strong>Instagram<strong></td><td>:</td><td align="left"><a href="{contact_instagram}">{contact_instagram}</a></td>
                                    </tr>
									<tr>
                                        <td align="left"><strong>Path<strong></td><td>:</td><td align="left"><a href="{contact_path}">{contact_path}</a></td>
                                    </tr>
									<tr>
                                        <td align="left"><strong>Content Title</strong></td><td>:</td><td align="left">{content_title}   
                                    </td>     
                                    </tr>
									<tr>
                                        <td align="left"><strong>Content Body</strong></td><td>:</td><td align="left">{content_body}   
                                    </td>     
                                    </tr>
									<tr>
                                        <td align="left"><strong>Content Mission</strong></td><td>:</td><td align="left">{content_mission}   
                                    </td>     
                                    </tr>
									<tr>
                                        <td align="left"><strong>Created Year<strong></td><td>:</td><td align="left">{created_year}</td>
                                    </tr>
									<tr>
                                        <td align="left"><strong>Version<strong></td><td>:</td><td align="left">{version}</td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Footer</strong></td><td>:</td><td align="left">{footer}</td>
                                    </tr>
                                </td>
                                </tbody>
                            </table>
                            <a class="btn btn-primary" href='<?php echo base_url(); ?>admin/about/update'>Edit</a>&nbsp;
                            <a href='<?php echo base_url(); ?>admin/about'>Back</a>
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
