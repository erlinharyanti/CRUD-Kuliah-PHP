<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data KRS berdasarkan ID
    $query_krs = "SELECT * FROM krs WHERE id = '$id'";
    $result_krs = mysqli_query($conn, $query_krs);
    $data_krs = mysqli_fetch_assoc($result_krs);

    if (!$data_krs) {
        die('Data KRS tidak ditemukan!');
    }

    // Ambil data mahasiswa dan mata kuliah untuk dropdown
    $query_mhs = "SELECT * FROM mahasiswa";
    $result_mhs = mysqli_query($conn, $query_mhs);

    $query_mk = "SELECT * FROM matakuliah";
    $result_mk = mysqli_query($conn, $query_mk);
}

if (isset($_POST['submit'])) {
    $npm = $_POST['npm'];
    $kodemk = $_POST['kodemk'];

    // Update data KRS
    $query_update = "UPDATE krs SET mahasiswa_npm = '$npm', matakuliah_kodemk = '$kodemk' WHERE id = '$id'";
    if (mysqli_query($conn, $query_update)) {
        echo '<div class="alert alert-success mt-3">Data KRS berhasil diupdate!</div>';
    } else {
        echo '<div class="alert alert-danger mt-3">Gagal mengupdate data: ' . mysqli_error($conn) . '</div>';
    }
}
?>

<?php include 'index.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 p-4 shadow rounded bg-white">
    <h3 class="mb-4">Edit KRS</h3>
    <form method="POST">
        <div class="mb-3">
            <label for="npm" class="form-label">Nama Mahasiswa</label>
            <select name="npm" class="form-select" required>
                <?php while ($row = mysqli_fetch_assoc($result_mhs)) : ?>
                    <option value="<?= $row['npm'] ?>" <?= $row['npm'] == $data_krs['mahasiswa_npm'] ? 'selected' : '' ?>>
                        <?= $row['nama'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="kodemk" class="form-label">Mata Kuliah</label>
            <select name="kodemk" class="form-select" required>
                <?php while ($row = mysqli_fetch_assoc($result_mk)) : ?>
                    <option value="<?= $row['kodemk'] ?>" <?= $row['kodemk'] == $data_krs['matakuliah_kodemk'] ? 'selected' : '' ?>>
                        <?= $row['nama'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-warning">Simpan</button>
    </form>
</div>
</body>
</html>
