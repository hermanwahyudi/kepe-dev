<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>Gallery Management - KepoAbis.com</title>

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
            var x = confirm("Are you sure you want to delete this article?");
            if (x) return true;
            return false;
        }
    </script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'ajax/general.js'; ?>"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php $this->load->view("admin/templates/header"); ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php $active['menu'] = "gallery"; $this->load->view("admin/templates/sidebar", $active); ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Gallery Management
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>&nbsp;Gallery
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                    <div class="col-lg-12">
                        <h1 class="page-header">Gallery</h1>
                        {images_list}

                    </div>
                    <div class ="col-md-6">
                   
                    <div class ="msg"></div>
                    <div class="form-group">
                        <label class="col-sm-2">Preview</label>
                        <div class="col-sm-6">
                            <img id="img_prev" style="border-radius:25px; box-shadow: 10px 10px 5px #888888; max-width:95%;border:6px groove #545565;" src="<?php $image = 'default-image.png'; echo base_url() . 'assets/img/' . $image;?>"  width="150" height="200"/>
                        </div>
                    </div>
                    <form id="upload-image-form" action="<?php echo base_url(); ?>admin/gallery/upload" method="post" enctype="multipart/form-data" role="form">
                        <input type="file" class = "form-control" name="userfile" size="20" onchange="read_image(this);" /><br />
                        <input type="submit" id='submit' name = "submit" value="Upload" class ="btn btn-primary" />
                    </form>
                    </div>
                    <script src="<?php echo base_url() . "ajax/upload.js"; ?>"></script>
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
