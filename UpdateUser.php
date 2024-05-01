<?php
include 'connect.php';

$id = $_POST['id']; // assuming you pass the id of the record to update via POST

$username = $_POST['username'];
$email = $_POST['email'];

// Check if a new profile picture is uploaded
if ($_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
    $nama_file = $_FILES['profile_picture']['name'];
    $tmp_file = $_FILES['profile_picture']['tmp_name'];

    $upload_dir = 'CRUD/profile/';
    $target_file = $upload_dir . $nama_file;

    if (move_uploaded_file($tmp_file, $target_file)) {
        // Update record with new profile picture
        $sql = "UPDATE users SET username='$username', email='$email', profile_picture='$target_file' WHERE id=$id";
    } else {
        echo "Gagal mengunggah file.";
        exit;
    }
} else {
    // No new profile picture uploaded, update record without changing the picture
    $sql = "UPDATE users SET username='$username', email='$email' WHERE id=$id";
}

if (mysqli_query($conn, $sql)) {
    header("Location: RegistUser.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
