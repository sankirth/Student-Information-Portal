<?php
    session_start();
    $id=$_GET['uid'];
    include('connection.php');
    $query="SELECT * from ruser where uid='$id'"; 
    $run=mysqli_query($con,$query);
    if(!$_SESSION['loginEmail']){
        header("Location: index.php");  
    }
    
    else{
    if(mysqli_num_rows($run)>0){
         while($row=mysqli_fetch_assoc($run)){
            $id                =$row['uid'];
            $ufirstname         =$row['ufirstname'];
            $ulastname          =$row['ulastname'];
            $udob               =$row['udob'];
            $uage               =$row['uage'];
            $uemail             =$row['uemail'];
            $upass              =$row['upass'];
            $uphone             =$row['uphone'];
            $uaddress           =$row['uaddress'];
            $ucity              =$row['ucity'];
            $ustate             =$row['ustate'];
            $ucountry           =$row['ucountry']; 
            $uzip               =$row['uzip']; 
            $ublog              =$row['ublog']; 
            $ugender            =$row['ugender'];
            $ucomment           =$row['ucomment']; 
            $uregnumber         =$row['uregnumber'];
            $udepartment        =$row['udepartment'];
            $uroll              =$row['uroll'];
            $ucgpa              =$row['ucgpa'];
            $utwelve            =$row['utwelve'];
            $uten               =$row['uten'];
            $uimage             =$row['uimage'];
            $ucv                =$row['ucv'];
        }}
        else{
            echo "<div class='container alert alert-warning'>Nothing!!</div>";
        }
       if(isset($_POST['submit'])){
            $ufirstname=mysqli_real_escape_string($con,$_POST['first_name']);
            $ulastname=mysqli_real_escape_string($con,$_POST['last_name']);
            $udob=mysqli_real_escape_string($con,$_POST['udob']);
            $uage=mysqli_real_escape_string($con,$_POST['uage']);
//            $uemail=mysqli_real_escape_string($con,$_POST['uemail']);
            $upass=mysqli_real_escape_string($con,$_POST['upassword']);
            $uphone=mysqli_real_escape_string($con,$_POST['uphn']);
            $uaddress=mysqli_real_escape_string($con,$_POST['uaddress']);
            $ucity=mysqli_real_escape_string($con,$_POST['ucity']);
            $ustate=mysqli_real_escape_string($con,$_POST['ustate']);
            $ucountry=mysqli_real_escape_string($con,$_POST['ucountry']);
            $uzip=mysqli_real_escape_string($con,$_POST['uzip']);
            $ublog=mysqli_real_escape_string($con,$_POST['website']);
            $ugender=mysqli_real_escape_string($con,$_POST['gender']);
            $ucomment=mysqli_real_escape_string($con,$_POST['comment']);
//            $uregnumber=mysqli_real_escape_string($con,$_POST['uregnumber']);
//            $udepartment=mysqli_real_escape_string($con,$_POST['udepartment']);
//            $uroll=mysqli_real_escape_string($con,$_POST['uroll']);
            $ucgpa=mysqli_real_escape_string($con,$_POST['ucgpa']);
            $utwelve=mysqli_real_escape_string($con,$_POST['utwelve']);
            $uten=mysqli_real_escape_string($con,$_POST['uten']);
           
           $insert="UPDATE ruser SET  
               
               ufirstname='$ufirstname',
               ulastname='$ulastname', 
               udob='$udob', 
               uage='$uage',  
               upass='$upass', 
               uphone='$uphone', 
               uaddress='$uaddress', 
               ucity='$ucity', 
               ustate='$ustate', 
               ucountry='$ucountry', 
               uzip='$uzip', 
               ublog='$ublog',
               ugender='$ugender', 
               ucomment='$ucomment', 
               uregnumber='$uregnumber', 
               udepartment='$udepartment', 
               uroll='$uroll',
               ucgpa='$ucgpa', 
               utwelve='$utwelve', 
               uten= '$uten',
               uimage='$uimage',
               last_update=NOW() WHERE uid='$id'"; 
                $query =mysqli_query($con,$insert);
                echo $query;
                if( $query ){
                    if( isset( $_COOKIE[ session_name() ])){
                            setcookie( session_name(), '', time()-86400, '/'); 
                    }
                    header("Location: student.php");
                    
                }
           else{
               echo "Error : ". mysqli_error($con);
           }       
       } 

    }
