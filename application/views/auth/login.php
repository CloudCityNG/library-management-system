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
                <div class="col-lg-9 col-md-8 col-sm-10">
                    <h1 class="page-header text-center text-warning">
                        <strong>VSM: Library Management System</strong>
                    </h1>
                </div>
            </div>
            <div class="col-md-offset-4 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="/index.php/authentication">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" id="username" name="username" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" id="password" name="password" type="password" required>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block" type="submit" name="login">Login</button>
                            </fieldset>
                        </form>
                    </div>
                    <div class="text-center">
                        <a href="/index.php/authentication/register">Register?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
