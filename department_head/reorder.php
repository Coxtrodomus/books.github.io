<?php
include_once('secure.php');//Includes secure session
require_once('./config.php');//Requires connection to database

//assigns session variable to PHP variable named $username

$username = $_SESSION['department_head'];

//mysqli query

$sql = "SELECT * FROM orders WHERE order_id =".$_GET['order'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>
<head>
  <title>TextBook Interchange</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <link rel="stylesheet" type="text/css" href="text/style.css?ver=4.3">
  <link rel="stylesheet" href="https://m.w3newbie.com/you-tube.css">
</head>
<body>
<?php

//includes header

include_once('header.php');
?>
  <?php
  
//assigns form input data to PHP variables  
  
  if(isset($_POST['save'])){
    $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $publisher = mysqli_real_escape_string($conn, $_POST['publisher']);
    $course = $_POST['course'];
    $cost = mysqli_real_escape_string($conn, $_POST['cost']);
    $semester = $_POST['semester'];
    $date = $_POST['date'];
    $campus = $_POST['campus'];
    $ins_name = $_POST['ins_name'];
    $ins_phone = mysqli_real_escape_string($conn, $_POST['ins_phone']);
    $ins_email = mysqli_real_escape_string($conn, $_POST['ins_email']);
    $dir_name = $_POST['dir_name'];
    $dir_phone = mysqli_real_escape_string($conn, $_POST['dir_phone']);
    $dir_email = mysqli_real_escape_string($conn, $_POST['dir_email']);
    $head_name = $_POST['head_name'];
    $head_phone = mysqli_real_escape_string($conn, $_POST['head_phone']);
    $head_email = mysqli_real_escape_string($conn, $_POST['head_email']);
    $total = $_POST['total'];
    $status = $_POST['status'];
    $update = date('H:i:s m-d-Y');
    $comments = mysqli_real_escape_string($conn, $_POST['comments']);
    
//insert into queries using mysqli      
    
    $sql = mysqli_query($conn, "INSERT INTO orders (isbn, title, author, publisher, course, cost, semester, start_date, campus, ins_name, ins_phone, ins_email, dir_name, dir_phone, dir_email, head_name, head_phone, head_email, total, status, comments, updated, username) 
      VALUES ('$isbn', '$title', '$author', '$publisher', '$course', '$cost', '$semester', '$date', '$campus', '$ins_name', '$ins_phone', '$ins_email', '$dir_name', '$dir_phone', '$dir_email', '$head_name', '$head_phone', '$head_email', '$total', '$status', '$comments', '$update', '$username')");
    
//if the insert query is successful, use javascript to alert the user and redirect back to previous page     
    
    if(!$sql){
      echo 'ERROR';
    }else{
      echo "<script type='text/javascript'>alert('Order Placed!')</script>";
    }
    
  }
  ?>
  <div class="modal-dialog text-center">
   <div class="col-sm-8 main-section">
     <div class="modal-content">
      <form method="POST" class="col-12">
        
        <label class="labels">Reorder</label>
        
        <div class="form-group">
          <label>ISBN</label>
          <input type="text" class="form-control" value="<?php echo $row['isbn']; ?>" name="isbn" readonly="readonly">
        </div>
        <div class="form-group">
          <label>Title</label>
          <input type="text" class="form-control" value="<?php echo $row['title']; ?>" name="title" readonly="readonly">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" value="<?php echo $row['author']; ?>" name="author">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" value="<?php echo $row['publisher']; ?>" name="publisher">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" value="<?php echo $row['course']; ?>" name="course">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" value="<?php echo $row['cost']; ?>" name="cost">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Semester</label>
          <select class="form-control" name= "semester" required="" oninvalid="this.setCustomValidity('Please select a semester')" oninput="setCustomValidity('')">
            <option hidden disabled selected value>-- select a semester --</option>
            <option value="Spring">Spring</option>
            <option value="Fall">Summer</option>
            <option value="Summer">Fall</option>
          </select>
        </div>
        <div class="form-group">
          <label>Start Date</label>
          <input type="text" class="form-control" pattern="\d{1,2}-\d{1,2}-\d{4}" name="date" required="" placeholder="mm-dd-yyyy" oninvalid="this.setCustomValidity('Please enter a valid date')" oninput="setCustomValidity('')">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Campus</label>
          <select class="form-control" name= "campus" required="" oninvalid="this.setCustomValidity('Please select a campus')" oninput="setCustomValidity('')">
            <option hidden disabled selected value>-- select a campus --</option>
            <option value="Barton">Barton</option>
            <option value="Benson">Benson</option>
            <option value="Brashier">Brashier</option>
            <option value="Northwest">Northwest</option>
          </select>
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" value="<?php echo $row['ins_name']; ?>" name="ins_name">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" value="<?php echo $row['ins_phone']; ?>" name="ins_phone">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" value="<?php echo $row['ins_email']; ?>" name="ins_email">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" value="<?php echo $row['dir_name']; ?>" name="dir_name">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" value="<?php echo $row['dir_phone']; ?>" name="dir_phone">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" value="<?php echo $row['dir_email']; ?>" name="dir_email">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" value="<?php echo $row['head_name']; ?>" name="head_name">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" value="<?php echo $row['head_phone']; ?>" name="head_phone">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" value="<?php echo $row['head_email']; ?>" name="head_email">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Total</label>
          <select class="form-control" name= "total" required="" oninvalid="this.setCustomValidity('Please select total')" oninput="setCustomValidity('')">
            <option hidden disabled selected value>-- order total --</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
          </select>
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" value="order placed" name="status">
        </div>
        <div class="form-group">
          <label>Comments</label>
          <textarea class="form-control" rows="5" name="comments"></textarea>
        </div>
        <input type="submit" class="btn" name="save" value="Purchase">
        <a href="books.php"><input type="button" class="btn" value="Cancel"></a>
      </form>
    </div>
  </div>
</div>
<?php
if (isset($_POST['save']))
{   
  ?>
  <script type="text/javascript">
    window.location = "orders.php";
  </script>
  <?php
}
?>
</body>
</html>