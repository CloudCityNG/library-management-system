<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <!-- Core CSS - Include with every page -->

    <link rel="stylesheet" href="<?= base_url('adminlogin/css/bootstrap.css');?>">
	<link href="<?php echo CSS . "bootstrap.css"; ?>" rel="stylesheet">
	<link href="<?php echo ASSET . "font-awesome/css/font-awesome.css"; ?>" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	
    <!-- <script src="<?php echo JS . "jquery-1.11.3.js"; ?>"></script>-->
              <!-- SB Admin CSS - Include with every page -->
	<link href="<?php echo CSS . "sb-admin.css"; ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.bootstrap3.min.css">
    
</head>
<body style="font-family: sans-serif">

    <div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="col-sm-12">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?php echo PATH; ?>"><h3>VSM:Library Management System</h3></a>
            </div>
            <!-- /.navbar-header -->
<!--Search By ID-->
        <?php
            echo form_open('searchdatabase_control/find_id');
        ?>
        
        <div class="col-sm-3" style="float: right; margin: 10px auto">
            <div class="input-group custom-search-form navbar-right">
                <input type="int" name="member_id" class="form-control" placeholder="Search By Member ID only!" style="height: 30px">
                    <span class="input-group-btn" name="id_search">
                        <button class="btn btn-primary" type="submit" name="id_search" style="height: 28px">
                            <i class="fa fa-search" name="id_search"></i>
                        </button>
                    </span>
            </div>
            <div>
                <?php
                $str = "Advanced Search";
                echo anchor("searchdatabase_control/find_members",$str); ?>
            </>
             </div>

            <?php
                echo form_close();
            ?>
		</div>

		<!--Search By ID ends-->
		</nav>
    </div>

    <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> Member<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
								<?php echo anchor('member/add_member','<i class="fa fa-user fa-fw"></i>Add Member');		 ?>
                            </li>
                            <li>
                                <?php echo anchor('member/view_member','<i class="fa fa-list fa-fw"></i>Active Members List') ?>
                            </li>
                            <li>
                                <?php echo anchor('searchdatabase_control/find_members', '<i class="fa fa-search fa-fw"></i>Search Member') ?>
                            </li>
                        </ul>
                     	   <!-- /.nav-second-level -->
                    </li>
                    <li>
						<a href="#"><i class="fa fa-book fa-fw"></i> Book<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li>
								<?php echo anchor('book/index','<i class="fa fa-book fa-fw"></i>Add Book');		 ?>
							</li>
							<li>
								<?php echo anchor('book/add_novel','<i class="fa fa-book fa-fw"></i>Add Novel');		 ?>
							</li>
							<li>
								<?php echo anchor('book/add_magazine','<i class="fa fa-book fa-fw"></i>Add Magazine');		 ?>
							</li>
							<li>
								<?php echo anchor('book/view_book','<i class="fa fa-list fa-fw"></i>Books List') ?>
							</li>
							<li>
								<?php echo anchor('searchdatabase_control/find_book', '<i class="fa fa-search fa-fw"></i>Search Book') ?>
							</li>
						</ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-money fa-fw"></i> Fees and Deposits<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo PATH.'fee/addFee';?>">Add Fees</a>
                            </li>
                            <li>
                                <a href="<?php echo PATH.'fee/viewActiveFee'; ?>">Active Fee History</a>
                            </li>
                            <li>
                                <a href="<?php echo PATH.'fee/viewDeadFee'; ?>">Dead Fee History</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cogs fa-fw"></i> Manage Deposits<span class="fa arrow"><span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo URL. 'index.php/deposit/addDeposit'; ?>">Add Deposit</a>
                            </li>
                            <li>
                                <a href="<?php echo PATH.'deposit/viewActiveDeposit'; ?>">Active Deposit History</a>
                            </li>
                            <li>
                                <a href="<?php echo PATH.'deposit/viewReturnedDeposit'; ?>">Returned History</a>
                            </li>
                        </ul>
                        <!-- /.nav-third-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cogs fa-fw"></i> Transactions<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo URL. 'index.php/transaction/issueBook'; ?>">Issue Book</a>
                            </li>
                            <li>
                                <a href="<?php echo PATH.'transaction/returnBook'; ?>">Return Book</a>
                            </li>
                            <li>
                                <a href="<?php echo PATH.'transaction/transactionHistory'; ?>">Transaction History</a>
                            </li>
                        </ul>
                        <!-- /.nav-third-level -->
                    </li>
                    <li>
                        <a href="<?php echo PATH.'setting/'; ?>"><i class="fa fa-gear"></i> Settings</a>
                    </li>
                    <li>
                        <a href="<?php echo PATH.'authentication/logout'?>"><button class="btn btn-danger">Logout</button></a>
                    </li>
                </ul>
                        <!-- /.nav-second-level -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
