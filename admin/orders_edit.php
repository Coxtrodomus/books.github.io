<?php
include_once('secure.php'); //Includes secure session
require_once('./config.php'); //Requires connection to database

//mysqli query

//if edit button is pressed from previous page, query is ran where the data passed
//from edit button is tested against query

if (isset($_GET['edit'])){
$sql = "SELECT * FROM orders WHERE order_id =".$_GET['edit'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
}

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
  <link rel="stylesheet" type="text/css" href="text/style.css?ver=4.9">
  <link rel="stylesheet" href="https://m.w3newbie.com/you-tube.css">
</head>
<body>
<?php

//includes header

include_once('header.php');
?>
  <?php

//assigns form input data to PHP variables

  if(isset($_POST['update'])){
    $id = mysqli_real_escape_string($conn, $_POST['id']);
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
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    
//updated data from table based off of form input using PHP variables above    
    
    $update = "UPDATE orders SET isbn='$isbn', title='$title', author='$author', publisher='$publisher', course='$course', cost='$cost', semester='$semester',
    start_date='$date', campus='$campus', ins_name='$ins_name', ins_phone='$ins_phone', ins_email='$ins_email', dir_name='$dir_name', dir_phone='$dir_phone',
    dir_email='$dir_email', head_name='$head_name', head_phone='$head_phone', head_email='$head_email', total='$total', status='$status', comments='$comments', updated='$update', username='$username' WHERE order_id=" .$_GET['edit'];
    $up = mysqli_query($conn, $update);
    
//if the update query is successful, use javascript to alert the user and redirect back to previous page    
    
    if(!isset($sql)){
               die ("Error $sql" .mysqli_connect_error());
           }else{
            echo "<script type='text/javascript'>alert('Order Updated!')</script>";
            echo '<script type="text/javascript">window.location = "orders.php","_self"</script>';
        }
    
  }
  ?>
  <div class="modal-dialog text-center">
   <div class="col-sm-8 main-section">
     <div class="modal-content">
      <form method="POST" class="col-12">
        <label class="labels">Edit Order</label>
        <div class="form-group">
          <input type="hidden" class="form-control" value="<?php echo $row['order_id']; ?>" name="id">
        </div>
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
        <label>Cost</label>
          <input type="number" class="form-control" value="<?php echo $row['cost']; ?>" name="cost">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Semester</label>
          <select class="form-control" name= "semester" required="" oninvalid="this.setCustomValidity('Please update semester')" oninput="setCustomValidity('')">
            <option hidden selected value = "<?php echo $row['semester']; ?>"><?php echo $row['semester']; ?></option>
            <option value="Spring">Spring</option>
            <option value="Fall">Summer</option>
            <option value="Summer">Fall</option>
          </select>
        </div>
        <div class="form-group">
          <label>Start Date</label>
          <input type="text" class="form-control" value="<?php echo $row['start_date']; ?>" pattern="\d{1,2}-\d{1,2}-\d{4}" name="date" required="" placeholder="mm-dd-yyyy" oninvalid="this.setCustomValidity('Please enter a valid date')" oninput="setCustomValidity('')">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Campus</label>
          <select class="form-control" name= "campus" required="" oninvalid="this.setCustomValidity('Please update campus')" oninput="setCustomValidity('')">
            <option hidden selected value = "<?php echo $row['campus']; ?>"><?php echo $row['campus']; ?></option>
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
          <select class="form-control" name= "total" required="" oninvalid="this.setCustomValidity('Please update total')" oninput="setCustomValidity('')">
            <option hidden selected value = "<?php echo $row['total']; ?>"><?php echo $row['total']; ?></option>
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
          <label for="exampleFormControlSelect1">Order Status</label>
          <select class="form-control" name= "status" required="" oninvalid="this.setCustomValidity('Please update status')" oninput="setCustomValidity('')">
            <option hidden selected value = "<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
            <option value="order placed">order placed</option>
            <option value="order sent to publisher">order sent to publisher</option>
            <option value="inventory received">inventory received</option>
            <option value="stocked on shelf">stocked on shelf</option>
          </select>
        </div>
        <div class="form-group">
          <label>Comments</label>
          <textarea class="form-control" rows="5" name="comments"></textarea>
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" value="<?php echo $row['username']; ?>" name="username">
        </div>
        <input type="submit" class="btn" name="update" value="Update">
        <a href="orders.php"><input type="button" class="btn" value="Cancel"></a>
      </form>
    </div>
  </div>
</div>

</body>
</html>