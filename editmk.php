<?php
include 'db.php';

$kodemk = $_GET['kodemk'];
$result = mysqli_query($conn, "SELECT * FROM matakuliah WHERE kodemk = '$kodemk'");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $jumlah_sks = $_POST['jumlah_sks'];

    $query = "UPDATE matakuliah SET nama = '$nama', jumlah_sks = '$jumlah_sks' WHERE kodemk = '$kodemk'";
    if (mysqli_query($conn, $query)) {  
        echo '<div class="alert alert-success mt-3">Data berhasil diedit!</div>';
    } else {
        echo '<div class="alert alert-danger mt-3">Gagal mengedit data: ' . mysqli_error($conn) . '</div>';  
    }
}
?>

<?php include 'index.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 p-4 shadow rounded bg-white pb-4">
    <h3 class="mb-4">Edit Mata Kuliah</h3>
    <form method="POST">
        <div class="mb-4">
            <label for="kodemk" class="form-label">Kode MK</label>
            <input type="text" name="kodemk" class="form-control" value="<?= $data['kodemk'] ?>" readonly>
        </div>
        <div class="mb-4">
            <label for="nama" class="form-label">Nama Mata Kuliah</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
        </div>
        <div class="mb-4">
            <label for="jumlah_sks" class="form-label">Jumlah SKS</label>
            <input type="text" name="jumlah_sks" class="form-control" value="<?= $data['jumlah_sks'] ?>" required>
        </div>
        <button type="submit" name="submit" class="btn btn-warning">Simpan</button>
    </form>
</div>
</body>
</html>
