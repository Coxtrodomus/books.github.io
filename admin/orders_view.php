<?php
include_once('secure.php'); //Includes secure session
require_once('./config.php'); //Requires connection to database
?>

<?php    

//mysqli query

$sql = "SELECT order_id, isbn, title, author, publisher, course, CAST((cost * total) AS decimal(38,2)) 'totalprice', semester, start_date, campus, ins_name, ins_phone, ins_email, dir_name, dir_phone, dir_email, head_name, head_phone, head_email, total, 
status, comments, updated, username FROM orders WHERE order_id =" .$_GET['order'];
$result = $conn->query($sql);


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
  <link rel="stylesheet" type="text/css" href="text/style.css?ver=1.7">
  <link rel="stylesheet" href="https://m.w3newbie.com/you-tube.css">
</head>

<body>
<?php
include_once('header.php');
?>
  <?php

  if($result->num_rows > 0){

    while ($row = $result->fetch_assoc()){
      ?>
      <div class="col-sm-5 main-section">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Order Number:</th>
              <td><?php echo $row['order_id']; ?></td>  
            </tr>
          </thead>
          <thead>
            <tr>
              <th>Ordered By:</th>
              <td><?php echo $row['username']; ?></td>  
            </tr>
          </thead>
          <thead>
            <tr>
              <th>ISBN:</th>
              <td><?php echo $row['isbn']; ?></td>  
            </tr>
          </thead>
          <thead>
            <tr>
              <th>Title:</th>
              <td><?php echo $row['title']; ?></td>  
            </tr>
          </thead>
          <thead>
            <tr>
              <th>Author:</th>
              <td><?php echo $row['author']; ?></td>  
            </tr>
          </thead>
          <thead>
            <tr>
              <th>Publisher:</th>
              <td><?php echo $row['publisher']; ?></td>  
            </tr>
          </thead>
          <thead>
            <tr>
              <th>Course:</th>
              <td><?php echo $row['course']; ?></td>  
            </tr>
          </thead>
          <thead>
            <tr>
              <th>Semester:</th>
              <td><?php echo $row['semester']; ?></td>  
            </tr>
          </thead>
          <thead>
            <tr>
              <th>Start Date:</th>
              <td><?php echo $row['start_date']; ?></td>  
            </tr>
          </thead>
          <thead>
            <tr>
              <th>Campus:</th>
              <td><?php echo $row['campus']; ?></td>  
            </tr>
          </thead>
          <thead>
            <tr>
              <th>Instructor:</th>
              <td><?php echo $row['ins_name']; echo ', '; echo $row['ins_phone']; echo ', '; echo $row['ins_email']; ?></td>
            </tr>
          </thead>
          <thead>
            <tr>
              <th>Program Director:</th>
              <td><?php echo $row['dir_name']; echo ', '; echo $row['dir_phone']; echo ', '; echo $row['dir_email']; ?></td>
            </tr>
          </thead>
          <thead>
            <tr>
              <th>Department Head:</th>
              <td><?php echo $row['head_name']; echo ', '; echo $row['head_phone']; echo ', '; echo $row['head_email']; ?></td>
            </tr>
          </thead>
          <thead>
            <tr>
              <th>Quantity:</th>
              <td><?php echo $row['total']; ?></td>  
            </tr>
          </thead>
          <thead>
            <tr>
              <th>Total Cost:</th>
              <td><?php echo '&#36;'; echo $row['totalprice']; ?></td>  
            </tr>
          </thead>
          <thead>
            <tr>
              <th>Status:</th>
              <td><?php echo $row['status']; ?></td>  
            </tr>
          </thead>
          <thead>
            <tr>
              <th>Last Updated:</th>
              <td><?php echo $row['updated']; ?></td>   
            </tr>
          </thead>
          <thead>
            <tr>
              <th>Comments:</th>
              <td><?php echo $row['comments']; ?></td>  
            </tr>
          </thead>
          <?php
        }
      } 
      else {
        ?>
        <script type="text/javascript">
          alert("Under Construction");
          window.location.href = "orders.php";
        </script>

        <?php
      }
      ?>
    </table>
  </div>
</body>
</html>