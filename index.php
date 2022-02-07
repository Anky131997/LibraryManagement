<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login Form</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/custom.css">
    </head>
    
    <body style="background-color:#64b5f6;">

<?php
 $emailmsg="";
 $pasdmsg="";
 $msg="";

 $ademailmsg="";
 $adpasdmsg="";


 if(!empty($_REQUEST['ademailmsg'])){
    $ademailmsg=$_REQUEST['ademailmsg'];
 }

 if(!empty($_REQUEST['adpasdmsg'])){
    $adpasdmsg=$_REQUEST['adpasdmsg'];
 }

 if(!empty($_REQUEST['emailmsg'])){
    $emailmsg=$_REQUEST['emailmsg'];
 }

 if(!empty($_REQUEST['pasdmsg'])){
  $pasdmsg=$_REQUEST['pasdmsg'];
}

if(!empty($_REQUEST['msg'])){
    $msg=$_REQUEST['msg'];
 }

 ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4><?php echo $msg?></h4>
                <h1 class="text-center text-light py-5">Digital Library</h1>
            </div>
            <div class="col-md-12">
                <div class="card shadow-sm" id="loginPage">
                    <div class="card-body">
                        <ul class="nav nav-pills login" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" href="#user">User Login</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="#admin">Admin Login</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="user">
                                <div class="row">
                                    <div class="col-md-12 py-3">
                                        <h3 class="py-2">User Login</h3>
                                        <form action="login_server_page.php" method="get">
                                            <div class="form-group">
                                                <Label for="email">Email ID<?php echo $emailmsg?></label>
                                                <input type="text" id="email" class="form-control" name="login_email" placeholder="Your Email *" value="" />
                                            </div>
                                            <div class="form-group">
                                                <Label for="password">Password<?php echo $pasdmsg?></label>
                                                <input type="password" id="password" class="form-control" name="login_pasword"  placeholder="Your Password *" value="" />
                                            </div>
                                            <div class="form-group pt-3">
                                                <input type="submit" class="btnSubmit btn btn-info" value="Login" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="admin">
                                <div class="row">
                                    <div class="col-md-12 py-3">
                                        <h3 class="py-2">Admin Login</h3>
                                        <form action="loginadmin_server_page.php" method="get">
                                            <div class="form-group">
                                                <Label for="email">Email ID<?php echo $ademailmsg?></label>
                                                <input type="text" id="email" class="form-control" name="login_email" placeholder="Your Email *" value="" />
                                            </div>
                                            <div class="form-group">
                                                <Label for="password">Password<?php echo $adpasdmsg?></label>
                                                <input type="password" id="password" class="form-control" name="login_pasword"  placeholder="Your Password *" value="" />
                                            </div>
                                            <div class="form-group pt-3">
                                                <input type="submit" class="btnSubmit btn btn-info" value="Login" />
                                            </div>
                                            <div class="form-group">

                                                <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
            $(".login a").click(function(){
                $(this).tab('show');
            });
            });
        </script>
    </body>
</html>