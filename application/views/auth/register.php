<?php
/**
 * Created by PhpStorm.
 * User: thadaninilesh
 * Date: 16/1/17
 * Time: 7:54 PM
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Authentication - Library Management System</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo CSS . "bootstrap.css"; ?>" rel="stylesheet">
    <link href="<?php echo ASSET . "font-awesome/css/font-awesome.css"; ?>" rel="stylesheet">
    <script src="<?php echo JS . "jquery-1.11.3.js"; ?>"></script>
              <!-- SB Admin CSS - Include with every page -->
    <link href="<?php echo CSS . "sb-admin.css"; ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-1">
                <div class="col-lg-10 col-md-8 col-sm-10">
                    <h1 class="page-header text-center text-warning">
                        <strong>VSM: Library Management System</strong>
                    </h1>
                </div>
            </div>
            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Registration</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="/index.php/authentication/register">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control" id="name" name="name" required placeholder="Full name">
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile *</label>
                                    <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Personal mobile number" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password *</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Strong password" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email" name="email" required placeholder="Valid email address">
                                </div>

                                <div class="form-group">
                                    <label for="username">Username *</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username, to be used for login" required>
                                </div>

                                <div class="form-group">
                                    <label for="cpassword">Confirm password *</label>
                                    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm password" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" id="register" name="register" type="submit">Validate and register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="text-center">
                        <a href="/index.php/authentication/">Login?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
