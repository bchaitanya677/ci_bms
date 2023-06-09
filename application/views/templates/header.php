<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Dashboard">
	<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<title>Dashio - Bootstrap Admin Template</title>

	<!-- Favicons -->
	<!--	<link href="img/favicon.png" rel="icon">-->
	<!--	<link href="img/apple-touch-icon.png" rel="apple-touch-icon">-->

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/lib/bootstrap/css/bootstrap.min.css') ?>">
	<!--external css-->
	<link href="<?php echo base_url('assets/lib/font-awesome/css/font-awesome.css') ?>" rel="stylesheet"/>
	<!-- Custom styles for this template -->
	<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/style-responsive.css') ?>" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!--	<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css" rel="stylesheet">-->
	<link href="<?php echo base_url('assets/lib/advanced-datatable/css/DT_bootstrap.css') ?>" rel="stylesheet">
	<!-- =======================================================
	  Template Name: Dashio
	  Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
	  Author: TemplateMag.com
	  License: https://templatemag.com/license/
	======================================================= -->
</head>

<body>
<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
<section id="container">
	<!-- **********************************************************************************************************************************************************
		TOP BAR CONTENT & NOTIFICATIONS
		*********************************************************************************************************************************************************** -->
	<!--header start-->
	<header class="header black-bg">
		<div class="sidebar-toggle-box">
			<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
		</div>
		<!--logo start-->
		<a href="<?php echo base_url() ?>" class="logo"><b>DASH<span>IO</span></b></a>
		<!--logo end-->
		<div class="nav notify-row" id="top_menu">
			<!--  notification start -->
			<ul class="nav top-menu">
				<!-- settings start -->
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo base_url() ?>">
						<i class="fa fa-tasks"></i>
						<span class="badge bg-theme">4</span>
					</a>
					<ul class="dropdown-menu extended tasks-bar">
						<div class="notify-arrow notify-arrow-green"></div>
						<li>
							<p class="green">You have 4 pending tasks</p>
						</li>
						<li>
							<a href="<?php echo base_url() ?>">
								<div class="task-info">
									<div class="desc">Dashio Admin Panel</div>
									<div class="percent">40%</div>
								</div>
								<div class="progress progress-striped">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
										 aria-valuemin="0" aria-valuemax="100" style="width: 40%">
										<span class="sr-only">40% Complete (success)</span>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>">
								<div class="task-info">
									<div class="desc">Database Update</div>
									<div class="percent">60%</div>
								</div>
								<div class="progress progress-striped">
									<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
										 aria-valuemin="0" aria-valuemax="100" style="width: 60%">
										<span class="sr-only">60% Complete (warning)</span>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>">
								<div class="task-info">
									<div class="desc">Product Development</div>
									<div class="percent">80%</div>
								</div>
								<div class="progress progress-striped">
									<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80"
										 aria-valuemin="0" aria-valuemax="100" style="width: 80%">
										<span class="sr-only">80% Complete</span>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>">
								<div class="task-info">
									<div class="desc">Payments Sent</div>
									<div class="percent">70%</div>
								</div>
								<div class="progress progress-striped">
									<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70"
										 aria-valuemin="0" aria-valuemax="100" style="width: 70%">
										<span class="sr-only">70% Complete (Important)</span>
									</div>
								</div>
							</a>
						</li>
						<li class="external">
							<a href="#">See All Tasks</a>
						</li>
					</ul>
				</li>
				<!-- settings end -->
				<!-- inbox dropdown start-->
				<li id="header_inbox_bar" class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo base_url() ?>">
						<i class="fa fa-envelope-o"></i>
						<span class="badge bg-theme">5</span>
					</a>
					<ul class="dropdown-menu extended inbox">
						<div class="notify-arrow notify-arrow-green"></div>
						<li>
							<p class="green">You have 5 new messages</p>
						</li>
						<li>
							<a href="<?php echo base_url() ?>">
								<span class="photo"><img alt="avatar"
														 src="<?php echo base_url('assets/img/ui-zac.jpg') ?>"></span>
								<span class="subject">
                  <span class="from">Zac Snider</span>
                  <span class="time">Just now</span>
                  </span>
								<span class="message">
                  Hi mate, how is everything?
                  </span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>">
								<span class="photo"><img alt="avatar" src="<?php echo base_url('assets/img/ui-divya.jpg') ?>"></span>
								<span class="subject">
                  <span class="from">Divya Manian</span>
                  <span class="time">40 mins.</span>
                  </span>
								<span class="message">
                  Hi, I need your help with this.
                  </span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>">
								<span class="photo"><img alt="avatar" src="<?php echo base_url('assets/img/ui-danro.jpg') ?>"></span>
								<span class="subject">
                  <span class="from">Dan Rogers</span>
                  <span class="time">2 hrs.</span>
                  </span>
								<span class="message">
                  Love your new Dashboard.
                  </span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>">
								<span class="photo"><img alt="avatar" src="<?php echo base_url('assets/img/ui-sherman.jpg') ?>"></span>
								<span class="subject">
                  <span class="from">Dj Sherman</span>
                  <span class="time">4 hrs.</span>
                  </span>
								<span class="message">
                  Please, answer asap.
                  </span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>">See all messages</a>
						</li>
					</ul>
				</li>
				<!-- inbox dropdown end -->
				<!-- notification dropdown start-->
				<li id="header_notification_bar" class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo base_url() ?>">
						<i class="fa fa-bell-o"></i>
						<span class="badge bg-warning">7</span>
					</a>
					<ul class="dropdown-menu extended notification">
						<div class="notify-arrow notify-arrow-yellow"></div>
						<li>
							<p class="yellow">You have 7 new notifications</p>
						</li>
						<li>
							<a href="<?php echo base_url() ?>">
								<span class="label label-danger"><i class="fa fa-bolt"></i></span>
								Server Overloaded.
								<span class="small italic">4 mins.</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>">
								<span class="label label-warning"><i class="fa fa-bell"></i></span>
								Memory #2 Not Responding.
								<span class="small italic">30 mins.</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>">
								<span class="label label-danger"><i class="fa fa-bolt"></i></span>
								Disk Space Reached 85%.
								<span class="small italic">2 hrs.</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>">
								<span class="label label-success"><i class="fa fa-plus"></i></span>
								New User Registered.
								<span class="small italic">3 hrs.</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>">See all notifications</a>
						</li>
					</ul>
				</li>
				<!-- notification dropdown end -->
			</ul>
			<!--  notification end -->
		</div>
		<div class="top-menu">
			<ul class="nav pull-right top-menu">
				<li><a class="logout" href="<?php echo base_url('user/logout') ?>">Logout</a></li>
			</ul>
		</div>
	</header>
	<!--header end-->
	<!-- **********************************************************************************************************************************************************
		MAIN SIDEBAR MENU
		*********************************************************************************************************************************************************** -->
	<!--sidebar start-->
	<aside>
		<div id="sidebar" class="nav-collapse ">
			<!-- sidebar menu start-->
			<ul class="sidebar-menu" id="nav-accordion">
				<p class="centered"><a href="profile.html"><img src="<?php echo base_url('assets/img/ui-sam.jpg') ?>"
																class="img-circle" width="80"></a>
				</p>
				<h5 class="centered">Sam Soffes</h5>
				<li class="mt">
					<a href="<?php echo base_url() ?>">
						<i class="fa fa-dashboard"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li class="sub-menu">
					<a href="javascript:;">
						<i class="fa fa-desktop"></i>
						<span>Category <i class="fa fa-sort-down"></i></span>
					</a>
					<ul class="sub">
						<li><a href="<?php echo base_url('/admin/create_category') ?>">Add Category</a></li>
						<li><a href="<?php echo base_url('/admin/get_category') ?>">View Category</a></li>

					</ul>
				</li>
				<li class="sub-menu">
					<a href="javascript:;">
						<i class="fa fa-desktop"></i>
						<span>Sub Category <i class="fa fa-sort-down"></i></span>
					</a>
					<ul class="sub">
						<li><a href="<?php echo base_url('/admin/create_sub_category') ?>">Add Sub Category</a></li>
						<li><a href="<?php echo base_url('/admin/get_sub_category') ?>">View Sub Category</a></li>

					</ul>
				</li>
				<li class="sub-menu">
					<a href="javascript:;">
						<i class="fa fa-desktop"></i>
						<span>Business <i class="fa fa-sort-down"></i></span>
					</a>
					<ul class="sub">
						<li><a href="<?php echo base_url('/admin/create_business') ?>">Add Business</a></li>
						<li><a href="<?php echo base_url('/admin/get_business') ?>">View Businesses</a></li>

					</ul>
				</li>
				<li class="sub-menu">
					<a href="javascript:;">
						<i class="fa fa-desktop"></i>
						<span>Products <i class="fa fa-sort-down"></i></span>
					</a>
					<ul class="sub">
						<li><a href="<?php echo base_url('/admin/create_product') ?>">Add Products</a></li>
						<li><a href="<?php echo base_url('/admin/get_product') ?>">View Products</a></li>

					</ul>
				</li>
				<li class="sub-menu">
					<a href="<?php echo base_url('/admin/get_user')?>">
						<i class="fa fa-group"></i>
						<span>Users</span>
					</a>
				</li>
			</ul>
			<!-- sidebar menu end-->
		</div>
	</aside>
	<!--sidebar end-->
