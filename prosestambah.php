<?php
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $location = trim($_POST['location']);
    $capacity = intval($_POST['capacity']); 
    $status = trim($_POST['status']); 
    $opening_hour = $_POST['opening_hour'];
    $closing_hour = $_POST['closing_hour'];

    if ($status !== 'aktif' && $status !== 'tidak_aktif') {
        die("Status tidak valid. Harus 'aktif' atau 'tidak_aktif'.");
    }

   
    $query = "INSERT INTO gudang (name, location, capacity, status, opening_hour, closing_hour) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssisss", $name, $location, $capacity, $status, $opening_hour, $closing_hour);

   
    if ($stmt->execute()) {
      
        echo "<script>
                alert('Data berhasil ditambahkan!');
                window.location.href = 'index.php'; // Kembali ke halaman index
              </script>";
    } else {
        echo "Error: " . $stmt->error; 
    }
   
    $stmt->close();
}


$conn->close();
?>
