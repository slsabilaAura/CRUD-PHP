<?php
include 'connect.php';

$id = $_GET['id']; // assuming you pass the id of the record to delete via GET

$sql = "DELETE FROM users WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    header("Location: RegistUser.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