?>


    <!---->

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Update Profile</title>

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
        <!--    <link rel="stylesheet" href="bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.css">-->
        <link rel="stylesheet" href="Zebra_Datepicker-master/public/css/bootstrap.css">
        <link rel="stylesheet" href="Zebra_Datepicker-master/public/css/default.css">
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
        <nav class="navbar navbar-inverse">
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
                            <li><a href="admin.php">Admin<span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
                            <li><a href="#">Notice<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active">
                                <a href="#">
                                    <?php echo $_SESSION['loginUser']. ' '. $_SESSION['loginLuser'];?><i class="fa fa-user" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="logout.php">Log Out<i class="glyphicon glyphicon-log-out" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </div>
        </nav>

        <div class="container">
            <form class="well form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?uid=<?php echo $id ; ?>" enctype="multipart/form-data" id="registration_form">
                <fieldset>
                    <legend>
                        <h4>UPDATE</h4>
                    </legend>
                    <fieldset>

                        <!-- Form Name -->
                        <legend id="reg">Personal Info</legend>

                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">First Name</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="first_name" id="first_name" onkeyup="validateFirstName()" onkeydown="validateFirstName()" value="<?php echo $ufirstname ?>" placeholder="First Name" class="form-control" type="text">
                                </div>
                                <small id="ufirstnamePrompt"></small>
                            </div>
                        </div>

                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Last Name</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="last_name" id="last_name" onkeyup="validateLastName()" onkeydown="validateLastName()" value="<?php echo $ulastname ?>" placeholder="Last Name" class="form-control" type="text">
                                </div>
                                <small id="ulastnamePrompt"></small>
                            </div>
                        </div>

                        <!-- Text input-->


                        <div class="form-group">
                            <label class="col-md-4 control-label">Date Of Birth</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i></span>
                                    <input name="udob" id="udob" onchange="validateDob()" onfocus="validateDob()" value="<?php echo $udob ?>" readonly placeholder="Date of birth" class="form-control" type="text">
                                </div>
                                <small id="udobPrompt"></small>
                            </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Age</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                    <input name="uage" id="uage" onclick="ageCalculate()" onchange="validateDob()" onfocus="ageCalculate()" onkeyup="ageCalculate()" onkeydown="ageCalculate()" placeholder="Age" class="form-control" type="text" value="<?php echo $uage ?>" readonly>
                                </div>
                                <small id="uagePrompt"></small>
                            </div>
                        </div>


                        <!--                     Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input name="uemail" id="uemail" onkeyup="validateEmail()" onkeydown="validateEmail()" value="<?php echo $uemail ?>" placeholder="E-Mail Address" class="form-control" type="text" disabled>
                                </div>
                                <small id="uemailPrompt"></small>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input name="upassword" id="password" onkeyup="validatePass()" onkeydown="validatePass()" value="<?php echo $upass ?>" placeholder="Password" class="form-control" type="password">
                                </div>
                                <small id="passwordPrompt"></small>
                            </div>
                        </div>

                        <!-- Text input-->
                        <!--
                        <div class="form-group">
                            <label class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="confirm_password" onkeyup="validatePassword()" onkeydown="validatePassword()" name="repeatpassword" placeholder="Re-enter Password" class="form-control" type="password">
                                </div>
                                <small id="repasswordPrompt"></small>
                            </div>
                        </div>
