<?php

session_start();

$userloginid=$_SESSION["userid"] = $_GET['userlogid'];
// echo $_SESSION["userid"];


?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="js/custom.js"></script>
      <link rel="stylesheet" href="css/custom.css">
    </head>

    <body>

    <?php
   include("data_class.php");
    ?>
        <nav id="nav" class="navbar navbar-expand-lg navbar-dark bg-info">
            <button id="sidebarCollapse" class="btn btn-outline-light btn-sm ml-3" ><i class="bi bi-list"></i></button>
            <a class="navbar-brand ml-4" href="#"><strong>Digital Library</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active" aria-current="page">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="sidebar" class="shadow" style="background-color:#4085c9;">
            <div class="row">
                <div class="col-md-12 pt-4 mt-2 mb-4 text-center"><a href="#" class="text-light" onclick="openpart('myaccount')" >My Account</a></div>
                <div class="col-md-12 mt-2 mb-4 text-center"><a href="#" class="text-light" onclick="openpart('requestbook')" >Request Book</a></div>
                <div class="col-md-12 mt-2 mb-4 text-center"><a href="#" class="text-light" onclick="openpart('issuereport')" >Rented Books</a></div>
            </div>
        </div>
        <div class="container-fluid" id="content">
            <div class="row">
                <div id="return" class="col-md-12 py-4 portion" style="<?php  if(!empty($_REQUEST['returnid'])){ $returnid=$_REQUEST['returnid'];} else {echo "display:none"; }?>">
                    <div class="card shadow-sm" style="width: 100%">
                        <div class="card-body">
                        <?php
                        $u=new data;
                        $u->setconnection();
                        $u->returnbook($returnid);
                        $recordset=$u->returnbook($returnid);
                        
                        ?>
                        <h5 class="card-title text-center pt-3">Successfully requested the book. Please wait for the Admin to appove your request.</h5>
                        </div>
                    </div>
                </div>
                <div id="myaccount" class="col-md-12 py-4 portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo ""; }?>">
                    <div class="card shadow-sm" style="width: 100%">
                        <div class="card-body">
                        <?php
                        $u=new data;
                        $u->setconnection();
                        $u->userdetail($userloginid);
                        $recordset=$u->userdetail($userloginid);
                        foreach($recordset as $row){

                        $id= $row[0];
                        $name= $row[1];
                        $email= $row[2];
                        $pass= $row[3];
                        $type= $row[4];
                        }
                        ?>
                            <h3 class="card-title text-center pb-3">Welcome back <?php echo ucfirst($name); ?></h3>
                            <div class="row">
                                <div class="col-md-6 pt-3">
                                    <p class="card-text pl-5 py-2"><strong>Email Address :</strong> <?php echo $email; ?></p>
                                </div>
                                <div class="col-md-6 pt-3">
                                    <p class="card-text pl-5 py-2"><strong>Account Type :</strong> <?php echo $type; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
                <div id="issuereport" class="col-md-12 py-4 portion" style="display:none">
                    <div class="card shadow-sm" style="width:100%">
                        <div class="card-body">
                            <h5 class="card-title text-center pt-3">Rented Books</h5>
                            <?php
                            $userloginid=$_SESSION["userid"] = $_GET['userlogid'];
                            $u=new data;
                            $u->setconnection();
                            $u->getissuebook($userloginid);
                            $recordset=$u->getissuebook($userloginid);

                            $table="<table class='table'>
                                        <thead class='thead-dark'>
                                            <tr>
                                                <th scope='col'>Book Name</th>
                                                <th scope='col'>Issue Date</th>
                                                <th scope='col'>Return Date</th>
                                                <th scope='col'>Fine</th>
                                                <th scope='col'>Return</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
                            foreach($recordset as $row){
                                $table.="<tr>";
                                "<td>$row[0]</td>";
                                $table.="<td>$row[3]</td>";
                                $table.="<td>$row[6]</td>";
                                $table.="<td>$row[7]</td>";
                                $table.="<td>$row[8]</td>";
                                $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'><button type='button' class='btn btn-info'>Return</button></a></td>";
                                $table.="</tr>";
                                // $table.=$row[0];
                            }
                            $table.="</tbody>
                                    </table>";

                            echo $table;
                            ?>
                        </div>
                    </div>
                </div>
                <div id="requestbook" class="col-md-12 py-4 portion" style="display:none">
                    <div class="card shadow-sm" style="width:100%">
                        <div class="card-body">
                            <h5 class="card-title text-center pt-3">Request Books</h5>
                            <?php
                            $u=new data;
                            $u->setconnection();
                            $u->getbookissue();
                            $recordset=$u->getbookissue();

                            $table="<table class='table'>
                                        <thead class='thead-dark'>
                                            <tr>
                                                <th scope='col'>Image</th>
                                                <th scope='col'>Book Name</th>
                                                <th scope='col'>Book Author</th>
                                                <th scope='col'>Branch</th>
                                                <th scope='col'>Price</th>
                                                <th scope='col'>Request Book</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
                            foreach($recordset as $row){
                                $table.="<tr>";
                                "<td>$row[0]</td>";
                                $table.="<td><img src='uploads/$row[1]' width='100px' height='100px' style='border:1px solid #333333;'></td>";
                                $table.="<td>$row[2]</td>";
                                $table.="<td>$row[4]</td>";
                                $table.="<td>$row[6]</td>";
                                $table.="<td>$row[7]</td>";
                                $table.="<td><a href='requestbook.php?bookid=$row[0]&userid=$userloginid'><button type='button' class='btn btn-info'>Request Book</button></a></td>";
                        
                                $table.="</tr>";
                                // $table.=$row[0];
                            }
                            $table.="</tbody>
                                    </table>";

                            echo $table;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           <div class="container">
            <div class="leftinnerdiv">
                <Button class="greenbtn" >Welcome</Button>
                <Button class="greenbtn" onclick="openpart('myaccount')"> My Account</Button>
                <Button class="greenbtn" onclick="openpart('requestbook')"> Request Book</Button>
                <Button class="greenbtn" onclick="openpart('issuereport')"> Book Report</Button>
                <a href="index.php"><Button class="greenbtn" > LOGOUT</Button></a>
            </div>


            <div class="rightinnerdiv">   
            <div id="issuereport" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo "display:none"; }?>">
            <Button class="greenbtn" >ISSUE RECORD</Button>

            <?php

            $userloginid=$_SESSION["userid"] = $_GET['userlogid'];
            $u=new data;
            $u->setconnection();
            $u->getissuebook($userloginid);
            $recordset=$u->getissuebook($userloginid);

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Return</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'><button type='button' class='btn btn-primary'>Return</button></a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>


            <div class="rightinnerdiv">   
            <div id="requestbook" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ $returnid=$_REQUEST['returnid'];echo "display:none";} else {echo "display:none"; }?>">
            <Button class="greenbtn" >Request Book</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->getbookissue();
            $recordset=$u->getbookissue();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr>
            <th>Image</th><th>Book Name</th><th>Book Authour</th><th>branch</th><th>price</th></th><th>Request Book</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
               $table.="<td><img src='uploads/$row[1]' width='100px' height='100px' style='border:1px solid #333333;'></td>";
               $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td><a href='requestbook.php?bookid=$row[0]&userid=$userloginid'><button type='button' class='btn btn-primary'>Request Book</button></a></td>";
           
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;


                ?>

            </div>
            </div>

        </div>
        </div>


        <script>
        function openpart(portion) {
        var i;
        var x = document.getElementsByClassName("portion");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        document.getElementById(portion).style.display = "block";  
        }

   
 
        
        </script>
    </body>
</html>