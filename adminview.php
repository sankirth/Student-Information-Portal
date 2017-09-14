<?php
    session_start();
    
    include('connection.php');
    $query="SELECT * from ruser";
    $run=mysqli_query($con,$query);
    if(!$_SESSION['logUser']){
       header("Location: admin.php"); 
    }
    else{
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
        <style>
            body {
                background: none;
            }
            
            .navbar-inverse {}

        </style>
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
                        <a class="navbar-brand" href="index.php">Home</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <ul class="nav navbar-nav">
                            <li><a href="login.php">Login<i class="fa fa-user" aria-hidden="true"></i></a></li>
                            <li><a href="reg.php">Signup<i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="admin.php">
                                    <?php echo $_SESSION['logUser']; ?><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
                            </li>
                            <li><a href="#">Notice<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a></li>
                            <li><a href="logout.php">Log out<span class="glyphicon glyphicon-log-out" aria-hidden="true"></a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </div>
        </nav>

        <table class=" well table table-striped table-hover table-bordered " style="margin-top: 140px;">
            <tr>
                <th>#</th>
                <th>FIRST NAME<i class=" glyphicon glyphicon-user " aria-hidden="true "></i></th>
                <th>LAST NAME<i class="glyphicon glyphicon-user " aria-hidden="true "></i></th>
                <th>REG NO<i class="glyphicon glyphicon-education " aria-hidden="true "></i></th>
                <th>ROLL NO<i class="glyphicon glyphicon-education " aria-hidden="true "></i></th>
                <th>EMAIL<i class="glyphicon glyphicon-envelope " aria-hidden="true "></i></th>
                <th>PASSWORD<i class="glyphicon glyphicon-lock " aria-hidden="true "></th>
                <th>PHONE<i class="glyphicon glyphicon-phone " aria-hidden="true "></i></th>
                <th>ACTIVATE<i class="glyphicon glyphicon-ok " aria-hidden="true "></i></th>
                <th>UPDATE<i class="glyphicon glyphicon-edit " aria-hidden="true "></i></th>
                <th>DELETE<i class="glyphicon glyphicon-trash " aria-hidden="true "></i></th>
                <th>IMAGE<i class="glyphicon glyphicon-picture " aria-hidden="true "></i></th>
                <th>CV<i class="fa fa-file-pdf-o " aria-hidden="true "></i></th>
                <th>REGD<i class="fa fa-calendar" aria-hidden="true"></i></th>
                <th>LUPDT<i class="fa fa-calendar-check-o" aria-hidden="true"></i></th>
            </tr>
            <?php
                    if(mysqli_num_rows($run)>0){
                        while($row=mysqli_fetch_assoc($run)){

                            echo "<tr>"; echo "
                            <td>" . $row['uid'] . "</td>
                            <td>" . $row['ufirstname'] . "</td>
                            <td>" . $row['ulastname'] . "</td>
                            <td>" . $row['uregnumber'] . "</td>
                            <td>" . $row['uroll'] . "</td>
                            <td>" . $row['uemail'] . "</td>
                            <td>" . $row['upass'] . "</td>
                            <td>" . $row['uphone'] . "</td>"; 
                            echo '<td><a href="activate.php?uid=' . $row['uid'] . '" type="button" class="btn btn-success btn-lg "><span class="glyphicon glyphicon-ok" aria-hidden="true"></a></td>
                            <td><a href="edit.php?uid=' . $row['uid'] . '" type="button" class="btn btn-warning btn-lg "><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                            <td><a href="adminview.php?uid=' . $row['uid'] . '" type="button" class="btn btn-danger btn-lg" name="delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>'; 
                            if($row['uimage']!=""){ 
                                echo"<td><img width='70' height='70' src='rimg/" . $row['uimage'] ."'></td>"; 
                            } else if($row['ugender']=="Male"){ 
                                echo"<td><img width='80' height='80' src='rimg/img.jpeg'></td>"; 
                            } else{ 
                                echo"<td><img width='80' height='80' src='rimg/female.jpg'></td>"; 
                            } 

                            
                                echo "<td><iframe height='100' width='200' src='ucv/" . $row['ucv'] . "'></iframe>" ;
                            
                                echo"</td><td>" . $row['reg_date'] . "</td><td>" . $row['last_update'] . "</td>"; echo "</tr>"; 
                        } 
                        
                    } else{ 
                        echo "<div class='alert alert-warning ' style='margin-top: 80px;'>No students!</div>"; 
                    }
            ?>
        </table>

        <?php
            if(isset($_GET['uid'])){
                $id=$_GET['uid'];
                $delete="DELETE from ruser where uid = '$id'";
                $run_delete=mysqli_query($con,$delete);
                if($run_delete){
                    echo "<script>alert('User deleted')</script>";
                    echo "<script>window.open('adminview.php','_self')</script>";
                }
                else{
                    echo "<div class='container alert alert-warning'>Something error!!</div>";
                }
            }



        ?>



            <!--        </div>-->

            <script src="js/jquery-3.2.0.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>

    </html>
    <?php } mysqli_close($con)?>
