<?php
include '../koneksi.php';

$query = "SELECT * FROM matkul";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $row['id_matkul'] . "</td>";
        echo "<td class='namaMatkul' style='padding: 10px; border: 1px solid #ddd;'>" . $row['nama_matkul'] . "</td>";
        // echo "<td class='noTelp' style='padding: 10px; border: 1px solid #ddd;'>" . $row['no_telp'] . "</td>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>
                <button class='editBtn' data-id='" . $row['id_matkul'] . "'>Edit</button>
                <button class='deleteBtn' data-id='" . $row['id_matkul'] . "'>Hapus</button>
            </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>Tidak ada data matkul.</td></tr>";
}

mysqli_close($conn);
?>
