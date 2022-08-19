<?php
include_once('secure.php'); //Includes secure session
require_once('./config.php'); //Requires connection to database
?>

<?php
//mysqli query
$sql = "SELECT * FROM books INNER JOIN courses ON books.course = courses.course ORDER BY courses.course ASC";
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
  <link rel="stylesheet" type="text/css" href="text/style.css?ver=1.8">
  <link rel="stylesheet" href="https://m.w3newbie.com/you-tube.css">
</head>
<body>
<?php

//includes header

include_once('header.php');
?>
  <div class="col-sm-10 main-section">
    <table class="table table-bordered table-hover">
      <thead class="black white-text">
        <tr>
          <th>ISBN</th>
          <th>Title &amp; Edition</th>
          <th>Author</th>
          <th>Course Code</th>
          <th>Cost</th>
          <th>Publisher</th>
          <th>Orders</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php 
      if($result->num_rows > 0){
      
//loop that displays all of the data from each row while the number of rows is greater than 0
        
        while ($row = $result->fetch_assoc()){
          ?>
          <tr>
            <td><?php echo $row['isbn']; ?></td>
            <td><?php echo $row['title']; echo ", "; echo $row['edition']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['course']; ?></td>
            <td><?php echo '&#36;'; echo $row['cost']; ?></td>
            <td>
              <a href="publisher.php?view=<?php echo $row['isbn']; ?>" alt="view"
               class="btn">View</a>
             </td>
             <td>
              <a href="orders_add.php?view=<?php echo $row['isbn']; ?>&viewt=<?php echo $row['course_id']; ?>" alt="purchase"
               class="btn">Purchase</a>
             </td>
             
             <td>
              <a href="books_edit.php?edit=<?php echo $row['isbn']; ?>" alt="edit"
               class="btn">Edit</a>
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