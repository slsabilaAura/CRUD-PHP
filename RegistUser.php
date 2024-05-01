<?php include 'connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User</title>
</head>
<body>
    <h2>Daftar User</h2>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Profile Picture</th>
            <th>Action</th> <!-- Kolom baru untuk tombol update dan hapus -->
        </tr>
        <?php
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $no = 1;
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td><img src='" . $row['profile_picture'] . "' width='100'></td>";
                echo "<td>";
                // Tombol Update
                echo "<a href='UpdateRecord.php?id=" . $row['id'] . "'>Update</a> | ";
                // Tombol Hapus
                echo "<a href='DeleteUser.php?id=" . $row['id'] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');\">Hapus</a>";
                echo "</td>";
                echo "</tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
</body>
</html>