-->


                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Phone #</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                    <input name="uphn" id="uphn" onkeyup="validatePhn()" onkeydown="validatePhn()" value="<?php echo $uphone ?>" maxlength="10" placeholder="(845)555-1212" class="form-control" type="text">
                                </div>
                                <small id="uphnPrompt"></small>
                            </div>
                        </div>

                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Address</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <input id="uaddress" onkeyup="validateAdd()" onkeydown="validateAdd()" name="uaddress" value="<?php echo $uaddress ?>" placeholder="Address" class="form-control" type="text">
                                </div>
                                <small id="uaddressPrompt"></small>
                            </div>
                        </div>

                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">City</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <input name="ucity" id="ucity" onkeyup="validateCity()" onkeydown="validateCity()" value="<?php echo $ucity ?>" placeholder="City" class="form-control" type="text">
                                </div>
                                <small id="ucityPrompt"></small>
                            </div>
                        </div>

                        <!-- Select Basic -->

                        <div class="form-group">
                            <label class="col-md-4 control-label">State</label>
                            <div class="col-md-4 selectContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                    <select class="form-control selectpicker" id="ustate" onchange="validateState()" name="ustate" required>
                                                <option  ><?php echo $ustate ?></option>
                                                <option value=" " >Please select your state</option>
                                                <option>West Bengal</option>
                                                <option>Delhi</option>
                                                <option>Maharastra</option>
                                                <option>Bihar</option>
                                </select>
                                </div>
                                <small id="ustatePrompt"></small>
                            </div>
                        </div>


                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Country</label>
                            <div class="col-md-4 selectContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                    <select name="ucountry" id="ucountry" onchange="validateCountry()" required class="form-control selectpicker">
                                              <option ><?php echo $ucountry ?></option>
                                              <option value=" " >Please select your Country</option>
                                              <option>INDIA</option>
                                              <option>USA</option>
                                              <option>UK</option>
                                              <option>JAPAN</option>
                                </select>
                                </div>
                                <small id="ucountryPrompt"></small>
                            </div>
                        </div>

                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Zip Code</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <input name="uzip" id="uzip" onkeyup="validateZip()" onkeydown="validateZip()" value="<?php echo $uzip ?>" placeholder="Zip Code" class="form-control" type="text">
                                </div>
                                <small id="uzipPrompt"></small>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Blog address</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                    <input name="website" placeholder="Blog address" value="<?php echo $ublog ?>" class="form-control" type="text">
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-xs-4 control-label">Gender</label>
                            <div class="col-xs-4">
                                <div class="input-group">
                                    <label class="radio-inline"><input type="radio" name="gender" id="male" value="Male" onmouseleave="validateGender()" required>Male<i class="fa fa-male" aria-hidden="true"></i></label>&nbsp;&nbsp;&nbsp;
                                    <label class="radio-inline"><input type="radio" name="gender" id="female" value="Female" onmouseleave="validateGender()" required>Female<i class="fa fa-female" aria-hidden="true"></i></label>
                                </div>
                                <small id="ugenderPrompt"> </small>
                            </div>
                        </div>



                        <!-- Text area -->

                        <div class="form-group">
                            <label class="col-md-4 control-label">About Yourself</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                    <textarea class="form-control" name="comment"><?php echo $ucomment ?></textarea>
                                </div>
                            </div>
                        </div>



                    </fieldset>
                    <fieldset>
                        <legend id="reg">Academic Info</legend>

                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Registration Number</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                                    <input name="uregnumber" id="uregnumber" value="<?php echo $uregnumber ?>" placeholder="Registration Number" class="form-control" type="text" maxlength="8" disabled>
                                </div>
                                <small id="uregPrompt"> </small>
                            </div>
                        </div>

                        <!-- Select Basic -->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Department</label>
                            <div class="col-md-4 selectContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                                    <select name="udepartment" id="udepartment" class="form-control selectpicker" onchange="validateDepartment()" required disabled>
                                    <option ><?php echo $udepartment ?></option>
    
                                    </select>
                                </div>
                                <small id="udeptPrompt"> </small>
                            </div>
                        </div>

                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Roll Number</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                                    <input name="uroll" id="uroll" placeholder="Roll Number" class="form-control" type="text" onclick="validateRoll()" onfocus="Roll()" onkeyup="validateRoll()" onkeydown="validateRoll()" value="<?php echo $uroll ?>" disabled>
                                </div>
                                <small id="urollPrompt"> </small>
                            </div>
                        </div>

                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">CGPA</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                                    <input name="ucgpa" id="ucgpa" placeholder="CGPA" class="form-control" onkeyup="validateCgpa()" onkeydown="validateCgpa()" value="<?php echo $ucgpa ?>" type="text">
                                </div>
                                <small id="ucgpaPrompt"> </small>
                            </div>
                        </div>


                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">12th Marks</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                                    <input name="utwelve" id="utwelve" placeholder="12th Marks" class="form-control" onkeyup="validateTwelve()" onkeydown="validateTwelve()" value="<?php echo $utwelve ?>" type="text">
                                </div>
                                <small id="utwelvePrompt"> </small>
                            </div>
                        </div>


                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">10th Marks</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
                                    <input name="uten" id="uten" placeholder="10th Marks" class="form-control" onkeyup="validateTen()" onkeydown="validateTen()" value="<?php echo $uten ?>" type="text">
                                </div>
                                <small id="utenPrompt"> </small>
                            </div>
                        </div>



                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">CV/Resume</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <div class="uploadBtn"><input type="file" name="ucv" id="ucv" accept="application/msword,image/jpeg,application/pdf"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Images</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <div class="uploadBtn"><input type="file" name="ui" id="ui" accept="application/msword,image/jpeg,application/pdf">
                                        <div id="image-holder">
                                            <img src="rimg/<?php echo $uimage ?>" style="width: 50px;height: 50px;margin-left:134px;" alt="Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="submit" class="btn btn-warning col-md-12" onclick="submitForm()">Update <span class="glyphicon glyphicon-send"></span></button>
                                <small id="submitPrompt"></small>
                            </div>

                        </div>
                    </fieldset>
                </fieldset>
            </form>


        </div>
        <!-- /.container -->




        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/jquery-3.2.0.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!--    <script src="js/bootstrapValidator.js"></script>-->
        <!--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.10.2/validator.min.js"></script>
-->
        <!--    <script src="bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.js"></script>-->
        <script src="Zebra_Datepicker-master/public/javascript/zebra_datepicker.js"></script>
        <script src="js/index.js"></script>
        <script>
            $(function() {
                $("#uimg").change(function() {
                    var reader = new FileReader();
                    reader.onload = function(image) {
                        $('.imageUpload').show(0);
                        $("#blnkImg").attr('src', image.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                })
            });

            $(document).ready(function() {
                $("#ui").on('change', function() {
                    //Get count of selected files
                    var countFiles = $(this)[0].files.length;
                    var imgPath = $(this)[0].value;
                    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                    var image_holder = $("#image-holder");
                    image_holder.empty();
                    if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                        if (typeof(FileReader) != "undefined") {
                            //loop for each file selected for uploaded.
                            for (var i = 0; i < countFiles; i++) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $("<img />", {
                                        "src": e.target.result,
                                        "class": "thumb-image"
                                    }).appendTo(image_holder);
                                }
                                image_holder.show();
                                reader.readAsDataURL($(this)[0].files[i]);
                            }
                        } else {
                            alert("This browser does not support FileReader.");
                        }
                    }
                });
            });

        </script>

    </body>

    </html>
