<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM matakuliah");
if (!$result) {
    die('Query gagal: ' . mysqli_error($conn));
}
?>

<?php include 'index.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <h3>Data Mata Kuliah</h3>
    </div>
    <div class="mb-3 text-end">
        <a href="tambahmk.php" class="btn btn-primary">Tambah Mata Kuliah</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode MK</th>
                <th>Nama</th>
                <th>Jumlah SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $row['kodemk'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['jumlah_sks'] ?></td>
                    <td>
                    <div class="d-flex">
                        <a href="editmk.php?kodemk=<?= $row['kodemk'] ?>" class="btn btn-warning btn-sm me-2">Edit</a>
                        <a href="hapusmk.php?kodemk=<?= $row['kodemk'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </div>    
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
