<?php
include 'connect.php';

$username = $_POST['username'];
$email = $_POST['email'];

$nama_file = $_FILES['profile_picture']['name'];
$ukuran_file = $_FILES['profile_picture']['size'];
$tmp_file = $_FILES['profile_picture']['tmp_name'];

$upload_dir = 'CRUD/profile/';

if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true); // Buat direktori jika belum ada
}

$target_file = $upload_dir . $nama_file;

if (move_uploaded_file($tmp_file, $target_file)) {
    $sql = "INSERT INTO users (username, email, profile_picture) VALUES ('$username', '$email', '$target_file')";
    if (mysqli_query($conn, $sql)) {
        header("Location: RegistUser.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Gagal mengunggah file.";
}
?>
