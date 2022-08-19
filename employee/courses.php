<?php
include_once('secure.php');
require_once('./config.php'); //Requires connection to database
?>

<?php  

//mysqli query

$sql = "SELECT * FROM courses ORDER BY course ASC";
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
  <div class="col-md-11 main-section">
    <table class="table table-bordered table-hover">
      <thead class="black white-text">
        <tr>
          <th>Course</th>
          <th>Instructor</th>
          <th>Program Director</th>
          <th>Department Head</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php 
      if($result->num_rows > 0){

//loop that displays all of the data from each row while the number of rows is greater than 0

        while ($row = $result->fetch_assoc()){
          ?>
          <tr>
            <td><?php echo $row['course']; ?></td>
            <td><?php echo $row['ins_name']; echo ', '; echo $row['ins_phone']; echo ', '; echo $row['ins_email']; ?></td>
            <td><?php echo $row['dir_name']; echo ', '; echo $row['dir_phone']; echo ', '; echo $row['dir_email']; ?></td>
            <td><?php echo $row['head_name']; echo ', '; echo $row['head_phone']; echo ', '; echo $row['head_email']; ?></td>
               <td>
                <a href="courses_edit.php?edit=<?php echo $row['course_id']; ?>" alt="edit"
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