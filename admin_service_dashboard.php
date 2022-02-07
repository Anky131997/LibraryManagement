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
        <!-- <link rel="stylesheet" href="style.css"> -->
    </head>
    <!-- <style>
        .innerright,label {
    color: rgb(16, 170, 16);
    font-weight:bold;
}
.container,
.row,
.imglogo {
    margin:auto;
}

.innerdiv {
    text-align: center;
    /* width: 500px; */
    margin: 100px;
}
input{
    margin-left:20px;
}
.leftinnerdiv {
    float: left;
    width: 25%;
}

.rightinnerdiv {
    float: right;
    width: 75%;
}

.innerright {
    background-color: rgb(105, 221, 105);
}

.greenbtn {
    background-color: rgb(16, 170, 16);
    color: white;
    width: 95%;
    height: 40px;
    margin-top: 8px;
}

.greenbtn,
a {
    text-decoration: none;
    color: white;
    font-size: large;
}

th{
    background-color: orange;
    color: black;
}
td{
    background-color: #fed8b1;
    color: black;
}
td, a{
    color:black;
}
    </style> -->
    <body class="d-flex flex-column">

    <?php
   include("data_class.php");

$msg="";

   if(!empty($_REQUEST['msg'])){
    $msg=$_REQUEST['msg'];
 }

