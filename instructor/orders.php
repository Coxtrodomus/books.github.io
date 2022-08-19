<?php
include_once('secure.php'); //Includes secure session
require_once('./config.php'); //Requires connection to database
$username = $_SESSION['instructor'];
?>

<?php
//mysqli query
$sql = "SELECT order_id, isbn, title, author, publisher, course, CAST((cost * total) AS decimal(38,2)) 'totalprice', semester, start_date, campus, ins_name, ins_phone,
ins_email, dir_name, dir_phone, dir_email, head_name, head_phone, head_email, total, status, comments, username FROM orders WHERE username = '$username' ORDER BY order_id DESC";
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
  <link rel="stylesheet" type="text/css" href="text/style.css?ver=2.1">
  <link rel="stylesheet" href="https://m.w3newbie.com/you-tube.css">
</head>
<body>
<?php
include_once('header.php');
?>
  <div class="col-md-10 main-section">
    <table class="table table-bordered table-hover">
      <thead class="black white-text">
        <tr>
          <th>ISBN</th>
          <th>Title</th>
          <th>Author</th>
          <th>Quantity</th>
          <th>Total Cost</th>
          <th>Status</th>
          <th>Reports</th>
          <th>Orders</th>
        </tr>
      </thead>
      <?php 
      if($result->num_rows > 0){

//loop that displays all of the data from each row while the number of rows is greater than 0

        while ($row = $result->fetch_assoc()){
          ?>
          <tr>
            <td><?php echo $row['isbn']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['total']; ?></td>
            <td><?php echo '&#36;'; echo $row['totalprice']; ?></td>
            <td><?php echo $row['status'];?></td>
            <td>
              <a href="orders_view.php?order=<?php echo $row['order_id']; ?>" alt="view"
               class="btn">View</a> 
               </td>
            <td>
              <a href="reorder.php?order=<?php echo $row['order_id']; ?>" alt="view"
               class="btn">Reorder</a> 
               </td>
            </tr>
               <?php
             }
           }
           else
           {

           }
           ?>
         </table>
       </div>
     </body>
     </html>