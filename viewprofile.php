<?php
session_start();
include_once 'conn.php';
if (!isset($_SESSION['studentid'])){
header("Location: index.php");
}

$result=mysqli_query($con,"SELECT * FROM student WHERE studentid=".$_SESSION['studentid']);
$fetched_row=mysqli_fetch_array($result);

// delete user
if (isset($_POST["delete"])){
    
    $firstname =$_POST['firstname'];
    $lastname =$_POST['lastname'];
    $matricnum =$_POST['matricnum'];
    $major =$_POST['major'];
    $classgroup =$_POST['classgroup'];
    $username =$_POST['username'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    $confirmpassword =$_POST['confirmpassword'];
      
           $sql= ("DELETE FROM student WHERE username = '$username' AND matricnum = '$matricnum' ");
         $res = mysqli_query($con,$sql);
    
    
    if ($row['username']=$username && $row['matricnum']=$matricnum){
    
      header("Location: index.php");
         echo"your account has been deleted";
         } ELSE {
          ?>
      <script type="text/javascript">
      alert("Your account cannot be deleted");
      </script>
      <?php
        } 
          
    }



?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/hilti.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Test Case Management Tool</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 
<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="assets/css/user.css" rel="stylesheet" />



    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="assets/img/soft.jpg">

            <!--
        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag
    -->

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                   TEST CASE MANAGEMENT TOOL
                </a>
                </div>

                <ul class="nav">
                    <li class="active">
                        <a href="dashboard.php">
                            <i class="pe-7s-graph"></i>
                            <p>All Project</p>
                        </a>
                    </li>

<!-- 
                    <li>
                        <a href="overview.php">
                            <i class="pe-7s-note2"></i>
                            <p>Overview</p>
                        </a>
                    </li>
                    <li>
                    <a href="testplan.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Test Plan</p>
                    </a>
                </li>
                    <li>
                        <a href="testsuite.php">
                            <i class="pe-7s-science"></i>
                            <p>Test Suite</p>
                        </a>
                    </li>
                    <li>
                        <a href="testrun.php">
                            <i class="pe-7s-map-marker"></i>
                            <p>Test Run</p>
                        </a>
                    </li>
                    <li>
                        <a href="notifications.html">
                            <i class="pe-7s-bell"></i>
                            <p>Notifications</p>
                        </a>
                    </li> -->

                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                        <a class="navbar-brand" href="#">Student Account</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                        
                          
                        </ul> 

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                            <a href="#">   <?php  echo "welcome    ".$fetched_row['username']."!"; ?> </a>
                            </li>
                         
                            <li>
                            <a onclick="return confirm('Are you sure want to logout?')"  href="logout.php">Log out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

   
<div class="card">
<div class="bootstrap-iso">
 <div class="container">
  <div class="row">
   <div class="col-md-6 col-sm-4 col-xs-12">
 <!-- Form Name -->
    <form method="post">

     <div class="form-group ">
      <label class="control-label requiredField" for="firstname"> First Name<span class="asteriskField"> * </span> </label>
      <input class="form-control" id="firstname" name="firstname" value="<?php echo $fetched_row['firstname']; ?>"  type="text"/>
     </div>

     <div class="form-group ">
      <label class="control-label requiredField" for="lastname"> Last Name <span class="asteriskField"> * </span> </label>
      <input class="form-control" id="lastname" name="lastname" value="<?php echo $fetched_row['lastname']; ?>" type="text"/>
     </div>

     <div class="form-group ">
      <label class="control-label requiredField" for="matricnum"> Matric Number<span class="asteriskField"> *</span> </label>
      <input class="form-control" id="matricnum" name="matricnum" value="<?php echo $fetched_row['matricnum']; ?>" type="text"/>
     </div>

     <div class="form-group ">
      <label class="control-label requiredField" for="matricnum"> Major<span class="asteriskField"> *</span> </label>
      <input class="form-control" id="matricnum" name="matricnum" value="<?php echo $fetched_row['major']; ?>" type="text"/>
     </div>

     <div class="form-group ">
      <label class="control-label requiredField" for="classgroup"> Group <span class="asteriskField"> *</span> </label>
      <input class="form-control" id="classgroup" name="classgroup" value="<?php echo $fetched_row['classgroup']; ?>" type="text"/>
     </div>

     <div class="form-group ">
      <label class="control-label requiredField" for="username"> Username<span class="asteriskField"> * </span> </label>
      <input class="form-control" id="username" name="username" value="<?php echo $fetched_row['username']; ?>" type="text"/>
     </div>

     <div class="form-group ">
      <label class="control-label requiredField" for="email">Email <span class="asteriskField"> * </span></label>
      <input class="form-control" id="email" name="email" value="<?php echo $fetched_row['email']; ?>" type="text"/>
     </div>

     <div class="form-group ">
      <label class="control-label requiredField" for="password">Password<span class="asteriskField"> *</span></label>
      <input class="form-control" id="password" name="password" value="<?php echo $fetched_row['password']; ?>" type="password"/>
     </div>

     <div class="form-group">
      <div>
      
      <!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" ></label>
  <div class="col-md-8">

  <a href="editprofile.php" class="btn btn-success" role="button">Update Account</a>
    <button id="cancel" name="delete" onclick="return confirm('Are you sure want to delete this account?')" class="btn btn-danger">Delete</button>
  </div>
</div>
      </div>
     </div>
    </form>
   </div>
  </div>
</div>
</div>

</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        demo.initChartist();
    });
</script>

</html>