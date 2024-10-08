<?php
session_start();
include 'config.php';

$query = "SELECT * FROM gudang";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/stock.png">
    <link rel="stylesheet" href="index.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>WARE HOUSE MSIB</title>
</head>
<body>
    <!-- Header Start -->
    <header>
        <div class="judul">
            <h1>WARE HOUSE MSIB</h1>
        </div>

        <nav>
            <ul>
                <li><a href="index.php">Daftar Gudang</a></li>
                <li><a href="tambah.html">Tambah Gudang</a></li>
                <li><a href="laporan.html">Laporan</a></li>
                <li><a href="logout.html">Logout</a></li>
            </ul>
        </nav>
    </header>
    <!-- Header End -->

    <!-- Main Start -->
    <main>
        <div class="container">
            <h3 class="namaForm">Daftar Warehouse MSIB</h3>

            <div class="search-box">
                <input type="text" id="search" onkeyup="searchTable()" placeholder="Cari nama gudang..." />
            </div>

            <a href="tambah.php">
                <button type="button" class="btn btn-primary" id="addButton">
                    <i class="fa-solid fa-plus"></i> Tambah Data
                </button>
            </a>

            <table class="table">
                <thead>
                    <tr>
                        <th><center>No</center></th>
                        <th>Nama Gudang</th>
                        <th>Lokasi Gudang</th>
                        <th>Kapasitas</th>
                        <th>Status</th>
                        <th>Jam Operasional</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>{$no}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['location']}</td>
                                    <td>{$row['capacity']} m<sup>3</sup></td>
                                    <td>{$row['status']}</td>
                                    <td>{$row['opening_hour']} - {$row['closing_hour']}</td>
                                    <td>
                                        <a href='edit.php?id={$row['id']}'>
                                            <button type='button' class='btn btn-warning'>
                                                <i class='fa-solid fa-pen-to-square'></i>
                                            </button>
                                        </a>
                                        <a href='proseshapus.php?id={$row['id']}' onclick='return confirmDelete()'>
                                            <button type='button' class='btn btn-danger'>
                                                <i class='fa-solid fa-trash'></i>
                                            </button>
                                        </a>
                                    </td>
                                  </tr>";
                            $no++;
                        }
                    } else {
                        echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <!-- Main End -->

    <!-- Footer Start -->
    <footer>
        <p> Made By Audysa Rimba Jati 2024</p>
    </footer>
    <!-- Footer End -->

    <script>
        function searchTable() {
            let input = document.getElementById("search").value.toLowerCase();
            let table = document.querySelector("table tbody");
            let rows = table.getElementsByTagName("tr");

            for (let i = 0; i < rows.length; i++) {
                let td = rows[i].getElementsByTagName("td")[1];
                if (td) {
                    let textValue = td.textContent || td.innerText;
                    rows[i].style.display = textValue.toLowerCase().indexOf(input) > -1 ? "" : "none";
                }
            }
        }

        function confirmDelete() {
            return confirm("Apakah Anda yakin ingin menghapus data ini?");
        }
    </script>
</body>
</html>
