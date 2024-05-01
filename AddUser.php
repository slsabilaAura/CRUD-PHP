<?php include 'connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
</head>
<body>
    <h2>Tambah User</h2>
    <form action="UploadProfil.php" method="post" enctype="multipart/form-data">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="file" name="profile_picture" required><br><br>
        <button type="submit">Tambah</button>
    </form>
</body>
</html>
