<?php

$mysqli = new mysqli('pdb42.your-hosting.net', '2818475_test', 'daneil7362', '2818475_test') or die(mysqli_error($mysqli));
if (isset($_GET['delete_book'])){
        $isbn = $_GET['delete_book'];
        $mysqli->query("DELETE FROM books WHERE isbn = $isbn");
        $mysqli->query("DELETE FROM Publisher WHERE isbn = $isbn");
        header("Location: books.php");
}
if (isset($_GET['delete_order'])){
        $id = $_GET['delete_order'];
        $mysqli->query("DELETE FROM orders WHERE order_id = $id");
        header("Location: orders.php");
}
if (isset($_GET['delete_course'])){
        $id = $_GET['delete_course'];
        $mysqli->query("DELETE FROM courses WHERE course_id = $id");
        header("Location: courses.php");
}
if (isset($_GET['delete_user'])){
        $id = $_GET['delete_user'];
        $mysqli->query("DELETE FROM users WHERE id = $id");
        header("Location: users.php");
}

?>