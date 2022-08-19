<?php
session_start(); //creates a session
require('config.php'); //Requires connection to database

//if the form is submitted, the following code is ran to test the username and password matches the username and password
//that is in the databse, if there is a match, the appropriate session is assigned and the user is redirected.
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$myusername = mysqli_real_escape_string($conn,$_POST['username']);
		$mypassword = mysqli_real_escape_string($conn,$_POST['password']);
                
                //mysqli query
                
		$sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
                
		if($count == 1) {
                
                //if the role of the user is Administrator, the admin session is created
                
                        if ($row['role']=="Administrator"){
                            
			$_SESSION['admin'] = $myusername; //passes the username variable to the admin session
                        
                       
			echo '<script type="text/javascript">window.location = "http://bookinterchange.atwebpages.com/admin/home.php","_self"</script>';
		}
                
                //if the role of the user is Department_Head, the department_head session is created
                
                        else if ($row['role']=="Department_Head"){
                        
                        $_SESSION['department_head'] = $myusername;//passes the username variable to the head session
                        $_SESSION['course'] = $row['course']; //passes the course variable to the course session
                        
			echo '<script type="text/javascript">window.location = "http://bookinterchange.atwebpages.com/department_head/home.php","_self"</script>';
		}
                
                //if the role of the user is Instructor, the instructor session is created
                
                        else if ($row['role']=="Instructor"){
                        
                        $_SESSION['instructor'] = $myusername;//passes the username variable to the instructor session
                        $_SESSION['course'] = $row['course']; //passes the course variable to the course session
                        
			echo '<script type="text/javascript">window.location = "http://bookinterchange.atwebpages.com/instructor/home.php","_self"</script>';
		}
                 //if the role of the user is Employee, the employee session is created
                
                        else if ($row['role']=="Employee"){
                        
                        $_SESSION['employee'] = $myusername;//passes the username variable to the instructor session
                        
                        
			echo '<script type="text/javascript">window.location = "http://bookinterchange.atwebpages.com/employee/home.php","_self"</script>';
		}
                
                } else {
			echo "<script type='text/javascript'>alert('Invalid username or password')</script>";
                        echo '<script type="text/javascript">window.location = "login.php","_self"</script>';
		}
	}

?>
<!DOCTYPE html>
<head>
  <title>TextBook Interchange</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <link rel="stylesheet" type="text/css" href="text/style2.css?ver=004">
</head>
<body> 
<?php
require('header.php');
?>
<div class="modal-dialog text-center">
   <div class="col-sm-8 main-section">
     <div class="modal-content">
        <form action = "" method="post" class="col-12">
        <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="Username">
        </div>
        <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn" name="save"><i class="fas fa-sign-in-alt"></i>Login</button>
       </form>
       </div>
       </div>
       </div>
       
      
</body>
</html>