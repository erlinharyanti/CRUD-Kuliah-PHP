<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $mahasiswa_npm = $_POST['mahasiswa_npm'];
    $matakuliah_kodemk = $_POST['matakuliah_kodemk'];

    // Query untuk menambahkan data KRS
    $query = "INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES ('$mahasiswa_npm', '$matakuliah_kodemk')";
    if (mysqli_query($conn, $query)) {
        echo '<div class="alert alert-success mt-3">Data KRS berhasil ditambahkan!</div>';
    } else {
        echo '<div class="alert alert-danger mt-3">Gagal menambahkan data KRS: ' . mysqli_error($conn) . '</div>';
    }
}
?>

<?php include 'index.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 p-4 shadow rounded bg-white pb-4">
    <h3 class="mb-4">Tambah KRS</h3>
    <form method="POST">
        <div class="mb-4">
            <label for="mahasiswa_npm" class="form-label">Pilih Mahasiswa</label>
            <select name="mahasiswa_npm" class="form-select" required>
                <option value="">-- Pilih Mahasiswa --</option>
                <?php
                // Ambil data mahasiswa
                $result_mahasiswa = mysqli_query($conn, "SELECT npm, nama FROM mahasiswa");
                while ($row = mysqli_fetch_assoc($result_mahasiswa)) {
                    echo "<option value='{$row['npm']}'>{$row['nama']} ({$row['npm']})</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-4">
            <label for="matakuliah_kodemk" class="form-label">Pilih Mata Kuliah</label>
            <select name="matakuliah_kodemk" class="form-select" required>
                <option value="">-- Pilih Mata Kuliah --</option>
                <?php
                // Ambil data mata kuliah
                $result_matakuliah = mysqli_query($conn, "SELECT kodemk, nama FROM matakuliah");
                while ($row = mysqli_fetch_assoc($result_matakuliah)) {
                    echo "<option value='{$row['kodemk']}'>{$row['nama']} ({$row['kodemk']})</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Tambah</button>
    </form>
</div>
</body>
</html>