if($msg=="done"){
    echo "<div class='alert alert-success' role='alert'>Sucssefully Done</div>";
}
elseif($msg=="fail"){
    echo "<div class='alert alert-danger' role='alert'>Fail</div>";
}

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
                <div class="col-md-12 pt-4 mt-2 mb-4 text-center"><a href="#" class="text-light" onclick="openpart('addbook')" >Add Book</a></div>
                <div class="col-md-12 mt-2 mb-4 text-center"><a href="#" class="text-light" onclick="openpart('bookreport')" >Book Record</a></div>
                <div class="col-md-12 mt-2 mb-4 text-center"><a href="#" class="text-light" onclick="openpart('addperson')" >Add Student</a></div>
                <div class="col-md-12 mt-2 mb-4 text-center"><a href="#" class="text-light" onclick="openpart('studentrecord')" >Student Record</a></div>
                <div class="col-md-12 mt-2 mb-4 text-center"><a href="#" class="text-light" onclick="openpart('bookrequestapprove')" >Book Requests</a></div>
                <div class="col-md-12 mt-2 mb-4 text-center"><a href="#" class="text-light" onclick="openpart('issuebook')" >Issue Book</a></div>
                <div class="col-md-12 mt-2 mb-4 text-center"><a href="#" class="text-light" onclick="openpart('issuebookreport')" >Book Issue Record</a></div>
            </div>
        </div>
        <div class="container-fluid" id="content">
            <div class="row">
                    <div id="addbook" class="col-md-12 py-4 portion" style="<?php  if(!empty($_REQUEST['viewid'])){ echo "display:none";} else {echo ""; }?>">
                        <div class="card shadow-sm" style="width: 100%">
                            <div class="card-body">
                                <h5 class="card-title text-center py-3">Add Book</h5>
                                
                                    <form action="addbookserver_page.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bookname">Book Name</label>
                                                    <input type="text" name="bookname" class="form-control" id="bookname" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bookdetail">Details</label>
                                                    <input type="text" name="bookdetail" class="form-control" id="bookdetail" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bookaudor">Author</label>
                                                    <input type="text" name="bookaudor" class="form-control" id="bookaudor" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bookpub">Publication</label>
                                                    <input type="text" name="bookpub" class="form-control" id="bookpub" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="radio">Branch</label>
                                            <div id="radio">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="branch" id="BSIT" value="BSIT">
                                                    <label class="form-check-label" for="inlineRadio1">BSIT</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="branch" id="BSCS" value="BSCS">
                                                    <label class="form-check-label" for="inlineRadio2">BSCS</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="branch" id="BSSE" value="BSSE">
                                                    <label class="form-check-label" for="inlineRadio3">BSSE</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="branch" id="other" value="other">
                                                    <label class="form-check-label" for="inlineRadio3">other</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="bookprice">Price</label>
                                            <input type="number" name="bookprice" class="form-control" id="bookprice" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                            <label for="bookquantity">Quantity</label>
                                            <input type="number" name="bookquantity" class="form-control" id="bookquantity" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                            <label for="bookphoto">Book Photo</label>
                                            <input type="file" name="bookphoto" id="bookphoto" class="form-control">
                                        </div>
                                        <div class="form-group pt-3">
                                            <button type="submit" value="SUBMIT" class="btn btn-success">Submit</button>
                                        </div>
                                    </form>
                                
                            </div>
                    </div> 
                </div>
                <div id="bookreport" class="col-md-12 py-4 portion" style="display:none">
                        <div class="card shadow-sm" style="width: 100%">
                            <div class="card-body">
                                <h5 class="card-title text-center pt-3">Book Record</h5>
                                <?php
                                $u=new data;
                                $u->setconnection();
                                $u->getbook();
                                $recordset=$u->getbook();

                                $table="<table class='table'>
                                            <thead class='thead-dark'>
                                                <tr>
                                                    <th scope='col'>Book Name</th>
                                                    <th scope='col'>Price</th>
                                                    <th scope='col'>Quantity</th>
                                                    <th scope='col'>Available</th>
                                                    <th scope='col'>Rent</th>
                                                    <th scope='col'>View</th>
                                                </tr>
                                            </thead>
                                            <tbody>";
                                foreach($recordset as $row){
                                    $table.="<tr>";
                                    "<td>$row[0]</td>";
                                    $table.="<td>$row[2]</td>";
                                    $table.="<td>$row[7]</td>";
                                    $table.="<td>$row[8]</td>";
                                    $table.="<td>$row[9]</td>";
                                    $table.="<td>$row[10]</td>";
                                    $table.="<td><a href='admin_service_dashboard.php?viewid=$row[0]'><button type='button' class='btn btn-info'>View Book</button></a></td>";
                                    $table.="</tr>";
                                }
                                $table.="</tbody>
                                        </table>";

                                echo $table;
                                ?>
                            </div>
                        </div>
                </div>
                <div id="bookrequestapprove" class="col-md-12 py-4 portion" style="display:none">
                    <div class="card shadow-sm" style="width:100%">
                        <div class="card-body">
                            <h5 class="card-title text-center pt-3">Book Requests</h5>
                            <?php
                            $u=new data;
                            $u->setconnection();
                            $u->requestbookdata();
                            $recordset=$u->requestbookdata();

                            $table="<table class='table'>
                                        <thead class='thead-dark'>
                                            <tr>
                                                <th scope='col'>Person name</th>
                                                <th scope='col'>Person Type</th>
                                                <th scope='col'>Book Name</th>
                                                <th scope='col'>Days</th>
                                                <th scope='col'>Approve</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
                            foreach($recordset as $row){
                                $table.="<tr>";
                            "<td>$row[0]</td>";
                            "<td>$row[1]</td>";
                            "<td>$row[2]</td>";

                                $table.="<td>$row[3]</td>";
                                $table.="<td>$row[4]</td>";
                                $table.="<td>$row[5]</td>";
                                $table.="<td>$row[6]</td>";
                            // $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved BOOK</button></a></td>";
                                $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-info'>Approve</button></a></td>";
                                // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
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
                <div id="addperson" class="col-md-12 py-4 portion" style="display:none">
                    <div class="card shadow-sm" style="width:100%">
                        <div class="card-body">
                            <h5 class="card-title text-center py-3">Add Person</h5>
                            <form action="addpersonserver_page.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="addname">Name</label>
                                    <input type="text" name="addname" class="form-control" id="addname" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="addemail">Email</label>
                                    <input type="email" name="addemail" class="form-control" id="addemail" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="type">Choose Type</label>
                                    <select id="type" name="type" class="form-control">
                                        <option value="student">Student</option>
                                        <option value="teacher">Teacher</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="addpass">Password</label>
                                    <input type="password" name="addpass" class="form-control" id="addpass" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group pt-3">
                                    <button type="submit" value="SUBMIT" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="studentrecord" class="col-md-12 py-4 portion" style="display:none">
                    <div class="card shadow-sm" style="width:100%">
                        <div class="card-body">
                            <h5 class="card-title text-center pt-3">Student Record</h5>
                            <?php
                            $u=new data;
                            $u->setconnection();
                            $u->userdata();
                            $recordset=$u->userdata();

                            $table="<table class='table'>
                                        <thead class='thead-dark'>
                                            <tr>
                                                <th scope='col'>Name</th>
                                                <th scope='col'>Email</th>
                                                <th scope='col'>Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
                            foreach($recordset as $row){
                                $table.="<tr>";
                            "<td>$row[0]</td>";
                                $table.="<td>$row[1]</td>";
                                $table.="<td>$row[2]</td>";
                                $table.="<td>$row[4]</td>";
                                // $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'>Delete</a></td>";
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
                <div id="issuebook" class="col-md-12 py-4 portion" style="display:none">
                    <div class="card shadow-sm" style="width:100%">
                        <div class="card-body">
                            <h5 class="card-title text-center py-3">Issue Book</h5>
                            <form action="issuebook_server.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="book">Choose Type</label>
                                    <select id="book" name="book" class="form-control">
                                    <?php
                                    $u=new data;
                                    $u->setconnection();
                                    $u->getbookissue();
                                    $recordset=$u->getbookissue();
                                    foreach($recordset as $row){

                                        echo "<option value='". $row[2] ."'>" .$row[2] ."</option>";
                                
                                    }            
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="userselect">Select Student</label>
                                    <select id="userselect" name="userselect" class="form-control">
                                    <?php
                                    $u=new data;
                                    $u->setconnection();
                                    $u->userdata();
                                    $recordset=$u->userdata();
                                    foreach($recordset as $row){
                                    $id= $row[0];
                                        echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
                                    }            
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="days">Days</label>
                                    <input type="number" name="days" class="form-control" id="days" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group pt-3">
                                    <button type="submit" value="SUBMIT" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="issuebookreport" class="col-md-12 py-4 portion" style="display:none">
                    <div class="card shadow-sm" style="width:100%">
                        <div class="card-body">
                            <h5 class="card-title text-center pt-3">Book Issue Record</h5>
                            <?php
                            $u=new data;
                            $u->setconnection();
                            $u->issuereport();
                            $recordset=$u->issuereport();

                            $table="<table class='table'>
                                        <thead class='thead-dark'>
                                            <tr>
                                                <th scope='col'>Issue Name</th>
                                                <th scope='col'>Book Name</th>
                                                <th scope='col'>Issue Date</th>
                                                <th scope='col'>Return Date</th>
                                                <th scope='col'>Fine</th>
                                                <th scope='col'>Issue Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
                            foreach($recordset as $row){
                                $table.="<tr>";
                            "<td>$row[0]</td>";
                                $table.="<td>$row[2]</td>";
                                $table.="<td>$row[3]</td>";
                                $table.="<td>$row[6]</td>";
                                $table.="<td>$row[7]</td>";
                                $table.="<td>$row[8]</td>";
                                $table.="<td>$row[4]</td>";
                                // $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'>Return</a></td>";
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
                <div id="bookdetail" class="col-md-12 py-4 portion" style="<?php  if(!empty($_REQUEST['viewid'])){ $viewid=$_REQUEST['viewid'];} else {echo "display:none"; }?>">
                    <div class="card shadow-sm" style="width:100%">
                                <?php
                                $u=new data;
                                $u->setconnection();
                                $u->getbookdetail($viewid);
                                $recordset=$u->getbookdetail($viewid);
                                foreach($recordset as $row){
                                    $bookimg= $row[1];
                                     } ?>
                        <img class="card-img-top" src="uploads/<?php echo $bookimg; ?> " width=100% height=auto alt="">
                        <div class="card-body">
                            <h5 class="card-title text-center py-3">
                                <?php
                                $u=new data;
                                $u->setconnection();
                                $u->getbookdetail($viewid);
                                $recordset=$u->getbookdetail($viewid);
                                foreach($recordset as $row){
                                    $bookid= $row[0];
                                    $bookimg= $row[1];
                                    $bookname= $row[2];
                                    $bookdetail= $row[3];
                                    $bookauthor= $row[4];
                                    $bookpub= $row[5];
                                    $branch= $row[6];
                                    $bookprice= $row[7];
                                    $bookquantity= $row[8];
                                    $bookava= $row[9];
                                    $bookrent= $row[10];
                                }
                                
                                echo $bookname;
                                ?>
                            </h5>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="card-text pl-5 py-2"><strong>Branch :</strong> <?php echo $branch; ?> </p>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="card-text pl-5 py-2"><strong>Author :</strong> <?php echo $bookauthor; ?> </p>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="card-text pl-5 py-2"><strong>Publisher :</strong> <?php echo $bookpub; ?> </p>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="card-text pl-5 py-2"><strong>Details :</strong> <?php echo $bookdetail; ?> </p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="card-text pl-5 pt-4"><strong>Price :</strong> <?php echo $bookprice; ?> </p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="card-text pl-5 pt-4"><strong>Quantity :</strong> <?php echo $bookquantity; ?> </p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="card-text pl-5 pt-4"><strong>Copies Available :</strong> <?php echo $bookava; ?> </p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="card-text pl-5 pt-4"><strong>Copies Rented :</strong> <?php echo $bookrent; ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
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