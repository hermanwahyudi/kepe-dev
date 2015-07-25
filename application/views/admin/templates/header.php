<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="dashboard">Dashboard - KepoAbis.com</a>
</div>
<!-- Top Menu Items -->

<ul class="nav navbar-right top-nav">
     <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
        <ul class="dropdown-menu alert-dropdown">
            <li>
                <a href="#"><span class="label label-default">2 New Comments Article</span></a>
            </li>
            <li>
                <a href="#"><span class="label label-primary">3 New Comments News</span></a>
            </li>
            <li>
                <a href="#"><span class="label label-success">3 New Comments Videografi</span></a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">View All</a>
            </li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"> </i>&nbsp; <?php $data = $this->session->userdata('logged_in'); echo $data['username']; ?><b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <a href="<?php echo base_url() . "admin/profile"; ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="<?php echo base_url(); ?>admin/dashboard/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
        </ul>
    </li>
</ul>