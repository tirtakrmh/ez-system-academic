<?php
include '../koneksi.php';

$query = "SELECT * FROM kartu_mengajar";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $row['id_dosen'] . "</td>";
        echo "<td class='idMatkul' style='padding: 10px; border: 1px solid #ddd;'>" . $row['id_matkul'] . "</td>";
        echo "<td class='semester' style='padding: 10px; border: 1px solid #ddd;'>" . $row['semester'] . "</td>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>
                <button class='editBtn' data-id='" . $row['id_dosen'] . "' data-idMatkul='" . $row['id_matkul'] . "'>Edit</button>
                <button class='deleteBtn' data-id='" . $row['id_dosen'] . "' data-idMatkul='" . $row['id_matkul'] . "'>Hapus</button>
            </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>Tidak ada data kartu mengajar.</td></tr>";
}

mysqli_close($conn);
?>
