<?php
$dbServername = 'pdb42.your-hosting.net';
$dbUsername = '2818475_test';
$dbPassword = 'daneil7362';
$dbName = '2818475_test';

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>


