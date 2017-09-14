<?php 
        session_start();
        if(!$_SESSION['loginEmail']){
       header("Location: login.php"); 
    } else{
//            include('include.php');
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Profile</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <!--    <link rel="stylesheet" href="bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.css">-->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery-3.2.0.js"></script>
    <!--    <script src="js/script.js"></script>-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                        <li><a href="reg.php">Signup<i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#">Notice<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> </a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#"><?php echo $_SESSION['loginUser']. ' '. $_SESSION['loginLuser'];?><i class="fa fa-user" aria-hidden="true"></i></a></li>
                        <li><a href="logout.php">Log Out<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
                        
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad"  style="
    margin-left: 174px;">


                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <marquee BEHAVIOR=ALTERNATE>
                                <?php echo $_SESSION['loginUser']. ' '. $_SESSION['loginLuser'];?>
                            </marquee>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 col-lg-4 " align="center">
                                <img alt="User Pic" src="rimg/<?php if($_SESSION['loginPic'] != ""){echo $_SESSION['loginPic'];}else if($_SESSION['loginGender'] == "Male"){echo "img.jpeg ";} else echo "female.jpg "   ?>" class="img-circle img-responsive">
                                <?php echo $_SESSION['loginUser']. ' '. $_SESSION['loginLuser'];?>
                            </div>

                            <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                            <div class=" col-md-8 col-lg-8 ">
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>Department:</td>
                                            <td>
                                                <?php echo $_SESSION['loginDept'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Registration Number:</td>
                                            <td>
                                                <?php echo $_SESSION['loginRegNo'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Roll Number:</td>
                                            <td>
                                                <?php echo $_SESSION['loginRoll'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>CGPA:</td>
                                            <td>
                                                <?php echo $_SESSION['loginCgpa'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>XII Marks:</td>
                                            <td>
                                                <?php echo $_SESSION['loginTwelve'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>X Marks:</td>
                                            <td>
                                                <?php echo $_SESSION['loginTen'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Date of Birth</td>
                                            <td>
                                                <?php echo $_SESSION['loginDb'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Age:</td>
                                            <td>
                                                <?php echo $_SESSION['loginAge'];?>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td>Gender</td>
                                            <td>
                                                <?php echo $_SESSION['loginGender'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Address:</td>
                                            <td>
                                                <?php echo $_SESSION['loginAdd']. ', '. $_SESSION['loginCity']. ', '. $_SESSION['loginState']. ', '. $_SESSION['loginCountry']. ', '. $_SESSION['loginZip'];?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>
                                                <a href="mailto:<?php echo $_SESSION['loginEmail'];?>">
                                                    <?php echo $_SESSION['loginEmail'];?>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Phone Number</td>
                                            <td>
                                                <?php echo $_SESSION['loginPhn'];?>(Mobile)
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>About</td>
                                            <td>
                                                <?php echo $_SESSION['loginComment'];?>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>CV</td>
                                            <td>
                                                <iframe height='100' width='300' src='ucv/<?php echo $_SESSION['loginCv']; ?>'></iframe>
                                            </td>

                                        </tr>

                                    </tbody>
                                </table>

                                <!--
                                <a href="#" class="btn btn-primary">My Sales Performance</a>
                                <a href="#" class="btn btn-primary">Team Sales Performance</a>
-->
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a href="std.php?uid=<?php echo $_SESSION['loginId'];?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-md btn-warning"><i class="glyphicon glyphicon-edit"></i>Update Info</a>
                        <span class="pull-right">
                            
                            <a  href="logout.php" data-original-title="Logout" data-toggle="tooltip" type="button" class="btn btn-md btn-danger"><i class="glyphicon glyphicon-log-out">Logout</i></a>
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery-3.2.0.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
<?php }?>
