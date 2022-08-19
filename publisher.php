<?php
require_once('./config.php'); //Requires connection to database
?>

<?php
//mysqli query
        $sql = "SELECT * FROM Publisher WHERE isbn =" .$_GET['view'];
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
  <link rel="stylesheet" type="text/css" href="text/style.css?ver=1.4">
  <link rel="stylesheet" href="https://m.w3newbie.com/you-tube.css">
</head>

<body>

<?php

include_once('header.php');

?>
               
<div class="col-sm-8 main-section">
<table class="table table-bordered table-hover">
<thead>
<tr>
<th>ISBN</th>
<th>Publisher</th>
<th>Country</th>
<th>Published Date</th>
<th colspan="2">Books</th>
</tr>
</thead>
<?php 
if($result->num_rows > 0){

//loop that displays all of the data from each row while the number of rows is greater than 0

while ($row = $result->fetch_assoc()){
?>
        <tr>
        <td><?php echo $row['isbn']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['country']; ?></td>
        <td><?php echo $row['date']; ?></td>  
        <td>
        <a href="books.php" alt="edit"
                   class="btn">View</a>
                   </td>
</tr>
<?php
}
	} 
else {
  ?>
<script type="text/javascript">
alert("There are no publishers for this book.");
window.location.href = "books.php";
</script>

<?php
}
?>
</table>
</div>
</body>
</html>