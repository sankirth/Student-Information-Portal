<?php 
    include('connection.php');
            
    if(isset($_POST['submit'])){
           
            $ufirstname=mysqli_real_escape_string($con,$_POST['first_name']);
            $ulastname=mysqli_real_escape_string($con,$_POST['last_name']);
            $udob=mysqli_real_escape_string($con,$_POST['udob']);
            $uage=mysqli_real_escape_string($con,$_POST['uage']);
            $uemail=mysqli_real_escape_string($con,$_POST['uemail']);
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
            $uregnumber=mysqli_real_escape_string($con,$_POST['uregnumber']);
            $udepartment=mysqli_real_escape_string($con,$_POST['udepartment']);
            $uroll=mysqli_real_escape_string($con,$_POST['uroll']);
            $ucgpa=mysqli_real_escape_string($con,$_POST['ucgpa']);
            $utwelve=mysqli_real_escape_string($con,$_POST['utwelve']);
            $uten=mysqli_real_escape_string($con,$_POST['uten']);
            $uimage=$_FILES['ui']['name'];
            $utmp=$_FILES['ui']['tmp_name'];
            $ucv=$_FILES['ucv']['name'];
            $ucvtmp=$_FILES['ucv']['tmp_name'];
            
            
            $email="select * from ruser where uemail='$uemail'";
            $remail=mysqli_query($con,$email);
            $check_email=mysqli_num_rows($remail);
            if ($check_email==1){
                echo"<script>alert('Already registered')</script>";
                echo"<script>window.open('reg.php','_self')</script>";
                exit();
            }
           else{
               move_uploaded_file($utmp,"rimg/$uimage");
               move_uploaded_file($ucvtmp,"ucv/$ucv");
               $insert="insert into ruser (
               ufirstname, ulastname, udob, uage, uemail, upass, uphone, uaddress, ucity, ustate, ucountry, uzip, ublog,
               ugender, ucomment, uregnumber, udepartment, uroll, ucgpa, utwelve, uten, ucv, uimage,  reg_date) values (
               '$ufirstname', '$ulastname', '$udob', '$uage', '$uemail', '$upass', '$uphone', '$uaddress', '$ucity', '$ustate', '$ucountry', '$uzip','$ublog' ,'$ugender', '$ucomment', '$uregnumber', '$udepartment', '$uroll', '$ucgpa', '$utwelve', '$uten',  '$ucv','$uimage', NOW()) ";
               $query =mysqli_query($con,$insert);
               if($query === true){
                   header("Location: thnk.php");
               }
           }               
        }
    mysqli_close($con);
?>
