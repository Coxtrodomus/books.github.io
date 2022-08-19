<?php
require('secure.php'); //Includes secure session
require_once('./config.php'); //Requires connection to database

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
        $course = $_POST['course'];
        $ins_name = $_POST['ins_name'];
        $ins_phone = mysqli_real_escape_string($conn, $_POST['ins_phone']);
        $ins_email = mysqli_real_escape_string($conn, $_POST['ins_email']);
        $dir_name = $_POST['dir_name'];
        $dir_phone = mysqli_real_escape_string($conn, $_POST['dir_phone']);
        $dir_email = mysqli_real_escape_string($conn, $_POST['dir_email']);
        $head_name = $_POST['head_name'];
        $head_phone = mysqli_real_escape_string($conn, $_POST['head_phone']);
        $head_email = mysqli_real_escape_string($conn, $_POST['head_email']);
         
//insert into queries using mysqli
         
        $conn->query("INSERT INTO courses (course, ins_name, ins_email, ins_phone, dir_name, dir_email, dir_phone, head_name, head_email, head_phone) VALUES ('$course', '$ins_name', '$ins_email', '$ins_phone', '$dir_name', '$dir_email', '$dir_phone', '$head_name', '$head_email', '$head_phone')");
       
//if the insert query is successful, use javascript to alert the user and redirect back to previous page       
       
        if(!$conn){
                echo 'ERROR';
                }else{
                echo "<script type='text/javascript'>alert('Course Added!')</script>";
                echo '<script type="text/javascript">window.location = "courses.php","_self"</script>';
                }
                
       }

?>
</div>
<div class="modal-dialog text-center">
   <div class="col-sm-9 main-section">
     <div class="modal-content">
        <form method="POST" class="col-12">
        <label class="labels">Add Course</label>  
        <div class="form-group">
        <label>Course Code</label>
          <input type="text" class="form-control" name="course" placeholder="CPT-200" pattern="[A-Z]{3}[\-]?[0-9]{3}" required=""  oninvalid="this.setCustomValidity('Please enter a valid course')" oninput="setCustomValidity('')">
        </div>
        <div class="form-group">
        <label>Instructor Name</label>
          <input type="text" class="form-control" name="ins_name" required=""  oninvalid="this.setCustomValidity('Please enter a name')" oninput="setCustomValidity('')">
        </div>
        <div class="form-group">
        <label>Instructor Phone Number</label>
          <input type="text" class="form-control" name="ins_phone" placeholder="999-999-9999" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required=""  oninvalid="this.setCustomValidity('Please enter a valid phone number')" oninput="setCustomValidity('')">
        </div>
        <div class="form-group">
        <label>Instructor Email</label>
          <input type="email" class="form-control" name="ins_email" placeholder="john@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required=""  oninvalid="this.setCustomValidity('Please enter a valid email')" oninput="setCustomValidity('')">
        </div>
        <div class="form-group">
        <label>Director Name</label>
          <input type="text" class="form-control" name="dir_name" required=""  oninvalid="this.setCustomValidity('Please enter a valid name')" oninput="setCustomValidity('')">
        </div>
        <div class="form-group">
        <label>Director Phone Number</label>
          <input type="text" class="form-control" name="dir_phone" placeholder="999-999-9999" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required=""  oninvalid="this.setCustomValidity('Please enter a valid phone number')" oninput="setCustomValidity('')">
        </div>
        <div class="form-group">
        <label>Director Email</label>
          <input type="email" class="form-control" name="dir_email" placeholder="john@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required=""  oninvalid="this.setCustomValidity('Please enter a valid email')" oninput="setCustomValidity('')">
        </div>
        <div class="form-group">
        <label>Department Head Name</label>
          <input type="text" class="form-control" name="head_name" required=""  oninvalid="this.setCustomValidity('Please enter a valid name')" oninput="setCustomValidity('')">
        </div>
        <div class="form-group">
        <label>Department Head Phone Number</label>
          <input type="text" class="form-control" name="head_phone" placeholder="999-999-9999" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required=""  oninvalid="this.setCustomValidity('Please enter a valid phone number')" oninput="setCustomValidity('')">
        </div>
        <div class="form-group">
        <label>Department Head Email</label>
          <input type="email" class="form-control" name="head_email" placeholder="john@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required=""  oninvalid="this.setCustomValidity('Please enter a valid email')" oninput="setCustomValidity('')">
        </div>
        <input type="submit" class="btn" name="save" value="Submit">
        <a href="courses.php"><input type="button" class="btn" value="Cancel"></a>
       </form>
       </div>
       </div>
       </div>
       
</body>
</html>