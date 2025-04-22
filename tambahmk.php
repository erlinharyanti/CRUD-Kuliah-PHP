<?php
include 'db.php';  

if (isset($_POST['submit'])) {
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['nama'];
    $jumlah_sks = $_POST['jumlah_sks'];

    $query = "INSERT INTO matakuliah (kodemk, nama, jumlah_sks) VALUES ('$kodemk', '$nama', '$jumlah_sks')";
    
    if (mysqli_query($conn, $query)) {  
        echo '<div class="alert alert-success mt-3">Mata kuliah berhasil ditambah!</div>';
    } else {
        echo '<div class="alert alert-danger mt-3">Gagal menambahkan mata kuliah: ' . mysqli_error($conn) . '</div>';
    }
}
?>
<?php include 'index.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 p-4 shadow rounded bg-white pb-4">
    <h3 class="mb-4">Tambah Mata Kuliah</h3>
    <form method="POST">
        <div class="mb-4">
            <label for="kodemk" class="form-label">Kode Mata Kuliah</label>
            <input type="text" name="kodemk" class="form-control" required>
        </div>
        <div class="mb-4">
            <label for="nama" class="form-label">Nama Mata Kuliah</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-4">
            <label for="jumlah_sks" class="form-label">Jumlah SKS</label>
            <input type="number" name="jumlah_sks" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Tambah</button>
    </form>
</div>
</body>
</html>
