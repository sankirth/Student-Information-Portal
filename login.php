<?php 
    include('include.php');
    if(isset($_POST['submit'])){
        function validateFormData( $formData){
            $formData = trim( stripslashes( htmlspecialchars($formData) ) );
            return $formData;
        }
        $formEmail = validateFormData( $_POST['uemail']);
        $formPass = validateFormData( $_POST['upassword']);
        include( 'connection.php');
        $query="SELECT * FROM ruser WHERE uemail='$formEmail' ";
        $result= mysqli_query($con, $query);
        
        if( mysqli_num_rows($result) > 0){
            
            while($row = mysqli_fetch_assoc($result) ){
                $id = $row['uid'];
                $fn = $row['ufirstname'];
                $ln = $row['ulastname'];
                $db = $row['udob'];
                $age = $row['uage'];
                $em= $row['uemail'];
                $pw= $row['upass'];
                $phn= $row['uphone'];
                $add= $row['uaddress'];
                $city = $row['ucity'];
                $state = $row['ustate'];
                $cntry = $row['ucountry'];
                $zip = $row['uzip'];
                $blg= $row['ublog'];
                $gndr= $row['ugender'];
                $cmnt= $row['ucomment'];
                $regn= $row['uregnumber'];
                $dept= $row['udepartment'];
                $roll= $row['uroll'];
                $cgpa= $row['ucgpa'];
                $twelve= $row['utwelve'];
                $ten= $row['uten'];
                $cv= $row['ucv'];
                $uimg= $row['uimage'];
            }
            if( $formPass == $pw ){
            session_start();
            $_SESSION['loginId']=$id;
            $_SESSION['loginUser']=$fn;
            $_SESSION['loginLuser']=$ln;
            $_SESSION['loginDb']=$db;
            $_SESSION['loginAge']=$age;
            $_SESSION['loginEmail']=$em;
            $_SESSION['loginPhn']=$phn;
            $_SESSION['loginAdd']=$add;
            $_SESSION['loginCity']=$city;
            $_SESSION['loginState']=$state;
            $_SESSION['loginCountry']=$cntry;
            $_SESSION['loginZip']=$zip;
            $_SESSION['loginBlg']=$blg;
            $_SESSION['loginGender']=$gndr;
            $_SESSION['loginComment']=$cmnt;
            $_SESSION['loginRegNo']=$regn;
            $_SESSION['loginDept']=$dept;
            $_SESSION['loginRoll']=$roll;
            $_SESSION['loginCgpa']=$cgpa;
            $_SESSION['loginTwelve']=$twelve;
            $_SESSION['loginTen']=$ten;
            $_SESSION['loginCv']=$cv;
            $_SESSION['loginPic']=$uimg;
            header("Location: student.php");
            } else{
                $loginError="<div class='alert alert-danger'>Wrong username / passwordr<a class='close' data-dismiss='alert'>&times;</a></div>";
            }
        } else {
            $loginError="<div class='alert alert-danger'>No such user<a class='close' data-dismiss='alert'>&times;</a></div>";
        }
        mysqli_close($con);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Student Login</title>

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
    <script type="text/javascript">
        function validateEmail() {
            var email = document.getElementById("uemail").value;
            if (email.length == 0) {
                productPrompt("Please supply your email address", "uemailPrompt", "red");
                return false;
            }
            if (!email.match(/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i)) {
                productPrompt("Please supply a valid email address", "uemailPrompt", "red");
                return false;
            }
            productPrompt("Ok", "uemailPrompt", "green");
            return true;
        }

        function Pass() {
            var pass = document.getElementById("password").value;
            if (pass.length == 0) {
                productPrompt("Please supply your password", "passwordPrompt", "red");
                return false;
            }
            productPrompt("Ok", "passwordPrompt", "green");
            return true;
        }

        function submitForm() {
            if (!validateEmail() && !Pass()) {
                errorShow("submitPrompt");
                productPrompt("Please all the field", "submitPrompt", "red");
                setTimeout(function() {
                    errorHide("submitPrompt");
                }, 2000);
            }
        }

        function errorShow(id) {
            document.getElementById(id).style.display = "block";

        }

        function errorHide(id) {
            document.getElementById(id).style.display = "none";
        }

    </script>
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
                        <li ><a href="admin.php">Admin<span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
                        <li><a href="#">Notice<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> </a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="login.php">Login<i class="fa fa-user" aria-hidden="true"></i></a></li>
                        <li><a href="reg.php">Signup<i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </nav>
    <div class="container" id="asb">
        <?php echo $loginError; ?>
        <form class="well tir form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" id="registration_form">
            <fieldset>
                <legend>
                    <h3>Student Login</h3>
                </legend>
                <p><a href="reg.php">Need an account? Register!</a></p>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">E-Mail</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input name="uemail" id="uemail" onkeyup="validateEmail()" onkeydown="validateEmail()" placeholder="E-Mail Address" class="form-control" type="text">
                        </div>
                        <small id="uemailPrompt"></small>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Password</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input name="upassword" id="password" onkeyup="Pass()" onkeydown="Pass()" placeholder="Password" class="form-control" type="password">
                        </div>
                        <small id="passwordPrompt"></small>
                    </div>
                </div>

                <!-- Button -->

                <div class="form-group">

                    <label class="col-md-4 control-label"></label> &nbsp; &nbsp;&nbsp;
                    <div class="col-md-4">
                        <button type="submit" id="submit" name="submit" class="btn btn-danger col-md-12 btn-lg " onclick="submitForm()">Login<span class="glyphicon glyphicon-send"></span></button>
                        <small id="submitPrompt"></small>
                    </div>

                </div>
            </fieldset>
        </form>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery-3.2.0.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
