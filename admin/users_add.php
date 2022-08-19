<?php
require('secure.php');         //Includes secure session
require_once('./config.php');  //Requires connection to database

//mysqli query

$sql = "SELECT * FROM courses";
$resultset = mysqli_query($conn, $sql);
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
  <link rel="stylesheet" type="text/css" href="text/style.css?ver=008">
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>
<?php

//includes header


include_once('header.php');
?>
<div>
<?php

//assigns form input data to PHP variables

if(isset($_POST['save'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $role = mysqli_real_escape_string($conn, $_POST['role']);
        $date = date('H:i:s m-d-Y');
        $course = $_POST['course'];
        
//insert into queries using mysqli
        
        $conn->query("INSERT INTO users (username, password, email, role, created, course) VALUES ('$username', '$password', '$email', '$role', '$date', '$course')");
       
//if the insert query is successful, use javascript to alert the user and redirect back to previous page       
       
        if(!$conn){
                echo 'ERROR';
                }else{
                echo "<script type='text/javascript'>alert('User Added!')</script>";
                echo '<script type="text/javascript">window.location = "users.php","_self"</script>';
                }
       }

?>
</div>
<div class="modal-dialog text-center">
   <div class="col-sm-7 main-section">
     <div class="modal-content">
        <form method="POST" class="col-12">
        <label class="labels">Add User</label>  
        <div class="form-group">
        <label>Username</label>
          <input type="text" class="form-control" name="username" required=""  oninvalid="this.setCustomValidity('Please enter a valid username.')" oninput="setCustomValidity('')">
        </div>
        <div class="form-group">
        <label>Password</label>
          <input type="text" class="form-control" name="password" required=""  oninvalid="this.setCustomValidity('Please enter a valid password.')" oninput="setCustomValidity('')">
        </div>
        <div class="form-group">
        <label>Email</label>
          <input type="email" class="form-control" name="email" placeholder="john@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required=""  oninvalid="this.setCustomValidity('Please enter a valid email')" oninput="setCustomValidity('')">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Role</label>
          <select class="form-control" name= "role" required="" oninvalid="this.setCustomValidity('Please select a role.')" oninput="setCustomValidity('')">
            <option hidden disabled selected value>-- select a role --</option>
            <option value="Administrator">Administrator</option>
            <option value="Instructor">Instructor</option>
            <option value="Department_Head">Department Head</option>
            <option value="Employee">Employee</option>
          </select>
        </div>
        <div class="form-group">
        <label>Course</label>
        <select class="form-control" name="course">
        <option hidden disabled selected value>-- instructor role only --</option>
        <?php
        while($rows = $resultset->fetch_assoc())
        {
          echo '<option>'.$rows['course'].'</option>';
        }
        ?>
    </select>
  </div>
        <input type="submit" class="btn" name="save" value="Submit">
        <a href="users.php"><input type="button" class="btn" value="Cancel"></a>
       </form>
       </div>
       </div>
       </div>
       
</body>
</html>