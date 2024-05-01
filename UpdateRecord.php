<?php
include 'connect.php';

$id = $_GET['id']; // Ambil ID pengguna dari URL

$sql = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>
    <form action="UpdateUser.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" name="username" value="<?php echo $row['username']; ?>" placeholder="Username" required><br><br>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Email" required><br><br>
        <img src="<?php echo $row['profile_picture']; ?>" width="100"><br><br>
        <input type="file" name="profile_picture"><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
