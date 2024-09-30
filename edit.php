<?php
include('db.php');

$id = $_GET['id'];
$sql = "SELECT * FROM interns WHERE id='$id'";
$result = $conn->query($sql);
$intern = $result->fetch_assoc();

include('index.php');
?>
