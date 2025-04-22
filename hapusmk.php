<?php
include 'db.php';
?>
<?php include 'index.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <?php
    if (isset($_GET['kodemk'])) {
        $kodemk = $_GET['kodemk'];

        // Hapus data di tabel krs yang terkait dengan kodemk
        $query_krs = "DELETE FROM krs WHERE matakuliah_kodemk='$kodemk'";
        mysqli_query($conn, $query_krs);

        $query_matakuliah = "DELETE FROM matakuliah WHERE kodemk='$kodemk'";
        
        if (mysqli_query($conn, $query_matakuliah)) {
            echo '<div class="alert alert-success mt-3">Data berhasil dihapus!</div>';
        } else {
            echo '<div class="alert alert-danger mt-3">Gagal menghapus data: ' . mysqli_error($conn) . '</div>';
        }

        header("Refresh: 2; url=matakuliah.php");
    } else {
        echo '<div class="alert alert-danger mt-3">Kode MK tidak ditemukan.</div>';
    }
    
    ?>
</div>
</body>
</html>
